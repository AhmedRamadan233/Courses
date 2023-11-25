@extends('dashboard.layouts.dashboard')

@section('title', '')

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
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addCategoryModal" id="addCategory">
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
                                <th>Category</th>
                                <th>Description</th>
                                <th>price</th>
                                {{-- <th>instractor</th> --}}
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
    @include("dashboard.pages.categories.editCategoryModel")
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

            // display all Data
            $('#category-table').DataTable({
                ajax: {
                    url: '{{ route('category.index') }}',
                },
                pageLength: 5,
                lengthMenu: [5, 10, 15, 20],
                columns: [
                    { data: 'DT_RowIndex', name: 'DT_RowIndex' },
                    { data: 'name', name: 'name' },
                    { data: 'parent_name', name: 'parent_name' },
                    { data: 'description', name: 'description' },
                    { data: 'price', name: 'price' },
                    // { data: 'instructor_id', name: 'instructor_id' },
                    { data: 'status', name: 'status' },
                    { data: 'actions', name: 'actions', orderable: false, searchable: false }
                ],
            });
            // display data in model
            $(document).on('click', '#addCategory', function() {
                $.ajax({
                    url: '<?= route("category.create") ?>',
                    method: 'GET',
                    dataType: 'json',
                    beforeSend: function() {
                        $('body').find('span.error-text').text('');
                    },
                    success: function(data) {
                        // Clear the existing options and add a default one
                        $('#addCategoryModal #parent_id').empty();
                        $('#addCategoryModal #parent_id').append('<option value="">Select Parent Category</option>');
                        // $('#addCategoryModal #instructor_id').empty();
                        // $('#addCategoryModal #instructor_id').append('<option value="">Select Instructor</option>');
                        
                        // Populate the dropdown with fetched data
                        $.each(data.details, function(index, value) {
                            $('#addCategoryModal #parent_id').append('<option value="' + value.id + '">' + value.name + '</option>');
                        });
                        // $.each(data.details, function(index, value) {
                        //     $('#addCategoryModal #instructor_id').append('<option value="' + value.id + '">' + value.name + '</option>');
                        // });
                        $('#addCategoryModal').modal('show');
                        
                       
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            });
            // On form submission
            $('#add-category-form').on('submit', function (e) {
                e.preventDefault();
                let form = this;
                let formData = new FormData(form);

                // Append the selected parent_id to formData
                formData.append('parent_id', $('#parent_id').val());
                // formData.append('instructor_id', $('#instructor_id').val());

                // Log form data to console for debugging
                console.log('FormData content:', formData);

                $.ajax({
                    url: $(form).attr('action'),
                    method: $(form).attr('method'),
                    data: formData,
                    processData: false,
                    contentType: false,
                    beforeSend: function () {
                        $(form).find('span.error-text').text('');
                    },
                    success: function (data) {
                        if (data.code == 0) {
                            // Handle validation errors
                            $.each(data.error, function (indexInArray, valueOfElement) {
                                $(form).find('span.' + indexInArray + '_error').text(valueOfElement[0]);
                            });
                        } else {
                            // If the operation is successful, update the DataTable and show a success message
                            $('#category-table').DataTable().ajax.reload(null, false);
                            toastr.success(data.msg);
                        }
                    }
                });
            });
            $(document).on('click', '#editCategory', function () {
                // Get the category ID from the clicked element's data attribute
                let category_id = $(this).data('id');

                // Reset the form and clear error messages
                $('#editCategoryModel').find('form')[0].reset();
                $('#editCategoryModel').find('span.error-text').text('');

                // Fetch category details and all categories using AJAX
                $.post('<?= route("category.edit") ?>', { category_id: category_id }, function (data) {
                    console.log('Received data:', data);

                    // Fill form fields with received data
                    $('#editCategoryModel').find('input[name="cid"]').val(data.details.id);
                    $('#editCategoryModel').find('input[name="name"]').val(data.details.name);
                    $('#editCategoryModel').find('input[name="description"]').val(data.details.description);
                    $('#editCategoryModel').find('input[name="price"]').val(data.details.price);
                    $('#editCategoryModel').find('input[name="status"]').val(data.details.status);

                    // Dynamically add options to the parent_id select element
                    let parentSelect = $('#editCategoryModel #parent_id');
                    parentSelect.empty().append('<option value="">Select Parent Category</option>');

                    // Check if allCategories exists and is not null/undefined
                    if (data.allCategories && Array.isArray(data.allCategories)) {
                        // Populate the dropdown with fetched category data
                        $.each(data.allCategories, function (index, value) {
                            // Check if value.id and value.name exist and are not null/undefined
                            if (value && value.id && value.name) {
                                // Check if the current option is the selected parent_id
                                let isSelected = (value.id === data.details.parent_id);

                                // Append the option to the select element
                                parentSelect.append('<option value="' + value.id + '"' + (isSelected ? ' selected' : '') + '>' + value.name + '</option>');
                            }
                        });
                    }

                    // Show the modal
                    $('#editCategoryModel').modal('show');
                }, 'json');
            });
            $('#update-category-form').on('submit', function (e) {
                e.preventDefault();
                let form = this;
                $.ajax({
                    url: $(form).attr('action'),
                    method: $(form).attr('method'),
                    data: new FormData(form),
                    processData: false,
                    dataType: 'json',
                    contentType: false,
                    beforeSend: function () {
                        $(form).find('span.error-text').text('');
                    },
                    success: function (data) {
                        if (data.code == 0) {
                            $.each(data.error, function (indexInArray, valueOfElement) {
                                $(form).find('span.' + indexInArray + '_error').text(valueOfElement[0]);
                            });
                        } else {
                            $('#editCategoryModel').modal("hide");
                            $('#editCategoryModel').find('form')[0].reset();
                            $('#category-table').DataTable().ajax.reload(null, false);
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
                            html: 'You want to <strong style="color: red;">Delete</strong> this Category',
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



