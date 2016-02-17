angular.module('lockerGewenstService', ['ngResource']).factory('LockerGewenst',
    function($resource){
        return {
            rest: $resource('/api/lockersgewenst/:id'),
            indexcustom: $resource('/api/lockersgewenst/indexcustom', {}, {
                indexcustom: {
                    method: 'GET',
                    isArray: true
                }
            })
        };
    }
);