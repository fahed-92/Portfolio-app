{{ csrf_field() }}

    <div class="modal-header">
        <h5 class="modal-title" id="modal-position-label"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
        <div class="modal-body">
            <div class="form-group control-group ">
                <div class="row">
                    <div class="col-md-12">
                        <input type="hidden" id="position_id" name="id">
                        <input id="setting_id" value="{{$setting_id}}" type="hidden">
                        {{-- <input id="position_id" type="hidden"> --}}
                        <input id="position" name="position" type="text" class="rm-slider">
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </div>

