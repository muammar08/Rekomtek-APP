<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!-- Css External -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/sidebar.css">

    <!-- Font -->
    <script src="https://kit.fontawesome.com/0e7dbe4741.js" crossorigin="anonymous"></script>
    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200&family=Playfair+Display&family=Playfair+Display+SC&family=Poppins&family=Quicksand:wght@300&family=Work+Sans&display=swap" rel="stylesheet">

    <title>E-RekomTech</title>
  </head>
  <body>
        <nav class="navbar navbar-expand-sm shadow navbar-light pb-3 fixed-top " style="background-color:  #203A43;" >
            <div class=" container-fluid" >
                <img src="image/logo.png" class="" width="50" >
                <h3 class="nav1 ml-1 pl-5 pt-1 text-white">E-RekomTek</h3>
                <p class="nav2 pt-2 ml-1 pl-5">Elektronik Rekomendasi Teknis</p>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon text-white"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav ml-auto">
                        <a class="nav-item nav-link text-white pr-4 mr-2" href=""><img src="/image/user.png" alt=""> {{ Auth::user()->name }}<span class="sr-only">(current)</span></a>
                    </div>
                </div>
            </div>
        </nav> 

        <div class="wrapper">
        <!-- Sidebar Holder -->
        <nav id="sidebar" >

            <ul class="list-unstyled components ">
                <li class="margin">
                    <a href="/beranda" class=""><img src="/image/home_work.png" alt="">  Beranda</a>
                </li>
                <li>
                    <a href="/suratrekom" class="mt-2"><img src="/image/add_box.png" alt="">  Buat Surat RekomTek</a>
                </li>
                <li class="active">
                    <a href="/arsipsurat" aria-expanded="false" class="mt-2" style="color: #152831;"><img src="/image/group-active.png" alt="">  Arsip Surat</a>
                </li>
                <li>
                    <a href="/updateSK" class="mt-2"><img src="/image/sync.png" alt="">  Update SK Tim Rekomtek</a>
                </li>
                <li>
                    <a href="{{ route('logout') }}" class="mt-2"><img src="/image/logout.png" alt="">  Keluar</a>
                </li>
            </ul>
            <!-- <p class="margin1 text-center " style="font-size:10px;">Copyright Dinas Pengairan Provinsi Aceh</p> -->
        </nav>

        <!-- Page Content Holder -->
        <div id="content">
            
            <button type="button" id="sidebarCollapse" class="navbar-btn margin">
                <span></span>
                <span></span>
                <span></span>
            </button>

            <div class="container-fluid">
                <div class="container-fluid">
                    <div class="row">
                        <div class="btn col  mt-3 ">
                            <p class="text-center pr-3">Surat BAP</p>
                            <a href="{{url('/downloadpdf',$datas->pdf_bap)}}"><button type="submit" class="btn btn-danger pr-4 pl-4 mr-4 mt-3">PDF</button></a>
                            <a href="{{url('/downloadword',$datas->word_bap)}}"><button type="submit" class="btn btn-primary pr-3 pl-3 mr-4 mt-3">WORD</button></a>
                        </div>
                        <div class="btn col  mt-3 pr-4">
                            <p>Surat RekomTek</p>
                            <a href="{{url('/downloadpdf',$data->pdf)}}"><button type="submit" class="btn btn-danger pr-4 pl-4 mr-4 mt-3">PDF</button></a>
                            <a href="{{url('/downloadword',$data->word)}}"><button type="submit" class="btn btn-primary pr-3 pl-3 mr-4 mt-3">WORD</button></a>
                        </div>
                    </div>
                </div>
                <form action="" class="formSurat shadow container" method="post">
                    @csrf
                    <div class="container">
                        <h3 class="text-center" style="font-weight:600;">{{$data->nama_pt}}</h3>
                        <h4 class="text-center" style="font-weight:600;">Surat Rekomendasi Teknis Permohonan Izin Pengelolaan Galian-C </h4>
                    </div>
                    
                    <p class="fontSub container text-dark mt-5 mb-2" style="font-weight:600;">Bagian Alamat Surat</p>
                    <input type="hidden" name="id" value="{{$data->id}}">
                    <div class="row justify-content-between fontKecil container">
                        <div class="col">
                            <p class="pb-0 mb-0">Nomor Surat</p>  
                            <div class="form-group ">
                                <p class="form-control border-0">{{$data->nomor_surat}}</p>
                            </div>
                        </div>
                        <div class="col">
                            <p class="pb-0 mb-0">Tanggal Surat</p> 
                            <div class="form-group ">
                                <p class="form-control border-0">{{$data->tgl_masehi}}</p>
                            </div>
                        </div>
                    </div>
                    <p class="fontSub container text-dark mt-1 mb-2" style="font-weight:600;">Bagian Pengantar Surat</p>
                    <div class="row justify-content-between fontKecil container ">
                        <div class="col">
                            <p class="pb-0 mb-0">Nomor Surat Permohonan</p>  
                            <div class="form-group ">
                                <p class="form-control border-0">{{$data->surat_permohonan}}</p>
                            </div>
                        </div>
                        <div class="col">
                            <p class="pb-0 mb-0">Tanggal Permohonan</p> 
                            <div class="form-group ">
                                <p class="form-control border-0">{{$data->tgl_permohonan}}</p>
                            </div>
                        </div>
                        <div class="col">
                            <p class="pb-0 mb-0">Tanggal Terima Surat</p> 
                            <div class="form-group ">
                                <p class="form-control border-0">{{$data->tgl_terima}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="container-fluid fontKecil ">
                        <p class="pb-0 mb-0">Perihal Permohonan</p>  
                        <div class="form-group mr-3 pr-3">
                            <p class="form-control border-0">{{$data->perihal_permohonan}}</p>
                        </div>
                    </div>
                    <p class="fontSub container text-dark mt-1 mb-2" style="font-weight:600;">Bagian Data Pemohon</p>
                    <div class="container-fluid fontKecil">
                        <p class="pb-0 mb-0">Nama Pemohon</p>  
                        <div class="form-group mr-3 pr-3 mb-1">
                            <p class="form-control border-0">{{$data->nama}}</p>
                        </div>
                        <p class="pb-0 mb-0">Jabatan/Pekerjaan Pemohon</p>  
                        <div class="form-group mr-3 pr-3 mb-1">
                            <p class="form-control border-0">{{$data->pekerjaan}}</p>
                        </div>
                        <p class="pb-0 mb-0">Alamat Pemohon</p>  
                        <div class="form-group mr-3 pr-3 mb-1">
                            <p class="form-control border-0">{{$data->alamat}}</p>
                        </div>
                        <p class="pb-0 mb-0">Nama PT</p>  
                        <div class="form-group mr-3 pr-3">
                            <p class="form-control border-0">{{$data->nama_pt}}</p>
                        </div>
                    </div>
                    <p class="fontSub container text-dark mt-1 mb-2" style="font-weight:600;">Bagian Data Lokasi</p>
                    <div class="container-fluid fontKecil">
                        <p class="pb-0 mb-0">Sumber Batuan Pasir dan Batu</p>  
                        <div class="form-group mr-3 pr-3 mb-1">
                            <p class="form-control border-0">{{$data->sumber_sirtu}}</p>
                        </div>
                        <p class="pb-0 mb-0">Wilayah Sungai</p>  
                        <div class="form-group mr-3 pr-3 mb-1">
                            <p class="form-control border-0">{{$data->wilayah_sungai}}</p>
                        </div>
                        <div class="">
                            <div class="row">
                                <div class="col">
                                <p class="pb-0 mb-0">Kelurahan/Desa</p>  
                                <div class="form-group mr-3 pr-3 mb-1">
                                    <p class="form-control border-0">{{$data->desa}}</p>
                                </div>
                                </div>
                                <div class="col">
                                <p class="pb-0 mb-0">Kecamatan</p>  
                                <div class="form-group mr-3 pr-3 mb-1">
                                    <p class="form-control border-0">{{$data->kecamatan}}</p>
                                </div>
                                </div>
                                <div class="w-100"></div>
                                <div class="col">
                                <p class="pb-0 mb-0">Kota/Kabupaten</p>  
                                <div class="form-group mr-3 pr-3 mb-1">
                                    <p class="form-control border-0">{{$data->kabupaten}}</p>
                                </div>
                                </div>
                                <div class="col">
                                <p class="pb-0 mb-0">Provinsi</p>  
                                <div class="form-group mr-3 pr-3 mb-1">
                                    <p class="form-control border-0">{{$data->provinsi}}</p>
                                </div>
                                </div>
                            </div>
                        </div>
                        <p class="pb-0 mb-0">Titik Koordinat Pengambilan Air</p>  
                        <div class="form-group mr-3 pr-3">
                            <p class="form-control border-0">{{$data->koordinat}}</p>
                        </div>
                    </div>
                    <p class="fontSub container text-dark mt-1 mb-2 pt-4" style="font-weight:600;">Bagian Data Sumber Daya Air</p>
                    <div class="container-fluid fontKecil">
                        <p class="pb-0 mb-0">Tujuan Pengusahaan</p>  
                        <div class="form-group mr-3 pr-3 mb-1">
                            <p class="form-control border-0">{{$data->tujuan}}</p>
                        </div>
                        <div class="">
                            <div class="row">
                                <div class="col">
                                <p class="pb-0 mb-0">Cara Pengambilan</p>  
                                <div class="form-group mr-3 pr-3 mb-1">
                                    <p class="form-control border-0">{{$data->pengambilan}}</p>
                                </div>
                                </div>
                                <div class="col">
                                <p class="pb-0 mb-0">Cara Pembuangan</p>  
                                <div class="form-group mr-3 pr-3 mb-1">
                                    <p class="form-control border-0">{{$data->pembuangan}}</p>
                                </div>
                                </div>
                                <div class="w-100"></div>
                                <div class="col">
                                <p class="pb-0 mb-0">Jumlah/Volume Pengambilan</p>  
                                <div class="form-group mr-3 pr-3 mb-1">
                                    <p class="form-control border-0">{{$data->volume_ambil}}</p>
                                </div>
                                </div>
                                <div class="col">
                                <p class="pb-0 mb-0">Jangka Waktu Yang Direkomendasikan </p>  
                                <div class="form-group mr-3 pr-3 mb-1">
                                    <p class="form-control border-0">{{$data->jangka_waktu}}</p>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <p class="fontSub container text-dark mt-1 mb-2" style="font-weight:600;">Bagian Data Verivikasi</p>
                    <div class="container-fluid fontKecil">
                        <div class="">
                            <div class="row">
                                <div class="col">
                                <p class="pb-0 mb-0">Nomor Berita Acara Peninjauan Lapangan</p>  
                                <div class="form-group mr-3 pr-3 mb-1">
                                    <p class="form-control border-0">{{$data->no_berita_peninjauan}}</p>
                                </div>
                                </div>
                                <div class="col">
                                <p class="pb-0 mb-0">Tanggal Berita Acara Peninjauan Lapangan </p>  
                                <div class="form-group mr-3 pr-3 mb-1">
                                    <p class="form-control border-0">{{$data->tgl_berita_peninjauan}}</p>
                                </div>
                                </div>
                                <div class="w-100"></div>
                                <div class="col">
                                <p class="pb-0 mb-0">Nomor Berita Acara Penyusunan Rekomendasi Teknis  </p>  
                                <div class="form-group mr-3 pr-3 mb-1">
                                    <p class="form-control border-0">{{$data->no_berita_acara}}</p>
                                </div>
                                </div>
                                <div class="col">
                                <p class="pb-0 mb-0">Tanggal Berita Acara Penyusunan Rekomendasi Teknis  </p>  
                                <div class="form-group mr-3 pr-3 mb-1">
                                    <p class="form-control border-0">{{$data->tgl_berita_acara}}</p>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div> 
        </div>   

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
                $(this).toggleClass('active');
            });
        });
    </script>

  </body>
</html>