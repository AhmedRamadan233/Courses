@extends('dashboard.layouts.dashboard')

@section('title', 'Slide Show Page')

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active"> Create Slide Show Page</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-primary card-outline">
                <div class="card-header text-center">
                    <h2 class="m-0">Create Slide Show</h2>
                </div>
                <div class="card-body">
                    
                    <form action="{{ route('general_settings.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                    
                        <div class="form-group">
                            <label for="phone_number">Phone Number</label>
                            <input type="text" class="form-control" id="phone_number" name="phone_number" value="{{ old('phone_number') }}">
                        </div>
                        @error('phone_number')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" class="form-control" id="address" name="address" value="{{ old('address') }}">
                        </div>
                        @error('address')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror


                    <div class="form-group">
                        <label for="descriptions">descriptions</label>
                        <input type="text" class="form-control" id="descriptions" name="descriptions" value="{{ old('descriptions') }}">
                    </div>
                    @error('descriptions')
                    <span class="text-danger">{{ $message }}</span>
                @enderror

                    <div class="form-group">
                        <label for="images">Logo</label>
                        <input type="file" class="form-control" id="images" name="images[]" multiple accept="image/*">
                        @error('images')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>




                        <div class="form-group">
                            <label for="facebook_link">Facebook Link</label>
                            <input type="text" class="form-control" id="facebook_link" name="facebook_link" value="{{ old('facebook_link') }}">
                        </div>
                        @error('facebook_link')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    
                        <div class="form-group">
                            <label for="twitter_link">Twitter Link</label>
                            <input type="text" class="form-control" id="twitter_link" name="twitter_link" value="{{ old('twitter_link') }}">
                        </div>
                        @error('twitter_link')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    
                        <div class="form-group">
                            <label for="gmail_link">Gmail Link</label>
                            <input type="text" class="form-control" id="gmail_link" name="gmail_link" value="{{ old('gmail_link') }}">
                        </div>
                        @error('gmail_link')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    
                        <div class="form-group">
                            <label for="whatsapp_link">WhatsApp Link</label>
                            <input type="text" class="form-control" id="whatsapp_link" name="whatsapp_link" value="{{ old('whatsapp_link') }}">
                        </div>
                        @error('whatsapp_link')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                        <div class="form-group">
                            <label for="youtube_link">YouTube Link</label>
                            <input type="text" class="form-control" id="youtube_link" name="youtube_link" value="{{ old('youtube_link') }}">
                        </div>
                        @error('youtube_link')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    
                        <div class="form-group">
                            <label for="tiktok_link">TikTok Link</label>
                            <input type="text" class="form-control" id="tiktok_link" name="tiktok_link" value="{{ old('tiktok_link') }}">
                        </div>
                        @error('tiktok_link')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    
                       
                    
                        <div class="form-group">
                            <label for="app_store_iphone_link">App Store (iPhone) Link</label>
                            <input type="text" class="form-control" id="app_store_iphone_link" name="app_store_iphone_link" value="{{ old('app_store_iphone_link') }}">
                        </div>
                        @error('app_store_iphone_link')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    
                        <div class="form-group">
                            <label for="app_store_android_link">App Store (Android) Link</label>
                            <input type="text" class="form-control" id="app_store_android_link" name="app_store_android_link" value="{{ old('app_store_android_link') }}">
                        </div>
                        @error('app_store_android_link')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    


                        
                        <div class="form-group">
                            <label for="ImageType">ImageType</label>
                            <select class="form-control" id="ImageType" name="ImageType">
                                <option value="logo">Logo</option>
                               
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>

@endsection

