{{ csrf_field() }}

<div class="col-xl-6">
    <div class="mb-3">
        <label class="form-label">{{ __('messages.name') }}</label>
        <input name="name" class="form-control @error('name') is-invalid  @enderror"
            value="{{ isset($settings) ? $settings->name : old('name') }}">
        @error('name')
        <small class=" text text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </small>
        @enderror
    </div>
</div>
<div class="col-xl-6">
    <div class="mb-3">
        <label class="form-label">{{ __('messages.link') }}</label>
        <input name="link" class="form-control @error('link') is-invalid  @enderror"
            value="{{ isset($settings) ? $settings->link : old('link') }}">
        @error('link')
        <small class=" text text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </small>
        @enderror
    </div>
</div>


<div class="col-xl-6">
    <div class="mb-3">
        <label class="form-label">{{ __('messages.icon') }}</label>
        <input class="form-control @error('icon') is-invalid  @enderror" name="icon"
            value="{{ isset($settings) ? $settings->icon : old('icon') }}"
            rows="11">
        @error('icon')
        <small class=" text text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </small>
        @enderror
    </div>
</div>
<div class="col-xl-6">
    <div class="mb-3">
        <label class="form-label">{{ __('messages.select picture') }}</label>
        <div class="input-group">
            <span class="input-group-btn">
                <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                    <i class="fa fa-picture-o"></i> {{ __('messages.select photo') }}
                </a>
            </span>
            <input id="thumbnail" class="form-control @error('photo') is-invalid  @enderror" type="file" name="photo"
                value="{{ isset($settings) ? $settings->photo : old('photo') }}">
        </div>
        @error('photo')
        <small class=" text text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </small>
        @enderror
    </div>
</div>

<div class="col-xl-6">
    <div class="mb-3">
        <label class="form-label">{{ __('messages.view picture') }}</label>
        <div id="holder" style="max-height:70px; overflow: hidden; object-fit: contain;">
            @if(isset($settings))
            <img src="{{ $settings->photo }}" class="img-thumbnail img-fluid" width="70" alt="">
            @endif
        </div>
    </div>
</div>
