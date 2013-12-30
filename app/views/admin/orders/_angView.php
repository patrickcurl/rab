<div ng-controller="DemoCtrl">


<form class="inline-form">
Filter: <input class="form-control input-lg" type="text" ng-model="filter.$" style="float:left;padding:20px;border-radius:5px;" />
        <button ng-click="tableParams.sorting({})" class="btn btn-default pull-right">Clear sorting</button>
        <button ng-click="tableParams.filter({})" class="btn btn-default pull-right">Clear filter</button>
        </form>
        <table ng-table="tableParams" show-filter="true" class="table">

            <tr ng-repeat="d in $data">
                <td data-title="'Order ID'" sortable="'id'">
                    <strong>{{d.id}}</strong>
                </td>
                <td data-title="'User(Sort by Email)'" sortable="'user.email'">
                <dl>
                <dt>Name</dt>
                <dd>{{d.user.first_name}} {{d.user.last_name}}</dd>
                <dt>Email</dt><dd>{{d.user.email}}</dd>
                <dt>Phone</dt><dd>{{d.user.phone}}</dd>
                <dt>Payment Method</dt><dd>{{d.user.payment_method}}</dd>
                <dt>PayPal Email</dt><dd>{{d.user.paypal_email}}</dd>
                <dt>Name on Cheque</dt><dd>{{d.user.name_on_cheque}}</dd>
                </dl>
                <a href="<?php echo URL::to('/users/edit'); ?>/{{d.user.id}}">Edit User</a>

                </td>
                <td data-title="'Order(Sort by Date)'" sortable="'created_at'">
                    <dl>
                    <dt>Date Created: </dt>
                    <dd>{{d.created_at | date: 'MM/dd/yyyy'}}</dd>
                    <dt>Order Total: </dt>
                    <dd>{{d.total_amount | currency:"$"}}</dd>
                    <dt ng-hide="!d.tracking_number">Tracking #: </dt>
                    <dd>{{d.tracking_number}}</dd>
                    <dt>Shipping Label</dt>
                    <dd><a href="<?php echo URL::to('/users/pdf/'); ?>/{{d.id}}">Click to Print</a></dd>
                    <a href="#" editable-bsdate="d.received_date" e-datepicker-popup="MMMM-dd-yyyy" onbeforesave="updateOrder($data, d.id)">
                      {{ (d.received_date | date:"MM/dd/yyyy") || 'empty' }}
                      {{test}}
                  </a>
                </td>
            </tr>
        </table>
    </div>