@extends('business.layouts.public')
@section('inbox')
    <div class="order-manager">
        <div class="order-manager-header clearfix">
            <div class="manager-header-right fr">
                <form>
                    <div class="order-search">
                        <select name="order-lists">
                            <option value="按更新时间">按更新时间</option>
                            <option value="按更新时间">按更新时间</option>
                            <option value="按更新时间">按更新时间</option>
                        </select>
                        <input class="order-manager-inp" type="text" placeholder="输入培训课程名称"/>
                        <input class="order-manager-sub" type="button" value="搜索结果">
                        <input class="newlesson-but" type="button" value="发布新课程">
                    </div>
                </form>
            </div>
        </div>
        <div class="order-manager-content">
            <form>
                <table>
                    <tr class="manager-firsttr">
                        <th class="manager-firstth">
                            <label><input name="orderselect" type="checkbox"/>全选</label>
                        </th>
                        <th class="train-trone">类别</th>
                        <th class="train-trtwo">课程名称</th>
                        <th class="train-trthree">课节</th>
                        <th>价格</th>
                        <th>报名人数</th>
                        <th>更新时间</th>
                        <th class="manager-last">操作</th>
                    </tr>
                    <tr>
                        <td class="manager-firstth">
                            <label><input name="orderselect" type="checkbox"/></label>
                        </td>
                        <td>视频培训</td>
                        <td class="manager-fourtd">
                            <img class="order-mess-img" src="/img/brand-img.png"/>
                            <div class="order-name">
                                <p>2017联想集团《技能培训》视频教程</p>
                                <span>在线支付</span>
                            </div>
                        </td>
                        <td>20</td>
                        <td>￥29.00</td>
                        <td class="trcolor-red">1234人</td>
                        <td>2017-08-24</td>
                        <td>
                            <a class="resume-remove color-trblue" href="javascript:;">修改</a>
                            <a class="resume-delete color-trblue" href="javascript:;">删除</a>
                        </td>
                    </tr>
                    <tr>
                        <td class="manager-firstth">
                            <label><input name="orderselect" type="checkbox"/></label>
                        </td>
                        <td>视频培训</td>
                        <td class="manager-fourtd">
                            <img class="order-mess-img" src="/img/brand-img.png"/>
                            <div class="order-name">
                                <p>2017联想集团《技能培训》视频教程</p>
                                <span>在线支付</span>
                            </div>
                        </td>
                        <td>20</td>
                        <td>￥29.00</td>
                        <td class="trcolor-red">1234人</td>
                        <td>2017-08-24</td>
                        <td>
                            <a class="resume-remove color-trblue" href="javascript:;">修改</a>
                            <a class="resume-delete color-trblue" href="javascript:;">删除</a>
                        </td>
                    </tr>
                    <tr>
                        <td class="manager-firstth">
                            <label><input name="orderselect" type="checkbox"/></label>
                        </td>
                        <td>视频培训</td>
                        <td class="manager-fourtd">
                            <img class="order-mess-img" src="/img/brand-img.png"/>
                            <div class="order-name">
                                <p>2017联想集团《技能培训》视频教程</p>
                                <span>在线支付</span>
                            </div>
                        </td>
                        <td>20</td>
                        <td>￥29.00</td>
                        <td class="trcolor-red">1234人</td>
                        <td>2017-08-24</td>
                        <td>
                            <a class="resume-remove color-trblue" href="javascript:;">修改</a>
                            <a class="resume-delete color-trblue" href="javascript:;">删除</a>
                        </td>
                    </tr>
                    <tr>
                        <td class="manager-firstth">
                            <label><input name="orderselect" type="checkbox"/></label>
                        </td>
                        <td>视频培训</td>
                        <td class="manager-fourtd">
                            <img class="order-mess-img" src="/img/brand-img.png"/>
                            <div class="order-name">
                                <p>2017联想集团《技能培训》视频教程</p>
                                <span>在线支付</span>
                            </div>
                        </td>
                        <td>20</td>
                        <td>￥29.00</td>
                        <td class="trcolor-red">1234人</td>
                        <td>2017-08-24</td>
                        <td>
                            <a class="resume-remove color-trblue" href="javascript:;">修改</a>
                            <a class="resume-delete color-trblue" href="javascript:;">删除</a>
                        </td>
                    </tr>
                    <tr>
                        <td class="manager-firstth">
                            <label><input name="orderselect" type="checkbox"/></label>
                        </td>
                        <td>视频培训</td>
                        <td class="manager-fourtd">
                            <img class="order-mess-img" src="/img/brand-img.png"/>
                            <div class="order-name">
                                <p>2017联想集团《技能培训》视频教程</p>
                                <span>在线支付</span>
                            </div>
                        </td>
                        <td>20</td>
                        <td>￥29.00</td>
                        <td class="trcolor-red">1234人</td>
                        <td>2017-08-24</td>
                        <td>
                            <a class="resume-remove color-trblue" href="javascript:;">修改</a>
                            <a class="resume-delete color-trblue" href="javascript:;">删除</a>
                        </td>
                    </tr>
                    <tr>
                        <td class="manager-firstth">
                            <label><input name="orderselect" type="checkbox"/></label>
                        </td>
                        <td>视频培训</td>
                        <td class="manager-fourtd">
                            <img class="order-mess-img" src="/img/brand-img.png"/>
                            <div class="order-name">
                                <p>2017联想集团《技能培训》视频教程</p>
                                <span>在线支付</span>
                            </div>
                        </td>
                        <td>20</td>
                        <td>￥29.00</td>
                        <td class="trcolor-red">1234人</td>
                        <td>2017-08-24</td>
                        <td>
                            <a class="resume-remove color-trblue" href="javascript:;">修改</a>
                            <a class="resume-delete color-trblue" href="javascript:;">删除</a>
                        </td>
                    </tr>
                    <tr>
                        <td class="manager-firstth">
                            <label><input name="orderselect" type="checkbox"/></label>
                        </td>
                        <td>视频培训</td>
                        <td class="manager-fourtd">
                            <img class="order-mess-img" src="/img/brand-img.png"/>
                            <div class="order-name">
                                <p>2017联想集团《技能培训》视频教程</p>
                                <span>在线支付</span>
                            </div>
                        </td>
                        <td>20</td>
                        <td>￥29.00</td>
                        <td class="trcolor-red">1234人</td>
                        <td>2017-08-24</td>
                        <td>
                            <a class="resume-remove color-trblue" href="javascript:;">修改</a>
                            <a class="resume-delete color-trblue" href="javascript:;">删除</a>
                        </td>
                    </tr>
                    <tr>
                        <td class="manager-firstth">
                            <label><input name="orderselect" type="checkbox"/></label>
                        </td>
                        <td>视频培训</td>
                        <td class="manager-fourtd">
                            <img class="order-mess-img" src="/img/brand-img.png"/>
                            <div class="order-name">
                                <p>2017联想集团《技能培训》视频教程</p>
                                <span>在线支付</span>
                            </div>
                        </td>
                        <td>20</td>
                        <td>￥29.00</td>
                        <td class="trcolor-red">1234人</td>
                        <td>2017-08-24</td>
                        <td>
                            <a class="resume-remove color-trblue" href="javascript:;">修改</a>
                            <a class="resume-delete color-trblue" href="javascript:;">删除</a>
                        </td>
                    </tr>
                </table>
                <div class="manager-lasttr clearfix">
                    <div class="manager-firstth">
                        <label><input name="orderselect" type="checkbox"/>全选</label>
                    </div>
                    <div class="manager-deletetd">
                        <a href="javascript:;" class="batchs-delete"><img src="/img/dele.png"/>批量删除</a>
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
                            <a href="javascript:;" class="scrip-a"><img src="/img/zhizhen.jpg"></a>
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
@stop