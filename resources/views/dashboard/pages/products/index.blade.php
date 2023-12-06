@extends('dashboard.layouts.dashboard')

@section('title', '')

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active"> Lecture Page</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-primary card-outline">
                
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <form action="{{ route('product.index') }}" method="get" class="form-inline">
                            <div class="form-group mx-2">
                                <label for="name" class="sr-only">Search by Name</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="name" placeholder="Search by name..." name="name" value="{{ request('name') }}">
                                    <div class="input-group-append">
                                        <span class="input-group-text">
                                            <i class="fa fa-search"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                
                            <div class="form-group mx-2">
                                <label for="status" class="sr-only">Select Status</label>
                                <select class="form-control" id="status" name="status">
                                    <option value="" selected>Select Status</option>
                                    <option value="active" {{ request('status') == 'active' ? 'selected' : '' }}>Active</option>
                                    <option value="inactive" {{ request('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
                                    <option value="archive" {{ request('status') == 'archive' ? 'selected' : '' }}>Archive</option>
                                </select>
                            </div>
                
                            <button type="submit" class="btn btn-primary mx-2">Search</button>
                        </form>
                        <div>
                            <a href="{{route ('product.create')}}" class="btn btn-primary">Add New Lecture</a>
                        </div>
                    </div>
                </div>
                
                <div class="card-body">
                    <table id="product-table" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Main Category</th>
                                <th>Sub Category</th>
                                <th>Section</th>
                                <th>Name</th>                                
                                <th>Video</th>
                                <th>Description</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <td>{{ $product->id }}</td>
                                    <td>{{ $product->section->category->parent->name }}</td>
                                    <td>{{ $product->section->category->name }}</td>
                                    <td>{{ $product->section->name }}</td>
                                    <td>{{ $product->name }}</td>
                                    <td>
                                        <video width="150" height="150" controls>
                                            <source src="{{ asset('upload/' . $product->video) }}" type="video/mp4">
                                            Your browser does not support the video tag.
                                        </video>
                                    </td>
                                    
                                    <td>{{ $product->description }}</td>
                                    <td>{{ $product->status }}</td>
                                    <td> 
                                        <a href="{{route('product.edit' , ['product' => $product->id])}}" class="btn btn-primary">Edit</a>
                                        |
                                        <form action="{{route('product.destroy' , ['product' => $product->id])}}" method="post" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                            @endforeach
                           
                        </tbody>
                    </table>
                </div>
                <div class="card-footer text-center">
                    <h5 class="m-0">Featured</h5>
                </div>
            </div>
        </div>
    </div>
@endsection