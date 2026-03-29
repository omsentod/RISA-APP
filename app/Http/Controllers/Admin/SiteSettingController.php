<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use Illuminate\Http\Request;

class SiteSettingController extends Controller
{
    public function index(Request $request)
    {
        $query = SiteSetting::query();
        if ($request->has('trashed')) {
            $query->onlyTrashed();
        }
        $items = $query->get();
        return view('admin.index', [
            'title' => 'Site Settings',
            'items' => $items,
            'isTrash' => $request->has('trashed'),
            'columns' => [
                'key' => 'Setting Key',
                'type' => 'Type',
                'value' => 'Value'
            ],
            'routePrefix' => 'admin.settings',
            'createUrl' => route('admin.settings.create'),
            'disableDelete' => false
        ]);
    }

    public function create(Request $request)
    {
        if ($request->has('duplicate')) {
            $dup = SiteSetting::findOrFail($request->duplicate)->toArray();
            unset($dup['id'], $dup['created_at'], $dup['updated_at'], $dup['deleted_at']);
            $dup['key'] = $dup['key'] . '_copy';
            $request->session()->now('_old_input', array_merge($request->old(), $dup));
        }

        return view('admin.form', [
            'title' => 'Site Settings',
            'submitUrl' => route('admin.settings.store'),
            'cancelUrl' => route('admin.settings.index'),
            'fields' => [
                'key' => ['label' => 'Setting Key (e.g., hero_title)', 'type' => 'text'],
                'type' => [
                    'label' => 'Type', 
                    'type' => 'select', 
                    'options' => ['text' => 'Text', 'image' => 'Image']
                ],
                'value' => ['label' => 'Text Value', 'type' => 'textarea'],
                'image_upload' => ['label' => 'Image Upload (if type is Image)', 'type' => 'image']
            ]
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'key' => 'required|unique:site_settings,key',
            'type' => 'required',
            'value' => 'nullable'
        ]);

        if ($request->type === 'image' && $request->hasFile('image_upload')) {
            $data['value'] = $request->file('image_upload')->store('settings', 'public');
        } elseif ($request->type === 'image' && $request->has('remove_image_upload')) {
            $data['value'] = null;
        }

        SiteSetting::create($data);
        return redirect()->route('admin.settings.index');
    }

    public function edit(SiteSetting $setting)
    {
        return view('admin.form', [
            'title' => 'Site Settings',
            'item' => $setting,
            'submitUrl' => route('admin.settings.update', $setting),
            'cancelUrl' => route('admin.settings.index'),
            'fields' => [
                'key' => ['label' => 'Setting Key', 'type' => 'text', 'readonly' => true],
                'type' => [
                    'label' => 'Type', 
                    'type' => 'select', 
                    'options' => ['text' => 'Text', 'image' => 'Image']
                ],
                'value' => ['label' => 'Text Value', 'type' => 'textarea'],
                'image_upload' => ['label' => 'Image Upload (if type is Image)', 'type' => 'image']
            ]
        ]);
    }

    public function update(Request $request, SiteSetting $setting)
    {
        $data = $request->validate([
            'type' => 'required',
            'value' => 'nullable'
        ]);

        if ($request->type === 'image' && $request->hasFile('image_upload')) {
            $data['value'] = $request->file('image_upload')->store('settings', 'public');
        } elseif ($request->type === 'image' && $request->has('remove_image_upload')) {
            $data['value'] = null;
        }

        $setting->update($data);
        return redirect()->route('admin.settings.index');
    }

    public function destroy(SiteSetting $setting)
    {
        $setting->delete();
        return redirect()->route('admin.settings.index');
    }

    public function restore($id)
    {
        SiteSetting::onlyTrashed()->findOrFail($id)->restore();
        return back();
    }

    public function forceDelete($id)
    {
        SiteSetting::onlyTrashed()->findOrFail($id)->forceDelete();
        return back();
    }
}
