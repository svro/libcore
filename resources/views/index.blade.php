<!-- app/views/index.blade.php -->
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
            <li><a href="{{ URL::to('users') }}">View All Users</a></li>
            <li><a href="{{ URL::to('users/create') }}">Create a User</a>
        </ul>
    </nav>

    <h1>All the Nerds</h1>


    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <td>ID</td>
            <td>Voornaam</td>
            <td>Achternaam</td>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->voornaam }}</td>
                <td>{{ $user->achternaam }}</td>


                <td>

                    <a class="btn btn-small btn-success" href="{{ URL::to('user/' . $user->id) }}">Show this User</a>

                    <a class="btn btn-small btn-info" href="{{ URL::to('user/' . $user->id . '/edit') }}">Edit this User</a>

                </td>
            </tr>
        @endforeach

        </tbody>
    </table>
</div>
</body>
</html>