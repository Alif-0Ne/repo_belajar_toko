<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller {
    public function store(Request $request){
        $validator = Validator::make($request->all(),
            [
                'name_product' => 'required',
                'desc' => 'required',
                'price' => 'required'
            ]
        );

        if ($validator->fails()) {
            return Response()->json($validator->errors());
        }

        $simpan = Products::create([
            'name_product' => $request->name_product,
            'desc' =>$request->desc,
            'price' => $request->price
        ]);

        if ($simpan) {
            return Response()->json(['status'=>1]);
        } else {
            return Response()->json(['status'=>0]);
        }
    }
}
