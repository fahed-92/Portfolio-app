{{ csrf_field() }}
<div class="modal-header">
    <h5 class="modal-title" id="modal-experience-label"></h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body">
    <input type="hidden" id="experience_id" name="id">
    <div class="modal-body">
        <div class="form-group control-group ">
            <div class="row">
                <div class="form-group">
                    <label>{{__('messages.position')}}</label>
                    <br>
                    <input id="position" name="position" type="text" class="form-control">
                </div>
                <div class="form-group">
                    <label>{{__('messages.company')}}</label>
                    <br>
                    <input id="company" name="company" type="text" class="form-control">
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
                    <label>{{__('messages.description')}}</label>
                    <br>
                    <textarea id="description" name="description"></textarea>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </div>
</div>
<script src="https://cdn.tiny.cloud/1/ey37v1bkxhp0w2ypdc0qcfd561y2b6pmf9mpeimhb8i7op0v/tinymce/6/tinymce.min.js"
        referrerpolicy="origin"></script>

<script>
    tinymce.init({
        selector: 'textarea#description',
        skin: 'bootstrap',
        plugins: 'lists, link, image, media',
        toolbar: 'h1 h2 bold italic strikethrough blockquote bullist numlist backcolor | link image media | removeformat help',
        menubar: false,
    });
</script>

