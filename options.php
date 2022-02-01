<?php
/*@support tpl_options*/
!defined('EMLOG_ROOT') && exit('access deined!');
include_once 'function.php';
$DTE = iitboyDice_getHeaderData();
$options = array(
    'TplOptionsNavi' => array(
        'type' => 'radio',
        'name' => '定义设置项标签页名称',
        'values' => array(
            'tpl-basic' => '基础设置',
            'tpl-list' => '列表设置',
            'tpl-log' => '文章设置',
            'tpl-side' => '边栏设置',
            'tpl-ad' => '广告设置',
            'tpl-other' => '其它设置',
        ),
        'description' => $DTE['agreement'] . '<br><br><hr><br>' . $DTE['tpldes']
    ),
    'cdn' => array(
        'labels' => 'tpl-basic',
        'type' => 'radio',
        'name' => '静态资源 CDN',
        'values' => array(
            'bootcdn' => 'BootCDN',
            'baomitu' => '360奇舞团',
            'staticfile' => '七牛云',
            'bytedance' => '字节跳动',
            'jsdelivr' => 'jsDelivr',
            'cdnjs' => 'CDNJS',
            'close' => '关闭',
        ),
        'default' => 'BootCDN',
        'description' => '稳定、快速、免费的前端开源项目 CDN 加速服务，关闭则使用本地资源'
    ),
    'csshake' => array(
        'labels' => 'tpl-basic',
        'type' => 'radio',
        'name' => 'CSS 元素抖动动画',
        'values' => array(
            'open' => '开启',
            'close' => '关闭',
        ),
        'default' => 'open',
        'description' => '使DOM元素抖动起来，就是为了好玩，可以关闭'
    ),
    'hint' => array(
        'labels' => 'tpl-basic',
        'type' => 'radio',
        'name' => 'CSS tooltips提示样式',
        'values' => array(
            'open' => '开启',
            'close' => '关闭',
        ),
        'default' => 'open',
        'description' => '快速实现tooltips提示样式，就是为了美化，可以关闭'
    ),
    'lazyload' => array(
        'labels' => 'tpl-basic',
        'type' => 'radio',
        'name' => 'JS 图片延迟加载',
        'values' => array(
            'open' => '开启',
            'close' => '关闭',
        ),
        'default' => 'open',
        'description' => '支持列表文章缩略图、文章正文图片、游客头像，可以关闭'
    ),
    'chaffle' => array(
        'labels' => 'tpl-basic',
        'type' => 'radio',
        'name' => 'JS 随机字符',
        'values' => array(
            'open' => '开启',
            'close' => '关闭',
        ),
        'default' => 'open',
        'description' => '允许你洗牌随机字符，可以关闭（仅适用jsDelivr、本地资源）'
    ),
    'qrcode' => array(
        'labels' => 'tpl-basic',
        'type' => 'radio',
        'name' => 'JS 二维码',
        'values' => array(
            'open' => '开启',
            'close' => '关闭',
        ),
        'default' => 'open',
        'description' => '动态生成二维码，可以关闭'
    ),
    'logo' => array(
        'labels' => 'tpl-basic',
        'type' => 'radio',
        'name' => 'logo',
        'values' => array(
            'open' => '开启',
            'close' => '关闭',
        ),
        'default' => 'open',
    ),
    'logoimg' => array(
        'labels' => 'tpl-basic',
        'type' => 'image',
        'name' => 'logo',
        'default' => TEMPLATE_URL . 'images/logo.png',
        'description' => '默认宽高：260X60，宽高没有限制，建议用png格式，若不能上传请改用ftp手动上传。'
    ),
    'hitokoto' => array(
        'labels' => 'tpl-basic',
        'type' => 'radio',
        'name' => '一言',
        'values' => array(
            'open' => '开启',
            'close' => '关闭',
        ),
        'default' => 'open',
    ),
    'twitter' => array(
        'labels' => 'tpl-basic',
        'type' => 'radio',
        'name' => '公告',
        'values' => array(
            'open' => '开启',
            'close' => '关闭',
        ),
        'default' => 'open',
        'description' => '开启后自动获取站长的最新笔记/微语'
    ),
    'twitter_div' => array(
        'labels' => 'tpl-basic',
        'type' => 'text',
        'name' => '公告自定义',
        'default' => '',
        'description' => '（支持HTML）优先显示自定义，为空时调用笔记/微语'
    ),
    'avatar' => array(
        'labels' => 'tpl-basic',
        'type' => 'image',
        'name' => '游客默认头像',
        'default' => TEMPLATE_URL . 'images/avatar.png',
        'description' => ''
    ),
    'log_img' => array(
        'labels' => 'tpl-list',
        'type' => 'radio',
        'name' => '列表文章左侧图片',
        'values' => array(
            'open' => '开启',
            'close' => '关闭',
        ),
        'default' => 'open',
        'description' => '开启后自动获取文章图片，文章封面->文章所属图片->正文图片->随机图片->默认图片'
    ),
    'log_img_default' => array(
        'labels' => 'tpl-list',
        'type' => 'image',
        'name' => '列表文章左侧默认图片',
        'default' => TEMPLATE_URL . 'images/list.jpg',
        'description' => ''
    ),
    'log_excerpt_num' => array(
        'labels' => 'tpl-list',
        'type' => 'text',
        'name' => '列表文章摘要截取',
        'default' => '150',
        'description' => ''
    ),
    'baidu' => array(
        'labels' => 'tpl-log',
        'type' => 'radio',
        'name' => '文章页百度收录',
        'values' => array(
            'open' => '开启',
            'close' => '关闭',
        ),
        'default' => 'open',
        'description' => ''
    ),
    'log_copyright' => array(
        'labels' => 'tpl-log',
        'type' => 'radio',
        'name' => '文章页版权信息',
        'values' => array(
            'open' => '开启',
            'close' => '关闭',
        ),
        'default' => 'open',
        'description' => ''
    ),
    'log_qrcode' => array(
        'labels' => 'tpl-log',
        'type' => 'radio',
        'name' => '文章页二维码',
        'values' => array(
            'open' => '开启',
            'close' => '关闭',
        ),
        'default' => 'open',
        'description' => '二维码启用规则，文章页二维码 > JS 二维码 > 文章页二维码 API'
    ),
    'log_qrcode_api' => array(
        'labels' => 'tpl-log',
        'type' => 'text',
        'name' => '文章页二维码 API',
        'default' => 'https://api.isoyu.com/qr/?m=2&e=L&p=3&url=',
        'description' => ''
    ),
    'related' => array(
        'labels' => 'tpl-log',
        'type' => 'radio',
        'name' => '文章页相关文章',
        'values' => array(
            'open' => '开启',
            'close' => '关闭',
        ),
        'default' => 'open',
    ),
    'related_type' => array(
        'labels' => 'tpl-log',
        'type' => 'radio',
        'name' => '相关文章类型',
        'values' => array(
            'sort' => '分类',
            'tag' => '标签',
        ),
        'default' => 'sort',
    ),
    'related_desc' => array(
        'labels' => 'tpl-log',
        'type' => 'radio',
        'name' => '相关文章排列方式',
        'values' => array(
            'rand' => '随机排列',
            'views_desc' => '点击数(降序)',
            'views_asc' => '点击数(升序)',
            'comnum_desc' => '评论数(降序)',
            'comnum_asc' => '评论数(升序)',
        ),
        'default' => 'rand',
    ),
    'related_num' => array(
        'labels' => 'tpl-log',
        'type' => 'text',
        'name' => '相关文章显示数量',
        'default' => '6',
        'description' => '设置相关文章显示数量，直接填写数字即可。',
    ),
    'blogger' => array(
        'labels' => 'tpl-side',
        'type' => 'radio',
        'name' => '个人资料',
        'values' => array(
            'open' => '开启',
            'close' => '关闭',
        ),
        'default' => 'open',
    ),
    'blogger_icon' => array(
        'labels' => 'tpl-side',
        'type' => 'checkbox',
        'name' => '个人资料图标',
        'values' => array(
            'qq' => 'QQ',
            'wechat' => '微信',
            'email' => '邮箱',
            'about' => '关于',
            'guestbook' => '留言',
            'donate' => '捐赠',
            'rss' => 'RSS',
        ),
        'default' => '',
        'description' => ''
    ),
    'qq' => array(
        'labels' => 'tpl-side',
        'type' => 'text',
        'name' => '站长QQ',
        'default' => '',
        'description' => ''
    ),
    'wechat_img' => array(
        'labels' => 'tpl-side',
        'type' => 'image',
        'name' => '站长微信二维码',
        'default' => TEMPLATE_URL . 'images/wechat.png',
        'description' => ''
    ),
    'email' => array(
        'labels' => 'tpl-side',
        'type' => 'text',
        'name' => '站长邮箱',
        'default' => '',
        'description' => '此处不填写，则调用<a href="./blogger.php" target="_blank">个人设置</a>的邮箱'
    ),
    'about' => array(
        'labels' => 'tpl-side',
        'type' => 'text',
        'name' => '关于站长',
        'default' => '',
        'description' => ''
    ),
    'guestbook' => array(
        'labels' => 'tpl-side',
        'type' => 'text',
        'name' => '在线留言',
        'default' => '',
        'description' => ''
    ),
    'donate' => array(
        'labels' => 'tpl-side',
        'type' => 'text',
        'name' => '捐赠支持',
        'default' => '',
        'description' => ''
    ),
    'donate_img' => array(
        'labels' => 'tpl-side',
        'type' => 'image',
        'name' => '捐赠支持二维码',
        'default' => TEMPLATE_URL . 'images/donate.png',
        'description' => ''
    ),
    'rss' => array(
        'labels' => 'tpl-side',
        'type' => 'text',
        'name' => 'RSS 订阅',
        'default' => '',
        'description' => ''
    ),
    'comment' => array(
        'labels' => 'tpl-side',
        'type' => 'text',
        'name' => '返回顶部中间“评”字链接',
        'default' => '/guestbook',
        'description' => '这个在首页点击是跳转到留言板的，如果是内页则跳转到评论处，一举两用。留言板可以用文章、页面来做，然后把地址粘贴在这里。'
    ),
    'ad_side' => array(
        'labels' => 'tpl-ad',
        'type' => 'radio',
        'name' => '边栏广告',
        'values' => array(
            'open' => '开启',
            'close' => '关闭',
        ),
        'default' => 'open',
    ),
    'ad_side_text' => array(
        'labels' => 'tpl-ad',
        'type' => 'text',
        'name' => '边栏广告内容',
        'multi' => true,
        'default' => '<a href="/" title="图片广告招租，30元1月。" target="_blank" rel="nofollow"><img src="' . TEMPLATE_URL . 'images/sideda.gif" alt=""/></a><br>
<li class="wzgg1"><a href="/" class="shake shake-little" title="文字招租：1月10元起" target="_blank" rel="nofollow">文字招租1：1月10元起</a></li>
<li class="wzgg2"><a href="/" class="shake shake-little" title="文字招租：1月10元起" target="_blank" rel="nofollow">文字招租2：1月10元起</a></li>
<li class="wzgg3"><a href="/" class="shake shake-little" title="本广告文字招租" target="_blank" rel="nofollow">文字招租3：1月10元起</a></li>
<li class="wzgg4"><a href="/" class="shake shake-little" title="本广告文字招租" target="_blank" rel="nofollow">文字招租4：1月10元起</a></li>',
        'description' => ''
    ),
    'ad_log' => array(
        'labels' => 'tpl-ad',
        'type' => 'radio',
        'name' => '文章广告',
        'values' => array(
            'open' => '开启',
            'close' => '关闭',
        ),
        'default' => 'open',
    ),
    'ad_log_text' => array(
        'labels' => 'tpl-ad',
        'type' => 'text',
        'name' => '文章广告内容',
        'multi' => true,
        'default' => '<a href="/" title="图片广告招租，30元1月。" target="_blank" rel="nofollow" style="width:100%;background: rgba(0,0,0,0.6);color: white;padding: 1rem 0;">文章广告招租，请联系站长</a>',
        'description' => ''
    ),
);
