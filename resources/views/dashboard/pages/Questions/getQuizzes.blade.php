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

                    <div >
                        <h2 class="text-center"">Create Question</h2>
                    </div>

                </div>
                <div class="card-body">
                    <form action="{{route('question.store')}}" method="post" enctype="multipart/form-data">

                        @csrf

                        <div class="form-group">
                            <label for="body">body</label>
                            <input type="text" class="form-control" id="body" name="body" value="{{ old('body') }}">
                            @error('body')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    
                        <div class="form-group">
                            <label for="quiz_id">Quizzes</label>
                            <select class="form-control" id="quiz_id" name="quiz_id">
                                <option value="">Select Section</option>
                                @foreach ($quizzes as $quiz)
                                    <option value="{{$quiz->id }}">{{ $quiz->name }}</option>
                                @endforeach
                            </select>
                            @error('quiz_id')
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