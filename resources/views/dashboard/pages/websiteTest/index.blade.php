@extends('dashboard.layouts.dashboard')

@section('title', '')

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active"> Webiste Page</li>
@endsection

@section('content')
    <div class="btn-group" role="group" aria-label="Categories">
        <div class="category border border-light p-3 mb-2 bg-dark rounded text-center text-light">
            <a href=""><h2>ALL</h2></a>
        </div>
        @foreach ($categories as $category)
        <div class="category border border-light p-3 mb-2 bg-dark rounded text-center text-light">

            <a href=""><h2>{{ $category->name }}</h2></a>
        </div>
        @endforeach
    </div>

    <div class="row">
       
        @foreach ($categoriesWithParent as $categoryWithParent)
            <div class="col-lg-3 mb-4">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h5 class="mt-2 mb-3">{{$categoryWithParent->parent->name}}</h5>
                    </div>
                    <div class="card-body text-center">
                        <!-- Video Container -->
                        <div id="video-container" class="embed-responsive embed-responsive-16by9 video-responsive">
                            <iframe id="video" class="embed-responsive-item" src="{{ asset('upload/' . $categoryWithParent->video) }}" type="video/mp4" frameborder="0" allowfullscreen></iframe>
                        </div>
                        <p class="mt-3 text-muted">Salary: {{$categoryWithParent->price}}</p>
                        <h5 class="mt-2 mb-3">Name: {{$categoryWithParent->name}}</h5>
                    </div>
                    <div class="card-footer text-center">
                        <!-- Button -->
                       <a href="{{ route('getCategoryBySlug', ['slug' => $categoryWithParent->slug]) }}" class="btn btn-primary btn-block">Display Category</a>


                    </div>
                </div>
            </div>
        @endforeach
    
    </div>
@endsection



{{-- 
<div class="card-body">
    @foreach ($categories as $categoryWithParent )
    <div id="video-container" class="embed-responsive embed-responsive-16by9" style="width:800px; height: 438px;">
        <iframe id="video" class="embed-responsive-item" src="{{ asset('upload/' . $categoryWithParent->video) }}" type="video/mp4"> frameborder="0" allowfullscreen></iframe>
    </div>

    @endforeach

    <!-- Categories -->
    <div class="categories mt-3">
        <h4>Categories:</h4>
        <div class="btn-group" role="group" aria-label="Categories">
            <button type="button" class="btn btn-secondary categoryWithParent">categoryWithParent 1</button>
            <button type="button" class="btn btn-secondary categoryWithParent">categoryWithParent 2</button>
            <button type="button" class="btn btn-secondary categoryWithParent">categoryWithParent 3</button>
        </div>
    </div>
</div> --}}