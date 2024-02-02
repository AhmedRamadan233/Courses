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
                                <th>Phone Number</th>
                                <th>Address</th>
                                <th>logo</th>
                                <th>discriptions</th>
                                {{-- <th><i class="lni lni-facebook-original"></i></th> --}}
                                {{-- <th><i class="lni lni-twitter-original"></i></th> --}}
                                {{-- <th><i class="lni lni-envelope">x</i></th> --}}
                                {{-- <th><i class="lni lni-whatsapp">x</i></th> --}}
                                {{-- <th><i class="lni lni-github"></i></th> --}}
                                {{-- <th><i class="lni lni-linkedin-original">x</i></th> --}}
                                {{-- <th><i class="lni lni-ios"></i></th> --}}
                                {{-- <th><i class="lni lni-android-original"></i></th> --}}
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($generalSettings as $generalSetting)
                            <tr>
                                <td>{{ $generalSetting->id }}</td>
                                <td>{{ $generalSetting->phone_number }}</td>
                                <td>{{ $generalSetting->address }}</td>
                                <td>
                                    @foreach ($generalSetting->images as $image)
                                        <img src="{{asset('logoImages/' . $image->src) }}" alt="{{ $image->type }}" width="100" height="100">
                                    @endforeach
                                </td>
                               
                                <td>{{ $generalSetting->descriptions }}</td>
                                {{-- <td><a href="{{ $generalSetting->facebook_link }}"><i class="lni lni-facebook-original"></i></a></td> --}}
                                {{-- <td><a href="{{ $generalSetting->twitter_link }}"><i class="lni lni-twitter-original"></i></a></td> --}}
                                {{-- <td><a href="{{ $generalSetting->gmail_link }}"><i class="lni lni-envelope"></i></a></td> --}}
                                {{-- <td><a href="{{ $generalSetting->whatsapp_link }}"><i class="lni lni-whatsapp"></i></a></td> --}}
                                {{-- <td><a href="{{ $generalSetting->youtube_link }}"><i class="lni lni-gitdub"></i></a></td> --}}
                                {{-- <td><a href="{{ $generalSetting->tiktok_link }}"><i class="lni lni-linkedin-original"></a></i></td> --}}
                                {{-- <td><a href="{{ $generalSetting->app_store_iphone_link }}"><i class="lni lni-ios"></i></a></td> --}}
                                {{-- <td><a href="{{ $generalSetting->app_store_android_link }}"><i class="lni lni-android-original"></i></a></td> --}}
                                <td>Actions</td>
                            </tr>
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


