@extends('dashboard.layouts.dashboard')

@section('title', 'Resturant System')

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active"> Category Page</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        {{-- <form id="status-form" action="{{ route('category.index') }}" method="get" class="form-inline">
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
                        </form> --}}
                        <div>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addCategoryModal">
                                Add New Category
                            </button>
                        </div>
                    </div>
                </div>
                
                <div class="card-body">
                    <table id="category-table" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                           
                        </tbody>
                    </table>
                </div>

                <div class="card-footer text-center">
                    <h5 class="m-0">Featured</h5>
                </div>
            </div>
        </div>
    </div>
    @include("dashboard.pages.categories.addCategoryModel")    
    {{-- @include("dashboard.pages.categories.editCategoryModel") --}}
    @push('category.scripts')
    <script>
        toastr.options.preventDuplicates = true;
        toastr.options.positionClass = 'toast-top-center';
        
        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(function() {
            // Initialize DataTable with server-side processing
            $('#category-table').DataTable({
                processing: true,
                info: true,
                serverSide: true,
                ajax: {
                    url: '{{ route('category.index')}}',
     
                },
                pageLength: 5,
                lengthMenu: [5, 10, 15, 20],
                columns: [
                    { data: 'DT_RowIndex', name: 'DT_RowIndex' },
                    { data: 'name', name: 'name' },
                    { data: 'description', name: 'description' },
                    { data: 'status', name: 'status' },
                    { data: 'actions', name: 'actions', orderable: false, searchable: false }
                ],
            });
            // add new category
            $('#add-category-form').on('submit', function (e) {
                e.preventDefault();
                let form = this;
                $.ajax({
                    url:$(form).attr('action'),
                    method:$(form).attr('method'),
                    data:new FormData(form),
                    processData:false,
                    dataType:'json',
                    contentType:false,
                    beforeSend:function(){
                        $(form).find('span.error-text').text('');
                    },
                    
                    success: function (data) {
                        if(data.code == 0){
                            $.each(data.error, function (indexInArray, valueOfElement) { 
                                $(form).find('span.' +indexInArray+'_error').text(valueOfElement[0]); 
                            });
                        } else {
                            // $('#addCategoryModal').modal('hide');
                           
                            $('#category-table').DataTable().ajax.reload(null, true);
                            toastr.success(data.msg);
                        }
                    }
                });
            });
            // delete category
            $(document).on('click','#deleteCategory', function(){
                var category_id = $(this).data('id');
                var url = '<?= route("category.deleteCategory") ?>';

                    swal.fire({
                            title:'Are you sure?',
                            html: 'You want to <b>' +category_id+ '</b> this country',
                            showCancelButton:true,
                            showCloseButton:true,
                            cancelButtonText:'Cancel',
                            confirmButtonText:'Yes, Delete',
                            cancelButtonColor:'#d33',
                            confirmButtonColor:'#556ee6',
                            width:300,
                            allowOutsideClick:false
                    }).then(function(result){
                            if(result.value){
                                $.post(url,{category_id:category_id}, function(data){
                                    if(data.code == 1){
                                        $('#category-table').DataTable().ajax.reload(null, false);
                                        toastr.success(data.msg);
                                    }else{
                                        toastr.error(data.msg);
                                    }
                                },'json');
                            }
                });
            });
        });

    </script>
@endpush
@endsection



