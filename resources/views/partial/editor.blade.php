<script charset="utf-8" src="/plugins/myeditor/kindeditor-min.js"></script>
<script charset="utf-8" src="/plugins/myeditor/lang/zh_CN.js"></script>
<script charset="utf-8" src="/plugins/myeditor/plugins/code/prettify.js"></script>
<script>
    KindEditor.ready(function(K) {
        var editor1 = K.create('.editor_id', {
            filterMode: false,//是否开启过滤模式
            cssPath : 'plugins/myeditor/plugins/code/prettify.css',
            uploadJson : 'plugins/myeditor/php/upload_json.php',
            fileManagerJson : 'plugins/myeditor/php/file_manager_json.php',
            allowFileManager : true,
            afterBlur : function() {
                this.sync();
                K.ctrl(document, 13, function() {
                    K('form[name=formlist]')[0].submit();
                });
                K.ctrl(this.edit.doc, 13, function() {
                    K('form[name=formlist]')[0].submit();
                });
            }
        });
        prettyPrint();
    });
</script>
<?php
$opt = new App\Helpers\FormHelper;
$opt->editor('详情内容','content');

?>