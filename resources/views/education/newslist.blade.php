@extends('layouts.master')

@section('title') @parent @stop
@section('css')
    <link rel="stylesheet" type="text/css" href="/css/guojijiaoyu.css"/>
    <link rel="stylesheet" type="text/css" href="/css/common_guojijiaoyu.css"/>
@stop
@section('bodyNextLabel')
    <body>
    <div class="pager-wrap personal-center">
@stop
        @section('breadcrumbs')
            <div class="gjlhBanner" style="margin-top: 67px;">
                <img src="{{$banimgsrc}}" style="width: 100%;"/>
            </div>
        @stop

        @section('content')

            <div class="gjlhbx">
                <div class="gjlhbxAll">
                    <p class="xwdtmbx">
                        <a href="/"><img src="/img/sqzwtop.png" style="vertical-align: middle"/>所在位置：首页 </a>> <a href="{{u($GLOBALS['pid_path'])}}">{{$GLOBALS['pid_data']->catname}}</a>> <a href="{{u($GLOBALS['pid_path'], $GLOBALS['ty_path'])}}">{{$GLOBALS['ty_data']->catname}}</a>> <a href="{{u($GLOBALS['tty_path'], $GLOBALS['tty_path'])}}">{{$GLOBALS['tty_data']->catname}}</a>
                    </p>
                    <div class="liuxue">
                        <h4>留学新闻</h4>
                        <ul>
                            <li>
                                <div class="liuxueLeft">
                                    <p class="pz1">30</p>
                                    <p class="pz2">June.</p>
                                    <p>2017</p>
                                </div>
                                <div class="liuxueCenter">
                                    <p class="pz1"><a href="">美国加州州立大学富尔顿分校招生官来访</a></p>
                                    <p class="pz2"><a href="">在陌生的舞台上，侯霄霖抱着吉他，唱了一首他写给莹颖的歌，名字叫做《孩子一样的梦想》，他闭着眼，用力弹唱：曾经的曲折，难言的快乐，还有这首，曾为你写的歌…</a></p>
                                    <p class="pz3"><a href="">查看具体详情>></a></p>
                                </div>
                                <div class="liuxueRight">
                                    <img src="img/liuxue1.jpg"/>
                                </div>
                            </li>
                            <li>
                                <div class="liuxueLeft">
                                    <p class="pz1">30</p>
                                    <p class="pz2">June.</p>
                                    <p>2017</p>
                                </div>
                                <div class="liuxueCenter">
                                    <p class="pz1"><a href="">美国加州州立大学富尔顿分校招生官来访</a></p>
                                    <p class="pz2"><a href="">在陌生的舞台上，侯霄霖抱着吉他，唱了一首他写给莹颖的歌，名字叫做《孩子一样的梦想》，他闭着眼，用力弹唱：曾经的曲折，难言的快乐，还有这首，曾为你写的歌…</a></p>
                                    <p class="pz3"><a href="">查看具体详情>></a></p>
                                </div>
                                <div class="liuxueRight">
                                    <img src="img/liuxue1.jpg"/>
                                </div>
                            </li>
                            <li>
                                <div class="liuxueLeft">
                                    <p class="pz1">30</p>
                                    <p class="pz2">June.</p>
                                    <p>2017</p>
                                </div>
                                <div class="liuxueCenter">
                                    <p class="pz1"><a href="">美国加州州立大学富尔顿分校招生官来访</a></p>
                                    <p class="pz2"><a href="">在陌生的舞台上，侯霄霖抱着吉他，唱了一首他写给莹颖的歌，名字叫做《孩子一样的梦想》，他闭着眼，用力弹唱：曾经的曲折，难言的快乐，还有这首，曾为你写的歌…</a></p>
                                    <p class="pz3"><a href="">查看具体详情>></a></p>
                                </div>
                                <div class="liuxueRight">
                                    <img src="img/liuxue1.jpg"/>
                                </div>
                            </li>
                            <li>
                                <div class="liuxueLeft">
                                    <p class="pz1">30</p>
                                    <p class="pz2">June.</p>
                                    <p>2017</p>
                                </div>
                                <div class="liuxueCenter">
                                    <p class="pz1"><a href="">美国加州州立大学富尔顿分校招生官来访</a></p>
                                    <p class="pz2"><a href="">在陌生的舞台上，侯霄霖抱着吉他，唱了一首他写给莹颖的歌，名字叫做《孩子一样的梦想》，他闭着眼，用力弹唱：曾经的曲折，难言的快乐，还有这首，曾为你写的歌…</a></p>
                                    <p class="pz3"><a href="">查看具体详情>></a></p>
                                </div>
                                <div class="liuxueRight">
                                    <img src="img/liuxue1.jpg"/>
                                </div>
                            </li>
                            <li>
                                <div class="liuxueLeft">
                                    <p class="pz1">30</p>
                                    <p class="pz2">June.</p>
                                    <p>2017</p>
                                </div>
                                <div class="liuxueCenter">
                                    <p class="pz1"><a href="">美国加州州立大学富尔顿分校招生官来访</a></p>
                                    <p class="pz2"><a href="">在陌生的舞台上，侯霄霖抱着吉他，唱了一首他写给莹颖的歌，名字叫做《孩子一样的梦想》，他闭着眼，用力弹唱：曾经的曲折，难言的快乐，还有这首，曾为你写的歌…</a></p>
                                    <p class="pz3"><a href="">查看具体详情>></a></p>
                                </div>
                                <div class="liuxueRight">
                                    <img src="img/liuxue1.jpg"/>
                                </div>
                            </li>
                            <li>
                                <div class="liuxueLeft">
                                    <p class="pz1">30</p>
                                    <p class="pz2">June.</p>
                                    <p>2017</p>
                                </div>
                                <div class="liuxueCenter">
                                    <p class="pz1"><a href="">美国加州州立大学富尔顿分校招生官来访</a></p>
                                    <p class="pz2"><a href="">在陌生的舞台上，侯霄霖抱着吉他，唱了一首他写给莹颖的歌，名字叫做《孩子一样的梦想》，他闭着眼，用力弹唱：曾经的曲折，难言的快乐，还有这首，曾为你写的歌…</a></p>
                                    <p class="pz3"><a href="">查看具体详情>></a></p>
                                </div>
                                <div class="liuxueRight">
                                    <img src="img/liuxue1.jpg"/>
                                </div>
                            </li>
                            <li>
                                <div class="liuxueLeft">
                                    <p class="pz1">30</p>
                                    <p class="pz2">June.</p>
                                    <p>2017</p>
                                </div>
                                <div class="liuxueCenter">
                                    <p class="pz1"><a href="">美国加州州立大学富尔顿分校招生官来访</a></p>
                                    <p class="pz2"><a href="">在陌生的舞台上，侯霄霖抱着吉他，唱了一首他写给莹颖的歌，名字叫做《孩子一样的梦想》，他闭着眼，用力弹唱：曾经的曲折，难言的快乐，还有这首，曾为你写的歌…</a></p>
                                    <p class="pz3"><a href="">查看具体详情>></a></p>
                                </div>
                                <div class="liuxueRight">
                                    <img src="img/liuxue1.jpg"/>
                                </div>
                            </li>
                            <li>
                                <div class="liuxueLeft">
                                    <p class="pz1">30</p>
                                    <p class="pz2">June.</p>
                                    <p>2017</p>
                                </div>
                                <div class="liuxueCenter">
                                    <p class="pz1"><a href="">美国加州州立大学富尔顿分校招生官来访</a></p>
                                    <p class="pz2"><a href="">在陌生的舞台上，侯霄霖抱着吉他，唱了一首他写给莹颖的歌，名字叫做《孩子一样的梦想》，他闭着眼，用力弹唱：曾经的曲折，难言的快乐，还有这首，曾为你写的歌…</a></p>
                                    <p class="pz3"><a href="">查看具体详情>></a></p>
                                </div>
                                <div class="liuxueRight">
                                    <img src="img/liuxue1.jpg"/>
                                </div>
                            </li>
                            <li>
                                <div class="liuxueLeft">
                                    <p class="pz1">30</p>
                                    <p class="pz2">June.</p>
                                    <p>2017</p>
                                </div>
                                <div class="liuxueCenter">
                                    <p class="pz1"><a href="">美国加州州立大学富尔顿分校招生官来访</a></p>
                                    <p class="pz2"><a href="">在陌生的舞台上，侯霄霖抱着吉他，唱了一首他写给莹颖的歌，名字叫做《孩子一样的梦想》，他闭着眼，用力弹唱：曾经的曲折，难言的快乐，还有这首，曾为你写的歌…</a></p>
                                    <p class="pz3"><a href="">查看具体详情>></a></p>
                                </div>
                                <div class="liuxueRight">
                                    <img src="img/liuxue1.jpg"/>
                                </div>
                            </li>
                            <li>
                                <div class="liuxueLeft">
                                    <p class="pz1">30</p>
                                    <p class="pz2">June.</p>
                                    <p>2017</p>
                                </div>
                                <div class="liuxueCenter">
                                    <p class="pz1"><a href="">美国加州州立大学富尔顿分校招生官来访</a></p>
                                    <p class="pz2"><a href="">在陌生的舞台上，侯霄霖抱着吉他，唱了一首他写给莹颖的歌，名字叫做《孩子一样的梦想》，他闭着眼，用力弹唱：曾经的曲折，难言的快乐，还有这首，曾为你写的歌…</a></p>
                                    <p class="pz3"><a href="">查看具体详情>></a></p>
                                </div>
                                <div class="liuxueRight">
                                    <img src="img/liuxue1.jpg"/>
                                </div>
                            </li>
                        </ul>
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
            </div>



            <script type="text/javascript" src="/js/jquery.js"></script>
            <script type="text/javascript">
                $(function () {
                    $(".kf_online").css("position","fixed")
                    $(".key_top").click(function(){
                        var speed=200;
                        $('body,html').animate({ scrollTop: 0 }, speed);
                        return false;
                    })
                })

            </script>
@stop


