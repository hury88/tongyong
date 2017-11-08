
<h3>工作邀请</h3>
<div class="black24"></div>
<div class="nation-education-table">
    <table width="100%">
        <tr class="edu-first-tr">
            <th>邀请的职位</th>
            <th>公司的名称</th>
            <th>邀约时间</th>
            <th>操作</th>
        </tr>
        @foreach($pagenewslist as $key => $list)
            <?php
                extract($list);
            ?>
        <tr>
            <td><a style="color:#3481bc !important" href="/job/{{v_id($job_cate_id, 'path', 'news_cats').'/'.$job_id}}" target="_blank">{{$title}}</a></td>
            <td>{{$business_name}}</td>
            <td>{{substr($created_at, 0, 10)}}</td>
            <td><a class="color-blue" href="javascript:;">查看邀请信息</a></td>
        </tr>
        @endforeach
    </table>
</div>