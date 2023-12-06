@extends('dashboard.layouts.dashboard')

@section('title', '')

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active"> Edit Answer Page</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    
                            <h2 class="m-0">Edit Answer</h2>

                </div>
                
                <div class="card-body">
                    <form action="{{ route('answer.update', ['answer' => $editAnswer->id]) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('POST')

                        <div class="form-group">
                            <label for="parent_id">Main Category</label>
                            <select class="form-control" id="parent_id" name="parent_id">
                                <option value="">Select Main Category</option>
                                @foreach ($categories as $category)
                                    @if ($category->parent_id == null)
                                        <option value="{{ $category->id }}" {{ $category->id == $editAnswer->question->quiz->section->category->parent_id ? 'selected' : '' }}>
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
                                        <option value="{{ $category->id }}" {{ $category->id == old('category_id', $editAnswer->question->quiz->section->category_id) ? 'selected' : '' }}>
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
                                    <option value="{{ $section->id }}" {{ $section->id == $editAnswer->question->quiz->section_id ? 'selected' : '' }}>
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
                                    <option value="{{ $quiz->id }}" {{ $quiz->id == $editAnswer->question->quiz_id ? 'selected' : '' }}>
                                        {{ $quiz->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('quiz_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        


                        <div class="form-group">
                            <label for="question_id">Question</label>
                            <select class="form-control" id="question_id" name="question_id">
                                @foreach ($questions as $question)

                                    <option value="{{ $question->id }}" {{ $question->id == $editAnswer->question_id ? 'selected' : '' }}>
                                        {{ $question->body }}
                                    </option>
                                @endforeach
                            </select>
                            @error('section_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <label for="answer">Answer</label>
                            <input type="text" class="form-control" id="answer" name="answer" value="{{ old('answer', $editAnswer->answer) }}">
                            @error('answer')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        
                        <!-- Add a hidden input to store the 'no' value in case neither radio button is checked -->
                        <input type="hidden" name="is_correct" value="no">
                        
                        <div class="form-group">
                            <label for="isCorrect">Is Correct</label>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="answerTrue" name="is_correct" value="yes" @if(old('is_correct', $editAnswer->is_correct) === 'yes') checked @endif>
                                <label class="form-check-label text-info" for="answerTrue">True</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="answerFalse" name="is_correct" value="no" @if(old('is_correct', $editAnswer->is_correct) === 'no') checked @endif>
                                <label class="form-check-label text-danger" for="answerFalse">False</label>
                            </div>
                            @error('is_correct')
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
                        $('#category_id').append('<option value="' + category.id + '" ' + (category.id == {{ $editAnswer->question->quiz->section->category_id }} ? 'selected' : '') + '>' + category.slug + '</option>');

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
                        $('#section_id').append('<option value="' + section.id + '" ' + (section.id == {{ $editAnswer->question->quiz->section_id }} ? 'selected' : '') + '>' + section.name + '</option>');
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
                        $('#quiz_id').append('<option value="' + quiz.id + '" ' + (quiz.id == {{ $editAnswer->question->quiz_id }} ? 'selected' : '') + '>' + quiz.name + '</option>');
                    });
                }
            });
        });
        $('#quiz_id').on('change', function() {
            var quizId = $(this).val();

            // Make an AJAX request to get questions based on the selected quiz
            $.ajax({
                url: '/dashboard/shared/get_questions/' + quizId,
                type: 'GET',
                success: function(data) {
                    $('#question_id').empty();

                    $('#question_id').append('<option value="">Select Question</option>');
                    $.each(data.questions, function(index, question) {
                        $('#question_id').append('<option value="' + question.id + '" ' + (question.id == {{ $editAnswer->question_id }} ? 'selected' : '') + '>' + question.name + '</option>');

                    });
                }
            });
        });
    });
</script>


@endpush