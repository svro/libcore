angular.module('lockerCtrl', []).controller('lockerController',
    function($scope, $http, Leerling, LockerGewenst,LockerType, Locker) {
        // object to hold all the data
        $scope.newLockerGewenst = {};
        $scope.newLockerType = {};
        $scope.newLocker = {};
        $scope.startcode='';
        $scope.startnummer='';
        $scope.stopnummer='';

        // loading variable to show the spinning loading icon
        $scope.loading = true;

        // get all the leerlingen
        Leerling.indexcustom.indexcustom(function(data){
            $scope.leerlingen = data;
        });

        // get all the users
        LockerGewenst.indexcustom.indexcustom(function(data){
            $scope.lockersgewenst = data;
            $scope.loading = false;
        });

        LockerType.query(function(data){
            $scope.lockertypes = data;
        });

        /*
        Locker.indexcustom.indexcustom(function(data){
            $scope.lockers = data;
        });
*/
        Locker.rest.query(function(data){
            $scope.lockers = data;
        });

        $scope.createLockerGewenst = function() {
            $scope.loading = true;

            // save the comment. pass in comment data from the form
            // use the function we created in our service
            LockerGewenst.rest.save($scope.newLockerGewenst,
                function() {
                    LockerGewenst.indexcustom.indexcustom(function(data){
                        $scope.lockersgewenst = data;
                        $scope.loading = false;
                    });
                }
            );
        };

        $scope.deleteLockerGewenst = function(id) {
            $scope.loading = true;

            LockerGewenst.rest.delete({id:id},function() {
                LockerGewenst.indexcustom.indexcustom(function(data){
                    $scope.lockersgewenst = data;
                    $scope.loading = false;
                });
            });
        };

        $scope.sort = function(keyname){
            $scope.sortKey = keyname;   //set the sortKey to the param passed
            $scope.reverse = !$scope.reverse; //if true make it false and vice versa
        }


        $scope.createLockerType = function() {
            $scope.loading = true;

            LockerType.save($scope.newLockerType,
                function() {
                    LockerType.query(function(data){
                        $scope.lockertypes = data;
                        $scope.loading = false;
                    });
                }
            );
        };

        $scope.deleteLockerType = function(id) {
            $scope.loading = true;

            LockerType.delete({id:id},function() {
                LockerType.query(function(data){
                    $scope.lockertypes = data;
                    $scope.loading = false;
                });
            });
        };

        $scope.createLocker = function() {
            $scope.loading = true;
            if ($scope.newLocker.code) {
                Locker.rest.save($scope.newLocker,
                    function(data) {
                        $scope.lockers =  $scope.lockers.push(data["locker"]);
                        /*
                        Locker.indexcustom.indexcustom(function(data){
                            $scope.lockers = data;
                            $scope.loading = false;
                        });
                        */
                    }
                );
            }
            else  {
                Locker.storebatch.storebatch({startcode:$scope.startcode,startnummer:$scope.startnummer,stopnummer:$scope.stopnummer,locker_type_id:$scope.newLocker.locker_type_id},
                    function() {
                        Locker.indexcustom.indexcustom(function(data){
                            $scope.lockers = data;
                            $scope.loading = false;
                        });
                    }
                );
            }
        };


        $scope.deleteLocker = function(id) {
            $scope.loading = true;

            Locker.rest.delete({id:id},function() {
                Locker.indexcustom.indexcustom(function(data){
                    $scope.lockers = data;
                    $scope.loading = false;
                });
            });
        };
    }

);