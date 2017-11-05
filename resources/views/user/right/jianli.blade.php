<h3>我的简历</h3>
<div class="black24"></div>
<div class="nation-education-table">
    <table width="100%">
        <tr class="edu-first-tr">
            <th>简历名称</th>
            <th>简历类型</th>
            <th>下载/浏览</th>
            <th>面试邀请</th>
            <th>更新时间</th>
            <th>操作</th>
        </tr>
        @foreach($list as $vf)
            <tr>
                <td class="color-blue1">{{$vf->nid}}</td>
                <td>{{$vf->gzxz}}</td>
                <td>{{$vf->downs}}/{{$vf->hits}}</td>
                <td>{{$vf->msyqs}}</td>
                <td>{{$vf->addtime}}</td>
                <td>
                    <p class="my-resume-operate">
                        <a href="{{u("person","jianli","edit",$vf->id)}}">修改</a>
                        <a class="preview" href="{{u("person","jianli","view",$vf->id)}}">预览</a>
                        <a href="javascript:;" class="jianli_del" data-id="{{$vf->id}}" data-nid="{{$vf->nid}}">删除</a>
                    </p>
                    <p class="my-resume-operate">
                        @if(!$vf->istop)
                            <a class="apply-quit jianli_top" href="javascript:;"  data-id="{{$vf->id}}" data-nid="{{$vf->nid}}">置顶</a>
                        @endif
                        <a href="javascript:;">下载</a>
                        @if(!$vf->ismr)
                            <a href="javascript:;" class="jianli_mr"  data-id="{{$vf->id}}" data-nid="{{$vf->nid}}">设为默认</a>
                        @endif

                    </p>
                </td>
            </tr>
        @endforeach
    </table>
    <div class="establish-resume clearfix">
        <p class="fl">共可创建<b>6</b>份简历，您已创建<b>{{$nums}}</b>份</p>
        <a class="fr" href="{{$nums>=6?"javascript:;":u("person","jianli","add")}}">创建新简历</a>
    </div>
</div>