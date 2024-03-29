@extends('dashboard.layouts.dashboard')

@section('title', '')

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active"> Category Page</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-primary card-outline">
                
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <form action="{{ route('category.index') }}" method="get" class="form-inline">
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
                            <a href="{{route('category.create')}}" class="btn btn-primary">Add New Category</a>
                        </div>
                    </div>
                </div>
                
                <div class="card-body">
                    <table id="product-table" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Main Category</th>
                               
                                <th>Price</th>
                                <th>Video</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($mainCategories as $category)
                                <tr>
                                    <td>{{ $category->id }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td>
                                        @if ($category->parent_id == null)
                                            <p class="btn disabled btn-outline-info text-dark">Main Category</p>
                                        @else
                                            <p>{{ $category->parent->name }}</p>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($category->price == null)
                                            <p class="btn disabled btn-outline-info text-dark">Main Category</p>
                                        @else
                                            <p>{{ $category->price }}</p>
                                        @endif
                                    </td>
                                    
                                    <td>
                                        @if (  $category->video == null)
                                          <p class="btn disabled btn-outline-info text-dark">Main Category</p>
                                        @else
                                        <video width="320" height="240" controls>
                                            <source src="{{ asset('upload/' . $category->video) }}" type="video/mp4">
                                            Your browser does not support the video tag.
                                        </video>
                                        @endif
                                    </td>
                                    <td>{{ $category->status }}</td>
                                    <td>
                                        <a href="{{ route('category.edit', ['category' => $category->id]) }}" class="btn btn-primary">Edit</a> |
                                        <form action="{{ route('category.destroy', ['category' => $category->id]) }}" method="post" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
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