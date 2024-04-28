<?php

namespace App\Http\Controllers;

use App\DataTables\CategoryDataTable;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    public function index(CategoryDataTable $dataTable)
    {
        return $dataTable->render('category.index');
    }

    public function store(Request $request)
    {
        // dd($request->all());

        $category = new Category();
        $category->name = $request->category;
        $category->save();

        $notification = array(
            'message' => 'Category Added Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function distroy($id)
    {
        // dd($id);
        // die;
        $delete = Category::findOrFail($id);
        $delete->delete();

        // dd($id);
        // die;

        $notification = array(
            'message' => 'Category Deleted Successfully',
            'alert-type' => 'success'
        );

        // return response(['status' => 'success', 'message' => 'Deleted Successfully!']);
        return redirect()->route('item.category')->with($notification);
    }
}
