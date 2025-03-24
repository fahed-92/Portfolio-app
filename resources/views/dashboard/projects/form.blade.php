{{ csrf_field() }}
<div class="modal-header">
    <h5 class="modal-title" id="modal-project-label">A</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body">
    <div class="row">
        <input type="hidden" id="project_id" name="id">
        <div class="form-group">
            <label>{{__('messages.name')}}</label>
            <input id="name" name="name" type="text" value=""
                   class="rm-slider">
        </div>
        <div class="form-group">
            <label>{{__('messages.category')}}</label>
            <br>
            <select id="category" name="category" class="form-control input-full" value="">
                <option value="Package">Package</option>
                <option value="E-Commerce">E-Commerce</option>
                <option value="Web">Web</option>
            </select>
        </div>
        <div class="form-group">
            <label>{{__('messages.link')}}</label>
            <br>
            <input id="link" name="link" type="text" class="rm-slider">
        </div>
        <div class="form-group">
            <label class="form-label">{{ __('messages.select image') }}</label>
            <input id="image" class="form-control" type="file" name="image">
        </div>
        <div class="form-group">
            <label>{{__('messages.description')}}</label>
            <textarea id="description" name="description" rows="5"></textarea>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
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
        menubar: true,
    });
</script>
