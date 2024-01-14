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
                                                @foreach ($questions as $question)
                                                    <div class="col-lg-12 col-md-12 col-12">
                                                        <form method="post" action="{{ route('quizWebsite.finishedQuiz', ['id' => $quiz->id]) }}" id="quizForm">
                                                            @csrf
                                                        
                                                            <input type="hidden" name="_method" value="post">

                                                            <div class="product-info">
                                                                <div class="d-flex justify-content-between align-items-center p-2">
                                                                    <h3 name ="question_id" class="font-weight-bold p-2 text-primary" style="border-radius: 8px;">{{ $question->body }}</h3>
                                                                    {{-- <a href="#">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bookmarks" viewBox="0 0 16 16">
                                                                            <path d="M2 4a2 2 0 0 1 2-2h6a2 2 0 0 1 2 2v11.5a.5.5 0 0 1-.777.416L7 13.101l-4.223 2.815A.5.5 0 0 1 2 15.5zm2-1a1 1 0 0 0-1 1v10.566l3.723-2.482a.5.5 0 0 1 .554 0L11 14.566V4a1 1 0 0 0-1-1z"/>
                                                                            <path d="M4.268 1H12a1 1 0 0 1 1 1v11.768l.223.148A.5.5 0 0 0 14 13.5V2a2 2 0 0 0-2-2H6a2 2 0 0 0-1.732 1"/>
                                                                          </svg>
                                                                    </a> --}}
                                                                </div>
                            
                                                                <ul class="options p-2">
                                                                    @foreach ($question->answers as $answer)
                                                                        <li class="m-3">
                                                                            <input  name="answer_id" class="form-check-input" type="radio" name="quizOption" id="option{{ $loop->parent->index + 1 }}{{ $loop->index + 1 }}" value="{{ $answer->answer }}">
                                                                            <label class=" form-check-label font-weight-bold" for="option{{ $loop->parent->index + 1 }}{{ $loop->index + 1 }}">{{ $answer->answer }}</label>
                                                                        </li>
                                                                    @endforeach
                                                                </ul>
                                                            </div>
                                                            <div class="d-flex justify-content-between align-items-center p-2">
                                                                <label class="form-check-label font-weight-bold">Next to another Question</label>
                                                            
                                                                <button class="btn btn-outline-primary" style="border-radius: 8px; font-size: 24px;" type="submit">
                                                                    Next
                                                                </button>
                                                            </div>
                                                        </form>

                                                    </div>
                                                    
                                                @endforeach
                                            </div>
                                        </div>
                                        <!-- End Single Product -->
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
                            {{ $questions->links('vendor.pagination.numircal')}}

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

    function updateTimer() {
        var minutes = Math.floor(quizTimer / 60);
        var seconds = quizTimer % 60;
        $('#countdown').text(padZero(minutes) + ':' + padZero(seconds));
        quizTimer--;

        if (quizTimer < 0) {
            clearInterval(timerInterval);
            $('#countdown').text('00:00');
            alert("finshed")
        }
    }

    function padZero(value) {
        return value < 10 ? '0' + value : value;
    }

    // Update the timer every second
    var timerInterval = setInterval(updateTimer, 1000);
});

</script>
@endpush


