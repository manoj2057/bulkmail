@extends('admin.includes.dashboard_design')
@section('content')
<div class="col-lg-6">
    <div class="card">
        <div class="card-header">
            <strong>All students</strong> 
        </div>
        <div class="col-auto float-right ml-auto">
            <a href="{{ route('student.index') }}" class="btn update-btn btn-primary" btn-width="60" style="background-color: #1a2eb9; border: 1px solid #1a2eb9;color: #fff; margin-right: 7px;  margin-top: 7px; border-radius:10px;" ><i class="fa fa-eye"> View Student </a>
        </div>
        <div class="card-body card-block">
            @include('admin.includes._message')
            <form action="{{route('updateStudent',$student->id)}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                @csrf
                <div class="row form-group">
                    <div class="col col-md-3"><label for="course_id" class=" form-control-label">Select course <span class="text-danger">*</label></div>
                    <div class="col-12 col-md-9">
                        <select name="course_id" id="course_id" class="form-control-sm form-control">
                            <option selected disabled>Select Course</option>
                            @foreach($courses as $course)
                           <option value="{{ $course['id'] }}" {{ $student->course_id == $course['id'] ? 'selected' : '' }}>{{ $course['course_name'] }}</option>
                            @endforeach

                        </select>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="name" class=" form-control-label">student Name<span class="text-danger">*</label></div>
                    <div class="col-12 col-md-9"><input type="text" id="name" name="student_name" placeholder="Enter category name" class="form-control" value={{ $student->student_name }}></div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="email" class=" form-control-label"> Email<span class="text-danger">*</label></div>
                    <div class="col-12 col-md-9"><input type="email" id="name" name="email" placeholder="Enter your Email " class="form-control" value={{ $student->email }}></div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-3"><label for="image" class=" form-control-label">Image<span class="text-danger">*</label></div>
                    <div class="col-12 col-md-9"><input type="file" id="image" name="image" accept="image/*" class="form-control" onchange="readURL(this);">
                    </div>
                    <img src="{{asset('public/uploads/students/'.$student->image)}}" id="one" style="width: 100px">
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="status" class=" form-control-label">Status</label></div>
                    <div class="col-md-6 col-sm-6 ">
                        <input type="checkbox" name="status" {{ $student->status == 'active' ? 'checked' : '' }} data-toggle="toggle" data-size="xs" value="1">                         <label>Active</label>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="name" class=" form-control-label">DOB<span class="text-danger">*</label></div>
                    <div class="col-12 col-md-9"><input type="number" id="dob" name="dob" placeholder="Enter dob" class="form-control" value="{{ $student->dob}}"></div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="excerpt" class=" form-control-label">Excerpt<span class="text-danger">*</label></div>
                    <div class="col-12 col-md-9"><textarea name="excerpt" id="excerpt" cols="10" rows="3" class="form-control">{{ $student->excerpt }}</textarea></div>
                </div>
                
               
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary btn-sm">
                        <i class="fa fa-dot-circle-o"></i> Submit
                    </button>
                    
                </div>
               
                
               
                   
                    
                   
                    
                    
            </form>
        </div>
        
    </div>
   
</div>
@endsection
@section('js')
<script>
    function readURL(input){
        if(input.files && input.files[0]){
            var reader = new FileReader();
            reader.onload= function(e){
                $('#one')
                .attr('src',e.target.result)
                .width(100)
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
    
</script>

    
@endsection