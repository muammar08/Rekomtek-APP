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

            <h3 class="text-center fontSurat" style="font-weight: 600;">Buat Surat Rekomendasi Teknis</h3>

            <div class="container overflow-hidden">
                <div class="row gy-5 justify-content-center">
                    <div class="col-md-4 my-4">
                        <div class="card1">
                            <img class="card-img-top pt-3" src="image/blue_water.png" alt="Card image cap" style="width: 152px; height: 116px;">
                            <div class="card-body text-start">
                                <h3 class="fontSurat" style="font-size:22px; font-weight: 600; text-align:start;">RekomTek Jenis Air</h3>
                                <div class="align-items-start mt-3">
                                    <a href="/izinpengelolaanair"><img src="/image/pin.png" alt="">Permohonan Izin Baru</a>
                                </div>
                                <div class="align-items-start mt-0">
                                    <a href="/perpanjanganpengelolaanair"><br><img src="/image/pin.png" alt="" >Perpanjangan Izin</a>
                                </div>
                                <div class="align-items-start mt-0">
                                    <a href=""><br><img src="/image/pin.png" alt="">Lorem Ipsum</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 my-4">
                        <div class="card1">
                            <img class="card-img-top pt-3" src="image/man_digging.png" alt="Card image cap" style="width: 69px; height: 116px;">
                            <div class="card-body text-start">
                                <h3 class="fontSurat" style="font-size:22px; font-weight: 600; text-align:start;">RekomTek Jenis Galian-C</h3>
                                <div class="align-items-start mt-3">
                                    <a href="/izinpengelolaansirtu"><img src="/image/pin.png" alt="">Permohonan Izin Baru</a>
                                </div>
                                <div class="align-items-start mt-0">
                                    <a href="/perpanjanganpengelolaansirtu"><br><img src="/image/pin.png" alt="" >Perpanjangan Izin</a>
                                </div>
                                <div class="align-items-start mt-0">
                                    <a href=""><br><img src="/image/pin.png" alt="">Lorem Ipsum</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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