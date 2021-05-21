<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>
<body>
    <h2>Gestion scolaire</h2>
    <div id="login" class="login-form-container">
    <header>S'inscrire comme étant un élève</header>
    <fieldset>
        <form method="POST" action="{{ route('register') }}">
        @csrf
        <input type="hidden" name="grade" value="eleve">
        <div class="row">
            <div class="col-md-6">
                <div class="input-wrapper">
                <input type="text" name="nom"  placeholder="Saisir votre nom" />
                </div>
                @error('nom')
                    <span class="invalid-input" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="col-md-6">
                <div class="input-wrapper">
                    <input type="text" name="prenom"  placeholder="Saisir votre prénom" />
                </div>
                @error('prenom')
                    <span class="invalid-input" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="input-wrapper">
                <input type="text" name="numtel"  placeholder="Saisir votre numéro de téléphone" />
                </div>
                @error('numtel')
                    <span class="invalid-input" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="col-md-6">
                <div class="input-wrapper">
                <input type="text" onclick="this.type='date'" name="date_naissance"  placeholder="Saisir votre date de naissance" />
                </div>
                @error('date_naissance')
                    <span class="invalid-input" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
       
        <div class="input-wrapper">
        <input type="text" name="email"  placeholder="your@email.com" />
        </div>
        @error('email')
            <span class="invalid-input" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        <div class="input-wrapper">
        <input type="password" name="password" placeholder="Mot de passe" />
        </div>
        @error('password')
            <span class="invalid-input" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        <div class="input-wrapper">
        <input type="password" name="password_confirmation" placeholder="confirmer la mot de passe" />
        </div>
        <div class="input-wrapper">
        <label for="photo" class="file_label"></label>
        <input type="file" id="photo" name="photo"  placeholder="your@photo.com" />
        </div>
        @error('photo')
            <span class="invalid-input" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        <button id="continue" type="submit">Envoyer</button>
        <p class="has_account">
          <span>Vous avez déjà un compte?</span> 
          <a href="{{ url('login') }}">Connecter</a>
        </p>
    </form>
    </fieldset>
    </div>
    <script src="{{ asset('js/login.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
</body>
</html>