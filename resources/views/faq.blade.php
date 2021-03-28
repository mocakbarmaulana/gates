@extends('layouts.app')

@section('head')
<title>FAQ</title>
<link rel="stylesheet" href="{{asset('assets/css/global.css')}}">
<link rel="stylesheet" href="{{asset('assets/css/faq.css')}}">
@endsection

@section('content')
<div class="container-fluid">
    <div class="container my-5">
        <div class="faq-head px-3 py-4">
            <h1 class="fw-700">Frequently Asked Questions</h1>
        </div>
        <div class="faq-body px-3 py-4">
            <div class="general mb-5">
                <h1 class="fw-700">A: General</h1>
                <h5 class="fw-700">Who can register to learn?</h5>
                <p>
                    Everybody above the age of 18 can register with skillagogo. It’s free and hassle-free. Simply go to
                    our sign-up page by clicking here.
                </p>
                <h5 class="fw-700">How much does it cost to sign up?</h5>
                <p>
                    Signing up with skillagogo is absolutely free! You are not required to buy packages or membership
                    plans. You only pay when you book a class with skillagogo.
                </p>
                <h5 class="fw-700">How to book a class through skillagogo?</h5>
                <p>
                    It’s simple! When you find a class that suits you, click on the “Book a Class” button and you will
                    be
                    asked to give your contact details and payment method (currently skillagogo accepts PayPal in
                    Singapore and bank/ATM transfer in Indonesia). After confirming your booking, a confirmation email
                    will be sent to you. You did not receive a confirmation email? Make sure your email address is
                    correct. To check this, go to your Dashboard -> My Account -> Contact Info. Also check your
                    spam/junk folder to see if our emails are filtered by your email client. Your booking will be
                    immediately accessible in your dashboard.
                </p>
                <h5 class="fw-700">Will I get a Certificate of Completion after attending a class?</h5>
                <p>
                    As skillagogo is not a formal education institution, we do not provide you with a Certificate of
                    Completion. However, some class providers/schools may issue a Certificate of Completion, depending
                    on the class you are attending. You may check whether a class provider issue a Certificate of
                    Completion in the class details section.
                </p>
            </div>

            <div class="price mb-5">
                <h1 class="fw-700">B. Price & Payment:</h1>
                <h5 class="fw-700">How can I make payment on the website?</h5>
                <p>
                    Skillagogo currently accepts payment by PayPal for classes in Singapore. If you book classes on our
                    website in Indonesia, you may pay by completing a bank or ATM transfer. To complete your payment,
                    you will be redirected to the PayPal payment page where you can choose a way to pay with PayPal: by
                    your credit card or by your Paypal account. If you don’t have a PayPal account, please click here.
                    For payment by bank or ATM transfer, after completing your payment, please send a payment
                    confirmation to skillagogo: pembayaran@skillagogo.com.
                </p>
                <h5 class="fw-700">How can I make payment on the website?</h5>
                <p>
                    Skillagogo currently accepts payment by PayPal for classes in Singapore. If you book classes on our
                    website in Indonesia, you may pay by completing a bank or ATM transfer. To complete your payment,
                    you will be redirected to the PayPal payment page where you can choose a way to pay with PayPal: by
                    your credit card or by your Paypal account. If you don’t have a PayPal account, please click here.
                    For payment by bank or ATM transfer, after completing your payment, please send a payment
                    confirmation to skillagogo: pembayaran@skillagogo.com.
                </p>
                <h5 class="fw-700">Is it safe to pay through skillagogo?</h5>
                <p>
                    Payment with skillagogo is safe. By using PayPal, you do not need to share your financial details
                    nor to register your credit card numbers on skillagogo website.
                </p>
                <h5 class="fw-700">Can I pay the class provider directly?</h5>
                <p>
                    When booking with skillagogo, you are not able to pay the class provider directly.
                </p>
            </div>

            <div class="review mb-5">
                <h1 class="fw-700">C. Reviews, Attendance & Refunds:</h1>
                <h5 class="fw-700">Can I write a review on the class I just attended?</h5>
                <p>
                    Yes, absolutely! We encourage you to share your experience with the teacher on the skillagogo
                    website. This feature becomes available only after you have attended the class. Students who have
                    not attended the class will not be able to write a review on a class or a teacher.
                </p>
                <h5 class="fw-700">Why does skillagogo recommend that I leave a review?</h5>
                <p>
                    Your review is important to the teacher. It will help the teacher to improve his/her content of
                    his/her class and his/her online reputation. We encourage you to leave an honest and fair review, as
                    the teacher will value it to better understand his/her performance. Your feedback will help other
                    students to make the right decision when choosing a suitable teacher.
                </p>
                <h5 class="fw-700">What happens if the class gets cancelled by the course provider?</h5>
                <p>
                    Head over to your dashboard and choose the new class schedule. In the event that there is no other
                    class schedule, you may convert your payment into skillagogo credits that you can use to pay for
                    another class.
                </p>
                <h5 class="fw-700">Can I cancel my registration?</h5>
                <p>
                    If you are not able to attend the class you have already booked, you will be able to cancel your
                    registration up to 72 hours before the class starts. Please use the cancellation button in your
                    dashboard.
                </p>
                <h5 class="fw-700">What’s the refund policy?</h5>
                <p>
                    Unfortunately, we are not able to offer a refund. Your payment will be converted into skillagogo
                    credits that you can use to book another class for yourself or your loved ones!
                </p>
                <h5 class="fw-700">What are skillagogo credits?</h5>
                <p>
                    Skillagogo credits are a store credit that you can use to pay for any class listed on skillagogo.
                    These credits have a validity of 12 months. You will get an alert when your skillagogo credits are
                    approaching the end of their validity. You may not transfer your skillagogo credit to someone else,
                    nor cash it out. Your skillagogo credits can be used to book classes during promotion or special
                    offer campaigns, terms and conditions may apply.
                </p>
            </div>

        </div>
    </div>
</div>
@endsection
