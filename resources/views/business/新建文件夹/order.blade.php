@extends('business.layouts.public')
@section('inbox')
    <div class="order-manager">
        <div class="order-manager-header clearfix">
            <div class="manager-heaer-left fl">
                <ul>
                    <li class="order-manager-select">全部订单（12）</li>
                    <li>已收款订单（10）</li>
                    <li>未收款订单（2）</li>
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
                <table>
                    <tr class="manager-firsttr">
                        <th class="manager-firstth">
                            <label><input name="orderselect" type="checkbox"/>全选</label>
                        </th>
                        <th class="manager-secondth">订单编号</th>
                        <th class="manager-fiveth">用户</th>
                        <th class="manager-fourtd">培训课程</th>
                        <th>价格</th>
                        <th>到账时间</th>
                        <th>状态</th>
                        <th class="manager-last">操作</th>
                    </tr>
                    <tr>
                        <td class="manager-firstth">
                            <label><input name="orderselect" type="checkbox"/></label>
                        </td>
                        <td>123455656767</td>
                        <td>张三</td>
                        <td class="manager-fourtd">
                            <img class="order-mess-img" src="/img/brand-img.png"/>
                            <div class="order-name">
                                <p>2017联想集团《技能培训》视频教程</p>
                                <span>在线支付</span>
                            </div>
                        </td>
                        <td class="pro-price">￥29.00</td>
                        <td>2017-06-29</td>
                        <td>未提现</td>
                        <td><a class="go-withdraw" href="javascript:;">我要提现</a></td>
                    </tr>
                    <tr>
                        <td class="manager-firstth">
                            <label><input name="orderselect" type="checkbox"/></label>
                        </td>
                        <td>123455656767</td>
                        <td>张三</td>
                        <td class="manager-fourtd">
                            <img class="order-mess-img" src="/img/brand-img.png"/>
                            <div class="order-name">
                                <p>2017联想集团《技能培训》视频教程</p>
                                <span>在线支付</span>
                            </div>
                        </td>
                        <td class="pro-price">￥29.00</td>
                        <td>2017-06-29</td>
                        <td>未提现</td>
                        <td><a class="go-withdrawed" href="javascript:;">我要提现</a></td>
                    </tr>
                    <tr>
                        <td class="manager-firstth">
                            <label><input name="orderselect" type="checkbox"/></label>
                        </td>
                        <td>123455656767</td>
                        <td>张三</td>
                        <td class="manager-fourtd">
                            <img class="order-mess-img" src="/img/brand-img.png"/>
                            <div class="order-name">
                                <p>2017联想集团《技能培训》视频教程</p>
                                <span>在线支付</span>
                            </div>
                        </td>
                        <td class="pro-price">￥29.00</td>
                        <td>2017-06-29</td>
                        <td>未提现</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="manager-firstth">
                            <label><input name="orderselect" type="checkbox"/></label>
                        </td>
                        <td>123455656767</td>
                        <td>张三</td>
                        <td class="manager-fourtd">
                            <img class="order-mess-img" src="/img/brand-img.png"/>
                            <div class="order-name">
                                <p>2017联想集团《技能培训》视频教程</p>
                                <span>在线支付</span>
                            </div>
                        </td>
                        <td class="pro-price">￥29.00</td>
                        <td>2017-06-29</td>
                        <td>未提现</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="manager-firstth">
                            <label><input name="orderselect" type="checkbox"/></label>
                        </td>
                        <td>123455656767</td>
                        <td>张三</td>
                        <td class="manager-fourtd">
                            <img class="order-mess-img" src="/img/brand-img.png"/>
                            <div class="order-name">
                                <p>2017联想集团《技能培训》视频教程</p>
                                <span>在线支付</span>
                            </div>
                        </td>
                        <td class="pro-price">￥29.00</td>
                        <td>2017-06-29</td>
                        <td>未提现</td>
                        <td><a class="go-withdraw" href="javascript:;">我要提现</a></td>
                    </tr>
                    <tr>
                        <td class="manager-firstth">
                            <label><input name="orderselect" type="checkbox"/></label>
                        </td>
                        <td>123455656767</td>
                        <td>张三</td>
                        <td class="manager-fourtd">
                            <img class="order-mess-img" src="/img/brand-img.png"/>
                            <div class="order-name">
                                <p>2017联想集团《技能培训》视频教程</p>
                                <span>在线支付</span>
                            </div>
                        </td>
                        <td class="pro-price">￥29.00</td>
                        <td>2017-06-29</td>
                        <td>未提现</td>
                        <td><a class="go-withdrawed" href="javascript:;">我要提现</a></td>
                    </tr>
                    <tr>
                        <td class="manager-firstth">
                            <label><input name="orderselect" type="checkbox"/></label>
                        </td>
                        <td>123455656767</td>
                        <td>张三</td>
                        <td class="manager-fourtd">
                            <img class="order-mess-img" src="/img/brand-img.png"/>
                            <div class="order-name">
                                <p>2017联想集团《技能培训》视频教程</p>
                                <span>在线支付</span>
                            </div>
                        </td>
                        <td class="pro-price">￥29.00</td>
                        <td>2017-06-29</td>
                        <td>未提现</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="manager-firstth">
                            <label><input name="orderselect" type="checkbox"/></label>
                        </td>
                        <td>123455656767</td>
                        <td>张三</td>
                        <td class="manager-fourtd">
                            <img class="order-mess-img" src="/img/brand-img.png"/>
                            <div class="order-name">
                                <p>2017联想集团《技能培训》视频教程</p>
                                <span>在线支付</span>
                            </div>
                        </td>
                        <td class="pro-price">￥29.00</td>
                        <td>2017-06-29</td>
                        <td>未提现</td>
                        <td></td>
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

@section('footer')
    <!--我要提现弹框-->
    <div class="order-manager-cover"></div>
    <div class="order-manager-mask">
        <div class="manager-mask-header clearfix">
            <h2 class="fl">我要提现</h2>
            <i class="icon-close"></i>
        </div>
        <div class="manager-mask-content">
            <form>
                <div class="withdraw-form-dv">
                    <label><b>*</b>提现金额</label>
                    <input type="text"/>
                </div>
                <div class="pay-form-radio">
                    <span><b>*</b>到账方式</span>
                    <label>
                        <input type="radio" name="paytype" checked/>
                        <span><img src="/img/alipay-pay.jpg"/></span>
                    </label>
                    <label>
                        <input type="radio" name="paytype"/>
                        <span><img src="/img/weixin-pay.jpg"/></span>
                    </label>
                </div>
                <div class="withdraw-form-erweima">
                    <img src="/img/erweima.jpg">
                </div>
                <div class="withdraw-form-text">
                    <label>备注</label>
                    <textarea></textarea>
                </div>
                <div class="withdraw-form-sub">
                    <input class="fl" type="submit" value="确定提现"/>
                    <a class="fr" href="javascript:;">取消</a>
                </div>
            </form>
        </div>
    </div>
    <!--提现成功弹出框-->
    <div class="withdraw-successful-mask">
        <div class="withdraw-successful-top">
            <div class="notice-words">
                <img src="/img/smile.png"/>
                <p>您已成功提取现金,请到账户查收确认！</p>
            </div>
            <div class="notice-tel">有问题请及时反馈：<b>400-000-0000</b></div>
        </div>
        <div class="withdraw-successful-bottom">
            <p>到账金额：<b>￥28.00</b></p>
            <p>佣金收取：<b>￥1.00</b></p>
            <a href="javascript:;">关闭</a>
        </div>
    </div>
@stop

@section('scripts')
    <script type="text/javascript" src="/js/jquery-1.10.1.min.js"></script>
    <script type="text/javascript" src="/js/js_qiyehuiyuan.js"></script>
    <script type="text/javascript">
        $(function () {
            $(".order-manager-content tr:odd").attr("bgColor", "#fff");//为单数行表格设置背景颜色
            $(".order-manager-content tr:even").css("background-color", "#eef1f5");//为双数行表格设置背颜色素
        });
    </script>
@stop
