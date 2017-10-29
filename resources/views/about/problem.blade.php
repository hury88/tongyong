@extends('about')
@section('about_content')

    <style type="text/css">
        div#content
        {
            margin: 0 auto;
            padding: 30px 0;
        }
        ul.expmenu {
            width: 100%;
        }
        ul.expmenu li {
            margin-bottom: 20px;
        }
        ul.expmenu > li ul li {
            background-color: #fafafa;
            padding: 0 46px;
            border-bottom: 1px solid #dcdcdc;
            border-top: 1px solid #fff;
            color: #727272;
            text-shadow: 0px 1px 0px rgba(255, 255, 255, 0.8);
        }
        ul.expmenu > li > div.header {
            padding: 12px;
        }
        ul.expmenu div.header {
            color: #333333;
            text-shadow: 0px 1px 0px rgba(255, 255, 255, 0.2);
            background: #fafafa;
        }
        ul.expmenu div.header {
            color: #333333;
            text-shadow: 0px 1px 0px rgba(255, 255, 255, 0.2);
            background: #fafafa;
        }
        ul.expmenu * {
            list-style: none;
        }
        ul.expmenu .menu {
            display: none;
        }

        ul.expmenu > li > div.header > .arrow.up {
            background-image: url(/img/arrow_u.png);
        }
        ul.expmenu > li ul li:last-child {
            border-bottom: none;
        }
        ul.expmenu > li:last-child > div.header { border-bottom: none; }
        ul.expmenu > li ul li.selected { background-color: #f4f4f4; }
        ul.expmenu > li > div.header > .label { padding-left:40px; background: no-repeat; }
        ul.expmenu > li > div.header > .arrow { display: block; width: 18px; height: 18px; background: no-repeat center; float: right; }
        ul.expmenu > li > div.header > .arrow.up { background-image: url(/img/arrow_u.png); }
        ul.expmenu > li > div.header > .arrow.down { background-image: url(/img/arrow_d.png); }

        ul#pagination-freebie li { float: left; margin-bottom: 20px }
        ul#pagination-freebie li:last-child { margin-right: 0; }
        div#content #expmenu-freebie>li:first-child .expmenu li .menu{display: block;}

    </style>
    <div class="qiyewenhua">
        <div id="content">
            <ul id="expmenu-freebie">
                @foreach($pagenewslist['data'] as $v)
                <li>
                    <ul class="expmenu">
                        <li>
                            <div class="header">
                                <span class="label" style="background-image: url(/img/pc.png);height: 25px;">{{$v['title']}}</span>
                                <span class="arrow up"></span>
                            </div>
                            <ul class="menu">
                                <li>{!! htmlspecialchars_decode($v['content']) !!}</li>
                            </ul>
                        </li>
                    </ul>
                </li>
                @endforeach
            </ul>
        </div>
        <script src="/js/jquery.js"></script>

        <script type="text/javascript" src="/js/jquery.tools.min.js"></script>

        <script type="text/javascript">
            $(function(){
                $("ul.expmenu li > div.header").click(function()
                {
                    //alert(1)
                    var arrow = $(this).find("span.arrow");

                    if(arrow.hasClass("up"))
                    {
                        arrow.removeClass("up");
                        arrow.addClass("down");
                    }
                    else if(arrow.hasClass("down"))
                    {
                        arrow.removeClass("down");
                        arrow.addClass("up");
                    }

                    $(this).parent().find("ul.menu").slideToggle();
                });
            })
        </script>
        @include('partial.paginator')
@stop
