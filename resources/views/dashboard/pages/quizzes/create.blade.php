@extends('dashboard.layouts.dashboard')

@section('title', '')

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active"> Create Quiz Page</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-primary card-outline">
                <div class="card-header text-center">
                    <h2 class="m-0">Create Quiz</h2>
                </div>
                <div class="card-body">
                    <form action="{{route('quiz.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="parent_id">Main Category</label>
                            <select class="form-control" id="parent_id" name="parent_id">
                                <option value="">Select Category</option>
                                @foreach ($categories as $category)
                                    @if ($category->parent_id == null)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                            @error('parent_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="category_id">Sub Category</label>
                            <select class="form-control" id="category_id" name="category_id">
                                <option value="">Select Sub Category</option>
                            </select>
                            @error('category_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <label for="section_id">Section</label>
                            <select class="form-control" id="section_id" name="section_id">
                                <option value="">Select Section</option>
                            </select>
                            @error('section_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

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
                        
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
@push('createShared.scripts')

<script>
    $(document).ready(function() {
        $('#parent_id').on('change', function() {
            var parentId = $(this).val();

            $.ajax({
                url: '/dashboard/shared/get_parents/' + parentId,
                type: 'GET',
                success: function(data) {
                    $('#category_id').empty();
                  

                    $('#category_id').append('<option value="">Select Sub Category</option>');
                    $.each(data.categories, function(index, category) {
                        $('#category_id').append('<option value="' + category.id + '">' + category.name + '</option>');
                    });
                }
            });
        });
    });
    $(document).ready(function() {
        $('#category_id').on('change', function() {
            var categoryId = $(this).val();

            // Make an AJAX request to get sections based on the selected category
            $.ajax({
                url: '/dashboard/shared/get_sections/' + categoryId,
                type: 'GET',
                success: function(data) {
                    $('#section_id').empty();
                    

                    $('#section_id').append('<option value="">Select Section</option>');
                    $.each(data.sections, function(index, section) {
                        $('#section_id').append('<option value="' + section.id + '">' + section.name + '</option>');
                    });
                }
            });
        });

    });
</script>
@endpush
