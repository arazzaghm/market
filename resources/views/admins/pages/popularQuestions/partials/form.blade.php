@csrf

<div class="form-group">
    <div class="form-line">
        <input type="text" class="form-control" placeholder="Popular question title" name="title"
               value="{{$popularQuestion->title ?? ''}}">
    </div>
</div>

<div class="form-group">
        <textarea rows="4" class="form-control no-resize"
                  name="text"
                  placeholder="Please type the answer you want...">{{$popularQuestion->text ?? ''}}</textarea>
</div>
