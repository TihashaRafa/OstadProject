@extends('backend.Layouts.admin')
@section('admin_content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <a href="{{ route('admin.category.index') }}"
                            class="block py-2 px-3 {{ request()->routeIs('admin.category.index') ? 'text-blue-500' : 'text-white' }}  md:border-0 md:hover:text-green-700 md:p-0 ">
                            Categories
                        </a>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <br>
                                <a href="{{ route('admin.category.add') }}" class="btn btn-primary" id="customButton"
                                style="background-color: #007bff; border-color: #007bff; color: #fff; text-align: center; display: inline-block; padding: 0.375rem 0.75rem; font-size: 1rem; line-height: 1.5; border-radius: 0.25rem; text-decoration: none;"
                                onmouseover="hoverButton(true)" onmouseout="hoverButton(false)">Add New</a>
                             
                            </div>
                            <div class="col-sm-12 col-md-6 text-right">
                                <div id="example1_filter" class="dataTables_filter">
                                    <label>Search:<input type="search" class="form-control form-control-sm" placeholder=""
                                            aria-controls="example1"></label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                            <div class="row">
                                <div class="col-sm-12 col-md-6"></div>
                                <div class="col-sm-12 col-md-6"></div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="example2" class="table table-bordered table-hover dataTable dtr-inline"
                                        aria-describedby="example2_info">
                                        <thead>
                                            <tr>
                                                <th class="sorting sorting_asc" tabindex="0" aria-controls="example2"
                                                    rowspan="1" colspan="1" aria-sort="ascending"
                                                    aria-label="Rendering engine: activate to sort column descending">
                                                    Category Id</th>
                                                <th class="sorting sorting_asc" tabindex="0" aria-controls="example2"
                                                    rowspan="1" colspan="1" aria-sort="ascending"
                                                    aria-label="Rendering engine: activate to sort column descending">
                                                    Category Name</th>
                                                <th class="sorting sorting_asc" tabindex="0" aria-controls="example2"
                                                    rowspan="1" colspan="1" aria-sort="ascending"
                                                    aria-label="Rendering engine: activate to sort column descending">
                                                    User</th>
                                                <th class="sorting sorting_asc" tabindex="0" aria-controls="example2"
                                                    rowspan="1" colspan="1" aria-sort="ascending"
                                                    aria-label="Rendering engine: activate to sort column descending">
                                                    Action</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($category as $item)
                                            <tr class="odd">
                                                <td class="dtr-control sorting_1" tabindex="0">Id</td>
                                                <td>{{  $item->name }}</td>
                                                <td>{{  $item->user_id }}</td>
                                                <td class="px-6 py-4">
                                                    <div class="flex items-center space-x-4">
                                                        
                                                        <a
                                                            href=""
                                                            class="px-3 py-2 rounded text-gray-100 bg-green-400 hover:scale-105 transition focus:outline-none focus:ring focus:border-blue-300">
                                                            Edit
                                                        </a>
                                                        <form action="" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button
                                                            class="px-3 py-2 rounded text-gray-100 bg-red-400 hover:scale-105 transition  focus:outline-none focus:ring focus:border-red-500">
                                                            Delete
                                                        </button>
                                                        </form>
                                                    </div>
                                                </td>
                                                @endforeach
                                        </tbody>
                                     
                                    </table>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-5">
                                    <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">
                                        Showing 1 to 10 of 57 entries</div>
                                </div>
                                <div class="col-sm-12 col-md-7">
                                    <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
                                        <ul class="pagination">
                                            <li class="paginate_button page-item previous disabled" id="example2_previous">
                                                <a href="#" aria-controls="example2" data-dt-idx="0" tabindex="0"
                                                    class="page-link">Previous</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </div>
@endsection
