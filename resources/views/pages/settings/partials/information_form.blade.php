<div class="card">
    <div class="card-header">
        @lang('common.myInformation')
    </div>
    <div class="card-body">
        <form action="{{route('users.update', ['user' => auth()->user()])}}" method="POST">
            @csrf
            @method('PATCH')
            <div class="row">
                <div class="col-md-6">
                    <label for="name">@lang('validation.attributes.name')</label>
                    <input type="text" id="name" class="form-control @error('name') {{ 'border-danger' }}@enderror"
                           name="name" placeholder="@lang('validation.attributes.name')"
                           value="{{auth()->user()->name}}">
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="email">@lang('validation.attributes.email')</label>
                    <input type="text" id="email" class="form-control @error('email') {{ 'border-danger' }}@enderror"
                           name="email" placeholder="@lang('validation.attributes.email')"
                           value="{{auth()->user()->email}}">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="row mt-2">
                <p class="text-muted ml-3">
                    @lang('sentence.emptyPassword')
                </p>
                <div class="col-md-6">
                    <label for="old_password">@lang('validation.attributes.oldPassword')</label>
                    <input type="password" name="old_password" id="old_password"
                           class="form-control @error('password') {{'border-danger'}} @enderror"
                           placeholder="@lang('validation.attributes.currentPassword') (@lang('common.optional'))">
                    @error('old_password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="password">@lang('validation.attributes.newPassword')</label>
                    <input type="password" id="password" name="password"
                           class="form-control  @error('password') {{'border-danger'}} @enderror"
                           placeholder="@lang('validation.attributes.newPassword') (@lang('common.optional'))">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="d-flex justify-content-center mt-2">
                <button class="btn btn-primary">@lang('common.change')</button>
            </div>
        </form>
    </div>
</div>

