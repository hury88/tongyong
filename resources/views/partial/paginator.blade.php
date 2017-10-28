
<div class="web-pager" data-pages="{{$page['last_page']}}">

        @for($i=$page['min_page'];$i<=$page['max_page'];$i++)
            <a @if($page['current_page']==$i) class=" pager-now" href="javascript:void(0);" @else href="?page={{$i.$ckey}}" @endif >{{$i}}</a>
        @endfor
            @if($page['current_page']<$page['last_page'])
                <a  href="{{$page['next_page_url'].$ckey}}" class="scrip-a"><img src="/img/zhizhen.jpg"></a>
            @endif
    <form>
        <span class="script-span">跳转到：</span>
        <input class="pager-form-inp" name="page" style="text-align: center" type="text"/>
        <input class="pager-form-sub" type="submit" value="GO">
    </form>
</div>
</div>
<script type="text/javascript">
    $(".web-pager form .pager-form-inp").keyup(function () {
        var ss=parseInt($(this).val())
        var ss1=parseInt($(".web-pager").data('pages'));

        if(0<ss&&ss<=ss1){
            $(this).val(ss)
        }else if(ss>ss1){

            $(this).val(ss1)
        }else{
            $(this).val("")
        }

    })
</script>