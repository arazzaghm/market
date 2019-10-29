<form action="{{route('questions.store')}}" method="POST">
    @csrf
    <div class="form-group">
        <label for="title">Topic</label>
        <input type="text" class="form-control" id="title" placeholder="Topic" name="title">
    </div>
    <div class="form-group">
        <label for="text">Describe your problem</label>
        <textarea name="text" id="text" class="form-control"></textarea>
    </div>
    <button class="btn btn-primary">Send</button>
</form>
