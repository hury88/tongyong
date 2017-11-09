<?php
defined('DS') or define('DS', DIRECTORY_SEPARATOR);
defined('EXT') or define('EXT', '.php');
defined('CORE_PATH') or define('CORE_PATH', __DIR__ . DS  . 'public' . DS . 'web_manage' . DS . 'core' . DS);
defined('LOG_PATH') or define('LOG_PATH', CORE_PATH  . 'logs' . DS);
return [


    // +----------------------------------------------------------------------
    // | 应用设置
    // +----------------------------------------------------------------------

    // 应用命名空间
    'app_namespace'          => 'kwsem',
    // 应用调试模式
    'app_debug'              => true,
    // 应用模式状态
    'app_status'             => '',
    // +----------------------------------------------------------------------
    // | 数据库设置
    // +----------------------------------------------------------------------

    'database'               => [
        // 数据库类型
        'type'            => 'mysql',
        // 数据库连接DSN配置
        'dsn'             => '',
        // 服务器地址
        'hostname'        => '192.168.0.88',
        // 数据库名
        'database'        => 'tongyong',
        // 数据库用户名
        'username'        => 'tongyong',
        // 数据库密码
        'password'        => '123',
        // 数据库连接端口
        'hostport'        => '3306',
        // 数据库连接参数
        'params'          => [],
        // 数据库编码默认采用utf8
        'charset'         => 'utf8',
        // 数据库表前缀
        'prefix'          => 'kw_',
        // 数据库调试模式
        'debug'           => true,
        // 数据库部署方式:0 集中式(单一服务器),1 分布式(主从服务器)
        'deploy'          => 0,
        // 数据库读写是否分离 主从式有效
        'rw_separate'     => false,
        // 读写分离后 主服务器数量
        'master_num'      => 1,
        // 指定从服务器序号
        'slave_no'        => '',
        // 是否严格检查字段是否存在
        'fields_strict'   => true,
        // 数据集返回类型
        'resultset_type'  => 'array',
        // 自动写入时间戳字段
        'auto_timestamp'  => false,
        // 时间字段取出后的默认时间格式
        'datetime_format' => 'Y-m-d H:i:s',
        // 是否需要进行SQL性能分析
        'sql_explain'     => false,
    ],

    // 扩展函数文件
    'extra_file_list'        => [
        'function' . DS . 'all',
        'WEB'    =>  'function' . DS . 'web',
        'WEB2'   =>  'function' . DS . 'web_pc',
        'ADMIN'  =>  'function' . DS . 'admin',
        CORE_PATH . 'helper' . EXT,
    ],
    // 默认输出类型
    'default_return_type'    => 'html',
    // 默认AJAX 数据返回格式,可选json xml ...
    'default_ajax_return'    => 'json',
    // 默认JSONP格式返回的处理方法
    'default_jsonp_handler'  => 'jsonpReturn',
    // 默认JSONP处理方法
    'var_jsonp_handler'      => 'callback',
    // 默认时区
    'default_timezone'       => 'PRC',
    // 默认全局过滤方法 用逗号分隔多个
    'default_filter'         => 'trim,htmlspecialchars',
    // 默认语言
    'default_lang'           => 'zh-cn',

    // +----------------------------------------------------------------------
    // | URL设置
    // +----------------------------------------------------------------------

    // PATHINFO变量名 用于兼容模式
    'var_pathinfo'           => 's',
    // 兼容PATH_INFO获取
    'pathinfo_fetch'         => ['ORIG_PATH_INFO', 'REDIRECT_PATH_INFO', 'REDIRECT_URL'],
    // pathinfo分隔符
    'pathinfo_depr'          => '/',
    // URL伪静态后缀
    'url_html_suffix'        => 'html',
    // URL普通方式参数 用于自动生成
    'url_common_param'       => false,
    // URL参数方式 0 按名称成对解析 1 按顺序解析
    'url_param_type'         => 0,
    // 是否开启路由
    'url_route_on'           => true,
    // 路由配置文件（支持配置多个）
    'route_config_file'      => ['route'],
    // 路由使用完整匹配
    'route_complete_match'   => false,
    // 是否强制使用路由
    'url_route_must'         => false,
    // 域名部署
    'url_domain_deploy'      => false,
    // 域名根，如thinkphp.cn
    'url_domain_root'        => '',
    // 是否自动转换URL中的控制器和操作名
    'url_convert'            => true,
    // 默认的访问控制器层
    'url_controller_layer'   => 'controller',
    // 表单请求类型伪装变量
    'var_method'             => '_method',
    // 表单ajax伪装变量
    'var_ajax'               => '_ajax',
    // 表单pjax伪装变量
    'var_pjax'               => '_pjax',
    // 是否开启请求缓存 true自动缓存 支持设置请求缓存规则
    'request_cache'          => false,
    // 请求缓存有效期
    'request_cache_expire'   => null,
    // 全局请求缓存排除规则
    'request_cache_except'   => [],

    // +----------------------------------------------------------------------
    // | 日志设置
    // +----------------------------------------------------------------------

    'log'                    => [
        // 日志开启
        'record'  => true,
        // 日志记录方式，内置 file socket 支持扩展
        'type'    => 'File',
        // 日志保存目录
        'path'    => LOG_PATH,
        // 日志记录大小
        'size'    => 2097152,
        // 日志记录级别
        'level'   => [],
    ],

    // +----------------------------------------------------------------------
    // | 图片设置
    // +----------------------------------------------------------------------
    'pic'                    => [
        //上传文件路径
        'upload'  => '/uploadfile/upload/',
        'imgsize'  => '1200*1200',
        //上传文件路径
        'needImage'  => '/uploadfile/needImage/',
        'headImage'  => '/uploadfile/headImage/',
        'headImageDefault'  => '/style/img/info_03.png',
        'bgImageDefault'  => '/style/img/center_01.jpg',
        //图片不存在
        'nopic'   => '/uploadfile/nopic.jpg',
    ],

    // +----------------------------------------------------------------------
    // | 会话设置
    // +----------------------------------------------------------------------

    'session'                => [
        'id'             => '',
        // SESSION_ID的提交变量,解决flash上传跨域
        'var_session_id' => '',
        // SESSION 前缀
        'prefix'         => 'hr',
        // 驱动方式 支持redis memcache memcached
        'type'           => '',
        // 是否自动开启 SESSION
        'auto_start'     => true,
        'httponly'       => true,
        'secure'         => false,
    ],

    // +----------------------------------------------------------------------
    // | Cookie设置
    // +----------------------------------------------------------------------
    'cookie'                 => [
        // cookie 名称前缀
        'prefix'    => 'app_',
        // cookie 保存时间(15天)
        'expire'    => time() + 1296000,
        // cookie 保存路径
        'path'      => '/',
        // cookie 有效域名
        'domain'    => '',
        //  cookie 启用安全传输
        'secure'    => false,
        // httponly设置
        'httponly'  => '',
        // 是否使用 setcookie
        'setcookie' => true,
    ],


    //分页配置
    'paginate'               => [
        'type'      => 'bootstrap',
        'var_page'  => 'page',
        'list_rows' => 15,
    ],
    //常用配置
    'webarr'                 => [
        'showtype'  =>  ['1' => '新闻列表','2' => '单一内容', '3' => '招聘模块', '4' => '友情链接', '5' => '单条信息', '6' => '轮播图', '7' => '留言模块', '8' => '文件下载','9' => '培训模块','10' => '类别分类', '11' => '图文列表', '12' => '教育模块', '13' => '报名新闻','14' => '会员模块','15' => '常见问题', '16' => '职业证书'],
        //action.php使用到
        'showtype2' => ['1' => 'master', '2' => 'content', '3' => 'job', '4' => 'link', '5' => 'master', '6' => 'link', '7' => 'message', '8' => 'link', '9' => 'training', '10' => 'nature', '11' => 'master', '12' => 'education', '13' => 'master', '14' => 'user', '15' => 'master', '16' => 'certificate'],

        'isstate'   => ['未审核', '已审核', 'isstate'],
        'status'   => ['未阅读', '已阅读', 'status'],
        'issued'   => ['未发布', '已发布', 'issued'],
        'isgood'    => ['未推荐', '已推荐', 'isgood'],
        'certified'    => ['未认证', '已认证', 'certified'],
        'istop'     => ['未置顶', '置顶', 'istop'],
        'isdownload'   => ['本地文件', '外链下载', 'istop'],
        'isindex'   => ['未首页','在首页', 'istop'],
        'certificate'=>['1'=>'职业资格类','2'=>'专业技能类','3'=>'技术认证类'],//选择证书类id：1=>'职业资格类', 2=>'专业技能类',3=>'技术认证类‘
        'infotypeid'=>['1'=>'招生信息','2'=>'宣讲会信息','3'=>'校园活动'], //院校信息类型
        'trainingid'=>['1'=>'直播培训','2'=>'视频培训','3'=>'教材培训','4'=>'线下培训'],//培训方式；1=>'直播培训'；2=>'视频方式';3=>'教材培训'；4=>'线下培训'
        'onlineid'=>['1'=>'人力资源培训','2'=>'战略管理培训','3'=>'采购培训','4'=>'其他培训'],//培训方式；1=>'直播培训'；2=>'视频方式';3=>'教材培训'；4=>'线下培训'
        'is_hot'   => ['不是热销商品','是热销商品', 'is_hot'],
        'is_recommend'   => ['未推荐','已推荐', 'is_recommend'],
        'is_new'   => ['不是新品','是新品', 'is_new'],

        'pageType'   => ['1'=>'文本', '2'=>'视频', '3'=>'外链'],

        // array('/','\\','>','<','#','*','|','?',':','"')
    ],

    'notices' => [
        'certification' => '企业会员实名认证申请',
        'certification_person' => '个人会员实名认证申请',
        'certification_request' => '企业会员实名认证申请',
        'certification_refuse' => '企业会员实名认证失败',
        'certification_ok' => '企业会员实名认证成功',
        'order_new' => '有一个新订单',
        'x' => '提款',
        'xx' => '退款',
    ],
    'trans' => [
        'request' => '申请',
        'ok' => '通过',
        'refuse' => '拒绝',
        'new' => '新',
        'handled' => '已处理',
    ],
    'action_types' => [
        'certification' => '企业会员实名认证申请',
        'certification_person' => '个人会员实名认证申请',
    ],
    'allowed_action_types_id' => '1,2,3,6,7,8,15,16',
    'business' => [
        'size' => [1=>'10-20人',2=> '20-50人',3=> '50-100人', 4=>'100-500人',5=> '500人以上'],

        'education' => [1=>'无学历要求', 2=>'高中/中专/中技及以下',3=>'大专及同等学历', 4=>'本科/学士及等同学历',5=>'硕士/研究生及等同学历',6=>'博士及以上',7=>'其他'],
        'experience' => [1=>'无经验', 2=>'1年以下',3=>'1-3年', 4=>'3-5年',5=>'5-10年',6=>'10年以上'],
        'salary'=>[1 => '1000元/月以下',2 => '1000-2000元/月', 3 => '2001-4000元/月',4=> '4001-6000元/月',5 => '6001-8000元/月', 6 => '8001-10000元/月', 7 => '10001-15000元/月', 8 => '15000-25000元/月',9 => '25000-35000元/月',10 => '35000-50000元/月', 11 => '50000元/月以上'],
        'condition'=>[1=>'我目前处于离职状态，可立即上岗', 2=>'我目前在职，正考虑换个新环境（如有合适的工作机会，到岗时间一个月左右）',3=>'我对现有工作还算满意，如有更好的工作机会，我也可以考虑。（到岗时间另议）',4=>'目前暂无跳槽打算',5=>'应届毕业生'],
        'nature' => [1 => '国企',2 => '外商独资', 3 => '代表处',4=> '合资',5 => '民营', 6 => '股份制企业', 7 => '上市公司', 8 => '国家机关',9 => '事业单位',10 => '银行', 11 => '医院',12=>'学校/下级学院',13=>'律师事务所',14=>'社会团体',15=>'港澳台公司',16=>'其它'],//公司性质
        'relative' => [1 => '五险一金',2 => '带薪年假', 3 => '优秀团队',4=> '办公环境好',5 => '周末双休', 6 => '年终分红', 7 => '加班补助', 8 => '全勤奖',9 => '包吃',10 => '包住', 11 => '交通补助',12=>'餐补',13=>'房补',14=>'通讯补贴',15=>'弹性工作',16=>'免费体检',17=>'试用期全薪',18=>'定期体检',19=>'员工旅游',20=>'高温补贴',21=>'节日福利',],//亮点标签

        'work_nature'=>[1=>'全职', 2=>'兼职',3=>'实习',4=>'校园'],    //工作性质
        'stime'=>[1=>'今天', 2=>'最近三天',3=>'最近一周',4=>'最近一月'],
    ],
    'order' => [
        'orderBy' => [ 'created_at' => '按下单时间', 'status' => '按订单状态'],
        'pay_style' => ['待支付', '支付宝支付', '微信支付'],
        'status' => [1=>'已取消', 2=>'已退款', 3=>'未付款', 4 => '已付款'],
        // 'pending','received','sent'
        'status_reverse' => ['cancelled' => 1,'refund' => 2, 'new' => 3, 'paid' => 4],
    ],
    // JIANLI
    'resume' => [
        'business_status' => [
            '未处理',
            '拒绝',
            '邀请中',
            '被拒绝',
        ],
    ],

    'other'                  => [
        // 'nocontent'  => '<p style="text-align:center;width:100%;padding:20px 0;">内容更新中</p>',
        'nocontent'  => '<p style="text-align:center;width:90%;padding:38px 0;">内容更新中</p>',
        // 'nocontent'  => '<p style="text-align:center;width:100%;padding:20px 0;">Content Updates</p>',
        'noresult'   => '<p style="text-align:center">未查询到结果...</p>',
        'order'      => 'isgood desc , disorder desc, sendtime desc',
    ],

    'tips'                  => [
        'login' => '请先登录',

        'first'     => '您的名字不能为空',
        'last'      => '您的姓氏不能为空',
        'country'   => '您的国家不能为空',
        'email'     => '邮箱不正确',
        'phone'     => '请填写正确的手机号码',
        // 'phone'     => '您的手机号码不能为空并请填写正确的手机号',
        'password'  => '密度长度不正确,请输入8-20位字符',
        'yzm'       => '验证码不能为空',
        'yzm_expired' => '请不要重复获取验证码',
        'yzm_error' => '验证码错误',
        #邮件->发送验证
        'mail_success' => '租用注意, 电子邮件已成功发送',
        'mail_failed'  => '抱歉!邮件传递失败',
        #短信->发送验证
        'sms_success' => '短信发送成功请注意',
        'sms_failed'  => 'SMS 发送失败',
        #注册
        'reg_mobile_existed' => '用户已存在',
        'reg_success' => '注册成功',
        'reg_failed'  => '帐户已注册',
        #找回
        'lookup_success' => '找回成功^_^',
        'lookup_failed'  => '找回失败)^(',
        #登陆
        'login_password_empty'   => '请输入密码',
        'login_failed'  => '用户名或密码错误',
        'login_success' => '登录成功',
        'logout_failed' => '退出失败',
        #需求建议
        'proposal' => '请填写您的意见或建议',
        'submit_success' => '提交成功!',
        'submit_failed' => '提交失败!',
        'Tupload' => '上传成功!',
        'Fupload' => '上传失败!',
        #重置密码
        'reset_success'  => '密码重置成功',
        'reset_failed'  => '帐户不存在',
        'reset_failed2' => '新密码与原始密码相同',
        #修改密码
        'orignPassword' => '请输入原始密码',
        'orignPassword_confirm_failed' => '原始密码不正确',
        'newPassword' => '新密码长度不正确',
        'newEqualsOld' => '新密码与原始密码相同',
        'repeatNewPassword' => '新密码与确认密码不一致',
        'modify_success'  => '密码修改成功',
        #修改数据
        'modifyData_success'  => '修改成功',
        'modifyData_failed'  => '修改失败',
        #预定表单
        'date_year' => '请选择出生日期',
        'date_month' => '请选择出生日期',
        'date_day' => '请选择出生日期',
        'country' => '请输入国家',
        'city' => '请输入城市',
        'postcode' => '请输入邮编',
        'notes' => '请输入备注',
        'shares' => '请输入共享',
        'book_success' => '订购成功后, 我们将尽快与您联系!',
        'book_failed' => '对不起, 因为邮件线路不顺畅, 请稍后再试, 给您带来麻烦我们非常抱歉!',

        // 购车有关的提示
        'cart' => [
            'un_stock' => '提示:库存不足'
        ],
    ],

    'translator'                  => [
        'home' => 'HOME',
        'page' => [
            'prev' => 'Previous',
            'next' => 'Next',
            'last' => 'Last',
            'first' => 'First',
        ],
        'CooperationProcess' => 'Cooperation process',
        'contact_title' => 'Get In Touch With Us',
        'contact' => 'We are here to help. Want to learn more about our services?Pease get in touch, we\'d love to hear from you!',
        'download_alert1' => 'Please fill in your contact information and suggestions! Thank you! ',
        'download_alert2' => 'Welcome to the online message! ',
    ],

    'r404' => '<iframe src="/404.html" style="width:100%;height:800px" frameborder="0"></iframe>',

];
