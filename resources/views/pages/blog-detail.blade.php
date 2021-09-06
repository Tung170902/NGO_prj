@extends('layouts.app')
@section('title', 'About')
@section('content')

<div class="page-nav no-margin row">
    <div class="container">
        <div class="row">
            <h2>{{$post->title}}</h2>
            <ul>
                <li> <a href="/blog"><i class="fas fa-home"></i> Blog</a></li>
                <li><i class="fas fa-angle-double-right"></i> Blog detail</li>
            </ul>
        </div>
    </div>
</div>
<section class="our-blog">
    <div class="container">

        <div class="blog-row row ">

            <div class="col-8 mx-auto">
                <div class="mb-2">
                    <b>Category: {{$post->category->name}}</b>
                </div>
                <div class="time mb-2">
                    <b>{{$post->user->name}}</b> - <span>{{ date("d/m/Y", strtotime($post->created_at)) }}</span>
                </div>
                <div class="desc mb-2">
                    {!!
                    $post->description
                    !!}
                </div>
                <div class="content">
                    {!!
                    $post->content
                    !!}
                </div>

                <div class="fb-comments" data-href="http://localhost:8000/blog/{{$post->slug}}" data-width="100%" data-numposts="5"></div>
            </div>
        </div>
    </div>
</section>

<div id="fb-root"></div>
@endsection
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v11.0&appId=543121906576699&autoLogAppEvents=1" nonce="hZObZOK5"></script>