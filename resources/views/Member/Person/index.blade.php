@extends('Member.MemberPublic.memberpublic')
@section('member')
<div class="wrapper">

            <div class="row">
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel">
                                <div class="panel-body">
                                    <div class="profile-pic text-center">
                                        <img alt="" src="/static/memberSkin/images/photos/user1.png">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="panel">
                                <div class="panel-body">
                                    <ul class="p-info">
                                        <li>
                                            <div class="title">职业</div>
                                            <div class="desk">{{$info->work}}</div>
                                        </li>
                                        <li>
                                            <div class="title">性别</div>
                                            <div class="desk">{{$info->sex}}</div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="panel">
                                <div class="panel-body p-states">
                                    <div class="summary pull-left">
                                        <h4>Total <span>Sales</span></h4>
                                        <span>Monthly Summary</span>
                                        <h3>$ 5,600</h3>
                                    </div>
                                    <div id="expense" class="chart-bar"><canvas style="display: inline-block; width: 68px; height: 35px; vertical-align: top;" width="68" height="35"></canvas></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel">
                                <div class="panel-body">
                                    <div class="profile-desk">
                                        <h1>john doe</h1>
                                        <span class="designation">PRODUCT DESIGNER (UX / UI / Visual Interaction)</span>
                                        <p>
                                            I have 10 years of experience designing for the web, and specialize in the areas of user interface design, interaction design, visual design and prototyping. I’ve worked with notable startups including Pearl Street Software.
                                        </p>
                                        <a class="btn p-follow-btn pull-left" href="#"> <i class="fa fa-check"></i> Following</a>

                                        <ul class="p-social-link pull-right">
                                            <li>
                                                <a href="#">
                                                    <i class="fa fa-facebook"></i>
                                                </a>
                                            </li>
                                            <li class="active">
                                                <a href="#">
                                                    <i class="fa fa-twitter"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <i class="fa fa-google-plus"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel">
                                <form>
                                    <textarea class="form-control input-lg p-text-area" rows="2" placeholder="Whats in your mind today?"></textarea>
                                </form>
                                <footer class="panel-footer">
                                    <button class="btn btn-post pull-right">Post</button>
                                    <ul class="nav nav-pills p-option">
                                        <li>
                                            <a href="#"><i class="fa fa-user"></i></a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="fa fa-camera"></i></a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="fa  fa-location-arrow"></i></a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="fa fa-meh-o"></i></a>
                                        </li>
                                    </ul>
                                </footer>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                    </div>
                </div>
            </div>

        </div>      
@endsection 
@section('title','地址列表 - 会员中心')