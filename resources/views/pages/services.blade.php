@extends('layouts.app')
@section('title', 'Services')
@section('content')

<div class="page-nav no-margin row">
    <div class="container">
        <div class="row">
            <h2>Popular Causes</h2>
            <ul>
                <li> <a href="/"><i class="fas fa-home"></i> Home</a></li>
                <li><i class="fas fa-angle-double-right"></i> Services</li>
            </ul>
        </div>
    </div>
</div>



<!-- ################# Events Start Here#######################--->
<section class="events">
    <div class="container">

        <div class="event-ro row">
            @foreach($posts as $campaign)
            <div class="col-md-4 col-sm-6">
                <div class="event-box">
                    <img src="{{$campaign->thumbnail}}" alt="">
                    <h4>{{ strlen($campaign->title) >= 50 ? substr($campaign->title,0,50) . " ..." : $campaign->title }}</h4>

                    <p class="raises"><span>Raised : ${{$campaign->total_donate}}</span> / ${{$campaign->total}} </p>
                    <p class="desic mb-5">{!! strlen($campaign->description) >= 50 ? substr($campaign->description,0,50) . " ..." : $campaign->description !!} </p>
                    <div class="my-2">
                        <a href="/services/{{$campaign->slug}}" class="btn btn-success btn-sm">Donate Now</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="d-flex justify-content-end mt-5">
            {{$posts->links('pagination.default')}}
        </div>
    </div>
</section>

@endsection