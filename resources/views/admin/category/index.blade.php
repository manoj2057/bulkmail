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
                                    <th>Name</th>
                                    <th>Slug</th>
                                    <th>Status</th>
                                    <th>Parent Id</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($categories as $category)

                                <tr>
                                    <td>{{$category->id}}</td>
                                    <td>{{$category->category_name}}</td>
                                    <td>{{$category->slug}}</td>
                                    <td>{{$category->status}}</td>
                                    <td>{{$category->parent_id}}</td>
                                    <td><a href="{{route('editCategory',$category->id)}}">Edit</a>
                                        <a href="{{route('deleteCategory',$category->id)}}">Delete</a>
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

 
  