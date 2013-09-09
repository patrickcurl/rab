@extends('layouts.master')

{{-- Web site Title --}}
@section('title')
@parent
Home
@stop

{{-- Content --}}
@section('content')

  @if (Sentry::check())
  <h4>Account Profile</h4>


      <div class="container"><div class="well clearfix col-md-7">
        @if ($user->first_name)
          <div class="col-md-6"><strong>First Name:</strong> {{ $user->first_name }}</div>
      @endif
      @if ($user->last_name)
          <div class="col-md-6"><strong>Last Name:</strong> {{ $user->last_name }}</div>
      @endif
        <div class="col-md-6"><strong>Email:</strong> {{ $user->email }}</div>
      @if ($user->phone)
        <div class="col-md-6"><strong>Phone:</strong> {{ $user->phone }}</div>
      @endif
      @if ($user->address)
        <div class="col-md-6"><strong>Address:</strong> {{ $user->address }}</div>
      @endif
      @if ($user->city)
        <div class="col-md-6"><strong>City:</strong> {{ $user->city }}</div>
      @endif
      @if ($user->state)
        <div class="col-md-6"><strong>State:</strong> {{ $user->state }}</div>
      @endif
      @if ($user->zip)
        <div class="col-md-6"><strong>Zip Code:</strong> {{ $user->paypal_email }}</div>
      @endif
      @if ($user->payment_method)
        <div class="col-md-6"><strong>Payment Method:</strong> {{ $user->payment_method }}</div>
      @endif
      @if ($user->paypal_email)
       <div class="col-md-6"><strong>Paypal Email:</strong> {{ $user->paypal_email }}</div>
      @endif
      @if ($user->name_on_cheque)
        <div class="col-md-6"><strong>Name on Cheque:</strong> {{ $user->name_on_cheque }}</div>
      @endif
        <button class="col-md-12 btn btn-info" onClick="location.href='{{ URL::to('users/edit') }}/{{ $user->id}}'">Edit Profile</button>

    <div class="col-md-12">
      <em>Account created: {{ $user->created_at }} | </em><em>Last Updated: {{ $user->updated_at }}</em>
    </div></div>
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