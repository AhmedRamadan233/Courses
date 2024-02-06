@extends('dashboard.layouts.dashboard')

@section('title', 'All Payments Page')

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active"> All Payments Page</li>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card card-primary card-outline">
            
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <p>
                        All Payments Page
                    </p>
                    <a href="{{route('all_payments.create')}}" class="btn btn-primary">Add New Payment</a>

                </div>
            </div>

            <div class="card-body">
                <table id="product-table" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Status</th>
                            <th>Logo</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($allPayments as $payment)
                            <tr>
                                <td>{{$payment->id}}</td>
                                <td>{{$payment->name}}</td>
                                <td>{{$payment->status}}</td>
                                <td>
                                    @foreach ($payment->images as $image)
                                        <img src="{{asset('logoImages/' . $image->src) }}" alt="{{ $image->type }}" width="100" height="100">
                                    @endforeach
                                </td>
                               
                                <td>actions</td>
                                
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
