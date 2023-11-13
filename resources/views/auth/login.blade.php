@extends('layouts.guest')

@section('content')
    <div class="center-block w-xxl p-t-3">
        <div class="p-a-md box-color r box-shadow-z4 text-color m-b-0">
            <div class="text-center">
                <img alt="" src="{{ asset('assets/dashboard/images/logo.png') }}">
            </div>
            <div class="m-y text-muted text-center">
                {{ __('backend.signedInToControl') }}
            </div>
            <form name="form" method="POST" action="{{ route('login') }}">
                @csrf
                @if($errors ->any())
                    <div class="alert alert-danger m-b-0">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        @foreach($errors->all() as $error)
                            <div>{{ $error }}</div>
                        @endforeach
                    </div>
                @endif

                <div class="md-form-group float-label {{ $errors->has('email') ? ' has-error' : '' }}">
                    <input type="email" name="email" :value="old('email')" required autofocus autocomplete="username" class="md-input">
                    <label>{{ __('backend.connectEmail') }}</label>
                </div>
                <div class="md-form-group float-label {{ $errors->has('password') ? ' has-error' : '' }}">
                    <input type="password"
                           name="password"
                           required autocomplete="current-password" class="md-input">
                    <label>{{ __('backend.connectPassword') }}</label>
                </div>
                @if ($errors->has('password'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                @endif
                <div class="m-b-md text-left">
                    <label class="md-check">
                        <input type="checkbox" name="remember"><i
                            class="primary"></i> {{ __('backend.keepMeSignedIn') }}
                    </label>
                </div>
                <button type="submit" class="btn primary btn-block p-x-md m-b">{{ __('backend.signIn') }}</button>
            </form>
{{--            <div class="p-v-lg text-center">--}}
{{--                <div class="m-t"><a href="{{ url('/'.env('BACKEND_PATH').'/password/reset') }}"--}}
{{--                                    class="text-primary _600">{{ __('backend.forgotPassword') }}</a></div>--}}
{{--            </div>--}}

        </div>


    </div>
@endsection
