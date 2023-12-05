

@extends('dashboard.layouts.dashboard')

@section('title', 'Resturant System')

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">Starter Page</li>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-6">

          <div class="card card-primary card-outline">
            <div class="card-header">
              <h5 class="m-0">Quizzes</h5>
            </div>
            <div class="card-body">
                @foreach ($SectionsData as $sectionQuiz)
                    @if ($sectionQuiz->quizzes)
                        <div class="accordion" id="quizzesAccordion{{ $loop->index }}">
                            @foreach ($sectionQuiz->quizzes as $index => $quiz)
                                <div class="category border border-light p-3 mb-2 bg-dark rounded text-center text-light" ">
                                    <h5>{{ $quiz->name }}</h5>
                                </div>
                            @endforeach
                        </div>
                    @endif
                @endforeach
            </div>
          </div>
    </div>
    <!-- /.col-md-6 -->
    <div class="col-lg-6">
        

      <div class="card card-primary card-outline">
        <div class="card-header">
          <h5 class="m-0">Product</h5>
        </div>
        <div class="card-body">
            @foreach ($SectionsData as $sectionProduct)
                @if ($sectionProduct->products)
                    <div class="accordion" id="quizzesAccordion{{ $loop->index }}">
                        @foreach ($sectionProduct->products as $index => $products)
                            <div class="category border border-light p-3 mb-2 bg-dark rounded text-center text-light" ">
                                <h5>{{ $products->name }}</h5>
                            </div>
                        @endforeach
                    </div>
                @endif
            @endforeach
        </div>
      </div>
    </div>
    <!-- /.col-md-6 -->
  </div>
  <!-- /.row -->
@endsection



