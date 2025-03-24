{{ csrf_field() }}
<div class="modal-header">
    <h5 class="modal-title" id="modal-category-label"></h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body">
    <input type="hidden" id="category_id" name="category_id">
    <input type="hidden" id="skill_id" name="id">


    <div class="form-group">
        <label for="skill">Name</label>
        <input type="text" class="form-control" id="skill" name="skill">
    </div>
    <div class="form-group">
        <label for="percentage">Percentege</label>
        <input type="text" class="form-control" id="percentage" name="percentage">
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    <button type="submit" class="btn btn-primary">Save</button>
</div>



