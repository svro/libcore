angular.module('leerlingService', ['ngResource']).factory('Leerling',
    function($resource){
        return {
            rest: $resource('/api/leerlingen/:id'),
            indexcustom: $resource('/api/leerlingen/indexcustom', {}, {
                indexcustom: {
                    method: 'GET',
                    isArray: true
                }
            })
        };
    }
);