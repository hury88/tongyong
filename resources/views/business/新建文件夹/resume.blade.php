@extends('business.layouts.public')
@section('inbox')
    <div class="resume-inbox">
        <div class="order-manager-header clearfix">
            <div class="manager-heaer-left fl">
                <ul>
                    <li class="order-manager-select">应聘简历（6）</li>
                    <li>邀请简历（2）</li>
                </ul>
            </div>
            <div class="manager-header-right fr">
                <form>
                    <div class="order-search">
                        <select name="order-lists">
                            <option value="按到账时间">按到账时间</option>
                            <option value="按到账时间">按下单时间</option>
                            <option value="按到账时间">按收货时间</option>
                        </select>
                        <input class="order-manager-inp" type="text" placeholder="输入订单编号"/>
                        <input class="order-manager-sub" type="button" value="搜索结果">
                    </div>
                </form>
            </div>
        </div>
        <div class="order-manager-content">
            <form>
                <table width="101%" cellpadding="0" cellspacing="0">
                    <tr class="manager-firsttr">
                        <th class="manager-firstth">
                            <label><input name="orderselect" type="checkbox"/>全选</label>
                        </th>
                        <th class="resume-employ-secondth">求职者</th>
                        <th class="resume-employ-thirdth">求职意向</th>
                        <th class="resume-employ-fourth">性别</th>
                        <th class="resume-employ-fiveth">学历</th>
                        <th class="resume-employ-sixth">工作经验</th>
                        <th class="resume-employ-seventh">期望月薪</th>
                        <th class="resume-employ-eigth">招聘类别</th>
                        <th class="resume-employ-nineth">反馈状态</th>
                        <th class="resume-employ-eleventh">收件时间</th>
                        <th class="resume-employ-twenth">操作</th>
                    </tr>
                    <tr>
                        <td class="manager-firstth">
                            <label><input name="orderselect" type="checkbox"/></label>
                        </td>
                        <td>张三</td>
                        <td>网页制作，程序编辑</td>
                        <td>男</td>
                        <td>本科</td>
                        <td>3年以上</td>
                        <td>3000-5000元</td>
                        <td>高新招聘</td>
                        <td>未查看</td>
                        <td>2017-06-29</td>
                        <td>
                            <a class="resume-check color-trblue" href="javascript:;">查看</a>
                            <a class="resume-download color-trblue" href="javascript:;">下载</a>
                            <a class="resume-delete color-trblue" href="javascript:;">删除</a>
                        </td>
                    </tr>
                    <tr>
                        <td class="manager-firstth">
                            <label><input name="orderselect" type="checkbox"/></label>
                        </td>
                        <td>张三</td>
                        <td>网页制作，程序编辑</td>
                        <td>男</td>
                        <td>本科</td>
                        <td>3年以上</td>
                        <td>3000-5000元</td>
                        <td>高新招聘</td>
                        <td>未查看</td>
                        <td>2017-06-29</td>
                        <td>
                            <a class="resume-check color-trblue" href="javascript:;">查看</a>
                            <a class="resume-download color-trblue" href="javascript:;">下载</a>
                            <a class="resume-delete color-trblue" href="javascript:;">删除</a>
                        </td>
                    </tr>
                    <tr>
                        <td class="manager-firstth">
                            <label><input name="orderselect" type="checkbox"/></label>
                        </td>
                        <td>张三</td>
                        <td>网页制作，程序编辑</td>
                        <td>男</td>
                        <td>本科</td>
                        <td>3年以上</td>
                        <td>3000-5000元</td>
                        <td>高新招聘</td>
                        <td>未查看</td>
                        <td>2017-06-29</td>
                        <td>
                            <a class="resume-check color-trblue" href="javascript:;">查看</a>
                            <a class="resume-download color-trblue" href="javascript:;">下载</a>
                            <a class="resume-delete color-trblue" href="javascript:;">删除</a>
                        </td>
                    </tr>
                    <tr>
                        <td class="manager-firstth">
                            <label><input name="orderselect" type="checkbox"/></label>
                        </td>
                        <td>张三</td>
                        <td>网页制作，程序编辑</td>
                        <td>男</td>
                        <td>本科</td>
                        <td>3年以上</td>
                        <td>3000-5000元</td>
                        <td>高新招聘</td>
                        <td>未查看</td>
                        <td>2017-06-29</td>
                        <td>
                            <a class="resume-check color-trblue" href="javascript:;">查看</a>
                            <a class="resume-download color-trblue" href="javascript:;">下载</a>
                            <a class="resume-delete color-trblue" href="javascript:;">删除</a>
                        </td>
                    </tr>
                    <tr>
                        <td class="manager-firstth">
                            <label><input name="orderselect" type="checkbox"/></label>
                        </td>
                        <td>张三</td>
                        <td>网页制作，程序编辑</td>
                        <td>男</td>
                        <td>本科</td>
                        <td>3年以上</td>
                        <td>3000-5000元</td>
                        <td>高新招聘</td>
                        <td>未查看</td>
                        <td>2017-06-29</td>
                        <td>
                            <a class="resume-check color-trblue" href="javascript:;">查看</a>
                            <a class="resume-download color-trblue" href="javascript:;">下载</a>
                            <a class="resume-delete color-trblue" href="javascript:;">删除</a>
                        </td>
                    </tr>
                    <tr>
                        <td class="manager-firstth">
                            <label><input name="orderselect" type="checkbox"/></label>
                        </td>
                        <td>张三</td>
                        <td>网页制作，程序编辑</td>
                        <td>男</td>
                        <td>本科</td>
                        <td>3年以上</td>
                        <td>3000-5000元</td>
                        <td>高新招聘</td>
                        <td>未查看</td>
                        <td>2017-06-29</td>
                        <td>
                            <a class="resume-check color-trblue" href="javascript:;">查看</a>
                            <a class="resume-download color-trblue" href="javascript:;">下载</a>
                            <a class="resume-delete color-trblue" href="javascript:;">删除</a>
                        </td>
                    </tr>
                </table>
                <div class="manager-lasttr clearfix">
                    <div class="manager-firstth">
                        <label><input name="orderselect" type="checkbox"/>全选</label>
                    </div>
                    <div class="manager-deletetd">
                        <a href="javascript:;" class="batchs-delete"><img src="img/dele.png"/>批量删除</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop