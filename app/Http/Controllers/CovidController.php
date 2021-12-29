<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Covid;
use PhpParser\Node\Stmt\Echo_;

class CovidController extends Controller
{
    public function index(){
        #mengambil data dari database dengan models covid menggunakan eloquent ::all()
        $data = Covid::all();
        #mengembalikan data menjadi bentuk json dan memberikan response http
        return response()->json($data, 200);
    }

    public function show($id) {
        #mengambil data dari database dengan models covid menggunakan eloquent ::find()
        $find = Covid::find($id);

        $data = [
            'message' => 'Get Detail',
            'data' => $find
        ];
        #mengembalikan data menjadi bentuk json dan memberikan response http
        return response()->json($data,200);
 
    }

    public function search($name){
        #mengambil data dari database dengan models covid menggunakan eloquent ::where()
        $find = Covid::where('name', $name)->get();

        $data = [
            'message' => 'Search by Name',
            'data' => $find
        ];
        #mengembalikan data menjadi bentuk json dan memberikan response http
        return response()->json($data,200);

    }

    public function positive(){
        #mengambil data dari database dengan models covid menggunakan eloquent ::where()
        $find = Covid::where('status', 'positive')->get();

        $data = [
            'message' => 'Get Positive Patients',
            'data' => $find
        ];
        #mengembalikan data menjadi bentuk json dan memberikan response http
        return response()->json($data,200);
    }

    public function recovered(){
        #mengambil data dari database dengan models covid menggunakan eloquent ::where()
        $find = Covid::where('status', 'recovered')->get();

        $data = [
            'message' => 'Get Recovered Patients',
            'data' => $find
        ];
        #mengembalikan data menjadi bentuk json dan memberikan response http
        return response()->json($data,200);
    }

    public function dead(){
        #mengambil data dari database dengan models covid menggunakan eloquent ::where()
        $find = Covid::where('status', 'dead')->get();

        $data = [
            'message' => 'Get Dead Patients',
            'data' => $find
        ];
        #mengembalikan data menjadi bentuk json dan memberikan response http
        return response()->json($data,200);
    }

    public function store(Request $request){
        #menyimpan data input dari user dengan eloquent request lalu disimpan pada variabel agar dapat digunakan dan di validasi
        $input = $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'status' => 'required',
            'in_date_at' => 'required',
            'out_date_at' => 'nullable'
        ]);
        #mengirim data dengan models create ke database
        $patients = Covid::create($input);

        $data = [
            'message'=> 'Patients Has Been Added',
            'data' => $patients
        ];
        #mengembalikan data menjadi bentuk json dan memberikan response http
        return response()->json($data,201);
    }

    public function update(Request $request, $id){
        #mengambil data dari database dengan models covid menggunakan eloquent ::find()
        $find = Covid::find($id);

        $find->update([
            'name' => $request->name ?? $find->name,
            'phone' => $request->phone ?? $find->phone,
            'address' => $request->address ?? $find->address,
            'status' => $request->status ?? $find->status,
            'in_date_at' => $request->in_date_at ?? $find->in_date_at,
            'out_date_at' => $request->out_date_at ?? $find->out_date_at
        ]);

        $data = [
            'message' => 'Has Been Update',
            'data' => $find
        ];
        #mengembalikan data menjadi bentuk json dan memberikan response http
        return response()->json($data, 201);
    }

    public function destroy($id){
        #mengambil data dari database dengan models covid menggunakan eloquent ::find()
        $find = Covid::find($id)->delete();

        $data = [
            'message' => 'Data Deleted',
            'data' => $find
        ];
        #mengembalikan data menjadi bentuk json dan memberikan response http
        return response()->json($data,200);


    }

   
}