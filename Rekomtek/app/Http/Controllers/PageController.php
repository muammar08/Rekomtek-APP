<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Stroage;

use PDF;

use App\Models\Data;




class PageController extends Controller
{


   public function uploadpage(){
   	
   	return view('dashboard');

   }

   public function store(Request $request){

      require_once('E:\Coding\ProjekKP\testApp\vendor\autoload.php');
      
      $template = new \PhpOffice\PhpWord\TemplateProcessor('template/template.docx');

      $template->setValues([
         'name' => $request->name,
         'pekerjaan'=> $request->pekerjaan,
         'alamat' => $request->alamat
      ]);

      $fileName = 'word/'.time().'-'.$request->name.'.'.'docx';

      $template->saveAs($fileName);

      $filename = time().'-'.$request->name.'.'.'docx';

      $clientSecret="0358e2a5292e3cf759198d81ea3b564f";
      $clientId="f8f0581d-4ee4-4406-90cf-264930e0b848";

      $wordsApi = new \Aspose\Words\WordsApi($clientId, $clientSecret);

      $format = "pdf";
      $file = ($fileName);
      
      $aspose = new \Aspose\Words\Model\Requests\ConvertDocumentRequest($file, $format,null);
      $result = $wordsApi->ConvertDocument($aspose);	
      copy($result->getPathName(),'pdf/'.time().'-'.$request->name.'.'.'pdf');
      print_r($result->getPathName());
      $pdfName = time().'-'.$request->name.'.'.'pdf';
      
      Data::create([
         'name' => $request->name,
         'word' => $filename,
         'pdf' => $pdfName,
      ]);
      
      return redirect()->back();

   }

   public function show()
   {

   	$data=data::all();
   	return view('showproduct',compact('data'));
   }

   public function downloadword(Request $request,$word){
   	
      return response()->download(public_path('word/'.$word));
   }

   public function downloadpdf(Request $request,$pdf){
   	
      return response()->download(public_path('pdf/'.$pdf));
   }

   public function view($id)
   {
   	$data=Data::find($id);

   	return view('viewproduct',compact('data'));

   }
}