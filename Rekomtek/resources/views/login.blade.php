<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <style>
        ::placeholder {
    color: red;
  }
    </style>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!-- CSS External -->
    <link rel="stylesheet" href="css/style.css">

    <!-- Font -->
    <script src="https://kit.fontawesome.com/0e7dbe4741.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200&family=Playfair+Display&family=Playfair+Display+SC&family=Poppins&family=Quicksand:wght@300&display=swap" rel="stylesheet">

    <title>E-RekomTech</title>
  </head>
  <body style="background-image: url('image/index.png'); " class="background-color container-fluid">
    

    <div class="d-flex flex row justify-content-center">
        <div class="col-md-6 col-lg-3">
            <form action="{{ route('login') }}" class="shadow pl-3 pr-3 pb-3 mb-5 mt-5 rounded background-color" method="post">
                @csrf
                <div class="justify-content-center text-center mt-4 pt-3">
                    <img src="/image/logo.png" alt="" width="150" height="150">
                    <h4 class="text-warning mt-3">E-RekomTek</h4>
                    <p class="text-warning">Elektronik Rekomendasi <br> Teknis</p>
                </div>
                <div class="form-group">
                    @if(session('errors'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            Something it's wrong:
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                            </ul>
                        </div>
                    @endif
                    @if (Session::has('success'))
                        <div class="alert alert-success">
                            {{ Session::get('success') }}
                        </div>
                    @endif
                    @if (Session::has('error'))
                        <div class="alert alert-danger">
                            {{ Session::get('error') }}
                        </div>
                    @endif
                    <div class="form-group">
                        <input type="text" id="name" name="name" class="form-control border-0 fontAwesome" placeholder="&#xf2bd;   Username...." required>
                    </div>
                    <div class="form-group">
                        <input id="password-field" type="password" name="password" class="form-control border-0 fontAwesome" placeholder="&#xf023;    Password...." required>
                    </div>
                    <div class="form-group">
                        <input type="checkbox" name="remember" class="rounded" value="1">
                        <label for="remember" class=" font">Remember me</label>
                    </div>
                    <div class="form-group text-center">
                        <button type="submit" class="form-control btn btn-success text-white">Log in</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <footer>
        <div class="justify-content-center text-center fontFooter text-light">
        Copyright Dinas Pengairan Provinsi Aceh
        </div>
    </footer>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>