{{ csrf_field() }}
<div class="modal-header">
    <h5 class="modal-title" id="modal-service-label">Add Service</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body">
    <input type="hidden" id="service_id" name="id">
    <div class="form-group">
        <label for="service">Service Name</label>
        <input type="text" class="form-control" id="service" name="service">
    </div>
    <div class="form-group">
        <label for="icon">Icon</label>
        {{-- <input type="text" class="form-control" id="icon" name="icon"> --}}
        <select id="icon" name="icon" class="form-control input-full">
            <option value="bi bi-house">House</option>
            <option value="bi bi-lightning">Lightning</option>
            <option value="bi bi-mic">Mic</option>
            <option value="bi bi-moon">Moon</option>
            <option value="bi bi-pen">Pen</option>
            <option value="bi bi-person">Person</option>
            <option value="bi bi-phone">Phone</option>
            <option value="bi bi-reply">Reply</option>
            <option value="bi bi-search">Search</option>
            <option value="bi bi-star">Star</option>
            <option value="bi bi-sun">Sun</option>
            <option value="bi bi-tools">Tools</option>
            <option value="bi bi-tree">Tree</option>
            <option value="bi bi-trophy">Trophy</option>
            <option value="bi bi-upload">Upload</option>
            <option value="bi bi-watch">Watch</option>
            <option value="bi bi-wifi">Wifi</option>
            <option value="bi bi-window">Window</option>
            <option value="bi bi-x">X</option>
            <option value="bi bi-alarm">Alarm</option>
            <option value="bi bi-anchor">Anchor</option>
            <option value="bi bi-archive">Archive</option>
            <option value="bi bi-bag">Bag</option>
            <option value="bi bi-bell">Bell</option>
            <option value="bi bi-book">Book</option>
            <option value="bi bi-box">Box</option>
            <option value="bi bi-calendar">Calendar</option>
            <option value="bi bi-camera">Camera</option>
            <option value="bi bi-chat">Chat</option>
            <option value="bi bi-check">Check</option>
            <option value="bi bi-clock">Clock</option>
            <option value="bi bi-cloud">Cloud</option>
            <option value="bi bi-currency-dollar">Currency Dollar</option>
            <option value="bi bi-envelope">Envelope</option>
            <option value="bi bi-file">File</option>
            <option value="bi bi-gear">Gear</option>
            <option value="bi bi-heart">Heart</option>
        </select>
    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <textarea class="form-control" id="description" name="description"></textarea>
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    <button type="submit" class="btn btn-primary">Save</button>
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


