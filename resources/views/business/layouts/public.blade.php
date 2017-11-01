@extends('business.layouts.master')

@section('title') @parent @stop
@section('css') @parent @stop

@section('main')
<script type="text/javascript" src="/js/jquery.js"></script>
<script type="text/javascript" src="/js/alert.min.js"></script>
    <div class="safety-setting-content">
	    @include('business.partial.breadcams')
        <div class="safety-content-box">
            <h3>{{current($_title)}}</h3>
            @yield('inbox')
        </div>
        @parent
    </div>
@stop

@section('scripts')
@if(defined('IN_PRO'))
    <script>
                //提交表单
                function submitForm(){
                    //读取信息
                    var hiddenForm = new FormData($('#dataForm')[0]);
                        /*that.parents('.submit').find('input,textarea,select').each(function(i,obj){
                            hiddenForm.append(obj.name,obj.value)
                        })*/


                    $('.datasubmi').attr('disabled',true)
                    $.ajax({
                        url  : "include/action.php",
                        type : "post",
                        dataType : 'json',
                        data : hiddenForm,
                        cache: false,
                        processData: false,
                        contentType: false,
                        success : function(json){
                            // console.log(json)
                            var stu = json.status
                            var theIndex=layer.alert(json.msg, {
                              icon: stu
                              ,skin: 'layui-layer-molv'
                              ,anim: 4 //动画类型
                            },function(){
                                layer.close(theIndex);
                            });
                            if(stu==1 || stu==6){
                                    // history.go(-1);
                                setTimeout(function(){
                                    window.location.href="<?=getUrl(queryString(true, true),$showname)?>";
                                    // var index = parent.layer.getFrameIndex(window.name);
                                    // parent.layer.close(index);
                                    // window.location.reload();
                                    // history.reload();
                                },1500)
                            }else{
                                $('.datasubmit').removeAttr('disabled')
                            }
                        },
                        error:function(XMLHttpRequest, textStatus, errorThrown){
                            $('.datasubmit').removeAttr('disabled');
                          layer.alert('网络不畅,稍后再试!', {
                            icon: 3,
                            skin: 'layer-ext-moon' //该皮肤由layer.seaning.com友情扩展。关于皮肤的扩展规则，去这里查阅
                          })
                        }
                    })
                    return false;
                }
    </script>
@else
    <script>
        function checked(obj){
            $(obj).prop("checked", true);
        }
        function unchecked(obj){
            $(obj).prop("checked", false);
        }
        function isNumber(value) {
            var patrn = /^(-)?\d+(\.\d+)?$/;
            if (patrn.exec(value) == null || value == "") {
                return false
            } else {
                return true
            }
        }
        function getSelected(){
                var arr = new Array();
                $("table tbody .xuanze:checked").each(function(i){
                    val  = $(this).val();
                    if (isNumber(val)) {
                        arr[i] = parseInt(val);
                    };
                });
                console.log(arr)
                return arr;
        }
        $(function(){
            $('.xuanze').click(function(){
                if ($(this).prop("checked")) {
                    if ($(".xuanze:checked").length == $(".xuanze").length) {
                        checked(".quanxuan")
                    };
                } else {
                    unchecked(".quanxuan")
                };
            })
            $(".quanxuan").click(function(){
                $status = $(this).prop('checked');
                $('.xuanze,.quanxuan').prop('checked', $status)
            })
            // $(document).on('click','#checkall',function(){var ss=$("#checkall").prop('checked'); $('#list :checkbox').prop('checked',ss); });
            $("#del").click(function() {
                var arr = getSelected();
                var ids = arr.join(',');
                var len = arr.length;
                // if(ids){var flag = confirm("确定删除这些吗?"); } else{alert("请选择要删除的选项!")}
                if(ids){
                    kwj({
                      title: "确定删除吗?",
                      text: "一旦删除,这些信息将不再显示!",
                      icon: "warning",
                      buttons: true,
                      dangerMode: true,
                    })
                    .then((willDelete) => {
                      if (willDelete) {
                        kwj("删除成功!", {
                          icon: "success",
                        });
                        $.ajax({
                            url:'{{route('b_delte', $table)}}',
                            type:'post',
                            data:{ids:ids},
                            datatype:"json",
                            headers: { 'X-CSRF-TOKEN' : '{{ csrf_token() }}' },
                            success:function(data){
                                data = eval("("+data+")");
                                if (data.status==1) {
                                    for(i=0;i<len;i++){
                                        $('#delid'+arr[i]).parents('tr').remove();
                                    }
                                    /*ajaxReload()*/
                                    layer.msg(data.msg);
                                }else{
                                    layer.msg(data.msg);
                                }
                                setTimeout(function(){
                                  layer.closeAll('loading');
                                }, 0);

                            }

                        });
                      } else {
                        // kwj("Your imaginary file is safe!");
                      }
                    });
                } else{alert("请先选择要删除的选项!");}

            });

            $(".del").click(function() {
                that = $(this)
                var id = that.data('id');
                layer.confirm('确定删除吗?', {icon: 3, title:'提示'}, function(index){
                      var layerIndex = layer.load(2, {shade: false}); //0代表加载的风格，支持0-2
                      $.ajax({
                          url:'include/action.php',
                          type:'post',
                          data:{ids:id,t:"<?=$table=''?>"},
                          datatype:"json",
                          success:function(data){
                              data = eval("("+data+")");
                              if (data.status==1) {
                                  that.parents('tr').remove();
                                  /*ajaxReload()*/
                                  layer.msg('删除成功');
                              }else{
                                layer.msg('删除失败');
                              }
                              layer.close(layerIndex);
                          }

                      });
                  layer.close(index);
                });

            });
        });
    </script>
@endif
    @stop