<div id="nav" class="clearfix">
    <h1 class="fl"><a href="/"> <img src="{{img($boot_config['logo1'])}}"/>{{$boot_config['sitename']}} <span>合 肥</span></a></h1>
    <div class="mian_nav fr">
        <style type="text/css">
            .list li a.cur{
                border-bottom: 1px solid #e71f1a;
                color: #e71f1a;
            }
        </style>
        <ul class="list">
            <li>
                <a href="/" @if(is_null($GLOBALS['pid'])) class="cur" @endif>首页 </a>
            </li>
            <?php $newsCats  = new \App\NewsCats;?>
            @foreach ($newsCats->getNavigation(["id", 'img2','catname','path']) as $yiji)
                <li>
                    <a href="{{u($yiji->path)}}" @if($GLOBALS['pid']==$yiji->id) class="cur" @endif> {{$yiji->catname}} </a>
                    <div class="dump">
                        <ul class="fl">
                            @foreach ($newsCats->getNavigation(['catname','path'],$yiji->id) as $erji)
                            <li>
                                <a href="{{u($yiji->path, $erji->path)}}" @if($GLOBALS['ty']==$erji->id) class="action" @endif> {{$erji->catname}}</a>
                            </li>
                            @endforeach
                            @if($yiji->id==2)
                            <li>
                                <a href="{{u($yiji->path, 'business')}}">培训机构</a>
                            </li>
                            @endif

                        </ul>
                        <span></span>
                        <div class="show">
                            <a href="javascript:;"><img src="{{img($yiji->img2)}}"/></a>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
        <div class="use">
            <ul class="fl">
                <li> <a href="{{ u('news', 'seach')}}" style="margin-left: 30px;">搜索</a> </li>
            @if(auth()->check())
                <li> <a href="{{ u('user')}}" style="margin-left: 15px;font-size:16px;"><em style="font-size:12px;">您好</em>，{{auth()->user()->member_name}}</a> </li>
                <li> <form action="{{ route('logout')}}" method="post"><a href="javascript:;"><button>退出</button></a>{!! csrf_field() !!}</form> </li>
            @else
                <li> <a href="{{ u('register')}}" style="margin-left: 15px;">注册</a> </li>
                <li> <a href="{{ u('login')}}">登录</a> </li>
            @endif
            </ul>
            <p class="fl">
                <a href="javascript:void(0)"><img src="/img/bug.png"/></a>
            </p>
        </div>
    </div>
</div>