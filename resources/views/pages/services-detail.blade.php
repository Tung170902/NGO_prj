@extends('layouts.app')
@section('title', 'Services')
@section('content')

<div class="page-nav no-margin row">
    <div class="container">
        <div class="row">
            <h2>{{$post->title}}</h2>
            <ul>
                <li> <a href="/blog"><i class="fas fa-home"></i> Services</a></li>
                <li><i class="fas fa-angle-double-right"></i> Service detail</li>
            </ul>
        </div>
    </div>
</div>
<section class="our-blog">
    <div class="container">
        <div class="blog-row row ">
            <div class="col-8 mx-auto">
                @if(isset($message))
                <div class="alert alert-success">
                    {{$message}}
                </div>
                @endif
                <div class="time mb-2 d-flex justify-content-between align-items-center">
                    <div>
                        <b>{{$post->user->name}}</b> - <span>{{ date("d/m/Y", strtotime($post->created_at)) }}</span>
                    </div>
                    <div>
                        <div>
                            <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#exampleModal">
                                Donate
                            </button>
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Donate campaign</h5>
                                        </div>
                                        @if(Auth::user())
                                        <form action="/payment/vnpay" method="POST">
                                            @csrf
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-sm-3"><label>Amount </label><span>:</span></div>
                                                    <div class="col-sm-8"><input type="text" name="amount" class="form-control input-sm"></div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-3"><label>Bank </label><span>:</span></div>
                                                    <div class="col-sm-8">
                                                        <select name="bank_code" class="form-control">
                                                            <option value="NCB"> Ngan hang NCB</option>
                                                            <option value="AGRIBANK"> Ngan hang Agribank</option>
                                                            <option value="SCB"> Ngan hang SCB</option>
                                                            <option value="SACOMBANK">Ngan hang SacomBank</option>
                                                            <option value="EXIMBANK"> Ngan hang EximBank</option>
                                                            <option value="MSBANK"> Ngan hang MSBANK</option>
                                                            <option value="NAMABANK"> Ngan hang NamABank</option>
                                                            <option value="VNMART"> Vi dien tu VnMart</option>
                                                            <option value="VIETINBANK">Ngan hang Vietinbank</option>
                                                            <option value="VIETCOMBANK"> Ngan hang VCB</option>
                                                            <option value="HDBANK">Ngan hang HDBank</option>
                                                            <option value="DONGABANK"> Ngan hang Dong A</option>
                                                            <option value="TPBANK"> Ngân hàng TPBank</option>
                                                            <option value="OJB"> Ngân hàng OceanBank</option>
                                                            <option value="BIDV"> Ngân hàng BIDV</option>
                                                            <option value="TECHCOMBANK"> Ngân hàng Techcombank</option>
                                                            <option value="VPBANK"> Ngan hang VPBank</option>
                                                            <option value="MBBANK"> Ngan hang MBBank</option>
                                                            <option value="ACB"> Ngan hang ACB</option>
                                                            <option value="OCB"> Ngan hang OCB</option>
                                                            <option value="IVB"> Ngan hang IVB</option>
                                                            <option value="VISA"> Thanh toan qua VISA/MASTER</option>
                                                        </select>
                                                    </div>

                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-sm-3">
                                                            <label for="language">Language</label>
                                                        </div>
                                                        <div class="col-sm-8">
                                                            <select name="language" id="language" class="form-control">
                                                                <option value="vn">Tiếng Việt</option>
                                                                <option value="en">English</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-3"><label>Message </label><span>:</span></div>
                                                    <div class="col-sm-8"><input type="text" name="order_desc" class="form-control input-sm"></div>
                                                </div>
                                                <input type="hidden" name="campaign_id" value="{{$post->id}}" class="form-control input-sm">
                                                <input type="hidden" name="slug" value="{{$post->slug}}" class="form-control input-sm">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                                            </div>

                                        </form>
                                        @else
                                        <div class="modal-body">
                                            <div class="container">
                                                <div class="row">
                                                    <p>Please <a class="text-info" href="/user/login">login</a></p>
                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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