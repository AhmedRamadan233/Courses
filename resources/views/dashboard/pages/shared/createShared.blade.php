{{-- @extends('dashboard.layouts.dashboard')

@section('title', '')

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active"> Common Question Page</li>
@endsection

@section('content')
    <div class="row">

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

            $('#category_id').on('change', function() {
                var categoryId = $(this).val();
    
                // Make an AJAX request to get sections based on the selected category
                $.ajax({
                    url: '/dashboard/shared/get_sections/' + categoryId,
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
                    url: '/dashboard/shared/get_quizzes/' + sectionId,
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
                    url: '/dashboard/shared/get_questions/' + quizId,
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
@endpush --}}