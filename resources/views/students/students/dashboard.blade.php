@extends('layouts.students.app')
@section('content')
<p>{{auth()->user()->sir_name}}</p>
<p>{{auth()->user()->other_names}}</p>
<p>{{auth()->user()->admission_number}}</p>

<a href="{{ route('student.settings') }}">Settings</a>
<a href="{{ route('student.bursary') }}">Bursary</a>
@endsection