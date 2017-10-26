@extends('about')
        @section('about_content')
            <div class="yijianRightTxt form">
                <textarea name="message" rows="" cols="" placeholder="来喷吧，骚年"></textarea></br>
                <input name="contact" type="text" placeholder="联系方式？(邮箱、QQ等)"/></br>
                <input onclick="return model(this, '{{url('about/feedback')}}');" type="submit" value="提交" class="sub"/>
                {!! csrf_field() !!}
            </div>
            <script type="text/javascript" src="/js/jquery.js"></script>
            <script type="text/javascript" src="/js/alert.min.js"></script>
        @stop
