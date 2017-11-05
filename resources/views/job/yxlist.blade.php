@extends('layouts.master')

@section('title') @parent @stop
@section('css')
    <link rel="stylesheet" type="text/css" href="/css/common_zhiyezhaopin.css"/>
    <link rel="stylesheet" type="text/css" href="/css/zhiyezhaopin.css"/>
@stop
@section('bodyNextLabel')
    <body>
    <div class="pager-wrap personal-center" style="background: #f4f4f4;">
@stop
@section('breadcrumbs')
<div class="sqzw">
    <!--banner-->
    <div class="">
        <img src="{{$banimgsrc}}" style="width: 100%;"/>
    </div>
@stop
    @section('content')
        <div class="sqzwNav">
            <div class="sqzwNavsech">
                <select name="">
                    <option value="">合肥</option>
                    <option value="">合肥</option>
                    <option value="">合肥</option>
                </select>
                <input type="text" name="" id="" value="" placeholder="输入职位关键词：如技术总监" class="txt"/>
                <input type="submit" name="" id="" value="搜索" class="btn"/>
            </div>
            <div class="sqzwNavlist">
                <p>
                    <a href="">北京大学</a>
                    <a href="">清华大学</a>
                    <a href="">安徽农业大学</a>
                    <a href="">中国科技大学</a>
                    <a href="">北京大学 </a>
                    <a href="">清华大学</a>
                    <a href="">宁波大学 </a>
                    <a href="">中国地质大学(北京) </a>
                    <a href="">首都师范大学</a>
                </p>
                <p>
                    <a href="">计算机硬件</a>
                    <a href="">计算机硬件</a>
                    <a href="">计算机硬件</a>
                    <a href="">计算机硬件</a>
                    <a href="">计算机硬件</a>
                </p>
            </div>
        </div>

        <!-- 内容-->

        <div class="zplbCon">
            <div class="zplbTop">
                <ul>
                    <?php $ccs=['18','15','16','18','20']?>
                    @foreach($sanlist as $key=>$val)
                        <li @if($key==4) class="last1" @endif>
                            <a href="{{u($GLOBALS['pid_path'],$val['path'])}}"  @if($GLOBALS['ty']==$val['id']) class="zplbon" @endif  style="padding: {{$ccs[$key]}}px 0;">
                                <div class="zplbimg">
                                    <img src="/img/zplb{{$key+1}}.png"/>
                                </div>
                                <p>{{$val['catname']}}</p>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="zplbban">
                <img src="img/zplb1.jpg" style="width: 100%;"/>
            </div>
            <!--开始-->
            <div class="zplbxzwz">
                <div class="zplbxzwz1">
                    您已选择：<img src="img/sqzwwz.jpg"><i>合肥</i><img src="img/zplbxx5.jpg">
                </div>
                <div class="zplbxzwz2">
                    <div class="zplbxzwz2a">
                        <div class="yxxxfbl">
                            院校
                        </div>
                        <div class="yxxxfbr">
                            <span>全部</span>
                            <span>北京大学 </span>
                            <span> 清华大学 </span>
                            <span>中国科学院大学  </span>
                            <span>香港大学</span>
                            <span>香港中文大学</span>
                            <span>台湾大学 </span>
                            <span>南方医科大学 </span>
                            <span>青岛大学</span>
                            <span>中国地质大学(北京)</span>
                            <span> 首都师范大学</span>
                            <span>上海师范大学 </span>
                            <span>宁波大学</span>
                            <span> 浙江师范大学</span>
                        </div>
                    </div>
                    <div class="zplbxzwz2a">
                        <div class="zplbxzwz2al">
                            分类
                        </div>
                        <div class="yxxxfbr">
                            <span>全部</span>
                            <span>招生信息</span>
                            <span>宣讲会信息</span>
                            <span>校园活动</span>
                        </div>
                    </div>
                    <div class="zplbxzwz2a">
                        <div class="zplbxzwz2al">
                            更  多
                        </div>
                        <div class="zplbxzwz2ar">
                            <select name="">
                                <option value="">更新日期</option>
                                <option value="">更新日期1</option>
                                <option value="">更新日期1</option>
                                <option value="">更新日期1</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <!--结束-->
            <div class="yxxxfbCon">
                <ul>
                    <li>
                        <div class="yxxxfbConl">
                            <p class="pb1">学生举报学校违规被查</p>
                            <p  class="pb2">近日，部分媒体报道西北工业大学附中在重污染天气Ι级应急响应期间补课，因教育局工作人员向学校透露投诉人电话号码近日，部分媒体报道西北工业大学附中在重污染天气Ι级应急响应期间补课，因教育局工作人员向学校透露投诉人电话号码近日因教育局工作人员向学校透露投诉人电话号码......</p>
                            <a href="">阅读全文>></a>
                        </div>
                        <div class="yxxxfbConr">
                            <img src="img/yxzpfb1.jpg"/>
                        </div>
                    </li>
                    <li>
                        <div class="yxxxfbConl">
                            <p class="pb1">学生举报学校违规被查</p>
                            <p  class="pb2">近日，部分媒体报道西北工业大学附中在重污染天气Ι级应急响应期间补课，因教育局工作人员向学校透露投诉人电话号码近日，部分媒体报道西北工业大学附中在重污染天气Ι级应急响应期间补课，因教育局工作人员向学校透露投诉人电话号码近日因教育局工作人员向学校透露投诉人电话号码......</p>
                            <a href="">阅读全文>></a>
                        </div>
                        <div class="yxxxfbConr">
                            <img src="img/yxzpfb2.jpg"/>
                        </div>
                    </li>
                    <li>
                        <div class="yxxxfbConl">
                            <p class="pb1">学生举报学校违规被查</p>
                            <p  class="pb2">近日，部分媒体报道西北工业大学附中在重污染天气Ι级应急响应期间补课，因教育局工作人员向学校透露投诉人电话号码近日，部分媒体报道西北工业大学附中在重污染天气Ι级应急响应期间补课，因教育局工作人员向学校透露投诉人电话号码近日因教育局工作人员向学校透露投诉人电话号码......</p>
                            <a href="">阅读全文>></a>
                        </div>
                        <div class="yxxxfbConr">
                            <img src="img/yxzpfb3.jpg"/>
                        </div>
                    </li>
                    <li>
                        <div class="yxxxfbConl">
                            <p class="pb1">学生举报学校违规被查</p>
                            <p  class="pb2">近日，部分媒体报道西北工业大学附中在重污染天气Ι级应急响应期间补课，因教育局工作人员向学校透露投诉人电话号码近日，部分媒体报道西北工业大学附中在重污染天气Ι级应急响应期间补课，因教育局工作人员向学校透露投诉人电话号码近日因教育局工作人员向学校透露投诉人电话号码......</p>
                            <a href="">阅读全文>></a>
                        </div>
                        <div class="yxxxfbConr">
                            <img src="img/yxzpfb4.jpg"/>
                        </div>
                    </li>
                    <li>
                        <div class="yxxxfbConl">
                            <p class="pb1">学生举报学校违规被查</p>
                            <p  class="pb2">近日，部分媒体报道西北工业大学附中在重污染天气Ι级应急响应期间补课，因教育局工作人员向学校透露投诉人电话号码近日，部分媒体报道西北工业大学附中在重污染天气Ι级应急响应期间补课，因教育局工作人员向学校透露投诉人电话号码近日因教育局工作人员向学校透露投诉人电话号码......</p>
                            <a href="">阅读全文>></a>
                        </div>
                        <div class="yxxxfbConr">
                            <img src="img/yxzpfb1.jpg"/>
                        </div>
                    </li>
                    <li>
                        <div class="yxxxfbConl">
                            <p class="pb1">学生举报学校违规被查</p>
                            <p  class="pb2">近日，部分媒体报道西北工业大学附中在重污染天气Ι级应急响应期间补课，因教育局工作人员向学校透露投诉人电话号码近日，部分媒体报道西北工业大学附中在重污染天气Ι级应急响应期间补课，因教育局工作人员向学校透露投诉人电话号码近日因教育局工作人员向学校透露投诉人电话号码......</p>
                            <a href="">阅读全文>></a>
                        </div>
                        <div class="yxxxfbConr">
                            <img src="img/yxzpfb2.jpg"/>
                        </div>
                    </li>
                    <li>
                        <div class="yxxxfbConl">
                            <p class="pb1">学生举报学校违规被查</p>
                            <p  class="pb2">近日，部分媒体报道西北工业大学附中在重污染天气Ι级应急响应期间补课，因教育局工作人员向学校透露投诉人电话号码近日，部分媒体报道西北工业大学附中在重污染天气Ι级应急响应期间补课，因教育局工作人员向学校透露投诉人电话号码近日因教育局工作人员向学校透露投诉人电话号码......</p>
                            <a href="">阅读全文>></a>
                        </div>
                        <div class="yxxxfbConr">
                            <img src="img/yxzpfb3.jpg"/>
                        </div>
                    </li>
                    <li>
                        <div class="yxxxfbConl">
                            <p class="pb1">学生举报学校违规被查</p>
                            <p  class="pb2">近日，部分媒体报道西北工业大学附中在重污染天气Ι级应急响应期间补课，因教育局工作人员向学校透露投诉人电话号码近日，部分媒体报道西北工业大学附中在重污染天气Ι级应急响应期间补课，因教育局工作人员向学校透露投诉人电话号码近日因教育局工作人员向学校透露投诉人电话号码......</p>
                            <a href="">阅读全文>></a>
                        </div>
                        <div class="yxxxfbConr">
                            <img src="img/yxzpfb4.jpg"/>
                        </div>
                    </li>
                </ul>
                <div class="web-pager">
                    <a class="pager-now" href="javascript:;">1</a>
                    <a href="javascript:;">2</a>
                    <a href="javascript:;">3</a>
                    <a href="javascript:;">4</a>
                    <a href="javascript:;">5</a>
                    <a href="javascript:;">6</a>
                    <a href="javascript:;">7</a>
                    <a href="javascript:;">8</a>
                    <a href="javascript:;">9</a>
                    <a href="javascript:;">10</a>
                    <span>…</span>
                    <a href="javascript:;">100</a>
                    <a href="javascript:;" class="scrip-a"><img src="img/zhizhen.jpg"></a>
                    <form>
                        <span class="script-span">跳转到：</span>
                        <input class="pager-form-inp" type="text"/>
                        <input class="pager-form-sub" type="button" value="GO">
                    </form>

                </div>

            </div>



        </div>
        <div class="gap" style="height: 40px;">

        </div>
</div>
@stop {{-- end content --}}


@section('footer')
  @parent
@stop

@section('scripts')
  @parent
            <script type="text/javascript" src="js/jquery-1.10.1.min.js"></script>
            <script type="text/javascript">
                //	导航下拉

                $('.qzzptTit .kefu').click(function(){
                    $(this).parents('.qzzptTit').next('.qzzptTxt').slideToggle();
                    $(this).children().css("background-image","url('img/zqzpt2.jpg')")
                })
            </script>
@stop
