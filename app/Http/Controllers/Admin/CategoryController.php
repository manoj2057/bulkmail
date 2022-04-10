<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Str;
use DataTables;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
    public function addCategory(){
        return view('admin.category.add');
    }
    public function index(){
        $categories=Category::latest()->get();
        return view('admin.category.index',compact('categories'));
    }

    public function storeCategory(Request $request){
        $data=$request->all();
        $validateData=$request->validate([
            'category_name'=> 'required',
            'slug'=>'unique',
            

        ]);
        $category = new Category();
        $category->category_name = $data['category_name'];
        $category->slug = Str::slug($data['category_name']);
        $category->parent_id = $data['parent_id'];
        if(empty($data['status'])){
            $category->status = 'Inactive';
        }
        else{
            $category->status = 'active';
        }
        $category->save();
        Session::flash('success_message', 'category Has Been Added Successfully');
        return redirect()->back(); 
    }

    public function editCategory($id){
        $category= Category::findOrFail($id);
        return view('admin.category.edit',compact('category'));
    }
    public function updateCategory(Request $request, $id){
        $data=$request->all();
        $category= Category::findOrFail($id);
        $category->category_name = $data['category_name'];
        $category->slug = Str::slug($data['category_name']);
        if (empty($data['status'])){
            $category->status = 'Inactive';
        }
        else{
            $category->status = 'active';
        }

        $category->save();
        Session::flash('success_message', 'category has been updated Successfully');
        return redirect()->back(); 
    }
    public function categoryEdit($id){
        $categoryData = Category::findOrFail($id);
        $category = Category::where('parent_id', 0)->get();
        return view ('admin.category.edit', compact('categoryData', 'category'));
    }
   
    public function update(Request $request, $id){
        $data=$request->all();
        $category= Category::findOrFail($id);
        $category->category_name = $data['category_name'];
        $category->slug = Str::slug($data['category_name']);
        if (empty($data['status'])){
            $category->status = 0;
        } else {
            $category->status = 1;
        }

        $category->save();
        Session::flash('success_message', 'category has been updated Successfully');
        return redirect()->back(); 
    }

    public function delete($id){
        $category = Category::findOrFail($id);
        $category->delete();
        Session::flash('success_message', ' category Has Been deleted Successfully');
    return redirect()->back();
    }

    public function dataTable(){
        $model = Category::all();
        return DataTables::of($model)
           ->addColumn('action', function($model){
               return view('admin.category._actions', [
                    'model'=> $model,
                    'url_edit' =>route('editCategory',$model->id),
                    'url_delete' =>route('deleteCategory',$model->id)
               ]);
               
           })
           ->addIndexColumn()
           ->rawColumns(['actions'])
                ->make(true);
    }
}
