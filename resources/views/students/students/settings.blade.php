@extends('layouts.students.app')
@section('content')
<p>{{auth()->user()->sir_name}}</p>
<p>{{auth()->user()->other_names}}</p>
<p>{{auth()->user()->admission_number}}</p>
<p>{{auth()->user()->email}}</p>
<p>{{auth()->user()->phone_number}}</p>
<p>{{auth()->user()->gender}}</p>
<p>{{auth()->user()->dob}}</p>
<p>{{auth()->user()->residence}}</p>
<p>{{auth()->user()->home_address}}</p>
<p>{{auth()->user()->school_id}}</p>
<p>{{auth()->user()->national_id}}</p>
<p>{{auth()->user()->profile_photo}}</p>

<br><br>
<form action="{{ route('student.settings.profile') }}" method="post" enctype="multipart/form-data" >
@csrf
    <div class="form-group mt-3">
        <input type="text" class="form-control" name="residence" id="email" placeholder="residence" required>
    </div>
    @error('residence')
        <div class="my-3">
            <div class="error-message">{{ $message }}</div>
        </div>
    @enderror

    <div class="form-group mt-3">
        <input type="text" class="form-control" name="home_address" placeholder="home residence" required>
    </div>
    @error('home_address')
        <div class="my-3">
            <div class="error-message">{{ $message }}</div>
        </div>
    @enderror

    <label for="">Profile</label>
    <input type="file" name="profile_photo" accept="image/png, image/jpeg" />
    @error('profile_photo')
        <div class="my-3">
            <div class="error-message">{{ $message }}</div>
        </div>
    @enderror

    <label for="">NAT ID</label>
    <input type="file" name="national_id"  />
    @error('national_id')
        <div class="my-3">
            <div class="error-message">{{ $message }}</div>
        </div>
    @enderror

    <label for="">SCH ID</label>
    <input type="file" name="school_id"  />
    @error('school_id')
        <div class="my-3">
            <div class="error-message">{{ $message }}</div>
        </div>
    @enderror
    
    
    <div class="text-center"><button type="submit">Login</button></div>
</form>

<br><br><br><br><br><br><br><br><br><br>
<form action="{{ route('student.settings.course') }}" method="post" enctype="multipart/form-data" >
@csrf
    <div class="form-group mt-3">
        <input type="text" class="form-control" name="faculty"  placeholder="faculty" required>
    </div>
    @error('faculty')
        <div class="my-3">
            <div class="error-message">{{ $message }}</div>
        </div>
    @enderror

    <div class="form-group mt-3">
        <input type="text" class="form-control" name="department" placeholder="department" required>
    </div>
    @error('department')
        <div class="my-3">
            <div class="error-message">{{ $message }}</div>
        </div>
    @enderror

    <div class="form-group mt-3">
        <input type="text" class="form-control" name="course" placeholder="course" required>
    </div>
    @error('course')
        <div class="my-3">
            <div class="error-message">{{ $message }}</div>
        </div>
    @enderror

    <div class="form-group mt-3">
        <input type="text" class="form-control" name="year" placeholder="year" required>
    </div>
    @error('year')
        <div class="my-3">
            <div class="error-message">{{ $message }}</div>
        </div>
    @enderror

    <div class="form-group mt-3">
        <input type="text" class="form-control" name="semister" placeholder="semister" required>
    </div>
    @error('semister')
        <div class="my-3">
            <div class="error-message">{{ $message }}</div>
        </div>
    @enderror

    
    
    <div class="text-center"><button type="submit">Login</button></div>
</form>



<br><br><br><br><br><br><br><br><br><br>






<form action="{{ route('student.settings.password') }}" method="post" role="form" class="form">
@csrf
    <div class="form-group mt-3">
        <input type="text" class="form-control" name="current_password" id="email" placeholder="C password" required>
    </div>
    @error('current_password')
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

<a href="{{ route('student.dashboard') }}">Dashboard</a>
@endsection