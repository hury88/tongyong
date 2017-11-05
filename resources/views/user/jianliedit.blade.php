@extends('layouts.master')

@section('title')个人中心 @parent @stop
@section('css')
    <link rel="stylesheet" type="text/css" href="/css/common_gerenzhongxin.css"/>
    <link rel="stylesheet" type="text/css" href="/css/personalCenter.css"/>
@stop
@section('bodyNextLabel')
    @parent
@stop
@section('navigation') @parent @show
@section('content')
    @include('user.partial.menu_dashboard')
@section('user_wrap')
    <div class="pager-wrap my-resume">
        <div class="wrap-box my-resume-box">
            <div class="my-resume-header clearfix">
                <h2 class="fl">我的简历</h2>
                <div class="my-resume-step fr">
                    <span class="prev-icon"><img src="/img/duihao.png"/><i>登录中国职业培训网</i></span>
                    <span class="prev-line"></span>
                    <span class="prev-icon little-text"><img src="/img/duihao.png"/><i>填写简历</i></span>
                    <span class="prev-line"></span>
                    <span class="now-icon">3<i>简历预览</i></span>
                </div>
            </div>
            <div class="my-resume-notice">
                <img src="/img/green-duihao.png"/>
                恭喜您已注册登录成功啦。进一步完善简历后，即可发布您的求职信息。
            </div>
            <div class="my-resume-lists">
                <!-- 基本信息-->
                <div class="base-mess-lists">
                    <div class="resume-table-title">
                        <div class="table-title-div fl">基本信息</div>
                        <div class="resume-table-operate fr">
                            <a href="javascript:;"  id="edit_jbxx"><img src="/img/xiugai.png"/>修改</a>
                        </div>
                    </div>
                    <div class="resume-table-content" id="add_jbxx">
                        <form onsubmit="return ck_jladd1(this)">
                            {{ csrf_field() }}
                            <div class="form-line clearfix">
                                <div class="form-line clearfix">
                                    <span class="resume-table-trone font-bold">简历名称：</span>
                                    <div class="resume-table-trtwo chose-sex">
                                        <p class="user-information-p">{{$list->nid}}</p>
                                    </div>
                                </div>
                                <div class="form-line-left fl">
                                    <span class="resume-table-trone font-bold">姓名：</span>
                                    <div class="resume-table-trtwo chose-sex">
                                        <p class="user-information-p">{{$list->name}}</p>
                                    </div>
                                </div>
                                <div class="form-line-right fr">
                                    <span class="resume-table-trone font-bold">户口所在地：</span>
                                    <div class="resume-table-trtwo">
                                        <p class="user-information-p">{{$list->address}}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="form-line clearfix">
                                <div class="form-line-left fl">
                                    <span class="resume-table-trone font-bold">出生日期：</span>
                                    <div class="resume-table-trtwo">
                                        <p class="user-information-p">{{$list->year}}年{{$list->month}}月</p>
                                    </div>
                                </div>
                                <div class="form-line-right fr">
                                    <span class="resume-table-trone font-bold">现居住地：</span>
                                    <div class="resume-table-trtwo">
                                        <p class="user-information-p">{{$list->address_xjd}}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="form-line clearfix">
                                <div class="form-line-left fl">
                                    <span class="resume-table-trone font-bold">参加工作年份：</span>
                                    <div class="resume-table-trtwo">
                                        <p class="user-information-p">{{$list->gznf}}</p>
                                    </div>
                                </div>
                                <div class="form-line-right fr">
                                    <span class="resume-table-trone font-bold">联系方式：</span>
                                    <div class="resume-table-trtwo">
                                        <p class="user-information-p">{{$list->tel}}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="form-line clearfix">
                                <div class="form-line-left fl">
                                    <span class="resume-table-trone font-bold">最高学历：</span>
                                    <div class="resume-table-trtwo">
                                        <p class="user-information-p">{{$list->zgxl}}</p>
                                    </div>
                                </div>
                                <div class="form-line-right fr">
                                    <span class="resume-table-trone font-bold">电子邮箱：</span>
                                    <div class="resume-table-trtwo">
                                        <p class="user-information-p">{{$list->email}}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="form-line clearfix">
                                <div class="form-line-left fl">
                                    <span class="resume-table-trone font-bold">国籍</span>
                                    <div class="resume-table-trtwo">
                                        <p class="user-information-p">{{$list->gj}}</p>
                                    </div>
                                </div>
                                <div class="form-line-right fr">
                                    <span class="resume-table-trone font-bold">婚姻状况：</span>
                                    <div class="resume-table-trtwo">
                                        <p class="user-information-p">{{$list->hyzk}}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="form-line clearfix">
                                <div class="form-line-left fl">
                                    <span class="resume-table-trone font-bold">证件号：</span>
                                    <div class="resume-table-trtwo">
                                        <p class="user-information-p">{{$list->zjhm}}</p>
                                    </div>
                                </div>
                                <div class="form-line-right fr">
                                    <span class="resume-table-trone font-bold">政治面貌：</span>
                                    <div class="resume-table-trtwo">
                                        <p class="user-information-p">{{$list->zzmm}}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="form-line clearfix">
                                <span class="resume-table-trone font-bold">海外工作/学习经历：</span>
                                <div class="my-joinjob-textar">
                                    <p class="user-information-p">{{$list->remark}}</p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>


                <!-- 求职意向-->
                <div class="base-mess-lists">
                    <div class="resume-table-title">
                        <div class="table-title-div fl">求职意向</div>
                        <div class="resume-table-operate fr">
                            <a href="javascript:;" id="edit_qzyx"><img src="/img/xiugai.png"/>修改</a>
                        </div>
                    </div>
                    <div class="resume-table-content"  id="add_qzyx">
                        <form>
                            <div class="form-line clearfix">
                                <div class="form-line-left fl">
                                    <span class="resume-table-trone font-bold">期望工作性质：</span>
                                    <div class="resume-table-trtwo">
                                        <p class="user-information-p">{{$list->gzxz}}</p>
                                    </div>
                                </div>
                                <div class="form-line-right fr">
                                    <span class="resume-table-trone font-bold">期望从事行业：</span>
                                    <div class="resume-table-trtwo">
                                        <p class="user-information-p">{{$list->cshy}}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="form-line clearfix">
                                <div class="form-line-left fl">
                                    <span class="resume-table-trone font-bold">期望工作地点：</span>
                                    <div class="resume-table-trtwo">
                                        <p class="user-information-p">{{$list->gzdd}}-{{$list->gzdd2}}</p>
                                    </div>
                                </div>
                                <div class="form-line-right fr">
                                    <span class="resume-table-trone font-bold">期望月薪（税前）：</span>
                                    <div class="resume-table-trtwo">
                                        <p class="user-information-p">{{$list->price}}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="form-line clearfix">
                                <div class="form-line-left fl">
                                    <span class="resume-table-trone font-bold">期望从事职业：</span>
                                    <div class="resume-table-trtwo">
                                        <p class="user-information-p">{{$list->cszy}}</p>
                                    </div>
                                </div>
                                <div class="form-line-right fr">
                                    <span class="resume-table-trone font-bold">求职状态：</span>
                                    <div class="resume-table-trtwo">
                                        <p class="user-information-p">{{$list->qzzt}}</p>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <!--工作经验-->

                @if($list->gzjy)
                    <div class="base-mess-lists">
                        <div class="resume-table-title">
                            <div class="table-title-div fl">工作经验</div>
                            <div class="resume-table-operate fr">
                                {{--<a class="new-add" href="javascript:;"><img src="/img/delete.png"/>删除</a>--}}
                                <a class="new-add" href="javascript:;"  id="add_gzjy_xz"  style="display: none"><img src="/img/add.png"/>新增</a>
                                <a href="javascript:;" id="edit_gzjy"><img src="/img/xiugai.png"/>修改</a>
                            </div>
                        </div>
                        <div class="resume-table-content" id="add_gzjy">
                            <form onsubmit="return ck_jladd3(this)" id="add_gzjy_form">
                                {{ csrf_field() }}
                                <div id="add_gzjy_div">
                                    @foreach(json_decode($list->gzjy) as $vf)
                                        <div class="form-line clearfix">
                                            <span class="resume-table-trone font-bold">企业名称：</span>
                                            <div class="resume-table-trseven">
                                                <p class="user-information-p">{{$vf->qymc}}</p>
                                            </div>
                                        </div>
                                        <div class="form-line clearfix">
                                            <div class="form-line-left fl">
                                                <span class="resume-table-trone font-bold">行业类别：</span>
                                                <div class="resume-table-trtwo">
                                                    <p class="user-information-p">{{$vf->qylb}}</p>
                                                </div>
                                            </div>
                                            <div class="form-line-right fr">
                                                <span class="resume-table-trone font-bold">工作时间：</span>
                                                <div class="resume-table-trtwo">
                                                    <p class="user-information-p">{{$vf->gzsj}}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-line clearfix">
                                            <div class="form-line-left fl">
                                                <span class="resume-table-trone font-bold">职位名称：</span>
                                                <div class="resume-table-trtwo">
                                                    <p class="user-information-p">{{$vf->zwmc}}</p>
                                                </div>
                                            </div>
                                            <div class="form-line-right fr">
                                                <span class="resume-table-trone font-bold">职位月薪（税前）：</span>
                                                <div class="resume-table-trtwo">
                                                    <p class="user-information-p">{{$vf->price}}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-line clearfix">
                                            <span class="resume-table-trone font-bold">工作描述：</span>
                                            <div class="resume-table-trseven">
                                                <div class="my-joinjob-textar">
                                                    <p class="user-information-p">{{$vf->gzms}}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-line clearfix">
                                            <div class="form-line-left fl">
                                                <span class="resume-table-trone font-bold">企业规模：</span>
                                                <div class="resume-table-trtwo">
                                                    <p class="user-information-p">{{$vf->qygm}}</p>
                                                </div>
                                            </div>
                                            <div class="form-line-right fr">
                                                <span class="resume-table-trone font-bold">企业性质：</span>
                                                <div class="resume-table-trtwo">
                                                    <p class="user-information-p">{{$vf->qyxz}}</p>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </form>
                        </div>
                    </div>
                    @endif
                            <!-- 教育背景-->
                    @if($list->jybj)
                        <div class="base-mess-lists">
                            <div class="resume-table-title">
                                <div class="table-title-div fl">教育背景</div>
                                <div class="resume-table-operate fr">
                                    {{--<a class="new-add" href="javascript:;"><img src="/img/delete.png"/>删除</a>--}}
                                    <a class="new-add" href="javascript:;" id="jybj_xz" style="display: none"><img src="/img/add.png"/>新增</a>
                                    <a href="javascript:;" id="edit_jybj"><img src="/img/xiugai.png"/>修改</a>
                                </div>
                            </div>
                            <div class="resume-table-content"  id="add_jybj">
                                <form>
                                    @foreach(json_decode($list->jybj) as $key=>$vf)
                                        <div class="form-line clearfix">
                                            <span class="resume-table-trone font-bold">学校名称：</span>
                                            <div class="resume-table-trseven">
                                                <p class="user-information-p">{{$vf->xxmc}}</p>
                                            </div>
                                        </div>
                                        <div class="form-line clearfix">
                                            <div class="form-line-left fl">
                                                <span class="resume-table-trone font-bold">时间：</span>
                                                <div class="resume-table-trtwo">
                                                    <p class="user-information-p">{{$vf->sj}}</p>
                                                </div>
                                            </div>
                                            <div class="form-line-right fr">
                                                <span class="resume-table-trone font-bold">专业名称：</span>
                                                <div class="resume-table-trtwo">
                                                    <p class="user-information-p">{{$vf->zy}}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-line clearfix">
                                            <div class="form-line-left fl">
                                                <span class="resume-table-trone font-bold">是否统招：</span>
                                                <div class="resume-table-trtwo">
                                                    <p class="user-information-p">{{$vf->istz}}</p>
                                                </div>
                                            </div>
                                            <div class="form-line-right fr">
                                                <span class="resume-table-trone font-bold">学历/学位：</span>
                                                <div class="resume-table-trtwo">
                                                    <p class="user-information-p">{{$vf->xl}}</p>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </form>
                            </div>
                        </div>
                        @endif
                                <!-- 在校情况-->
                        @if($list->zxqk)
                            <div class="base-mess-lists">
                                <div class="resume-table-title">
                                    <div class="table-title-div fl">在校情况</div>
                                    <div class="resume-table-operate fr">
                                        {{--<a class="new-add" href="javascript:;"><img src="/img/delete.png"/>删除</a>--}}
                                        <a class="new-add" href="javascript:;" id="zxqk_xz"   style="display: none"><img src="/img/add.png"/>新增</a>
                                        <a href="javascript:;" id="edit_zxqk"><img src="/img/xiugai.png"/>修改</a>
                                    </div>
                                </div>
                                <div class="resume-table-content"  id="add_zxqk">
                                    <form>
                                        @foreach(json_decode($list->zxqk) as $key=>$vf)
                                            <div class="form-line clearfix">
                                                <span class="resume-table-trone font-bold">获得奖项：</span>
                                                <div class="resume-table-trseven">
                                                    <p class="user-information-p">{{$vf->hdjx}}</p>
                                                </div>
                                            </div>
                                            <div class="form-line clearfix">
                                                <div class="form-line-right fr">
                                                    <span class="resume-table-trone font-bold">时间：</span>
                                                    <div class="resume-table-trtwo">
                                                        <p class="user-information-p">{{$vf->jxsj}}</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-line clearfix">
                                                <div class="form-line-left fl">
                                                    <span class="resume-table-trone font-bold">校内职务：</span>
                                                    <div class="resume-table-trtwo">
                                                        <p class="user-information-p">{{$vf->xnzw}}</p>
                                                    </div>
                                                </div>
                                                <div class="form-line-right fr">
                                                    <span class="resume-table-trone font-bold">时间：</span>
                                                    <div class="resume-table-trtwo">
                                                        <p class="user-information-p">{{$vf->zwsj}}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </form>
                                </div>
                            </div>
                            @endif

                                    <!-- 技能特长-->

                            @if($list->jntc)
                                <div class="base-mess-lists">
                                    <div class="resume-table-title">
                                        <div class="table-title-div fl">技能特长</div>
                                        <div class="resume-table-operate fr">
                                            {{--<a class="new-add" href="javascript:;"><img src="/img/delete.png"/>删除</a>--}}
                                            <a class="new-add" href="javascript:;"  id="jntc_xz"  style="display: none" ><img src="/img/add.png"/>新增</a>
                                            <a href="javascript:;" id="edit_jntc"><img src="/img/xiugai.png"/>修改</a>
                                        </div>
                                    </div>
                                    <div class="resume-table-content"  id="add_jntc">
                                        <form>
                                            @foreach(json_decode($list->jntc) as $key=>$vf)
                                                <div class="form-line clearfix">
                                                    <div class="form-line-left fl">
                                                        <span class="resume-table-trone font-bold">技能/语言：</span>
                                                        <div class="resume-table-trtwo">
                                                            <p class="user-information-p">{{$vf->jnyy}} {{$vf->zdy}}</p>
                                                        </div>
                                                    </div>
                                                    <div class="form-line-right fr">
                                                        <span class="resume-table-trone font-bold">掌握程度：</span>
                                                        <div class="resume-table-trtwo">
                                                            <p class="user-information-p">{{$vf->zwcd}}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </form>
                                    </div>
                                </div>
                                @endif


                                        <!--培训经历-->
                                @if($list->pxjl)
                                    <div class="base-mess-lists">
                                        <div class="resume-table-title">
                                            <div class="table-title-div fl">培训经历</div>
                                            <div class="resume-table-operate fr">
                                                {{--<a class="new-add" href="javascript:;"><img src="/img/delete.png"/>删除</a>--}}
                                                <a class="new-add" href="javascript:;"  id="pxjl_xz" style="display: none" ><img src="/img/add.png"/>新增</a>
                                                <a href="javascript:;" id="edit_pxjl"><img src="/img/xiugai.png"/>修改</a>
                                            </div>
                                        </div>
                                        <div class="resume-table-content"  id="add_pxjl">
                                            <form>
                                                @foreach(json_decode($list->pxjl) as $key=>$vf)
                                                    <div class="form-line clearfix">
                                                        <div class="form-line-left fl">
                                                            <span class="resume-table-trone font-bold">时间：</span>
                                                            <div class="resume-table-trtwo">
                                                                <p class="user-information-p">{{$vf->sj}}</p>
                                                            </div>
                                                        </div>
                                                        <div class="form-line-right fr">
                                                            <span class="resume-table-trone font-bold">培训课程：</span>
                                                            <div class="resume-table-trtwo">
                                                                <p class="user-information-p">{{$vf->kc}}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-line clearfix">
                                                        <div class="form-line-left fl">
                                                            <span class="resume-table-trone font-bold">培训机构：</span>
                                                            <div class="resume-table-trtwo">
                                                                <p class="user-information-p">{{$vf->jg}}</p>
                                                            </div>
                                                        </div>
                                                        <div class="form-line-right fr">
                                                            <span class="resume-table-trone font-bold">培训地点：</span>
                                                            <div class="resume-table-trtwo">
                                                                <p class="user-information-p">{{$vf->dd}}...</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-line clearfix">
                                                        <span class="resume-table-trone font-bold">获得证书：</span>
                                                        <div class="resume-table-trseven">
                                                            <p class="user-information-p">{{$vf->zs}}</p>
                                                        </div>
                                                    </div>
                                                    <div class="form-line clearfix">
                                                        <span class="resume-table-trone font-bold">详细描述：</span>
                                                        <div class="resume-table-trseven">
                                                            <p class="user-information-p">{{$vf->ms}}</p>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </form>
                                        </div>
                                    </div>
                                    @endif

                                            <!--证书-->
                                    @if($list->zs)
                                        <div class="base-mess-lists">
                                            <div class="resume-table-title">
                                                <div class="table-title-div fl">证书</div>
                                                <div class="resume-table-operate fr">
                                                    {{--<a class="new-add" href="javascript:;"><img src="/img/delete.png"/>删除</a>--}}
                                                    <a class="new-add" href="javascript:;" id="zs_xz"   style="display: none" ><img src="/img/add.png"/>新增</a>
                                                    <a href="javascript:;" id="edit_zs"><img src="/img/xiugai.png"/>修改</a>
                                                </div>
                                            </div>
                                            <div class="resume-table-content"  id="add_zs">
                                                <form>

                                                    @foreach(json_decode($list->zs) as $key=>$vf)
                                                        <div class="form-line clearfix">
                                                            <div class="form-line-left fl">
                                                                <span class="resume-table-trone">证书名称：</span>
                                                                <div class="resume-table-trtwo">
                                                                    <p class="user-information-p">{{$vf->kc}} {{$vf->zdy}}</p>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-line clearfix">
                                                            <div class="form-line-left fl">
                                                                <span class="resume-table-trone">获得时间：</span>
                                                                <div class="resume-table-trtwo">
                                                                    <p class="user-information-p">{{$vf->sj}}</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </form>
                                            </div>
                                        </div>
                                        @endif

                                        @if($vf=json_decode($list->qt))
                                                <!--其他信息-->
                                        <div class="base-mess-lists">
                                            <div class="resume-table-title">
                                                <div class="table-title-div fl">其他信息</div>
                                                <div class="resume-table-operate fr">
                                                    {{--<a class="new-add" href="javascript:;"><img src="/img/delete.png"/>删除</a>--}}
                                                    {{--<a class="new-add" href="javascript:;"><img src="/img/add.png"/>新增</a>--}}
                                                    <a href="javascript:;" id="edit_qt"><img src="/img/xiugai.png"/>修改</a>
                                                </div>
                                            </div>
                                            <div class="resume-table-content"  id="add_qt">
                                                <form>
                                                    <div class="form-line clearfix">
                                                        <div class="form-line-left fl">
                                                            <span class="resume-table-trone">兴趣爱好：</span>
                                                            <div class="resume-table-trtwo">
                                                                <p class="user-information-p">{{$vf->xqah}}</p>
                                                            </div>
                                                        </div>
                                                        <div class="form-line-right fr">
                                                            <span class="resume-table-trone">宗教信仰：</span>
                                                            <div class="resume-table-trtwo">
                                                                <p class="user-information-p">{{$vf->zjxy}}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-line clearfix">
                                                        <div class="form-line-left fl">
                                                            <span class="resume-table-trone">获得荣誉：</span>
                                                            <div class="resume-table-trtwo">
                                                                <p class="user-information-p">{{$vf->hdry}}</p>
                                                            </div>
                                                        </div>
                                                        <div class="form-line-right fr">
                                                            <span class="resume-table-trone">特长职业目标：</span>
                                                            <div class="resume-table-trtwo">
                                                                <p class="user-information-p">{{$vf->zymb}}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-line clearfix">
                                                        <div class="form-line-left fl">
                                                            <span class="resume-table-trone">专业组织：</span>
                                                            <div class="resume-table-trtwo">
                                                                <p class="user-information-p">{{$vf->zyzz}}</p>
                                                            </div>
                                                        </div>
                                                        <div class="form-line-right fr">
                                                            <span class="resume-table-trone">特殊技能：</span>
                                                            <div class="resume-table-trtwo">
                                                                <p class="user-information-p">{{$vf->tsjn}}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-line clearfix">
                                                        <div class="form-line-left fl">
                                                            <span class="resume-table-trone">著作/论文：</span>
                                                            <div class="resume-table-trtwo">
                                                                <p class="user-information-p">{{$vf->zzlw}}</p>
                                                            </div>
                                                        </div>
                                                        <div class="form-line-right fr">
                                                            <span class="resume-table-trone">社会活动：</span>
                                                            <div class="resume-table-trtwo">
                                                                <p class="user-information-p">{{$vf->shhd}}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-line clearfix">
                                                        <div class="form-line-left fl">
                                                            <span class="resume-table-trone">专利：</span>
                                                            <div class="resume-table-trtwo">
                                                                <p class="user-information-p">{{$vf->zl}}</p>
                                                            </div>
                                                        </div>
                                                        <div class="form-line-right fr">
                                                            <span class="resume-table-trone">荣誉：</span>
                                                            <div class="resume-table-trtwo">
                                                                <p class="user-information-p">{{$vf->ry}}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-line clearfix">
                                                        <span class="resume-table-trone">其他：</span>
                                                        <div class="my-joinjob-textar">
                                                            <p class="user-information-p">{{$vf->qt}}</p>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        @endif

                                                <!--项目经验-->
                                        @if($list->xmjy)
                                            <div class="base-mess-lists">
                                                <div class="resume-table-title">
                                                    <div class="table-title-div fl">项目经验</div>
                                                    <div class="resume-table-operate fr">
                                                        {{--<a class="new-add" href="javascript:;"><img src="/img/delete.png"/>删除</a>--}}
                                                        <a class="new-add" href="javascript:;" id="xmjy_xz"   style="display: none" ><img src="/img/add.png"/>新增</a>
                                                        <a href="javascript:;" id="edit_xmjy"><img src="/img/xiugai.png"/>修改</a>
                                                    </div>
                                                </div>
                                                <div class="resume-table-content"  id="add_xmjy">
                                                    <form>
                                                        @foreach(json_decode($list->xmjy) as $key=>$vf)
                                                            <div class="form-line clearfix">
                                                                <div class="form-line-left fl">
                                                                    <span class="resume-table-trone font-bold">项目名称：</span>
                                                                    <div class="resume-table-trtwo">
                                                                        <p class="user-information-p">{{$vf->xmmc}}</p>
                                                                    </div>
                                                                </div>
                                                                <div class="form-line-right fr">
                                                                    <span class="resume-table-trone font-bold">时间：</span>
                                                                    <div class="resume-table-trtwo">
                                                                        <p class="user-information-p">{{$vf->sj}}</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-line clearfix">
                                                                <span class="resume-table-trone font-bold">项目描述：</span>
                                                                <div class="resume-table-trseven">
                                                                    <p class="user-information-p">{{$vf->xmms}}</p>
                                                                </div>
                                                            </div>
                                                            <div class="form-line clearfix">
                                                                <span class="resume-table-trone font-bold">责任描述：</span>
                                                                <div class="resume-table-trseven">
                                                                    <p class="user-information-p">{{$vf->zrms}}</p>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </form>
                                                </div>
                                            </div>
                                        @endif
            </div>
        </div>
    </div>

    <input type="hidden" id="jianli_eidt">
    <script type="text/javascript">
        var id={{$list->id}}
    </script>
@show
@stop
@section('scripts')
    @parent
    <script src="/js/ckform.js" type="text/javascript"></script>
@stop
