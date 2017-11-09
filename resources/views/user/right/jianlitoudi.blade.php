
<h3>简历投递记录</h3>
<div class="black24"></div>
<div class="nation-education-table">
    <table width="100%">
        <tr class="edu-first-tr">
            <th>投递的职位</th>
            <th>公司名称</th>
            <th>投递反馈</th>
            <th>投递时间</th>
            <th>操作</th>
        </tr>
        @foreach($pagenewslist as $key => $list)
        <?php
            extract($list);
            if ($cvs = App\CVS::find($cvs_id)) {

            } else {
                unset($csv);
                continue;
            }
        ?>
        <tr>
            <td class="resume-record color-blue"><label><input name="orderselect" type="checkbox"/><a style="color:#3481bc !important" href="/job/{{v_id($job_cate_id, 'path', 'news_cats').'/'.$job_id}}" target="_blank">{{$title}}</a></label></td>
            <td>{{$business_name}}</td>
            <td>{{$status}}</td>
            <td>{{substr($created_at, 0, 10)}}</td>
            <td>
                <a class="color-blue1" href="javascript:alert('开发中');">查看</a>
                <a class="color-blue1" href="javascript:alert('开发中');">删除</a>
            </td>
        </tr>
        @endforeach
    </table>
    <!-- <div class="resume-select-all color-blue">
        <label><input name="orderselect" type="checkbox"/>全选</label>
        <a href="javascript:;" class="delete-select-tr">删除</a>
    </div> -->
</div>