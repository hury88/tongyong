@extends('business.layouts.public')
@section('inbox')
    <div class="resume-inbox">
        <div class="order-manager-header clearfix">
            <div class="manager-header-right fr">
                <form>
                    <div class="order-search">
                        <select name="order-lists">
                            <option value="按院校名称">按院校名称</option>
                            <option value="按院校名称">按院校名称</option>
                            <option value="按院校名称">按院校名称</option>
                        </select>
                        <input class="order-manager-inp" type="text" placeholder="输入职位名称"/>
                        <input class="order-manager-sub" type="button" value="搜索结果">
                        <input class="certificate-but" type="button" value="发布信息">
                    </div>
                </form>
            </div>
        </div>
        <div class="order-manager-content">
            <form>
                <table class="academy-table" width="101%" cellpadding="0" cellspacing="0">
                    <tr class="manager-firsttr">
                        <th class="manager-firstth">
                            <label><input name="orderselect" type="checkbox"/>全选</label>
                        </th>
                        <th class="resume-employ-secondth">分类</th>
                        <th class="resume-employ-thirdth">主要内容</th>
                        <th class="resume-employ-fourth">报名人数</th>
                        <th class="resume-employ-fiveth">更新时间</th>
                        <th class="resume-employ-eleventh">操作</th>
                    </tr>
                    <tr>
                        <td class="manager-firstth">
                            <label><input name="orderselect" type="checkbox"/></label>
                        </td>
                        <td class="certificate-trone">证书类别</td>
                        <td class="certificate-trtwo">
                            （职业资格类）人力资源管理师
                        </td>
                        <td class="trcolor-red">1234人</td>
                        <td>2017-06-29</td>
                        <td>
                            <a class="resume-remove color-trblue" href="javascript:;">修改</a>
                            <a class="resume-delete color-trblue" href="javascript:;">删除</a>
                        </td>
                    </tr>
                    <tr>
                        <td class="manager-firstth">
                            <label><input name="orderselect" type="checkbox"/></label>
                        </td>
                        <td class="certificate-trone">通知公告</td>
                        <td class="certificate-trtwo">
                            <img src="img/img-icon.jpg">
                            <p>因国家政策影响，即日起中国国家培训网对《岗位培训合格证书》《专业技术培训证书》进行统一改版，《岗位培训合格证书》......</p>
                        </td>
                        <td class="trcolor-red">1234人</td>
                        <td>2017-06-29</td>
                        <td>
                            <a class="resume-remove color-trblue" href="javascript:;">修改</a>
                            <a class="resume-delete color-trblue" href="javascript:;">删除</a>
                        </td>
                    </tr>
                    <tr>
                        <td class="manager-firstth">
                            <label><input name="orderselect" type="checkbox"/></label>
                        </td>
                        <td class="certificate-trone">证书类别</td>
                        <td class="certificate-trtwo">
                            （职业资格类）人力资源管理师
                        </td>
                        <td class="trcolor-red">1234人</td>
                        <td>2017-06-29</td>
                        <td>
                            <a class="resume-remove color-trblue" href="javascript:;">修改</a>
                            <a class="resume-delete color-trblue" href="javascript:;">删除</a>
                        </td>
                    </tr>
                    <tr>
                        <td class="manager-firstth">
                            <label><input name="orderselect" type="checkbox"/></label>
                        </td>
                        <td class="certificate-trone">通知公告</td>
                        <td class="certificate-trtwo">
                            <img src="img/img-icon.jpg">
                            <p>因国家政策影响，即日起中国国家培训网对《岗位培训合格证书》《专业技术培训证书》进行统一改版，《岗位培训合格证书》......</p>
                        </td>
                        <td class="trcolor-red">1234人</td>
                        <td>2017-06-29</td>
                        <td>
                            <a class="resume-remove color-trblue" href="javascript:;">修改</a>
                            <a class="resume-delete color-trblue" href="javascript:;">删除</a>
                        </td>
                    </tr>
                    <tr>
                        <td class="manager-firstth">
                            <label><input name="orderselect" type="checkbox"/></label>
                        </td>
                        <td class="certificate-trone">证书类别</td>
                        <td class="certificate-trtwo">
                            （职业资格类）人力资源管理师
                        </td>
                        <td class="trcolor-red">1234人</td>
                        <td>2017-06-29</td>
                        <td>
                            <a class="resume-remove color-trblue" href="javascript:;">修改</a>
                            <a class="resume-delete color-trblue" href="javascript:;">删除</a>
                        </td>
                    </tr>
                    <tr>
                        <td class="manager-firstth">
                            <label><input name="orderselect" type="checkbox"/></label>
                        </td>
                        <td class="certificate-trone">通知公告</td>
                        <td class="certificate-trtwo">
                            <img src="img/img-icon.jpg">
                            <p>因国家政策影响，即日起中国国家培训网对《岗位培训合格证书》《专业技术培训证书》进行统一改版，《岗位培训合格证书》......</p>
                        </td>
                        <td class="trcolor-red">1234人</td>
                        <td>2017-06-29</td>
                        <td>
                            <a class="resume-remove color-trblue" href="javascript:;">修改</a>
                            <a class="resume-delete color-trblue" href="javascript:;">删除</a>
                        </td>
                    </tr>
                    <tr>
                        <td class="manager-firstth">
                            <label><input name="orderselect" type="checkbox"/></label>
                        </td>
                        <td class="certificate-trone">证书类别</td>
                        <td class="certificate-trtwo">
                            （职业资格类）人力资源管理师
                        </td>
                        <td class="trcolor-red">1234人</td>
                        <td>2017-06-29</td>
                        <td>
                            <a class="resume-remove color-trblue" href="javascript:;">修改</a>
                            <a class="resume-delete color-trblue" href="javascript:;">删除</a>
                        </td>
                    </tr>
                    <tr>
                        <td class="manager-firstth">
                            <label><input name="orderselect" type="checkbox"/></label>
                        </td>
                        <td class="certificate-trone">通知公告</td>
                        <td class="certificate-trtwo">
                            <img src="img/img-icon.jpg">
                            <p>因国家政策影响，即日起中国国家培训网对《岗位培训合格证书》《专业技术培训证书》进行统一改版，《岗位培训合格证书》......</p>
                        </td>
                        <td class="trcolor-red">1234人</td>
                        <td>2017-06-29</td>
                        <td>
                            <a class="resume-remove color-trblue" href="javascript:;">修改</a>
                            <a class="resume-delete color-trblue" href="javascript:;">删除</a>
                        </td>
                    </tr>
                    <tr>
                        <td class="manager-firstth">
                            <label><input name="orderselect" type="checkbox"/></label>
                        </td>
                        <td class="certificate-trone">证书类别</td>
                        <td class="certificate-trtwo">
                            （职业资格类）人力资源管理师
                        </td>
                        <td class="trcolor-red">1234人</td>
                        <td>2017-06-29</td>
                        <td>
                            <a class="resume-remove color-trblue" href="javascript:;">修改</a>
                            <a class="resume-delete color-trblue" href="javascript:;">删除</a>
                        </td>
                    </tr>
                    <tr>
                        <td class="manager-firstth">
                            <label><input name="orderselect" type="checkbox"/></label>
                        </td>
                        <td class="certificate-trone">通知公告</td>
                        <td class="certificate-trtwo">
                            <img src="img/img-icon.jpg">
                            <p>因国家政策影响，即日起中国国家培训网对《岗位培训合格证书》《专业技术培训证书》进行统一改版，《岗位培训合格证书》......</p>
                        </td>
                        <td class="trcolor-red">1234人</td>
                        <td>2017-06-29</td>
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
@stop