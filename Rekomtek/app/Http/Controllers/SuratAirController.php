<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Stroage;
use Illuminate\Support\Facades\DB;

use Alkoumi\LaravelHijriDate\Hijri;
use Carbon\Carbon;
use App\Models\SuratAir;
use App\Models\SK;
use App\Models\TimRekom;
use App\Models\BAP;
use PDF;

class SuratAirController extends Controller
{
   
   public function pageIzinAir(){
      
      return view('izinair');
   }

   public function izinAir(Request $request){

      require_once('/Users/rifai/ngoding/E-Rekomtek/testApp/vendor/autoload.php');

      $sk = SK::where('id', 1)->value('sk_kepala_dinas');
      $tim1 = TimRekom::find(1);
      $tim2 = TimRekom::find(2);
      $tim3 = TimRekom::find(3);
      $tim4 = TimRekom::find(4);
      $tim5 = TimRekom::find(5);
      $tim6 = TimRekom::find(6);
      $tim7 = TimRekom::find(7);
      
      $template = new \PhpOffice\PhpWord\TemplateProcessor('template/izin_air.docx');

      $date = $request->tgl_masehi;
      $date1 = $request->tgl_permohonan;
      $date2 = $request->tgl_berita_peninjauan;
      $date3 = $request->tgl_berita_acara;
      $date4 = $request->tgl_permohonan2;

      $hijri = Hijri::Date('d F Y', $date);

      $dateMasehi = Carbon::createFromFormat('Y-m-d', $date)->format('d F Y');
      $dateMasehi1 = Carbon::createFromFormat('Y-m-d', $date1)->format('d F Y');
      $dateMasehi2 = Carbon::createFromFormat('Y-m-d', $date2)->format('d F Y');
      $dateMasehi3 = Carbon::createFromFormat('Y-m-d', $date3)->format('d F Y');
      $dateMasehi4 = Carbon::createFromFormat('Y-m-d', $date4)->format('d F Y');

      $template->setValues([
         'nomor_surat'           => $request->nomor_surat,
         'tgl_masehi'            => $dateMasehi,
         'tgl_hijrah'            => $hijri,
         'surat_permohonan'      => $request->surat_permohonan,
         'tgl_permohonan'        => $dateMasehi1,
         'perihal_permohonan'    => $request->perihal_permohonan,
         'surat_permohonan2'     => $request->surat_permohonan2,
         'tgl_permohonan2'       => $dateMasehi4,
         'perihal_permohonan2'   => $request->perihal_permohonan2,
         'nama'                  => $request->nama,
         'pekerjaan'             => $request->pekerjaan,
         'alamat'                => $request->alamat,
         'nama_pt'               => $request->nama_pt,
         'sumber_air'            => $request->sumber_air,
         'wilayah_sungai'        => $request->wilayah_sungai,
         'desa'                  => $request->desa,
         'kecamatan'             => $request->kecamatan,
         'kabupaten'             => $request->kabupaten,
         'provinsi'              => $request->provinsi,
         'koordinat'             => $request->koordinat,
         'tujuan'                => $request->tujuan,
         'pengambilan'           => $request->pengambilan,
         'pembuangan'            => $request->pembuangan,
         'volume_ambil'          => $request->volume_ambil,
         'jangka_waktu'          => $request->jangka_waktu,
         'nomor_izin_lama'       => $request->nomor_izin_lama,
         'masa_izin_lama'        => $request->masa_izin_lama,
         'volume_izin'           => $request->volume_izin,
         'no_berita_peninjauan'  => $request->no_berita_peninjauan,
         'tgl_berita_peninjauan' => $dateMasehi2,
         'no_berita_acara'       => $request->no_berita_acara,
         'tgl_berita_acara'      => $dateMasehi3,
         'sk_kepala_dinas'       => $sk,
         'nama1'                 => $tim1->nama,
         'nip1'                  => $tim1->nip,
         'jabatan1'              => $tim1->jabatan_dalam_tim,
         'nama2'                 => $tim2->nama,
         'nip2'                  => $tim2->nip,
         'jabatan2'              => $tim2->jabatan_dalam_tim,
         'nama3'                 => $tim3->nama,
         'nip3'                  => $tim3->nip,
         'jabatan3'              => $tim3->jabatan_dalam_tim,
         'nama4'                 => $tim4->nama,
         'nip4'                  => $tim4->nip,
         'jabatan4'              => $tim4->jabatan_dalam_tim,
         'nama5'                 => $tim5->nama,
         'nip5'                  => $tim5->nip,
         'jabatan5'              => $tim5->jabatan_dalam_tim,
         'nama6'                 => $tim6->nama,
         'nip6'                  => $tim6->nip,
         'jabatan6'              => $tim6->jabatan_dalam_tim,
         'nama7'                 => $tim7->nama,
         'nip7'                  => $tim7->nip,
         'jabatan7'              => $tim7->jabatan_dalam_tim
      ]);

      $fileName = 'word/'.time().'-'.$request->nama.'-'.'PermohonanAir'.'.'.'docx';

      $template->saveAs($fileName);

      $filename = time().'-'.$request->nama.'-'.'PermohonanAir'.'.'.'docx';

      $clientSecret="d9f1724d3ab644b4d316035a943c7895";
      $clientId="c7b3886d-6922-4e57-8c83-62c3098acf1c";

      $wordsApi = new \Aspose\Words\WordsApi($clientId, $clientSecret);

      $format = "pdf";
      $file = ($fileName);
      
      $aspose = new \Aspose\Words\Model\Requests\ConvertDocumentRequest($file, $format,null);
      $result = $wordsApi->ConvertDocument($aspose);	
      copy($result->getPathName(),'pdf/'.time().'-'.$request->nama.'-'.'PermohonanAir'.'.'.'pdf');
      print_r($result->getPathName());
      $pdfName = time().'-'.$request->nama.'-'.'PermohonanAir'.'.'.'pdf';

      SuratAir::create([
         'nomor_surat'           => $request->nomor_surat,
         'tgl_masehi'            => $request->tgl_masehi,
         'surat_permohonan'      => $request->surat_permohonan,
         'tgl_permohonan'        => $request->tgl_permohonan,
         'perihal_permohonan'    => $request->perihal_permohonan,
         'surat_permohonan2'     => $request->surat_permohonan2,
         'tgl_permohonan2'       => $request->tgl_permohonan2,
         'perihal_permohonan2'   => $request->perihal_permohonan2,
         'nama'                  => $request->nama,
         'pekerjaan'             => $request->pekerjaan,
         'alamat'                => $request->alamat,
         'nama_pt'               => $request->nama_pt,
         'sumber_air'            => $request->sumber_air,
         'wilayah_sungai'        => $request->wilayah_sungai,
         'desa'                  => $request->desa,
         'kecamatan'             => $request->kecamatan,
         'kabupaten'             => $request->kabupaten,
         'provinsi'              => $request->provinsi,
         'koordinat'             => $request->koordinat,
         'tujuan'                => $request->tujuan,
         'pengambilan'           => $request->pengambilan,
         'pembuangan'            => $request->pembuangan,
         'volume_ambil'          => $request->volume_ambil,
         'jangka_waktu'          => $request->jangka_waktu,
         'nomor_izin_lama'       => $request->nomor_izin_lama,
         'masa_izin_lama'        => $request->masa_izin_lama,
         'volume_izin'           => $request->volume_izin,
         'no_berita_peninjauan'  => $request->no_berita_peninjauan,
         'tgl_berita_peninjauan' => $request->tgl_berita_peninjauan,
         'no_berita_acara'       => $request->no_berita_acara,
         'tgl_berita_acara'      => $request->tgl_berita_acara,
         'type'                  => 'Permohonan Izin Air',
         'word'                  => $filename,
         'pdf'                   => $pdfName
      ]);

      $this->bapIzinAir($request);


      return redirect()->back();
   }

   public function bapIzinAir(Request $request){

      require_once('/Users/rifai/ngoding/E-Rekomtek/testApp/vendor/autoload.php');

      $sk = SK::where('id', 1)->value('sk_kepala_dinas');
      $tim1 = TimRekom::find(1);
      $tim2 = TimRekom::find(2);
      $tim3 = TimRekom::find(3);
      $tim4 = TimRekom::find(4);
      $tim5 = TimRekom::find(5);
      $tim6 = TimRekom::find(6);
      $tim7 = TimRekom::find(7);
      
      $template = new \PhpOffice\PhpWord\TemplateProcessor('template/bap_rekomtek_air.docx');

      $date = $request->tgl_berita_acara;
      $dateMasehi = Carbon::createFromFormat('Y-m-d', $date)->format('d F Y');

      $template->setValues([
         'nama_pt'               => $request->nama_pt,
         'sumber_air'            => $request->sumber_air,
         'desa'                  => $request->desa,
         'kecamatan'             => $request->kecamatan,
         'kabupaten'             => $request->kabupaten,
         'koordinat'             => $request->koordinat,
         'volume_ambil'          => $request->volume_ambil,
         'no_berita_acara'       => $request->no_berita_acara,
         'tgl_berita_acara'      => $dateMasehi,
         'sk_kepala_dinas'       => $sk,
         'nama1'                 => $tim1->nama,
         'nip1'                  => $tim1->nip,
         'jabatan1'              => $tim1->jabatan_dalam_tim,
         'nama2'                 => $tim2->nama,
         'nip2'                  => $tim2->nip,
         'jabatan2'              => $tim2->jabatan_dalam_tim,
         'nama3'                 => $tim3->nama,
         'nip3'                  => $tim3->nip,
         'jabatan3'              => $tim3->jabatan_dalam_tim,
         'nama4'                 => $tim4->nama,
         'nip4'                  => $tim4->nip,
         'jabatan4'              => $tim4->jabatan_dalam_tim,
         'nama5'                 => $tim5->nama,
         'nip5'                  => $tim5->nip,
         'jabatan5'              => $tim5->jabatan_dalam_tim,
         'nama6'                 => $tim6->nama,
         'nip6'                  => $tim6->nip,
         'jabatan6'              => $tim6->jabatan_dalam_tim,
         'nama7'                 => $tim7->nama,
         'nip7'                  => $tim7->nip,
         'jabatan7'              => $tim7->jabatan_dalam_tim
      ]);

      $fileName = 'word/'.time().'-'.$request->nama.'-'.'BAP-PermohonanAir'.'.'.'docx';

      $template->saveAs($fileName);

      $filename = time().'-'.$request->nama.'-'.'BAP-PermohonanAir'.'.'.'docx';

      $clientSecret="d9f1724d3ab644b4d316035a943c7895";
      $clientId="c7b3886d-6922-4e57-8c83-62c3098acf1c";

      $wordsApi = new \Aspose\Words\WordsApi($clientId, $clientSecret);

      $format = "pdf";
      $file = ($fileName);
      
      $aspose = new \Aspose\Words\Model\Requests\ConvertDocumentRequest($file, $format,null);
      $result = $wordsApi->ConvertDocument($aspose);	
      copy($result->getPathName(),'pdf/'.time().'-'.$request->nama.'-'.'BAP-PermohonanAir'.'.'.'pdf');
      print_r($result->getPathName());
      $pdfName = time().'-'.$request->nama.'-'.'BAP-PermohonanAir'.'.'.'pdf';

      BAP::create([
         'no_berita_acara'       => $request->no_berita_acara,
         'tgl_berita_acara'      => $request->tgl_berita_acara,
         'nama_pt'               => $request->nama_pt,
         'type'                  => 'BAP Permohonan Izin Air',
         'word_bap'              => $filename,
         'pdf_bap'               => $pdfName
      ]);


      return redirect()->back();
   }

   public function pagePerpanjanganAir(){

      return view('perpanjanganair');
   }

   public function perpanjanganAir(Request $request){

      require_once('/Users/rifai/ngoding/E-Rekomtek/testApp/vendor/autoload.php');

      $sk = SK::where('id', 1)->value('sk_kepala_dinas');
      $tim1 = TimRekom::find(1);
      $tim2 = TimRekom::find(2);
      $tim3 = TimRekom::find(3);
      $tim4 = TimRekom::find(4);
      $tim5 = TimRekom::find(5);
      $tim6 = TimRekom::find(6);
      $tim7 = TimRekom::find(7);
      
      $template = new \PhpOffice\PhpWord\TemplateProcessor('template/perpanjangan_air.docx');

      $date = $request->tgl_masehi;
      $date1 = $request->tgl_permohonan;
      $date2 = $request->tgl_berita_peninjauan;
      $date3 = $request->tgl_berita_acara;

      $hijri = Hijri::Date('d F Y', $date);

      $dateMasehi = Carbon::createFromFormat('Y-m-d', $date)->format('d F Y');
      $dateMasehi1 = Carbon::createFromFormat('Y-m-d', $date1)->format('d F Y');
      $dateMasehi2 = Carbon::createFromFormat('Y-m-d', $date2)->format('d F Y');
      $dateMasehi3 = Carbon::createFromFormat('Y-m-d', $date3)->format('d F Y');

      $template->setValues([
         'nomor_surat'           => $request->nomor_surat,
         'tgl_masehi'            => $dateMasehi,
         'tgl_hijrah'            => $hijri,
         'surat_permohonan'      => $request->surat_permohonan,
         'tgl_permohonan'        => $dateMasehi1,
         'perihal_permohonan'    => $request->perihal_permohonan,
         'nama'                  => $request->nama,
         'pekerjaan'             => $request->pekerjaan,
         'alamat'                => $request->alamat,
         'nama_pt'               => $request->nama_pt,
         'sumber_air'            => $request->sumber_air,
         'wilayah_sungai'        => $request->wilayah_sungai,
         'desa'                  => $request->desa,
         'kecamatan'             => $request->kecamatan,
         'kabupaten'             => $request->kabupaten,
         'provinsi'              => $request->provinsi,
         'koordinat'             => $request->koordinat,
         'tujuan'                => $request->tujuan,
         'pengambilan'           => $request->pengambilan,
         'pembuangan'            => $request->pembuangan,
         'volume_ambil'          => $request->volume_ambil,
         'jangka_waktu'          => $request->jangka_waktu,
         'nomor_izin_lama'       => $request->nomor_izin_lama,
         'masa_izin_lama'        => $request->masa_izin_lama,
         'volume_izin'           => $request->volume_izin,
         'no_berita_peninjauan'  => $request->no_berita_peninjauan,
         'tgl_berita_peninjauan' => $dateMasehi2,
         'no_berita_acara'       => $request->no_berita_acara,
         'tgl_berita_acara'      => $dateMasehi3,
         'sk_kepala_dinas'       => $sk,
         'nama1'                 => $tim1->nama,
         'nip1'                  => $tim1->nip,
         'jabatan1'              => $tim1->jabatan_dalam_tim,
         'nama2'                 => $tim2->nama,
         'nip2'                  => $tim2->nip,
         'jabatan2'              => $tim2->jabatan_dalam_tim,
         'nama3'                 => $tim3->nama,
         'nip3'                  => $tim3->nip,
         'jabatan3'              => $tim3->jabatan_dalam_tim,
         'nama4'                 => $tim4->nama,
         'nip4'                  => $tim4->nip,
         'jabatan4'              => $tim4->jabatan_dalam_tim,
         'nama5'                 => $tim5->nama,
         'nip5'                  => $tim5->nip,
         'jabatan5'              => $tim5->jabatan_dalam_tim,
         'nama6'                 => $tim6->nama,
         'nip6'                  => $tim6->nip,
         'jabatan6'              => $tim6->jabatan_dalam_tim,
         'nama7'                 => $tim7->nama,
         'nip7'                  => $tim7->nip,
         'jabatan7'              => $tim7->jabatan_dalam_tim
      ]);

      $fileName = 'word/'.time().'-'.$request->nama.'-'.'PerpanjanganAir'.'.'.'docx';

      $template->saveAs($fileName);

      $filename = time().'-'.$request->nama.'-'.'PerpanjanganAir'.'.'.'docx';

      $clientSecret="d9f1724d3ab644b4d316035a943c7895";
      $clientId="c7b3886d-6922-4e57-8c83-62c3098acf1c";

      $wordsApi = new \Aspose\Words\WordsApi($clientId, $clientSecret);

      $format = "pdf";
      $file = ($fileName);
      
      $aspose = new \Aspose\Words\Model\Requests\ConvertDocumentRequest($file, $format,null);
      $result = $wordsApi->ConvertDocument($aspose);	
      copy($result->getPathName(),'pdf/'.time().'-'.$request->nama.'-'.'PerpanjanganAir'.'.'.'pdf');
      print_r($result->getPathName());
      $pdfName = time().'-'.$request->nama.'-'.'PerpanjanganAir'.'.'.'pdf';

      SuratAir::create([
         'nomor_surat'           => $request->nomor_surat,
         'tgl_masehi'            => $request->tgl_masehi,
         'surat_permohonan'      => $request->surat_permohonan,
         'tgl_permohonan'        => $request->tgl_permohonan,
         'perihal_permohonan'    => $request->perihal_permohonan,
         'nama'                  => $request->nama,
         'pekerjaan'             => $request->pekerjaan,
         'alamat'                => $request->alamat,
         'nama_pt'               => $request->nama_pt,
         'sumber_air'            => $request->sumber_air,
         'wilayah_sungai'        => $request->wilayah_sungai,
         'desa'                  => $request->desa,
         'kecamatan'             => $request->kecamatan,
         'kabupaten'             => $request->kabupaten,
         'provinsi'              => $request->provinsi,
         'koordinat'             => $request->koordinat,
         'tujuan'                => $request->tujuan,
         'pengambilan'           => $request->pengambilan,
         'pembuangan'            => $request->pembuangan,
         'volume_ambil'          => $request->volume_ambil,
         'jangka_waktu'          => $request->jangka_waktu,
         'nomor_izin_lama'       => $request->nomor_izin_lama,
         'masa_izin_lama'        => $request->masa_izin_lama,
         'volume_izin'           => $request->volume_izin,
         'no_berita_peninjauan'  => $request->no_berita_peninjauan,
         'tgl_berita_peninjauan' => $request->tgl_berita_peninjauan,
         'no_berita_acara'       => $request->no_berita_acara,
         'tgl_berita_acara'      => $request->tgl_berita_acara,
         'type'                  => 'Perpanjangan Izin Air',
         'word'                  => $filename,
         'pdf'                   => $pdfName
      ]);

      $this->bapPerpanjanganAir($request);

      // $data = SuratAir::where('pdf', 'like', '%'.$pdfName.'%')->first();

      // return view('perpanjanganpengelolaanair', compact('data'));
      //$data = DB::table('suratair')->where('pdf', $pdfName)->

      //this return use to reset form but nothing download
      return redirect()->back();
      //this return use to live download pdf but no reset form and still not working
      // return response()->download(public_path("pdf\\".$pdfName));
   }

   public function bapPerpanjanganAir(Request $request){

      require_once('/Users/rifai/ngoding/E-Rekomtek/testApp/vendor/autoload.php');

      $sk = SK::where('id', 1)->value('sk_kepala_dinas');
      $tim1 = TimRekom::find(1);
      $tim2 = TimRekom::find(2);
      $tim3 = TimRekom::find(3);
      $tim4 = TimRekom::find(4);
      $tim5 = TimRekom::find(5);
      $tim6 = TimRekom::find(6);
      $tim7 = TimRekom::find(7);
      
      $template = new \PhpOffice\PhpWord\TemplateProcessor('template/bap_rekomtek_air.docx');

      $date = $request->tgl_berita_acara;
      $dateMasehi = Carbon::createFromFormat('Y-m-d', $date)->format('d F Y');

      $template->setValues([
         'nama_pt'               => $request->nama_pt,
         'sumber_air'            => $request->sumber_air,
         'desa'                  => $request->desa,
         'kecamatan'             => $request->kecamatan,
         'kabupaten'             => $request->kabupaten,
         'koordinat'             => $request->koordinat,
         'volume_ambil'          => $request->volume_ambil,
         'no_berita_acara'       => $request->no_berita_acara,
         'tgl_berita_acara'      => $dateMasehi,
         'sk_kepala_dinas'       => $sk,
         'nama1'                 => $tim1->nama,
         'nip1'                  => $tim1->nip,
         'jabatan1'              => $tim1->jabatan_dalam_tim,
         'nama2'                 => $tim2->nama,
         'nip2'                  => $tim2->nip,
         'jabatan2'              => $tim2->jabatan_dalam_tim,
         'nama3'                 => $tim3->nama,
         'nip3'                  => $tim3->nip,
         'jabatan3'              => $tim3->jabatan_dalam_tim,
         'nama4'                 => $tim4->nama,
         'nip4'                  => $tim4->nip,
         'jabatan4'              => $tim4->jabatan_dalam_tim,
         'nama5'                 => $tim5->nama,
         'nip5'                  => $tim5->nip,
         'jabatan5'              => $tim5->jabatan_dalam_tim,
         'nama6'                 => $tim6->nama,
         'nip6'                  => $tim6->nip,
         'jabatan6'              => $tim6->jabatan_dalam_tim,
         'nama7'                 => $tim7->nama,
         'nip7'                  => $tim7->nip,
         'jabatan7'              => $tim7->jabatan_dalam_tim
      ]);

      $fileName = 'word/'.time().'-'.$request->nama.'-'.'BAP-PerpanjanganAir'.'.'.'docx';

      $template->saveAs($fileName);

      $filename = time().'-'.$request->nama.'-'.'BAP-PerpanjanganAir'.'.'.'docx';

      $clientSecret="d9f1724d3ab644b4d316035a943c7895";
      $clientId="c7b3886d-6922-4e57-8c83-62c3098acf1c";

      $wordsApi = new \Aspose\Words\WordsApi($clientId, $clientSecret);

      $format = "pdf";
      $file = ($fileName);
      
      $aspose = new \Aspose\Words\Model\Requests\ConvertDocumentRequest($file, $format,null);
      $result = $wordsApi->ConvertDocument($aspose);	
      copy($result->getPathName(),'pdf/'.time().'-'.$request->nama.'-'.'BAP-PerpanjanganAir'.'.'.'pdf');
      print_r($result->getPathName());
      $pdfName = time().'-'.$request->nama.'-'.'BAP-PerpanjanganAir'.'.'.'pdf';

      BAP::create([
         'no_berita_acara'       => $request->no_berita_acara,
         'tgl_berita_acara'      => $request->tgl_berita_acara,
         'nama_pt'               => $request->nama_pt,
         'type'                  => 'BAP Perpanjangan Izin Air',
         'word_bap'              => $filename,
         'pdf_bap'               => $pdfName
      ]);


      return redirect()->back();
   }

   public function show(){

   	$data=SuratAir::all();
   	return view('arsipair',compact('data'));
   }

   public function showDetail($id){

   	$data = SuratAir::find($id);
      $datas = BAP::find($id);
      $d = SuratAir::where('id', $id)->value('type');

      if($id){
         if($d == 'Perpanjangan Izin Air'){
            return view('detailperpanjanganair', compact('data', 'datas'));
         } else {
            return view('detailizinair', compact('data', 'datas'));
         }
      }
   }

   public function search(Request $request){

      $output = "";
      $no = 1;

      $data = SuratAir::where('nama', 'LIKE', '%'.$request->search.'%' )
                        ->orWhere('nomor_surat', 'LIKE', '%'.$request->search.'%')
                        ->orWhere('tgl_masehi', 'LIKE', '%'.$request->search.'%')
                        ->orWhere('nama_pt', 'LIKE', '%'.$request->search.'%')
                        ->orWhere('type', 'LIKE', '%'.$request->search.'%')
                        ->get();

      foreach($data as $d){

         $output .=
         '<tr>
            <td>'.$no.'</td>
            <td>'.$d->nomor_surat.'</td>
            <td>'.$d->tgl_masehi.'</td>
            <td>'.$d->nama.'</td>
            <td>'.$d->pekerjaan.'</td>
            <td>'.$d->alamat.'</td>
            <td>'.$d->nama_pt.'</td>
            <td>'.$d->type.'</td>
            <td>'.'<a href="/detailsuratair'.$d->id.'" class="text-primary">'.'Detail'.'</a>'.'</td>
         </tr>';

         $no++;
      }

      return response($output);
   }

   public function downloadword(Request $request,$word){
   	
      return response()->download(public_path('word/'.$word));
   }

   public function downloadpdf(Request $request,$pdf){
   	
      return response()->download(public_path('pdf/'.$pdf));
   }
}
