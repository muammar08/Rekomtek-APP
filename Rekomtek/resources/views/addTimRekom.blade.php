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

    <!-- JS -->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
    

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
                <li>
                    <a href="/arsipsurat" class="mt-2"><img src="/image/group.png" alt="">  Arsip Surat</a>
                </li>
                <li class="active">
                    <a href="/updateSK"  aria-expanded="false" class="mt-2" style="color: #152831;"><img src="/image/sync-active.png" alt="">  Update SK Tim Rekomtek</a>
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
                <form action="{{ route('skstore') }}" class="formSurat shadow container" method="post">
                    @csrf
                    <div class="container-fluid">
                        <p class="fontSub container text-dark mt-1 mb-2 " style="font-weight:600; font-size:26px;">Add Tim Rekomendasi Teknis Dinas Pengairan </p>
                        <div class="container-fluid fontKecil">
                            <p class="pb-0 mb-0 pt-2 text-dark font-weight-bold" style="font-size:16px;">Tim Rekomtek</p>
                            <div class="main-form">
                                <p class="pb-0 mb-0">Nama</p>  
                                <div class="form-group mr-3 pr-3 mb-1">
                                    <input type="text" id="nama" name="nama[]" class="form-control" placeholder="Nama Tim" required>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <p class="pb-0 mb-0">NIP</p>  
                                        <div class="form-group mr-3 pr-3 mb-1 ">
                                            <input type="text" id="nip" name="nip[]" class="form-control" placeholder="Nip Tim" required>
                                        </div>
                                        </div>
                                        <div class="col">
                                        <p class="pb-0 mb-0">Jabatan</p>  
                                        <div class="form-group mr-3 pr-3 mb-1 ">
                                            <input type="text" id="jabatan_dalam_tim" name="jabatan_dalam_tim[]" class="form-control" placeholder="Jabatan Dalam Tim" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="new-form">

                            </div>
                        </div>
                        <a class="container-fluid" href="javascript:void(0)"><button id="tambah" class="btn btn-primary mt-3" >Add</button></a>
                        <!-- <a class="container-fluid" href=""><button id="hapus" class="btn btn-danger mt-3" >Delete</button></a> -->
                    </div>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="btn col-md-12  text-right mt-3 pr-4">
                                <button type="submit"  class="btn btn-success p-2 mr-4 mt-3">Tambah Data</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div> 
        </div>   

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.6.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
                $(this).toggleClass('active');
            });
        });
    </script>

    <script type="text/JavaScript">
        $(document).ready(function (){

            // $(document).on('click', '#hapus', function(){
            //     $(this).closest('.main-form').remove();
            // });

            $(document).on('click', '#tambah', function(){
                $('.new-form').append('<div class="main-form">\
                                <p class="pb-0 mb-0">Nama</p>\
                                <div class="form-group mr-3 pr-3 mb-1">\
                                    <input type="text" id="nama" name="nama[]" class="form-control" placeholder="Nama Tim" required>\
                                </div>\
                                <div class="row">\
                                    <div class="col">\
                                        <p class="pb-0 mb-0">NIP</p>\
                                        <div class="form-group mr-3 pr-3 mb-1 ">\
                                            <input type="text" id="nip" name="nip[]" class="form-control" placeholder="Nip Tim" required>\
                                        </div>\
                                        </div>\
                                        <div class="col">\
                                        <p class="pb-0 mb-0">Jabatan</p>\
                                        <div class="form-group mr-3 pr-3 mb-1 ">\
                                            <input type="text" id="jabatan_dalam_tim" name="jabatan_dalam_tim[]" class="form-control" placeholder="Jabatan Dalam Tim" required>\
                                        </div>\
                                    </div>\
                                </div>\
                            </div>');
            });
        });
    </script>

  </body>
</html>