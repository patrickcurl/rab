<script>
angular.module('myApp', ['ez.table'])

.controller('RootCtrl', ['$scope', '$filter','$timeout',
  function($scope, $filter,$timeout) {
    $scope.files = [];

    $scope.edit = function(file) {
      alert('Edit ' + file.name);

    };

    var tempData=<?php echo $files; ?>;


    $timeout(function() {
      angular.forEach(tempData, function(value, key){
        $scope.files.push(value);
        });
    }, 500);

    $scope.batchEdit = function() {
      var selected = $filter('filter')($scope.files, {selected: true});
      console.log(selected);
      alert('Batch edit! Check the console.');
    };

    $scope.batchDelete = function() {
      var selected = $filter('filter')($scope.files, {selected: true});
      console.log(selected);
      alert('Batch delete! Check the console.');
    };
  }
])
$(document).ready(function() {
    //toggle `popup` / `inline` mode
   // $.fn.editable.defaults.mode = 'inline';

    //make username editable
    $('#username').editable();

    //make status editable
    $('#status').editable({
        type: 'select',
        title: 'Select status',
        placement: 'right',
        value: 2,
        source: [
            {value: 1, text: 'status 1'},
            {value: 2, text: 'status 2'},
            {value: 3, text: 'status 3'}
        ]
        /*
        //uncomment these lines to send data on server
        ,pk: 1
        ,url: '/post'
        */
    });
});
</script>