<?php

return [

    // pid ty tty 映射 如 about代表pid=36
    'ptt' =>   [
        1=>[                                                        #===职业招聘
            7=>"/Enterprise",                                    #===企业招聘
            8=>"job/Campus",                                        #===校园招聘
            6=>"job/high-level",                                        #===高端招聘
            64=>"job/school"                                            #===院校信息发布
            ],
        2=>[                                                        #===职业培训
            65=>"training/Enterprise",                              #===企业培训
            66=>"training/online",                                  #===在线学习
            28=>"training/Skill",                                   #===技能培训
            ],
        3=>[                                                        #===职业证书
            10=>"Certificate/Upgraded/index",                       #===专升本信息
                59=>"Certificate/Upgraded/problem",                 #===常见问题
                58=>"Certificate/Upgraded/Consultation",            #===考研咨询
                57=>"Certificate/Upgraded/school",                  #===招考院校信息
                56=>"Certificate/Upgraded/major",                   #===热门专业
            11=>"Certificate/Graduate/index",                       #===考研信息
                61=>"Certificate/Graduate/school",                  #===团校一览表
                63=>"Certificate/Graduate/problem",                 #===常见问题
                62=>"Certificate/Graduate/Consultation",            #===考研资讯
                60=>"Certificate/Graduate/Coach",                   #===考研辅导
            9=>"Certificate/Qualifications/index",                  #===职业资格信息
                 54=>"Certificate/Qualifications/Administration",   #===证书管理
                 55=>"Certificate/Qualifications/Notice",           #===通知公告
            ],
        4=>[                                                        #===国际教育
            14=>"education/summer_camp/index",                      #===国际夏令营
                32=>"education/summer_camp/dynamic",                #===实时动态
                29=>"education/summer_camp/Hot",                    #===火爆线路
                30=>"education/summer_camp/characteristic",         #===特色线路
                31=>"education/summer_camp/Marvellous",             #===精彩瞬间
            13=>"education/Study/index",                            #===国际游学
                61=>"education/Study/international",                #===国际游学
                63=>"education/Study/guarantee",                    #===游学保障
                62=>"education/Study/Answer",                       #===游学解答
                60=>"education/Study/Route",                        #===游学路线
            12=>"education/study_abroad/index",                     #===国际留学
                 21=>"education/study_abroad/introduce",            #===学院介绍
                 23=>"education/study_abroad/Notice",               #===活动公告
                 22=>"education/study_abroad/guide",                #===留学指南
                 20=>"education/study_abroad/news",                 #===留学新闻
            15=>"education/Joint_Education/index",                  #===国际联合办学
                 34=>"education/Joint_Education/domestic",          #===国内院校
                 33=>"education/Joint_Education/international",     #===国际院校
                 35=>"education/Joint_Education/Notice",            #===活动公告
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
            'opinion' => 40,                                     #===意见反馈
            'agreement' => 42,                                   #===用户协议
            'contract' => 43,                                    #===服务合同
           ],
        44=>[                                                       #===会员管理
            45=>"news/member",                                      #===个人会员
            46=>"news/cmember",                                     #===企业会员
        ],
    ],

];
