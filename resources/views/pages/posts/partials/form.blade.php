<div class="form-row">
    @csrf
    <div class="form-group col-md-6">
        <label for="title">Title</label>
        <input type="text" class="form-control" id="title" placeholder="Title" name="title" value="{{$post->title ?? ''}}" required>
    </div>
    <div class="form-group col-md-6">
        <label for="price">Price ($)</label>
        <input type="text" class="form-control" id="price" placeholder="Price" name="price"
               value="{{$post->price ?? 0}}" required>
    </div>
</div>
<div class="form-group">
    <label for="description">Description</label>
    <textarea class="form-control" id="description" placeholder="Description" name="description" required>{{$post->description ?? ''}}</textarea>
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
            <option {{ isset($post) && $post->category_id == $category->id ? 'selected' : ''}} value="{{$category->id}}">{{$category->name}}</option>
        @endforeach
    </select>
</div>
