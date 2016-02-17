<!-- app/views/nerds/show.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Look! I'm CRUDding</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">

    <nav class="navbar navbar-inverse">
        <div class="navbar-header">
            <a class="navbar-brand" href="{{ URL::to('users') }}">Home</a>
        </div>
        <ul class="nav navbar-nav">
            <li><a href="{{ URL::to('users') }}">Bekijk alle Users</a></li>
            <li><a href="{{ URL::to('users/create') }}">Maak een User</a>
        </ul>
    </nav>


    <div class="jumbotron text-center">
        <p>
            <strong>Voornaam:</strong> {{ $user->voornaam }}<br>
            <strong>Achternaam:</strong> {{ $user->achternaam }}
        </p>
    </div>

</div>
</body>
</html>