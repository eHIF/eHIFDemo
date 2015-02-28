app.controller('PrescriptionsController', function($scope,PrescriptionsService,DTOptionsBuilder, DTColumnBuilder, DTColumnDefBuilder) {

    $scope.prescriptions = PrescriptionsService.get({ session_id: session});


    $scope.dtOptions = DTOptionsBuilder.fromFnPromise(function() {
        return $scope.prescriptions.$promise;
    }).withPaginationType('full_numbers')
        .withOption('rowCallback', function(nRow, aData, iDisplayIndex, iDisplayIndexFull) {
            $('td', nRow).bind('click', function() {
                $scope.$apply(function() {
                  //  $scope.masterDetailHandler(aData);
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

    $scope.removePrescription = function(index){
        var id = $scope.prescriptions[index].id;
        PerscriptionsService.remove({id:id, session_id:session}).$promise.then(
            function(data){
                $scope.prescriptions = data;
                // $scope.dtOptions.reloadData();
            },
            function(){},
            function(){}
        ) ;
    };

    $scope.addPrescription= function(){
        PrescriptionsService.add($scope.newPrescription).$promise.then(
            function(data){
                $scope.prescriptions = data;
                //    $scope.dtOptions.changeData();
            },
            function(){},
            function(){}
        ) ;

        $scope.newPrescription = $scope.createPrescription();
    };

    $scope.createPrescription = function(){
        return {patient_id:patient, doctor_id:doctor, session_id:session};
    };


    $scope.newPrescription =  $scope.createPrescription();

    $scope.baseURL = baseURL;


    $scope.error = "";


});
