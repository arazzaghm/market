@csrf

<div class="form-group">
    <div class="form-line">
        <input type="text" class="form-control" placeholder="Category name" id="name" name="name"
               value="{{$category->name ?? ''}}">
    </div>
</div>

<div class="form-group">
    <div class="form-line">
        <label for="name_ru">Category name (russian)</label>
        <input type="text" class="form-control" placeholder="Category name (russian)" id="name_ru" name="name_ru"
               value="{{$category->name_ru ?? ''}}">
    </div>
</div>

<div class="form-group">
    <div class="form-line">
        <label for="name_uk">Category name (ukrainian)</label>
        <input type="text" class="form-control" placeholder="Category name" id="name_uk" name="name_uk"
               value="{{$category->name_uk ?? ''}}">
    </div>
</div>

<div class="form-group">
    <div class="form-line">
        <input type="text" class="form-control" placeholder="Category icon" name="icon_name"
               value="{{$category->icon_name ?? ''}}">
    </div>
</div>
