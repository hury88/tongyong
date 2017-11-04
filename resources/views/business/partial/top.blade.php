<div class="member-safety-right-header clearfix">
    <h1 class="fl">欢迎登录{{$boot_config['sitename']}}企业用户中心！<span>您上次登录的时间：{{$user['updated_at']}}</span></h1>
    <div class="safety-header-personal fr">
        <ul>
            <li class="personal-infor1"><a href="{{route('b_notices')}}"><i>{{App\Notice::auth()->where('status', 1)->count()}}</i></a></li>
            <li class="personal-infor2"><img src="{{img($user['headimg'], '/img/member-headerimg.png')}}">欢迎回来，{{$user['member_name']}}</li>
            @if($user['certified'])
            <li class="personal-infor3"><img src="/img/renzhe.png">已认证</li>
            @else
            <li class="personal-infor3 no-authentication"><img src="/img/renzhe.png">未认证</li>
            @endif
            <li class="personal-infor4"> <form onsubmit="return confirm('确定退出');" action="{{ route('logout')}}" method="post"><a href="javascript:;"><input type="image" src="/img/next-icon.png"></a>{!! csrf_field() !!}</form> </li>
        </ul>
    </div>
</div>