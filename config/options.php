<?php

return [

    // pid ty tty 映射 如 about代表pid=36
    'ptt' =>   [
        1=>[                                                        #===职业招聘
            7=>"/enterprise",                                    #===企业招聘
            8=>"job/campus",                                        #===校园招聘
            6=>"job/high-level",                                        #===高端招聘
            64=>"job/school"                                            #===院校信息发布
            ],
        2=>[                                                        #===职业培训
            65=>"training/enterprise",                              #===企业培训
            66=>"training/online",                                  #===在线学习
            28=>"training/skill",                                   #===技能培训
            ],
        3=>[                                                        #===职业证书
            10=>"certificate/upgraded/index",                 #===专升本信息
                59=>"certificate/upgraded/problem",                 #===常见问题
                58=>"certificate/upgraded/consultation",            #===考研咨询
                57=>"certificate/upgraded/school",                  #===招考院校信息
                56=>"certificate/upgraded/major",                   #===热门专业
            11=>"certificate/graduate/index",                 #===考研信息
                61=>"certificate/graduate/school",                  #===团校一览表
                63=>"certificate/graduate/problem",                 #===常见问题
                62=>"certificate/graduate/consultation",            #===考研资讯
                60=>"certificate/graduate/coach",                   #===考研辅导
            9=>"certificate/qualifications/index",            #===职业资格信息
                 54=>"certificate/qualifications/manage",   #===证书管理
                 55=>"certificate/qualifications/notice",           #===通知公告
            ],
        4=>[                                                  #===国际教育
            14=>"education/camp/index",                #===国际夏令营
                32=>"education/camp/dynamic",                #===实时动态
                29=>"education/camp/hot",                    #===火爆线路
                30=>"education/camp/characteristic",         #===特色线路
                31=>"education/camp/marvellous",             #===精彩瞬间
            13=>"education/tour/index",                      #===国际游学
                61=>"education/tour/international",                #===国际游学
                63=>"education/tour/guarantee",                    #===游学保障
                62=>"education/tour/answer",                       #===游学解答
                60=>"education/tour/route",                        #===游学路线
            12=>"education/study/index",               #===国际留学
                 21=>"education/study/introduce",            #===学院介绍
                 23=>"education/study/notice",               #===活动公告
                 22=>"education/study/guide",                #===留学指南
                 20=>"education/study/news",                 #===留学新闻
            15=>"education/joint/index",            #===国际联合办学
                 34=>"education/joint/domestic",          #===国内院校
                 33=>"education/joint/international",     #===国际院校
                 35=>"education/joint/notice",            #===活动公告
            ],
        'news'=>[                                                        #===新闻动态
            '_v_' => 5,
            17=>"news/company",                                     #===公司新闻
            16=>"news/education",                                   #===教育新闻
            18=>"news/industry",                                    #===行业新闻
            19=>"news/recent",                                      #===近期活动
            ],
        'about'=>[
            '_v_' => 36,                                         #===关于我们
            'contact' => 37,                                     #===联系我们
            'culture' => 38,                                     #===企业文化
            'legal' => 39,                                       #===法律申明
            'problem' => 41,                                     #===常见问题
            'feedback' => 40,                                     #===意见反馈
            'agreement' => 42,                                   #===用户协议
            'contract' => 43,                                    #===服务合同
           ],
        44=>[                                                       #===会员管理
            45=>"member/usr",                                      #===个人会员
            46=>"member/org",                                     #===企业会员
        ],
    ],

];
