{{ csrf_field() }}

<div class="modal-header">
    <h5 class="modal-title" id="modal-links-label"></h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
    <div class="modal-body">
        <div class="form-group control-group ">
            <div class="row">
                <div class="col-md-12">
                    <span>{{__('messages.Link')}}</span>
                    <br>
                    <input id="setting_id" value="{{$setting_id}}" type="hidden">
                    <input id="link" name="link" type="text" class="rm-slider">
                    <br>
                    <span>{{__('messages.Icon')}}</span>
                    <select id="status" name="icon" class="form-control input-full">
                        <option value="bx bxl-facebook">Facebook</option>
                        <option value="bx bxl-linkedin">LinkedIn</option>
                        <option value="bx bxl-instagram">Instagram</option>
                        <option value="bx bxl-github">Github</option>
                        <option value="bx bxl-gitlab">GitLab</option>
                        <option value="bx bxl-behance">Behance</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </div>

