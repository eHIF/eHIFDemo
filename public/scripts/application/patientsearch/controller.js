app.controller('PatientsSearchController', function($scope,PatientsSearch,PatientsService,DTOptionsBuilder, DTColumnBuilder) {
    $scope.date = new Date();

    $scope.reloadData = function() {
        $scope.dtOptions.reloadData();
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
        })
        .withOption('searching', false)
        .withOption('lengthChange', false)
    ;

    $scope.selection = {};

    $scope.masterDetailHandler = function(info) {
        $scope.selection = info;
    };
    $scope.dtColumns = [

        DTColumnBuilder.newColumn('onomatepwnimo').withTitle('Όνοματεπώνυμο'),
        DTColumnBuilder.newColumn('amka').withTitle('ΑΜΚΑ'),
    ];




    //$scope.results = PatientsSearch.search({ term: $scope.searchTerm});
    $scope.baseURL = baseURL;
    $scope.newvisitor = {};
    $scope.searchTerm = "";

    $scope.isSearching = false;

    $scope.error = "";



   /* var updateClock = function() {
        $scope.clock = new Date();
    };
    var timer = setInterval(function() {
        $scope.$apply(updateClock);
    }, 1000);
    updateClock();*/
    $scope.search = function () {
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
