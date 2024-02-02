@extends('dashboard.layouts.dashboard')

@section('title', 'General Settings Page')

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active"> General Settings Page</li>
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
                
                            {{-- <div class="form-group mx-2">
                                <label for="status" class="sr-only">Select Status</label>
                                <select class="form-control" id="status" name="status">
                                    <option value="" selected>Select Status</option>
                                    <option value="active" {{ request('status') == 'active' ? 'selected' : '' }}>Active</option>
                                    <option value="inactive" {{ request('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
                                    <option value="archive" {{ request('status') == 'archive' ? 'selected' : '' }}>Archive</option>
                                </select>
                            </div> --}}
                
                            <button type="submit" class="btn btn-primary mx-2">Search</button>
                        </form>
                        <div>
                            <a href="{{route('general_settings.create')}}" class="btn btn-primary">Add New General Settings</a>
                        </div>
                    </div>
                </div>
                
                <div class="card-body">
                    <table id="product-table" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                
                                {{-- <th>Facebook Link</th> --}}
                                {{-- <th>Twitter Link</th> --}}
                                {{-- <th>Gmail Link</th> --}}
                                <th>WhatsApp Link</th>
                                {{-- <th>YouTube Link</th> --}}
                                {{-- <th>TikTok Link</th> --}}
                                <th>discriptions</th>
                                {{-- <th>App Store (iPhone) Link</th> --}}
                                {{-- <th>App Store (Android) Link</th> --}}
                                <th>Phone Number</th>
                             
                                <th>Address</th>
                                <th>logo</th>

                                <th>Actions</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($generalSettings as $generalSetting)
                            <tr>
                                <td>{{ $generalSetting->id }}</td>
                                {{-- <td>{{ $generalSetting->facebook_link }}</td> --}}
                                {{-- <td>{{ $generalSetting->twitter_link }}</td> --}}
                                {{-- <td>{{ $generalSetting->gmail_link }}</td> --}}
                                <td>
                                    <a href="{{ $generalSetting->whatsapp_link }}"> whatsapp_link</a> 
                                
                                </td>
                                {{-- <td>{{ $generalSetting->youtube_link }}</td> --}}
                                {{-- <td>{{ $generalSetting->tiktok_link }}</td> --}}
                                <td>{{ $generalSetting->discriptions }}</td>
                                {{-- <td>{{ $generalSetting->app_store_iphone_link }}</td> --}}
                                {{-- <td>{{ $generalSetting->app_store_android_link }}</td> --}}
                                <td>{{ $generalSetting->phone_number }}</td>
                                <td>{{ $generalSetting->address }}</td>
                                <td>
                                    @foreach ($generalSetting->images as $image)
                                        {{-- <img src="{{ asset($image->src) }}" alt="{{ $image->type }}"> --}}
                                        <img src="{{asset('logoImages/' . $image->src) }}" alt="{{ $image->type }}" width="100" height="100">

                                        @endforeach
                                </td>
                                <td> <!-- Add your action button or link here if needed --> </td>
                            </tr>
                            @endforeach
                            {{-- <td>  --}}
                                {{-- <a href="{{route('quiz.edit' , ['quiz' => $quiz->id])}}" class="btn btn-primary">Edit</a>
                                |
                                <form action="{{route('quiz.destroy' , ['quiz' => $quiz->id])}}" method="post" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form> --}}
                            {{-- </td> --}}
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


