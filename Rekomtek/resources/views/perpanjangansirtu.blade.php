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
                <li class="active">
                    <a href="/suratrekom" aria-expanded="false" class="mt-2" style="color: #152831;"><img src="/image/add_box-active.png" alt="">  Buat Surat RekomTek</a>
                </li>
                <li>
                    <a href="/arsipsurat" class="mt-2"><img src="/image/group.png" alt="">  Arsip Surat</a>
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
                <form action="{{ route('uploadPjSirtu')}}" class="formSurat shadow container" method="post">
                    @csrf
                    <div class="container">
                        <h4 class="text-start" style="font-weight:600;">Surat Rekomendasi Teknis Perpanjangan Izin Galian C </h4>
                    </div>
                    <p class="fontSub container text-dark mt-5 mb-2" style="font-weight:600;">Bagian Alamat Surat</p>
                    <div class="row justify-content-between fontKecil container">
                        <div class="col">
                            <p class="pb-0 mb-0">Nomor Surat</p>  
                            <div class="form-group ">
                                <input type="text" id="nomor_surat" name="nomor_surat" class="form-control" placeholder="KU.602 - A/              /2022" value="KU.602 - A/              /2022" required>
                            </div>
                        </div>
                        <div class="col">
                            <p class="pb-0 mb-0">Tanggal Surat</p> 
                            <div class="form-group ">
                                <input type="date" id="tgl_masehi" name="tgl_masehi" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <p class="fontSub container text-dark mt-1 mb-2" style="font-weight:600;">Bagian Pengantar Surat</p>
                    <div class="row justify-content-between fontKecil container ">
                        <div class="col">
                            <p class="pb-0 mb-0">Nomor Surat Permohonan</p>  
                            <div class="form-group ">
                                <input type="text" id="surat_permohonan" name="surat_permohonan" class="form-control" placeholder="691/DPMPTSP/1472/2022" value="691/DPMPTSP/1472/2022" required>
                            </div>
                        </div>
                        <div class="col">
                            <p class="pb-0 mb-0">Tanggal Permohonan</p> 
                            <div class="form-group ">
                                <input type="date" id="tgl_permohonan" name="tgl_permohonan" class="form-control" required>
                            </div>
                        </div>
                        <div class="col">
                            <p class="pb-0 mb-0">Tanggal Terima Surat</p> 
                            <div class="form-group ">
                                <input type="date" id="tgl_terima" name="tgl_terima" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="container-fluid fontKecil ">
                        <p class="pb-0 mb-0">Perihal Permohonan</p>  
                        <div class="form-group mr-3 pr-3">
                            <input type="text" id="perihal_permohonan" name="perihal_permohonan" class="form-control" placeholder="Permohonan Rekomendasi Teknis Pengusahaan Sumber Daya Air" value="Permohonan Rekomendasi Teknis Pengusahaan Sumber Daya Air" required>
                        </div>
                    </div>
                    <p class="fontSub container text-dark mt-1 mb-2" style="font-weight:600;">Bagian Data Pemohon</p>
                    <div class="container-fluid fontKecil">
                        <p class="pb-0 mb-0">Nama Pemohon</p>  
                        <div class="form-group mr-3 pr-3 mb-1">
                            <input type="text" id="nama" name="nama" class="form-control" placeholder="Nama Pemohon" value="Muhammad Nurifai" required>
                        </div>
                        <p class="pb-0 mb-0">Jabatan/Pekerjaan Pemohon</p>  
                        <div class="form-group mr-3 pr-3 mb-1">
                            <input type="text" id="pekerjaan" name="pekerjaan" class="form-control" placeholder="Jabatan/Pekerjaan Pemohon" value="CEO PT. Mencari Cinta Sejati" required>
                        </div>
                        <p class="pb-0 mb-0">Alamat Pemohon</p>  
                        <div class="form-group mr-3 pr-3 mb-1">
                            <input type="text" id="alamat" name="alamat" class="form-control" placeholder="Alamat Pemohon" value="Australia" required>
                        </div>
                        <p class="pb-0 mb-0">Nama PT</p>  
                        <div class="form-group mr-3 pr-3">
                            <input type="text" id="nama_pt" name="nama_pt" class="form-control" placeholder="Nama PT" value="PT. Mencari Cinta Sejati" required>
                        </div>
                    </div>
                    <p class="fontSub container text-dark mt-1 mb-2" style="font-weight:600;">Bagian Data Lokasi</p>
                    <div class="container-fluid fontKecil">
                        <p class="pb-0 mb-0">Sumber Batuan Pasir dan Batu</p>  
                        <div class="form-group mr-3 pr-3 mb-1">
                            <input type="text" id="sumber_sirtu" name="sumber_sirtu" class="form-control" placeholder="Sumber Sirtu" value="Sungai Krueng Teunom" required>
                        </div>
                        <p class="pb-0 mb-0">Wilayah Sungai</p>  
                        <div class="form-group mr-3 pr-3 mb-1">
                            <input type="text" id="wilayah_sungai" name="wilayah_sungai" class="form-control" placeholder="Wilayah Sungai" value="Teunom - Lambeuso" required>
                        </div>
                        <div class="">
                            <div class="row">
                                <div class="col">
                                <p class="pb-0 mb-0">Kelurahan/Desa</p>  
                                <div class="form-group mr-3 pr-3 mb-1">
                                    <input type="text" id="desa" name="desa" class="form-control" placeholder="Kelurahan/Desa" value="Blang Baro" required>
                                </div>
                                </div>
                                <div class="col">
                                <p class="pb-0 mb-0">Kecamatan</p>  
                                <div class="form-group mr-3 pr-3 mb-1">
                                    <input type="text" id="kecamatan" name="kecamatan" class="form-control" placeholder="Kecamatan" value="Teunom" required>
                                </div>
                                </div>
                                <div class="w-100"></div>
                                <div class="col">
                                <p class="pb-0 mb-0">Kota/Kabupaten</p>  
                                <div class="form-group mr-3 pr-3 mb-1">
                                    <input type="text" id="kabupaten" name="kabupaten" class="form-control" placeholder="Kota/Kabupaten" value="Aceh Jaya" required>
                                </div>
                                </div>
                                <div class="col">
                                <p class="pb-0 mb-0">Provinsi</p>  
                                <div class="form-group mr-3 pr-3 mb-1">
                                    <input type="text" id="provinsi" name="provinsi" class="form-control" placeholder="Provinsi" value="Aceh" required>
                                </div>
                                </div>
                            </div>
                        </div>
                        <p class="pb-0 mb-0">Titik Koordinat Pemanfaatan</p>  
                        <div class="form-group mr-3 pr-3">
                            <input type="text" id="koordinat" name="koordinat" class="form-control" placeholder="Titik Koordinat Pengambilan Air" value="Sesuai Lampiran I dan II Keputusan Kepala Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu  Aceh Nomor : 540/DPMPTSP/1935/IUP-OP./2020 Tanggal 09 Juli 2020" required>
                        </div>
                    </div>
                    <p class="fontSub container text-dark mt-1 mb-2" style="font-weight:600;">Bagian Data Sumber Daya Air</p>
                    <div class="container-fluid fontKecil">
                        <p class="pb-0 mb-0">Tujuan Pengusahaan</p>  
                        <div class="form-group mr-3 pr-3 mb-1">
                            <input type="text" id="tujuan" name="tujuan" class="form-control" placeholder="Tujuan Pengusahaan" value="Penambangan Batuan Pasir dan Batu (Sirtu)" required>
                        </div>
                        <div class="">
                            <div class="row">
                                <div class="col">
                                <p class="pb-0 mb-0">Cara Pengambilan</p>  
                                <div class="form-group mr-3 pr-3 mb-1">
                                    <input type="text" id="pengambilan" name="pengambilan" class="form-control" placeholder="Cara Pengambilan" value="Menggunakan Alat Berat (Excavator)" required>
                                </div>
                                </div>
                                <div class="col">
                                <p class="pb-0 mb-0">Cara Pembuangan</p>  
                                <div class="form-group mr-3 pr-3 mb-1">
                                    <input type="text" id="pembuangan" name="pembuangan" class="form-control" placeholder="Cara Pembuangan" value="-" required>
                                </div>
                                </div>
                                <div class="w-100"></div>
                                <div class="col">
                                <p class="pb-0 mb-0">Jumlah/Volume Pengambilan</p>  
                                <div class="form-group mr-3 pr-3 mb-1">
                                    <input type="text" id="volume_ambil" name="volume_ambil" class="form-control" placeholder="Jumlah/Volume Pengambilan" value=".....  M3/Jam" required>
                                </div>
                                </div>
                                <div class="col">
                                <p class="pb-0 mb-0">Jangka Waktu Yang Direkomendasikan </p>  
                                <div class="form-group mr-3 pr-3 mb-1">
                                    <input type="text" id="jangka_waktu" name="jangka_waktu" class="form-control" placeholder="Jangka Waktu Yang Direkomendasikan " value="...... Tahun" required>
                                </div>
                                </div>
                            </div>
                        </div>
                        <p class="pb-0 mb-0 pt-3 text-dark font-weight-bold" style="font-size:13px;">Izin yang telah dimiliki	:</p>
                        
                        <div class="row">
                            <div class="col">
                                <p class="pb-0 mb-0">Nomor dan Tanggal Izin</p>  
                                <div class="form-group mr-3 pr-3 mb-1">
                                    <input type="text" id="nomor_izin_lama" name="nomor_izin_lama" class="form-control" placeholder="Nomor dan Tanggal Izin" value="619/DPMPTSP/3112/2018 " required>
                                </div>
                            </div>
                            <div class="col">
                                <p class="pb-0 mb-0">Tanggal Izin</p>  
                                <div class="form-group  pr-3 mb-1">
                                    <input type="date" id="tgl_izin_lama" name="tgl_izin_lama" class="form-control" required>
                                </div>
                            </div>
                            <div class="col">
                                <p class="pb-0 mb-0">Masa Berlaku Izin</p>  
                                <div class="form-group mr-3 pr-3 mb-1">
                                    <input type="date" id="masa_izin_lama" name="masa_izin_lama" class="form-control" required>
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
                                        <input type="text" id="no_berita_peninjauan" name="no_berita_peninjauan" class="form-control" placeholder="Nomor Berita Acara Peninjauan Lapangan" value="Gani" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <p class="pb-0 mb-0">Tanggal Berita Acara Peninjauan Lapangan </p>  
                                    <div class="form-group mr-3 pr-3 mb-1">
                                        <input type="date" id="tgl_berita_peninjauan" name="tgl_berita_peninjauan" class="form-control" placeholder="Tanggal Berita Acara Peninjauan Lapangan" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <p class="fontSub container text-dark mt-1 mb-2 pt-4" style="font-weight:600;">Surat Berita Acara Penyususnan</p>
                    <div class="container-fluid fontKecil">
                        <div class="">
                            <div class="row">
                                <div class="col">
                                    <p class="pb-0 mb-0">Nomor Berita Acara Penyusunan Rekomendasi Teknis  </p>  
                                    <div class="form-group mr-3 pr-3 mb-1">
                                        <input type="text" id="no_berita_acara" name="no_berita_acara" class="form-control" placeholder="Nomor Berita Acara Penyusunan Rekomendasi Teknis" value="Aceh Besar" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <p class="pb-0 mb-0">Tanggal Berita Acara Penyusunan Rekomendasi Teknis  </p>  
                                    <div class="form-group mr-3 pr-3 mb-1">
                                        <input type="date" id="tgl_berita_acara" name="tgl_berita_acara" class="form-control" placeholder="Tanggal Berita Acara Penyusunan Rekomendasi Teknis" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="type" id="type" value="air">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="btn col-md-12 bg-light text-right mt-3 pr-4">
                                <button type="submit" class="btn btn-success pr-4 pl-4 mr-4 mt-3">Buat Surat</button>
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