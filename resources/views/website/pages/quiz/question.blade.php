@extends('website.layouts.website')

@section('title', 'Course System')


@section('content')
    <!-- Start Product Grids -->
    <section class="product-grids section">
        <div class="container">
            <div class="row">

                <div class="col-lg-9 col-12">
                    <div class="product-grids-head">
                        <div class="product-grid-topbar">
                            <div class="row align-items-center">
                                <div class="col-lg-7 col-md-8 col-12">
                                    <div class="product-sorting">
                                        <label for="sorting">Sort by:</label>
                                        <select class="form-control" id="sorting">
                                            <option>Popularity</option>
                                            <option>Low - High Price</option>
                                            <option>High - Low Price</option>
                                            <option>Average Rating</option>
                                            <option>A - Z Order</option>
                                            <option>Z - A Order</option>
                                        </select>
                                        <h3 class="total-show-product">Showing: <span>1 - 12 items</span></h3>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane show active fade" id="nav-list" role="tabpanel" aria-labelledby="nav-list-tab">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-12">
                                        <!-- Start Single Product -->
                                        <div class="single-product">
                                            <div class="row align-items-center">
                                                @php
                                                    // Shuffle the questions array
                                                    $shuffledQuestions = $questions->shuffle();
                                                @endphp
                                                @foreach ($shuffledQuestions as $index => $question)
                                                <div class="col-lg-12 col-md-12 col-12 quiz-container" data-quiz-id="{{ $quiz->id }}" @if($index > 0) style="display: none;" @endif>
                                                    <form method="post" action="{{ route('quizWebsite.saveInCookieAndDoNext', ['id' => $quiz->id]) }}" class="quiz-form">
                                                        @csrf
                                                        <input type="hidden" name="_method" value="post">

                                                        <div class="product-info">
                                                            <div class="d-flex justify-content-center align-items-center p-2">
                                                                <h3 class="text-danger">QUESTION <span>{{ $loop->index + 1 }}</span> </h3>
                                                            </div>
                                                            <div class="d-flex justify-content-between align-items-center p-2">
                                                               
                                                                <h3 name="question_id" class="font-weight-bold p-2 text-primary" style="border-radius: 8px;">{{ $question->body }}</h3>
                                                            </div>

                                                            <ul class="options p-2">
                                                                @php
                                                                    // Shuffle the answers array
                                                                    $shuffledAnswers = $question->answers->shuffle();
                                                                    // Retrieve existing data from the cookie
                                                                    $existingData = json_decode(request()->cookie('solutions_cookie'), true) ?: [];
                                                                @endphp

                                                                @foreach ($shuffledAnswers as $answer)
                                                                    @php
                                                                        // Find the corresponding data from the cookie based on the answer
                                                                        $cookieDataForAnswer = collect($existingData)->where('answer_id', $answer->id)->first();
                                                                    @endphp
                                                                    <li class="m-3">
                                                                        <input 
                                                                            name="answer_id" 
                                                                            class="form-check-input quiz-option" 
                                                                            type="radio" 
                                                                            name="quizOption" 
                                                                            value="{{ $answer->answer }}" 
                                                                            data-quiz-id="{{ $quiz->id }}" 
                                                                            @if (!is_null($cookieDataForAnswer) && $answer->id == $cookieDataForAnswer['answer_id']) checked @endif
                                                                        >
                                                                        <label class="form-check-label font-weight-bold" for="option{{ $loop->parent->index + 1 }}{{ $loop->index + 1 }}">{{ $answer->answer }}</label>
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                        <div class="d-flex justify-content-between align-items-center p-2">
                                                            <button class="btn btn-secondary mr-2" style="border-radius: 8px; font-size: 24px;" type="button" onclick="navigateQuiz(-1)">
                                                                Previous
                                                            </button>
                                                            
                                                            <button class="btn btn-secondary" style="border-radius: 8px; font-size: 24px;" type="button" onclick="submitQuizForm(this)">
                                                                Next
                                                            </button>
                                                        </div>
                                                    </form>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                        <!-- End Single Product -->
                                        <div class="d-flex justify-content-center align-items-center p-2 id="quizFormContainer"">
                                            <form id="finishedQuizForm" method="post" action="{{ route('quizWebsite.saveCookieDataToDatabase') }}">
                                                @csrf
                                                <input type="hidden" name="_method" value="post">
                                                @if (in_array($quiz->id, $finishedQuizIds))
                                                    <!-- Quiz is finished, display appropriate content -->
                                                    <a href="#" class="btn disabled">
                                                        <i class="lni lni-checkmark-circle"></i> Quiz Completed
                                                    </a>
                                                @else
                                                    <button 
                                                        id="finished-button" 
                                                        class="btn btn-primary" 
                                                        style="border-radius: 8px; font-size: 24px; display: none;" type="button"  
                                                        onclick="finishedQuizForm()" 

                                                        >
                                                        Finished
                                                    </button>
                                                @endif
                                            </form>
                                            
                                        </div>
                                    </div>
                                    {{-- {{ $questions->links('vendor.pagination.next-previous')}} --}}

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-12">
                    <!-- Start Product Sidebar -->
                    <div class="product-sidebar">
                        <!-- Start Single Widget -->
                        <div class="single-widget search">
                            <h3>Student Informattion</h3>
                            <!-- Start Single Product -->
                            <div class="single-product">
                                <div class="product-info">
                                    
                                    <span class="category">{{ $quiz->name }}</span>

                                    <h4 class="title">
                                        <a href="#">{{ auth()->user()->name }}</a>
                                    </h4>

                                    <div  class="price">
                                        <span id="countdown"></span>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Product -->
                        </div>
                        <!-- End Single Widget -->
                        <!-- Start Single Widget -->
                        <div class="single-widget">
                            <h3>All Questions</h3>
                            {{-- {{ $questions->links('vendor.pagination.numircal')}} --}}
                            <ul class="list d-flex flex-wrap justify-content-between align-items-center">
                                @foreach ($questions as $index => $question)
                                    @php
                                        $cookieDataForAnswer = collect($existingData)->where('answer_id', $question->id)->first();
                                    @endphp
                                    <li class="btn btn-outline-primary text-dark m-1 flex-grow-1">
                                        <a href="product-grids.html">
                                            {{ $loop->index + 1 }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                            

                        </div>
                        <!-- End Single Widget -->


                    </div>
                    <!-- End Product Sidebar -->
                </div>
            </div>
        </div>
    </section>




    <!-- End Product Grids -->
@endsection
@push('webste.scripts')

<script>
$(document).ready(function () {
    var quizTimer = {{ $quiz->timer }}; 

    function padZero(value) {
        return value < 10 ? '0' + value : value;
    }
    function updateTimer() {
        var minutes = Math.floor(quizTimer / 60);
        var seconds = quizTimer % 60;
        $('#countdown').text(padZero(minutes) + ':' + padZero(seconds));
        quizTimer--;

        if (quizTimer < 0) {
            clearInterval(timerInterval);
            $('#countdown').text('00:00');
            alert("finshed");
            finishedQuizForm();
        }
    }
    var timerInterval = setInterval(updateTimer, 1000);

    });
    

    function navigateQuiz(direction) {
        var currentContainer = $('.quiz-container:visible');
        var targetIndex = currentContainer.index() + direction;

        if (targetIndex < 0) {
            return;
        }

        currentContainer.hide();

        var targetQuizContainer = $('.quiz-container:eq(' + targetIndex + ')');
        targetQuizContainer.show();

        var quizId = targetQuizContainer.data('quiz-id');
        targetQuizContainer.find('.quiz-form').attr('action', '/website/quizes/save-in-cookie-and-do-next/' + quizId);
    }


    function submitQuizForm(button) {
        var form = $(button).closest('form');
        var quizId = form.find('.quiz-option:checked').data('quiz-id'); 

        form.closest('.quiz-container').hide();

        var nextQuizContainer = form.closest('.quiz-container').next('.quiz-container');
        if (nextQuizContainer.length) {
            nextQuizContainer.show();
        } else {
            var lastindex = $('.quiz-container').length - 1;
            if (form.closest('.quiz-container').index() === lastindex) {
                var newContainer = $('<div class="col-lg-12 col-md-12 col-12 quiz-container">' +
                       '<p class="alert alert-warning">Don\'t forget to press the End key button to preserve the data</p>' +
                       '<div class="d-flex justify-content-between align-items-center p-2">' +
                           '<button class="btn btn-secondary mr-2" style="border-radius: 8px; font-size: 24px;" type="button" onclick="navigateQuiz(-1)">' +
                               'Previous' +
                           '</button>' +
                       '</div>' +
                    '</div>');

                $('.quiz-container:last').after(newContainer);
                showFinishedButton()
            }
        }

        $.ajax({
            url: '/website/quizes/save-in-cookie-and-do-next/' + quizId,
            type: 'POST',
            data: form.serialize(),
            success: function(data) {
                // Update the UI or handle success as needed
                $('#category_id').empty();
            },
            error: function(error) {
                console.log(error);
            }
        });
    }



    function finishedQuizForm() {
        var form = $('#finishedQuizForm');
        $.ajax({
            type: form.attr('method'),
            url: form.attr('action'),
            data: form.serialize(),
            success: function (response) {
                disableButton();
     
                // if( response.success){
                    window.location.href = '/website/quizes/solutions';
                    // console.log(response.success);
                // }else{
                // console.log(response.error);
                // }
        },
            error: function(error) {
                // Handle the error response
                console.error(error);
            }
        });
    }

    function disableButton() {
        document.getElementById('finished-button').disabled = true;
    }
    function showFinishedButton() {
        document.getElementById('finished-button').style.display = 'block';
    }

</script>
@endpush


