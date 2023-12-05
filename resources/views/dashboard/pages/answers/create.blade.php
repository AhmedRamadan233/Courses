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
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        {{-- <div class="btn-group" role="group" aria-label="Categories">
                            @foreach ($categories as $category)
                            <div class="category border border-light p-3 mb-2 bg-dark rounded text-center text-light">
                    
                                <a href="{{ route('question.get_sections', ['categoryId' => $category->id]) }}">
                                    <h2>{{ $category->name }}</h2>
                                </a>
                            </div>
                            @endforeach
                        </div> --}}
                        <div>
                            <h2 class="m-0">Create answer</h2>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{route('answer.store')}}" method="post" enctype="multipart/form-data">

                        @csrf
                        <div class="form-group">
                            <label for="category_id">Category</label>
                            <select class="form-control" id="category_id" name="category_id">
                                <option value="">Select Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
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
                            </select>
                            @error('section_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <label for="quiz_id">Quiz</label>
                            <select class="form-control" id="quiz_id" name="quiz_id">
                                <option value="">Select Quiz</option>
                            </select>
                            @error('quiz_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <label for="question_id">Question</label>
                            <select class="form-control" id="question_id" name="question_id">
                                <option value="">Select Question</option>
                            </select>
                            @error('question_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="answer">Answer</label>
                            <input type="text" class="form-control" id="answer" name="answer" value="{{ old('answer') }}">
                            @error('answer')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <!-- Add a hidden input to store the 'no' value in case neither radio button is checked -->
                        <input type="hidden" name="is_correct" value="no">

                        <div class="form-group">
                            <label for="isCorrect">Is Correct</label>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="answerTrue" name="is_correct" value="yes" @if(old('is_correct') === 'yes') checked @endif>
                                <label class="form-check-label text-info" for="answerTrue">True</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="answerFalse" name="is_correct" value="no" @if(old('is_correct') === 'no') checked @endif>
                                <label class="form-check-label text-danger" for="answerFalse">False</label>
                            </div>
                            @error('is_correct')
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

    @push('createAnswer.scripts')
    <script>
        $(document).ready(function() {
            $('#category_id').on('change', function() {
                var categoryId = $(this).val();
    
                // Make an AJAX request to get sections based on the selected category
                $.ajax({
                    url: '/dashboard/answers/get_sections/' + categoryId,
                    type: 'GET',
                    success: function(data) {
                        $('#section_id').empty();
                        $('#quiz_id').empty();
                        $('#question_id').empty();
    
                        $('#section_id').append('<option value="">Select Section</option>');
                        $.each(data.sections, function(index, section) {
                            $('#section_id').append('<option value="' + section.id + '">' + section.name + '</option>');
                        });
                    }
                });
            });
    
            $('#section_id').on('change', function() {
                var sectionId = $(this).val();
    
                // Make an AJAX request to get quizzes based on the selected section
                $.ajax({
                    url: '/dashboard/answers/get_quizzes/' + sectionId,
                    type: 'GET',
                    success: function(data) {
                        $('#quiz_id').empty();
                        $('#question_id').empty();
    
                        $('#quiz_id').append('<option value="">Select Quiz</option>');
                        $.each(data.quizzes, function(index, quiz) {
                            $('#quiz_id').append('<option value="' + quiz.id + '">' + quiz.name + '</option>');
                        });
                    }
                });
            });
    
            $('#quiz_id').on('change', function() {
                var quizId = $(this).val();
    
                // Make an AJAX request to get questions based on the selected quiz
                $.ajax({
                    url: '/dashboard/answers/get_questions/' + quizId,
                    type: 'GET',
                    success: function(data) {
                        $('#question_id').empty();
    
                        $('#question_id').append('<option value="">Select Question</option>');
                        $.each(data.questions, function(index, question) {
                            $('#question_id').append('<option value="' + question.id + '">' + question.body + '</option>');
                        });
                    }
                });
            });
        });
</script>
@endpush

