@extends('layouts.admin')
@section('html')
  ng-app
@stop
@section('head')
  <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
  <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
  <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
  <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.1/css/font-awesome.css" rel="stylesheet">

<script src="http://code.angularjs.org/1.1.0/angular.min.js"></script>
<script type="text/javascript">
        var sortingOrder = 'name';
    </script>
    <style>
       .trim-info {
      max-width: 150px;
      display: inline-block;
      overflow: hidden;
      text-overflow: ellipsis;
      white-space: nowrap;
      line-height: 15px;
      position: relative;
   }</style>
@stop
@section('container_class')
class="container-fluid page-content"
@stop
@section('content')
@include('partials._ang_mailbox')


@stop
@section('footer')
<script>
function ctrlRead($scope, $filter) {
    // init
    $scope.sortingOrder = sortingOrder;
    $scope.reverse = false;
    $scope.filteredItems = [];
    $scope.groupedItems = [];
    $scope.itemsPerPage = 50;
    $scope.pagedItems = [];
    $scope.currentPage = 0;
    $scope.items = [<?php foreach($emails as $e){ ?>{"from":"<?php echo $e['from']['email'] ?>","to":"<?php echo $e['to'][0]['email'] ?>","subject":"<?php echo $e['subject'] ?>","date":"<?php echo date('m/d/Y', $e['date']); ?>"},<?php } ?>];


    var searchMatch = function (haystack, needle) {
        if (!needle) {
            return true;
        }
        return haystack.toLowerCase().indexOf(needle.toLowerCase()) !== -1;
    };

    // init the filtered items
    $scope.search = function () {
        $scope.filteredItems = $filter('filter')($scope.items, function (item) {
            for(var attr in item) {
                if (searchMatch(item[attr], $scope.query))
                    return true;
            }
            return false;
        });
        // take care of the sorting order
        if ($scope.sortingOrder !== '') {
            $scope.filteredItems = $filter('orderBy')($scope.filteredItems, $scope.sortingOrder, $scope.reverse);
        }
        $scope.currentPage = 0;
        // now group by pages
        $scope.groupToPages();
    };

    // calculate page in place
    $scope.groupToPages = function () {
        $scope.pagedItems = [];

        for (var i = 0; i < $scope.filteredItems.length; i++) {
            if (i % $scope.itemsPerPage === 0) {
                $scope.pagedItems[Math.floor(i / $scope.itemsPerPage)] = [ $scope.filteredItems[i] ];
            } else {
                $scope.pagedItems[Math.floor(i / $scope.itemsPerPage)].push($scope.filteredItems[i]);
            }
        }
    };

    $scope.range = function (start, end) {
        var ret = [];
        if (!end) {
            end = start;
            start = 0;
        }
        for (var i = start; i < end; i++) {
            ret.push(i);
        }
        return ret;
    };

    $scope.prevPage = function () {
        if ($scope.currentPage > 0) {
            $scope.currentPage--;
        }
    };

    $scope.nextPage = function () {
        if ($scope.currentPage < $scope.pagedItems.length - 1) {
            $scope.currentPage++;
        }
    };

    $scope.setPage = function () {
        $scope.currentPage = this.n;
    };

    // functions have been describe process the data for display
    $scope.search();

    // change sorting order
    $scope.sortInfo = {fields: ['date'], directions: ['asc']};
    function sortData(field, direction){
      if (!$scope.items) return;
      $scope.items.sort(function(a,b){
        if(direction == "asc")
        {
          return a[field] > b[field] ? 1 : -1;
        } else
        {
          return a[field] > b[field] ? -1 : 1;
        }
      });
    }
    $scope.sort_by = function(newSortingOrder) {
        if ($scope.sortingOrder == newSortingOrder)
            $scope.reverse = !$scope.reverse;

        $scope.sortingOrder = newSortingOrder;

        // icon setup
        $('th i').each(function(){
            // icon reset
            $(this).removeClass().addClass('icon-sort');
        });
        if ($scope.reverse)
            $('th.'+new_sorting_order+' i').removeClass().addClass('icon-chevron-up');
        else
            $('th.'+new_sorting_order+' i').removeClass().addClass('icon-chevron-down');
    };
};
ctrlRead.$inject = ['$scope', '$filter'];
</script>
@stop