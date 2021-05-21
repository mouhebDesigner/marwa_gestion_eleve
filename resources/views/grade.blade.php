<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <link rel="stylesheet" href="{{ asset('css/grade.css') }}">
</head>
<body>
    <h2>Je veux s'inscrire comme : </h2>
    <div class="grade">
        <a href="{{ url('register_parent') }}" class="professeur">
            <img src="{{ asset('assets/images/parents.png') }}" alt="">
            <p>Parent</p>
        </a>
        <a href="{{ url('register_eleve') }}" class="eleve">
            <img src="{{ asset('assets/images/eleve.png') }}" alt="">
            <p>Elèves</p>
        </a>
    </div>
    <script src="{{ asset('js/login.js') }}"></script>
</body>
</html>