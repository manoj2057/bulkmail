@extends('admin.includes.dashboard_design')
@section('content')
    
<div class="input-group">
    <button type="button" class="btn btn-primary"><a href="{{route('addCategory')}}" style="color:white">Add Category</a></button>
</div>
        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Data Table</strong>
                            </div>
                            <div class="card-body">
                                <table id="category-datatable" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>S.N</th>
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
                                    </tbody> 
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
        
        @endsection('content')

         {{-- @section('js') --}}
         {{-- <script src="{{ asset('public/dashboard/vendors/datatables.net/js/jquery.dataTables.min.js')}}"></script>
         <script src="{{ asset('public/dashboard/vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
         <script src="{{ asset('public/dashboard/vendors/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
         <script src="{{ asset('public/dashboard/vendors/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js')}}"></script>
         <script src="{{ asset('public/dashboard/vendors/jszip/dist/jszip.min.js')}}"></script>
         <script src="{{ asset('public/dashboard/vendors/pdfmake/build/pdfmake.min.js')}}"></script>
         <script src="{{ asset('public/dashboard/vendors/pdfmake/build/vfs_fonts.js')}}"></script>
         <script src="{{ asset('public/dashboard/vendors/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
         <script src="{{ asset('public/dashboard/vendors/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
         <script src="{{ asset('public/dashboard/vendors/datatables.net-buttons/js/buttons.colVis.min.js')}}"></script>
         <script src="{{asset('public/dashboard/assets/js/init-scripts/data-table/datatables-init.js')}}"></script>
        
        <script>
          $("#category-datatable").DataTable({
            processing:true,
            serverSide:true,
            sorting:true,
            serachable:true,
            responsive:true,
            ajax:"{{route('tableCategory')}}",
            columns:[
              {data: 'DT_RowIndex', name: 'DT_RowIndex'},
              {data: 'category_name', name: 'category_name'},
              {data: 'slug', name: 'slug'},
              {data: 'status', name: 'status'},
              {data: 'parent_id', name: 'parent_id'},
              
              {data: 'action', name: 'action', orderable:false},
            ]
        
          });
        </script>
        @endsection  --}}

    </div><!-- /#right-panel -->

    <!-- Right Panel -->


   

</body>

</html>
