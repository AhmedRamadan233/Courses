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
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group" role="group" aria-label="Categories">
                                @foreach ($categories as $category)
                                <div class="category border border-light p-3 mb-2 bg-dark rounded text-center text-light">
                        
                                    <a href="{{ route('quiz.get_sections', ['categoryId' => $category->id]) }}">
                                        <h2>{{ $category->name }}</h2>
                                    </a>
                                </div>
                                @endforeach
                            </div>
                            <div>
                                <h2 class="m-0">Create Products</h2>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="card-body">
                    <form action="{{ route('quiz.store') }}" method="post" enctype="multipart/form-data">

                        @csrf

                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    
                        <div class="form-group">
                            <label for="section_id">Section</label>
                            <select class="form-control" id="section_id" name="section_id">
                                <option value="">Select Section</option>
                                @foreach ($sections as $section)
                                    <option value="{{$section->id }}">{{ $section->name }}</option>
                                @endforeach
                            </select>
                            @error('section_id')
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
                        
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>

@endsection