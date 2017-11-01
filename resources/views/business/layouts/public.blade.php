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
@if(defined('AT_CU'))
    <script>
        $('.save').click(function(){
            model(this);
        })
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
                            success:function(response){
                                  var state = response.state;
                                if (state == 200) {
                                    for(i=0;i<len;i++){
                                        $('#delid'+arr[i]).parents('tr').remove();
                                    }
                                }else{
                                }
                            }

                        });
                      } else {
                        // kwj("Your imaginary file is safe!");
                      }
                    });
                } else{alert("请先选择要删除的选项!");}

            });

            $(".resume-delete").click(function() {
                that = $(this)
                var id = that.data('id');
                kwj({
                  title: "确定删除本条数据吗?",
                  text: "一旦删除,将不再显示!",
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
                        data:{ids:id},
                        datatype:"json",
                        headers: { 'X-CSRF-TOKEN' : '{{ csrf_token() }}' },
                        success:function(response){
                              var state = response.state;
                              if (state == 200) {
                                $('#delid'+id).parents('tr').remove();

                              }else{
                              }
                        }

                    });
                  } else {
                    // kwj("Your imaginary file is safe!");
                  }
                });

            });
        });
    </script>
@endif
    @stop