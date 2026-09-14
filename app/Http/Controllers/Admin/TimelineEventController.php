<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TimelineEvent;
use Illuminate\Http\Request;

class TimelineEventController extends Controller
{
    public function index(Request $request)
    {
        $isTrash = $request->has('trashed');
        if ($isTrash) {
            $items = TimelineEvent::onlyTrashed()->orderBy('sort_order')->get();
        } else {
            $items = TimelineEvent::orderBy('sort_order')->get();
        }
        return view('admin.index', [
            'isTrash' => $isTrash,
            'items' => $items,
            'items' => $items,
            'title' => 'Timeline Events',
            'createUrl' => route('admin.timeline.create'),
            'routePrefix' => 'admin.timeline',
            'columns' => ['year' => 'Year', 'title' => 'Title', 'image_path' => 'Image', 'sort_order' => 'Sort']
        ]);
    }

    public function create(\Illuminate\Http\Request $request)
    {
        $item = null;
        if ($request->has('duplicate')) {
            $original = \App\Models\TimelineEvent::find($request->duplicate);
            if ($original) {
                $item = $original->replicate();
            }
        }
        return view('admin.form', [
            'item' => $item,
            'title' => 'Timeline Event',
            'submitUrl' => route('admin.timeline.store'),
            'cancelUrl' => route('admin.timeline.index'),
            'fields' => [
                'year' => ['label' => 'Year', 'type' => 'text'],
                'title' => ['label' => 'Title', 'type' => 'text'],
                'description' => ['label' => 'Description', 'type' => 'textarea'],
                'image_path' => ['label' => 'Event Image', 'type' => 'image'],
                'sort_order' => ['label' => 'Sort Order', 'type' => 'number']
            ]
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'year' => 'required',
            'title' => 'required',
            'description' => 'required',
            'image_path' => 'nullable|image',
            'sort_order' => 'nullable|numeric'
        ]);

        if (!isset($data['sort_order']) || $data['sort_order'] === null) {
            $data['sort_order'] = 0;
        }

        if ($request->hasFile('image_path')) {
            $data['image_path'] = $request->file('image_path')->store('timeline', 'public');
        }

        TimelineEvent::create($data);
        return redirect()->route('admin.timeline.index')->with('success', 'Created successfully.');
    }

    public function edit(TimelineEvent $timeline)
    {
        return view('admin.form', [
            'item' => $timeline,
            'title' => 'Timeline Event',
            'submitUrl' => route('admin.timeline.update', $timeline),
            'cancelUrl' => route('admin.timeline.index'),
            'fields' => [
                'year' => ['label' => 'Year', 'type' => 'text'],
                'title' => ['label' => 'Title', 'type' => 'text'],
                'description' => ['label' => 'Description', 'type' => 'textarea'],
                'image_path' => ['label' => 'Event Image', 'type' => 'image'],
                'sort_order' => ['label' => 'Sort Order', 'type' => 'number']
            ]
        ]);
    }

    public function update(Request $request, TimelineEvent $timeline)
    {
        $data = $request->validate([
            'year' => 'required',
            'title' => 'required',
            'description' => 'required',
            'image_path' => 'nullable|image',
            'sort_order' => 'nullable|numeric'
        ]);

        if (!isset($data['sort_order']) || $data['sort_order'] === null) {
            $data['sort_order'] = 0;
        }

        if ($request->hasFile('image_path')) {
            $data['image_path'] = $request->file('image_path')->store('timeline', 'public');
        } elseif ($request->has('remove_image_path')) {
            $data['image_path'] = null;
        }

        $timeline->update($data);
        return redirect()->route('admin.timeline.index')->with('success', 'Updated successfully.');
    }

    public function destroy(TimelineEvent $timeline)
    {
        $timeline->delete();
        return redirect()->back();
    }

    public function restore($id)
    {
        TimelineEvent::withTrashed()->findOrFail($id)->restore();
        return redirect()->back();
    }

    public function forceDelete($id)
    {
        TimelineEvent::withTrashed()->findOrFail($id)->forceDelete();
        return redirect()->back();
    }

    public function duplicate(Request $request)
    {
        $dup = TimelineEvent::findOrFail($request->duplicate)->toArray();
        unset($dup['id']);
        $request->session()->flashInput($dup);
        return redirect()->route('admin.timeline.create')->with('success', 'Data berhasil disalin. Silakan ulas dan simpan sebagai data baru.');
    }
}
