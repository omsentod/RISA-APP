<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Facility;
use Illuminate\Http\Request;

class FacilityController extends Controller
{
    public function index(Request $request)
    {
        $isTrash = $request->has('trashed');
        if ($isTrash) {
            $items = Facility::onlyTrashed()->orderBy('sort_order')->get();
        } else {
            $items = Facility::orderBy('sort_order')->get();
        }
        return view('admin.index', [
            'isTrash' => $isTrash,
            'items' => $items,
            'title' => 'Facilities',
            'createUrl' => route('admin.facilities.create'),
            'routePrefix' => 'admin.facilities',
            'columns' => ['name' => 'Facility Name', 'image_path' => 'Image', 'sort_order' => 'Sort']
        ]);
    }

    public function create(Request $request)
    {
        $item = null;
        if ($request->has('duplicate')) {
            $original = Facility::find($request->duplicate);
            if ($original) {
                $item = $original->replicate();
            }
        }
        return view('admin.form', [
            'item' => $item,
            'title' => 'Facility',
            'submitUrl' => route('admin.facilities.store'),
            'cancelUrl' => route('admin.facilities.index'),
            'fields' => [
                'name' => ['label' => 'Facility Name', 'type' => 'text'],
                'description' => ['label' => 'Description', 'type' => 'textarea'],
                'image_path' => ['label' => 'Facility Image', 'type' => 'image'],
                'sort_order' => ['label' => 'Sort Order', 'type' => 'number']
            ]
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'description' => 'nullable',
            'image_path' => 'nullable|image',
            'sort_order' => 'nullable|numeric'
        ]);

        if (!isset($data['sort_order']) || $data['sort_order'] === null) {
            $data['sort_order'] = 0;
        }

        if ($request->hasFile('image_path')) {
            $data['image_path'] = $request->file('image_path')->store('facilities', 'public');
        }

        Facility::create($data);
        return redirect()->route('admin.facilities.index')->with('success', 'Created successfully.');
    }

    public function edit(Facility $facility)
    {
        return view('admin.form', [
            'item' => $facility,
            'title' => 'Facility',
            'submitUrl' => route('admin.facilities.update', $facility),
            'cancelUrl' => route('admin.facilities.index'),
            'fields' => [
                'name' => ['label' => 'Facility Name', 'type' => 'text'],
                'description' => ['label' => 'Description', 'type' => 'textarea'],
                'image_path' => ['label' => 'Facility Image', 'type' => 'image'],
                'sort_order' => ['label' => 'Sort Order', 'type' => 'number']
            ]
        ]);
    }

    public function update(Request $request, Facility $facility)
    {
        $data = $request->validate([
            'name' => 'required',
            'description' => 'nullable',
            'image_path' => 'nullable|image',
            'sort_order' => 'nullable|numeric'
        ]);

        if (!isset($data['sort_order']) || $data['sort_order'] === null) {
            $data['sort_order'] = 0;
        }

        if ($request->hasFile('image_path')) {
            $data['image_path'] = $request->file('image_path')->store('facilities', 'public');
        } elseif ($request->has('remove_image_path')) {
            $data['image_path'] = null;
        }

        $facility->update($data);
        return redirect()->route('admin.facilities.index')->with('success', 'Updated successfully.');
    }

    public function destroy(Facility $facility)
    {
        $facility->delete();
        return redirect()->back();
    }

    public function restore($id)
    {
        Facility::withTrashed()->findOrFail($id)->restore();
        return redirect()->back();
    }

    public function forceDelete($id)
    {
        Facility::withTrashed()->findOrFail($id)->forceDelete();
        return redirect()->back();
    }

    public function duplicate(Request $request)
    {
        $dup = Facility::findOrFail($request->duplicate)->toArray();
        unset($dup['id']);
        return redirect()->route('admin.facilities.create')
            ->withInput($dup)
            ->with('success', 'Data berhasil disalin. Silakan ulas dan simpan sebagai data baru.');
    }
}
