angular.module('userService', ['ngResource']).factory('User',function($resource){
    return $resource('/api/users/:id');
});