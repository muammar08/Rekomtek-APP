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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

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
				<div class="pt-3">
					<h3>Arsip Surat Perizinan Galian-C</h3>
				</div>
				<div>
					<div class="card-body">
						<div class="text-end">
							<div class="d-inline-flex bd-highlight-end">
								<input id="search" class="form-control search  border-primary text-colour-primary" type="text" style="border-radius: 7px;"  placeholder="Search..">
							</div>
							<div id="table"class="table table-responsive text-center">
								<table class="table" id="dataTable">
								<thead>
									<tr>
									<th class="text-center pb-4">No</th>
									<th>Nomor Surat</th>
									<th>Tanggal Surat</th>
									<th class="text-center pb-4">Nama</th>
									<th class="text-center pb-4">Pekerjaan</th>
									<th class="text-center pb-4">Alamat</th>
									<th class="text-center pb-4">Nama PT</th>
                                    <th class="text-center pb-4">Type</th>
									<th class="text-center pb-4">Keterangan</th>
									</tr>
								</thead>
								<tbody id="dynamic-row" class="dataall">
                                @foreach($data as $data)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$data->nomor_surat}}</td>
                                        <td>{{$data->tgl_masehi}}</td>
                                        <td>{{$data->nama}}</td>
                                        <td>{{$data->pekerjaan}}</td>
                                        <td>{{$data->alamat}}</td>
                                        <td>{{$data->nama_pt}}</td>
                                        <td>{{$data->type}}</td>
                                        <td><a href="/detailsuratsirtu{{ $data['id'] }}" class="text-primary">Detail</a></td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tbody id="searching" class="searchingdata"></tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
        </div>

        

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
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

    <script type="text/javascript">
        $('#search').on('keyup', function(){
            $value = $(this).val();

            if($value){
                $('.dataall').hide();
                $('.searchingdata').show();
            }else{
                $('.dataall').show();
                $('.searchingdata').hide();
            }

            $.ajax({
                type: 'get',
                url: '{{URL::to('searchair')}}',
                data: {'search': $value},

                success:function(data){
                    $('#searching').html(data);
                }
            });
        });
    </script>

  </body>
</html>