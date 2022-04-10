<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
use App\Models\Course;


class StudentController extends Controller
{
    public function index(){
        $students = Student::with('course')->latest()->get();
        return view ('admin.student.index', compact('students'));
    }

    // Add student
    public function addstudent(){
       
        $courses = Course::orderBy('course_name', 'ASC')->get();
        return view ('admin.student.add', compact('courses'));

    }
    public function storeStudent(Request $request){
        $data = $request->all();
        $student = new student();


        $rules = [
            'student_name' => 'required|max:255',
            'dob' => 'required',

        ];
        $customMessages = [
            'student_name.required' => 'student Name cannot be left empty',
            'student_name.max' => 'You are not allowed to enter more than 255 characters',
            'price.required' => 'Please provide student price',

        ];
        $this->validate($request, $rules, $customMessages);
        $student->student_name = $data['student_name'];
        $student->slug = Str::slug($data['student_name']);
        $student->course_id = $data['course_id'];
        $student->dob = $data['dob'];
        $student->email = $data['email'];
        $random = Str::random(10);
        if($request->hasFile('image')){
            $image_tmp = $request->file('image');
            if($image_tmp->isValid()){
                $extension = $image_tmp->getClientOriginalExtension();
                $filename = $random . '.' . $extension;
                $image_path = 'public/uploads/students/' . $filename;
                Image::make($image_tmp)->save($image_path);
                $student->image = $filename;

            }
        }
       

        if(!empty($data['excerpt'])){
            $student->excerpt = $data['excerpt'];
        } else {
            $student->excerpt = "";
        }

        if (empty($data['status'])){
            $student->status = "inactive";
        } else {
            $student->status = "active";
        }


        $student->save();
        $notification = array(
            'message' => "student added successfully",
            'alert-type' => 'success'

        );
        
        return redirect()->back()->with($notification);
    }
    public function editStudent($id){
        $student = student::findOrFail($id);
        $courses = Course::orderBy('course_name', 'ASC')->get();
        return view ('admin.student.edit', compact('courses', 'student',));
    }

    public function updateStudent(Request $request , $id){
        $data = $request->all();

        $student = Student::findOrFail($id);


        $rules = [
            'student_name' => 'required|max:255',
            'course_id' => 'required',
            'price' => 'required',

        ];
        $customMessages = [
            'student_name.required' => 'student Name cannot be left empty',
            'student_name.max' => 'You are not allowed to enter more than 255 characters',
            'price.required' => 'Please provide student price',

        ];
        $this->validate($request, $rules, $customMessages);
        $slug=Str::slug($data['student_name']);
        $student->student_name = $data['student_name'];
        $student->price = $data['price'];
        $student->slug = Str::slug($data['student_name']);
        $student->course_id = $data['course_id'];
        $random = Str::random(10);
        if($request->hasFile('image')){
            $image_tmp = $request->file('image');
            if($image_tmp->isValid()){
                $extension = $image_tmp->getClientOriginalExtension();
                $filename = $random . '.' . $extension;
                $image_path = 'public/uploads/students/' . $filename;
                Image::make($image_tmp)->save($image_path);
                $student->image = $filename;

            }
        }
       

        if(!empty($data['excerpt'])){
            $student->excerpt = $data['excerpt'];
        } else {
            $student->excerpt = "";
        }

        if (empty($data['status'])){
            $student->status = "inactive";
        } else {
            $student->status = "active";
        }


        $student->save();
        $notification = array(
            'message' => "student added successfully",
            'alert-type' => 'success'

        );
        
        return redirect()->back()->with($notification);

    }

  public function deletestudent($id){
        $student = Student::findOrFail($id);
        $student->delete();
        $notification = array(
            'message' => "student added successfully",
            'alert-type' => 'success'

        );
        return redirect()->back()->with($notification);
    }
}


