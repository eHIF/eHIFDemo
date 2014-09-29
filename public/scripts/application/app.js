var app = angular.module('eHIFDemo',['ngRoute', "ngResource","datatables"],  function($interpolateProvider) {
    $interpolateProvider.startSymbol('[[');
    $interpolateProvider.endSymbol(']]');});




app.service('PatientsSearch', function($resource) {
    return $resource(baseURL + "/api/patients/search/:term", {}, {
        search: {method: 'GET', params: {}, isArray:true}

    });
});
app.service('PatientsService', function($resource) {
    return $resource(baseURL + "/api/patients/:verb", {}, {
        update: {method: 'POST', params: {verb:"update"}},
        create: {method: 'POST', params: {verb:"create"}}

    });
});
