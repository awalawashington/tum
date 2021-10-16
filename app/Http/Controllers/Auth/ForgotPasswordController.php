<?php

namespace App\Http\Controllers\Auth;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\UserResetPasswordCode;
use App\Notifications\EmailVerification;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    public function request_otp_view()
    {
        return view('students.auth.forgot_password');
    }

    public function verify_otp_view()
    {
        if (!session('email')) {
            return redirect('student/password/email');
        }
        return view('students.auth.verify');
    }

    public function request_otp(Request $request)
    {
        //validate the email
        $this->validate($request,[
            'email' => ['required','email'],
            ]);
     

        if (!(User::where('email', $request->email)->first())) {
            return redirect()->route('student.password.email')->with('fail','Email does not exist');
        }

        
        //create email for otp
        $email = UserResetPasswordCode::create([
            'email' => $request->email,
            'verification_code' => $this->generateRandomString(),
            'verification_code_expires_at' => Carbon::now()->addMinutes(30)->timestamp,
        ]);

        $this->sendMail($email);

        return redirect('student/password/verify')->with('email', $email);

    }

    private function sendMail(UserResetPasswordCode $email)
    {
        $verification_data = [
            'body' => "OTP For password reset is ". $email->verification_code ,
            'text' => $email->verification_code,
            'url' => url('/'),
            'thankyou' => "You have 30minutes to verify"
        ];

        $email->notify(new EmailVerification($verification_data));
    }

    protected  function generateRandomString() {
        $numbers = substr(str_shuffle('0123456789'), 0, 3);
        $uc_letters = substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, 3);
        $lc_letters = substr(str_shuffle('abcdefghijklmnopqrstuvwxyz'), 0, 3);
        return substr(str_shuffle($numbers."".$uc_letters."".$lc_letters), 0, 8);
    }

    public function verify_otp(Request $request)
    {
        dd('ss');
        //validate the email
        $this->validate($request,[
            'email' => ['required','email'],
            ]);

        $email = UserVerificationCode::where('email' ,$request->email)->latest()->first();

        if (Carbon::now()->gt($email->verification_code_expires_at)) {
            return redirect()->route('student.password.verify')->with('fail','Verification Code expired');
        }
      
        if ($request->verification_code !== $email->verification_code) {
            return redirect()->route('student.password.verify')->with(['fail' =>'Incorrect Code', 'email' => $email]);
        }

        return redirect()->route('student.password.reset')->with('email', $email->email);
    }
}
