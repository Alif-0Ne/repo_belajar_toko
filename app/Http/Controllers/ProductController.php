<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller {

    public function show() {
        return Product::all();
    }

    public function detail($id) {
        if (Product::where('id_product',$id)->exists()) {
            $data_trs = product::where('id_product','=',$id)->get();

            return Response()->json($data_trs);
        } else {
            return Response()->json(['message' => 'tidak ditemukan']);
        }
    }

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

        $simpan = Product::create([
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

    public function update($id, Request $request){
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

        $ubah = Product::WHERE('id_product',$id)->update([
            'name_product' => $request->name_product,
            'desc' =>$request->desc,
            'price' => $request->price
        ]);

        if ($ubah) {
            return Response()->json(['status'=>1]);
        } else {
            return Response()->json(['status'=>0]);
        }
    }
}
