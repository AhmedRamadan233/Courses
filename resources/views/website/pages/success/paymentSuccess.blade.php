@extends('website.layouts.website')

@section('title', 'Course System')


@section('content')

  <!-- Preloader -->
  <div class="preloader">
    <div class="preloader-inner">
      <div class="preloader-icon">
        <span></span>
        <span></span>
      </div>
    </div>
  </div>
  <!-- /End Preloader -->

  <!-- Start Error Area -->
  <div class="maill-success">
    <div class="d-table">
      <div class="d-table-cell">
        <div class="container">
          <div class="success-content">
            <i class="lni lni-envelope"></i>
            <div class="success-message">
                <h2>Your Payment Was Successful</h2>
                <p>Thank You For Your Payment. I Hope You Benefit From The Training Course.</p>
            </div>
            
            <div class="button">
              <a href="{{ route('coursesWebsite.index') }}" class="btn">Back to Home</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- End Error Area -->
<!-- End Shipping Info -->
@endsection

@push('webste.scripts')
    {{-- @if($finishedQuizIds)
        <script>
            history.pushState(null, null, location.href);
            window.onpopstate = function () {
                window.location.href = '{{ route('coursesWebsite.index') }}';
            };
        </script>
    @endif --}}
@endpush






