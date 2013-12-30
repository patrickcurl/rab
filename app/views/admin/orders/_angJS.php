<script>
var app = angular.module('main', ['ngTable', 'xeditable', 'ui.bootstrap']).
controller('DemoCtrl', function($scope, $filter, ngTableParams, $http) {

    var data = <?php echo $orders; ?>;
    $scope.test = { test: "123" };
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
    $scope.updateOrder = function(data, id){
        console.log(data);


       $http.post('/admin/ajax-update-order', {order: data}).success(function(data, status){
            //$scope.file.users.push(data);
            $scope.order = data;
            console.log(data);
            console.log(status);
            });

    }
});
app.run(function(editableOptions){
    editableOptions.theme = 'bs2';
});
</script>