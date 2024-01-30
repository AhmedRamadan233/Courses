@extends('website.layouts.website')

@section('title', 'Course System')


@section('content')
    <!-- Start Blog Singel Area -->
    <section class="section blog-single">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12 col-12">
                    <div class="single-inner">
                        <div class="post-details">
                            <div class="main-content-head">
                                <div class="post-thumbnils" id="lecture" >
                                    <video 
                                    
                                        style="width: 850px; height: 460px;" 
                                        id="video" 
                                        class="embed-responsive-item" 
                                        controls
                                        
                                    >
                                        <source src="{{ asset('upload/' . $showCategory->video) }}" type="video/mp4">
                                    </video>
                                </div>
                                
                                <div class="meta-information">
                                   
                                    <div class="d-flex justify-content-between align-items-center  p-3 rounded">
                                        <h1 class="post-title">
                                            <a href="blog-single.html">{{$showCategory->name}}</a>
                                        </h1>
                                        <button type="button" class="btn btn-danger category" data-target="">X</button>
                                    </div>
                                    <!-- End Meta Info -->
                                    
                                    <ul class="meta-info">
                                        <li>
                                            
                                            <button type="button" class="btn btn-link text-dark category" style="text-decoration: none;" data-target="description-card" >
                                                Description
                                            </button>
                                        </li>
                                        <li>
                                            <button type="button" class="btn btn-link text-dark category" style="text-decoration: none;" data-target="common-question-card">Common Question</button>
                                        </li>
                                        <li>
                                            <button type="button" class="btn btn-link text-dark category" style="text-decoration: none;" data-target="rate-card">Rate</button>

                                        </li>
                                        <li>
                                            <button type="button" class="btn btn-link text-dark category" style="text-decoration: none;" data-target="others-card">Others</button>

                                        </li>

                                    </ul>
                                    <!-- End Meta Info -->
                                </div>
                                <div class="detail-inner">
                                    
                                    <div class="row">
                                        <div class="col-lg-12 pt-3">
                                            <!-- Description Card -->
                                            <div id="description-card" class="card card-primary card-outline" style="display: none;">
                                               
                                                <div class="card-body">
                                                    @foreach ($allRelationsWithCategory as $category)
                                                        @if ($category->description)
                                                            @foreach ($category->description as $description)
                                                                <h5>{{ $description->question }}</h5>
                                                                <p>{{ $description->answer }}</p>
                                                            @endforeach
                                                        @endif
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <!-- Common Question Card -->
                                            <div id="common-question-card" class="card card-primary card-outline" style="display: none;">
                                                
                                                <div class="card-body">
                                                    @foreach ($allRelationsWithCategory as $category)
                                                        @if ($category->commonQestions)
                                                            @foreach ($category->commonQestions as $commonQestions)
                                                                <h5>{{ $commonQestions->question }}</h5>
                                                                <p>{{ $commonQestions->answer }}</p>
                                                            @endforeach
                                                        @endif
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    {{-- <blockquote>
                                        <div class="icon">
                                            <i class="lni lni-quotation"></i>
                                        </div>
                                        <h4>"Don't demand that things happen as you wish, but wish that they happen as
                                            they
                                            do
                                            happen, and you will go on well."</h4>
                                        <span>- Epictetus, The Enchiridion</span>
                                    </blockquote>
                                    <h3>Setting the mood with incense</h3>
                                    <p>Remove aversion, then, from all things that are not in our control, and transfer
                                        it
                                        to
                                        things contrary to the nature of what is in our control. But, for the present,
                                        totally
                                        suppress desire: for, if you desire any of the things which are not in your own
                                        control,
                                        you must necessarily be disappointed; and of those which are, and which it would
                                        be
                                        laudable to desire, nothing is yet in your possession. Use only the appropriate
                                        actions
                                        of pursuit and avoidance; and even these lightly, and with gentleness and
                                        reservation.
                                    </p>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                                        nostrud
                                        exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute
                                        irure
                                        dolor in reprehenderit.
                                    </p> --}}
                                    <div class="post-bottom-area">
                                        <!-- Start Post Tag -->
                                        <div class="post-tag">
                                            <ul>
                                                <li><a href="javascript:void(0)">#electronics,</a></li>
                                                <li><a href="javascript:void(0)">#gadgets</a></li>
                                            </ul>
                                        </div>
                                        <!-- End Post Tag -->
                                        <!-- Post Social Share -->
                                        <div class="post-social-media">
                                            <h5 class="share-title">Share post :</h5>
                                            <ul>
                                                <li>
                                                    <a href="javascript:void(0)">
                                                        <i class="lni lni-facebook-filled"></i>
                                                        <span>facebook</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0)">
                                                        <i class="lni lni-twitter-original"></i>
                                                        <span>twitter</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0)">
                                                        <i class="lni lni-google"></i>
                                                        <span>google+</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0)">
                                                        <i class="lni lni-linkedin-original"></i>
                                                        <span>linkedin</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0)">
                                                        <i class="lni lni-pinterest"></i>
                                                        <span>pinterest</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <!-- Post Social Share -->
                                    </div>

                                </div>
                            </div>
                            <!-- Comments -->
                            <div class="post-comments" id="displayComments">
                                <h3 class="comment-title"><span>Post comments</span></h3>
                                <ul class="comments-list">
                                    @foreach ($allRelationsWithCategory as $category)
                                        @if ($category->comments)
                                            @foreach ($category->comments as $comment)
                                                @if ($comment->parent_id === null)
                                                    {{-- Parent Comment --}}
                                                    <li>
                                                        <div class="comment-img">
                                                            <img src="{{ $comment->user->profile_image ?? 'https://via.placeholder.com/150x150' }}" alt="img">
                                                        </div>
                                                        <div class="comment-desc">
                                                            <div class="desc-top">
                                                                <h6>{{ $comment->user->name ?? 'Unknown User' }}</h6>
                                                                {{-- Add your date display logic here --}}
                                                                <span class="date">Date Placeholder</span>
                                                                {{-- <a href="javascript:void(0)" class="reply-link"><i class="lni lni-reply"></i>Reply</a> --}}
                                                            </div>
                                                            <p>{{ $comment->comment }}</p>
                                                        </div>
                                
                                                        {{-- Check if the comment has children --}}
                                                        @if ($comment->children->count() > 0)
                                                            {{-- Display children comments --}}
                                                                @foreach ($comment->children as $childComment)
                                                                    {{-- Child Comment --}}
                                                                    <li  class="children">
                                                                        <div class="comment-img">
                                                                            <img src="{{ $childComment->user->profile_image ?? 'https://via.placeholder.com/150x150' }}" alt="img">
                                                                        </div>
                                                                        <div class="comment-desc">
                                                                            <div class="desc-top">
                                                                                <h6>{{ $childComment->user->name ?? 'Unknown User' }}</h6>
                                                                                {{-- Add your date display logic here --}}
                                                                                <span class="date">Date Placeholder</span>
                                                                                {{-- <a href="javascript:void(0)" class="reply-link"><i class="lni lni-reply"></i>Reply</a> --}}
                                                                            </div>
                                                                            <p>{{ $childComment->comment }}</p>
                                                                        </div>
                                                                    </li>
                                                                @endforeach
                                                        @endif
                                                    </li>
                                                @endif
                                            @endforeach
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                            <div class="comment-form">
                                <h3 class="comment-reply-title">Leave a comment</h3>
                                <form id="commentForm" method="POST" action="{{ route('commentsWebsite.store', ['categorySlug' => $showCategory->slug]) }}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-box form-group">
                                                <textarea id="commentTextID" name="comment" class="form-control form-control-custom" placeholder="Your Comments"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="button">
                                                <button type="button" id="postComment" class="btn" onclick="addComment()">Post Comment</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                
                            </div>
                            
                        </div>
                    </div>
                </div>
                <aside class="col-lg-4 col-md-12 col-12">
                    <div class="sidebar blog-grid-page">
                        <!-- Start Single Widget -->
                        <div class="widget search-widget">
                            <h5 class="widget-title">Search This Site</h5>
                            <form action="#">
                                <input type="text" placeholder="Search Here...">
                                <button type="submit"><i class="lni lni-search-alt"></i></button>
                            </form>
                        </div>
                        <!-- End Single Widget -->
                        <!-- Start Single Widget -->
                        <div class="widget popular-feeds">
                            <div class="d-flex justify-content-between align-items-center  p-3 rounded">
                                <h5 class="widget-title m-0">All Sections</h5>
                            </div>
                            <div class="popular-feed-loop form-group">
                                <div class="checkout-steps-form-style-1">
                                    <ul id="accordionExample">
                                        @foreach ($allRelationsWithCategory as $category)
                                            @if ($category->sections)
                                                @foreach ($category->sections as $index => $courseSection)
                                                    <li>
                                                        <h6 class="title" data-bs-toggle="collapse" data-bs-target="#collapseThree_{{$index}}"
                                                            aria-expanded="true" aria-controls="collapseThree_{{$index}}">
                                                            {{ $courseSection->name }}
                                                        </h6>
                                                        <section class="checkout-steps-form-content collapse show" id="collapseThree_{{$index}}"
                                                            aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="single-form form-default">
                                                                        @foreach ($courseSection->products as $courseProduct)
                                                                        <div class="single-popular-feed">
                                                                            <div class="feed-desc">
                                                                                <a class="feed-img" href="{{ route('lectureWebsite.getLectureByID', ['lectureId' => $courseProduct->id]) }}">
                                                                                    {{-- Add your video thumbnail or other content here --}}
                                                                                </a>
                                                                                <h2 class="post-title">
                                                                                    <a class="lecture-link" href="{{ route('lectureWebsite.getLectureByID', ['lectureId' => $courseProduct->id]) }}">{{ $courseProduct->name }}</a>
                                                                                </h2>
                                                                            </div>
                                                                        </div>
                                                                    @endforeach
                                                                    
                                                                            

                                                                            @foreach ($courseSection->quizzes as $courseQuiz)
                                                                            <div class="single-popular-feed">
                                                                                <div class="feed-desc">
                                                                                    {{-- <a class="feed-img" href="blog-single-sidebar.html">
                                                                                        <video 
                                                                                            style="width:200px; height: 200px;" 
                                                                                            id="video" 
                                                                                            class="embed-responsive-item" 
                                                                                            controls
                                                                                        >
                                                                                            <source src="{{ asset('upload/' . $showCategory->video) }}" type="video/mp4">
                                                                                        </video>
                                                                                    </a> --}}
                                                                                    <h2 class="post-title">
                                                                                        <a href="{{ route('quizWebsite.index', ['id' => $courseQuiz->section->id]) }}">{{ $courseQuiz->name }}</a>

                                                                                    </h2>
                                                                                </div>
                                                                            </div>
                                                                        @endforeach
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </section>
                                                    </li>
                                                @endforeach
                                            @endif
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Widget -->
                        <!-- Start Single Widget -->
                        {{-- <div class="widget categories-widget">
                            <h5 class="widget-title">Top Categories</h5>
                            <ul class="custom">
                                <li>
                                    <a href="javascript:void(0)">Editor's Choice</a><span>(24)</span>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">Electronics</a><span>(12)</span>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">Industrial Design</a><span>(5)</span>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">Secure Payments Online</a><span>(15)</span>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">Online Shopping</a><span>(7)</span>
                                </li>
                            </ul>
                        </div> --}}
                        <!-- End Single Widget -->
                        <!-- Start Single Widget -->
                        {{-- <div class="widget popular-tag-widget">
                            <h5 class="widget-title">Popular Tags</h5>
                            <div class="tags">
                                <a href="javascript:void(0)">#electronics</a>
                                <a href="javascript:void(0)">#cpu</a>
                                <a href="javascript:void(0)">#gadgets</a>
                                <a href="javascript:void(0)">#wearables</a>
                                <a href="javascript:void(0)">#smartphones</a>
                            </div>
                        </div> --}}
                        <!-- End Single Widget -->
                    </div>
                </aside>
            </div>
        </div>
    </section>
    <!-- End Blog Singel Area -->
@endsection
@push('webste.scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    var categoryButtonss = document.querySelectorAll('.category');
    var cardContainerss = document.querySelectorAll('.col-lg-12 .card');

    categoryButtonss.forEach(function (button) {
        button.addEventListener('click', function () {
            var targetId = button.getAttribute('data-target');

            cardContainerss.forEach(function (container) {
                container.style.display = 'none';
            });

            var targetContainer = document.getElementById(targetId);
            if (targetContainer) {
                targetContainer.style.display = 'block';
            }
        });
    });
});

$(document).ready(function() {
    $('.lecture-link').on('click', function(e) {
        e.preventDefault();
        var href = $(this).attr('href');
        var lectureId = href.substring(href.lastIndexOf('/') + 1);
        $.ajax({
            url: '/website/lecture/' + lectureId,
            type: 'GET',
            success: function(data) {             
                $('#video source').attr('src', "{{ asset('upload/') }}/" + data.lecture.video);
                $('#video')[0].load();  
            },
            error: function(xhr, status, error) {
                console.error(error); 
            }
        });
    });
});

function addComment() {
    var form = $('#commentForm');
    $.ajax({
        type: form.attr('method'),
        url: form.attr('action'),
        data: form.serialize(),
        success: function (response) {
            $('#commentTextID').val('');
            $('#displayComments').load(location.href + ' #displayComments>*', '');
        },
        error: function(error) {
            // Handle the error response
            console.error(error);
        }
    });
}





</script>

@endpush



