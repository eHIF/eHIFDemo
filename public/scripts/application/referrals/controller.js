app.controller('ReferralsController', function($scope,ReferralsService,ReferralsTypesService,DTOptionsBuilder, DTColumnBuilder, DTColumnDefBuilder) {

    $scope.referrals = ReferralsService.get({ session_id: session});


    $scope.dtOptions = DTOptionsBuilder.fromFnPromise(function() {
        return $scope.referrals.$promise;
    }).withPaginationType('full_numbers')
        .withOption('rowCallback', function(nRow, aData, iDisplayIndex, iDisplayIndexFull) {
            $('td', nRow).bind('click', function() {
                $scope.$apply(function() {
                    $scope.masterDetailHandler(aData);
                });
            });
            return nRow;
        }).withOption("language", {url:"https://cdn.datatables.net/plug-ins/a5734b29083/i18n/Greek.json"});


    $scope.dtColumnDefs = [

        DTColumnDefBuilder.newColumnDef(0),
        DTColumnDefBuilder.newColumnDef(1),
        DTColumnDefBuilder.newColumnDef(2).notSortable()

    ];

    $scope.removeReferral = function(index){
        var id = $scope.referrals[index].id;
        ReferralsService.remove({id:id, session_id:session}).$promise.then(
            function(data){
                $scope.referrals = data;
               // $scope.dtOptions.reloadData();
            },
            function(){},
            function(){}
        ) ;
    };

    $scope.addReferral= function(){
debugger;
        ReferralsService.add($scope.newReferral).$promise.then(
            function(data){
               $scope.referrals = data;
               //    $scope.dtOptions.changeData();
            },
            function(){},
            function(){}
        ) ;

        $scope.newReferral = $scope.createReferral();
    };

    $scope.createReferral = function(){
        return {patient_id:patient, doctor_id:doctor, session_id:session};
    };


    $scope.referralTypes = ReferralsTypesService.get({session_id:session});
    $scope.newReferral =  $scope.createReferral();

    $scope.baseURL = baseURL;


    $scope.error = "";


});
