angular.module('lockerService', ['ngResource']).factory('Locker',
    function($resource){
        return {
            rest: $resource('/api/lockers/:id/'),
            storebatch: $resource('/api/lockers/storebatch', {}, {
                storebatch: {
                    method: 'GET',
                    params: {
                        startcode: '@startcode',
                        startnummer: '$@startnummer',
                        stopnummer: '$@stopnummer',
                        locker_type_id: '@locker_type_id'
                    }
                }
            }),
            indexcustom:  $resource('/api/lockers/indexcustom', {}, {
                indexcustom: {
                    method: 'GET',
                    isArray: true
                }
            })
        };
    }
);