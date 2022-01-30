<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header border-0">
          <button type="button" class="btn" class="close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <h4 class="invalid-feedback text-center" role="alert" id="msgLogin">
                <strong>{{ __('Username or Password Incorrect!') }}</strong>
            </h4>
            <h4 class="invalid-feedback text-center" role="alert" id="msgLoginEmpty">
                <strong>{{ __('Username and Password Required!') }}</strong>
            </h4>

            <form id="loginForm">
                @csrf
                
                <div class="form-group row">
                    <label for="email" class="col-md-4 col-form-label {{ app()->getLocale() == 'ar' ? 'text-md-left':'text-md-right'}}">{{ __('E-Mail Address') }}</label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control  mb-2 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password" class="col-md-4 col-form-label {{ app()->getLocale() == 'ar' ? 'text-md-left':'text-md-right'}}">{{ __('Password') }}</label>

                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row my-3">
                    <div class="col-md-6 offset-md-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} style="float: {{lang() == 'ar'? 'right' : 'left'}};">

                            <label class="form-check-label" for="remember" >
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-8 offset-md-4">
                        <button type="submit" class="btn btn-primary" id="btnLogin">
                            {{ __('Login') }}
                        </button>

                        {{-- @if (Route::has('password.request', app()->getLocale())) --}}
                            <a class="btn btn-link" href="{{ route('password.request')}}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        {{-- @endif --}}
                    </div>
                </div>
            </form>              
        </div>
      </div>
    </div>
</div>