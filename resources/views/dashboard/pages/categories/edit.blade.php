@extends('dashboard.layouts.dashboard')

@section('title', '')

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active"> Edit Products Page</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-primary card-outline">
                <div class="card-header text-center">
                    <h2 class="m-0">Edit Products</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('category.update', ['category' => $editCategory->id]) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('POST')


                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $editCategory->name }}">
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    

                        <div class="form-group">
                            <label for="category_id">Category</label>
                            <select class="form-control" id="category_id" name="category_id">
                                <option value="">Select Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ $category->id == $editCategory->category_id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        
                        
                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="text" class="form-control" id="price" name="price" value="{{ $editCategory->price }}">
                            @error('price')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                    
                       
                    

                        <div class="form-group">
                            <label for="status">Status</label>
                            <select class="form-control" id="status" name="status">
                                <option value="active" {{ $editCategory->status == 'active' ? 'selected' : '' }}>Active</option>
                                <option value="inactive" {{ $editCategory->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                                <option value="archive" {{ $editCategory->status == 'archive' ? 'selected' : '' }}>Archived</option>
                            </select>
                        </div>
                        
                    
                        <div class="form-group">
                            <label for="video">Video</label>
                            <input type="file" class="form-control-file" id="video" name="video">
                            @error('video')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror

                            @if($editCategory->video)
                                <div class="mt-2">
                                    <p>Current Video:</p>
                                    <video width="320" height="240" controls>
                                        <source src="{{ asset('upload/' . $editCategory->video) }}" type="video/mp4">
                                        Your browser does not support the video tag.
                                    </video>
                                </div>
                            @endif
                        </div>

                        
                        
                        <button type="submit" class="btn btn-primary">Update</button>

                    </form>
                    
                </div>
            </div>
        </div>
    </div>

@endsection