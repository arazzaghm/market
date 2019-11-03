<div class="card">
    <div class="card-header">
        My information
    </div>
    <div class="card-body">
        <form action="{{route('users.update', ['user' => auth()->user()])}}" method="POST">
            @csrf
            @method('PATCH')
            <div class="row">
                <div class="col-md-6">
                    <label for="name">Name</label>
                    <input type="text" id="name" class="form-control @error('name') {{ 'border-danger' }}@enderror"
                           name="name" placeholder="Name"
                           value="{{auth()->user()->name}}">
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="email">Email</label>
                    <input type="text" id="email" class="form-control @error('email') {{ 'border-danger' }}@enderror"
                           name="email" placeholder="Email"
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
                    Change the information below only if you want to change your password! If not - leave it empty.
                </p>
                <div class="col-md-6">
                    <label for="old_password">Old password</label>
                    <input type="password" name="old_password" id="old_password"
                           class="form-control @error('password') {{'border-danger'}} @enderror"
                           placeholder="Current password (optional)">
                    @error('old_password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="password">New password</label>
                    <input type="password" id="password" name="password"
                           class="form-control  @error('password') {{'border-danger'}} @enderror"
                           placeholder="New password (optional)">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="d-flex justify-content-center mt-2">
                <button class="btn btn-primary">Change</button>
            </div>
        </form>
    </div>
</div>

