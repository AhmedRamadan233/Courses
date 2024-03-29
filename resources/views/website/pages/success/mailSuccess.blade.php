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
            <h2>Your Mail Sent Successfully</h2>
            <p>Thanks for contacting with us, We will get back to you asap.</p>
            <div class="button">
              <a href="index.html" class="btn">Back to Home</a>
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






