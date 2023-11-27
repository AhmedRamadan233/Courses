@extends('dashboard.layouts.dashboard')

@section('title', '')

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active"> Webiste Page</li>
@endsection

@section('content')


<div class="row">
    <div class="card-body">
        <div id="video-container" class="embed-responsive embed-responsive-16by9" style="width: 800px; height: 438px;">
            <iframe id="video" class="embed-responsive-item" src="{{ asset('upload/' . $ShowCategory->video) }}" type="video/mp4" frameborder="0" allowfullscreen></iframe>
        </div>

        <!-- Categories -->
        <div class="categories mt-3">
            <h4>Categories:</h4>
            <div class="btn-group" role="group" aria-label="Categories">
                <a type="button" class="btn btn-secondary category">Describtion</a>
                <a type="button" class="btn btn-secondary category">Comman Question</a>
                <button type="button" class="btn btn-secondary category">Cources Container</button>
                <button type="button" class="btn btn-secondary category">Rate</button>
                <button type="button" class="btn btn-secondary category">Others</button>
            </div>
        </div>
    </div>
</div>

@endsection



