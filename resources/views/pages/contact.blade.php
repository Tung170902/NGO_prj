@extends('layouts.app')
@section('title', 'About')
@section('content')
<div class="page-nav no-margin row">
    <div class="container">
        <div class="row">
            <h2>Contact Us</h2>
            <ul>
                <li> <a href="#"><i class="fas fa-home"></i> Home</a></li>
                <li><i class="fas fa-angle-double-right"></i> Contact US</li>
            </ul>
        </div>
    </div>
</div>



<!--  ************************* Contact Us Starts Here ************************** -->


<div style="margin-top:0px;" class="row no-margin">

    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.098309925595!2d105.78170350384023!3d21.028752027042415!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x313454b3285df81f%3A0x97be82a66bbe646b!2sDetech%20Building!5e0!3m2!1svi!2s!4v1630338937622!5m2!1svi!2s" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>

</div>

<div class="row contact-rooo no-margin">
    <div class="container">
        <div class="row">
            <div style="padding:20px" class="col-sm-7">
                <h2>Contact Form</h2> <br>
                @if ($errors->any())
                <div class="mt-4">
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                @endif

                @if(session()->has('success'))
                <div class="mt-4">
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                </div>
                @endif

                @if(session()->has('error'))
                <div class="mt-4">
                    <div class="alert alert-danger">
                        {{ session()->get('error') }}
                    </div>
                </div>
                @endif
                <form action="{{ route('page.contact.create') }}" method="POST">
                    @csrf
                    <div class="row cont-row">
                        <div class="col-sm-3"><label>Name </label><span>:</span></div>
                        <div class="col-sm-8"><input type="text" placeholder="Enter Name" name="name" class="form-control input-sm"></div>
                    </div>
                    <div class="row cont-row">
                        <div class="col-sm-3"><label>Address </label><span>:</span></div>
                        <div class="col-sm-8"><input type="text" name="address" placeholder="Enter Email Address" class="form-control input-sm"></div>
                    </div>
                    <div class="row cont-row">
                        <div class="col-sm-3"><label>Phone</label><span>:</span></div>
                        <div class="col-sm-8"><input type="text" name="phone" placeholder="Enter Mobile Number" class="form-control input-sm"></div>
                    </div>
                    <div class="row cont-row">
                        <div class="col-sm-3"><label>Message</label><span>:</span></div>
                        <div class="col-sm-8">
                            <textarea rows="5" name="content" placeholder="Enter Your Message" class="form-control input-sm"></textarea>
                        </div>
                    </div>
                    <div style="margin-top:10px;" class="row">
                        <div style="padding-top:10px;" class="col-sm-3"><label></label></div>
                        <div class="col-sm-8">
                            <button class="btn btn-primary btn-sm">Send Message</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-sm-5">

                <div style="margin:50px" class="serv">





                    <h2 style="margin-top:10px;">Address</h2>

                    Punchman <br>
                    8 Ton That Thuyet ( detech District) <br>
                    NTung, VN <br>
                    Phone: +8888888<br>
                    Email: <a href="ngo@charity.com" class="">ngo@charity.com</a><br>







                </div>


            </div>

        </div>
    </div>

</div>


@endsection