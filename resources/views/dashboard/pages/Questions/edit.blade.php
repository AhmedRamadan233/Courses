@extends('dashboard.layouts.dashboard')

@section('title', '')

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active"> Edit Questions Page</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    
                            <h2 class="m-0">Edit Question</h2>

                </div>
                
                <div class="card-body">
                    <form action="{{ route('question.update', ['question' => $editQuestion->id]) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('POST')

                        <div class="form-group">
                            <label for="parent_id">Main Category</label>
                            <select class="form-control" id="parent_id" name="parent_id">
                                <option value="">Select Main Category</option>
                                @foreach ($categories as $category)
                                    @if ($category->parent_id == null)
                                        <option value="{{ $category->id }}" {{ $category->id == $editQuestion->quiz->section->category->parent_id ? 'selected' : '' }}>
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
                                        <option value="{{ $category->id }}" {{ $category->id == old('category_id', $editQuestion->quiz->section->category_id) ? 'selected' : '' }}>
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
                                    <option value="{{ $section->id }}" {{ $section->id == $editQuestion->quiz->section_id ? 'selected' : '' }}>
                                        {{ $section->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('section_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>



                        <div class="form-group">
                            <label for="quiz_id">Quiz</label>
                            <select class="form-control" id="quiz_id" name="quiz_id">
                                @foreach ($quizzes as $quiz)
                                    <option value="{{ $quiz->id }}" {{ $quiz->id == $editQuestion->quiz_id ? 'selected' : '' }}>
                                        {{ $quiz->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('quiz_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        




                        <div class="form-group">
                            <label for="body">Question</label>
                            <input type="text" class="form-control" id="body" name="body" value="{{ $editQuestion->body }}">
                            @error('body')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
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
                        $('#category_id').append('<option value="' + category.id + '" ' + (category.id == {{ $editQuestion->quiz->section->category_id }} ? 'selected' : '') + '>' + category.slug + '</option>');

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
                        $('#section_id').append('<option value="' + section.id + '" ' + (section.id == {{ $editQuestion->quiz->section_id }} ? 'selected' : '') + '>' + section.name + '</option>');
                    });
                }
            });
        });

        $('#section_id').on('change', function() {
            var sectionId = $(this).val();

            // Make an AJAX request to get quizzes based on the selected section
            $.ajax({
                url: '/dashboard/shared/get_quizzes/' + sectionId,
                type: 'GET',
                success: function(data) {
                    $('#quiz_id').empty();

                    $('#quiz_id').append('<option value="">Select Quiz</option>');
                    $.each(data.quizzes, function(index, quiz) {
                        $('#quiz_id').append('<option value="' + quiz.id + '" ' + (quiz.id == {{ $editQuestion->quiz->quiz_id }} ? 'selected' : '') + '>' + quiz.name + '</option>');
                    });
                }
            });
        });
    });
</script>


@endpush