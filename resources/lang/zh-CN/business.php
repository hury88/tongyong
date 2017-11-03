<?php
return [
        'route_prefiex' => 'b_',
        'menu' => [
                'profile' => ['title' => '会员首页', 'icon' => 'icon-index', 'uri' => '/'],
                /*'job' => ['title' => '招聘', 'icon' => 'icon-recurit', 'uri' => '/', 'pid' => 1,
                    'next' => [
                        'high_level' => ['title' => '高端招聘', 'ty' => 6],
                        'enterprise' => ['title' => '企业招聘', 'ty' => 7],
                        'campus' => ['title' => '校园招聘', 'ty' => 8],
                    ]
                ],
                'resume' => ['title' => '简历管理', 'icon' => 'icon-resume', 'uri' => '/',
                    'next' => [
                        'receive' => ['title' => '简历收件箱'],
                        'downloaded' => ['title' => '已下载简历'],
                    ]
                ],*/
                'training' => ['title' => '职业培训管理', 'icon' => 'icon-cultivate', 'uri' => '/', 'pid' => 2,
                    'next' => [
                        'skill' => ['title' => '技能培训', 'ty' => 28],
                        'enterprise' => ['title' => '企业培训', 'ty' => 65],
                        'online' => ['title' => '在线学习', 'ty' => 66],
                    ]
                ],
                'certificate' => ['title' => '证书管理', 'icon' => 'icon-cerify', 'uri' => '/', 'pid' => 3,
                    'next' => [
                        'qualifications' => ['title' => '职业资格信息', 'ty' => 9],
                        'upgraded' => ['title' => '专升本信息', 'ty' => 10],
                        'graduate' => ['title' => '考研信息', 'ty' => 11],
                    ]
                ],
                'education' => ['title' => '国际教育管理', 'icon' => 'icon-nation', 'uri' => '/', 'pid' => 4,
                    'next' => [
                        'study' => ['title' => '国际留学', 'ty' => 12],
                        'tour' => ['title' => '国际游学', 'ty' => 13],
                        'camp' => ['title' => '国际夏令营', 'ty' => 14],
                        'joint' => ['title' => '国际联合办学', 'ty' => 15],
                    ]
                ],
                'certification' => ['title' => '实名认证', 'icon' => 'icon-certification', 'uri' => '/'],
                // 'order' => ['title' => '订单管理', 'icon' => 'icon-order', 'uri' => '/'],
                'config' => ['title' => '用户管理', 'icon' => 'icon-user', 'uri' => '/'],
                'safe' => ['title' => '安全设置', 'icon' => 'icon-safety', 'uri' => '/'],
        ],
];