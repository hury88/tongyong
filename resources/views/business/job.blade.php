@extends('business.layouts.master')

@section('title') 招聘 @parent @stop

@section('main')
<div class="safety-setting-content">
    <h2 class="member-pager-title">招聘</h2>
    <div class="member-pager-location">
        <i class="icon-index1"></i>
        <span>我的位置：</span>
        <a href="javascript:;">招聘</a>
        <span> > </span>
        <a href="javascript:;">高端招聘</a>
    </div>
    <div class="safety-content-box">
        <h3>高端招聘</h3>
        <div class="resume-inbox">
            <div class="order-manager-header clearfix">
                <div class="manager-heaer-left fl">
                    <ul>
                        <li>招聘中（20）</li>
                        <li>已结束（10）</li>
                        <li class="order-manager-select">未发布（0）</li>
                    </ul>
                </div>
                <div class="manager-header-right fr">
                    <form>
                        <div class="order-search">
                            <select name="order-lists">
                                <option value="按到账时间">按更新时间</option>
                                <option value="按到账时间">按入职名称</option>
                                <option value="按到账时间">按公司名称</option>
                            </select>
                            <input class="order-manager-inp" type="text" placeholder="输入职位名称"/>
                            <input class="order-manager-sub" type="button" value="搜索结果">
                            <input class="order-manager-release" type="button" value="发布新职位">
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
                            <th class="resume-employ-secondth">职位名称</th>
                            <th class="resume-employ-thirdth">所属行业</th>
                            <th class="resume-employ-fourth">更新日期</th>
                            <th class="resume-employ-fiveth">招聘地点</th>
                            <th class="resume-employ-sixth">招聘状态</th>
                            <th class="resume-employ-seventh">投递简历</th>
                            <th class="resume-employ-eigth">邀请简历</th>
                            <th class="resume-employ-nineth">浏览数</th>
                            <th class="resume-employ-eleventh">操作</th>
                        </tr>
                        <tr>
                            <td class="manager-firstth">
                                <label><input name="orderselect" type="checkbox"/></label>
                            </td>
                            <td class="color-trblue">网页制作，程序编辑</td>
                            <td>互联网·游戏·软件</td>
                            <td>2017-06-29</td>
                            <td>合肥</td>
                            <td>已结束</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>
                                <a class="resume-remove color-trblue" href="javascript:;">修改</a>
                                <a class="resume-delete color-trblue" href="javascript:;">删除</a>
                                <a class="resume-online color-trblue" href="javascript:;">上线</a>
                            </td>
                        </tr>
                        <tr>
                            <td class="manager-firstth">
                                <label><input name="orderselect" type="checkbox"/></label>
                            </td>
                            <td class="color-trblue">网页制作，程序编辑</td>
                            <td>互联网·游戏·软件</td>
                            <td>2017-06-29</td>
                            <td>合肥</td>
                            <td>已结束</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>
                                <a class="resume-remove color-trblue" href="javascript:;">修改</a>
                                <a class="resume-delete color-trblue" href="javascript:;">删除</a>
                                <a class="resume-online color-trblue" href="javascript:;">上线</a>
                            </td>
                        </tr>
                        <tr>
                            <td class="manager-firstth">
                                <label><input name="orderselect" type="checkbox"/></label>
                            </td>
                            <td class="color-trblue">网页制作，程序编辑</td>
                            <td>互联网·游戏·软件</td>
                            <td>2017-06-29</td>
                            <td>合肥</td>
                            <td>已结束</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>
                                <a class="resume-remove color-trblue" href="javascript:;">修改</a>
                                <a class="resume-delete color-trblue" href="javascript:;">删除</a>
                                <a class="resume-online color-trblue" href="javascript:;">上线</a>
                            </td>
                        </tr>
                        <tr>
                            <td class="manager-firstth">
                                <label><input name="orderselect" type="checkbox"/></label>
                            </td>
                            <td class="color-trblue">网页制作，程序编辑</td>
                            <td>互联网·游戏·软件</td>
                            <td>2017-06-29</td>
                            <td>合肥</td>
                            <td>已结束</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>
                                <a class="resume-remove color-trblue" href="javascript:;">修改</a>
                                <a class="resume-delete color-trblue" href="javascript:;">删除</a>
                                <a class="resume-online color-trblue" href="javascript:;">上线</a>
                            </td>
                        </tr>
                        <tr>
                            <td class="manager-firstth">
                                <label><input name="orderselect" type="checkbox"/></label>
                            </td>
                            <td class="color-trblue">网页制作，程序编辑</td>
                            <td>互联网·游戏·软件</td>
                            <td>2017-06-29</td>
                            <td>合肥</td>
                            <td>已结束</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>
                                <a class="resume-remove color-trblue" href="javascript:;">修改</a>
                                <a class="resume-delete color-trblue" href="javascript:;">删除</a>
                                <a class="resume-online color-trblue" href="javascript:;">上线</a>
                            </td>
                        </tr>
                        <tr>
                            <td class="manager-firstth">
                                <label><input name="orderselect" type="checkbox"/></label>
                            </td>
                            <td class="color-trblue">网页制作，程序编辑</td>
                            <td>互联网·游戏·软件</td>
                            <td>2017-06-29</td>
                            <td>合肥</td>
                            <td>已结束</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>
                                <a class="resume-remove color-trblue" href="javascript:;">修改</a>
                                <a class="resume-delete color-trblue" href="javascript:;">删除</a>
                                <a class="resume-online color-trblue" href="javascript:;">上线</a>
                            </td>
                        </tr>
                        <tr>
                            <td class="manager-firstth">
                                <label><input name="orderselect" type="checkbox"/></label>
                            </td>
                            <td class="color-trblue">网页制作，程序编辑</td>
                            <td>互联网·游戏·软件</td>
                            <td>2017-06-29</td>
                            <td>合肥</td>
                            <td>已结束</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>
                                <a class="resume-remove color-trblue" href="javascript:;">修改</a>
                                <a class="resume-delete color-trblue" href="javascript:;">删除</a>
                                <a class="resume-online color-trblue" href="javascript:;">上线</a>
                            </td>
                        </tr>
                        <tr>
                            <td class="manager-firstth">
                                <label><input name="orderselect" type="checkbox"/></label>
                            </td>
                            <td class="color-trblue">网页制作，程序编辑</td>
                            <td>互联网·游戏·软件</td>
                            <td>2017-06-29</td>
                            <td>合肥</td>
                            <td>已结束</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>
                                <a class="resume-remove color-trblue" href="javascript:;">修改</a>
                                <a class="resume-delete color-trblue" href="javascript:;">删除</a>
                                <a class="resume-online color-trblue" href="javascript:;">上线</a>
                            </td>
                        </tr>
                        <tr>
                            <td class="manager-firstth">
                                <label><input name="orderselect" type="checkbox"/></label>
                            </td>
                            <td class="color-trblue">网页制作，程序编辑</td>
                            <td>互联网·游戏·软件</td>
                            <td>2017-06-29</td>
                            <td>合肥</td>
                            <td>已结束</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>
                                <a class="resume-remove color-trblue" href="javascript:;">修改</a>
                                <a class="resume-delete color-trblue" href="javascript:;">删除</a>
                                <a class="resume-online color-trblue" href="javascript:;">上线</a>
                            </td>
                        </tr>
                        <tr>
                            <td class="manager-firstth">
                                <label><input name="orderselect" type="checkbox"/></label>
                            </td>
                            <td class="color-trblue">网页制作，程序编辑</td>
                            <td>互联网·游戏·软件</td>
                            <td>2017-06-29</td>
                            <td>合肥</td>
                            <td>已结束</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>
                                <a class="resume-remove color-trblue" href="javascript:;">修改</a>
                                <a class="resume-delete color-trblue" href="javascript:;">删除</a>
                                <a class="resume-online color-trblue" href="javascript:;">上线</a>
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
                        <div class="table-pager">
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
                </form>
            </div>
        </div>
    </div>
    @parent
</div>
</div>
@stop