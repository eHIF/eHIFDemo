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

app.service('ReferralsService', function($resource) {
    return $resource(baseURL + "/api/sessions/referrals", {}, {
        get: {method: 'GET', params: {}, isArray:true},
        add: {method: 'POST', params: {}, isArray:true},
        remove: {method: 'DELETE', params: {}, isArray:true}
    });
});

app.service('ReferralsTypesService', function($resource) {
    return $resource(baseURL + "/api/sessions/referrals/types", {}, {
        get: {method: 'GET', params: {}, isArray:true}
    });
});
