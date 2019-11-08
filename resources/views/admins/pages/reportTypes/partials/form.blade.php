@csrf

<div class="form-group">
    <div class="form-line">
        <label for="name">Report type name</label>
        <input type="text" id="name" class="form-control" placeholder="Report type name" name="name"
               value="{{$reportType->name ?? ''}}">
    </div>
</div>

<div class="form-group">
    <div class="form-line">
        <label for="name_ru">Report type name (russian)</label>
        <input type="text" class="form-control" id="name_ru" placeholder="Report type name (russian)" name="name_ru"
               value="{{$reportType->name_ru ?? ''}}">
    </div>
</div>

<div class="form-group">
    <div class="form-line">
        <label for="name_uk">Report type name (ukrainian)</label>
        <input type="text" class="form-control" id="name_ru" placeholder="Report type name (ukrainian)" name="name_uk"
               value="{{$reportType->name_uk ?? ''}}">
    </div>
</div>

<div class="form-group">
    <label for="modelType">Model type</label>
    <select name="model_type" id="modelType">
        @foreach($models as $key => $model)
            <option value="{{$model}}" {{isset($reportType) && $reportType->model_type == $model ? 'selected' : ''}}>
                {{$key}}
            </option>
        @endforeach
    </select>
</div>
