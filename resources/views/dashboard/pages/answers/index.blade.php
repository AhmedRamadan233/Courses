@extends('dashboard.layouts.dashboard')

@section('title', '')

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active"> Answer Page</li>
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
                
                            
                            <button type="submit" class="btn btn-primary mx-2">Search</button>
                        </form>
                        <div>
                            <a href="{{ route('answer.create') }}" class="btn btn-primary">Add New Answer</a>

                        </div>
                    </div>
                </div>
                
                <div class="card-body">
                    <table id="product-table" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Category</th>
                                <th>Section</th>
                                <th>Quiz</th>
                                <th>Question</th>
                                <th>Answer</th> 
                                <th>Correct Answer</th> 
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($answers as $answer)
                                <tr>
                                    <td>{{ $answer->id }}</td>
                                    <td>{{ $answer->question->quiz->section->category->name }}</td>
                                    <td>{{ $answer->question->quiz->section->name }}</td>
                                    <td>{{ $answer->question->quiz->name }}</td>
                                    <td>{{ $answer->question->body }}</td>
                                    <td>{{ $answer->answer }}</td>
                                    <td>
                                        @if($answer->is_correct)
                                            <p class="btn disabled btn-success">TRUE</p>
                                        @else
                                            <p class="btn disabled btn-warning">FALSE</p>
                                        @endif
                                    </td>
                                    
                                    <td> 
                                        {{-- {{route('product.edit' , ['product' => $product->id])}} --}}
                                        <a href="" class="btn btn-primary">Edit</a>
                                        |
                                        {{-- {{route('product.destroy' , ['product' => $product->id])}} --}}
                                        <form action="" method="post" style="display: inline;">
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