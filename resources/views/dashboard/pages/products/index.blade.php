@extends('dashboard.layouts.dashboard')

@section('title', '')

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active"> Product Page</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-item-center">
                        <form action="" method="get" class="form-inline">
                            <div class="form-group mx-2">
                                <label for="name" class="sr-only">Search by Name</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="name" placeholder="Search by name..." name="name" value="">
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
                                    <option value="active">Active</option>
                                    <option value="draft">Draft</option>
                                    <option value="archived">Archived</option>
                                </select>
                            </div>
                
                            <button type="submit" class="btn btn-primary mx-2">Search</button>
                        </form>
                        <div>
                            <a href="{{route ('product.create')}}" class="btn btn-primary">Add New Product</a>
                        </div>
                    </div>
                </div>
                
                
                <div class="card-body">
                    <table id="product-table" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Category</th>
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
                                    <td>{{ $product->category->name }}</td>
                                    <td>{{ $product->name }}</td>
                                    <td>
                                        <video width="320" height="240" controls>
                                            <source src="{{ asset('upload/' . $product->video) }}" type="video/mp4">
                                            Your browser does not support the video tag.
                                        </video>
                                    </td>
                                    
                                    <td>{{ $product->description }}</td>
                                    <td>{{ $product->status }}</td>
                                    <td> 
                                        {{-- {{ route('edit-products', ['product' => $product->id]) }} --}}
                                        <a href="" class="btn btn-primary">Edit</a>
                                        |
                                        <form action="" method="post" style="display: inline;">
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