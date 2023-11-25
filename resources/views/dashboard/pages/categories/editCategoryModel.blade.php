<div class="modal fade" id="editCategoryModel" tabindex="-1" role="dialog" aria-labelledby="addCountryModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addCountryModalLabel">Edit Country</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('category.update') }}" method="POST" id="update-category-form">
                    @csrf 
                    <input type="hidden" name="cid">

                    <div class="form-group">
                        <label for="Category">Category</label>
                        <input type="text" class="form-control" id="Category" placeholder="Enter Category" name="name">
                        <span class="text-danger error-text name_error"></span> <!-- Error message container -->
                    </div>

                    <div class="form-group">
                        <label for="parent_id">Parent Category</label>
                        <select class="form-control" id="parent_id" name="parent_id">
                            <option value="">Select Parent Category</option>
                            <!-- Options will be dynamically added using JavaScript -->
                        </select>
                        <span class="text-danger error-text parent_id_error"></span>
                    </div>

                    <div class="form-group">
                        <label for="price">Pricey</label>
                        <input type="text" class="form-control" id="price" placeholder="Enter Category" name="price">
                        <span class="text-danger error-text price_error"></span>
                    </div>
                    
                    <div class="form-group">
                        <label for="CategoryDescription">Description</label>
                        <input type="text" class="form-control" id="CategoryDescription" placeholder="Enter Category Description" name="description">
                        <span class="text-danger error-text description_error"></span> 
                    </div>

                    <div class="form-group">
                        <label for="CategoryStatus">Status</label>
                        <select class="form-control" id="CategoryStatus" name="status">
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                            <option value="archive">Archive</option>
                        </select>
                        <span class="text-danger error-text status_error"></span> 
                    </div>

                    <div class="modal-footer">
                        <div class="form-group">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success">Save changes</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
