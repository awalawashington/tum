<?php

namespace App\Http\Controllers\Students;

use Illuminate\Http\Request;
use App\Rules\MatchOldPassword;
use App\Rules\CheckSamePassword;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rules\Password;

class SettingsController extends Controller
{

    public function updateProfile(Request $request)
    {
        $user = auth()->user();

        $this->validate($request,[
            "residence" => 'required|string',
            "home_address" => 'required|string',
            'profile_photo' => ['required', 'mimes:jpeg,gif,bmp,png', 'max:2048'],
            'school_id' => ['required', 'mimes:jpeg,gif,bmp,png,pdf', 'max:2048'],
            'national_id' => ['required', 'mimes:jpeg,gif,bmp,png,pdf', 'max:2048']
        ]);

        $profile_photo = $request->file('profile_photo');
        //$profile_photo = $profile_photo->getPathName();

        //get the original file name and replace any spaces with _
        $profile_photo_name = time()."_".  preg_replace('/\s+/', '_', strtolower($profile_photo->getClientOriginalName()));

        //move image to the temporary storage
        $profile_photo->storeAs('profiles', $profile_photo_name);

        $national_id = $request->file('national_id');
        //$national_id = $profile_photo->getPathName();

        //get the original file name and replace any spaces with _
        $national_id_name = time()."_".  preg_replace('/\s+/', '_', strtolower($national_id->getClientOriginalName()));

        //move image to the temporary storage
        $national_id->storeAs('national_id', $national_id_name);

        $school_id = $request->file('school_id');
        //$school_id = $school_photo->getPathName();

        //get the original file name and replace any spaces with _
        $school_id_name = time()."_".  preg_replace('/\s+/', '_', strtolower($school_id->getClientOriginalName()));

        //move image to the temporary storage
        $school_id->storeAs('school_id', $school_id_name);





        $user =  $user->update([
            "residence" => $request->residence,
            "home_address" => $request->home_address,
            "profile_photo" => $profile_photo_name,
            "school_id" => $school_id_name,
            "national_id" => $national_id_name
        ]);

        return response()->json(
            ['message' => 'Profile successfully updated'], 200
        );

    }

    public function updatePassword(Request $request)
    {
        
        //current password
        //new password
        //password confirmation
        
        $this->validate($request,[
            'current_password' => ['required',new MatchOldPassword],
            'password' => [
                'required', 
                'confirmed',
                Password::min(8)
                ->mixedCase()
                ->letters()
                ->numbers()
                ->symbols()
                ->uncompromised(),
                 new CheckSamePassword
                 ]
            ]);

            $request->user()->update([
                "password" => bcrypt($request->password) 
            ]);

            return response()->json(
                ['message' => 'Password successfully updated'], 200
            );

    }


}
