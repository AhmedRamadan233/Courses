<!-- Modal -->
<div class="modal fade" id="addCategoryModal" tabindex="-1" role="dialog" aria-labelledby="addCategoryModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addCategoryModalLabel">Add New Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('category.store')}}" method="POST" id="add-category-form">
                    @csrf
                    <div class="form-group">
                        <label for="Category">Category</label>
                        <input type="text" class="form-control" id="Category" placeholder="Enter Category" name="name">
                        <span class="text-danger error-text name_error"></span>
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
                            <button type="submit" class="btn btn-success">Save changes</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
