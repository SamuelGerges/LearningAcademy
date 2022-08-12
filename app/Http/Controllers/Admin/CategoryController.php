<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function ShowCategory()
    {
        $data['category'] = Category::select('id','name')->get();
        return view('admin.category.index')->with($data);
    }
    public function CreateCategory()
    {
        return view('admin.category.create');
    }

    public function StoreCategory(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:25'
        ]);
        Category::create($data);
        return redirect(route('admin.ShowCategory'));
    }
    public function EditCategory($id)
    {
        $data['category'] = Category::findOrFail($id);
        return view('admin.category.edit')->with($data);
    }

    public function UpdateCategory(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:25'
        ]);
        Category::findOrFail($request->id)->update($data);
        return redirect(route('admin.ShowCategory'));

    }

    public function DeleteCategory($id)
    {
        Category::findOrFail($id)->delete();
        return back();
    }

}
