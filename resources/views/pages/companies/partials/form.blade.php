@csrf
<div class="row">
    <div class="col-md-6 mb-2">
        <label for="name">@lang('company.form.name')</label>
        <input type="text" placeholder="@lang('company.form.name')" id="name" name="name" class="form-control" value="{{$company->name ?? ''}}">
    </div>
    <div class="col-md-6 mb-2">
        <label for="email">@lang('company.form.email')</label>
        <input type="text" placeholder="@lang('company.form.email')" id="email" name="email" class="form-control" value="{{$company->email ?? ''}}">
    </div>

    <div class="col-6 mb-2">
        <label for="phone">@lang('company.form.number')</label>
        <input type="text" placeholder="@lang('company.form.number')" id="phone" name="phone" class="form-control" value="{{$company->phone ?? ''}}">
    </div>

    <div class="col-6 mb-2">
        <label for="logo">@lang('company.form.logo') (@lang('common.optional'))</label>
        <input type="file" placeholder="@lang('company.form.logo')" id="logo" name="logo" class="form-control">
    </div>
</div>
<label for="description">@lang('company.form.description')</label>
<textarea name="description" id="description" class="form-control">{{$company->description ?? ''}}</textarea>



