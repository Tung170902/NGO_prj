@extends('layouts.app')
@section('title', 'Home')
@section('content')

<div class="slider">
    <!-- Set up your HTML -->
    <div class="owl-carousel ">
        <div class="slider-img">
            <div class="item">
                <div class="slider-img"><img src="{{('/assets/images/slider/slider-3.jpg')}}" alt=""></div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-offset-2 col-lg-8 col-md-offset-2 col-md-8 col-sm-12 col-xs-12">
                            <div class="animated bounceInDown slider-captions">
                                <h1 class="slider-title">Help children haHe a good life</h1>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="item">
            <div class="slider-img"><img src="{{('/assets/images/slider/slider-1.jpg')}}" alt=""></div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-offset-2 col-lg-8 col-md-offset-2 col-md-8 col-sm-12 col-xs-12">
                        <div class="slider-captions ">
                            <h1 class="slider-title">It's time for better help.</h1>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="item">
            <div class="slider-img"><img src="{{('/assets/images/slider/slider-2.jpg')}}" alt=""></div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-offset-2 col-lg-8 col-md-offset-2 col-md-8 col-sm-12 col-xs-12">
                        <div class="slider-captions ">
                            <h1 class="slider-title">Doing Nothing is Not An Option of Our Life</h1>

                        </div>
                    </div>
                </div>
            </div>
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
                <p>We strive to create an environment in which all children feel heard, loved, safe, respected and supported. This reflects an alignment between what we say, what we do and how we do it.
                    We commit to careful stewardship of all human, natural and financial resources. Maintaining high standards of honesty and integrity, we operate with complete accountability and transparency for the benefit of our donors, partners, staff and supporters, spending the funds invested in us wisely..</p>
            </div>
            <div class="col-md-6 mv-img">
                <img src="{{('/assets/images/misin.jpg')}}" alt="">
            </div>
        </div>
        <div class="row vision">
            <div class="col-md-6 mv-img">
                <img src="{{('/assets/images/vision.jpg')}}" alt="">
            </div>
            <div class="col-md-6 mv-det">
                <h1>Our Vision</h1>
                <p>We commit to ensuring that all our decisions ultimately contribute to the children holistically. We also commit to staying current and relevant, implementing the best practices related to childcare and helping children from hard places..</p>

            </div>
        </div>
    </div>
</section>
<!-- ################# Events Start Here#######################--->
<section class="events">
    <div class="container">
        <div class="session-title row">
            <h2>Popular Causes</h2>
            <p>We are a non-profital & Charity raising money for child education</p>
        </div>
        <div class="event-ro row">
            @foreach($campaigns as $campaign)
            <div class="col-md-4 col-sm-6">
                <div class="event-box">
                    <img src="{{$campaign->thumbnail}}" alt="">
                    <h4>{{ strlen($campaign->title) >= 50 ? substr($campaign->title,0,50) . " ..." : $campaign->title }}</h4>

                    <p class="raises"><span>Raised : ${{$campaign->total_donate}}</span> / ${{$campaign->total}} </p>
                    <p class="desic">{!! strlen($campaign->description) >= 50 ? substr($campaign->description,0,50) . " ..." : $campaign->description !!} </p>
                    <div class="my-2">
                        <a href="/services/{{$campaign->slug}}" class="btn btn-success btn-sm">Donate Now</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>


<!-- ################# Charity Number Starts Here#######################--->


<div class="doctor-message">
    <div class="inner-lay">
        <div class="container">
            <div class="row session-title">
                <h2>Our Achievemtns in Numbers</h2>
                <p>We can talk for a long time about advantages of our Dental clinic before other medical treatment facilities.
                    But you can read the following facts in order to make sure of all pluses of our clinic:</p>
            </div>
            <div class="row">
                <div class="col-sm-3 numb">
                    <h3>12+</h3>
                    <span>YEARS OF EXPEREANCE</span>
                </div>
                <div class="col-sm-3 numb">
                    <h3>1812+</h3>
                    <span>HAPPY CHILDRENS</span>
                </div>
                <div class="col-sm-3 numb">
                    <h3>52+</h3>
                    <span>EVENTS</span>
                </div>
                <div class="col-sm-3 numb">
                    <h3>48+</h3>
                    <span>FUNT RAISED</span>
                </div>
            </div>
        </div>

    </div>

</div>

<!--################### Our Team Starts Here #######################--->
<section class="our-team team-11">
    <div class="container">
        <div class="session-title row">
            <h2>Meet our Team</h2>
            <p></p>
        </div>
        <div class="row team-row">
            <div class="col-md-3 col-sm-6">
                <div class="single-usr">
                    <img src="{{('/assets/images/team/team-memb1.jpg')}}" alt="">
                    <div class="det-o">
                        <h4>David Kane</h4>
                        <i>CEO </i>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="single-usr">
                    <img src="{{('/assets/images/team/team-memb2.jpg')}}" alt="">
                    <div class="det-o">
                        <h4>Lionel Kanuel</h4>
                        <i>CFO</i>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="single-usr">
                    <img src="{{('/assets/images/team/team-memb3.jpg')}}" alt="">
                    <div class="det-o">
                        <h4>Michael Tom</h4>
                        <i>Team Leader</i>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="single-usr">
                    <img src="{{('/assets/images/team/team-memb4.jpg')}}" alt="">
                    <div class="det-o">
                        <h4>David Optinon</h4>
                        <i>Project Manager</i>
                    </div>
                </div>
            </div>


        </div>
    </div>
</section>



<!-- ################# Our Blog Starts Here#######################--->

<section class="our-blog">
    <div class="container">
        <div class="row session-title">
            <h2> Our Blog </h2>
            <p>Take a look at what people say about US </p>
        </div>
        <div class="blog-row row">
            @foreach ($posts as $post)
            <div class="col-md-4 col-sm-6">
                <div class="single-blog">
                    <figure>
                        <img src="{{$post->thumbnail}}" alt="">
                    </figure>
                    <div class="blog-detail">
                        <small>By {{$post->user->name}} | {{ date("d/m/Y", strtotime($post->created_at)) }}</small>
                        <h4>{{ strlen($post->title) >= 50 ? substr($post->title,0,50) . " ..." : $post->title }}</h4>
                        <p>{{ strlen($post->description) >= 100 ? substr($post->description,0,100) . " ..." : $post->description }}</p>
                        <div class="link">
                            <a href="/blog/{{$post->slug}}">Read more </a><i class="fas fa-long-arrow-alt-right"></i>
                        </div>
                    </div>


                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

@endsection