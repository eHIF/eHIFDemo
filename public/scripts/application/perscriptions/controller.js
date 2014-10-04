app.controller('ReferralsController', function($scope,ReferralsService,DTOptionsBuilder, DTColumnBuilder) {


    $scope.reloadData = function() {
        $scope.dtOptions.reloadData();
    };
    $scope.changeData = function() {
        $scope.dtOptions.sAjaxSource = 'http://localhost/eHIFDemo/public/api/patients/search/11';
    };

    $scope.dtOptions = DTOptionsBuilder.fromFnPromise(function() {
        return $scope.results.$promise;
    }).withPaginationType('full_numbers')
        .withOption('rowCallback', function(nRow, aData, iDisplayIndex, iDisplayIndexFull) {
            $('td', nRow).bind('click', function() {
                $scope.$apply(function() {
                    $scope.masterDetailHandler(aData);
                });
            });
            return nRow;
        });

    $scope.selection = {};

    $scope.masterDetailHandler = function(info) {
        $scope.selection = info;
    };
    $scope.dtColumns = [

        DTColumnBuilder.newColumn('name').withTitle('Όνομα'),
        DTColumnBuilder.newColumn('surname').withTitle('Επώνυμο')
    ];




    //$scope.results = PatientsSearch.search({ term: $scope.searchTerm});
    $scope.baseURL = baseURL;
    $scope.newvisitor = {};
    $scope.searchTerm = "";

    $scope.isSearching = false;

    $scope.error = "";

    $scope.saveAndContinue = function(){
        PatientsService.update($scope.selection).$promise.then(
            //success
            function( value ){ window.location.href = baseURL + "/visits/create/" + $scope.selection.id},
            //error
            function( error ){$scope.error = "Δεν ήταν δυνατή η αποθήκευση";}
        );

    };

    $scope.newAndContinue = function(){
        PatientsService.create($scope.newvisitor).$promise.then(
            //success
            function( value ){
                window.location.href = baseURL + "/visits/create/" + value.id},
            //error
            function( error ){$scope.error = "Δεν ήταν δυνατή η αποθήκευση";}
        );


    };

   /* var updateClock = function() {
        $scope.clock = new Date();
    };
    var timer = setInterval(function() {
        $scope.$apply(updateClock);
    }, 1000);
    updateClock();*/
    $scope.index = function () {
        $scope.isSearching = true;
        $scope.results = PatientsSearch.search({ term: $scope.searchTerm});
        $scope.results.$promise.then(
            //success
            function( value ){$scope.isSearching = false;},
            //error
            function( error ){$scope.isSearching = false;}
        );
        $scope.dtOptions.reloadData();
        if(!isNaN($scope.searchTerm)){
            $scope.newvisitor.amka = $scope.searchTerm;
        }
        //$scope.$apply();
    }

});
