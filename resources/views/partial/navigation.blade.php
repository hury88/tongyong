<div id="nav" class="clearfix">
    <h1 class="fl"><a href="/"> <img src="<?php echo img($boot_config['logo1']);?>"/>{{$boot_config['sitename']}} <span>合 肥</span></a></h1>
    <div class="mian_nav fr">
        <ul class="list">
            <li>
                <a href="/">首页 </a>
            </li>
            <?php $newsCats  = new \App\NewsCats;?>
            @foreach ($newsCats->getNavigation(["id", 'img2','catname','path']) as $yiji)
                <li>
                    <a href="{{$yiji->path}}"> {{$yiji->catname}} </a>
                    <div class="dump">
                        <ul class="fl">
                            @foreach ($newsCats->getNavigation(['catname','path'],$yiji->id) as $erji)
                            <li>
                                <a href="{{$yiji->path}}/{{$erji->path}}"> {{$erji->catname}}</a>
                            </li>
                            @endforeach

                        </ul>
                        <span></span>
                        <div class="show">
                            <a href="javascript:;"><img src="/uploadfile/upload/{{$yiji->img2}}"/></a>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
        <div class="use">
            <ul class="fl">
             <li>
                <a href="javascript:;" style="margin-left: 30px;">搜索</a>
            </li>
            <li>
                <a href="javascript:;" style="margin-left: 15px;">注册</a>
            </li>
            <li>
                <a href="javascript:;">登录</a>
            </li>
        </ul>
        <p class="fl">
            <a href="###"><img src="img/bug.png"/></a>
        </p>
    </div>
</div>
</div>