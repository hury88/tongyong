<?php

return [
    //id of actions that can get notices
    //'actions' => [1,2,3,8,9,11,13],
    //links to the sourcece type of actions
    'links' => [
        // 'order' => route('orders.show_order', ['source_id']),
    ],
    //templates to the actions types
    'templates' => [
        'certification:request' => '您的认证信息已提交，请等待审核',
        'certification:refuse' => '您的认证信息未通过，如有疑问，请联系网站客服协助解决',
        'certification:ok' => '恭喜您实名认证已通过',
        'order:open'       => '已创建新订单 #[source_id]',
        'order:pending'    => '订单 #[source_id]等待处理中',
        'order:comment'    => '订单 #[source_id]有一条新评论',
        'order:closed'     => '订单 #[source_id]已关闭',
        'order:cancelled'  => '订单 #[source_id]已取消',
        'order:sent'       => '订单 #[source_id]已发送',
        'order:rate'       => '订单 #[source_id]已评价',
        'order:received'   => '订单 #[source_id]已收到',
        'order:processing' => '订单 #[source_id]已处理',
        'certification_person:request' => '您的认证信息已提交，请等待审核',
        'certification_person:refuse' => '您的认证信息未通过，如有疑问，请联系网站客服协助解决',
        'certification_person:ok' => '恭喜您实名认证已通过',
        'encroll:person' => '报名成功',// 9 encroll
        'encroll:business' => '有用户报名',// 10 encroll
        'resume:request' => '您刚刚给%s投递了简历',//11
        'resume:fromRefuse' => '您在%s的职位申请已被拒绝',//12
        'resume:toRefuse' => '您刚刚拒绝了%s发出的面试邀请',//13
        'resume:ok' => '%s向您发出了面试邀请',//14
    ],

    'all_title'   => '短消息',
    'all_summary' => '这里是您收到的所有的短消息。点击以查看详情。',
];
