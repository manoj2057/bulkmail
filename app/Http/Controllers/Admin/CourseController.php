<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use Illuminate\Support\Str;
use DataTables;
use Illuminate\Support\Facades\Session;

class CourseController extends Controller
{
    public function addCourse(){
        return view('admin.course.add');
    }
    public function index(){
        $courses=Course::latest()->get();
        return view('admin.course.index',compact('courses'));
    }

    public function storeCourse(Request $request){
        $data=$request->all();
        $validateData=$request->validate([
            'course_name'=> 'required',
            'slug'=>'unique',
            

        ]);
        $course = new course();
        $course->course_name = $data['course_name'];
        $course->slug = Str::slug($data['course_name']);
        if(empty($data['status'])){
            $course->status = 'Inactive';
        }
        else{
            $course->status = 'active';
        }
        $course->save();
        Session::flash('success_message', 'course Has Been Added Successfully');
        return redirect()->back(); 
    }

    public function editcourse($id){
        $course= course::findOrFail($id);
        return view('admin.course.edit',compact('course'));
    }
    public function updatecourse(Request $request, $id){
        $data=$request->all();
        $course= course::findOrFail($id);
        $course->course_name = $data['course_name'];
        $course->slug = Str::slug($data['course_name']);
        if (empty($data['status'])){
            $course->status = 'Inactive';
        }
        else{
            $course->status = 'active';
        }

        $course->save();
        Session::flash('success_message', 'course has been updated Successfully');
        return redirect()->back(); 
    }
    public function courseEdit($id){
        $courseData = course::findOrFail($id);
        $courses=Course::latest()->get();
        return view ('admin.course.edit', compact('courseData', 'course'));
    }
   
    public function update(Request $request, $id){
        $data=$request->all();
        $course= course::findOrFail($id);
        $course->course_name = $data['course_name'];
        $course->slug = Str::slug($data['course_name']);
        if (empty($data['status'])){
            $course->status = 0;
        } else {
            $course->status = 1;
        }

        $course->save();
        Session::flash('success_message', 'course has been updated Successfully');
        return redirect()->back(); 
    }

    public function delete($id){
        $course = course::findOrFail($id);
        $course->delete();
        Session::flash('success_message', ' course Has Been deleted Successfully');
    return redirect()->back();
    }

    public function dataTable(){
        $model = course::all();
        return DataTables::of($model)
           ->addColumn('action', function($model){
               return view('admin.course._actions', [
                    'model'=> $model,
                    'url_edit' =>route('editcourse',$model->id),
                    'url_delete' =>route('deletecourse',$model->id)
               ]);
               
           })
           ->addIndexColumn()
           ->rawColumns(['actions'])
                ->make(true);
    }
}
