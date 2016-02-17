<!-- app/views/index.php -->
<!doctype html> <html lang="en"> <head> <meta charset="UTF-8"> <title>Lockers: Laravel and Angular Leerling System</title>

    <!-- CSS -->
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css"> <!-- load bootstrap via cdn -->
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css"> <!-- load fontawesome -->
    <style>
        body        { padding-top:30px; }
        form        { padding-bottom:20px; }


    </style>

    <!-- JS -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular-resource.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular-route.min.js"></script>

    <!-- ANGULAR -->
    <!-- all angular resources will be loaded from the /public folder -->
    <script src="js/services/klasService.js"></script> <!-- load our service -->
    <script src="js/services/userService.js"></script> <!-- load our service -->
    <script src="js/services/leerlingService.js"></script> <!-- load our service -->
    <script src="js/services/lockerGewenstService.js"></script> <!-- load our service -->
    <script src="js/services/lockerTypeService.js"></script> <!-- load our service -->
    <script src="js/services/lockerService.js"></script> <!-- load our service -->
    <script src="js/controllers/lockerCtrl.js"></script> <!-- load our controller -->
    <script src="js/app.js"></script> <!-- load our application -->


</head>
<!-- declare our angular app and controller -->
<body class="container" ng-app="app" ng-controller="lockerController">
    <div >


    <div class="page-header">
        <h4>Lockers<span ng-show="loading" class="fa fa-meh-o fa-lg fa-spin"></span></h4>
        <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#menu1">Gewenst</a></li>
            <li><a data-toggle="tab" href="#menu2">Types</a></li>
            <li><a data-toggle="tab" href="#menu3">Lockers</a></li>
            <li><a data-toggle="tab" href="#menu4">Toekenning</a></li>
            <li><a data-toggle="tab" href="#menu5">Sleutel kwijt</a></li>
            <li><a data-toggle="tab" href="#menu6">Lijsten</a></li>
        </ul>
    </div>

    <div class="tab-content">
    <div id="menu1"  class="tab-pane fade in active">

    <form ng-submit="createLockerGewenst()">



        <div class="form-group">
            <select class="form-control input-sm" name="leerlingen" placeholder="Leerling"
                    ng-model="newLockerGewenst.leerling_id"
                    ng-options="leerling.id as (leerling.achternaam + ' ' + leerling.voornaam) for leerling in leerlingen">
                <option value="">-Kies een leerling-</option>
            </select>

            <button type="submit" class="btn btn-primary">Toevoegen</button>
        </div>

    </form>

    <form class="form-inline">
        <div class="form-group">
            <label >Zoeken</label>
            <input type="text" ng-model="search" class="form-control" placeholder="Search">
        </div>
    </form>


    <div class="lockerGewenst" ng-hide="loading">
        <table class="table table-striped table-hover">
            <thead>
            <tr>
                <th ng-click="sort('voornaam')">Voornaam
                    <span class="glyphicon sort-icon" ng-show="sortKey=='klasnummer'" ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}"></span>
                </th>
                <th ng-click="sort('achternaam')">Achternaam
                    <span class="glyphicon sort-icon" ng-show="sortKey=='achternaam'" ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}"></span>
                </th>
                <th ng-click="sort('klas')">Klas
                    <span class="glyphicon sort-icon" ng-show="sortKey=='klas'" ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}"></span>
                </th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <tr ng-repeat="lockergewenst in lockersgewenst|orderBy:sortKey:reverse|filter:search">
                <td>{{::lockergewenst.voornaam}}</td>
                <td>{{::lockergewenst.achternaam}}</td>
                <td>{{::lockergewenst.klas}}</td>
                <td><a href="#" ng-click="deleteLockerGewenst(lockergewenst.id)" class="text-muted">Delete</a></td>
            </tr>
            </tbody>
        </table>
    </div>
    </div>
    <div id="menu2" class="tab-pane fade">
        <form ng-submit="createLockerType()">



            <div class="form-group">
                <input class="form-control input-sm" type="text" ng-model="newLockerType.naam" placeholder="Naam">
                <input class="form-control input-sm" type="text" ng-model="newLockerType.jaren" placeholder="Jaren">
                <button type="submit" class="btn btn-primary">Toevoegen</button>
            </div>

        </form>

        <div class="lockerType" ng-hide="loading">
            <table class="table table-striped table-hover">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Naam</th>
                    <th>Jaren</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <tr ng-repeat="lockertype in lockertypes|orderBy:sortKey:reverse|filter:search">
                    <td>{{lockertype.id}}</td>
                    <td>{{lockertype.naam}}</td>
                    <td>{{lockertype.jaren}}</td>
                    <td><a href="#" ng-click="deleteLockerType(lockertype.id)" class="text-muted">Delete</a></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div id="menu3" class="tab-pane fade">
        <form ng-submit="createLocker()">



            <div class="form-group">
                <input type="text" ng-model="newLocker.code" placeholder="Code" class="form-control input-sm">
                <input type="text" ng-model="startcode" placeholder="Startcode" class="form-control input-sm">
                <input type="number" ng-model="startnummer" placeholder="Startnummer" min="1" max="999" name="quantity" class="form-control input-sm">
                <input type="number" ng-model="stopnummer" placeholder="Stopnummer" min="1" max="999" name="quantity" class="form-control input-sm">
                <select class="form-control input-sm" name="lockertypes" placeholder="Locker"
                        ng-model="newLocker.locker_type_id"
                        ng-options="lockertype.id as lockertype.naam for lockertype in lockertypes">
                    <option value="">-Kies het locker type-</option>
                </select>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>

        </form>

        <form class="form-inline">
            <div class="form-group">
                <label >Search</label>
                <input type="text" ng-model="searchLocker" class="form-control" placeholder="Search">
            </div>
        </form>

        <div class="locker" ng-hide="loading">
            <table class="table table-striped table-hover">
                <thead>
                <tr>
                    <th>Code</th>
                    <th>Lockertype</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <tr ng-repeat="locker in lockers|filter:searchLocker">
                    <td>{{locker.code}}</td>
                    <td>{{locker.lockertype.naam}}</td>
                    <td><a href="#" ng-click="deleteLocker(locker.id)" class="text-muted">Delete</a></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div id="menu4"  class="tab-pane fade">

        <form ng-submit="toekenning()">

            <div class="form-group">
                <select class="form-control input-sm" name="lockergewenstlln" placeholder="Leerling"
                        ng-model="newLockerLeerling.leerling_id"
                        ng-options="lockergewenst.leerling_id as (lockergewenst.achternaam + ' ' + lockergewenst.voornaam) for lockergewenst in lockersgewenst">
                    <option value="">-Kies een leerling-</option>
                </select>
                <select class="form-control input-sm" name="lockers" placeholder="Locker"
                        ng-model="newLockerLeerling.locker_id"
                        ng-options="locker.id as (locker.lockercode) for locker in lockers">
                    <option value="">-Kies een locker-</option>
                </select>
                <button type="submit" class="btn btn-primary">Toevoegen</button>
            </div>

        </form>

        <form class="form-inline">
            <div class="form-group">
                <label >Zoeken</label>
                <input type="text" ng-model="search" class="form-control" placeholder="Search">
            </div>
        </form>


        <div ng-hide="loading">
            <table class="table table-striped table-hover">
                <thead>
                <tr>
                    <th ng-click="sort('voornaam')">Voornaam
                        <span class="glyphicon sort-icon" ng-show="sortKey=='voornaam'" ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}"></span>
                    </th>
                    <th ng-click="sort('achternaam')">Achternaam
                        <span class="glyphicon sort-icon" ng-show="sortKey=='achternaam'" ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}"></span>
                    </th>
                    <th ng-click="sort('klas')">Klas
                        <span class="glyphicon sort-icon" ng-show="sortKey=='klascode'" ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}"></span>
                    </th>
                    <th ng-click="sort('lockercode')">Locker
                        <span class="glyphicon sort-icon" ng-show="sortKey=='lockercode'" ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}"></span>
                    </th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <tr ng-repeat="locker in lockers">
                    <td>{{locker.voornaam}}</td>
                    <td>{{locker.achternaam}}</td>
                    <td>{{locker.klascode}}</td>
                    <td>{{locker.lockercode}}</td>
                    <td><a href="#" ng-click="deleteLockerToekenning(locker.id)" class="text-muted">Delete</a></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>



    </div>

</body>
</html>