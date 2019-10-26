@csrf

<div class="col-sm-6">
    <div class="form-group">
        <div class="form-line">
            <input type="text" class="form-control" placeholder="Report type name" name="name"
                   value="{{$reportType->name ?? ''}}">
        </div>
    </div>
</div>

<div class="col-sm-6">
    <div class="form-group">
        <div class="form-line">
            <label for="modelType">Model type</label>
            <select name="model_type" id="modelType">
                @foreach($models as $key => $model)
                    <option value="{{$model}}">{{$key}}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>
