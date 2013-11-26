<div ng-controller="RootCtrl">
<a href="#" editable-select="abuyers" e-multiple e-ng-options="a.id as a.first_name for a in abuyers">
    {{ showStatus() }}
  </a>
<form action="<?php echo url('admin/upload'); ?>" class="dropzone" id="my-awesome-dropzone">

<input ng-repeat="nfb in nfBuyers" type="hidden" value="{{nfb.id}}" />

</form>
        <table ez-table="files"  data-count="4">
          <tr ng-repeat="file in items" >
            <td>
              <input type="checkbox" ng-model="file.selected" />
            </td>
            <td data-title="Name" #>
               {{file.name}}
            </td>

            <td data-title="Description" data-field="description">
            <a href="#" editable-text="file.description" ng-model="file.description" onbeforesave="updateDescription($data, file)">{{ file.description || 'Add description' }}</td>
            <td data-title="Date" data-field="date">{{toJsDate(file.created_at)| date:'shortDate' }}</td>
    <td data-title="Ext" data-field="ext">{{file.ext}}</td>
    <td data-title="Buyers" data-field="buyers"><div ng-repeat="user in file.users">
        {{user.first_name}} {{user.last_name}}
    </div>

    </td>
     <td data-title="Add buyers" data-field="buyers" >
  <a href="#" editable-select="buyer" e-ng-options="b.id as b.first_name + ' ' + b.last_name for b in buyers" onbeforesave="addBuyer($data, file.id)">
    Add Buyer
  </a>
      </td>

          </tr>
        </table>
    </div>

