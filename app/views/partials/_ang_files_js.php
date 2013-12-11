<script>
var app = angular.module('myApp', ['ez.table', 'xeditable']);

app.controller('RootCtrl', ['$scope', '$filter', '$timeout', '$http',
  function($scope,$filter,$timeout,$http) {
    $scope.files = [];
    $scope.buyers = <?php echo $buyers; ?>;
    $scope.buyer = [];
    $scope.abuyers = <?php echo $buyers; ?>;
    $scope.bbuyers = [];
    $scope.edit = function(file) {
      alert('Edit ' + file.name);

    };

    var tempData=<?php echo $files; ?>;


    $timeout(function() {
      angular.forEach(tempData, function(value, key){
        $scope.files.push(value);
        });
    }, 500);

//    TODO!! ADD TimeOut!
Dropzone.options.myAwesomeDropzone = {

  init: function()
  {


    this.on("success", function(file, data)
      {
         $scope.$apply(function(){
             $http.get('/admin/ajax-get-files').success(function(data){
                $scope.files += data;
             });
         });
      });
    }
    // this.on("addedfile", function(file) {
    //     $scope.$apply(function(){

    //         $http.get('/admin/ajax-get-files').success(function(data)
    //         {

    //           //  $scope.files = data;
    //         });
    //     });
    // });
    // this.on("success", function(file, response){
    //    //$scope.files= response;
    //    console.log(response);
    //      $scope.$apply(function(response){

    //         $scope.files = response;
    //      });

    // });
  //}

  }

  $scope.showBuyers = function() {
    var selected = [];
    angular.forEach($scope.statuses, function(s) {
      if ($scope.user.status.indexOf(s.value) >= 0) {
        selected.push(s.text);
      }
    });
    $scope.toJsDate = function(str){
        if(!str)return null;
        return new Date(str);
    }

    // $scope.batchEdit = function() {
    //   var selected = $filter('filter')($scope.files, {selected: true});
    //   console.log(selected);
    //   alert('Batch edit! Check the console.');
    // };

    $scope.batchDelete = function() {
      var selected = $filter('filter')($scope.files, {selected: true});
      var filesToDelete = [];
     selected.forEach(function(i){
        filesToDelete.push({"id": i.id, "name": i.name, "ext": i.ext});

     });

      $http.post('/admin/ajax-delete-files', {files: filesToDelete}).success(
        function(data)
        {
            $scope.files = data;
        }).error(
        function(data, status, headers, config)
        {
            console.log(data);
            console.log(status);
        });

    };

    $scope.addBuyer = function(data, id){
        console.log(id);


       $http.post('/admin/ajax-add-buyer-to-doc', {buyer: data, doc: id}).success(function(data){
            //$scope.file.users.push(data);
            $scope.files = data;
       });

    }
    $scope.addNFBuyer = function(data){
        $scope.nfBuyers += data;
        console.log($scope.nfBuyers);
    };
    $scope.updateDescription = function(data, file){
        $http.post('/admin/ajax-update-file', {id: file.id, description: data}).success(function(data){
            $scope.files = data;
        });
    }
    // $scope.updateName = function(data, file){
    //     $http.post('/admin/ajax-update-file', {id: file.id, name: data}).success(function(data){
    //         $scope.files = data;
    //     });
    // }


  }



);
app.controller('OnbeforesaveCtrl', function($scope, $http, $timeout){
    $scope.count = 0;
    $scope.buyers = <?php echo $buyers; ?>;
    $scope.buyer = [];
    $scope.showBuyer = function() {
        var selected = $filter('filter')($scope.buyers, {value: $scope.file.users});
        return ($scope.buyer && selected.length) ? selected[0].text : 'Not set';
    };

    $scope.file = {
        id: $scope.file.id,
        name: $scope.file.name,
        description: $scope.file.description,
        date: $scope.file.created_at,
        ext: $scope.file.ext,
        users: $scope.file.users
    };


    // $scope.updateFileName = function(data){
    //     return $http.post('/admin/ajax-update-file', {id: $scope.file.id, name: data});
    //     console.log(result);
    // };
    // $scope.addUserToDoc = function(data){
    //     return $http.post('/admin/ajax-add-user-to-doc', {user: $scope.user.id, doc: $scope.file.id});
    // };
    // $scope.addBuyer = function(data){

    //    $http.post('/admin/ajax-add-buyer-to-doc', {buyer: data, doc: $scope.file.id}).success(function(data){
    //         $scope.file.users.push(data);
    //    });

 //   }

});
app.run(function(editableOptions) {
  editableOptions.theme = 'bs3'; // bootstrap3 theme. Can be also 'bs2', 'default'
});



</script>