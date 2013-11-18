<script>
var app = angular.module('myApp', ['ez.table', 'xeditable']);

app.controller('RootCtrl', ['$scope', '$filter','$timeout',
  function($scope, $filter,$timeout) {
    $scope.files = [];

    $scope.edit = function(file) {
      alert('Edit ' + file.name);

    };

    var tempData=<?php echo $files; ?>;


$scope.updateUser = function(data){
    return console.log(data);
}
    $timeout(function() {
      angular.forEach(tempData, function(value, key){
        $scope.files.push(value);
        });
    }, 500);
    $scope.toJsDate = function(str){
    if(!str)return null;
    return new Date(str);
  }

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
]);
app.run(function(editableOptions) {
  editableOptions.theme = 'bs3'; // bootstrap3 theme. Can be also 'bs2', 'default'
});
app.controller('Ctrl', function($scope) {
  $scope.user = {
    name: 'awesome user'
  };
});
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