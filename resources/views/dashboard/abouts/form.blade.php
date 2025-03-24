{{ csrf_field() }}
<div class="modal-header">
    <h5 class="modal-title" id="modal-about-label"></h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body">
    <input type="hidden" id="about_id" name="id">
    {{--Title field--}}
    <div class="form-group">
        <div class="mb-3">
            <label class="form-label">{{ __('messages.title') }}</label>
            <input  id="title" name="title" class="form-control">
        </div>
    </div>
    {{--Age field--}}
    <div class="form-group">
        <div class="mb-3">
            <label class="form-label">{{ __('messages.age') }}</label>
            <input id="age" name="age" class="form-control">
        </div>
    </div>
    {{--Nationality field--}}
    <div class="form-group">
        <div class="mb-3">
            <label class="form-label">{{ __('messages.nationality') }}</label>
            <input id="nationality" name="nationality" class="form-control">
        </div>
    </div>
    {{--Birthday dield--}}
    <div class="form-group">
        <div class="mb-3">
            <label class="form-label">{{ __('messages.birthday') }}</label>
            <input id="birthday" type="date" placeholder="chose your birthday" name="birthday"class="form-control">
        </div>
    </div>
    {{--Phone field--}}
    <div class="form-group">
        <div class="mb-3">
            <label class="form-label">{{ __('messages.phone') }}</label>
            <input id="phone" name="phone" class="form-control">
        </div>
    </div>
    {{--degree--}}
    <div class="form-group">
        <div class="mb-3">
            <label class="form-label">{{ __('messages.degree') }}</label>
            <input id="degree" name="degree" class="form-control">
        </div>
    </div>
    {{--Email field--}}
    <div class="form-group">
        <div class="mb-3">
            <label class="form-label">{{ __('messages.email') }}</label>
            <input id="email" name="email" class="form-control">
        </div>
    </div>
    {{--Freelance dield--}}
    <div class="form-group">
        <div class="mb-3">
            <label class="form-label">{{ __('messages.freelance') }}</label>
            <input id="freelance" name="freelance" class="form-control">
        </div>
    </div>
    {{--City field--}}
    <div class="form-group">
        <div class="mb-3">
            <label class="form-label">{{ __('messages.city') }}</label>
            <input id="city" name="city" class="form-control">
        </div>
    </div>
    {{--Adress field--}}
    <div class="form-group">
        <div class="mb-3">
            <label class="form-label">{{ __('messages.address') }}</label>
            <input id="address" name="address" class="form-control">
        </div>
    </div>
<!--image field-->
    <div class="form-group">
        <label for="photo">Image</label>
        <input id="image" class="form-control" type="file" name="image">

    </div>
    {{--Summary field--}}
    <div class="form-group">
        <div class="mb-3">
            <label class="form-label">{{ __('messages.summary') }}</label>
            <textarea id="summary" name="summary"></textarea>
        </div>
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    <button type="submit" class="btn btn-primary">Save</button>
</div>


{{--ey37v1bkxhp0w2ypdc0qcfd561y2b6pmf9mpeimhb8i7op0v--}}
<script src="https://cdn.tiny.cloud/1/ey37v1bkxhp0w2ypdc0qcfd561y2b6pmf9mpeimhb8i7op0v/tinymce/6/tinymce.min.js"
        referrerpolicy="origin"></script>

<script>
    tinymce.init({
        selector: 'textarea#summary',
        skin: 'bootstrap',
        plugins: 'lists, link, image, media',
        toolbar: 'h1 h2 bold italic strikethrough blockquote bullist numlist backcolor | link image media | removeformat help',
        menubar: false,
    });
</script>
