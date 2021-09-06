@extends('layouts.app')
@section('title', 'About')
@section('content')

<div class="page-nav no-margin row">
    <div class="container">
        <div class="row">
            <h2>About Our Charity</h2>
            <ul>
                <li> <a href="/"><i class="fas fa-home"></i> Home</a></li>
                <li><i class="fas fa-angle-double-right"></i> About Us</li>
            </ul>
        </div>
    </div>
</div>


<!--  ************************* About Us Starts Here ************************** -->

<div class="about-us container-fluid">
    <div class="container">

        <div class="row natur-row no-margin w-100">
            <div class="text-part col-md-6">
                <h2>About Our Charity</h2>
                <p>To reach and rescue hurting and abused children, dealing with emotional trauma both professionally and passionately.
                    To provide a family to orphans along with a high-quality education, heart to heart counselling, career guidance and more.
                    To help in the relief and rehabilitation of children who are underprivileged, orphaned and victims of natural disasters.</p>
                <p> To help in the relief and rehabilitation of children who are underprivileged, orphaned and victims of natural disasters.
                    To impact young lives in the long-term through concessional education, stipends, medals, prizes and monetary aid.
                    To train, equip and motivate young people by organizing and conducting lectures, seminars, symposia, conventions, conferences, workshops and retreats; emphasizing the need for development of their physical, social, intellectual and economic well-being. .</p>

                <p>To spread awareness of issues affecting children today and advocate for change in the same.
                    To equip parents, caregivers and institutions to make a difference themselves.
                    To cooperate with the government and other agencies in carrying out charitable and relief work in relevant contexts. </p>
            </div>
            <div class="image-part col-md-6">
                <div class="about-quick-box row">
                    <div class="col-md-6">
                        <div class="about-qcard">
                            <i class="fas fa-user"></i>
                            <p>Becom a Volunteer</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="about-qcard ">
                            <i class="fas fa-search-dollar red"></i>
                            <p>Quick Fundrais</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="about-qcard ">
                            <i class="fas fa-donate yell"></i>
                            <p>Giv Donation</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="about-qcard ">
                            <i class="fas fa-hands-helping blu"></i>
                            <p>Help Someone</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<!-- ################# Mission Vision Start Here #######################--->

<section class="container-fluid mission-vision">
    <div class="container">
        <div class="row mission">
            <div class="col-md-6 mv-det">
                <h1>Our Mission</h1>
                <P>  We strive to create an environment in which all children feel heard, loved, safe, respected and supported. This reflects an alignment between what we say, what we do and how we do it.
                    We commit to careful stewardship of all human, natural and financial resources. Maintaining high standards of honesty and integrity, we operate with complete accountability and transparency for the benefit of our donors, partners, staff and supporters, spending the funds invested in us wisely..</p>
            </div>

            <div class="col-md-6 mv-img">
                <img src="{{('public/assets/images/misin.jpg')}}" alt="">
            </div>
        </div>
        <div class="row vision">
            <div class="col-md-6 mv-img">
                <img src="{{('public/assets/images/vision.jpg')}}" alt="">
            </div>
            <div class="col-md-6 mv-det">
                <h1>Our Vision</h1>
                <p>We commit to ensuring that all our decisions ultimately contribute to the children holistically. We also commit to staying current and relevant, implementing the best practices related to childcare and helping children from hard places..</p>

            </div>
        </div>
    </div>
</section>

@endsection