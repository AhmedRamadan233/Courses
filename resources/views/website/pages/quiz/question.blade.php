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
                                        <div class="single-product" id="quizFormContainer">
                                            <div class="row align-items-center">
                                                @foreach ($questions as $index => $question)
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
                                                                <i id="savingButton_{{ $question->id }}" onclick="saveThisQuestion({{ $question->id }})" class="lni lni-save" style="font-size: 1.5rem; "></i>



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
                                        <div class="d-flex justify-content-center align-items-center p-2" >
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

                                    <div id="timerOfQuiz" class="price">
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
                           
                            <ul class="list d-flex flex-wrap justify-content-between align-items-center">
                                @foreach ($questions as $index => $question)
                                <li class="btn btn-outline-primary text-dark m-1 flex-grow-1 position-relative" onclick="showQuestion({{ $index }})">
                                    <div class="d-flex align-items-center justify-content-center">
                                        <span class="text-center text-dark">{{ $loop->iteration }}</span>
                                        <span id="spanId_{{ $question->id }}" class="border border-5 border-danger rounded-circle" style="display: none; width: 2em; height: 2em; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);"></span>
                                            
                                        </span>
                                    </div>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>

<script>
    
    $(document).ready(function () {
        var quizTimer = getSession("quizTimer") || {{ $quiz->timer }}; 

        function padZero(value) {
            return value < 10 ? '0' + value : value;
        }

        function updateTimer() {
            var minutes = Math.floor(quizTimer / 60);
            var seconds = quizTimer % 60;
            $('#countdown').text(padZero(minutes) + ':' + padZero(seconds));
            quizTimer--;

            // Update the session storage with the new timer value
            setSession("quizTimer", quizTimer);

            if (quizTimer < 0) {
                clearInterval(timerInterval);
                $('#countdown').text('00:00');
                alert("Finished");

                
                finishedQuizForm();
            }
        }
        function setSession(name, value) {
            sessionStorage.setItem(name, value);
        }
        function getSession(name) {
            return parseInt(sessionStorage.getItem(name));
        }
        function deleteSession(name) {
            sessionStorage.removeItem(name);
        }
        function clearSession() {
        sessionStorage.clear();
    }
        var timerInterval = setInterval(updateTimer, 1000);
    });

    function deleteCookie(cookieName) {
        document.cookie = cookieName + "=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
        var domainParts = window.location.hostname.split('.');
        for (var i = 1; i < domainParts.length; i++) {
            var domain = domainParts.slice(i).join('.');
            document.cookie = cookieName + "=; expires=Thu, 01 Jan 1970 00:00:00 UTC; domain=" + domain + "; path=/;";
        }
    }

    function saveThisQuestion(questionId) {
        var existingData = getAllSavedQuestions();
        var spanElement = document.getElementById('spanId_' + questionId);
        var savingButton = document.getElementById('savingButton_' + questionId);

        if (!existingData.includes(questionId)) {
            existingData.push(questionId);
            saveQuestionsToCookie(existingData);
            spanElement.style.display = 'block';
            savingButton.classList.add("text-danger");
            console.log('Retrieved data from cookie:', existingData);
        } else {
            existingData = existingData.filter(item => item !== questionId);
            saveQuestionsToCookie(existingData);
            spanElement.style.display = 'none';
            savingButton.classList.remove("text-danger");
            console.log('Question removed from the array.');
        }
    }

    function getAllSavedQuestions() {
        var existingData = $.cookie('savedQuestions') ? JSON.parse($.cookie('savedQuestions')) : [];
        existingData = existingData.filter(id => !isNaN(id));
        existingData = existingData.map(id => parseInt(id));
        console.log('All saved question IDs:', existingData);
        return existingData;
    }

    function saveQuestionsToCookie(data) {
        var stringData = data.map(id => id.toString());
        $.cookie('savedQuestions', JSON.stringify(stringData), { expires: 7 });
    }

    var existingData = getAllSavedQuestions();

    existingData.forEach(function (questionId) {
        showSpanById(questionId, true);
    });

    function showSpanById(questionId, isSaved) {
        var spanElement = document.getElementById('spanId_' + questionId);
        var savingButton = document.getElementById('savingButton_' + questionId);

        if (isSaved) {
            spanElement.style.display = 'block';
            savingButton.classList.add("text-danger");
        } else {
            spanElement.style.display = 'none';
            savingButton.classList.remove("text-danger");
        }
    }


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
                window.location.href = '/website/solutions';
                deleteCookie('savedQuestions');
              // Delete the session and reset it to the initial value
                clearSession()
                deleteSession("quizTimer");
                quizTimer = {{ $quiz->timer }};
                setSession("quizTimer", quizTimer);

            // Reload the content with the updated timer
            $('#timerOfQuiz').load(location.href + ' #timerOfQuiz>*', '');
                $('#goToQuiz').load(location.href + ' #goToQuiz>*', '');

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
    function showQuestion(index) {
        $('.quiz-container').hide();
        $('.quiz-container[data-quiz-id="{{ $quiz->id }}"]:eq(' + index + ')').show();  
    }

    
</script>
@endpush


