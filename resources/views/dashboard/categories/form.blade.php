{{ csrf_field() }}
<div class="modal-header">
    <h5 class="modal-title" id="modal-category-label"></h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body">
    <input type="hidden" id="category_id" name="id">
    <div class="form-group">
        <label for="category">Name</label>
        <input type="text" class="form-control" id="name" name="name">
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    <button type="submit" class="btn btn-primary">Save</button>
</div>



