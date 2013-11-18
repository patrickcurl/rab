
    <div ng-controller="RootCtrl">
        <table ez-table="files" data-count="4">
          <tr ng-repeat="file in items">
            <td>
              <input type="checkbox" ng-model="file.selected" />
            </td>
            <td data-title="Name">{{ file.name }}</td>
            <td data-title="Description" data-field="description">{{ file.description }}</td>
            <td data-title="Date" data-field="date">{{ file.created_at }}</td>
            <td><a class="btn btn-default" ng-click="edit(file)"><i class="icon-pencil"></i>Edit</a>
            </td>
          </tr>
        </table>
    </div>
