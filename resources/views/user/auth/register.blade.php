
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscripetion</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="css/regstyle.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-10 offset=md-1">
                <div class="row">
                    <div class="col-md-5 register-left">
                        <img src="{{asset('images/iconreg.png')}}">
                       <h3>Rejoignez-nous</h3> 
                       <p>vous avez déja un compte ?</p>
                       <button tupe="button" class="btn btn-primary"><a href="{{ route('login') }}">s'identifier</a></button>
                    </div>
                    <div class="col-md-7 register-right">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <h2>Inscrivez-vous ici</h2>
                            <div class="register-form">
                                <input id="name" type="text" name="name" class="form-control" :value="old('name')" required autofocus autocomplete="name" placeholder="Nom">
                                @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="register-form">
                                <input id="email" type="email" name="email" class="form-control" :value="old('email')" required autocomplete="username" placeholder="Email">
                                @error('email')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="register-form">
                                <input id="password" type="password" name="password" class="form-control" required autocomplete="new-password" placeholder="Mot de passe">
                                @error('password')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="register-form">
                                <input id="password_confirmation"  type="password" name="password_confirmation" class="form-control" required autocomplete="new-password" placeholder="Confirmation de Mot de passe">
                                @error('password_confirmation')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <input type="submit" class="btn btn-primary" value="Enregistrer">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>



