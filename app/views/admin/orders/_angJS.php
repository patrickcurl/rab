<script src="{{URL::asset('javascripts/moment.min.js')}}"></script>
<script>
var app = angular.module('main', ['ngTable', 'xeditable', 'ui.bootstrap']).
controller('DemoCtrl', function($scope, $filter, ngTableParams, $http) {

    var data = <?php echo $orders; ?>;
    $scope.data = data;
//    $scope.test = { test: "123" };
    $scope.$watch("filter.$", function () {
        $scope.tableParams.reload();
    });
    $scope.tableParams = new ngTableParams({
        page: 1,            // show first page
        count: 50,          // count per page
        filter: {
            user: ''       // initial filter

        },
        sorting: {
            "order.user.first_name": 'asc'     // initial sorting
        }
    }, {
        total: data.length, // length of data
        getData: function($defer, params) {
            // use build-in angular filter
            var filteredData = $filter('filter')(data, $scope.filter);
            var orderedData = params.sorting() ?
                                $filter('orderBy')(filteredData, params.orderBy()) :
                                filteredData;

            params.total(orderedData.length); // set total for recalc pagination
            $defer.resolve(orderedData.slice((params.page() - 1) * params.count(), params.page() * params.count()));
        },
        $scope: $scope
    });
    $scope.changeReceivedDate = function(data, id){
        var dateRec = moment(data).format("YYYY-MM-DD");

        //console.log(mydate.format("MM-DD-YYYY"), id);
       $http.post('/admin/change-received-date/' + id, {date: dateRec}).success(function(data, status){
            //$scope.file.users.push(data);
            $scope.data = data;
            //console.log(data);
            //console.log(status);
            return status;
            }).error(function(data, status){
                alert("Something went wrong, please try again!");
            });
    }
    $scope.changePaidDate = function(data, id){
        var datePaid = moment(data).format("YYYY-MM-DD");
        //console.log(data, id);
       $http.post('/admin/change-paid-date/' + id, {date: datePaid}).success(function(data, status){
            console.log(data);
            $scope.data = data;
            return status;
            }).error(function(data, status){
                alert("Something went wrong, please try again!");
            });
        }
    });
app.run(function(editableOptions){
    editableOptions.theme = 'bs2';
});
</script>