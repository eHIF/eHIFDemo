app.controller('TherapeuticsController', function($scope,TherapeuticsService,TherapeuticsTypesService,DTOptionsBuilder, DTColumnBuilder, DTColumnDefBuilder) {

    $scope.therapeutics = TherapeuticsService.get({ session_id: session});


    $scope.dtOptions = DTOptionsBuilder.fromFnPromise(function() {
        return $scope.therapeutics.$promise;
    }).withPaginationType('full_numbers')
        .withOption('rowCallback', function(nRow, aData, iDisplayIndex, iDisplayIndexFull) {
            $('td', nRow).bind('click', function() {
                $scope.$apply(function() {
                   // $scope.masterDetailHandler(aData);
                });
            });
            return nRow;
        })
        .withOption("language", {url:"https://cdn.datatables.net/plug-ins/a5734b29083/i18n/Greek.json"})
        .withOption("searching", false)
        .withOption("lengthChange", false)
        .withOption("paginate", false)
    ;


    $scope.dtColumnDefs = [

        DTColumnDefBuilder.newColumnDef(0),
        DTColumnDefBuilder.newColumnDef(1),
        DTColumnDefBuilder.newColumnDef(2).notSortable()

    ];

    $scope.removeTherapeutic = function(index){
        var id = $scope.therapeutics[index].id;
        TherapeuticsService.remove({id:id, session_id:session}).$promise.then(
            function(data){
                $scope.therapeutics = data;
               // $scope.dtOptions.reloadData();
            },
            function(){},
            function(){}
        ) ;
    };

    $scope.addTherapeutic= function(){
        TherapeuticsService.add($scope.newTherapeutic).$promise.then(
            function(data){
               $scope.therapeutics = data;
               //    $scope.dtOptions.changeData();
            },
            function(){},
            function(){}
        ) ;

        $scope.newTherapeutic = $scope.createTherapeutic();
    };

    $scope.createTherapeutic = function(){
        return {patient_id:patient, doctor_id:doctor, session_id:session};
    };


    $scope.therapeuticTypes = TherapeuticsTypesService.get({session_id:session});
    $scope.newTherapeutic =  $scope.createTherapeutic();

    $scope.baseURL = baseURL;


    $scope.error = "";


});
