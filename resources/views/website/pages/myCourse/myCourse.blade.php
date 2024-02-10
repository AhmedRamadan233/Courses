@extends('website.layouts.website')

@section('title', 'Course System')


@section('content')
      <!-- Start Blog Singel Area -->
      <section class="section blog-section blog-list">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12 col-12">
                    <div class="row">
                        @foreach ($categories as $index=>$category )  
                            @if ($category->parent_id !== null)
                            <div class="col-lg-6 col-md-6 col-12">
                                <!-- Start Single Blog -->
                                <div class="single-blog">
                                    <div class="blog-img">
                                        <video 
                                            style="width: 400px; height: auto;" 
                                            id="video_{{ $category->id }}" 
                                            class="embed-responsive-item" 
                                            controls
                                        >
                                            <source src="{{ asset('upload/' . $category->video) }}" type="video/mp4">
                                        </video>
                                    </div>
                                    <div class="blog-content">
                                        <a class="category" href="javascript:void(0)">{{$category->parent->name}}</a>
                                        <h4>
                                            <a href="blog-single-sidebar.html">{{$category->name}}</a>
                                        </h4>
                                        <div class="button">
                                            <a href="{{ route('category.getMyCategoryBySlug' ,['slug' => $category->slug] )}}" class="btn">Go To Course</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Single Blog -->
                            </div>
                            @endif
                        @endforeach

                       
                    </div>
                    <!-- Pagination -->
                    <div class="pagination left blog-grid-page">
                        {{ $categories->links() }}

                    </div>
                    <!--/ End Pagination -->
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
                            <h5 class="widget-title">Course Suggestions</h5>
                            <div class="popular-feed-loop">
                                @foreach ($shuffledCategories as $index=>$category )  
                                    @if ($category->parent_id !== null)
                                        <div class="single-popular-feed">
                                            <div class="feed-desc">
                                                {{-- <a class="feed-img" href="blog-single-sidebar.html">
                                                    <img src="https://via.placeholder.com/200x200" alt="#">
                                                </a> --}}
                                                <h6 class="post-title"><a href="{{ route('category.getCategoryBySlug' ,['slug' => $category->slug] )}}">{{$category->name}}</a></h6>
                                                <span class="time"> {{$category->parent->name}}</span>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
    
                            </div>
                        </div>
                        <!-- End Single Widget -->
                        <!-- Start Single Widget -->
                       
                        <!-- End Single Widget -->
                        <!-- Start Single Widget -->
                        <div class="widget popular-tag-widget">
                            <h5 class="widget-title">Popular Tags</h5>
                            <div class="tags">
                                <a href="javascript:void(0)">#electronics</a>
                                <a href="javascript:void(0)">#cpu</a>
                                <a href="javascript:void(0)">#gadgets</a>
                                <a href="javascript:void(0)">#wearables</a>
                                <a href="javascript:void(0)">#smartphones</a>
                            </div>
                        </div>
                        <!-- End Single Widget -->
                    </div>
                </aside>
            </div>
        </div>
    </section>
    <!-- End Blog Singel Area -->
@endsection
@push('webste.scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>

<script>

</script>
@endpush


