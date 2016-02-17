<!-- app/views/index.php -->
<!doctype html> <html lang="en"> <head> <meta charset="UTF-8"> <title>Laravel and Angular Leerling System</title>

    <!-- CSS -->
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css"> <!-- load bootstrap via cdn -->
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css"> <!-- load fontawesome -->
    <style>
        body        { padding-top:30px; }
        form        { padding-bottom:20px; }
        .user    { padding-bottom:20px; }
    </style>

    <!-- JS -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular-resource.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular-route.min.js"></script>

    <!-- ANGULAR -->
    <!-- all angular resources will be loaded from the /public folder -->
    <script src="js/services/klasService.js"></script> <!-- load our service -->
    <script src="js/services/userService.js"></script> <!-- load our service -->
    <script src="js/services/leerlingService.js"></script> <!-- load our service -->
    <script src="js/controllers/leerlingCtrl.js"></script> <!-- load our controller -->
    <script src="js/app.js"></script> <!-- load our application -->


</head>
<!-- declare our angular app and controller -->
<body class="container" ng-app="app" ng-controller="leerlingController"> <div class="col-md-8 col-md-offset-2">

    <!-- PAGE TITLE =============================================== -->
    <div class="page-header">
        <h2>Laravel and Angular Single Page Application</h2>
        <h4>Leerling System</h4>
    </div>

    <form ng-submit="submitLeerling()"> <!-- ng-submit will disable the default form action and use our function -->

        <!-- AUTHOR -->
        <div class="form-group">
            <select class="form-control input-sm" name="users" placeholder="User"
                    ng-model="newLeerling.user_id"
                    ng-options="user.id as (user.achternaam + ' ' + user.voornaam) for user in users">
            </select>
            <p>User selected: {{newLeerling.user_id}}</p>
            <input type="text" class="form-control input-sm" name="klasnummer" ng-model="newLeerling.klasnummer" placeholder="Klasnummer">
            <select class="form-control input-sm" name="klas" placeholder="Klas"
                    ng-model="newLeerling.klas_id"
                    ng-options="klas.id as klas.code for klas in klassen">
            </select>
            <p>Klas selected: {{newLeerling.klas_id}}</p>
        </div>


        <!-- SUBMIT BUTTON -->
        <div class="form-group text-right">
            <button type="submit" class="btn btn-primary btn-lg">Submit</button>
        </div>
    </form>

    <form class="form-inline">
        <div class="form-group">
            <label >Search</label>
            <input type="text" ng-model="search" class="form-control" placeholder="Search">
        </div>
    </form>


    <!-- LOADING ICON =============================================== -->
    <!-- show loading icon if the loading variable is set to true -->
    <p class="text-center" ng-show="loading"><span class="fa fa-meh-o fa-5x fa-spin"></span></p>

    <!-- THE COMMENTS =============================================== -->
    <!-- hide these comments if the loading variable is true -->
    <div class="leerling" ng-hide="loading">
        <table class="table table-striped table-hover">
            <thead>
            <tr>
                <th ng-click="sort('id')">Id
                    <span class="glyphicon sort-icon" ng-show="sortKey=='id'" ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}"></span>
                </th>
                <th ng-click="sort('voornaam')">Voornaam
                    <span class="glyphicon sort-icon" ng-show="sortKey=='klasnummer'" ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}"></span>
                </th>
                <th ng-click="sort('achternaam')">Achternaam
                    <span class="glyphicon sort-icon" ng-show="sortKey=='user_id'" ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}"></span>
                </th>
                <th ng-click="sort('klascode')">Klas
                    <span class="glyphicon sort-icon" ng-show="sortKey=='user_id'" ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}"></span>
                </th>
                <th ng-click="sort('klasnummer')">Klasnummer
                    <span class="glyphicon sort-icon" ng-show="sortKey=='user_id'" ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}"></span>
                </th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <tr ng-repeat="leerling in leerlingen|orderBy:sortKey:reverse|filter:search">
                <td>{{leerling.id}}</td>
                <td>{{leerling.user.voornaam}}</td>
                <td>{{leerling.user.achternaam}}</td>
                <td>{{leerling.klas.code}}</td>
                <td>{{leerling.klasnummer}}</td>
                <td><a href="#" ng-click="deleteLeerling(leerling.id)" class="text-muted">Delete</a></td>
            </tr>
            </tbody>
        </table>
    </div>

</div>
</body>
</html>