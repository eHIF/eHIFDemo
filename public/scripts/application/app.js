var app = angular.module('eHIFDemo',['ngRoute', "ngResource","datatables"],  function($interpolateProvider) {
    $interpolateProvider.startSymbol('[[');
    $interpolateProvider.endSymbol(']]');});




app.service('PatientsSearch', function($resource) {
    return $resource(baseURL + "/api/patients/search/:term", {}, {
        search: {method: 'GET', params: {}, isArray:true}

    });
});
