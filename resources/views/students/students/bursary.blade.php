@extends('layouts.students.app')
@section('content')

<form action="{{ route('student.bursary.family') }}" method="post" enctype="multipart/form-data" >
@csrf
    <select name="mother" >
        <option value="">Mother</option>
        <option value="1">ALIVE</option>
        <option value="0">DEAD</option>
    </select>
    @error('mother')
        <div class="my-3">
            <div class="error-message">{{ $message }}</div>
        </div>
    @enderror

    <select name="father" >
        <option value="">Father</option>
        <option value="1">ALIVE</option>
        <option value="0">DEAD</option>
    </select>
    @error('father')
        <div class="my-3">
            <div class="error-message">{{ $message }}</div>
        </div>
    @enderror

    <div class="form-group mt-3">
        <input type="text" name="father_occupation" placeholder="father_occupation" >
    </div>
    @error('father_occupation')
        <div class="my-3">
            <div class="error-message">{{ $message }}</div>
        </div>
    @enderror

    <div class="form-group mt-3">
        <input type="text" name="mother_occupation" placeholder="mother_occupation">
    </div>
    @error('mother_occupation')
        <div class="my-3">
            <div class="error-message">{{ $message }}</div>
        </div>
    @enderror

    <div class="form-group mt-3">
        <input type="text" name="father_income" placeholder="father_income" >
    </div>
    @error('father_income')
        <div class="my-3">
            <div class="error-message">{{ $message }}</div>
        </div>
    @enderror

    <div class="form-group mt-3">
        <input type="text" name="mother_income" placeholder="mother_income" >
    </div>
    @error('mother_income')
        <div class="my-3">
            <div class="error-message">{{ $message }}</div>
        </div>
    @enderror

    <label for="">MDC</label>
    <input type="file" name="mother_dc"  />
    @error('mother_dc')
        <div class="my-3">
            <div class="error-message">{{ $message }}</div>
        </div>
    @enderror

    <label for="">fDC</label>
    <input type="file" name="father_dc"  />
    @error('father_dc')
        <div class="my-3">
            <div class="error-message">{{ $message }}</div>
        </div>
    @enderror

    
    
    <div class="text-center"><button type="submit">Login</button></div>
</form>



<br><br><br><br><br><br>
<form action="{{ route('student.bursary.other_info') }}" method="post" >
@csrf

    <div class="form-group mt-3">
        <input type="number" name="helb" placeholder="helb" >
    </div>
    @error('helb')
        <div class="my-3">
            <div class="error-message">{{ $message }}</div>
        </div>
    @enderror

    <div class="form-group mt-3">
        <input type="number" name="cdf" placeholder="cdf" >
    </div>
    @error('cdf')
        <div class="my-3">
            <div class="error-message">{{ $message }}</div>
        </div>
    @enderror

    <div class="form-group mt-3">
        <input type="number" name="other_sponsors" placeholder="other_sponsors" >
    </div>
    @error('other_sponsors')
        <div class="my-3">
            <div class="error-message">{{ $message }}</div>
        </div>
    @enderror

    <select name="differment" >
        <option value="">Differement</option>
        <option value="1">Yes</option>
        <option value="0">No</option>
    </select>
    @error('differment')
        <div class="my-3">
            <div class="error-message">{{ $message }}</div>
        </div>
    @enderror

    <select name="sponsored_before" >
        <option value="">sponsored_before</option>
        <option value="1">Yes</option>
        <option value="0">No</option>
    </select>
    @error('sponsored_before')
        <div class="my-3">
            <div class="error-message">{{ $message }}</div>
        </div>
    @enderror

    <select name="school_program" >
        <option value="">school_program</option>
        <option value="1">Yes</option>
        <option value="0">No</option>
    </select>
    @error('school_program')
        <div class="my-3">
            <div class="error-message">{{ $message }}</div>
        </div>
    @enderror
    
    
    <div class="text-center"><button type="submit">Login</button></div>
</form>

<form action="{{ route('student.bursary.tumsa') }}" method="post" enctype="multipart/form-data">
@csrf

    <div class="form-group mt-3">
        <input type="number" name="ammount_requested" placeholder="req" >
    </div>
    @error('ammount_requested')
        <div class="my-3">
            <div class="error-message">{{ $message }}</div>
        </div>
    @enderror

    <div class="form-group mt-3">
        <input type="number" name="fee_balance" placeholder="bal" >
    </div>
    @error('fee_balance')
        <div class="my-3">
            <div class="error-message">{{ $message }}</div>
        </div>
    @enderror

    <label for="">Fee statement</label>
    <input type="file" name="fee_statement"  />
    @error('fee_statement')
        <div class="my-3">
            <div class="error-message">{{ $message }}</div>
        </div>
    @enderror

    
    
    <div class="text-center"><button type="submit">Login</button></div>
</form>
@endsection