<x-header />



    <!-- Contact Section Begin -->
    <section class="contact spad">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">{{ __('My Account') }}</div>

                        <div class="card-body">
                            @if (session()->has('success'))
                                <div class="alert alert-success">
                                    <p>{{session()->get('success')}}</p>
                                </div>
                            @endif
                            <img src="{{URL::asset('uploads/profiles/'.$user->picture)}}" class="mx-auto d-block" alt="">
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
                                    <input id="password" type="text" value="{{$user->password}}" class="form-control @error('password') is-invalid @enderror" name="password" required>
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
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Save Changes') }}
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!-- Contact Section End -->

  <x-footer />
