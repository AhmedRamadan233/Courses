@extends('dashboard.layouts.dashboard')

@section('title', 'Paymob Page')

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active"> Paymob Page</li>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card card-primary card-outline">
            
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <p>
                        Paymob Page
                    </p>
                    <a href="{{route('paymob.create')}}" class="btn btn-primary">Add New Paymob</a>

                </div>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Variable</th>
                            <th>Value</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>PAYMOB_API_KEY</td>
                            <td> {{env('MAIL_FROM_ADDRESS')}}</td>
                        </tr>
                        <tr>
                            <td>PAYMOB_CARD_INTEGRATION_ID</td>
                            <td>***************</td>
                        </tr>
                        <tr>
                            <td>PAYMOB_IFRAM_ID</td>
                            <td>{{ env('PAYMOB_IFRAM_ID') }}</td>
                        </tr>
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
