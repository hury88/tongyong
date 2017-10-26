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
             <li>
                <a href="javascript:void(0);" style="margin-left: 30px;">搜索</a>
            </li>
            <li>
                <a href="{{ u('register')}}" style="margin-left: 15px;">注册</a>
            </li>
            <li>
                <a href="{{ u('login')}}">登录</a>
            </li>
        </ul>
        <p class="fl">
            <a href="javascript:void(0)"><img src="/img/bug.png"/></a>
        </p>
    </div>
</div>
</div>