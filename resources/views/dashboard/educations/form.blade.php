{{ csrf_field() }}
<div class="modal-header">
    <h5 class="modal-title" id="modal-education-label"></h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body">
    <input type="hidden" id="education_id" name="id">
    <div class="modal-body">
        <div class="form-group control-group ">
            <div class="row">
                <div class="form-group">
                    <label>{{__('messages.faculty')}}</label>
                    <br>
                    <input id="faculty" name="faculty" type="text" class="rm-slider">
                </div>
                <div class="form-group">
                        <label>{{__('messages.major')}}</label>
                    <br>
                    <input id="major" name="major" type="text" class="rm-slider">
                </div>
                <div class="form-group">
                    <label for="from">Date From</label>
                    <input type="date" class="form-control" id="from" name="from">
                </div>
                <div class="form-group">
                    <label for="to">Date To</label>
                    <input type="date" class="form-control" id="to" name="to">
                </div>
                <div class="form-group">
                        <label>{{__('messages.university')}}</label>
                    <br>
                    <input id="university" name="university" type="text" class="rm-slider">
                </div>
                <div class="form-group">
                        <label>{{__('messages.grade')}}</label>
                    <input id="grade" name="grade" type="text" class="rm-slider">
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </div>
</div>

