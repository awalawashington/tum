@extends('layouts.students.app')
@section('content')
<form action="{{ route('student.register') }}" method="post" role="form" class="form">
@csrf
    <div class="form-group mt-3">
        <input type="text" name="sir_name" id="sir_name" placeholder="Sir name" required>
    </div>
    @error('sir_name')
        <div class="my-3">
            <div class="error-message">{{ $message }}</div>
        </div>
    @enderror
    <div class="form-group mt-3">
        <input type="text" name="other_names" id="other_names" placeholder="other_names" required>
    </div>
    @error('other_names')
        <div class="my-3">
            <div class="error-message">{{ $message }}</div>
        </div>
    @enderror
    <div class="form-group mt-3">
        <input type="text" class="form-control" name="email" id="email" placeholder="Your Email" required>
    </div>
    @error('email')
        <div class="my-3">
            <div class="error-message">{{ $message }}</div>
        </div>
    @enderror

    <div class="form-group mt-3">
        <input type="text" name="phone_number" id="phone_number" placeholder="phone_number" required>
    </div>
    @error('phone_number')
        <div class="my-3">
            <div class="error-message">{{ $message }}</div>
        </div>
    @enderror

    <div class="form-group mt-3">
        <input type="text" name="admission_number" id="admission_number" placeholder="admission_number" required>
    </div>
    @error('admission_number')
        <div class="my-3">
            <div class="error-message">{{ $message }}</div>
        </div>
    @enderror

    <div class="form-group mt-3">
        <input type="date" name="dob" placeholder="dob" required>
    </div>
    @error('dob')
        <div class="my-3">
            <div class="error-message">{{ $message }}</div>
        </div>
    @enderror

    <div class="form-group mt-3">
        <input type="text" name="gender" placeholder="gender" required>
    </div>
    @error('gender')
        <div class="my-3">
            <div class="error-message">{{ $message }}</div>
        </div>
    @enderror

    <div class="form-group mt-3">
        <input type="text" class="form-control" name="password" id="password" placeholder="Your Pasword" required>
    </div>
    @error('password')
        <div class="my-3">
            <div class="error-message">{{ $message }}</div>
        </div>
    @enderror
    <div class="form-group mt-3">
        <input type="text" class="form-control" name="password_confirmation" id="password" placeholder="Confirm" required>
    </div>
    
    
    <div class="text-center"><button type="submit">Login</button></div>
</form>
@endsection