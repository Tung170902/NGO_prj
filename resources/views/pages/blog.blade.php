@extends('layouts.app')
@section('title', 'About')
@section('content')


<!--  ************************* Page Title Starts Here ************************** -->

<div class="page-nav no-margin row">
    <div class="container">
        <div class="row">
            <h2>Our Blog</h2>
            <ul>
                <li> <a href="#"><i class="fas fa-home"></i> Home</a></li>
                <li><i class="fas fa-angle-double-right"></i> Blog</li>
            </ul>
        </div>
    </div>
</div>



<!-- ################# Our Blog Starts Here#######################--->

<section class="our-blog">
    <div class="container">

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
        <div class="d-flex justify-content-end mt-5">
            {{$posts->links('pagination.default')}}
        </div>
    </div>
</section>

@endsection