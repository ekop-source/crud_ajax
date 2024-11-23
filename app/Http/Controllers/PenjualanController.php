<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\PenjualanModel; //load model yang digunakan

class PenjualanController extends Controller
{
    //method yang dipanggil pertama kali
    public function index(){
        return view('penjualan_index'); //load view
    }

    //method untuk tampilkan data di tabel
    public function data(){
        $data  = PenjualanModel::select("*")->orderBy('created_at', 'DESC')->get(); //query get semua data ke model
        $form = view("penjualan_data", ['data' => $data]); //passing data ke view
        $darr=array('data'=>''.$form.''); //convert ke bentuk array
        return response()->json($darr); //convert ke respone json
    }

    //method untuk tampilkan form input
    public function input(){
        $form = view("penjualan_input"); //load view
        $darr=array('data'=>''.$form.''); //convert ke bentuk array
        return response()->json($darr); //convert ke respone json
    }

    //method untuk insert data
    public function create(Request $request)
    {   
        $postall = $request->all(); //tangkap semua parameter yang di post
        $inputclear = \Arr::except($request->all(), array('_token', '_method')); //pisahkan parameter token 
        $idbarang = $request->input('id_barang'); //tangkap parameter id_barang yang di post

        $cek = PenjualanModel::where('id_barang', '=', $idbarang)->count(); //query cek id_barang apakah sudah ada di tabel atau belum
        if($cek) {
            return response()->json([ //respon json jika gagal
                'status' => false,
                'info' => "Id Barang Sudah ada di database"
            ], 201);
            return false;
        }

        $post = PenjualanModel::create($inputclear); //jika lolos pengecekan id_barang maka query insert ini jalan 
        return response()->json([ //respon json jika berhasil
            'status' => true,
            'info' => 'Success'
        ], 201);
    }

    //method untuk tampilkan form edit
    public function edit(Request $request)
    {
        $where = array('id' => $request->input('id')); //tangkap parameter id yang di post
        $post  = PenjualanModel::where($where)->first(); //get ke tabel di model berdasarkan id

        $form = view("penjualan_edit", ['data' => $post]); //passing data ke view
        $darr=array('data'=>''.$form.''); //convert ke bentuk array
        return response()->json($darr); //convert ke respone json
    }

    //method untuk update data
    public function update(Request $request)
    {
        $postall = $request->all(); //tangkap semua parameter yang di post
        $inputclear = \Arr::except($request->all(), array('_token', '_method')); //pisahkan parameter token 
        $id = $request->input('id'); //tangkap parameter id yang di post
        $idbarang = $request->input('id_barang'); //tangkap parameter id_barang yang di post

        $idbarang_b = PenjualanModel::select('id_barang')->where('id', $id)->first(); //get data by id untuk dapatkan id_barang lama 

        $cek = PenjualanModel::where([ //query cek id_barang apakah sudah ada di tabel atau belum dibandingkan dengan id_barang baru dan lama
            ['id_barang', '!=', $idbarang_b->idbarang],
            ['id_barang', '=', $idbarang]
        ])->count();
        if($cek) {
            return response()->json([ //respon json jika gagal
                'status' => false,
                'info' => "Id Barang Sudah ada di database"
            ], 201);
            return false;
        }

        PenjualanModel::where('id', $id)->update($inputclear); //jika lolos pengecekan id_barang maka query update ini jalan 
        return response()->json([ //respon json jika berhasil
            'status' => true,
            'info' => "Success"
        ], 201);
    }

    //method untuk delete data
    public function destroy($id)
    {
        PenjualanModel::where('id', $id)->delete(); //query delete data berdasarkan id
        return response()->json([ //respon json jika berhasil
            'status' => true,
            'info' => "Success"
        ], 201);
    }

}