@extends('layouts.master')

{{-- Web site Title --}}
@section('title')
@parent
Home
@stop

{{-- Content --}}
@section('content')

  @if (Sentry::check())
  <div class="span6">
  <h4>Account Profile</h4>

    <dl class="dl-horizontal">

        @if ($user->first_name)
        <dt>First Name:</dt><dd>{{ $user->first_name }}</dd>

      @endif
      @if ($user->last_name)
          <dt>Last Name:</dt><dd>{{ $user->last_name }}</dd>

      @endif
        <dt>Email:</dt><dd>{{ $user->email }}</dd>

      @if ($user->phone)
        <dt>Phone:</dt><dd>{{ $user->phone }}</dd>

      @endif
      @if ($user->address)
        <dt>Address:</dt><dd>{{ $user->address }}</dd>

      @endif
      @if ($user->city)
        <dt>City:</dt><dd>{{ $user->city }}</dd>

      @endif
      @if ($user->state)
        <dt>State:</dt><dd>{{ $user->state }}</dd>

      @endif
      @if ($user->zip)
        <dt>Zip Code:</dt><dd>{{ $user->paypal_email }}</dd>

      @endif
      @if ($user->payment_method)
        <dt>Payment Method:</dt><dd>{{ $user->payment_method }}</dd>

      @endif

      @if ($user->paypal_email)
       <dt>Paypal Email:</dt><dd>{{ $user->paypal_email }}</dd>

      @endif
      @if ($user->name_on_cheque)
        <dt>Name on Cheque:</dt><dd>{{ $user->name_on_cheque }}</dd>

      @endif
      </dl>
        <button class="col-md-12 btn btn-info" onClick="location.href='{{ URL::to('users/edit') }}/{{ $user->id}}'">Edit Profile</button>

    <div class="col-md-12">
      <em>Account created: {{ $user->created_at }} | </em><em>Last Updated: {{ $user->updated_at }}</em>
    </div>
  </div>
  <div class="col-md-6">
    <h4>Referral Earnings</h4>
    <dl class="dl-horizontal cart-dl">
      <dt>Pending Buybacks:</dt><dd>{{ $commissions['orders']['pending']['count'] }}</dd>
      <dt>Pending Buyback Totals:</dt><dd>${{ number_format($commissions['orders']['pending']['amount'], 2)}}</dd>
      <dt>Pending Commissions:</dt><dd>${{ number_format(($commissions['orders']['pending']['amount'] * .06), 2)}}</dd>
      <dt>Approved Buyback:</dt><dd>{{ $commissions['orders']['approved']['count'] }}</dd>
      <dt>Approved Buyback Totals:</dt><dd>${{ number_format($commissions['orders']['approved']['amount'], 2)}}</dd>
      <dt>Approved Commissions:</dt><dd>test</dd>
      <dt>Total Paid: </dt><dd>N/A</dd>
      <dt>Last payment: </dt><dd>N/A</dd>
    </dl>
  </div>

@if ($user->hasAccess('admin'))
  <h4>Group Memberships:</h4>
  <div class="well">
      <ul>
        @if (count($myGroups) >= 1)
          @foreach ($myGroups as $group)
          <li>{{ $group['name'] }}</li>
        @endforeach
      @else
        <li>No Group Memberships.</li>
      @endif
      </ul>
  </div>
@endif
 <!-- <h4>User Object</h4>
  <div>
    <p>-->{{-- var_dump($user) --}}<!--</p>
  </div> -->
  @endif


@stop