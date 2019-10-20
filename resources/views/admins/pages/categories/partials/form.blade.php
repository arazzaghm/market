@csrf

<div class="col-sm-6">
    <div class="form-group">
        <div class="form-line">
            <input type="text" class="form-control" placeholder="Category name" name="name" value="{{$category->name ?? ''}}">
        </div>
    </div>
</div>

<div class="col-sm-6">
    <div class="form-group">
        <div class="form-line">
            <input type="text" class="form-control" placeholder="Category icon" name="icon_name" value="{{$category->icon_name ?? ''}}">
        </div>
    </div>
</div>
