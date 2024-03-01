<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Stroage;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\DataExport;
use App\Models\SK;
use App\Models\TimRekom;
use App\Models\SuratAir;
use App\Models\SuratSirtu;

class SKController extends Controller
{
    public function beranda(){
        $countAir = SuratAir::count(); 
        $countSirtu = SuratSirtu::count(); 

        return view('beranda',compact('countAir', 'countSirtu'));
    }

    public function pageAddTim(){
        return view('addTimRekom');
    }

    
    public function getData(){

        $sk = SK::all();
        $tim = TimRekom::all();

        return view('timRekomtek',compact('sk', 'tim'));

    }

    public function update(Request $request){

        $sk = SK::first();

        $sk->sk_kepala_dinas = $request->sk_kepala_dinas;
        $sk->save();

        $nama = $request->nama;
        $nip = $request->nip;
        $jabatan = $request->jabatan_dalam_tim;

        foreach($request->id as $key => $datas){
            $data['id'] = $request->id[$key];
            $data['nama'] = $request->nama[$key];
            $data['nip'] = $request->nip[$key];
            $data['jabatan_dalam_tim'] = $request->jabatan_dalam_tim[$key];
            
            DB::table('tim_rekomtek')->where('id', $request->id[$key])->update($data);
        }
        

        return redirect()->back();

    }

    public function store(Request $request){

        $nama = $request->nama;
        $nip = $request->nip;
        $jabatan = $request->jabatan_dalam_tim;
        
        foreach($nama as $index => $namas){
            TimRekom::create([
                'nama' => $namas,
                'nip' => $nip[$index],
                'jabatan_dalam_tim' => $jabatan[$index],
            ]);
        }

        return redirect()->back();

    }

    public function excel(){
        $dataAir = SuratAir::orderBy('id', 'desc')->get();
        $dataSirtu = SuratSirtu::orderBy('id', 'desc')->get();
        return (new DataExport($dataAir, $dataSirtu))->download('Rekap Data Air dan Galian-C.xlsx', \Maatwebsite\Excel\Excel::XLSX);
    }
}
