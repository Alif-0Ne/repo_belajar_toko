<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Det_Transaction;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class Det_TransactionController extends Controller {

    public function show() {
        $data = DB::table('det_transaction')
            ->join('transaction', 'det_transaction.id_transaction', '=', 'transaction.id_transaction')
            ->join('product', 'det_transaction.id_product', '=', 'product.id_product')
            ->select('det_transaction.id_transaction', 'det_transaction.id_product', 'det_transaction.qty', 'det_transaction.subtotal')
            ->get();
        return Response()->json($data);
    }

    public function detail($id) {
        if (Det_Transaction::where('id_detail_transaction',$id)->exists()) {
            $data_trs = det_transaction::where('det_transaction.id_detail_transaction','=',$id)->get();

            return Response()->json($data_trs);
        } else {
            return Response()->json(['message' => 'tidak ditemukan']);
        }
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(),
            [
                'id_transaction' => 'required',
                'id_product' => 'required',
                'qty' => 'required'
            ]
        );

        if ($validator->fails()) {
            return Response()->json($validator->errors());
        }

        $id_product = $request->id_product;
        $qty = $request->qty;
        $harga = DB::table('product')->where('id_product', $id_product)->value('price');
        $subtotal = $harga * $qty;

        $simpan = Det_Transaction::create([
            'id_transaction' => $request->id_transaction,
            'id_product' => $request->id_product,
            'qty' => $request->qty,
            'subtotal' => $subtotal
        ]);

        if ($simpan) {
            return Response()->json(['status'=>1]);
        } else {
            return Response()->json(['status'=>0]);
        }
    }
}
