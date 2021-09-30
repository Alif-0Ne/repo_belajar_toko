<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customers;
use Illuminate\Support\Facades\Validator;

class CustomersController extends Controller {

    public function show() {
        return Customers::all();
    }

    public function detail($id) {
        if (Customers::where('id_customers',$id)->exists()) {
            $data = customers::where('id_customers','=',$id)->get();

            return Response()->json($data);
        } else {
            return Response()->json(['message' => 'tidak ditemukan']);
        }
    }

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

    public function update($id, Request $request){
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

        $ubah = Customers::WHERE('id_customers',$id)->update([
            'name' => $request->name,
            'alamat' =>$request->alamat,
            'telp' => $request->telp
        ]);

        if ($ubah) {
            return Response()->json(['status'=>1]);
        } else {
            return Response()->json(['status'=>0]);
        }
    }
}
