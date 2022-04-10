@extends('admin.includes.dashboard_design')
@section('content')
    
<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Data Table</strong>
                    </div>
                    <div class="card-body">
                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                            <thead>
                                <tr><th>S.N</th>
                                    <th>Course Name</th>
                                    <th>Slug</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($courses as $course)

                                <tr>
                                    <td>{{$course->id}}</td>
                                    <td>{{$course->course_name}}</td>
                                    <td>{{$course->slug}}</td>
                                    <td>{{$course->status}}</td>
                                    <td>{{$course->parent_id}}</td>
                                    <td><a href="{{route('editCourse',$course->id)}}">Edit</a>
                                        <a href="{{route('deleteCourse',$course->id)}}">Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                  
                          
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


        </div>
    </div><!-- .animated -->
</div><!-- .content -->
 @endsection('content')

 
  