@extends('admin.includes.dashboard_design')
@section('content')
    
@include('admin.includes._message')
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Dashboard</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li class="active">Dashboard</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="col-lg-6">
    <div class="card">
        <div class="card-header">
            <strong>Basic Form</strong> Elements
        </div>
        <div class="input-group">
            <button type="button" class="btn btn-primary"><a href="{{route('index')}}" style="color:white margin">View update</a></button>
        </div>
        <div class="card-body card-block">
           
            <form action="{{route('storeCategory')}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                @csrf
                <div class="row form-group">
                    <div class="col col-md-3"><label for="selectSm" class=" form-control-label">Category</label></div>
                    <div class="col-12 col-md-9">
                        <select name="parent_id" id="parent_id" class="form-control-sm form-control">
                            <option value="0">Main category</option>
                        
                        </select>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">category name</label></div>
                    <div class="col-12 col-md-9"><input type="text" id="text-input" name="category_name" placeholder="Text" class="form-control"><small class="form-text text-muted">Please enter category name</small></div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label class=" form-control-label">Status</label>
                    </div>
                    <div class="col-md-6 col-sm-6 ">
                        <input type="checkbox" name="status" checked data-toggle="toggle" data-size="xs" value="1" checked>
                         <label>Active</label>
                    </div>
                </div>
                
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary btn-sm">
                        <i class="fa fa-dot-circle-o"></i> Submit
                    </button>
                    <button type="reset" class="btn btn-danger btn-sm">
                        <i class="fa fa-ban"></i> Reset
                    </button>
                </div>
            </form>
        </div>
      
    </div>
   
</div>


</div><!-- /#right-panel -->
@endsection('content')