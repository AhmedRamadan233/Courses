@extends('dashboard.layouts.dashboard')

@section('title', '')

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active"> Webiste Page</li>
@endsection

@section('content')


<div class="row">
    <div class="card-body">
        <!-- Video Container -->
        <div id="video-container" class="embed-responsive embed-responsive-16by9" style="width: 800px; height: 438px;">
            <iframe id="video" class="embed-responsive-item" src="{{ asset('upload/' . $showCategory->video) }}" type="video/mp4" frameborder="0" allowfullscreen></iframe>
        </div>

        <!-- Categories -->
        <div class="categories mt-3">
            <h4>Categories:</h4>
            <div class="btn-group" role="group" aria-label="Categories">
                <button type="button" class="btn btn-secondary category" data-target="description-card">Description</button>
                <button type="button" class="btn btn-secondary category" data-target="common-question-card">Common Question</button>
                <button type="button" class="btn btn-secondary category" data-target="courses-container-card">Courses Container</button>
                <button type="button" class="btn btn-secondary category" data-target="rate-card">Rate</button>
                <button type="button" class="btn btn-secondary category" data-target="others-card">Others</button>
            </div>
        </div>

        <div class="col-lg-12">
            <!-- Description Card -->
            <div id="description-card" class="card card-primary card-outline" style="display: none;">
                <div class="card-header text-center">
                    <h5>Description</h5>
                </div>
                <div class="card-body">
                    @foreach ($categoryDescriptions as $category)
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
            <!--sections -->
            <div id="courses-container-card" class="card card-primary card-outline" style="display: none;">
                <div class="card-header text-center">
                    <h5>Courses Sections</h5>
                </div>
                <div class="card-body">
                    @foreach ($categoryDescriptions as $category)
                        @if ($category->sections)
                            <div class="btn-group" role="group" aria-label="Categories">
                                @foreach ($category->sections as $cousesSection)
                                    <div class="category border border-light p-3 mb-2 bg-dark rounded text-center text-light">
                                        <a href=""><h2>{{ $cousesSection->name }}</h2></a>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <!-- Common Question Card -->
            <div id="common-question-card" class="card card-primary card-outline" style="display: none;">
                <div class="card-header text-center">
                    <h5>Common Question</h5>
                </div>
                <div class="card-body">
                    @foreach ($categoryDescriptions as $category)
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
</div>


@endsection
@push('webste.scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var categoryButtons = document.querySelectorAll('.category');
        var cardContainers = document.querySelectorAll('.col-lg-12 .card');

        categoryButtons.forEach(function (button) {
            button.addEventListener('click', function () {
                var targetId = button.getAttribute('data-target');

                // Hide all card containers
                cardContainers.forEach(function (container) {
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


