<div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
        <form class="form-horizontal" id="inputForm"
         novalidate="novalidate"
          method="POST"
         action="{{ route('admin.positions.update',$positions->id ) }}">
         @method('PUT')
         @include('dashboard.settings.positions.form')
        </form>

    </div>
</div>
