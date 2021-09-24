<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Det_Transaction;
use Illuminate\Support\Facades\Validator;

class Det_TransactionController extends Controller {
    public function store(Request $request){
        $validator = Validator::make($request->all(),
            [
                'id_transaction' => 'required',
                'id_product' => 'required',
                'qty' => 'required',
                'subtotal' => 'required'
            ]
        );

        if ($validator->fails()) {
            return Response()->json($validator->errors());
        }

        $simpan = Det_Transaction::create([
            'id_transaction' => $request->id_transaction,
            'id_product' => $request->id_product,
            'qty' => $request->qty,
            'subtotal' => $request->subtotal
        ]);

        if ($simpan) {
            return Response()->json(['status'=>1]);
        } else {
            return Response()->json(['status'=>0]);
        }
    }
}
