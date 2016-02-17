angular.module('lockerTypeService', ['ngResource']).factory('LockerType',function($resource){
    return $resource('/api/lockertypes/:id');
});