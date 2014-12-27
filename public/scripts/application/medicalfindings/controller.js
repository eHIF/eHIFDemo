app.controller('MedicalFindingsController', function($scope,FindingsService) {


    $scope.diseases =FindingsService.search();


    $scope.alert = function($event){
        if($event.target.value.length>2){
            var term = event.target.value;
            FindingsService.search({term:$event.target.value}).promise().then(function(data){
                $scope.diseases = data;
                event.target.value = term;
            });
        }
    };

    $scope.submit = function(){
      var diseasesText = "";

        angular.forEach($scope.selectedDiseases, function(value, key) {
            diseasesText +=" "+value.code;
        });

        $scope.diseasesText = diseasesText;
        $('#eyrimata').val(diseasesText);
        debugger;

    };

    $scope.diseasesText = "";

    $scope.selectedDiseases = [];
});
