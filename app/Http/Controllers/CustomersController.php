<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customers;
use Illuminate\Support\Facades\Validator;

class CustomersController extends Controller {
    public function store(Request $request){
        $validator = Validator::make($request->all(),
            [
                'name' => 'required',
                'alamat' => 'required',
                'telp' => 'required'
            ]
        );

        if ($validator->fails()) {
            return Response()->json($validator->errors());
        }

        $simpan = Customers::create([
            'name' => $request->name,
            'alamat' =>$request->alamat,
            'telp' => $request->telp
        ]);

        if ($simpan) {
            return Response()->json(['status'=>1]);
        } else {
            return Response()->json(['status'=>0]);
        }
    }
}
