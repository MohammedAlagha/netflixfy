<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use App\Http\Requests\Dashboard\CategoryRequest;
use DataTables;

class CategoryController extends Controller
{

    public function index()
    {
        return view('dashboard.categories.index');
    }//end f index

    public function data()
    {
        $categories = Category::all();
        return DataTables::of($categories)->addColumn('action',function($category){
          return "<a class='btn btn-xs btn-primary edit' href='".route('dashboard.categories.edit',$category->id)."' data-value = '".$category->name."'><i class='fa fa-edit'></i></a>
          <a class='btn btn-xs btn-danger delete'  data-id= '$category->id' data-url='". route('dashboard.categories.destroy',$category->id) ."'><i class='fa fa-trash'></i></a>";
        })->make(true);

    }


    public function create()
    {
        return view('dashboard.categories.create');
    }

    public function store(CategoryRequest $request)
    {
        Category::create($request->all());

        session()->flash('success','Added Successfully');
        return redirect()->route('dashboard.categories.index');
    }


    public function show($id)
    {
        //
    }


    public function edit(Category $category)
    {
        return view('dashboard.categories.edit',compact('category'));
    }


    public function update(CategoryRequest $request, Category $category)
    {
        $category->update($request->all());

        session()->flash('success','Edited Successfully');
        return redirect()->route('dashboard.categories.index');

    }


    public function destroy(Category $category)
    {

        $category->delete();
        // session()->flash('success','Deleted Successfully');
        // return redirect()->route('dashboard.categories.index');

        return \response()->json(['status'=>true,'message'=>'Deleted Successfully']);

    }
}
