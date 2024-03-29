@extends('dashboard.layouts.dashboard')

@section('title', '')

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active"> Quiz Page</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-primary card-outline">
                
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <form action="" method="get" class="form-inline">
                            <div class="form-group mx-2">
                                <label for="name" class="sr-only">Search by Name</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="name" placeholder="Search by name..." name="name" value="{{ request('name') }}">
                                    <div class="input-group-append">
                                        <span class="input-group-text">
                                            <i class="fa fa-search"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                
                            <div class="form-group mx-2">
                                <label for="status" class="sr-only">Select Status</label>
                                <select class="form-control" id="status" name="status">
                                    <option value="" selected>Select Status</option>
                                    <option value="active" {{ request('status') == 'active' ? 'selected' : '' }}>Active</option>
                                    <option value="inactive" {{ request('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
                                    <option value="archive" {{ request('status') == 'archive' ? 'selected' : '' }}>Archive</option>
                                </select>
                            </div>
                
                            <button type="submit" class="btn btn-primary mx-2">Search</button>
                        </form>
                        <div>
                            <a href="{{route('quiz.create')}}" class="btn btn-primary">Add New Quiz</a>
                        </div>
                    </div>
                </div>
                
                <div class="card-body">
                    <table id="product-table" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Main Category</th>
                                <th>Sub Category</th>
                                <th>Section</th>
                                <th>Name</th>                                
                                <th>Status</th>
                                <th>Timer</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($quizzes as $quiz)
                                <tr>
                                    <td>{{ $quiz->id }}</td>
                                    <td>{{ $quiz->section->category->parent->name }}</td>
                                    <td>{{ $quiz->section->category->name }}</td>
                                    <td>{{ $quiz->section->name }}</td>
                                    <td>{{ $quiz->name }}</td>
                                    <td>{{ $quiz->status }}</td>
                                    <td>
                                        {{ sprintf("%02d:%02d:%02d", floor($quiz->timer / 3600), floor(($quiz->timer % 3600) / 60), $quiz->timer % 60) }}
                                    </td>
                                    

                                    <td> 
                                        <a href="{{route('quiz.edit' , ['quiz' => $quiz->id])}}" class="btn btn-primary">Edit</a>
                                        |
                                        <form action="{{route('quiz.destroy' , ['quiz' => $quiz->id])}}" method="post" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                            @endforeach
                           
                        </tbody>
                    </table>
                </div>
                <div class="card-footer text-center">
                    <h5 class="m-0">Featured</h5>
                </div>
            </div>
        </div>
    </div>
@endsection


