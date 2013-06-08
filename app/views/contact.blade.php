@extends('layouts.master')

@section('title')
  FlipTest
@stop

@section('content')

<h2>Contact Us</h2>

<div class="row">
  <div class="span3 offset4">
    <form>
      <div class="row">
        <input type="text" placeholder="Name">
      </div>

      <div class="row">
        <input type="text" id="inputEmail" placeholder="Email">
      </div>

      <div class="row">
        <textarea rows="3" placeholder="What's up?"></textarea>
      </div>

      <div class="row">
        <button type="submit" class="btn">Submit</button>
      </div>
    </form>
  </div>
</div>

@stop