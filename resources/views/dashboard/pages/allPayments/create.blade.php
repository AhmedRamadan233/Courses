@extends('dashboard.layouts.dashboard')

@section('title', 'Create PAYMOB Pages')

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">Create PAYMOB Pages</li>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card card-primary card-outline">
            <div class="card-header">
                <div class="d-flex justify-content-center align-items-center">
                    <h3>
                        Create PAYMOB
                    </h3>
                </div>
            </div>

            <div class="card-body">
                <div class="col-12">
                    <form action="{{ route('all_payments.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                    
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
    

                        <div class="form-group">
                            <label for="images">Logo Of Payment</label>
                            <input type="file" class="form-control" id="images" name="images[]" multiple accept="image/*">
                            @error('images')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                     
                        <div class="form-group">
                            <label for="ImageType">ImageType</label>
                            <select class="form-control" id="ImageType" name="ImageType">
                                <option value="logoOfPayment">Logo Of Payment</option>
                                
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="status">Status</label>
                            <select class="form-control" id="status" name="status">
                                <option value="active">Active</option>
                                <option value="archive">Archive</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>

            </div>
            <div class="card-footer text-center">
                <h5 class="m-0">Featured</h5>
            </div>
        </div>
    </div>
</div>
@endsection
