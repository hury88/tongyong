    /**
 * Created by Administrator on 2017/11/2.
 */
$(function(){
    $("#get_yzm").click(function(){
        $.get("/person/getyzm/tel",function(data){
            alert(data)
        })
    })

    //简历修改-基本信息
    $("#edit_jbxx").click(function(){
        $.getJSON("/person/jianli/mbxg/jbxx",{id:id},function(data){
            if(data.status==200){
                $("#edit_jbxx").hide();
                $("#add_jbxx").html(data.content);
            }  else{
                alert(data.content);
            }
        })
    })

    //简历修改-求职意向
    $("#edit_qzyx").click(function(){
        $.getJSON("/person/jianli/mbxg/qzyx",{id:id},function(data){
            if(data.status==200){
                $("#edit_qzyx").hide();
                $("#add_qzyx").html(data.content);
            }  else{
                alert(data.content);
            }
        })
    })

    //简历修改-工作经验
    $("#edit_gzjy").click(function(){
        $.getJSON("/person/jianli/mbxg/gzjy",{id:id},function(data){
            if(data.status==200){
                $("#add_gzjy_xz").show();
                $("#edit_gzjy").hide();
                $("#add_gzjy").html(data.content);
            }  else{
                alert(data.content);
            }
        })
    })

    //简历添加-工作经验
    if($("#add_gzjy_div").length>0){
        //var gzjy_div=$("#add_gzjy_div").html();
        $("#add_gzjy_xz").click(function(){
            $.getJSON("/person/jianli/mbxz/gzjy",function(data){
                if(data.status==200){
                    $("#add_gzjy_xz").hide();
                    $("#edit_gzjy").show();
                    $("#add_gzjy_div").append(data.content);
                }  else{
                    alert(data.content);
                }
            })
        })
    }


    //简历修改-教育背景
    $("#edit_jybj").click(function(){
        $.getJSON("/person/jianli/mbxg/jybj",{id:id},function(data){
            if(data.status==200){
                $("#jybj_xz").show();
                $("#edit_jybj").hide();
                $("#add_jybj").html(data.content);
            }  else{
                alert(data.content);
            }
        })
    })

    //简历添加 -教育背景
    if($("#add_jybj_div").length>0){
        //var jybj_div=$("#add_jybj_div").html();
        $("#jybj_xz").click(function(){
            $.getJSON("/person/jianli/mbxz/jybj",function(data){
                if(data.status==200){
                    $("#add_jybj_div").append(data.content);
                }  else{
                    alert(data.content);
                }
            })
        })
    }



    //简历修改-在校情况
    $("#edit_zxqk").click(function(){
        $.getJSON("/person/jianli/mbxg/zxqk",{id:id},function(data){
            if(data.status==200){
                $("#zxqk_xz").show();
                $("#edit_zxqk").hide();
                $("#add_zxqk").html(data.content);
            }  else{
                alert(data.content);
            }
        })
    })


    //简历添加 -在校情况
    if($("#add_zxqk_div").length>0){
        //var zxqk_div=$("#add_zxqk_div").html();
        $("#zxqk_xz").click(function(){
            $.getJSON("/person/jianli/mbxz/zxqk",function(data){
                if(data.status==200){
                    $("#add_zxqk_div").append(data.content);
                }  else{
                    alert(data.content);
                }
            })

        })
    }


    //简历修改-技能特长
    $("#edit_jntc").click(function(){
        $.getJSON("/person/jianli/mbxg/jntc",{id:id},function(data){
            if(data.status==200){
                $("#jntc_xz").show();
                $("#edit_jntc").hide();
                $("#add_jntc").html(data.content);
            }  else{
                alert(data.content);
            }
        })
    })


    //简历添加 -技能特长
    if($("#add_jntc_div").length>0){
        //var jntc_div=$("#add_jntc_div").html();
        $("#jntc_xz").click(function(){
            $.getJSON("/person/jianli/mbxz/jntc",function(data){
                if(data.status==200){
                    $("#add_jntc_div").append(data.content);
                }  else{
                    alert(data.content);
                }
            })
        })
    }


    //简历修改-培训经历
    $("#edit_pxjl").click(function(){
        $.getJSON("/person/jianli/mbxg/pxjl",{id:id},function(data){
            if(data.status==200){
                $("#pxjl_xz").show();
                $("#edit_pxjl").hide();
                $("#add_pxjl").html(data.content);
            }  else{
                alert(data.content);
            }
        })
    })


    //简历添加 -培训经历
    if($("#add_pxjl_div").length>0){
        //var pxjl_div=$("#add_pxjl_div").html();
        $("#pxjl_xz").click(function(){
            $.getJSON("/person/jianli/mbxz/pxjl",function(data){
                if(data.status==200){
                    $("#add_pxjl_div").append(data.content);
                }  else{
                    alert(data.content);
                }
            })
        })
    }


    //简历修改-证书
    $("#edit_zs").click(function(){
        $.getJSON("/person/jianli/mbxg/zs",{id:id},function(data){
            if(data.status==200){
                $("#zs_xz").show();
                $("#edit_zs").hide();
                $("#add_zs").html(data.content);
            }  else{
                alert(data.content);
            }
        })
    })

    //简历添加 -证书
    if($("#add_zs_div").length>0){
        //var zs_div=$("#add_zs_div").html();
        $("#zs_xz").click(function(){
            $.getJSON("/person/jianli/mbxz/zs",function(data){
                if(data.status==200){
                    $("#add_zs_div").append(data.content);
                }  else{
                    alert(data.content);
                }
            })
        })
    }


    //简历修改-其他
    $("#edit_qt").click(function(){
        $.getJSON("/person/jianli/mbxg/qt",{id:id},function(data){
            if(data.status==200){
                $("#edit_qt").hide();
                $("#add_qt").html(data.content);
            }  else{
                alert(data.content);
            }
        })
    })

    //简历修改-项目经验
    $("#edit_xmjy").click(function(){
        $.getJSON("/person/jianli/mbxg/xmjy",{id:id},function(data){
            if(data.status==200){
                $("#xmjy_xz").show();
                $("#edit_xmjy").hide();
                $("#add_xmjy").html(data.content);
            }  else{
                alert(data.content);
            }
        })
    })

    //简历添加 -项目经验
    if($("#add_xmjy_div").length>0){
        //var xmjy_div=$("#add_xmjy_div").html();
        $("#xmjy_xz").click(function(){
            $.getJSON("/person/jianli/mbxz/xmjy",function(data){
                if(data.status==200){
                    $("#add_xmjy_div").append(data.content);
                }  else{
                    alert(data.content);
                }
            })
        })
    }

    //简历-完成提交
    $("#add_wc").click(function(){
        if(confirm("提示：确认此简历完成吗？")){
            if(id){
                location.href="/person/jianli";
            } else{
                alert("提示：请填写基本信息！");
                $("#nid").focus();
                return false;
            }
        }else{
            return false;
        }
    })
    //简历列表-置顶
    $(".jianli_top").click(function(){
        if(confirm("提示：确认设置【"+$(this).data("nid")+"】置顶吗？")){
            $.getJSON("/person/jianli/top/"+$(this).data("id"),function(data){
                   if(data.status==200){
                       alert("提示：置顶成功！");
                       location.reload();
                   }else{
                       alert("提示：置顶失败，"+data.content);
                       return false
                   }
            })
        }else{
            return false;
        }
    })

    //简历列表-默认
    $(".jianli_mr").click(function(){
        if(confirm("提示：确认设置【"+$(this).data("nid")+"】默认吗？")){
            $.getJSON("/person/jianli/mr/"+$(this).data("id"),function(data){
                   if(data.status==200){
                       alert("提示：默认成功！");
                       location.reload();
                   }else{
                       alert("提示：默认失败，"+data.content);
                       return false
                   }
            })
        }else{
            return false;
        }
    })

    //简历列表-删除
    $(".jianli_del").click(function(){
        if(confirm("提示：确认删除【"+$(this).data("nid")+"】吗？")){
            $.getJSON("/person/jianli/del/"+$(this).data("id"),function(data){
                   if(data.status==200){
                       alert("提示：删除成功！");
                       location.reload();
                   }else{
                       alert("提示：删除失败，"+data.content);
                       return false
                   }
            })
        }else{
            return false;
        }
    })



















})

function  ck_jladd1(formlist){
    if(!formlist.nid.value){
        alert("提示：请填写简历名称");
        formlist.nid.focus();
        return false;
    }
    if(!formlist.name.value){
        alert("提示：请填写姓名");
        formlist.name.focus();
        return false;
    }
    if(!formlist.address.value){
        alert("提示：请填写户口所在地");
        formlist.address.focus();
        return false;
    }
    if(!formlist.year.value){
        alert("提示：请填写出生年份");
        formlist.year.focus();
        return false;
    }
    if(!formlist.month.value){
        alert("提示：请填写出生月份");
        formlist.month.focus();
        return false;
    }
    if(!formlist.address_xjd.value){
        alert("提示：请填写现居住地");
        formlist.address_xjd.focus();
        return false;
    }
    if(!formlist.gznf.value){
        alert("提示：请填写参加工作年份");
        formlist.gznf.focus();
        return false;
    }
    if(!formlist.tel.value){
        alert("提示：请填写联系方式");
        formlist.tel.focus();
        return false;
    }
    if(!formlist.zgxl.value){
        alert("提示：请填写最高学历");
        formlist.zgxl.focus();
        return false;
    }
    if(!formlist.email.value){
        alert("提示：请填写电子邮箱");
        formlist.email.focus();
        return false;
    }
    if(!formlist.zjhm.value){
        alert("提示：请填写证件号");
        formlist.zjhm.focus();
        return false;
    }
    var formdata=$(formlist).serialize();
    $.getJSON("/person/jianli/postadd/"+id,formdata,function(data){
        if(data.status==200){
            if(!id){
                id=data.id;
            }
            $("#edit_jbxx").show();
            $("#add_jbxx").html(data.content);
            alert("基本信息保存成功，请添加其他选项！");

        }
    })
    return false;
}
function  ck_jladd2(formlist){
    if(!id){
        $("#nid").focus();
        alert("请先填写简历的基本信息！");
        return false;
    }
    if(!formlist.gzdd.value){
        alert("提示：请填写工作地点");
        formlist.gzdd.focus();
        return false;
    }
    if(!formlist.price.value){
        alert("提示：请填写期望税前工资");
        formlist.price.focus();
        return false;
    }
    var formdata=$(formlist).serialize();
    $.getJSON("/person/jianli/postadd2/"+id,formdata,function(data){
        if(data.status==200){
            $("#edit_qzyx").show();
            $("#add_qzyx").html(data.content);
            alert("求职意向保存成功，请添加其他选项！");

        }
    })
    return false;
}
function  ck_jladd3(formlist){
    if(!id){
        $("#nid").focus();
        alert("请先填写简历的基本信息！");
        return false;
    }
    var formdata=$(formlist).serialize();
    $.getJSON("/person/jianli/postadd3/"+id,formdata,function(data){
        if(data.status==200){
            $("#add_gzjy_xz").hide();
            $("#edit_gzjy").show();
            $("#add_gzjy").html(data.content);
            alert("工作经验保存成功，请添加其他选项！");

        }
    })
    return false;
}
function  ck_jladd4(formlist){
    if(!id){
        $("#nid").focus();
        alert("请先填写简历的基本信息！");
        return false;
    }
    var formdata=$(formlist).serialize();
    $.getJSON("/person/jianli/postadd4/"+id,formdata,function(data){
        if(data.status==200){
            $("#add_jybj_xz").hide();
            $("#edit_jybj").show();
            $("#add_jybj").html(data.content);
            alert("教育背景保存成功，请添加其他选项！");

        }
    })
    return false;
}
function  ck_jladd5(formlist){
    if(!id){
        $("#nid").focus();
        alert("请先填写简历的基本信息！");
        return false;
    }
    var formdata=$(formlist).serialize();
    $.getJSON("/person/jianli/postadd5/"+id,formdata,function(data){
        if(data.status==200){
            $("#add_zxqk_xz").hide();
            $("#edit_zxqk").show();
            $("#add_zxqk").html(data.content);
            alert("在校情况保存成功，请添加其他选项！");

        }
    })
    return false;
}
function  ck_jladd6(formlist){
    if(!id){
        $("#nid").focus();
        alert("请先填写简历的基本信息！");
        return false;
    }
    var formdata=$(formlist).serialize();
    $.getJSON("/person/jianli/postadd6/"+id,formdata,function(data){
        if(data.status==200){
            $("#add_jntc_xz").hide();
            $("#edit_jntc").show();
            $("#add_jntc").html(data.content);
            alert("技能特长保存成功，请添加其他选项！");
        }
    })
    return false;
}
function  ck_jladd7(formlist){
    if(!id){
        $("#nid").focus();
        alert("请先填写简历的基本信息！");
        return false;
    }
    var formdata=$(formlist).serialize();
    $.getJSON("/person/jianli/postadd7/"+id,formdata,function(data){
        if(data.status==200){
            $("#add_pxjl_xz").hide();
            $("#edit_pxjl").show();
            $("#add_pxjl").html(data.content);
            alert("培训经历保存成功，请添加其他选项！");
        }
    })
    return false;
}
function  ck_jladd8(formlist){
    if(!id){
        $("#nid").focus();
        alert("请先填写简历的基本信息！");
        return false;
    }
    var formdata=$(formlist).serialize();
    $.getJSON("/person/jianli/postadd8/"+id,formdata,function(data){
        if(data.status==200){
            $("#add_zs_xz").hide();
            $("#edit_zs").show();
            $("#add_zs").html(data.content);
            alert("证书保存成功，请添加其他选项！");
        }
    })
    return false;
}
function  ck_jladd9(formlist){
    if(!id){
        $("#nid").focus();
        alert("请先填写简历的基本信息！");
        return false;
    }
    var formdata=$(formlist).serialize();
    $.getJSON("/person/jianli/postadd9/"+id,formdata,function(data){
        if(data.status==200){
            $("#edit_qt").show();
            $("#add_qt").html(data.content);
            alert("其他信息保存成功，请添加其他选项！");
        }
    })
    return false;
}
function  ck_jladd10(formlist){
    if(!id){
        $("#nid").focus();
        alert("请先填写简历的基本信息！");
        return false;
    }
    var formdata=$(formlist).serialize();
    $.getJSON("/person/jianli/postadd10/"+id,formdata,function(data){
        if(data.status==200){
            $("#add_xmjy_xz").hide();
            $("#edit_xmjy").show();
            $("#add_xmjy").html(data.content);
            alert("项目经验保存成功，请添加其他选项！");
        }
    })
    return false;
}