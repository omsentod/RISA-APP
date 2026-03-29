<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $isTrash = $request->has('trashed');
        if ($isTrash) {
            $items = Product::onlyTrashed()->orderBy('sort_order')->get();
        } else {
            $items = Product::orderBy('sort_order')->get();
        }
        return view('admin.index', [
            'isTrash' => $isTrash,
            'items' => $items,
            'items' => $items,
            'title' => 'Products',
            'createUrl' => route('admin.products.create'),
            'routePrefix' => 'admin.products',
            'columns' => ['name' => 'Name', 'category' => 'Category', 'image_path' => 'Image', 'sort_order' => 'Sort']
        ]);
    }

    public function create(\Illuminate\Http\Request $request)
    {
        $item = null;
        if ($request->has('duplicate')) {
            $original = \App\Models\Product::find($request->duplicate);
            if ($original) {
                $item = $original->replicate();
            }
        }
        return view('admin.form', [
            'item' => $item,
            'title' => 'Product',
            'submitUrl' => route('admin.products.store'),
            'cancelUrl' => route('admin.products.index'),
            'fields' => [
                'name' => ['label' => 'Product Name', 'type' => 'text'],
                'category' => ['label' => 'Category', 'type' => 'text'],
                'material' => ['label' => 'Material', 'type' => 'text'],
                'image_path' => ['label' => 'Product Image', 'type' => 'image'],
                'sort_order' => ['label' => 'Sort Order', 'type' => 'number']
            ]
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'category' => 'required',
            'material' => 'nullable',
            'image_path' => 'nullable|image',
            'sort_order' => 'nullable|numeric'
        ]);

        if (!isset($data['sort_order']) || $data['sort_order'] === null) {
            $data['sort_order'] = 0;
        }

        if ($request->hasFile('image_path')) {
            $data['image_path'] = $request->file('image_path')->store('products', 'public');
        }

        Product::create($data);
        return redirect()->route('admin.products.index')->with('success', 'Created successfully.');
    }

    public function edit(Product $product)
    {
        return view('admin.form', [
            'item' => $product,
            'title' => 'Product',
            'submitUrl' => route('admin.products.update', $product),
            'cancelUrl' => route('admin.products.index'),
            'fields' => [
                'name' => ['label' => 'Product Name', 'type' => 'text'],
                'category' => ['label' => 'Category', 'type' => 'text'],
                'material' => ['label' => 'Material', 'type' => 'text'],
                'image_path' => ['label' => 'Product Image', 'type' => 'image'],
                'sort_order' => ['label' => 'Sort Order', 'type' => 'number']
            ]
        ]);
    }

    public function update(Request $request, Product $product)
    {
        $data = $request->validate([
            'name' => 'required',
            'category' => 'required',
            'material' => 'nullable',
            'image_path' => 'nullable|image',
            'sort_order' => 'nullable|numeric'
        ]);

        if (!isset($data['sort_order']) || $data['sort_order'] === null) {
            $data['sort_order'] = 0;
        }

        if ($request->hasFile('image_path')) {
            $data['image_path'] = $request->file('image_path')->store('products', 'public');
        } elseif ($request->has('remove_image_path')) {
            $data['image_path'] = null;
        }

        $product->update($data);
        return redirect()->route('admin.products.index')->with('success', 'Updated successfully.');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->back();
    }

    public function restore($id)
    {
        Product::withTrashed()->findOrFail($id)->restore();
        return redirect()->back();
    }

    public function forceDelete($id)
    {
        Product::withTrashed()->findOrFail($id)->forceDelete();
        return redirect()->back();
    }

    public function duplicate(Request $request)
    {
        $dup = Product::findOrFail($request->duplicate)->toArray();
        unset($dup['id']);
        $request->session()->flashInput($dup);
        return redirect()->route('admin.products.create')->with('success', 'Data berhasil disalin. Silakan ulas dan simpan sebagai data baru.');
    }
}
