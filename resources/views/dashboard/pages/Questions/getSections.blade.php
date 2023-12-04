@extends('dashboard.layouts.dashboard')

@section('title', '')

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active"> Create Section Page</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <!-- Sections -->
                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <div class="btn-group" role="group" aria-label="Sections">
                                        @foreach ($sections as $section)
                                            <div class="category border border-light p-3 mb-2 bg-dark rounded text-center text-light">
                                                <a href="{{ route('question.get_quizzes', ['sectionId' => $section->id]) }}">
                                                    <h2>{{ $section->name }}</h2>
                                                </a>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div>
                                <h2 class="m-0">Create Section</h2>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="card-body">
                    <div class="alert alert-danger">
                        <strong>Danger!</strong> You Must Choose The Section
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection