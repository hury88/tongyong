@extends('layouts.master')

@section('title') @parent @stop
@section('css')
    <link rel="stylesheet" type="text/css" href="/css/index.css"/>
    <link rel="stylesheet" type="text/css" href="/css/jquery.hiSlider.min.css"/>
    <link rel="stylesheet" type="text/css" href="/css/chopslider.css"/>
    <script type="text/javascript" src="/js/jquery-1.10.1.min.js"></script>
    <link rel="stylesheet" type="text/css" href="/css/common_shouye.css"/>
    <style>
        #nav {background-color:rgba(0,0,0,.5)}
    </style>
@stop
@section('bodyNextLabel')
<body>
    <div class="container">
@stop
@section('content')
    {{-- -------------------------------------------------- --}}
    {{-- -------------------- carousel -------------------- --}}
    {{-- -------------------------------------------------- --}}
    <script src="/js/jquery.id.chopslider-2.2.0.free.min.js"></script>
    <script src="/js/jquery.id.cstransitions-1.2.min.js"></script>
    <div id="container">
        <div class="wrapper">
            <div id="slider">
                @foreach ($carousel as $post)
                    <div class="slide cs-activeSlide">
                        <a href="{{ $post->linkurl }}"><img src="/uploadfile/upload/{{ $post->img1 }}" alt="{{ $post->title }}"/></a>
                    </div>

                @endforeach

            </div>
            <div class="pagination">
                @foreach ($carousel as $post)
                <span class="slider-pagination"></span>
                @endforeach

            </div>
        </div>
    </div>
    <div class="content">
        <h2><i><img src="/img/bxo-logo.png" alt=""/></i>高端职业培训首选平台</h2>
        <p>为近万名学生轻松解决就业烦恼、成功塑造就业未来</p>
        <ul class="clearfix">
            <li>
                <p></p>
                <a href="{{u('job')}}">职业招聘</a>
            </li>
            <li>
                <p></p>
                <a href="{{u('training')}}">职业培训</a>
            </li>
            <li>
                <p></p>
                <a href="{{u('certicate')}}">职业证书</a>
            </li>
            <li>
                <p></p>
                <a href="{{u('education')}}">国际教育</a>
            </li>
        </ul>
    </div>
    <div class="content_ad">
        <div class="ad_con">
            <div class="fl">
                <a href="{{u('business')}}">
                    <h2><strong>企业注册</strong>发布招聘信息</h2>
                    <p>ENTERPRISE REGISTRATION</p>
                </a>
            </div>
            <div class="fl ad_title">
                <a href="{{u('job')}}">
                    <h2>查看<br/>职业招聘</h2>
                    <p>[TO VIEW]</p>
                </a>
            </div>
            <div class="fr" style="text-align: right;">
                <a href="{{u('person')}}">
                    <h2><strong>学生注册</strong>发布求职信息</h2>
                    <p>PERSONAL REGISTRATION</p>
                </a>
            </div>
        </div>
    </div>
</div> {{-- end container --}}
<!--职业招聘-->
<div class="warp">
    <div class="radius">
        <div id="radius">
            @foreach($zyzpjj as $key=>$val)
            <div class="oDiv o1">
                <h2>{{$val->title}}</h2>
                <p>{{$val->content}}</p>
                <a href="{{$val->linkurl}}">更多>></a>
                <img src="/img/zhi_1{{$key+1}}.png" alt=""/>
            </div>
            @endforeach
        </div>
        <div class="ra_con">
            <h2>职业招聘</h2>

            <p>给自己一个惊喜 给企业一个惊喜</p>
        </div>
    </div>
    <div class="ad">
        <a href="###"><img src="/img/ad.png"/></a>
    </div>
</div>
<!--新工作发布会-->
<div class="conference">
    <div class="c_title">
        <h2>新工作发布汇</h2>

        <p>选你所想</p>
        <a href="javascript:;">点击查看 更多职位
        </a>
    </div>
    <div class="classify">
        <ul class="clearfix oul">
            <li class="active">互联网行业</li>
            <li>房产建筑行业</li>
            <li>金融投资行业</li>
            <li>制造行业</li>
            <li>广告行业</li>
            <li>医药行业</li>
            <li>其他</li>
        </ul>
        <div class="warp_list">
            <div class="list_con">
                <ul class="oul1 clearfix">
                    <li>
                        <img src="/img/l-1.png" width="124" height="62"/>

                        <div></div>
                    </li>
                    <li>
                        <a href="###"><img src="/img/l-2.png"/></a>

                        <div></div>
                    </li>
                    <li>
                        <a href="###"><img src="/img/l-3.png"/></a>

                        <div></div>
                    </li>
                    <li>
                        <a href="###"><img src="/img/l-4.png"/></a>

                        <div></div>
                    </li>
                    <li>
                        <a href="###"><img src="/img/l-5.png"/></a>

                        <div></div>
                    </li>
                    <li>
                        <a href="###"><img src="/img/l-6.png"/></a>

                        <div></div>
                    </li>
                    <li>
                        <a href="###"><img src="/img/l-7.png"/></a>

                        <div></div>
                    </li>
                    <li>
                        <a href="###"><img src="/img/l-8.png"/></a>

                        <div></div>
                    </li>
                    <li>
                        <a href="###"><img src="/img/l-9.png"/></a>

                        <div></div>
                    </li>
                    <li>
                        <a href="###"><img src="/img/l-10.png"/></a>

                        <div></div>
                    </li>
                    <li>
                        <a href="###"><img src="/img/l-11.png"/></a>

                        <div></div>
                    </li>
                    <li>
                        <a href="###"><img src="/img/l-12.png"/></a>

                        <div></div>
                    </li>
                    <li>
                        <a href="###"><img src="/img/l-13.png"/></a>

                        <div></div>
                    </li>
                    <li>
                        <a href="###"><img src="/img/l-14.png"/></a>

                        <div></div>
                    </li>
                    <li>
                        <a href="###"><img src="/img/l-15.png"/></a>

                        <div></div>
                    </li>
                    <li>
                        <a href="###"><img src="/img/l-15.png"/></a>

                        <div></div>
                    </li>

                </ul>
                <div class="table">
                    <table>

                        <tr>

                            <td>信德瑞和投资咨询</td>
                            <td>市场销售</td>
                            <td>2人</td>
                            <td> 4K-6K</td>
                            <td>北京</td>
                            <td>
                                <a href="###">查看更多职位>></a>
                            </td>
                        </tr>
                        <tr>

                            <td>信德瑞和投资咨询</td>
                            <td>市场销售</td>
                            <td>2人</td>
                            <td> 4K-6K</td>
                            <td>北京</td>
                            <td>
                                <a href="###">查看更多职位>></a>
                            </td>
                        </tr>
                        <tr>

                            <td>信德瑞和投资咨询</td>
                            <td>市场销售</td>
                            <td>2人</td>
                            <td> 4K-6K</td>
                            <td>北京</td>
                            <td>
                                <a href="###">查看更多职位>></a>
                            </td>
                        </tr>
                        <tr>

                            <td>信德瑞和投资咨询</td>
                            <td>市场销售</td>
                            <td>2人</td>
                            <td> 4K-6K</td>
                            <td>北京</td>
                            <td>
                                <a href="###">查看更多职位>></a>
                            </td>
                        </tr>
                        <tr>

                            <td>信德瑞和投资咨询</td>
                            <td>市场销售</td>
                            <td>2人</td>
                            <td> 4K-6K</td>
                            <td>北京</td>
                            <td>
                                <a href="###">查看更多职位>></a>
                            </td>
                        </tr>
                        <tr>

                            <td>信德瑞和投资咨询</td>
                            <td>市场销售</td>
                            <td>2人</td>
                            <td> 4K-6K</td>
                            <td>北京</td>
                            <td>
                                <a href="###">查看更多职位>></a>
                            </td>
                        </tr>
                        <tr>

                            <td>信德瑞和投资咨询</td>
                            <td>市场销售</td>
                            <td>2人</td>
                            <td> 4K-6K</td>
                            <td>北京</td>
                            <td>
                                <a href="###">查看更多职位>></a>
                            </td>
                        </tr>
                    </table>

                </div>

            </div>
            <div class="list_con">
                <ul class="oul1 clearfix">
                    <li>
                        <img src="/img/l-1.png" width="124" height="62"/>

                        <div></div>
                    </li>
                    <li>
                        <a href="###"><img src="/img/l-2.png"/></a>

                        <div></div>
                    </li>
                    <li>
                        <a href="###"><img src="/img/l-3.png"/></a>

                        <div></div>
                    </li>
                    <li>
                        <a href="###"><img src="/img/l-4.png"/></a>

                        <div></div>
                    </li>
                    <li>
                        <a href="###"><img src="/img/l-5.png"/></a>

                        <div></div>
                    </li>
                    <li>
                        <a href="###"><img src="/img/l-6.png"/></a>

                        <div></div>
                    </li>
                    <li>
                        <a href="###"><img src="/img/l-7.png"/></a>

                        <div></div>
                    </li>
                    <li>
                        <a href="###"><img src="/img/l-8.png"/></a>

                        <div></div>
                    </li>
                    <li>
                        <a href="###"><img src="/img/l-9.png"/></a>

                        <div></div>
                    </li>
                    <li>
                        <a href="###"><img src="/img/l-10.png"/></a>

                        <div></div>
                    </li>
                    <li>
                        <a href="###"><img src="/img/l-11.png"/></a>

                        <div></div>
                    </li>
                    <li>
                        <a href="###"><img src="/img/l-12.png"/></a>

                        <div></div>
                    </li>
                    <li>
                        <a href="###"><img src="/img/l-13.png"/></a>

                        <div></div>
                    </li>
                    <li>
                        <a href="###"><img src="/img/l-14.png"/></a>

                        <div></div>
                    </li>
                    <li>
                        <a href="###"><img src="/img/l-15.png"/></a>

                        <div></div>
                    </li>
                    <li>
                        <a href="###"><img src="/img/l-15.png"/></a>

                        <div></div>
                    </li>

                </ul>
                <table>

                    <tr>

                        <td>信德瑞和投资咨询</td>
                        <td>市场销售</td>
                        <td>2人</td>
                        <td> 4K-6K</td>
                        <td>北京</td>
                        <td>
                            <a href="###">查看更多职位>></a>
                        </td>
                    </tr>
                    <tr>

                        <td>信德瑞和投资咨询</td>
                        <td>市场销售</td>
                        <td>2人</td>
                        <td> 4K-6K</td>
                        <td>北京</td>
                        <td>
                            <a href="###">查看更多职位>></a>
                        </td>
                    </tr>
                    <tr>

                        <td>信德瑞和投资咨询</td>
                        <td>市场销售</td>
                        <td>2人</td>
                        <td> 4K-6K</td>
                        <td>北京</td>
                        <td>
                            <a href="###">查看更多职位>></a>
                        </td>
                    </tr>
                    <tr>

                        <td>信德瑞和投资咨询</td>
                        <td>市场销售</td>
                        <td>2人</td>
                        <td> 4K-6K</td>
                        <td>北京</td>
                        <td>
                            <a href="###">查看更多职位>></a>
                        </td>
                    </tr>
                    <tr>

                        <td>信德瑞和投资咨询</td>
                        <td>市场销售</td>
                        <td>2人</td>
                        <td> 4K-6K</td>
                        <td>北京</td>
                        <td>
                            <a href="###">查看更多职位>></a>
                        </td>
                    </tr>
                    <tr>

                        <td>信德瑞和投资咨询</td>
                        <td>市场销售</td>
                        <td>2人</td>
                        <td> 4K-6K</td>
                        <td>北京</td>
                        <td>
                            <a href="###">查看更多职位>></a>
                        </td>
                    </tr>
                    <tr>

                        <td>信德瑞和投资咨询</td>
                        <td>市场销售</td>
                        <td>2人</td>
                        <td> 4K-6K</td>
                        <td>北京</td>
                        <td>
                            <a href="###">查看更多职位>></a>
                        </td>
                    </tr>
                    <tr>

                        <td>信德瑞和投资咨询</td>
                        <td>市场销售</td>
                        <td>2人</td>
                        <td> 4K-6K</td>
                        <td>北京</td>
                        <td>
                            <a href="###">查看更多职位>></a>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="list_con">
                <ul class="oul1 clearfix">
                    <li>
                        <img src="/img/l-1.png" width="124" height="62"/>

                        <div></div>
                    </li>
                    <li>
                        <a href="###"><img src="/img/l-2.png"/></a>

                        <div></div>
                    </li>
                    <li>
                        <a href="###"><img src="/img/l-3.png"/></a>

                        <div></div>
                    </li>
                    <li>
                        <a href="###"><img src="/img/l-4.png"/></a>

                        <div></div>
                    </li>
                    <li>
                        <a href="###"><img src="/img/l-5.png"/></a>

                        <div></div>
                    </li>
                    <li>
                        <a href="###"><img src="/img/l-6.png"/></a>

                        <div></div>
                    </li>
                    <li>
                        <a href="###"><img src="/img/l-7.png"/></a>

                        <div></div>
                    </li>
                    <li>
                        <a href="###"><img src="/img/l-8.png"/></a>

                        <div></div>
                    </li>
                    <li>
                        <a href="###"><img src="/img/l-9.png"/></a>

                        <div></div>
                    </li>
                    <li>
                        <a href="###"><img src="/img/l-10.png"/></a>

                        <div></div>
                    </li>
                    <li>
                        <a href="###"><img src="/img/l-11.png"/></a>

                        <div></div>
                    </li>
                    <li>
                        <a href="###"><img src="/img/l-12.png"/></a>

                        <div></div>
                    </li>
                    <li>
                        <a href="###"><img src="/img/l-13.png"/></a>

                        <div></div>
                    </li>
                    <li>
                        <a href="###"><img src="/img/l-14.png"/></a>

                        <div></div>
                    </li>
                    <li>
                        <a href="###"><img src="/img/l-15.png"/></a>

                        <div></div>
                    </li>
                    <li>
                        <a href="###"><img src="/img/l-15.png"/></a>

                        <div></div>
                    </li>

                </ul>
                <table>

                    <tr>

                        <td>信德瑞和投资咨询</td>
                        <td>市场销售</td>
                        <td>2人</td>
                        <td> 4K-6K</td>
                        <td>北京</td>
                        <td>
                            <a href="###">查看更多职位>></a>
                        </td>
                    </tr>
                    <tr>

                        <td>信德瑞和投资咨询</td>
                        <td>市场销售</td>
                        <td>2人</td>
                        <td> 4K-6K</td>
                        <td>北京</td>
                        <td>
                            <a href="###">查看更多职位>></a>
                        </td>
                    </tr>
                    <tr>

                        <td>信德瑞和投资咨询</td>
                        <td>市场销售</td>
                        <td>2人</td>
                        <td> 4K-6K</td>
                        <td>北京</td>
                        <td>
                            <a href="###">查看更多职位>></a>
                        </td>
                    </tr>
                    <tr>

                        <td>信德瑞和投资咨询</td>
                        <td>市场销售</td>
                        <td>2人</td>
                        <td> 4K-6K</td>
                        <td>北京</td>
                        <td>
                            <a href="###">查看更多职位>></a>
                        </td>
                    </tr>
                    <tr>

                        <td>信德瑞和投资咨询</td>
                        <td>市场销售</td>
                        <td>2人</td>
                        <td> 4K-6K</td>
                        <td>北京</td>
                        <td>
                            <a href="###">查看更多职位>></a>
                        </td>
                    </tr>
                    <tr>

                        <td>信德瑞和投资咨询</td>
                        <td>市场销售</td>
                        <td>2人</td>
                        <td> 4K-6K</td>
                        <td>北京</td>
                        <td>
                            <a href="###">查看更多职位>></a>
                        </td>
                    </tr>
                    <tr>

                        <td>信德瑞和投资咨询</td>
                        <td>市场销售</td>
                        <td>2人</td>
                        <td> 4K-6K</td>
                        <td>北京</td>
                        <td>
                            <a href="###">查看更多职位>></a>
                        </td>
                    </tr>
                    <tr>

                        <td>信德瑞和投资咨询</td>
                        <td>市场销售</td>
                        <td>2人</td>
                        <td> 4K-6K</td>
                        <td>北京</td>
                        <td>
                            <a href="###">查看更多职位>></a>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="list_con">
                <ul class="oul1 clearfix">
                    <li>
                        <img src="/img/l-1.png" width="124" height="62"/>

                        <div></div>
                    </li>
                    <li>
                        <a href="###"><img src="/img/l-2.png"/></a>

                        <div></div>
                    </li>
                    <li>
                        <a href="###"><img src="/img/l-3.png"/></a>

                        <div></div>
                    </li>
                    <li>
                        <a href="###"><img src="/img/l-4.png"/></a>

                        <div></div>
                    </li>
                    <li>
                        <a href="###"><img src="/img/l-5.png"/></a>

                        <div></div>
                    </li>
                    <li>
                        <a href="###"><img src="/img/l-6.png"/></a>

                        <div></div>
                    </li>
                    <li>
                        <a href="###"><img src="/img/l-7.png"/></a>

                        <div></div>
                    </li>
                    <li>
                        <a href="###"><img src="/img/l-8.png"/></a>

                        <div></div>
                    </li>
                    <li>
                        <a href="###"><img src="/img/l-9.png"/></a>

                        <div></div>
                    </li>
                    <li>
                        <a href="###"><img src="/img/l-10.png"/></a>

                        <div></div>
                    </li>
                    <li>
                        <a href="###"><img src="/img/l-11.png"/></a>

                        <div></div>
                    </li>
                    <li>
                        <a href="###"><img src="/img/l-12.png"/></a>

                        <div></div>
                    </li>
                    <li>
                        <a href="###"><img src="/img/l-13.png"/></a>

                        <div></div>
                    </li>
                    <li>
                        <a href="###"><img src="/img/l-14.png"/></a>

                        <div></div>
                    </li>
                    <li>
                        <a href="###"><img src="/img/l-15.png"/></a>

                        <div></div>
                    </li>
                    <li>
                        <a href="###"><img src="/img/l-15.png"/></a>

                        <div></div>
                    </li>

                </ul>
                <table>

                    <tr>

                        <td>信德瑞和投资咨询</td>
                        <td>市场销售</td>
                        <td>2人</td>
                        <td> 4K-6K</td>
                        <td>北京</td>
                        <td>
                            <a href="###">查看更多职位>></a>
                        </td>
                    </tr>
                    <tr>

                        <td>信德瑞和投资咨询</td>
                        <td>市场销售</td>
                        <td>2人</td>
                        <td> 4K-6K</td>
                        <td>北京</td>
                        <td>
                            <a href="###">查看更多职位>></a>
                        </td>
                    </tr>
                    <tr>

                        <td>信德瑞和投资咨询</td>
                        <td>市场销售</td>
                        <td>2人</td>
                        <td> 4K-6K</td>
                        <td>北京</td>
                        <td>
                            <a href="###">查看更多职位>></a>
                        </td>
                    </tr>
                    <tr>

                        <td>信德瑞和投资咨询</td>
                        <td>市场销售</td>
                        <td>2人</td>
                        <td> 4K-6K</td>
                        <td>北京</td>
                        <td>
                            <a href="###">查看更多职位>></a>
                        </td>
                    </tr>
                    <tr>

                        <td>信德瑞和投资咨询</td>
                        <td>市场销售</td>
                        <td>2人</td>
                        <td> 4K-6K</td>
                        <td>北京</td>
                        <td>
                            <a href="###">查看更多职位>></a>
                        </td>
                    </tr>
                    <tr>

                        <td>信德瑞和投资咨询</td>
                        <td>市场销售</td>
                        <td>2人</td>
                        <td> 4K-6K</td>
                        <td>北京</td>
                        <td>
                            <a href="###">查看更多职位>></a>
                        </td>
                    </tr>
                    <tr>

                        <td>信德瑞和投资咨询</td>
                        <td>市场销售</td>
                        <td>2人</td>
                        <td> 4K-6K</td>
                        <td>北京</td>
                        <td>
                            <a href="###">查看更多职位>></a>
                        </td>
                    </tr>
                    <tr>

                        <td>信德瑞和投资咨询</td>
                        <td>市场销售</td>
                        <td>2人</td>
                        <td> 4K-6K</td>
                        <td>北京</td>
                        <td>
                            <a href="###">查看更多职位>></a>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="list_con">
                <ul class="oul1 clearfix">
                    <li>
                        <img src="/img/l-1.png" width="124" height="62"/>

                        <div></div>
                    </li>
                    <li>
                        <a href="###"><img src="/img/l-2.png"/></a>

                        <div></div>
                    </li>
                    <li>
                        <a href="###"><img src="/img/l-3.png"/></a>

                        <div></div>
                    </li>
                    <li>
                        <a href="###"><img src="/img/l-4.png"/></a>

                        <div></div>
                    </li>
                    <li>
                        <a href="###"><img src="/img/l-5.png"/></a>

                        <div></div>
                    </li>
                    <li>
                        <a href="###"><img src="/img/l-6.png"/></a>

                        <div></div>
                    </li>
                    <li>
                        <a href="###"><img src="/img/l-7.png"/></a>

                        <div></div>
                    </li>
                    <li>
                        <a href="###"><img src="/img/l-8.png"/></a>

                        <div></div>
                    </li>
                    <li>
                        <a href="###"><img src="/img/l-9.png"/></a>

                        <div></div>
                    </li>
                    <li>
                        <a href="###"><img src="/img/l-10.png"/></a>

                        <div></div>
                    </li>
                    <li>
                        <a href="###"><img src="/img/l-11.png"/></a>

                        <div></div>
                    </li>
                    <li>
                        <a href="###"><img src="/img/l-12.png"/></a>

                        <div></div>
                    </li>
                    <li>
                        <a href="###"><img src="/img/l-13.png"/></a>

                        <div></div>
                    </li>
                    <li>
                        <a href="###"><img src="/img/l-14.png"/></a>

                        <div></div>
                    </li>
                    <li>
                        <a href="###"><img src="/img/l-15.png"/></a>

                        <div></div>
                    </li>
                    <li>
                        <a href="###"><img src="/img/l-15.png"/></a>

                        <div></div>
                    </li>

                </ul>
                <table>

                    <tr>

                        <td>信德瑞和投资咨询</td>
                        <td>市场销售</td>
                        <td>2人</td>
                        <td> 4K-6K</td>
                        <td>北京</td>
                        <td>
                            <a href="###">查看更多职位>></a>
                        </td>
                    </tr>
                    <tr>

                        <td>信德瑞和投资咨询</td>
                        <td>市场销售</td>
                        <td>2人</td>
                        <td> 4K-6K</td>
                        <td>北京</td>
                        <td>
                            <a href="###">查看更多职位>></a>
                        </td>
                    </tr>
                    <tr>

                        <td>信德瑞和投资咨询</td>
                        <td>市场销售</td>
                        <td>2人</td>
                        <td> 4K-6K</td>
                        <td>北京</td>
                        <td>
                            <a href="###">查看更多职位>></a>
                        </td>
                    </tr>
                    <tr>

                        <td>信德瑞和投资咨询</td>
                        <td>市场销售</td>
                        <td>2人</td>
                        <td> 4K-6K</td>
                        <td>北京</td>
                        <td>
                            <a href="###">查看更多职位>></a>
                        </td>
                    </tr>
                    <tr>

                        <td>信德瑞和投资咨询</td>
                        <td>市场销售</td>
                        <td>2人</td>
                        <td> 4K-6K</td>
                        <td>北京</td>
                        <td>
                            <a href="###">查看更多职位>></a>
                        </td>
                    </tr>
                    <tr>

                        <td>信德瑞和投资咨询</td>
                        <td>市场销售</td>
                        <td>2人</td>
                        <td> 4K-6K</td>
                        <td>北京</td>
                        <td>
                            <a href="###">查看更多职位>></a>
                        </td>
                    </tr>
                    <tr>

                        <td>信德瑞和投资咨询</td>
                        <td>市场销售</td>
                        <td>2人</td>
                        <td> 4K-6K</td>
                        <td>北京</td>
                        <td>
                            <a href="###">查看更多职位>></a>
                        </td>
                    </tr>
                    <tr>

                        <td>信德瑞和投资咨询</td>
                        <td>市场销售</td>
                        <td>2人</td>
                        <td> 4K-6K</td>
                        <td>北京</td>
                        <td>
                            <a href="###">查看更多职位>></a>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="list_con">
                <ul class="oul1 clearfix">
                    <li>
                        <img src="/img/l-1.png" width="124" height="62"/>

                        <div></div>
                    </li>
                    <li>
                        <a href="###"><img src="/img/l-2.png"/></a>

                        <div></div>
                    </li>
                    <li>
                        <a href="###"><img src="/img/l-3.png"/></a>

                        <div></div>
                    </li>
                    <li>
                        <a href="###"><img src="/img/l-4.png"/></a>

                        <div></div>
                    </li>
                    <li>
                        <a href="###"><img src="/img/l-5.png"/></a>

                        <div></div>
                    </li>
                    <li>
                        <a href="###"><img src="/img/l-6.png"/></a>

                        <div></div>
                    </li>
                    <li>
                        <a href="###"><img src="/img/l-7.png"/></a>

                        <div></div>
                    </li>
                    <li>
                        <a href="###"><img src="/img/l-8.png"/></a>

                        <div></div>
                    </li>
                    <li>
                        <a href="###"><img src="/img/l-9.png"/></a>

                        <div></div>
                    </li>
                    <li>
                        <a href="###"><img src="/img/l-10.png"/></a>

                        <div></div>
                    </li>
                    <li>
                        <a href="###"><img src="/img/l-11.png"/></a>

                        <div></div>
                    </li>
                    <li>
                        <a href="###"><img src="/img/l-12.png"/></a>

                        <div></div>
                    </li>
                    <li>
                        <a href="###"><img src="/img/l-13.png"/></a>

                        <div></div>
                    </li>
                    <li>
                        <a href="###"><img src="/img/l-14.png"/></a>

                        <div></div>
                    </li>
                    <li>
                        <a href="###"><img src="/img/l-15.png"/></a>

                        <div></div>
                    </li>
                    <li>
                        <a href="###"><img src="/img/l-15.png"/></a>

                        <div></div>
                    </li>

                </ul>
                <div id="table">

                </div>
                <table>

                    <tr>

                        <td>信德瑞和投资咨询</td>
                        <td>市场销售</td>
                        <td>2人</td>
                        <td> 4K-6K</td>
                        <td>北京</td>
                        <td>
                            <a href="###">查看更多职位>></a>
                        </td>
                    </tr>
                    <tr>

                        <td>信德瑞和投资咨询</td>
                        <td>市场销售</td>
                        <td>2人</td>
                        <td> 4K-6K</td>
                        <td>北京</td>
                        <td>
                            <a href="###">查看更多职位>></a>
                        </td>
                    </tr>
                    <tr>

                        <td>信德瑞和投资咨询</td>
                        <td>市场销售</td>
                        <td>2人</td>
                        <td> 4K-6K</td>
                        <td>北京</td>
                        <td>
                            <a href="###">查看更多职位>></a>
                        </td>
                    </tr>
                    <tr>

                        <td>信德瑞和投资咨询</td>
                        <td>市场销售</td>
                        <td>2人</td>
                        <td> 4K-6K</td>
                        <td>北京</td>
                        <td>
                            <a href="###">查看更多职位>></a>
                        </td>
                    </tr>
                    <tr>

                        <td>信德瑞和投资咨询</td>
                        <td>市场销售</td>
                        <td>2人</td>
                        <td> 4K-6K</td>
                        <td>北京</td>
                        <td>
                            <a href="###">查看更多职位>></a>
                        </td>
                    </tr>
                    <tr>

                        <td>信德瑞和投资咨询</td>
                        <td>市场销售</td>
                        <td>2人</td>
                        <td> 4K-6K</td>
                        <td>北京</td>
                        <td>
                            <a href="###">查看更多职位>></a>
                        </td>
                    </tr>
                    <tr>

                        <td>信德瑞和投资咨询</td>
                        <td>市场销售</td>
                        <td>2人</td>
                        <td> 4K-6K</td>
                        <td>北京</td>
                        <td>
                            <a href="###">查看更多职位>></a>
                        </td>
                    </tr>
                    <tr>

                        <td>信德瑞和投资咨询</td>
                        <td>市场销售</td>
                        <td>2人</td>
                        <td> 4K-6K</td>
                        <td>北京</td>
                        <td>
                            <a href="###">查看更多职位>></a>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="list_con">
                <ul class="oul1 clearfix">
                    <li>
                        <img src="/img/l-1.png" width="124" height="62"/>

                        <div></div>
                    </li>
                    <li>
                        <a href="###"><img src="/img/l-2.png"/></a>

                        <div></div>
                    </li>
                    <li>
                        <a href="###"><img src="/img/l-3.png"/></a>

                        <div></div>
                    </li>
                    <li>
                        <a href="###"><img src="/img/l-4.png"/></a>

                        <div></div>
                    </li>
                    <li>
                        <a href="###"><img src="/img/l-5.png"/></a>

                        <div></div>
                    </li>
                    <li>
                        <a href="###"><img src="/img/l-6.png"/></a>

                        <div></div>
                    </li>
                    <li>
                        <a href="###"><img src="/img/l-7.png"/></a>

                        <div></div>
                    </li>
                    <li>
                        <a href="###"><img src="/img/l-8.png"/></a>

                        <div></div>
                    </li>
                    <li>
                        <a href="###"><img src="/img/l-9.png"/></a>

                        <div></div>
                    </li>
                    <li>
                        <a href="###"><img src="/img/l-10.png"/></a>

                        <div></div>
                    </li>
                    <li>
                        <a href="###"><img src="/img/l-11.png"/></a>

                        <div></div>
                    </li>
                    <li>
                        <a href="###"><img src="/img/l-12.png"/></a>

                        <div></div>
                    </li>
                    <li>
                        <a href="###"><img src="/img/l-13.png"/></a>

                        <div></div>
                    </li>
                    <li>
                        <a href="###"><img src="/img/l-14.png"/></a>

                        <div></div>
                    </li>
                    <li>
                        <a href="###"><img src="/img/l-15.png"/></a>

                        <div></div>
                    </li>
                    <li>
                        <a href="###"><img src="/img/l-15.png"/></a>

                        <div></div>
                    </li>

                </ul>

                <table>

                    <tr>

                        <td>信德瑞和投资咨询</td>
                        <td>市场销售</td>
                        <td>2人</td>
                        <td> 4K-6K</td>
                        <td>北京</td>
                        <td>
                            <a href="###">查看更多职位>></a>
                        </td>
                    </tr>
                    <tr>

                        <td>信德瑞和投资咨询</td>
                        <td>市场销售</td>
                        <td>2人</td>
                        <td> 4K-6K</td>
                        <td>北京</td>
                        <td>
                            <a href="###">查看更多职位>></a>
                        </td>
                    </tr>
                    <tr>

                        <td>信德瑞和投资咨询</td>
                        <td>市场销售</td>
                        <td>2人</td>
                        <td> 4K-6K</td>
                        <td>北京</td>
                        <td>
                            <a href="###">查看更多职位>></a>
                        </td>
                    </tr>
                    <tr>

                        <td>信德瑞和投资咨询</td>
                        <td>市场销售</td>
                        <td>2人</td>
                        <td> 4K-6K</td>
                        <td>北京</td>
                        <td>
                            <a href="###">查看更多职位>></a>
                        </td>
                    </tr>
                    <tr>

                        <td>信德瑞和投资咨询</td>
                        <td>市场销售</td>
                        <td>2人</td>
                        <td> 4K-6K</td>
                        <td>北京</td>
                        <td>
                            <a href="###">查看更多职位>></a>
                        </td>
                    </tr>
                    <tr>

                        <td>信德瑞和投资咨询</td>
                        <td>市场销售</td>
                        <td>2人</td>
                        <td> 4K-6K</td>
                        <td>北京</td>
                        <td>
                            <a href="###">查看更多职位>></a>
                        </td>
                    </tr>
                    <tr>

                        <td>信德瑞和投资咨询</td>
                        <td>市场销售</td>
                        <td>2人</td>
                        <td> 4K-6K</td>
                        <td>北京</td>
                        <td>
                            <a href="###">查看更多职位>></a>
                        </td>
                    </tr>
                    <tr>

                        <td>信德瑞和投资咨询</td>
                        <td>市场销售</td>
                        <td>2人</td>
                        <td> 4K-6K</td>
                        <td>北京</td>
                        <td>
                            <a href="###">查看更多职位>></a>
                        </td>
                    </tr>
                </table>

            </div>

        </div>

    </div>
    <div class="ad">
        <a href="###"><img src="/img/ad1.png"/></a>
    </div>
</div>

<!--职业培训-->
<div class="book">
    <div class="book_title">
        <span>一技在手，工作无忧</span>

        <h2>职业培训</h2>
        <i></i>
    </div>
    <div class="listMOve">
        <ul class="clearfix">
            <li>
                <div class="show">
                    <div class="women">
                        <div class="flot">
                            <h2>技能培训</h2>

                            <p>Skills training</p>
                        </div>
                    </div>
                </div>
                <div class="literals">
                    优质解答 一、抓住事物特征，把握说明中心 任何事物都有其自身的特征，它是区别于其他事物的标志.写说明文..
                </div>
                <a href="###">查看详情 <span>→</span></a>
            </li>
            <li>
                <div class="show">
                    <div class="women">
                        <div class="flot">
                            <h2>技能培训</h2>

                            <p>Skills training</p>
                        </div>
                    </div>
                </div>
                <div class="literals">
                    优质解答 一、抓住事物特征，把握说明中心 任何事物都有其自身的特征，它是区别于其他事物的标志.写说明文..
                </div>
                <a href="###">查看详情 <span>→</span></a>

            </li>
            <li>
                <div class="show">
                    <div class="women">
                        <div class="flot">
                            <h2>技能培训</h2>

                            <p>Skills training</p>
                        </div>
                    </div>
                </div>
                <div class="literals">
                    优质解答 一、抓住事物特征，把握说明中心 任何事物都有其自身的特征，它是区别于其他事物的标志.写说明文..
                </div>
                <a href="###">查看详情 <span>→</span></a>
            </li>
            <li>
                <div class="show">
                    <div class="women">
                        <div class="flot">
                            <h2>技能培训</h2>

                            <p>Skills training</p>
                        </div>
                    </div>
                </div>
                <div class="literals">
                    优质解答 一、抓住事物特征，把握说明中心 任何事物都有其自身的特征，它是区别于其他事物的标志.写说明文..
                </div>
                <a href="###">查看详情 <span>→</span></a>
            </li>
        </ul>
    </div>
    <div class="ad">
        <a href="###"><img src="/img/ad3_03.jpg"/></a>
    </div>
</div>
<!--职业证书-->
<div class="idBook">
    <h2>职业<i>证书</i>一览</h2>

    <div class="id_title"><span></span>职业证书</div>

    <div class="hovertree">
        <img src="/img/books.png" class="active"/>
        <img src="/img/books.png"/>
        <img src="/img/books.png"/>
        <img src="/img/books.png"/>
        <img src="/img/books.png"/>
        <img src="/img/books.png"/>
    </div>
    <p class="y_btn">
        <span class="active"></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
    </p>

    <div class="ad">
        <a href="###"><img src="/img/ad4.png"/></a>
    </div>
</div>
<div class="style">
    <div class="style_content">
        <div class="style_tit fl">
            <h2>国际教育</h2>

            <div class="tit_right">
                <p>从这里开始<br/>让你的未来多一种可能</p>
                <span>THE INTERNATIONAL EDUCATION</span>
            </div>
        </div>
        <div class="fr alink">
            <a href="###"><img src="/img/zhi.png" width="21" height="21"/>了解更多详情</a>
        </div>
        <div style="clear: both;"></div>
        <div class="style_btn clearfix">
            <div class="s_banner fl">
                <ul class="hiSlider hiSlider1">
                    <li data-title="美国加州州立大学富尔顿分校招生官来访" class="hiSlider-item">
                        <a href="###"><img src="/img/s-b_07.jpg" alt="11111"></a>
                    </li>
                    <li data-title="美国加州州立大学富尔顿分校招生官来访" class="hiSlider-item">
                        <a href="###"><img src="/img/s-b_07.jpg" alt="22222"></a>
                    </li>
                    <li data-title="美国加州州立大学富尔顿分校招生官来访" class="hiSlider-item">
                        <a href="###"><img src="/img/s-b_07.jpg" alt="33333"></a>
                    </li>

                </ul>

            </div>
            <div class="fl st_right">
                <div class="st_nav">
                    <a href="javascript:;" class="active">国际留学</a>
                    <a href="javascript:;">国际游学</a>
                    <a href="javascript:;">国际夏令营</a>
                    <a href="javascript:;">国际联合办学</a>
                </div>
                <div class="st_content">
                    <div class="st_box">
                        <ul>
                            <li class="clearfix">
                                <a href="javacript:;">
                                    <div class="tab_title fl">
                                        <h2>30</h2>

                                        <p>june</p>
                                        <span>2017</span>
                                    </div>
                                    <div class="tab_content fl">
                                        <h2>美国加州州立大学富尔顿分校招生官来访</h2>

                                        <p>
                                            在陌生的舞台上，侯霄霖抱着吉他，唱了一首他写给莹颖的歌，名字叫做《孩子一样的梦想》，他闭着眼，用力弹唱：曾经的曲折，难言的快乐，还有这首，曾为你写的歌…</p>
                                    </div>
                                </a>

                            </li>
                            <li class="clearfix">
                                <a href="javacript:;">
                                    <div class="tab_title fl">
                                        <h2>30</h2>

                                        <p>june</p>
                                        <span>2017</span>
                                    </div>
                                    <div class="tab_content fl">
                                        <h2>美国加州州立大学富尔顿分校招生官来访</h2>

                                        <p>
                                            在陌生的舞台上，侯霄霖抱着吉他，唱了一首他写给莹颖的歌，名字叫做《孩子一样的梦想》，他闭着眼，用力弹唱：曾经的曲折，难言的快乐，还有这首，曾为你写的歌…</p>
                                    </div>
                                </a>
                            </li>
                            <li class="clearfix">
                                <a href="javacript:;">
                                    <div class="tab_title fl">
                                        <h2>30</h2>

                                        <p>june</p>
                                        <span>2017</span>
                                    </div>
                                    <div class="tab_content fl">
                                        <h2>美国加州州立大学富尔顿分校招生官来访</h2>

                                        <p>
                                            在陌生的舞台上，侯霄霖抱着吉他，唱了一首他写给莹颖的歌，名字叫做《孩子一样的梦想》，他闭着眼，用力弹唱：曾经的曲折，难言的快乐，还有这首，曾为你写的歌…</p>
                                    </div>
                                </a>
                            </li>
                        </ul>
                        <ul>
                            <li class="clearfix">
                                <a href="javacript:;">
                                    <div class="tab_title fl">
                                        <h2>30</h2>

                                        <p>june</p>
                                        <span>2017</span>
                                    </div>
                                    <div class="tab_content fl">
                                        <h2>美国加州州立大学富尔顿分校招生官来访</h2>

                                        <p>
                                            在陌生的舞台上，侯霄霖抱着吉他，唱了一首他写给莹颖的歌，名字叫做《孩子一样的梦想》，他闭着眼，用力弹唱：曾经的曲折，难言的快乐，还有这首，曾为你写的歌…</p>
                                    </div>
                                </a>

                            </li>
                            <li class="clearfix">
                                <a href="javacript:;">
                                    <div class="tab_title fl">
                                        <h2>30</h2>

                                        <p>june</p>
                                        <span>2017</span>
                                    </div>
                                    <div class="tab_content fl">
                                        <h2>美国加州州立大学富尔顿分校招生官来访</h2>

                                        <p>
                                            在陌生的舞台上，侯霄霖抱着吉他，唱了一首他写给莹颖的歌，名字叫做《孩子一样的梦想》，他闭着眼，用力弹唱：曾经的曲折，难言的快乐，还有这首，曾为你写的歌…</p>
                                    </div>
                                </a>
                            </li>
                            <li class="clearfix">
                                <a href="javacript:;">
                                    <div class="tab_title fl">
                                        <h2>30</h2>

                                        <p>june</p>
                                        <span>2017</span>
                                    </div>
                                    <div class="tab_content fl">
                                        <h2>美国加州州立大学富尔顿分校招生官来访</h2>

                                        <p>
                                            在陌生的舞台上，侯霄霖抱着吉他，唱了一首他写给莹颖的歌，名字叫做《孩子一样的梦想》，他闭着眼，用力弹唱：曾经的曲折，难言的快乐，还有这首，曾为你写的歌…</p>
                                    </div>
                                </a>
                            </li>
                        </ul>
                        <ul>
                            <li class="clearfix">
                                <a href="javacript:;">
                                    <div class="tab_title fl">
                                        <h2>30</h2>

                                        <p>june</p>
                                        <span>2017</span>
                                    </div>
                                    <div class="tab_content fl">
                                        <h2>美国加州州立大学富尔顿分校招生官来访</h2>

                                        <p>
                                            在陌生的舞台上，侯霄霖抱着吉他，唱了一首他写给莹颖的歌，名字叫做《孩子一样的梦想》，他闭着眼，用力弹唱：曾经的曲折，难言的快乐，还有这首，曾为你写的歌…</p>
                                    </div>
                                </a>

                            </li>
                            <li class="clearfix">
                                <a href="javacript:;">
                                    <div class="tab_title fl">
                                        <h2>30</h2>

                                        <p>june</p>
                                        <span>2017</span>
                                    </div>
                                    <div class="tab_content fl">
                                        <h2>美国加州州立大学富尔顿分校招生官来访</h2>

                                        <p>
                                            在陌生的舞台上，侯霄霖抱着吉他，唱了一首他写给莹颖的歌，名字叫做《孩子一样的梦想》，他闭着眼，用力弹唱：曾经的曲折，难言的快乐，还有这首，曾为你写的歌…</p>
                                    </div>
                                </a>
                            </li>
                            <li class="clearfix">
                                <a href="javacript:;">
                                    <div class="tab_title fl">
                                        <h2>30</h2>

                                        <p>june</p>
                                        <span>2017</span>
                                    </div>
                                    <div class="tab_content fl">
                                        <h2>美国加州州立大学富尔顿分校招生官来访</h2>

                                        <p>
                                            在陌生的舞台上，侯霄霖抱着吉他，唱了一首他写给莹颖的歌，名字叫做《孩子一样的梦想》，他闭着眼，用力弹唱：曾经的曲折，难言的快乐，还有这首，曾为你写的歌…</p>
                                    </div>
                                </a>
                            </li>
                        </ul>
                        <ul>
                            <li class="clearfix">
                                <a href="javacript:;">
                                    <div class="tab_title fl">
                                        <h2>30</h2>

                                        <p>june</p>
                                        <span>2017</span>
                                    </div>
                                    <div class="tab_content fl">
                                        <h2>美国加州州立大学富尔顿分校招生官来访</h2>

                                        <p>
                                            在陌生的舞台上，侯霄霖抱着吉他，唱了一首他写给莹颖的歌，名字叫做《孩子一样的梦想》，他闭着眼，用力弹唱：曾经的曲折，难言的快乐，还有这首，曾为你写的歌…</p>
                                    </div>
                                </a>

                            </li>
                            <li class="clearfix">
                                <a href="javacript:;">
                                    <div class="tab_title fl">
                                        <h2>30</h2>

                                        <p>june</p>
                                        <span>2017</span>
                                    </div>
                                    <div class="tab_content fl">
                                        <h2>美国加州州立大学富尔顿分校招生官来访</h2>

                                        <p>
                                            在陌生的舞台上，侯霄霖抱着吉他，唱了一首他写给莹颖的歌，名字叫做《孩子一样的梦想》，他闭着眼，用力弹唱：曾经的曲折，难言的快乐，还有这首，曾为你写的歌…</p>
                                    </div>
                                </a>
                            </li>
                            <li class="clearfix">
                                <a href="javacript:;">
                                    <div class="tab_title fl">
                                        <h2>30</h2>

                                        <p>june</p>
                                        <span>2017</span>
                                    </div>
                                    <div class="tab_content fl">
                                        <h2>美国加州州立大学富尔顿分校招生官来访</h2>

                                        <p>
                                            在陌生的舞台上，侯霄霖抱着吉他，唱了一首他写给莹颖的歌，名字叫做《孩子一样的梦想》，他闭着眼，用力弹唱：曾经的曲折，难言的快乐，还有这首，曾为你写的歌…</p>
                                    </div>
                                </a>
                            </li>
                        </ul>

                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<script type="text/javascript" src="/js/jquery.hiSlider.min.js"></script>
<!--轮播-->
<script type="text/javascript">
    $('.hiSlider1').hiSlider();
</script>
@stop {{-- end content --}}


@section('footer')
   @parent
@stop

@section('scripts')
    <script type="text/javascript">
        var centerx = 350;
        var centery = 350;
        var r = 300;
        var oimages = document.getElementById("radius").getElementsByTagName("div"); //图片集合
        var cnt = oimages.length;
        var da = 360 / cnt;
        var a0 = 0;
        var timer;
        for (var i = 0; i < cnt; i++) {
            oimages[i].onmouseover = stop;
            oimages[i].onmouseout = start;
        }

        function posimgs() {
            for (var i = 0; i < cnt; i++) {
                oimages[i].style.left = centerx + r * Math.cos((da * i + a0) / 180 * Math.PI) + "px";
                oimages[i].style.top = centery + r * Math.sin((da * i + a0) / 180 * Math.PI) + "px";
            }
        }
        posimgs();

        function start() {
            timer = window.setInterval("posimgs();a0++;", 100);
        }

        function stop() {
            window.clearInterval(timer);
        }
        start();

    </script>
    <script type="text/javascript" src="/js/main.js"></script>
@stop
