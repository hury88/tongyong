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
                    <span class="now-icon">2<i>填写简历</i></span>
                    <span class="next-line"></span>
                    <span class="next-icon">3<i>简历完成</i></span>
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
                            <a href="javascript:;" id="edit_jbxx" style="display: none"><img src="/img/xiugai.png"/>修改</a>
                        </div>
                    </div>
                    <div class="resume-table-content" id="add_jbxx">
                        <form onsubmit="return ck_jladd1(this)">
                            {{ csrf_field() }}
                            <div class="form-line clearfix">
                                <div class="form-line clearfix">
                                    <span class="resume-table-trone"><b>*</b>简历名称：</span>
                                    <div class="resume-table-trseven" colspan="3">
                                        <input type="text" class="resume-company-name" name="nid" id="nid"/>
                                    </div>
                                </div>
                                <div class="form-line-left fl">
                                    <span class="resume-table-trone"><b>*</b>姓名：</span>
                                    <div class="resume-table-trtwo chose-sex">
                                        <input class="myname" type="text" name="name"/>
                                        <label class="chose-sex-boy">
                                            <input type="radio" name="sex" value="男" checked/>
                                            <span>男</span>
                                        </label>
                                        <label class="chose-sex-girl">
                                            <input type="radio" name="sex"  value="女" />
                                            <span>女</span>
                                        </label>
                                    </div>
                                </div>
                                <div class="form-line-right fr">
                                    <span class="resume-table-trone"><b>*</b>户口所在地：</span>
                                    <div class="resume-table-trtwo">
                                        <input class="resume-table-inp" type="text" name="address"/>
                                    </div>
                                </div>
                            </div>
                            <div class="form-line clearfix">
                                <div class="form-line-left fl">
                                    <span class="resume-table-trone"><b>*</b>出生日期：</span>
                                    <div class="resume-table-trtwo">
                                        <div class="my-born-year">
                                            <input type="text" name="year"/>
                                            <span>年</span>
                                        </div>
                                        <div class="my-born-year">
                                            <input type="text" name="month"/>
                                            <span>月</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-line-right fr">
                                    <span class="resume-table-trone"><b>*</b>现居住地：</span>
                                    <div class="resume-table-trtwo">
                                        <input class="resume-table-inp" type="text" name="address_xjd"/>
                                    </div>
                                </div>
                            </div>
                            <div class="form-line clearfix">
                                <div class="form-line-left fl">
                                    <span class="resume-table-trone"><b>*</b>参加工作年份：</span>
                                    <div class="resume-table-trtwo">
                                        <input class="resume-table-inp" type="text" name="gznf"/>
                                    </div>
                                </div>
                                <div class="form-line-right fr">
                                    <span class="resume-table-trone"><b>*</b>联系方式：</span>
                                    <div class="resume-table-trtwo">
                                        <input class="resume-table-inp" type="text" name="tel"/>
                                    </div>
                                </div>
                            </div>
                            <div class="form-line clearfix">
                                <div class="form-line-left fl">
                                    <span class="resume-table-trone"><b>*</b>最高学历：</span>
                                    <div class="resume-table-trtwo">
                                        <input class="resume-table-inp" type="text" name="zgxl"/>
                                    </div>
                                </div>
                                <div class="form-line-right fr">
                                    <span class="resume-table-trone"><b>*</b>电子邮箱：</span>
                                    <div class="resume-table-trtwo">
                                        <input class="resume-table-inp" type="text" name="email"/>
                                    </div>
                                </div>
                            </div>
                            <div class="form-line clearfix">
                                <div class="form-line-left fl">
                                    <span class="resume-table-trone">国籍</span>
                                    <div class="resume-table-trtwo">
                                        <input class="resume-table-inp" type="text" name="gj"/>
                                    </div>
                                </div>
                                <div class="form-line-right fr">
                                    <span class="resume-table-trone">婚姻状况：</span>
                                    <div class="resume-table-trtwo">
                                        <div class="my-joinjob-year">
                                            <select name="hyzk">
                                                <option value="保密">保密</option>
                                                <option value="已婚">已婚</option>
                                                <option value="未婚">未婚</option>
                                            </select>
                                            <span></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-line clearfix">
                                <div class="form-line-left fl">
                                    <span class="resume-table-trone"><b>*</b>证件号码：</span>
                                    <div class="resume-table-trtwo">
                                        <div class="my-joinjob-year">
                                            <input class="resume-table-inp" type="text" name="zjhm"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-line-right fr">
                                    <span class="resume-table-trone">政治面貌：</span>
                                    <div class="resume-table-trtwo">
                                        <div class="my-joinjob-year">
                                            <select name="zzmm">
                                                <option value="党员">党员</option>
                                                <option value="团员">团员</option>
                                                <option value="其他党社">其他党社</option>
                                                <option value="无党派人士">无党派人士</option>
                                            </select>
                                            <span></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-line clearfix">
                                <span class="resume-table-trone">海外工作/学习经历：</span>
                                <div class="my-joinjob-textar">
                                    <textarea name="remark"></textarea>
                                </div>
                            </div>
                            <div class="form-line clearfix">
                                <div class="resume-table-trsix fr">
                                    <input class="resume-table-inp" type="submit" value="保存"/>
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
                            <a href="javascript:;" style="display: none" id="edit_qzyx"><img src="/img/xiugai.png"/>修改</a>
                        </div>
                    </div>
                    <div class="resume-table-content" id="add_qzyx">
                        <form onsubmit="return ck_jladd2(this)">
                            {{ csrf_field() }}
                            <div class="form-line clearfix">
                                <div class="form-line-left fl">
                                    <span class="resume-table-trone"><b>*</b>期望工作性质：</span>
                                    <div class="resume-table-trtwo">
                                        <div class="my-joinjob-year">
                                            <select name="gzxz">
                                                <option value="全职">全职</option>
                                                <option value="兼职">兼职</option>
                                                <option value="时工">时工</option>
                                                <option value="不限">不限</option>
                                            </select>
                                            <span></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-line-right fr">
                                    <span class="resume-table-trone"><b>*</b>期望从事行业：</span>
                                    <div class="resume-table-trtwo">
                                        <div class="my-joinjob-year">
                                            <select name="cshy">
                                                <option value="金融">金融</option>
                                                <option value="教育">教育</option>
                                                <option value="管理">管理</option>
                                            </select>
                                            <span></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-line clearfix">
                                <div class="form-line-left fl">
                                    <span class="resume-table-trone"><b>*</b>期望工作地点：</span>
                                    <div class="resume-table-trtwo">
                                        <div class="my-city">
                                            <input type="text" name="gzdd">
                                            <span>市</span>
                                        </div>
                                        <div class="my-city-select">
                                            <select name="gzdd2">
                                                <option></option>
                                            </select>
                                            <span></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-line-right fr">
                                    <span class="resume-table-trone"><b>*</b>期望月薪（税前）：</span>
                                    <div class="resume-table-trtwo">
                                        <input class="resume-table-inp" type="text" name="price"/>
                                    </div>
                                </div>
                            </div>
                            <div class="form-line clearfix">
                                <div class="form-line-left fl">
                                    <span class="resume-table-trone"><b>*</b>期望从事职业：</span>
                                    <div class="resume-table-trtwo">
                                        <div class="my-joinjob-year">
                                            <select name="cszy">
                                                <option value="服务业">服务业</option>
                                                <option value="工业">工业</option>
                                            </select>
                                            <span></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-line-right fr">
                                    <span class="resume-table-trone"><b>*</b>求职状态：</span>
                                    <div class="resume-table-trtwo">
                                        <div class="my-joinjob-year">
                                            <select name="qzzt">
                                                <option value="求职中">求职中</option>
                                                <option value="在职中">在职中</option>
                                            </select>
                                            <span></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-line clearfix">
                                <div class="resume-table-trsix fr">
                                    <input class="resume-table-inp" type="submit" value="保存"/>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <!--工作经验-->
                <div class="base-mess-lists">
                    <div class="resume-table-title">
                        <div class="table-title-div fl">工作经验</div>
                        <div class="resume-table-operate fr">
                            <a class="new-add" href="javascript:;" id="add_gzjy_xz"><img src="/img/add.png"/>新增</a>
                            <a href="javascript:;"  style="display: none" id="edit_gzjy"><img src="/img/xiugai.png"/>修改</a>
                        </div>
                    </div>
                    <div class="resume-table-content" id="add_gzjy">
                        <form onsubmit="return ck_jladd3(this)" id="add_gzjy_form">
                            {{ csrf_field() }}
                            <div id="add_gzjy_div">
                                <div class="form-line clearfix">
                                    <span class="resume-table-trone"><b>*</b>企业名称：</span>
                                    <div class="resume-table-trseven" colspan="3">
                                        <input type="text" class="resume-company-name" name="qymc[]"/>
                                    </div>
                                </div>
                                <div class="form-line clearfix">
                                    <div class="form-line-left fl">
                                        <span class="resume-table-trone"><b>*</b>行业类别：</span>
                                        <div class="resume-table-trtwo">
                                            <div class="my-joinjob-year">
                                                <select name="qylb[]">
                                                    <option value="金融">金融</option>
                                                    <option value="服务业">服务业</option>
                                                </select>
                                                <span></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-line-right fr">
                                        <span class="resume-table-trone"><b>*</b>工作时间：</span>
                                        <div class="resume-table-trtwo">
                                            <input class="resume-table-inp" type="text" name="gzsj[]"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-line clearfix">
                                    <div class="form-line-left fl">
                                        <span class="resume-table-trone"><b>*</b>职位名称：</span>
                                        <div class="resume-table-trtwo">
                                            <input class="resume-table-inp" type="text" name="zwmc[]"/>
                                        </div>
                                    </div>
                                    <div class="form-line-right fr">
                                        <span class="resume-table-trone"><b>*</b>职位月薪（税前）：</span>
                                        <div class="resume-table-trtwo">
                                            <input class="resume-table-inp" type="text" name="price[]"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-line clearfix">
                                    <span class="resume-table-trone"><b>*</b>工作描述：</span>
                                    <div class="resume-table-trseven">
                                        <div class="my-joinjob-textar">
                                            <textarea  name="gzms[]"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-line clearfix">
                                    <div class="form-line-left fl">
                                        <span class="resume-table-trone">企业规模：</span>
                                        <div class="resume-table-trtwo">
                                            <input class="resume-table-inp" type="text" name="qygm[]"/>
                                        </div>
                                    </div>
                                    <div class="form-line-right fr">
                                    <span class="resume-table-trone">企业性质：</span>
                                    <div class="resume-table-trtwo">
                                        <div class="my-joinjob-year">
                                            <select name="qyxz[]">
                                                <option value="国企">国企</option>
                                                <option value="外资">外资</option>
                                                <option value="合资">合资</option>
                                                <option value="民营">民营</option>
                                                <option value="其他">其他</option>
                                            </select>
                                            <span></span>
                                        </div>
                                    </div>
                                </div>
                                </div>
                            </div>


                            <div class="form-line clearfix">
                                <div class="resume-table-trsix fr">
                                    <input class="resume-table-inp" type="submit" value="保存"/>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- 教育背景-->
                <div class="base-mess-lists">
                    <div class="resume-table-title">
                        <div class="table-title-div fl">教育背景</div>
                        <div class="resume-table-operate fr">
                            <a class="new-add" href="javascript:;" id="jybj_xz"><img src="/img/add.png"/>新增</a>
                            <a href="javascript:;"  style="display: none" id="edit_jybj"><img src="/img/xiugai.png"/>修改</a>
                        </div>
                    </div>
                    <div class="resume-table-content" id="add_jybj">
                        <form onsubmit="return ck_jladd4(this)" id="add_jybj_form">
                            {{ csrf_field() }}
                            <div id="add_jybj_div">
                                <div class="form-line clearfix">
                                    <span class="resume-table-trone"><b>*</b>学校名称：</span>
                                    <div class="resume-table-trseven" colspan="3">
                                        <input type="text" class="resume-company-name" name="xxmc[]"/>
                                    </div>
                                </div>

                                <div class="form-line clearfix">
                                    <div class="form-line-left fl">
                                        <span class="resume-table-trone"><b>*</b>时间：</span>
                                        <div class="resume-table-trtwo">
                                            <input class="resume-table-inp" type="text" name="sj[]"/>
                                        </div>
                                    </div>
                                    <div class="form-line-right fr">
                                        <span class="resume-table-trone"><b>*</b>专业名称：</span>
                                        <div class="resume-table-trtwo">
                                            <input class="resume-table-inp" type="text" name="zy[]"/>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-line clearfix">
                                <div class="form-line-left fl">
                                    <span class="resume-table-trone"><b>*</b>是否统招：</span>
                                    <div class="resume-table-trtwo">
                                        <div class="my-joinjob-year">
                                            <select   name="istz[]">
                                                <option value="是">是</option>
                                                <option value="否">否</option>
                                            </select>
                                            <span></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-line-right fr">
                                    <span class="resume-table-trone"><b>*</b>学历/学位：</span>
                                    <div class="resume-table-trseven" colspan="3">
                                        <input type="text" class="resume-company-name" name="xl[]"/>
                                    </div>
                                </div>
                                </div>
                            </div>
                            <div class="form-line clearfix">
                                <div class="resume-table-trsix fr">
                                    <input class="resume-table-inp" type="submit" value="保存"/>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <!--在校情况-->
                <div class="base-mess-lists">
                    <div class="resume-table-title">
                        <div class="table-title-div fl">在校情况</div>
                        <div class="resume-table-operate fr">
                            <a class="new-add" href="javascript:;" id="zxqk_xz"><img src="/img/add.png"/>新增</a>
                            <a href="javascript:;"  style="display: none" id="edit_zxqk"><img src="/img/xiugai.png"/>修改</a>
                        </div>
                    </div>
                    <div class="resume-table-content" id="add_zxqk">
                        <form onsubmit="return ck_jladd5(this)" id="add_zxqk_form">
                            {{ csrf_field() }}
                            <div id="add_zxqk_div">
                                <div class="form-line clearfix">
                                    <div class="form-line-left fl">
                                        <span class="resume-table-trone">获得奖项：</span>
                                        <div class="resume-table-trtwo">
                                            <input class="resume-table-inp" type="text" name="hdjx[]"/>
                                        </div>
                                    </div>
                                    <div class="form-line-right fr">
                                        <span class="resume-table-trone">时间：</span>
                                        <div class="resume-table-trtwo">
                                            <input class="resume-table-inp" type="text" name="jxsj[]"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-line clearfix">
                                <div class="form-line-left fl">
                                    <span class="resume-table-trone"><b>*</b>校内职务：</span>
                                    <div class="resume-table-trtwo">
                                        <input class="resume-table-inp" type="text"  name="xnzw[]"/>
                                    </div>
                                </div>
                                <div class="form-line-right fr">
                                    <span class="resume-table-trone"><b>*</b>时间：</span>
                                    <div class="resume-table-trtwo">
                                        <input class="resume-table-inp" type="text"  name="zwsj[]"/>
                                    </div>
                                </div>
                            </div>
                            </div>
                            <div class="form-line clearfix">
                                <div class="resume-table-trsix fr">
                                    <input class="resume-table-inp" type="submit" value="保存"/>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <!--技能特长-->
                <div class="base-mess-lists">
                    <div class="resume-table-title">
                        <div class="table-title-div fl">技能特长</div>
                        <div class="resume-table-operate fr">
                            <a class="new-add" href="javascript:;" id="jntc_xz"><img src="/img/add.png"/>新增</a>
                            <a href="javascript:;"  style="display: none" id="edit_jntc"><img src="/img/xiugai.png"/>修改</a>
                        </div>
                    </div>
                    <div class="resume-table-content" id="add_jntc">
                        <form onsubmit="return ck_jladd6(this)" id="add_jntc_form">
                            {{ csrf_field() }}
                            <div id="add_jntc_div">
                                <div class="form-line clearfix">
                                    <div class="form-line-left fl">
                                        <span class="resume-table-trone"><b>*</b>技能/语言：</span>
                                        <div class="resume-table-trtwo">
                                            <div class="my-joinjob-year">
                                                <select name="jnyy[]">
                                                    <option value="外语">外语</option>
                                                    <option value="编程">编程</option>
                                                </select>
                                                <span></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-line clearfix">
                                    <div class="resume-table-treight fr">
                                        <div class="my-default">
                                            <span>自定义</span>
                                            <input type="text" class="my-default-inp" name="zdy[]">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-line clearfix">
                                    <div class="form-line-left fl">
                                        <span class="resume-table-trone"><b>*</b>掌握程度：</span>
                                        <div class="resume-table-trseven" colspan="3">
                                            <input type="text" class="resume-company-name"   name="zwcd[]"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-line clearfix">
                                <div class="resume-table-trsix fr">
                                    <input class="resume-table-inp" type="submit" value="保存"/>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <!--培训经历-->
                <div class="base-mess-lists">
                    <div class="resume-table-title">
                        <div class="table-title-div fl">培训经历</div>
                        <div class="resume-table-operate fr">
                            <a class="new-add" href="javascript:;" id="pxjl_xz"><img src="/img/add.png"/>新增</a>
                            <a href="javascript:;"  style="display: none" id="edit_pxjl"><img src="/img/xiugai.png"/>修改</a>
                        </div>
                    </div>
                    <div class="resume-table-content" id="add_pxjl">
                        <form onsubmit="return ck_jladd7(this)" id="add_pxjl_form">
                            {{ csrf_field() }}
                            <div id="add_pxjl_div">
                                <div class="form-line clearfix">
                                    <div class="form-line-left fl">
                                        <span class="resume-table-trone"><b>*</b>时间：</span>
                                        <div class="resume-table-trtwo">
                                            <input class="resume-table-inp" type="text" name="sj[]"/>
                                        </div>
                                    </div>
                                    <div class="form-line-right fr">
                                        <span class="resume-table-trone"><b>*</b>培训课程：</span>
                                        <div class="resume-table-trtwo">
                                            <input class="resume-table-inp" type="text"  name="kc[]"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-line clearfix">
                                    <div class="form-line-left fl">
                                        <span class="resume-table-trone"><b>*</b>培训机构：</span>
                                        <div class="resume-table-trtwo">
                                            <input class="resume-table-inp" type="text"  name="jg[]"/>
                                        </div>
                                    </div>
                                    <div class="form-line-right fr">
                                        <span class="resume-table-trone">培训地点：</span>
                                        <div class="resume-table-trtwo">
                                            <input class="resume-table-inp" type="text"  name="dd[]"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-line clearfix">
                                    <span class="resume-table-trone">获得证书：</span>
                                    <div class="resume-table-trseven">
                                        <div class="my-joinjob-textar">
                                            <textarea  name="zs[]"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-line clearfix">
                                    <span class="resume-table-trone">详细描述：</span>
                                    <div class="resume-table-trseven">
                                        <div class="my-joinjob-textar">
                                            <textarea  name="ms[]"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-line clearfix">
                                <div class="resume-table-trsix fr">
                                    <input class="resume-table-inp" type="submit" value="保存"/>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>


                <!--证书-->
                <div class="base-mess-lists">
                    <div class="resume-table-title">
                        <div class="table-title-div fl">证书</div>
                        <div class="resume-table-operate fr">
                            <a class="new-add" href="javascript:;" id="zs_xz"><img src="/img/add.png"/>新增</a>
                            <a href="javascript:;"  style="display: none" id="edit_zs"><img src="/img/xiugai.png"/>修改</a>
                        </div>
                    </div>
                    <div class="resume-table-content" id="add_zs">
                        <form onsubmit="return ck_jladd8(this)" id="add_zs_form">
                            {{ csrf_field() }}
                            <div id="add_zs_div">
                                <div class="form-line clearfix">
                                    <div class="form-line-left fl">
                                        <span class="resume-table-trone"><b>*</b>培训课程：</span>
                                        <div class="resume-table-trtwo">
                                            <input class="resume-table-inp" type="text" name="kc[]"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-line clearfix">
                                    <div class="resume-table-treight fr">
                                        <div class="my-default">
                                            <span>自定义</span>
                                            <input type="text" class="my-default-inp" name="zdy[]">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-line clearfix">
                                <div class="form-line-left fl">
                                    <span class="resume-table-trone"><b>*</b>获得时间：</span>
                                    <div class="resume-table-trtwo">
                                        <input class="resume-table-inp" type="text" name="sj[]"/>
                                    </div>
                                </div>
                            </div>
                            </div>
                            <div class="form-line clearfix">
                                <div class="resume-table-trsix fr">
                                    <input class="resume-table-inp" type="submit" value="保存"/>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!--其他信息-->
                <div class="base-mess-lists">
                    <div class="resume-table-title">
                        <div class="table-title-div fl">其他信息</div>
                        <div class="resume-table-operate fr">
                            {{--<a class="new-add" href="javascript:;"><img src="/img/add.png"/>新增</a>--}}
                            <a href="javascript:;"  style="display: none" id="edit_qt"><img src="/img/xiugai.png"/>修改</a>
                        </div>
                    </div>
                    <div class="resume-table-content" id="add_qt">
                        <form onsubmit="return ck_jladd9(this)" id="add_zs_form">
                            {{ csrf_field() }}
                            <div class="form-line clearfix">
                                <div class="form-line-left fl">
                                    <span class="resume-table-trone">兴趣爱好：</span>
                                    <div class="resume-table-trtwo">
                                        <input class="resume-table-inp" type="text" name="xqah"/>
                                    </div>
                                </div>
                                <div class="form-line-right fr">
                                    <span class="resume-table-trone">宗教信仰：</span>
                                    <div class="resume-table-trtwo">
                                        <input class="resume-table-inp" type="text" name="zjxy"/>
                                    </div>
                                </div>
                            </div>
                            <div class="form-line clearfix">
                                <div class="form-line-left fl">
                                    <span class="resume-table-trone">获得荣誉：</span>
                                    <div class="resume-table-trtwo">
                                        <input class="resume-table-inp" type="text"  name="hdry"/>
                                    </div>
                                </div>
                                <div class="form-line-right fr">
                                    <span class="resume-table-trone">特长职业目标：</span>
                                    <div class="resume-table-trtwo">
                                        <input class="resume-table-inp" type="text"  name="zymb"/>
                                    </div>
                                </div>
                            </div>
                            <div class="form-line clearfix">
                                <div class="form-line-left fl">
                                    <span class="resume-table-trone">专业组织：</span>
                                    <div class="resume-table-trtwo">
                                        <input class="resume-table-inp" type="text"  name="zyzz"/>
                                    </div>
                                </div>
                                <div class="form-line-right fr">
                                    <span class="resume-table-trone">特殊技能：</span>
                                    <div class="resume-table-trtwo">
                                        <input class="resume-table-inp" type="text"  name="tsjn"/>
                                    </div>
                                </div>
                            </div>
                            <div class="form-line clearfix">
                                <div class="form-line-left fl">
                                    <span class="resume-table-trone">著作/论文：</span>
                                    <div class="resume-table-trtwo">
                                        <input class="resume-table-inp" type="text" name="zzlw"/>
                                    </div>
                                </div>
                                <div class="form-line-right fr">
                                    <span class="resume-table-trone">社会活动：</span>
                                    <div class="resume-table-trtwo">
                                        <input class="resume-table-inp" type="text" name="shhd"/>
                                    </div>
                                </div>
                            </div>
                            <div class="form-line clearfix">
                                <div class="form-line-left fl">
                                    <span class="resume-table-trone">专利：</span>
                                    <div class="resume-table-trtwo">
                                        <input class="resume-table-inp" type="text" name="zl"/>
                                    </div>
                                </div>
                                <div class="form-line-right fr">
                                    <span class="resume-table-trone">荣誉：</span>
                                    <div class="resume-table-trtwo">
                                        <input class="resume-table-inp" type="text" name="ry"/>
                                    </div>
                                </div>
                            </div>
                            <div class="form-line clearfix">
                                <span class="resume-table-trone">其他：</span>
                                <div class="my-joinjob-textar">
                                    <textarea  name="qt"></textarea>
                                </div>
                            </div>
                            <div class="form-line clearfix">
                                <div class="resume-table-trsix fr">
                                    <input class="resume-table-inp" type="submit" value="保存"/>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!--项目经验-->
                <div class="base-mess-lists">
                    <div class="resume-table-title">
                        <div class="table-title-div fl">项目经验</div>
                        <div class="resume-table-operate fr">
                            <a class="new-add" href="javascript:;" id="xmjy_xz"><img src="/img/add.png"/>新增</a>
                            <a href="javascript:;"  style="display: none" id="edit_xmjy"><img src="/img/xiugai.png"/>修改</a>
                        </div>
                    </div>
                    <div class="resume-table-content" id="add_xmjy">
                        <form onsubmit="return ck_jladd10(this)" id="add_xmjy_form">
                            {{ csrf_field() }}
                            <div id="add_xmjy_div">
                                <div class="form-line clearfix">
                                    <div class="form-line-left fl">
                                        <span class="resume-table-trone"><b>*</b>项目名称：</span>
                                        <div class="resume-table-trtwo">
                                            <input class="resume-table-inp" type="text" name="xmmc[]"/>
                                        </div>
                                    </div>
                                    <div class="form-line-right fr">
                                        <span class="resume-table-trone"><b>*</b>时间：</span>
                                        <div class="resume-table-trtwo">
                                            <input class="resume-table-inp" type="text" name="sj[]"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-line clearfix">
                                    <span class="resume-table-trone"><b>*</b>项目描述：</span>
                                    <div class="resume-table-trseven">
                                        <div class="my-joinjob-textar">
                                            <textarea  name="xmms[]"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-line clearfix">
                                    <span class="resume-table-trone">责任描述：</span>
                                    <div class="resume-table-trseven">
                                        <div class="my-joinjob-textar">
                                            <textarea  name="zrms[]"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-line clearfix">
                                <div class="resume-table-trsix fr">
                                    <input class="resume-table-inp" type="submit" value="保存"/>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <!--附加信息-->
                <div class="base-mess-lists">
                    <div class="resume-table-title">
                        <div class="table-title-div fl">附加信息<span>（填写更加分，提高竞争力）</span></div>
                    </div>
                    <div class="resume-table-content">
                        {{--<div class="add-other-mess">--}}
                            {{--<a href="javascript:;"><img src="/img/tianjia.png"/>项目经验</a>--}}
                            {{--<a href="javascript:;"><img src="/img/tianjia.png"/>在校情况</a>--}}
                            {{--<a href="javascript:;"><img src="/img/tianjia.png"/>技能特长</a>--}}
                            {{--<a href="javascript:;"><img src="/img/tianjia.png"/>附件信息</a>--}}
                        {{--</div>--}}
                        <div class="save-resume"><input type="submit" value="简历完成"  id="add_wc"/></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        var id=0;
    </script>
    @show
@stop

@section('scripts')
    @parent
    <script src="/js/ckform.js" type="text/javascript"></script>
@stop
