@extends('admin.includes.dashboard_design')
@section('content')

<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Student Table</strong>
                    </div>
                    <div class="col-auto float-right ml-auto">
                        <a href="{{ route('addStudent') }}" class="btn add-btn btn-primary" style="background-color: #1a2eb9; border: 1px solid #1a2eb9;color: #fff; margin-right: 7px; border-radius:10px; margin-top: 7px;"  ><i class="fa fa-plus"></i> Add student</a>

                        
                        
                    </div>
                    <div class="card-body">
                        
                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>
                                        <input type="checkbox" id="select-all">
                                        <label>Select all</label>
                                    </th>
                                    <th>S.N</th>
                                    <th>Course Id</th>
                                    <th>student Name</th>
                                    <th>Email</th>
                                    <th>Image</th>
                                    <th>Status</th>
                                    <th>DOB</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($students as $student)
                                <tr>
                                    <td>
                                        <input type="checkbox" name="ids[{{$student->id}}]" value="{{$student->id}}">
                                    </td>
                                    <td>{{$student->id}}</td>
                                    <td>{{$student->course_id}}</td>
                                    <td>{{$student->student_name}}</td>
                                    <td>{{$student->email}}</td>
                                    <td><img src="{{asset('public/uploads/students/'.$student->image)}}"></td>
                                    <td>
                                        @if($student->status == 'Active')
                                        <span class="badge badge-success">{{$student->status}}</span>
                                    @else
                                        <span class="badge badge-danger">{{$student->status}}</span>
                                    @endif
                                        
                                    </td> 
                                    <td>{{$student->price}}</td>   
                                    <td><a href="{{route('editStudent',$student->id)}}" data-toggle="tooltip" title="Edit" class="btn btn-sm btn-outline-primary"><i class="fa fa-edit"></i></a>
                                        <a href="{{route('deleteStudent',$student->id)}}" data-toggle="tooltip" title="Trash" class="btn btn-sm btn-outline-danger btn-delete" rel="{{ $student->id }}" rel1="student/delete"><i class="fa fa-trash-o"></i></a>
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


@endsection
@section('js')
<script src="{{ asset('public/dashboard/assets/js/jquery.sweet-alert.custom.js') }}"></script>
<script src="{{ asset('public/dashboard/assets/js/jquery.sweet-alert.custom.js') }}"></script>
<script src="{{ asset('public/dashboard/assets/js/sweetalert.min.js') }}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
   $(document).ready(function(){
        $("#form1 #select-all").click(function(){
            if(this.checked){
                $("#form1 input[type='checkbox']").prop('checked',true);
            }
            else{
                $("#form1 input[type='checkbox']").prop('checked',false);
            }
        
        });
   
    });
</script>

<script>
    // $("#data-table").DataTable({
    //     processing: true,
    //     serverSide: true,
    //     sorting: true,
    //     searchable: true,
    //     responsive: true,
    //     ajax: "{{ route('tableCategory') }}",
    //     columns: [
    //         {data: 'DT_RowIndex', name: 'DT_RowIndex'},
    //         {data: 'category_name', name: 'category_name'},
    //         // {data: 'parent_id', name: 'parent_id'},
    //         // {data: 'action', name: 'action', orderable: false},
    //     ]
    });
    $('body').on('click', '.btn-delete', function (event){
              event.preventDefault();
              var SITEURL = '{{ URL::to('') }}';
              var id = $(this).attr('rel');
              var deleteFunction = $(this).attr('rel1');
              swal({
                  title: 'Are you sure?',
                  text: "You won't be able to revert this!",
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonText: 'Yes, delete it!',
                  cancelButtonText: 'No, cancel!',
              },
              function(){
                  window.location.href = SITEURL + "/admin/" + deleteFunction + "/" + id;
              });
          });
</script>

@endsection