@extends('layouts.plain')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card border-0 pt-5 pb-2 shadow-sm">
                {{-- <div class="card-header">{{ __('Register') }}</div> --}}

                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                            @if (app()->getLocale() == 'ar')
                                <h4 class="border-bottom pb-2">تسجيل الموظفين والأعضاء</h4>
                                <p class="pt-2">
                                    التسجيل في الموقع متاح فقط لموظفي وأعضاء جهاز الرقابة المالية والإدارية للدولة. يتطلب التسجيل استخدام البريد الإلكتروني الخاص بالعمل لتفعيل الحساب.
                                </p>
                            @else
                                <h4 class="border-bottom pb-2">Registiration for Employees and Members</h4>
                                <p class="pt-2">
                                   Registiration in the website is only for employees and members of State Audit Institution. It is required to use your work e-mail to activate your account.
                                </p>
                            @endif
                            <p>
                                
                            </p>
                            <hr class="d-block d-lg-none">
                        </div>
                        <div class="col-lg-6">
                            <form method="POST" action="{{ route('register') }}">
                                @csrf

                                <div class="form-group">
                                    <label for="name" class=" {{ app()->getLocale() == 'ar' ? 'text-md-left':'text-md-right'}}">{{ __('Name') }}</label>

                                    
                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    
                                </div>

                                <div class="form-group">
                                    <label for="email" class="{{ app()->getLocale() == 'ar' ? 'text-md-left':'text-md-right'}}">{{ __('E-Mail Address') }}</label>

                                    
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    
                                </div>

                                <div class="form-group">
                                    <label for="password" class="{{ app()->getLocale() == 'ar' ? 'text-md-left':'text-md-right'}}">{{ __('Password') }}</label>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>
                                                {{__('Your password must be more than 8 characters long, should contain at least 1 Uppercase, 1 Lowercase, 1 Numeric and 1 special character')}}
                                            </strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="password-confirm" class="{{ app()->getLocale() == 'ar' ? 'text-md-left':'text-md-right'}}">{{ __('Confirm Password') }}</label>
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>

                                <div class="form-group pt-3">
                                    
                                    <button type="submit" class="btn btn-primary btn-block">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
