<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller {

    public function show() {
        $data = DB::table('transaction')
            ->join('customers', 'customers.id_customers', '=', 'transaction.id_customers')
            ->join('officer', 'officer.id_officer', '=', 'transaction.id_officer')
            ->select('transaction.id_transaction', 'transaction.id_officer', 'transaction.id_customers', 'transaction.date')
            ->get();
        return Response()->json($data);
    }

    public function detail($id) {
        if (Transaction::where('id_transaction',$id)->exists()) {
            $data_trs = transaction::where('id_transaction','=',$id)->get();

            return Response()->json($data_trs);
        } else {
            return Response()->json(['message' => 'tidak ditemukan']);
        }
    }

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

    public function update($id, Request $request){
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

        $ubah = Transaction::WHERE('id_transaction',$id)->update([
            'id_customers' => $request->id_customers,
            'id_officer' => $request->id_officer,
            'date' => $request->date
        ]);

        if ($ubah) {
            return Response()->json(['status'=>1]);
        } else {
            return Response()->json(['status'=>0]);
        }
    }
}
