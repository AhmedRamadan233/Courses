@extends('dashboard.layouts.dashboard')

@section('title', '')

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
                            <label for="status">Status</label>
                            <select class="form-control" id="status" name="status">
                                <option value="active" {{ $editCategory->status == 'active' ? 'selected' : '' }}>Active</option>
                                <option value="inactive" {{ $editCategory->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                                <option value="archive" {{ $editCategory->status == 'archive' ? 'selected' : '' }}>Archived</option>
                            </select>
                        </div>
                        
                        @if ($editCategory->video == null)
                            <div class="form-group">
                                <div class="categories mt-3">
                                    <div class="btn-group" role="group" aria-label="Categories">
                                        <button type="button" class="btn btn-secondary category" data-target="main_category">To add Parent Category</button>
                                        <button type="button" class="btn btn-secondary category" data-target="price">To Add Price</button>
                                        <button type="button" class="btn btn-secondary category" data-target="video">To Add Video</button>
                                        <button type="button" class="btn btn-danger category" data-target="">X</button>
                                    </div>
                                </div>

                                <div class="form-group main-category p-2" id="main_category" style="display: none;">
                                    <label for="parent_id">Category</label>
                                    <select class="form-control" id="parent_id" name="parent_id">
                                        <option value="">Select Category</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}" {{ $category->id == $editCategory->category_id ? 'selected' : '' }}>
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('parent_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>


                                <div class="form-group main-category p-2" id="price" style="display: none;">
                                    <label for="price">Price</label>
                                    <input type="text" class="form-control" id="price" name="price" value="{{ $editCategory->price }}">
                                    @error('price')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            
                                <div class="form-group main-category p-2" id="video" style="display: none;">
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
                            </div> 
                              
                        @else

                            <div class="form-group">
                                <label for="parent_id">Category</label>
                                <select class="form-control" id="parent_id" name="parent_id">
                                    <option value="">Select Category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" {{ $category->id == $editCategory->parent_id ? 'selected' : '' }}>
                                          
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('parent_id')
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
                                <label for="price">Price</label>
                                <input type="text" class="form-control" id="price" name="price" value="{{ $editCategory->price }}">
                                @error('price')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
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

                        @endif
                        
                        
                        <button type="submit" class="btn btn-primary">Update</button>

                    </form>
                    
                </div>
            </div>
        </div>
    </div>

@endsection

@push('webste.scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var categoryButtons = document.querySelectorAll('.category');
        var cardContainers = document.querySelectorAll('.main-category');
        // cardContainers.forEach(function (container) {
        //             container.style.display = 'none';
        //     });
        categoryButtons.forEach(function (button) {
            button.addEventListener('click', function () {
                var targetId = button.getAttribute('data-target');

                // Hide all card containers
                cardContainers.forEach(function (container) {
                    container.style.display = 'none';
                });

                // Show the selected card container
                var targetContainer = document.getElementById(targetId);
                if (targetContainer) {
                    targetContainer.style.display = 'block';
                }
            });
        });
    });
</script>