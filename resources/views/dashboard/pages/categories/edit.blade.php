@extends('restaurant.dashboard.layouts.dashboard')

@section('title', 'Resturant System')

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active"> Edit Category Page</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-primary card-outline">
                <div class="card-header text-center">
                    <h2 class="m-0">Edit Category</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('update-categories', ['id' => $editedCategory->id]) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $editedCategory->name }}">

                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <label for="parent_id">Parent Category</label>
                            <select class="form-control" id="parent_id" name="parent_id">
                                <option value="">Select Parent Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" id="description" name="description">{{ $editedCategory->description }}</textarea>
                            @error('description')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="status">Status</label>
                            <select class="form-control" id="status" name="status">
                                <option value="active" {{ $editedCategory->status == 'active' ? 'selected' : '' }}>Active</option>
                                <option value="inactive" {{ $editedCategory->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                                <option value="archive" {{ $editedCategory->status == 'archive' ? 'selected' : '' }}>Archive</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="image">Image</label>
                            <input type="file" class="form-control-file" id="image" name="image">
                            @error('image')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection



