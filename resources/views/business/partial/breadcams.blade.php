<h2 class="member-pager-title">{{end($_title)}}</h2>
<div class="member-pager-location">
    <i class="icon-index1"></i>
    <span>我的位置：</span>
    @foreach(array_reverse($_title) as $key => $title)
    {!!$key == 0 ? '' : '<span> > </span>' !!}
    <a href="javascript:;">{{$title}}</a>
    @endforeach
</div>