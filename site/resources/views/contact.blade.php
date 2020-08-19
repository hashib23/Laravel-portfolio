@extends('layout/app')

@section('content')

    <div class="container-fluid jumbotron mt-5 ">
        <div class="row d-flex justify-content-center">
            <div class="col-md-6  text-center">
                <img class=" page-top-img fadeIn" src="images/knowledge.svg">
                <h1 class="page-top-title mt-3">-Contact Us-</h1>
            </div>
        </div>
    </div>

    <div class="container-fluid bg-white mt-5 ">
        <div class="row ">
            <div class="col-md-6">

                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7300.344915618184!2d90.40878922230398!3d23.81246575377356!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c6556f8d0183%3A0xaad698adc3e0f420!2sDOHS%20Baridhara%2C%20Dhaka!5e0!3m2!1sen!2sbd!4v1597824472529!5m2!1sen!2sbd" width="600" height="380" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>

            </div>
            <div class="col-md-6 pt-4">

                <h3 class="service-card-title">ঠিকানা</h3>
                <hr>
                <p class="footer-text">
                    <i class="fas fa-map-marker-alt"></i> শেখেরটেক ৮ মোহাম্মদপুর, ঢাকা
                    <i class="fas ml-3 fa-phone"></i> ০১৭৮৫৩৮৮৯১৯
                    <i class="fas ml-3 fa-envelope"></i> Rabbil@Yahoo.com
                </p>

                <div class="form-group ">
                    <input id="contactNameId" type="text" class="form-control w-100" placeholder="আপনার নাম" >
                </div>
                <div class="form-group">
                    <input id="contactMobileId" type="text" class="form-control  w-100" placeholder="মোবাইল নং ">
                </div>
                <div class="form-group">
                    <input id="contactEmailId" type="text" class="form-control  w-100" placeholder="ইমেইল ">
                </div>
                <div class="form-group">
                    <input id="contactMsgId" type="text" class="form-control  w-100" placeholder="মেসেজ ">
                </div>
                <button id="contactSendBtnId" class="btn btn-block normal-btn w-100">পাঠিয়ে দিন </button>

            </div>
        </div>
    </div>


@endsection
