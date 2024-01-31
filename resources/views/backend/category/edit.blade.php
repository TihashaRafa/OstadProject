@extends('backend.Layouts.admin')
@section('admin_content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Dashboard</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Category Form</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method="POST" action="{{ route('admin.category.update', $category->id) }}" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">  
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Category</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="name" name="name" value="{{ $category->name }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="user_id" class="col-sm-2 col-form-label">UserName</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="user_id" name="user_id" value="{{ $category->user_id }}" >
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" id="customButton"
                        style="background-color: #007bff; border-color: #007bff;"
                        onmouseover="hoverButton(true)" onmouseout="hoverButton(false)">Create</button>
                       
                    </div>
                </form>
            </div>
            <!-- /.card -->

        </div>
    </div>
@endsection
