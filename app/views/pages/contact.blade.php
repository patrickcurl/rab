@extends('layouts.master')
@section('hero-start')
Contact
@stop
@section('hero-end')
Us
@stop
@section('content')


          <div class="section-header">
            <h1>
             We'd Love to hear
              <small class="light">from you!</small>
            </h1>
          </div>

            <p class="lead text-center"> Give us suggestions, comments, or ask a question with our handy-dandy contact form below.
          </p>
          <hr>
          <div class="row-fluid">
            <div class="span6">
            	{{ Form::open(array('action' => 'PageController@postContact', 'class' => 'contact-form', 'id' => 'contactForm', 'novalidate' => "")) }}
              <form class="contact-form" id="contactForm" novalidate="">
                <div class="controls controls-row">
                  <div class="control-group span6">
                    <input class="span12" name="name" placeholder="your name" type="text">
                  </div>
                  <div class="control-group span6">
                    <input class="span12" name="email" placeholder="your email" type="email">
                  </div>
                </div>
                <div class="controls controls-row">
                  <div class="control-group span12">
                    <input class="span12" name="subject" placeholder="subject" type="text">
                  </div>
                </div>
                <div class="controls controls-row">
                  <div class="control-group span12">
                    <textarea class="span12" name="message_content" placeholder="I want to talk about... " rows="5"></textarea>
                  </div>
                </div>
                <div class="controls controls-row">
                  <div class="control-group span12">
                    <button class="btn btn-success" name="submitButton" type="submit">
                      Send Message
                    </button>
                  </div>
                </div>
              </form>
              <div id="messages"></div>
            </div>
            <div class="span6 contact-details">
              <ul class="icons">
                <li>
                  <h4>
                    <i class="icon-map-marker"></i>
                    Address
                  </h4>
                  <p>
                    561 Congress Park Drive <br>
Centerville, OH <br>45459



                  </p>
                </li>
                <li>
                  <h4>
                    <i class="icon-phone"></i>
                    Contact details
                  </h4>
                  <p>
                    Office: (937) 439-4848
                    <br>
                    Fax: (866) 224-1262
                    <br>
                    Email: info@RecycleABook.com
                  </p>
                </li>
              </ul>
            </div>
          </div>

@stop