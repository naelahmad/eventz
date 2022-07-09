@extends('admin.pages.layout')
@section('content')
    <h4 class="text-center mb-4 text-white">Sign up your account</h4>
    <!-- Validation Errors -->
    <x-auth-validation-errors class="alert alert-danger mb-4" :errors="$errors" />
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="form-group">
            <label class="mb-1 text-white"><strong>Name</strong></label>
            <input type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
        </div>
        <div class="form-group">
            <label class="mb-1 text-white"><strong>Phone</strong></label>
            <input type="text" class="form-control" name="phone" value="{{ old('phone') }}">
        </div>
        <div class="form-group">
            <label class="mb-1 text-white"><strong>Email</strong></label>
            <input type="email" class="form-control" name="email" value="{{ old('email') }}">
        </div>
        <div class="form-group">
            <label class="mb-1 text-white"><strong>Password</strong></label>
            <input type="password" class="form-control" name="password" required autocomplete="new-password">
        </div>

        <div class="form-group">
            <label class="mb-1 text-white" for="password_confirmation"><strong>Password</strong></label>
            <input type="password" id="password_confirmation" class="form-control" name="password_confirmation" required>
        </div>


        <div class="text-center mt-4">
            <button type="submit" class="btn bg-white text-primary btn-block">Sign me up</button>
        </div>
    </form>
    <div class="new-account mt-3">
        <p class="text-white">Already have an account? <a class="text-white" href="{{ route('login') }}">Sign in</a></p>
    </div>
@endsection
