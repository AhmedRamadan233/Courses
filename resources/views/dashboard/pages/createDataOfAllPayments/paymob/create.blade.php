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
                    <form action="{{ route('updateEnv') }}" method="POST">
                        @csrf
                        <input type="hidden" name="paymon_method" value="paymob">
                
                        <div class="form-group">
                            <input type="hidden" name="types[]" value="PAYMOB_API_KEY">
                            <label for="PAYMOB_API_KEY">PAYMOB_API_KEY</label>
                            <textarea rows="4" id="PAYMOB_API_KEY" name="PAYMOB_API_KEY" class="form-control" placeholder="Add PAYMOB_API_KEY">{{ env('PAYMOB_API_KEY') }}</textarea>
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="types[]" value="PAYMOB_CARD_INTEGRATION_ID">
                            <label for="PAYMOB_CARD_INTEGRATION_ID">PAYMOB_CARD_INTEGRATION_ID</label>
                            <textarea rows="4" id="PAYMOB_CARD_INTEGRATION_ID" name="PAYMOB_CARD_INTEGRATION_ID" class="form-control" placeholder="Add PAYMOB_CARD_INTEGRATION_ID">{{ env('PAYMOB_CARD_INTEGRATION_ID') }}</textarea>
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="types[]" value="PAYMOB_IFRAM_ID">
                            <label for="PAYMOB_IFRAM_ID">PAYMOB_IFRAM_ID</label>
                            <textarea rows="4" id="PAYMOB_IFRAM_ID" name="PAYMOB_IFRAM_ID" class="form-control" placeholder="Add PAYMOB_IFRAM_ID">{{ env('PAYMOB_IFRAM_ID') }}</textarea>
                        </div>
                
                        <div class="d-flex justify-content-between align-items-center pt-3">
                            <p>Add paymob credentials</p>
                            <button type="submit" class="btn btn-primary mx-2">Add</button>
                        </div>
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
