<!-- app/views/nerds/create.blade.php -->

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

    <h1>Maak een user</h1>




    {!! Form::open(array('url' => 'users')) !!}

    <div class="form-group">
        {!! Form::label('voornaam', 'Voornaam') !!}
        {!! Form::text('voornaam', Input::old('voornaam'), array('class' => 'form-control')) !!}
    </div>

    <div class="form-group">
        {!! Form::label('achternaam', 'Achternaam')  !!}
        {!! Form::text('achternaam', Input::old('achternaam'), array('class' => 'form-control'))  !!}
    </div>



    {!! Form::submit('Maak de User aan!', array('class' => 'btn btn-primary')) !!}

    {!! Form::close()  !!}

</div>
</body>
</html>