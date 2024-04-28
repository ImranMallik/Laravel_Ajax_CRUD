<?php

namespace App\Http\Controllers;

use App\DataTables\SubCategoryDataTable;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function index(SubCategoryDataTable $dataTable)
    {
        $category = Category::get();
        return $dataTable->render('sub-category.index', compact('category'));

        // return view('sub-category.index');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $subCategory = new SubCategory();
        $subCategory->category_id = $request->category;
        $subCategory->status = $request->status;
        $subCategory->name = $request->sub_category;
        $subCategory->save();

        $notification = array(
            'message' => 'Category Added Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function statusChange(Request $request)
    {
        $changeStatus = SubCategory::findOrFail($request->id);
        // dd($changeStatus);
        // die;
        $changeStatus->status = $request->status == 'true' ? 1 : 0;
        $changeStatus->save();

        $notification = array(
            'message' => 'Status Change Successfully',
            'alert-type' => 'success'
        );

        return response()->json([
            'message' => 'Status has been updated!',
            'notification' => $notification
        ]);
    }
}
