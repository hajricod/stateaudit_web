@extends('layouts.app')

@section('content')
<div class="container">
    <h3>{{__('Feedback')}}</h3>
    <hr>
    <div class="row">
        <div class="col-md-12">
            <div class="card border-0 shadow-sm">
                <div class="card-body px-3 pt-5 pb-3">
                    @if(session()->has('message'))
                        <div class="alert alert-success">
                            {{ session()->get('message') }}
                        </div>
                    @endif

                    <form action="/feedback" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="name"><span class="text-danger">*</span>{{__('Name')}}</label>
                            <input type="text" class="form-control" name="name" id="name" value="{{old('name')}}" required>
                            @error('name')
                                <p class="text-danger"> {{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="phone">{{__('Phone')}}</label>
                            <input type="tel" class="form-control" name="phone" id="phone" value="{{old('phone')}}">
                            @error('phone')
                                <p class="text-danger"> {{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="email"><span class="text-danger">*</span>{{__('Email')}}</label>
                            <input type="email" class="form-control" name="email" id="email" value="{{old('email')}}" required>
                            @error('email')
                                <p class="text-danger"> {{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="message"><span class="text-danger">*</span>{{__('Message')}}</label>
                            <textarea name="message" id="message" cols="30" rows="10" class="form-control" required>{{old('message')}}</textarea>
                            @error('message')
                                <p class="text-danger"> {{ $message }}</p>
                            @enderror
                        </div>
                        <hr>
                        <div class="d-grid gap-2 d-block">
                            <button type="submit" class="btn btn-primary">{{__('Send')}}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection