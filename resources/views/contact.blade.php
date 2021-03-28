@extends('layouts.app')

@section('head')
<title>Contact Us</title>
<link rel="stylesheet" href="{{asset('assets/css/global.css')}}">
@endsection

@section('content')
<div class="container">
    <div class="contact-head m-auto py-5 my-5 text-center" style="width: 600px">
        <h1 class="fw-700">Contact Us</h1>
        <img src="{{asset('assets/images/contact.jpg')}}" width="60%" alt="contact-image">
        <p>we'd love to hear from you! Drop use a note using the enquiry form below and we'll get back to you as soon as
            we can</p>
    </div>
    <div class="contact-body m-auto py-5" style="width: 600px">
        <form>
            <div class="form-group">
                <label>Your Name</label>
                <input type="text" class="form-control input-mint" name="name">
            </div>
            <div class="form-group">
                <label>Email Address</label>
                <input type="email" class="form-control input-mint" name="email">
            </div>
            <div class="form-group">
                <label>Mobile Phone</label>
                <input type="number" class="form-control input-mint" name="mobile_phone">
            </div>
            <div class="form-group">
                <label>What you want to tell us</label>
                <textarea class="form-control input-mint" rows="10" name="message"></textarea>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block">Submit</button>
            </div>
        </form>
    </div>
</div>
@endsection
