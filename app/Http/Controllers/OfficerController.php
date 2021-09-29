<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Officer;
use Illuminate\Support\Facades\Validator;

class OfficerController extends Controller {

    public function show() {
        return Officer::all();
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(),
            [
                'name_officer' => 'required',
                'level' => 'required'
            ]
        );

        if ($validator->fails()) {
            return Response()->json($validator->errors());
        }

        $simpan = Officer::create([
            'name_officer' => $request->name_officer,
            'level' =>$request->level
        ]);

        if ($simpan) {
            return Response()->json(['status'=>1]);
        } else {
            return Response()->json(['status'=>0]);
        }
    }
}
