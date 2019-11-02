<div class="form-row">
    @csrf
    <div class="form-group col-md-6">
        <span>Title</span>
        <input type="text" class="form-control" id="title" placeholder="Title" name="title"
               value="{{$post->title ?? ''}}" required>
    </div>

    <div class="input-group col-md-6 pt-3 mt-2">
        <input type="number" class="form-control" id="price" placeholder="Price" name="price"
               value="{{$post->price ?? 0}}" required aria-describedby="price-addon">
        <div class="input-group-append">
            <select class="form-control" name="currency_id">
                @foreach($allCurrencies as $currency)
                    <option  {{ isset($post) && $post->currency_id == $currency->id ? 'selected' : ''}} value="{{$currency->id}}">{{$currency->name}}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>
<div class="form-group">
    <label for="description">Description</label>
    <textarea class="form-control" id="description" placeholder="Description" name="description"
              required>{{$post->description ?? ''}}</textarea>
</div>
<div class="form-group">
    <label for="location">Address</label>
    <input type="text" class="form-control" id="location" placeholder="City, apartment, studio, or floor"
           name="location" value="{{$post->location ?? ''}}">
</div>
<div class="form-group">
    <label for="category">Category</label>
    <select id="category" class="form-control" name="category_id">
        <option selected>Choose category</option>
        @foreach($allCategories as $category)
            <option
                {{ isset($post) && $post->category_id == $category->id ? 'selected' : ''}} value="{{$category->id}}">{{$category->name}}</option>
        @endforeach
    </select>
</div>

<div class="custom-file mb-2">
    <input type="file" class="custom-file-input" id="picture" name="picture">
    <label class="custom-file-label" for="picture">Choose picture (optional)</label>
</div>
