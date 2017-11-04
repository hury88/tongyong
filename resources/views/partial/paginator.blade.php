
<div class="web-pager" data-pages="{{$pagenewslist['last_page']}}">
    <?php if(isset($ckey)){$ckey=$ckey;}else {$ckey='';}?>

        @for($i=$pagenewslist['min_page'];$i<=$pagenewslist['max_page'];$i++)
            <a @if($pagenewslist['current_page']==$i) class=" pager-now" href="javascript:void(0);" @else href="?page={{$i.$ckey}}" @endif >{{$i}}</a>
        @endfor
            @if($pagenewslist['current_page']<$pagenewslist['last_page'])
                <a  href="{{$pagenewslist['next_page_url'].$ckey}}" class="scrip-a"><img src="/img/zhizhen.jpg"></a>
            @endif
    <form>
        <?php
        $ckeys=explode("&",$ckey);
        foreach($ckeys as $v){
            if(strstr($v, '=')){
                $vs=explode("=",$v);

                if($vs[1]!==0){

              ?>
            <input name="{{$vs[0]}}" value="{{$vs[1]}}" type="hidden">
           <?php }}}?>


        <span class="script-span">跳转到：</span>
        <input class="pager-form-inp" name="page" style="text-align: center" type="text"/>
        <input class="pager-form-sub" type="submit" value="GO">
    </form>
</div>
</div>
<script type="text/javascript" src="/js/jquery.js"></script>
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