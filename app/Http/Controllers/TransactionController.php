<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use Illuminate\Support\Facades\Validator;

class TransactionController extends Controller {
    public function store(Request $request){
        $validator = Validator::make($request->all(),
            [
                'id_customers' => 'required',
                'id_officer' => 'required',
                'date' => 'required'
            ]
        );

        if ($validator->fails()) {
            return Response()->json($validator->errors());
        }

        $simpan = Transaction::create([
            'id_customers' => $request->id_customers,
            'id_officer' => $request->id_officer,
            'date' => $request->date
        ]);

        if ($simpan) {
            return Response()->json(['status'=>1]);
        } else {
            return Response()->json(['status'=>0]);
        }
    }
}
