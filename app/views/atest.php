<!DOCTYPE html>
<html>

  <head>
    <meta charset="utf-8" />
    <title>AngularJS Plunker</title>
    <?php echo HTML::script('javascripts/jquery-1.9.1.js'); ?>
    <link data-require="dropzone@*" data-semver="1.3.4" rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/dropzone/1.3.4/css/dropzone.css" />
    <link data-require="dropzone@*" data-semver="1.3.4" rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/dropzone/1.3.4/css/basic.css" />
    <?php echo HTML::script('javascripts/dropzone.js'); ?>
    <script data-require="dropzone@*" data-semver="1.3.4" src="//cdnjs.cloudflare.com/ajax/libs/dropzone/1.3.4/dropzone-amd-module.js"></script>
    <script>document.write('<base href="' + document.location + '" />');</script>
    <link rel="stylesheet" href="style.css" />
    <script data-require="angular.js@1.2.x" src="http://code.angularjs.org/1.2.1/angular.js" data-semver="1.2.1"></script>

  </head>

  <body ng-app="plunker" ng-controller="MainCtrl">
  {{name}}

<form action="http://rab.dev/admin/upload"
    class="dropzone"
    drop-zone
    id="file-dropzone">
</form>

{{name}}
<script>
  var app = angular.module('plunker', []);

app.controller('MainCtrl', function($scope) {
  $scope.name = 'World';
});

app.directive('dropZone', function() {
  return function(scope, element, attrs) {

    // element.dropzone({
    //     url: "/upload",
    //     maxFilesize: 100,
    //     paramName: "uploadfile",
    //     maxThumbnailFilesize: 5

    // }

    // );


  }
  $scope.name = "test";
});
</script>
  </body>

</html>