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
                                <div class="post-thumbnils">
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
                                    <h2 class="post-title">
                                        <a href="blog-single.html">{{$showCategory->name}}</a>
                                    </h2>
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
                                    {{-- <p>We denounce with righteous indige nation and dislike men who are so beguiled and
                                        demo
                                        realized by the charms of pleasure of the moment, so blinded by desire, that
                                        they
                                        cannot
                                        foresee the pain and trouble that are bound to ensue; and equal blame belongs to
                                        those
                                        who fail in their duty through weakness of will, which is the same as saying
                                        through
                                        shrinking from toil and pain. These cases are perfectly simple and easy to
                                        distinguish.
                                        In a free hour, when our power of choice is untrammelled and when nothing
                                        prevents
                                        our
                                        being able to do what we like best, every pleasure is to be welcomed and every
                                        pain
                                        avoided.</p>
                                    <!-- post image -->
                                    <ul class="list">
                                        <li><i class="lni lni-checkmark-circle"></i> For those of you who are serious
                                            about having
                                            more.</li>
                                        <li><i class="lni lni-checkmark-circle"></i> There are a million distractions in
                                            every
                                            facet of our lives.</li>
                                        <li><i class="lni lni-checkmark-circle"></i> The sad thing is the majority of
                                            people have
                                            no clue about what they truly want.</li>
                                        <li><i class="lni lni-checkmark-circle"></i> Once you have a clear understanding
                                            of what you
                                            want</li>
                                        <li><i class="lni lni-checkmark-circle"></i> Focus is having the unwavering
                                            attention to
                                            complete what you set out to do.</li>
                                    </ul>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                                        nostrud
                                        exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute
                                        irure
                                        dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
                                        pariatur.
                                        Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia. </p>
                                    <!-- post quote --> --}}
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
                                    
                                    <blockquote>
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
                                        dolor in reprehenderit. </p>
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
                            <div class="post-comments">
                                <h3 class="comment-title"><span>Post comments</span></h3>
                                <ul class="comments-list">
                                    <li>
                                        <div class="comment-img">
                                            <img src="https://via.placeholder.com/150x150" alt="img">
                                        </div>
                                        <div class="comment-desc">
                                            <div class="desc-top">
                                                <h6>Arista Williamson</h6>
                                                <span class="date">19th May 2023</span>
                                                <a href="javascript:void(0)" class="reply-link"><i
                                                        class="lni lni-reply"></i>Reply</a>
                                            </div>
                                            <p>
                                                Donec aliquam ex ut odio dictum, ut consequat leo interdum. Aenean nunc
                                                ipsum, blandit eu enim sed, facilisis convallis orci. Etiam commodo
                                                lectus
                                                quis vulputate tincidunt. Mauris tristique velit eu magna maximus
                                                condimentum.
                                            </p>
                                        </div>
                                    </li>
                                    <li class="children">
                                        <div class="comment-img">
                                            <img src="https://via.placeholder.com/150x150" alt="img">
                                        </div>
                                        <div class="comment-desc">
                                            <div class="desc-top">
                                                <h6>Rosalina Kelian</h6>
                                                <span class="date">15th May 2023</span>
                                                <a href="javascript:void(0)" class="reply-link"><i
                                                        class="lni lni-reply"></i>Reply</a>
                                            </div>
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                                tempor incididunt ut labore et dolore magna aliqua. Ut enim.
                                            </p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="comment-img">
                                            <img src="https://via.placeholder.com/150x150" alt="img">
                                        </div>
                                        <div class="comment-desc">
                                            <div class="desc-top">
                                                <h6>Alex Jemmi</h6>
                                                <span class="date">12th May 2023</span>
                                                <a href="javascript:void(0)" class="reply-link"><i
                                                        class="lni lni-reply"></i>Reply</a>
                                            </div>
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim
                                                veniam.
                                            </p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="comment-form">
                                <h3 class="comment-reply-title">Leave a comment</h3>
                                <form action="#" method="POST">
                                    <div class="row">
                                        <div class="col-lg-6 col-12">
                                            <div class="form-box form-group">
                                                <input type="text" name="name" class="form-control form-control-custom"
                                                    placeholder="Website URL" />
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-12">
                                            <div class="form-box form-group">
                                                <input type="text" name="email" class="form-control form-control-custom"
                                                    placeholder="Your Name" />
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-12">
                                            <div class="form-box form-group">
                                                <input type="email" name="email"
                                                    class="form-control form-control-custom" placeholder="Your Email" />
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-12">
                                            <div class="form-box form-group">
                                                <input type="text" name="name" class="form-control form-control-custom"
                                                    placeholder="Phone Number" />
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-box form-group">
                                                <textarea name="#" class="form-control form-control-custom"
                                                    placeholder="Your Comments"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="button">
                                                <button type="submit" class="btn">Post Comment</button>
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
                            <h5 class="widget-title">Featured Posts</h5>
                            <div class="popular-feed-loop form-group">
                                <div class="btn-group" role="group" aria-label="Categories">
                                    @foreach ($allRelationsWithCategory as $category)
                                        @if ($category->sections)
                                            @foreach ($category->sections as $index => $courseSection)
                                                <button type="button" class="btn btn-secondary category" data-target="{{ $courseSection->id }}">{{ $courseSection->name }}</button>
                                            @endforeach
                                        @endif
                                    @endforeach
                                </div>
                                    @foreach ($allRelationsWithCategory as $category)
                                        @foreach ($category->sections as $index => $courseSection)
                                            <div class="main-category" id="main-category-{{$courseSection->id }}" style="display: none;">
                                            @foreach ($courseSection->quizzes as $courseQuiz)
                                                <div class="single-popular-feed">
                                                    <div class="feed-desc">
                                                        {{-- <a class="feed-img" href="blog-single-sidebar.html">
                                                            <img src="https://via.placeholder.com/200x200" alt="#">
                                                        </a> --}}
                                                        <h2 class="post-title">
                                                            <a href="{{route('quizWebsite.index')}}">{{ $courseQuiz->name }}</a>
                                                        </h2>
                                                        {{-- <span class="time"><i class="lni lni-calendar"></i> 30th Jan 2023</span> --}}
                                                    </div>
                                                </div>
                                            @endforeach
                                
                                            @foreach ($courseSection->products as $courseProduct)
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
                                                            <a href="">{{ $courseProduct->name }}</a>
                                                        </h2>
                                                        <span class="time"><i class="lni lni-calendar"></i>{{ $courseProduct->description}}</span>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    @endforeach
                                @endforeach
                                
                                {{-- <div class="single-popular-feed">
                                    <div class="feed-desc">
                                        <a class="feed-img" href="blog-single-sidebar.html">
                                            <img src="https://via.placeholder.com/200x200" alt="#">
                                        </a>
                                        <h6 class="post-title"><a href="blog-single-sidebar.html">What information is
                                                needed for shipping?</a></h6>
                                        <span class="time"><i class="lni lni-calendar"></i> 05th Nov 2023</span>
                                    </div>
                                </div>
                                <div class="single-popular-feed">
                                    <div class="feed-desc">
                                        <a class="feed-img" href="blog-single-sidebar.html">
                                            <img src="https://via.placeholder.com/200x200" alt="#">
                                        </a>
                                        <h6 class="post-title"><a href="blog-single-sidebar.html">Interesting fact about
                                                gaming consoles</a></h6>
                                        <span class="time"><i class="lni lni-calendar"></i> 24th March 2023</span>
                                    </div>
                                </div>
                                <div class="single-popular-feed">
                                    <div class="feed-desc">
                                        <a class="feed-img" href="blog-single-sidebar.html">
                                            <img src="https://via.placeholder.com/200x200" alt="#">
                                        </a>
                                        <h6 class="post-title"><a href="blog-single-sidebar.html">Electronics,
                                                instrumentation & control engineering </a></h6>
                                        <span class="time"><i class="lni lni-calendar"></i> 30th Jan 2023</span>
                                    </div>
                                </div> --}}
                                  
                                
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
    $(document).ready(function () {
        var categoryButtons = $('.category');
        var cardContainers = $('.main-category');

        categoryButtons.click(function () {
            var targetIndex = $(this).data('target');

            // Hide all card containers

            cardContainers.hide();
            // container.style.display = 'none';

            // Show the selected card container based on index
            var targetContainer = $('#main-category-' + targetIndex);
            if (targetContainer.length) {
                targetContainer.show();
            }
        });

        console.log('after addEventListener');
    });


  // ------------------------------------- 
  document.addEventListener('DOMContentLoaded', function () {
        var categoryButtonss = document.querySelectorAll('.category');
        var cardContainerss = document.querySelectorAll('.col-lg-12 .card');

        categoryButtonss.forEach(function (button) {
            button.addEventListener('click', function () {
                var targetId = button.getAttribute('data-target');

                // Hide all card containers
                cardContainerss.forEach(function (container) {
                    container.style.display = 'none';
                });

                // Show the selected card container
                var targetContainer = document.getElementById(targetId);
                if (targetContainer) {
                    targetContainer.style.display = 'block';
                }
            });
        });
    });
</script>

@endpush



