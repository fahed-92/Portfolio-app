{{ csrf_field() }}
{{--Title field--}}
<div class="col-xl-4">
    <div class="mb-3">
        <label class="form-label">{{ __('messages.title') }}</label>
        <input name="title" class="form-control @error('title') is-invalid  @enderror"
               value="{{ isset($about) ? $about->title : old('title') }}">
        @error('title')
        <small class=" text text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </small>
        @enderror
    </div>
</div>
{{--Age field--}}
<div class="col-xl-4">
    <div class="mb-3">
        <label class="form-label">{{ __('messages.age') }}</label>
        <input name="age" class="form-control @error('age') is-invalid  @enderror"
               value="{{ isset($about) ? $about->age : old('age') }}">
        @error('age')
        <small class=" text text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </small>
        @enderror
    </div>
</div>
{{--Nationality field--}}
<div class="col-xl-4">
    <div class="mb-3">
        <label class="form-label">{{ __('messages.nationality') }}</label>
        <input name="nationality" class="form-control @error('nationality') is-invalid  @enderror"
               value="{{ isset($about) ? $about->nationality : old('nationality') }}">
        @error('nationality')
        <small class=" text text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </small>
        @enderror
    </div>
</div>
{{--Birthday dield--}}
<div class="col-xl-4">
    <div class="mb-3">
        <label class="form-label">{{ __('messages.birthday') }}</label>
        <input type="date" placeholder="chose your birthday" name="birthday"
               class="form-control @error('birthday') is-invalid  @enderror"
               value="{{ isset($about) ? $about->birthday : old('birthday') }}">
        @error('birthday')
        <small class=" text text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </small>
        @enderror
    </div>
</div>
{{--Phone field--}}
<div class="col-xl-4">
    <div class="mb-3">
        <label class="form-label">{{ __('messages.phone') }}</label>
        <input name="phone" class="form-control @error('phone') is-invalid  @enderror"
               value="{{ isset($about) ? $about->phone : old('phone') }}">
        @error('phone')
        <small class=" text text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </small>
        @enderror
    </div>
</div>
{{--degree--}}
<div class="col-xl-4">
    <div class="mb-3">
        <label class="form-label">{{ __('messages.degree') }}</label>
        <input name="degree" class="form-control @error('degree') is-invalid  @enderror"
               value="{{ isset($about) ? $about->summary : old('degree') }}">
        @error('degree')
        <small class=" text text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </small>
        @enderror
    </div>
</div>
{{--Email field--}}
<div class="col-xl-4">
    <div class="mb-3">
        <label class="form-label">{{ __('messages.email') }}</label>
        <input name="email" class="form-control @error('email') is-invalid  @enderror"
               value="{{ isset($about) ? $about->email : old('email') }}">
        @error('email')
        <small class=" text text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </small>
        @enderror
    </div>
</div>
{{--Freelance dield--}}
<div class="col-xl-4">
    <div class="mb-3">
        <label class="form-label">{{ __('messages.freelance') }}</label>
        <input name="freelance" class="form-control @error('freelance') is-invalid  @enderror"
               value="{{ isset($about) ? $about->freelance : old('freelance') }}">
        @error('freelance')
        <small class=" text text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </small>
        @enderror
    </div>
</div>
{{--City field--}}
<div class="col-xl-4">
    <div class="mb-3">
        <label class="form-label">{{ __('messages.city') }}</label>
        <input name="city" class="form-control @error('city') is-invalid  @enderror"
               value="{{ isset($about) ? $about->city : old('city') }}">
        @error('city')
        <small class=" text text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </small>
        @enderror
    </div>
</div>
{{--Adress field--}}
<div class="col-xl-4">
    <div class="mb-3">
        <label class="form-label">{{ __('messages.address') }}</label>
        <input name="address" class="form-control @error('address') is-invalid  @enderror"
               value="{{ isset($about) ? $about->city : old('address') }}">
        @error('address')
        <small class=" text text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </small>
        @enderror
    </div>
</div>
{{--Summary field--}}
<div class="col-xl-12">
    <div class="mb-3">
        <label class="form-label">{{ __('messages.summary') }}</label>
        <textarea id="editor" name="summary" value="{{ isset($about) ? $about->summary : old('summary') }}"></textarea>
        @error('summary')
        <small class=" text text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </small>
        @enderror
    </div>
</div>

{{--ey37v1bkxhp0w2ypdc0qcfd561y2b6pmf9mpeimhb8i7op0v--}}
<script src="https://cdn.tiny.cloud/1/ey37v1bkxhp0w2ypdc0qcfd561y2b6pmf9mpeimhb8i7op0v/tinymce/6/tinymce.min.js"
        referrerpolicy="origin"></script>

<script>
    tinymce.init({
        selector: 'textarea#editor',
        skin: 'bootstrap',
        plugins: 'lists, link, image, media',
        toolbar: 'h1 h2 bold italic strikethrough blockquote bullist numlist backcolor | link image media | removeformat help',
        menubar: false,
    });
</script>
