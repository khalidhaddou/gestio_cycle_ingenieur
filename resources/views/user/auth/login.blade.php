<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Style -->
    <link rel="stylesheet" href="css/style.css">
    <title>Login</title>
  </head>
  <body>
  <div class="d-lg-flex half">
    <div class="bg order-1 order-md-2" style="background-image: url('images/fste_img.png');"></div>
    <div class="contents order-2 order-md-1">

      <div class="container">
        <div class="row align-items-center justify-content-center">
       
          <div class="col-md-7">
          <!-- <h3 class="text-center mb-6">Bienvenu a votre <strong>espace</strong></h3> -->
          <img src='images/Logo_gi.png' class="img-fluid rounded mx-auto d-block w-75 mb-5">
            <form method="POST" action="{{ route('login')}}" >
                @csrf
              <div class="form-group first">
                <label for="username">Eamil</label>
                <input type="text" class="form-control" name="email" placeholder="votre-email@gmail.com" id="email"  required autofocus autocomplete="username" >
                @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              </div>

              <div class="form-group last mb-3">
                <label for="password">Mot de passe</label>
                <input type="password" class="form-control" name="password" placeholder="Votre Mot de Passe" id="password" required autocomplete="current-password">
                @error('password')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              </div>
              
              <div class="d-flex mb-5 align-items-center">
                <label class="control control--checkbox mb-0"><span class="caption">Remember me</span>
                  <input type="checkbox" />
                  <div class="control__indicator"></div>
                </label>
                @if (Route::has('password.request'))
                <span class="ml-auto"><a href="{{ route('password.request') }}" class="forgot-pass">Mot de Passe oublier ? </a></span>
                @endif 
              </div>
              <input type="submit" value="Connexion" class="btn btn-block btn-primary">
              <div class="lein-register">
              <span class="">Vous n'avais pas une compte?<a href="{{ route('register') }}"> inscrire</a></span>
              </div>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  </body>
</html>