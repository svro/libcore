angular.module('leerlingCtrl', []).controller('leerlingController',
    function($scope, $http, Leerling, User, Klas) {
        // object to hold all the data
        $scope.newLeerling = {};

        // loading variable to show the spinning loading icon
        $scope.loading = true;

        // get all the leerlingen
        Leerling.query(function(data){
            $scope.leerlingen = data;
            $scope.loading = false;
        })

        // get all the users
        User.query(function(data){
            $scope.users = data;
            //$scope.loading = false;
        })

        // get all the klassen
        Klas.query(function(data){
            $scope.klassen = data;
            //$scope.loading = false;
        })


        $scope.submitLeerling = function() {
            $scope.loading = true;

            // save the comment. pass in comment data from the form
            // use the function we created in our service
            Leerling.save($scope.newLeerling,
                function() {
                    Leerling.query(function (data) {
                        $scope.leerlingen = data;
                        $scope.loading = false;
                    })
                }
            );
        };


        // function to handle deleting a user

        $scope.deleteLeerling = function(id) {
            $scope.loading = true;

            // use the function we created in our service
            //User.delete({id:id});
            Leerling.delete({id:id},function() {
                Leerling.query(function (data) {
                    $scope.leerlingen = data;
                    $scope.loading = false;
                })
            });
        };

        $scope.sort = function(keyname){
            $scope.sortKey = keyname;   //set the sortKey to the param passed
            $scope.reverse = !$scope.reverse; //if true make it false and vice versa
        }


    }

);