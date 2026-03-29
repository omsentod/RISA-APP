<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CompanyEvent;
use Illuminate\Http\Request;

class CompanyEventController extends Controller
{
    public function index(Request $request)
    {
        $isTrash = $request->has('trashed');
        if ($isTrash) {
            $items = CompanyEvent::onlyTrashed()->orderBy('sort_order')->get();
        } else {
            $items = CompanyEvent::orderBy('sort_order')->get();
        }
        return view('admin.index', [
            'isTrash' => $isTrash,
            'items' => $items,
            'items' => $items,
            'title' => 'Company Events',
            'createUrl' => route('admin.company-events.create'),
            'routePrefix' => 'admin.company-events',
            'columns' => ['title' => 'Title', 'image_path' => 'Image', 'sort_order' => 'Sort']
        ]);
    }

    public function create(\Illuminate\Http\Request $request)
    {
        $item = null;
        if ($request->has('duplicate')) {
            $original = \App\Models\CompanyEvent::find($request->duplicate);
            if ($original) {
                $item = $original->replicate();
            }
        }
        return view('admin.form', [
            'item' => $item,
            'title' => 'Company Event',
            'submitUrl' => route('admin.company-events.store'),
            'cancelUrl' => route('admin.company-events.index'),
            'fields' => [
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
            'title' => 'required',
            'description' => 'nullable',
            'image_path' => 'nullable|image',
            'sort_order' => 'nullable|numeric'
        ]);

        if (!isset($data['sort_order']) || $data['sort_order'] === null) {
            $data['sort_order'] = 0;
        }

        if ($request->hasFile('image_path')) {
            $data['image_path'] = $request->file('image_path')->store('events', 'public');
        }

        CompanyEvent::create($data);
        return redirect()->route('admin.company-events.index')->with('success', 'Created successfully.');
    }

    public function edit(CompanyEvent $companyEvent)
    {
        return view('admin.form', [
            'item' => $companyEvent,
            'title' => 'Company Event',
            'submitUrl' => route('admin.company-events.update', $companyEvent),
            'cancelUrl' => route('admin.company-events.index'),
            'fields' => [
                'title' => ['label' => 'Title', 'type' => 'text'],
                'description' => ['label' => 'Description', 'type' => 'textarea'],
                'image_path' => ['label' => 'Event Image', 'type' => 'image'],
                'sort_order' => ['label' => 'Sort Order', 'type' => 'number']
            ]
        ]);
    }

    public function update(Request $request, CompanyEvent $companyEvent)
    {
        $data = $request->validate([
            'title' => 'required',
            'description' => 'nullable',
            'image_path' => 'nullable|image',
            'sort_order' => 'nullable|numeric'
        ]);

        if (!isset($data['sort_order']) || $data['sort_order'] === null) {
            $data['sort_order'] = 0;
        }

        if ($request->hasFile('image_path')) {
            $data['image_path'] = $request->file('image_path')->store('events', 'public');
        } elseif ($request->has('remove_image_path')) {
            $data['image_path'] = null;
        }

        $companyEvent->update($data);
        return redirect()->route('admin.company-events.index')->with('success', 'Updated successfully.');
    }

    public function destroy(CompanyEvent $companyEvent)
    {
        $companyEvent->delete();
        return redirect()->back();
    }

    public function restore($id)
    {
        CompanyEvent::withTrashed()->findOrFail($id)->restore();
        return redirect()->back();
    }

    public function forceDelete($id)
    {
        CompanyEvent::withTrashed()->findOrFail($id)->forceDelete();
        return redirect()->back();
    }

    public function duplicate(Request $request)
    {
        $dup = CompanyEvent::findOrFail($request->duplicate)->toArray();
        unset($dup['id']);
        $request->session()->flashInput($dup);
        return redirect()->route('admin.company-events.create')->with('success', 'Data berhasil disalin. Silakan ulas dan simpan sebagai data baru.');
    }
}
