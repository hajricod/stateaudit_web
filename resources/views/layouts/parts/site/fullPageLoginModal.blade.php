<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModal" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen" role="document">
      <div class="modal-content">
        <div class="modal-header border-0">
          <button type="button" class="btn" class="close" data-bs-dismiss="modal" aria-label="Close">
            <svg xmlns="http://www.w3.org/2000/svg" width="3em" height="3em" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
              </svg>
          </button>
        </div>
        <div class="modal-body">
            <div class="d-flex align-items-center justify-content-center h-100">
                <div class="w-100">
                    <div class="row">
                        <div class="col-md-4 offset-md-4">
                            <h4 class="invalid-feedback text-center" role="alert" id="msgLogin">
                                <strong>{{ __('Username or Password Incorrect!') }}</strong>
                            </h4>
                            <h4 class="invalid-feedback text-center" role="alert" id="msgLoginEmpty">
                                <strong>{{ __('Username and Password Required!') }}</strong>
                            </h4>
                            <form id="loginForm">
                                @csrf
                                
                                <div class="mb-3">
                                    <label for="email" class="mb-1 {{ app()->getLocale() == 'ar' ? 'text-md-left':'text-md-right'}}">{{ __('E-Mail Address') }}</label>


                                    <input id="email" type="email" class="form-control  mb-2 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </div>

                                <div class="mb-3">
                                    <label for="password" class="mb-1 {{ app()->getLocale() == 'ar' ? 'text-md-left':'text-md-right'}}">{{ __('Password') }}</label>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="my-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} style="float: {{lang() == 'ar'? 'right' : 'left'}};">

                                        <label class="form-check-label" for="remember" >
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <button type="submit" class="btn btn-primary" id="btnLogin">
                                        {{ __('Login') }}
                                    </button>
                                    <a class="btn btn-link" href="{{ route('password.request')}}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>              
        </div>
      </div>
    </div>
</div>