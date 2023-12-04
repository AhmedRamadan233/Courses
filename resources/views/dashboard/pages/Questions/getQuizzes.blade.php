@extends('dashboard.layouts.dashboard')

@section('title', '')

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active"> Create Products Page</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="container">
                            <div class="row">
                                {{-- <div class="col-md-6">
                                    <div class="btn-group" role="group" aria-label="Categories">
                                        @foreach ($categories as $category)
                                            <div class="category border border-light p-3 mb-2 bg-dark rounded text-center text-light">
                                                <a href="{{ route('quiz.get_sections', ['categoryId' => $category->id]) }}">
                                                    <h2>{{ $category->name }}</h2>
                                                </a>
                                            </div>
                                        @endforeach
                                    </div>
                                </div> --}}
                            </div>
                        
                            <!-- Sections -->
                            <div class="row mt-3">
                                {{-- <div class="col-md-6">
                                    <div class="btn-group" role="group" aria-label="Sections">
                                        @foreach ($sections as $section)
                                            <div class="section border border-light p-3 mb-2 bg-light rounded text-center text-dark">
                                                <a href="{{ route('quiz.get_quizzes', ['sectionId' => $section->id]) }}">
                                                    <h2>{{ $section->name }}</h2>
                                                </a>
                                            </div>
                                        @endforeach
                                    </div>
                                </div> --}}
                            </div>
                        </div>
                        
                
                        <!-- Create Quiz -->
                        <div>
                            <h2 class="m-0">Create Quiz</h2>
                        </div>
                    </div>
                </div>
                
                <div class="card-body">
                    <form action="" method="post" enctype="multipart/form-data">

                        @csrf

                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- <div class="form-group">
                            <label for="category_id">Section</label>
                            <select class="form-control" id="category_id" name="category_id">
                                <option value="">Select Section</option>
                                @foreach ($categories as $category)
                                    <option value="{{$category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div> --}}


                    
                        {{-- <div class="form-group">
                            <label for="section_id">Section</label>
                            <select class="form-control" id="section_id" name="section_id">
                                <option value="">Select Section</option>
                                @foreach ($categories->sections as $section)
                                    <option value="{{$section->id }}">{{ $section->name }}</option>
                                @endforeach
                            </select>
                            @error('section_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div> --}}
                    
                        <div class="form-group">
                            <label for="section_id">Quizzes</label>
                            <select class="form-control" id="section_id" name="section_id">
                                <option value="">Select Section</option>
                                @foreach ($quizzes as $quiz)
                                    <option value="{{$quiz->id }}">{{ $quiz->name }}</option>
                                @endforeach
                            </select>
                            @error('section_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>


                    
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" id="description" name="description">{{ old('description') }}</textarea>
                            @error('description')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    
                    
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select class="form-control" id="status" name="status">
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                                <option value="archive">Archive</option>
                            </select>
                        </div>
                    
                        <div class="form-group">
                            <label for="video">video </label>
                            <input type="file" class="form-control-file" id="video" name="video">
                            @error('video')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>

@endsection