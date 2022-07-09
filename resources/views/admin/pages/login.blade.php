@extends('admin.pages.layout')
@section('content')
    <h4 class="text-center mb-4 text-white">Sign in your account</h4>
    <!-- Session Status -->
    <x-auth-session-status class="alert alert-danger mb-4" :status="session('status')" />

    <!-- Validation Errors -->
    <x-auth-validation-errors class="alert alert-danger mb-4" :errors="$errors" />
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="form-group">
            <label class="mb-1 text-white"><strong>Email / Name / Phone</strong></label>
            <input type="text" class="form-control" name="login" value="{{ old('login') }}">
        </div>
        <div class="form-group">
            <label class="mb-1 text-white"><strong>Password</strong></label>
            <input type="password" class="form-control" name="password" required autocomplete="current-password">
        </div>
        <div class="text-center mt-4">
            <button type="submit" class="btn bg-white text-primary btn-block">LOGIN</button>
        </div>
    </form>
    <div class="new-account mt-3">
        <p class="text-white">Don't have an account? <a class="text-white" href="{{ route('register') }}">Register</a>
        </p>
    </div>
@endsection
