@extends('dashboard.layouts.dashboard')

@section('title', '')

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active"> Edit Products Page</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group" role="group" aria-label="Categories">
                            @foreach ($categories as $category)
                            @php
                                // Eager load the sections relationship
                                $category->load('sections');
                        
                                // Check if the category has a section with the specific ID
                                $hasSection = optional($category->sections)->contains('id', $editedProduct->section->id);
                            @endphp
                        
                            <div class="category border border-light p-3 mb-2 {{ $hasSection ? 'bg-primary' : 'bg-dark' }} rounded text-center text-light">
                                <a href="">
                                    <h2>{{ $category->name }}</h2>
                                </a>
                            </div>
                        @endforeach
                        


                        </div>
                        <div>
                            <h2 class="m-0">Edit Products</h2>
                        </div>
                    </div>
                </div>
                
                <div class="card-body">
                    <form action="{{ route('product.update', ['product' => $editedProduct->id]) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('POST')


                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $editedProduct->name }}">
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    
                        {{-- <div class="form-group">
                            <label for="section_id">Section</label>
                            <select class="form-control" id="section_id" name="section_id">
                                <option value="">Select Section</option>
                                @foreach ($sections as $section)
                                    <option value="{{ $section->id }}" {{ $section->id == $editedProduct->section_id ? 'selected' : '' }}>
                                        {{ $section->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('section_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div> --}}
                        

                        <div class="form-group">
                            <label for="section_id">Section</label>
                            <select class="form-control" id="section_id" name="section_id">
                                <option value="">Select Section</option>
                                @foreach ($sections as $section)
                                    <option value="{{ $section->id }}" {{ $section->id == $editedProduct->section_id ? 'selected' : '' }}>
                                        {{ $section->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('section_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        

                    
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" id="description" name="description">{{ $editedProduct->description }}</textarea>
                            @error('description')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    

                        <div class="form-group">
                            <label for="status">Status</label>
                            <select class="form-control" id="status" name="status">
                                <option value="active" {{ $editedProduct->status == 'active' ? 'selected' : '' }}>Active</option>
                                <option value="inactive" {{ $editedProduct->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                                <option value="archive" {{ $editedProduct->status == 'archive' ? 'selected' : '' }}>Archived</option>
                            </select>
                        </div>
                        
                    
                        <div class="form-group">
                            <label for="video">Video</label>
                            <input type="file" class="form-control-file" id="video" name="video">
                            @error('video')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror

                            @if($editedProduct->video)
                                <div class="mt-2">
                                    <p>Current Video:</p>
                                    <video width="320" height="240" controls>
                                        <source src="{{ asset('upload/' . $editedProduct->video) }}" type="video/mp4">
                                        Your browser does not support the video tag.
                                    </video>
                                </div>
                            @endif
                        </div>

                        
                        
                        <button type="submit" class="btn btn-primary">Update</button>

                    </form>
                    
                </div>
            </div>
        </div>
    </div>

@endsection