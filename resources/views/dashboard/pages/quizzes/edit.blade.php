@extends('dashboard.layouts.dashboard')

@section('title', '')

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active"> Edit Quiz Page</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    
                            <h2 class="m-0">Edit Quiz</h2>

                </div>
                
                <div class="card-body">
                    <form action="{{ route('quiz.update', ['quiz' => $editQuiz->id]) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('POST')

                        <div class="form-group">
                            <label for="parent_id">Main Category</label>
                            <select class="form-control" id="parent_id" name="parent_id">
                                <option value="">Select Main Category</option>
                                @foreach ($categories as $category)
                                    @if ($category->parent_id == null)
                                        <option value="{{ $category->id }}" {{ $category->id == $editQuiz->section->category->parent_id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
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
                                @foreach ($categories as $category)
                                    @if ($category->parent_id !== null)
                                        <option value="{{ $category->id }}" {{ $category->id == old('category_id', $editQuiz->section->category_id) ? 'selected' : '' }}>
                                            {{ $category->slug }}
                                        </option>
                                    @endif
                                @endforeach
                            </select>
                            @error('category_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        
                        
                        <div class="form-group">
                            <label for="section_id">Section</label>
                            <select class="form-control" id="section_id" name="section_id">
                                <option value="">Select Section</option>
                                @foreach ($sections as $section)
                                    <option value="{{ $section->id }}" {{ $section->id == $editQuiz->section_id ? 'selected' : '' }}>
                                        {{ $section->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('section_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>



                        




                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $editQuiz->name }}">
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="status">Status</label>
                            <select class="form-control" id="status" name="status">
                                <option value="active" {{ $editQuiz->status == 'active' ? 'selected' : '' }}>Active</option>
                                <option value="inactive" {{ $editQuiz->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                                <option value="archive" {{ $editQuiz->status == 'archive' ? 'selected' : '' }}>Archived</option>
                            </select>
                        </div>
                        
                    


                        
                        
                        <button type="submit" class="btn btn-primary">Update</button>

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
                        $('#category_id').append('<option value="' + category.id + '" ' + (category.id == {{ $editQuiz->section->category_id }} ? 'selected' : '') + '>' + category.slug + '</option>');

                    });
                }
            });
        });
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
                        $('#section_id').append('<option value="' + section.id + '" ' + (section.id == {{ $editQuiz->section_id }} ? 'selected' : '') + '>' + section.name + '</option>');
                    });
                }
            });
        });
    });

</script>


@endpush