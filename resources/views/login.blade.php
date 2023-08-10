
    {{-- <link rel="stylesheet" href={{ asset('') }}> --}}

    <!doctype html>
    <html lang="en">
      <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

        <link rel="stylesheet" href={{ asset('fonts/icomoon/style.css') }}>

        <link rel="stylesheet" href={{ ('css/owl.carousel.min.css') }}>

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href={{ ('css/bootstrap.min.css') }}>

        <!-- Style -->
        <link rel="stylesheet" href={{ ('css/style.css') }}>

        <title>Form Login</title>
      </head>
      <body>


      <div class="d-md-flex half">
        <div class="bg" style="background-image: url('images/kantor.jpg');"></div>
        <div class="contents">

          <div class="container">
            <div class="row align-items-center justify-content-center">
              <div class="col-md-12">
                <div class="form-block mx-auto">
                  <div class="text-center mb-5">
                  <h3><strong>Login</strong></h3>
                  <p class="mb-4">Selamat Datang Kembali! Silakan Login Terlebih Dahulu.</p>
                  @if ($errors->any())
                  <div class="alert alert-danger">
                      <ul>
                          @foreach ($errors->all() as $item)
                          <li>{{ $item }}</li>
                          @endforeach
                      </ul>
                  </div>
              @endif
                  </div>
                  <form action="#" method="post">
                    @csrf
                    <div class="form-group first">
                        <label for="email">Email</label>
                        <input type="email" value="{{ old('email')}}" class="form-control" name="email" placeholder="Contoh: nama@gmail.com">
                    </div>
                    <div class="form-group last mb-3">
                        <label for="password">Kata Sandi</label>
                        <input type="password" value="{{ old('password')}}" class="form-control" name="password" placeholder="Masukan Kata Sandi">
                    </div>

                    <div class="d-sm-flex mb-5 align-items-center">
                      <label class="control control--checkbox mb-3 mb-sm-0"><span class="caption">Ingatkan Saya</span>
                        <input type="checkbox" checked="checked"/>
                        <div class="control__indicator"></div>
                      </label>
                      <span class="ml-auto"><a href="#" class="forgot-pass">Lupa Kata Sandi?</a></span>
                    </div>

                    <input type="submit" value="Log In" class="btn btn-block btn-primary">
                  </form> <br>
                  <p class="text-center">Belum Punya Akun? <a data-toggle="tab" href="#signup">Daftar</a></p>
                </div>
              </div>
            </div>
          </div>
        </div>


      </div>



        <script src={{ ('js/jquery-3.3.1.min.js') }}></script>
        <script src={{ ('js/popper.min.js') }}></script>
        <script src={{ ('js/bootstrap.min.js') }}></script>
        <script src={{ ('js/main.js') }}></script>
      </body>
    </html>
