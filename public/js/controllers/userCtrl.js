angular.module('userCtrl', []).controller('userController',
    function($scope, $http, User) {
        // object to hold all the data
        $scope.newUser = {};

        // loading variable to show the spinning loading icon
        $scope.loading = true;

        // get all the users
        User.query(function(data){
            $scope.users = data;
            $scope.loading = false;
        })


        $scope.submitUser = function() {
            $scope.loading = true;

            // save the comment. pass in comment data from the form
            // use the function we created in our service
            User.save($scope.newUser,
                function() {
                    User.query(function (data) {
                        $scope.users = data;
                        $scope.loading = false;
                    })
                }
            );
        };


        // function to handle deleting a user

        $scope.deleteUser = function(id) {
            $scope.loading = true;

            // use the function we created in our service
            //User.delete({id:id});
            User.delete({id:id},function() {
                User.query(function (data) {
                    $scope.users = data;
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