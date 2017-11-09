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

    <div class="wrap-box examine-location">
        <h2>
            <span>所在位置：</span>
            <a href="/">首页</a>
            <span> > </span>
            <a href=“{{u('person','order')}}>订单中心</a>
            <span> > </span>
            <a href="{{u('person','order','bmbzypx')}}">职业证书报名表</a>
            <span> > </span>
            <a href="javascript:javascript:void(0);">考研信息报名表查看</a>
        </h2>
    </div>
    <div class="wrap-box examine-show">
        <table width="100%">
            <tr class="examine-show-title">
                <td colspan="6">
                    中国职业培训网某某考研信息报名表
                </td>
            </tr>
            <tr class="examine-show-special">
                <td colspan="6">
                    1、基本信息（必填）
                </td>
            </tr>
            <tr>
                <td class="bg-gray">姓名</td>
                <td colspan="2">刘志远</td>
                <td class="bg-gray">性别</td>
                <td colspan="2">
                    <span class="input-checked"><i></i>男</span>
                    <span><i></i>女</span>
                </td>
            </tr>
            <tr>
                <td class="bg-gray">出生年月</td>
                <td colspan="2">1997-08-29</td>
                <td class="bg-gray">民族</td>
                <td colspan="2">
                    汉
                </td>
            </tr>
            <tr>
                <td class="bg-gray">身份证号码</td>
                <td colspan="2">130703199708290523</td>
                <td class="bg-gray">健康情况</td>
                <td colspan="2">
                    健康
                </td>
            </tr>
            <tr>
                <td class="bg-gray">英语水平</td>
                <td colspan="2">八级</td>
                <td class="bg-gray">电话号码</td>
                <td colspan="2">
                    0311-86525114
                </td>
            </tr>
            <tr>
                <td class="bg-gray">邮箱</td>
                <td colspan="2">liuzhiyuan@163.com</td>
                <td class="bg-gray">通讯地址</td>
                <td colspan="2">
                    石家庄新华大街168号
                </td>
            </tr>
            <tr>
                <td class="bg-gray">邮政编码</td>
                <td colspan="2">075511</td>
                <td class="bg-gray">护照号码</td>
                <td colspan="2">
                    130703199708290523
                </td>
            </tr>
            <tr>
                <td class="bg-gray">毕业院校</td>
                <td colspan="2">河北工业大学</td>
                <td class="bg-gray">所学专业</td>
                <td colspan="2">
                    计算机安全管理
                </td>
            </tr>
            <tr>
                <td class="bg-gray">所报培训名称</td>
                <td colspan="2">人工智能与大数据</td>
                <td class="bg-gray">所报机构名称</td>
                <td colspan="2">
                    北京通用领航教育
                </td>
            </tr>
            <tr>
                <td class="bg-gray">所报证书名称</td>
                <td colspan="2">计算机编程</td>
                <td class="bg-gray">所报机构名称</td>
                <td colspan="2">
                    北京戴尔计算机语言学校
                </td>
            </tr>
            <tr class="examine-show-special">
                <td colspan="6">
                    2、核心信息（必填）
                </td>
            </tr>
            <tr>
                <td class="bg-gray">所报院校名称</td>
                <td>北京理工大学</td>
                <td class="bg-gray">所报专业</td>
                <td>
                    计算机系统管理
                </td>
                <td class="bg-gray">
                    所报机构名称
                </td>
                <td>
                </td>
            </tr>
            <tr>
                <td class="bg-gray" rowspan="3">工作经历</td>
                <td class="bg-gray" colspan="2">工作单位</td>
                <td class="bg-gray">工作时间</td>
                <td class="bg-gray" colspan="2">联系电话</td>
            </tr>
            <tr>
                <td class="text-center" colspan="2">北京华昊联合</td>
                <td class="text-center">2016年9月-2017年2月</td>
                <td colspan="2"></td>
            </tr>
            <tr>
                <td colspan="2"></td>
                <td></td>
                <td colspan="2"></td>
            </tr>
            <tr>
                <td  class="bg-gray" rowspan="3">家庭情况</td>
                <td class="bg-gray" colspan="2">姓名</td>
                <td class="bg-gray" >成员关系</td>
                <td class="bg-gray">工作单位</td>
                <td class="bg-gray">联系电话</td>
            </tr>
            <tr>
                <td class="text-center" colspan="2">刘东海</td>
                <td class="text-center">父亲</td>
                <td class="text-center">石家庄电影院</td>
                <td class="text-center">0311-63656520</td>
            </tr>
            <tr>
                <td  class="text-center" colspan="2">李海霞</td>
                <td class="text-center">母亲</td>
                <td class="text-center">石家庄电影院</td>
                <td class="text-center">0311-63656520</td>
            </tr>
            <tr>
                <td  class="bg-gray" rowspan="5">本人简历</td>
                <td class="bg-gray" colspan="2">就读学校</td>
                <td class="bg-gray">就读时间</td>
                <td class="bg-gray">毕业时间</td>
                <td class="bg-gray">所学专业</td>
            </tr>
            <tr>
                <td class="text-center" colspan="2">石家庄第一中学</td>
                <td  class="text-center">2009年9月</td>
                <td  class="text-center">2011年12月</td>
                <td  class="text-center"></td>
            </tr>
            <tr>
                <td class="text-center" colspan="2"></td>
                <td class="text-center"></td>
                <td class="text-center"></td>
                <td class="text-center"></td>
            </tr>
            <tr>
                <td class="text-center" colspan="2"></td>
                <td class="text-center"></td>
                <td class="text-center"></td>
                <td class="text-center"></td>
            </tr>
            <tr>
                <td class="text-center" colspan="2"></td>
                <td class="text-center"></td>
                <td class="text-center"></td>
                <td class="text-center"></td>
            </tr>
            <tr>
                <td class="bg-gray" rowspan="3">个人情况简历</td>
                <td colspan="5">
                    <p class="small-tit">1、个人能力及特长、爱好介绍；</p>
                    <p class="intro-txt">本人性格开朗，乐观大方。具有很强的适应能力；</p>
                </td>
            </tr>
            <tr>
                <td colspan="5">
                    <p class="small-tit">2、个人能力及特长、爱好介绍；</p>
                    <p class="intro-txt">本人性格开朗，乐观大方。具有很强的适应能力；</p>
                </td>
            </tr>
            <tr>
                <td colspan="5">
                    <p class="small-tit">3、个人能力及特长、爱好介绍；</p>
                    <p class="intro-txt">本人性格开朗，乐观大方。具有很强的适应能力；</p>
                </td>
            </tr>
            <tr class="examine-show-special">
                <td colspan="6">
                    3、其他信息（选填）
                </td>
            </tr>
            <tr>
                <td class="bg-gray">备注</td>
                <td colspan="5">
                </td>
            </tr>
        </table>
        <div class="print">
            <a href="javascript:;">打印</a>
            <a href="javascript:;">下载</a>
        </div>
    </div>
@show
@stop
