<x-adminheader title="Profile"/>
<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                      <p class="card-title mb-0">My Profile</p>
                      @if (session()->has('success'))
                                <div class="alert alert-success">
                                    <p>{{session()->get('success')}}</p>
                                </div>
                            @endif
                            <img src="{{URL::asset('uploads/profiles/'.$user->picture)}}" class="mx-auto d-block" alt="" style="width: 200px; height: 200px;">
                            <form method="POST" action="{{ route('updateUser') }}" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group">
                                    <label for="fullname">{{ __('Full Name') }}</label>
                                    <input id="fullname" type="text" value="{{$user->fullname}}" class="form-control @error('fullname') is-invalid @enderror" name="fullname" value="{{ old('fullname') }}" required autofocus>
                                    @error('fullname')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="email">{{ __('Email Address') }}</label>
                                    <input id="email" type="email" value="{{$user->email}}" readonly class="form-control  @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="password">{{ __('Password') }}</label>
                                    <input id="password" type="text" value="{{$user->password}}" class="fo" class="form-control @error('password') is-invalid @enderror" name="password" required>
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>


                                <div class="form-group">
                                    <label for="picture">{{ __('Profile Picture') }}</label>
                                    <input id="picture" type="file" class="form-control-file @error('picture') is-invalid @enderror" name="file">
                                    @error('picture')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-info">
                                        {{ __('Save Changes') }}
                                    </button>
                                </div>
                            </form>
                    </div>


        </div>
        </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <x-adminfooter />
