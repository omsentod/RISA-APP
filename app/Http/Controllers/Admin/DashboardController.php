<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard');
    }

    public function reorder(Request $request)
    {
        $request->validate([
            'model' => 'required|string',
            'ids' => 'required|array',
            'ids.*' => 'integer'
        ]);

        $modelClass = 'App\\Models\\' . $request->model;
        if (class_exists($modelClass)) {
            foreach ($request->ids as $index => $id) {
                $modelClass::where('id', $id)->update(['sort_order' => $index]);
            }
            return response()->json(['success' => true]);
        }
        return response()->json(['success' => false], 400);
    }
}
