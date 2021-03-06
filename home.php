<?php
include("lib/session_check.php");
?>
<!DOCTYPE html>
<html lang="en" ng-app="todoApp">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width">
  <title>My Budget</title>
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/datepicker.css">
  <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
</head>
<body>
<div class="row">
  <h1   class="col-lg-7" align="center">My Daily Budget</h1>
  <div class="col-lg-5"><span>Welcome <b><?=$_SESSION["uname"]?>!</b></span> <a href="controllers/logout.php">Logout</a></div>
  </div>
<div class="container" ng-controller="insertDataController">
  <div class="row">
    <div class="col-sm-12 col-md-9 col-lg-4">

      <form name="myform" ng-submit="insertData()">
        <div class="infoMsg">{{msg}}</div>
        <div class="form-group">
         <input type="hidden" ng-model="name" ng-init="name='<?=$_SESSION["uname"]?>'" value="<?=$_SESSION["uname"]?>"/>
        </div>
        <div class="form-group">
          <label for="name">Type</label>
          <select ng-model="kindsDataModel" class="form-control" ng-options="kind.name as kind.text for kind in kindsData"></select>
        </div>
        <div class="form-group" ng-hide="kindsDataModel != 'miscItems'">
          <label for="name">Miscellaneous</label>
          <input type="text" ng-model="budgetRow.misc" class="form-control" ></select>
        </div>
        <div class="form-group">
          <label for="name">Item</label>
          <input type="text" ng-model="budgetRow.item" name="item" class="form-control" required>
        </div>
        <div class="form-group">
          <label for="price">Price</label>
          <input type="text"  ng-model="budgetRow.price" id="price" name="price" class="form-control" required>
        </div>
        <div class="form-group">
          <label for="name">Date</label>
          <input type="text" autoclose="true" ng-model="budgetRow.date" id="itemDate" name="itemDate" class="form-control datepicker" required>
        </div>
        <input  type="submit" class="btn btn-primary" value="{{subBtnText}}">
        <input type="reset" class="btn btn-primary" value="Clear">
      </form>
    </div>
<div id="resultData" class="col-lg-6">
  <div class="infoMsg">{{msgData}}</div>
  <table cellpadding='5' cellspacing='5'>
  <tr><th>Name</th><th>Type</th><th>Item</th><th>Price</th><th>Date</th><th>Delete</th><th>Update</th></tr>
    <tr ng-repeat="result in resultData" ng-if="!$last">
      <td>{{result.name}}</td>
      <td>{{result.type}}</td>
      <td>{{result.item}}</td>
      <td>{{result.price}}</td>
      <td>{{result.date}}</td>
      <td><a ng-click="deleteRow(result.id)">Delete</a> </td>
      <td><a ng-click="updateRow(result.id)">Update</a> </td>

    </tr>
    <tr>
      <td></td>
      <td></td>
      <td><b>Total</b></td>
      <td><b>{{getTotal}}</b></td>
      <td></td>
    </tr>
  </table>
 </div>
    <div class="col-lg-2" id="byPeriod">
      <div><a ng-click="getResult('t')">Today</a></div>
      <div><a ng-click="getResult('w')">This Week</a></div>
      <div><a ng-click="getResult('m')">This Month</a></div>
      <div><a ng-click="getResult('y')">This Year</a></div>
    </div>
  </div>

</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/angularjs/1.4.4/angular.min.js"></script>
<script src="js/bootstrap-datepicker.js"></script>
<script src="controllers/controller.js"></script>
<script type="text/javascript">
$(function () {
  $('#itemDate').datepicker({ autoclose: true});
  $('div.datepicker tbody').on('click', function(){  $('div.datepicker').hide() });
});
</script>
</body>
</html>
