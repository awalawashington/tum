<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FamilyStatusController extends Controller
{
    public function store(Request $request)
    {
        $user = auth()->user();

        $this->validate($request,[
            'father' => 'required|boolean',
            'mother' => 'required|boolean',
        ]);

        if ($request->father == TRUE) {
            $this->validate($request,[
                'father_occupation' => 'required|string',
                'father_income' => 'required|numeric'
            ]);
        }else{
            $this->validate($request,[
                'father_dc' => 'nullable|mimes:jpeg,gif,bmp,png,pdf|max:2048',
            ]);
        }
        if ($request->mother == TRUE) {
            $this->validate($request,[
                'mother_occupation' => 'required|string',
                'mother_income' => 'required|numeric',
            ]);
        }else{
            $this->validate($request,[
                'mother_dc' => 'nullable|mimes:jpeg,gif,bmp,png,pdf|max:2048'
            ]);
        }


        $parent_status = $user->parent_status()->create([
            "father" => $request->father,
            "mother" => $request->mother,
        ]);


        $family_status = $user->family_status()->create();


        if ($request->father == FALSE) {
            $father_dc = $request->file('father_dc');
            $father_dc_name = time()."_".  preg_replace('/\s+/', '_', strtolower($father_dc->getClientOriginalName()));
            $father_dc->storeAs('dc/mother', $father_dc_name);

            $parent_status->update([
                'father_dc' => $father_dc_name,
            ]);
        }else{
            $family_status->update([
                "father_occupation" => $request->father_occupation,
                "father_income" => $request->father_income,
            ]);
        }

        if ($request->mother == FALSE) {
            $mother_dc = $request->file('mother_dc');
            $mother_dc_name = time()."_".  preg_replace('/\s+/', '_', strtolower($mother_dc->getClientOriginalName()));
            $mother_dc->storeAs('dc/father', $mother_dc_name);

            $parent_status->update([
                'mother_dc' => $mother_dc_name,
            ]);
        }else{
            $family_status->update([
                "mother_occupation" => $request->mother_occupation,
                "mother_income" => $request->mother_income,
            ]);
        }
            

        return response()->json(
            ['message' => 'Family status successfully updated'], 200
        );

    }
}
