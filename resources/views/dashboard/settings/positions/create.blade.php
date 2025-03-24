@extends('dashboard.layouts.app')
@section('title', 'Links')
@section('content')
<div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
        <form class="form-horizontal" id="inputForm"
         novalidate="novalidate"
          method="POST"
         action="{{ route('admin.positions.store',$setting_id ) }}">
         @method('POST')
         @include('dashboard.settings.positions.form')
        </form>

    </div>
</div>
@endsection
