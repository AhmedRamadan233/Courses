@extends('dashboard.layouts.dashboard')

@section('title', '')

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active"> Create Quiz Page</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="btn-group" role="group" aria-label="Categories">
                                        @foreach ($categories as $category)
                                            <div class="category border border-light p-3 mb-2 bg-dark rounded text-center text-light">
                                                <a href="{{ route('quiz.get_sections', ['categoryId' => $category->id]) }}">
                                                    <h2>{{ $category->name }}</h2>
                                                </a>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        
                            <!-- Sections -->
                            {{-- <div class="row mt-3">
                                <div class="col-md-6">
                                    <div class="btn-group" role="group" aria-label="Sections">
                                        @foreach ($sections as $section)
                                            <div class="section border border-light p-3 mb-2 bg-light rounded text-center text-dark">
                                                <a href="{{ route('quiz.get_quizzes', ['sectionId' => $section->id, 'categoryId' => $category->id]) }}">
                                                    <h2>{{ $section->name }}</h2>
                                                </a>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                        
                
                        <!-- Create Quiz -->
                        <div>
                            <h2 class="m-0">Create Quiz</h2>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="alert alert-danger">
                        <strong>Danger!</strong> You Must Choose The Category
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection