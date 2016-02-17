angular.module('klasService', ['ngResource']).factory('Klas',function($resource){
    return $resource('/api/klassen/:id');
});