@extends('dashboard.layouts.dashboard')

@section('title', '')

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active"> Create Category Page</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-primary card-outline">
                <div class="card-header text-center">
                    <h2 class="m-0">Create Category</h2>
                </div>
                <div class="card-body">
                    <form action="{{route('category.store')}}" method="post" enctype="multipart/form-data">

                        @csrf
                    
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                      

                        <div class="form-group">
                            <label for="status">Status</label>
                            <select class="form-control" id="status" name="status">
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                                <option value="archive">Archive</option>
                            </select>
                        </div>

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
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @error('parent_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>


                            <div class="form-group main-category p-2" id="price" style="display: none;">
                                <label for="price">Price</label>
                                <input type="text" class="form-control" id="price" name="price" value="{{ old('price') }}">
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
                            </div>
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                    
                    
                </div>
            </div>
        </div>
    </div>

@endsection
@push('createShared.scripts')

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
@endpush