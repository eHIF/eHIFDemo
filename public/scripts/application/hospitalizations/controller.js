app.controller('HospitalizationsController', function($scope,HospitalizationsService,DTOptionsBuilder, DTColumnBuilder, DTColumnDefBuilder) {

    $scope.hospitalizations = HospitalizationsService.get({ session_id: session});


    $scope.dtOptions = DTOptionsBuilder.fromFnPromise(function() {
        return $scope.hospitalizations.$promise;
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

    $scope.removeHospitalization = function(index){
        var id = $scope.hospitalizations[index].id;
        HospitalizationsService.remove({id:id, session_id:session}).$promise.then(
            function(data){
                $scope.hospitalizations = data;
                // $scope.dtOptions.reloadData();
            },
            function(){},
            function(){}
        ) ;
    };

    $scope.addHospitalization= function(){
        HospitalizationsService.add($scope.newHospitalization).$promise.then(
            function(data){
                $scope.hospitalizations = data;
                //    $scope.dtOptions.changeData();
            },
            function(){},
            function(){}
        ) ;

        $scope.newHospitalization = $scope.createHospitalization();
    };

    $scope.createHospitalization = function(){
        return {patient_id:patient, doctor_id:doctor, session_id:session};
    };


    $scope.newHospitalization =  $scope.createHospitalization();

    $scope.baseURL = baseURL;


    $scope.error = "";


});
