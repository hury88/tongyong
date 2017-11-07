@extends('layouts.master')

@section('title') {{$id_arr->title}} - @parent @stop
@section('css')
    <link rel="stylesheet" type="text/css" href="/css/common_zhiyezhaopin.css"/>
    <link rel="stylesheet" type="text/css" href="/css/zhiyezhaopin.css"/>
    \    <script type="text/javascript">
        window.onload = function() {
            add = document.getElementsByClassName("shenqingzhiwei17")[0];

            tip = document.getElementsByClassName("tip")[0];

            layer = document.getElementsByClassName("layer")[0];

            clo = document.getElementsByClassName("close")[0];

            add.onclick = aa;

            clo.onclick = bb;
        }

        function aa() {
            tip.style.display = 'block';
            layer.style.display = 'block';
        }


        function bb() {
            tip.style.display = 'none';
            layer.style.display = 'none';
        }


    </script>
@stop
@section('bodyNextLabel')
    <body>
    <div class="pager-wrap personal-center" style="background: #f4f4f4;">
    @stop
    @section('content')
            <div class="sqzw">
                <!--搜素-->
                <div class="sqzwNav">
                    <div class="recruit-chose-box">
                        <form action="{{u($GLOBALS['pid_path'],$GLOBALS['ty_path'])}}" method="get" id="seach">
                            <div class="search-person">
                                <div class="recruit-pull">
                                    <p class="recruit-alltxt"> <i>关键字</i></p>
                                </div>

                                <input class="recruit-inp" placeholder="职位名称" name="title" value="" type="text" id="title" />
                                <a href="javascript:;" class="recruit-city">
                                    <span id="citySpan">合肥</span>
                                    <i id = "changeCity">+</i>
                                </a>
                            </div>
                            <div class="search-hagnye">
                                <input type="text" id="industryidname" placeholder="选择行业" value="" readonly/>
                                <a class="hangye-pull" id="hangye-pull1" href="javascript:void(0);">+</a>
                            </div>
                            <div class="search-hagnye">
                                <input type="text" id="positionidname" placeholder="选择职位" value="" readonly/>
                                <a class="hangye-pull" id="hangye-pull2" href="javascript:void(0);">+</a>
                            </div>
                            <div class="recruit-search-inp">
                                <input type="submit" value="搜索"/>
                            </div>
                            <div class="clearfix"></div>
                            <input type="hidden" name="industryid" id="industryid" value="0"/>
                            <input type="hidden" name="positionid" id="positionid" value="0">
                        </form>
                    </div>
                    <div class="sqzwNavlist">
                        <p>
                            @foreach(explode("|",$boot_config['link4']) as $val)
                                @if($loop->index<15)
                                    <a href="javascript:void(0);" class="gkey">{{$val}}</a>
                                @endif
                            @endforeach
                        </p>
                    </div>
                </div>
                <!-- 内容-->

                <div class="sqzwCon">
                    <div class="kyfdtop">
                        <img src="/img/zstop.jpg"/>

                        <span>所在位置：</span>
                        <a href="/">首页></a>>
                        <a href="{{u($GLOBALS['pid_path'])}}">{{$GLOBALS['pid_data']->catname}}</a>>
                        <a href="{{u($GLOBALS['pid_path'], $GLOBALS['ty_path'])}}">{{$GLOBALS['ty_data']->catname}}</a>>
                        <a href="javascript:void(0);">{{$id_arr->title}}</a>
                    </div>
                   @if($userinfo)
                       {{dd($userinfo)}}
                    @else

                    <div class="sqzwAll">
                        <div class="sqzwleft">
                            <a href="{{u('about','contact')}}"><img src="{{img($boot_config['logo1'])}}"/>
                            <div class="lxgs">
                                <h3></h3>
                            </div>
                            <div class="gszw">
                                <h3>其他职位</h3>
                                @foreach($joblist as $val)
                                <p>
                                    <i></i>
                                    <a href="{{u('job',$GLOBALS['ty_path'],$val['id'])}}">&nbsp;{{$val['title']}}</a>
                                    <span>&nbsp;&nbsp;&nbsp;(无销售性质&nbsp;五险一金&nbsp;班车&nbsp;年终奖)</span>
                                </p>
                                @endforeach
                            </div>
                            <div class="sqzwsys">
                                <div class="sqzwsysleft">
                                    <img src="{{img($boot_config['img1'])}}"/>
                                </div>
                                <div class="sqzwsysright">
                                    <p>扫一扫</p>
                                    <p>关注我们</p>
                                </div>
                            </div>
                        </div>
                        @endif
                        <div class="sqzwright">
                            <div class="sqzwright1">
                                <div class="wangye">
                                    <span>网页制作，程序编辑</span>
                                    <a href="javascript:;" class="shenqingzhiwei17">申请职位</a>
                                </div>
                                <div class="sqzwwz">
                                    <img src="img/sqzwwz.jpg"/>
                                    <a href="">合肥</a>
                                    <i>1小时前发布</i>
                                    <span>
            	 				<img src="img/sqzwsc.jpg"/>
            	 				<a href="">收藏</a>
            	 				<img src="img/sqzwfx.jpg"/>
            	 				<a href="">分享</a>
            	 			</span>
                                </div>

                            </div>
                            <div class="sqwzgap"></div>
                            <div class="sqzwright2">
                                <div class="sqzwright2a">
                                    <div class="sqzwright2l">
                                        职位亮点
                                    </div>
                                    <div class="sqzwright2r">
                                        <span>10k-15k/月</span>
                                        <span>五险一金</span>
                                        <span>带薪年假</span>
                                        <span>优秀团队</span>
                                        <span>办公环境好</span>
                                        <span>周末双休</span></br>
                                        <span>免费体检</span>
                                        <span>试用期全新</span>
                                    </div>
                                </div>
                                <div class="sqzwright2a">
                                    <div class="sqzwright2l">
                                        职位要求
                                    </div>
                                    <div class="sqzwright2r">
                                        <span>3年以上工作经验</span>
                                        <span>接受应届生</span>
                                        <span>本科及以上</span>
                                        <span>行业：互联网&nbsp;游戏&nbsp;软件</span>
                                        <span>全职</span>
                                    </div>
                                </div>
                                <div class="sqzwright2a1">
                                    <div class="sqzwright2l1">
                                        <img src="img/sqzwhr.jpg"/>
                                    </div>
                                    <div class="sqzwright2c1">
                                        <p class="p1"><i>HR</i>&nbsp;45623153</p>
                                        <p>联想集团有限公司&nbsp;&nbsp;|&nbsp;&nbsp;在招职位</p>
                                    </div>
                                    <div class="sqzwright2r1">
                                        <img src="img/zxgt.jpg"/>
                                        <a href="">在线沟通</a>
                                    </div>
                                </div>
                                <div class="zwjs">
                                    <h4>职位介绍</h4>
                                    <p>性别:不限&nbsp;语言：熟练的英语</p>
                                    <p>岗位职责</p>
                                    <p>主要职责</p>
                                    <p>1.建立公司人力资源体系，人力资源体系</p>
                                    <p>2.建立公司人力资源体系，人力资源体系</p>
                                    <p>3.建立公司人力资源体系，人力资源体系</p>
                                    <p>4.建立公司人力资源体系，人力资源体系</p>
                                    <p>5.建立公司人力资源体系，人力资源体系</p>
                                    <p>6.建立公司人力资源体系，人力资源体系</p>
                                    <p>7.建立公司人力资源体系，人力资源体系建立公司人力资源体系，人力资源体系</p>
                                    <div class="jubao">
                                        <div class="jubaoleft">
                                            注意：提供凡在中国职业培训王提供凡在中国职业培训王提供凡在中国职业培训王
                                        </div>
                                        <div class="jubaoright">
                                            <img src="img/sqzwjb.jpg"/>
                                            <a href="javascript:;" class="jinggao" style="color: #666666;">举报</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="sqwzgap"></div>
                            <div class="likezw">
                                <p class="likezw1"><img src="img/like1.jpg"/><span>您感兴趣的职位</span></p>
                                <p class="likezw2">
                                    <input type="checkbox" name="" id="" value="" />全选
                                    <a href="">申请职位</a>
                                </p>
                            </div>
                            <ul class="zhiwei">
                                <li>
                                    <div class="zhiwei1">
                                        <input type="checkbox" name="" id="" value="" />
                                    </div>
                                    <div class="zhiwei2">
                                        <p class="pa1">财务会计助理</p>
                                        <p><i>3000-4000元&nbsp;&nbsp;|&nbsp;&nbsp;合肥&nbsp;&nbsp;|&nbsp;&nbsp;全职&nbsp;&nbsp;|&nbsp;&nbsp;本科&nbsp;&nbsp;|&nbsp;&nbsp;3年及以上工作经验</i></p>
                                        <p>安徽信息科技有限公司</p>
                                    </div>
                                    <div class="zhiwei3">
                                        <a href="">申请职位</a>
                                    </div>
                                </li>
                                <li>
                                    <div class="zhiwei1">
                                        <input type="checkbox" name="" id="" value="" />
                                    </div>
                                    <div class="zhiwei2">
                                        <p class="pa1">财务会计助理</p>
                                        <p><i>3000-4000元&nbsp;&nbsp;|&nbsp;&nbsp;合肥&nbsp;&nbsp;|&nbsp;&nbsp;全职&nbsp;&nbsp;|&nbsp;&nbsp;本科&nbsp;&nbsp;|&nbsp;&nbsp;3年及以上工作经验</i></p>
                                        <p>安徽信息科技有限公司</p>
                                    </div>
                                    <div class="zhiwei3">
                                        <a href="">申请职位</a>
                                    </div>
                                </li>
                                <li>
                                    <div class="zhiwei1">
                                        <input type="checkbox" name="" id="" value="" />
                                    </div>
                                    <div class="zhiwei2">
                                        <p class="pa1">财务会计助理</p>
                                        <p><i>3000-4000元&nbsp;&nbsp;|&nbsp;&nbsp;合肥&nbsp;&nbsp;|&nbsp;&nbsp;全职&nbsp;&nbsp;|&nbsp;&nbsp;本科&nbsp;&nbsp;|&nbsp;&nbsp;3年及以上工作经验</i></p>
                                        <p>安徽信息科技有限公司</p>
                                    </div>
                                    <div class="zhiwei3">
                                        <a href="">申请职位</a>
                                    </div>
                                </li>
                                <li>
                                    <div class="zhiwei1">
                                        <input type="checkbox" name="" id="" value="" />
                                    </div>
                                    <div class="zhiwei2">
                                        <p class="pa1">财务会计助理</p>
                                        <p><i>3000-4000元&nbsp;&nbsp;|&nbsp;&nbsp;合肥&nbsp;&nbsp;|&nbsp;&nbsp;全职&nbsp;&nbsp;|&nbsp;&nbsp;本科&nbsp;&nbsp;|&nbsp;&nbsp;3年及以上工作经验</i></p>
                                        <p>安徽信息科技有限公司</p>
                                    </div>
                                    <div class="zhiwei3">
                                        <a href="">申请职位</a>
                                    </div>
                                </li>
                                <li>
                                    <div class="zhiwei1">
                                        <input type="checkbox" name="" id="" value="" />
                                    </div>
                                    <div class="zhiwei2">
                                        <p class="pa1">财务会计助理</p>
                                        <p><i>3000-4000元&nbsp;&nbsp;|&nbsp;&nbsp;合肥&nbsp;&nbsp;|&nbsp;&nbsp;全职&nbsp;&nbsp;|&nbsp;&nbsp;本科&nbsp;&nbsp;|&nbsp;&nbsp;3年及以上工作经验</i></p>
                                        <p>安徽信息科技有限公司</p>
                                    </div>
                                    <div class="zhiwei3">
                                        <a href="">申请职位</a>
                                    </div>
                                </li>
                                <li>
                                    <div class="zhiwei1">
                                        <input type="checkbox" name="" id="" value="" />
                                    </div>
                                    <div class="zhiwei2">
                                        <p class="pa1">财务会计助理</p>
                                        <p><i>3000-4000元&nbsp;&nbsp;|&nbsp;&nbsp;合肥&nbsp;&nbsp;|&nbsp;&nbsp;全职&nbsp;&nbsp;|&nbsp;&nbsp;本科&nbsp;&nbsp;|&nbsp;&nbsp;3年及以上工作经验</i></p>
                                        <p>安徽信息科技有限公司</p>
                                    </div>
                                    <div class="zhiwei3">
                                        <a href="">申请职位</a>
                                    </div>
                                </li>
                            </ul>

                        </div>



                    </div>
                </div>









            </div>

    @stop {{-- end content --}}


    @section('footer')
            <div class="layer">

            </div>
            <div class="tip">
                <div class="shengqingtiptop">
                    <span>申请职位</span>
                    <a class="close"></a>
                </div>
                <div class="shengqingtipbom">
                    <div class="shengqingtipbom1">
                        <img src="img/close1.png"/>选择简历
                        <select name="">
                            <option value="">请选择您要投放的简历</option>
                            <option value="">请选择您要投放的简历</option>
                            <option value="">请选择您要投放的简历</option>
                            <option value="">请选择您要投放的简历</option>
                        </select>
                    </div>
                    <div class="shengqingtipbom2">
                        <img src="img/close1.png"/>验证码&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="text" name="" id="" value="" placeholder="请填写验证码"/>
                        <img src="img/yanzhengma.jpg"/>
                        <p><a href="javascript:;" class="toudijianli">投递简历</a></p>
                    </div>

                </div>
            </div>
            <!-- 申请职位成功弹窗-->
            <div class="layer1">

            </div>
            <div class="tip1">
                <p><img src="img/shnegqingsucc.jpg"/>申请职位成功！</p>
                <span class="guanbi">关闭</span>
            </div>
            <!-- 举报弹窗-->
            <div class="tip2">
                <div class="tip21">
                    <p class="p1">
                        <span class="sp1">举报</span>
                        <span class="sp2"><img src="img/shnegqingsucc1.jpg"/></span>
                    </p>
                    <p class="p2">
                        <select name="">
                            <option value="">请选择培训课程</option>
                        </select>
                    </p>
                    <p class="p3">
                        <textarea name="" rows="" cols="" placeholder="填写举报内容"></textarea>
                    </p>
                </div>

                <div class="jubaocall">
                    <div class="jubaocallleft">
                        <p>
                            举报投诉电话：<i>400-0000-0000</i>
                        </p>
                        <p>
                            投诉邮箱：<i>65432789@qq.com</i>
                        </p>
                    </div>
                    <div class="jubaocallright">
                        确定
                    </div>
                </div>
            </div>

            <div class="jobselect-cover"></div>
            <div class="jobselect-mask" id="xzhy">
                <h2>选择行业<span>最多只能选择五个 ！</span><a href="javascript:;" class="job-close"></a></h2>
                <div class="job-result clearfix">
                    <p class="job-notice fl">您的选择结果：</p>
                    <ul class="fl">

                    </ul>
                </div>
                <div class="job-lists-box">

                    <div class="job-lists-content fl" style="display:block">

                        @foreach($industryids[0] as $k=>$v)
                            <div class="job-lists-dv">
                                <p class="job-big-type" title="{{$v}}"><i class="big-type-icon"></i>{{$v}}</p>
                                <ul class="job-small-type">
                                    @foreach($industryids[$k] as $k1=>$v1)
                                        <li class="c{{$k1}} data-id="{{$k1}}">{{$v1}}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endforeach
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="job-operate">
                    <a class="operate-comfirm" href="javascript:;">确定</a>
                    <a class="operate-reset" href="javascript:;">取消</a>
                </div>
            </div>
            <div class="jobselect-mask" id="xzzw">
                <h2>选择职位<span>最多只能选择五个 ！</span><a href="javascript:;" class="job-close"></a></h2>
                <div class="job-result clearfix">
                    <p class="job-notice fl">您的选择结果：</p>
                    <ul class="fl">
                    </ul>
                </div>

                <div class="job-lists-box">
                    <div class="job-menu fl" style="overflow: auto">
                        <ul>
                            @foreach($positionids[0] as $key=>$val)
                                <li class=" @if($loop->index==0) job-select-icon @endif " >{{$val}}</li>
                            @endforeach
                        </ul>
                    </div>

                    @foreach($positionids[0] as $key=>$val)

                        <div class="job-lists-content fl" @if($loop->index==0) style="display:block" @else style="display:none" @endif>

                            @foreach($positionids[$key] as $k=>$v)
                                <div class="job-lists-dv">
                                    <p class="job-big-type" title="{{$v}}"><i class="big-type-icon"></i>{{$v}}</p>
                                    <ul class="job-small-type">
                                        @if($k<390)
                                            @foreach($positionids[$k] as $k1=>$v1)
                                                <li class="c{{$k1}}" data-id="{{$k1}}">{{$v1}}</li>
                                            @endforeach
                                        @endif
                                    </ul>
                                </div>
                            @endforeach
                        </div>
                    @endforeach
                    <div class="clearfix"></div>
                </div>
                <div class="job-operate">
                    <a class="operate-comfirm" href="javascript:;">确定</a>
                    <a class="operate-reset" href="javascript:;">取消</a>
                </div>
            </div>
    @parent
    @stop

    @section('scripts')
    @parent <script type="text/javascript" src="/js/jquery.js"></script>
            <script type="text/javascript" src="/js/3.js"></script>
            <script type="text/javascript" src="/js/alert.min.js"></script>

            <script type="text/javascript">
                //	导航下拉
                $('.mian_nav .list>li').hover(function() {
                    $(this).find('.dump').stop().slideDown();
                }, function() {
                    $(this).find('.dump').stop().slideUp();
                })
                $('.toudijianli').click(function(){
                    $('.tip1').show();
                    $('.layer1').show();
                    $('.tip').hide();
                    $('.layer').hide();
                })
                $('.guanbi').click(function(){
                    $('.tip1').hide();
                    $('.layer1').hide();
                })
                $('.jinggao').click(function(){
                    $('.tip2').show();
                })
                $('.tip2 .tip21 .p1 .sp2').click(function(){
                    $('.tip2').hide();
                })
                $('.sqzwNavlist p a').ckick(function(){
                    $(this).addClass('sqzwNavliston');
                })
            </script>
    @stop
