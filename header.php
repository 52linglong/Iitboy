<?php
/*
Template Name:Dice寒光唯美式
Version:v220517
Description:一款二次元唯美响应式模版，采用 HTML5 + CSS3 响应式、智能化设计。在手机、平板、PC 上都能完美显示。<br><br><span style="color:#00a71e;">√为阅读而设计，为写作而存在！</span> &nbsp;&nbsp; ★更新时间：<span style="color:#00A04B;">2022年05月17日</span><br><br><a href="http://www.dxoca.cn/" target="_blank">寒光站点</a> &nbsp;&nbsp;  <a href="http://blog.52linglong.com/" target="_blank">Dice’s Blog</a> &nbsp;&nbsp;  <a href="https://blog.52linglong.com/theme/iitboyDice.html" target="_blank">使用说明</a> &nbsp;&nbsp;  <a href="http://blog.52linglong.com/about.html" target="_blank">关于我</a> &nbsp;&nbsp;  <a href="https://github.com/52linglong/Iitboy" target="_blank">Github</a> &nbsp;&nbsp;  <a href="http://blog.52linglong.com/donate.html" target="_blank" style="color: red;font-weight: bold;border: 1px solid;padding: 2px 5px;border-radius: 3px;">赞助支持</a><br><br>
Author:寒光&Dice
Author Url:http://blog.52linglong.com/
Sidebar Amount:1
*/
if (!defined('EMLOG_ROOT')) {
    exit('error!');
}
require_once View::getView('module');
?><!--
//
//
//
//
//
//
//
//
//  
//
//
//
//
//
//
//
//  
//
//
//
//
//
//
//
//  
//
//
//
//
//
//
//
//
//
//
//
//
//
//  
//
//
//
//
//
//
//
//  
//
//
//
//
//
//
//
//  
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//  
//
//
//
//
//
//
//
//  
//
//
//
//
//
//
//
//  
//
//
//
//
//
//
//
//                            _ooOoo_  
//                           o8888888o  
//                           88" . "88  
//                           (| -_- |)  
//                            O\ = /O  
//                        ____/`---'\____  
//                      .   ' \\| |// `.  
//                       / \\||| : |||// \  
//                     / _||||| -:- |||||- \  
//                       | | \\\ - /// | |  
//                     | \_| ''\---/'' | |  
//                      \ .-\__ `-` ___/-. /  
//                   ___`. .' /--.--\ `. . __  
//                ."" '< `.___\_<|>_/___.' >'"".  
//               | | : `- \`.;`\ _ /`;.`/ - ` : | |  
//                 \ \ `-. \_ __\ /__ _/ .-` / /  
//         ======`-.____`-.___\_____/___.-`____.-'======  
//                            `=---='  
//                 拦截插件累计拦截逗比攻击"2333"次！
//         .............................................  
//                  佛祖保佑             永无BUG 
//          佛曰:  
//                  写字楼里写字间，写字间里程序员；  
//                  程序人员写程序，又拿程序换酒钱。  
//                  酒醒只在网上坐，酒醉还来网下眠；  
//                  酒醉酒醒日复日，网上网下年复年。  
//                  但愿老死电脑间，不愿鞠躬老板前；  
//                  奔驰宝马贵者趣，公交自行程序员。  
//                  别人笑我忒疯癫，我笑自己命太贱；  
//                  不见满街漂亮妹，哪个归得程序员？

 <?php echo $site_title; ?>欢迎您！
 <?php echo BLOG_URL; ?>

-->
<!doctype html>
<html lang="zh">

<head>
    <meta charset="utf-8">
    <title><?php echo $site_title; ?></title>
    <meta name="keywords" content="<?php echo $site_key; ?>">
    <meta name="description" content="<?php echo $site_description; ?>">
    <meta name="generator" content="emlog iitboy dice">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <?php echo iitboyDice_dns_prefetch(); ?>
    <link rel="shortcut icon" href="/favicon.ico">
    <link rel="bookmark" href="/favicon.ico">
    <link rel="alternate" type="application/rss+xml" title="RSS" href="<?php echo BLOG_URL; ?>rss.php">
    <?php echo iitboyDice_assets('css'); ?>
    <link rel="stylesheet" href="<?php echo TEMPLATE_URL; ?>main.min.css">
    <?php echo iitboyDice_assets('js'); ?>
    <script>
        $(document).pjax('a[target!=_blank]', '#contentleftt', {fragment: '#contentleftt', timeout: 8000});
        $(document).on('pjax:send', function () {
            $(".loading,.loading2").css("display", "block");
            $(".donghua").removeClass("animate__animated animate__bounceInDown");
        });
        $(document).on('pjax:complete', function () {
            $(".loading,.loading2").css("display", "none");
            $(".donghua").addClass("animate__animated animate__bounceInDown").show();
            jQuery.getScript('<?php echo TEMPLATE_URL; ?>js/iitboy.min.js');
        });

        function sendinfo(url, node) {
            /*日历生成和翻页*/
            $("#" + node).load(url)
        }

        const SCROLL = <?php echo _g('auto_scroll') == 'open' ? 'true' : 'false'; ?>,
            HINT = <?php echo _g('css_hint') == 'open' ? 'true' : 'false'; ?>,
            LAZYLOAD = <?php echo _g('js_lazyload') == 'open' ? 'true' : 'false'; ?>,
            CHAFFLE = <?php echo (_g('js_chaffle') == 'open' && in_array(_g('cdn'), array('jsdelivr', 'close'))) ? 'true' : 'false'; ?>,
            IMGERROR = <?php echo _g('img_error') == 'open' ? 'true' : 'false'; ?>,
            IMGERRORSCR = '<?php echo _g('log_img_default'); ?>';
    </script>
    <?php doAction('index_head'); ?>
    <?php if (_g('bg') == 'open' && !empty(_g('bg_color'))): ?>
        <style>body {background: <?php echo _g('bg_color'); ?>;}</style>
    <?php endif; ?>
</head>

<body>
<div class="bg-fixed"></div>
<div class="donghua">
    <div id="iitboy_logo">
        <?php if (_g('logo') == 'open'): ?>
            <a href="/" title="<?php echo $blogname; ?>">
                <img src="<?php echo _g('logo_img'); ?>" class="animate__animated animate__tada" alt="">
            </a>
            <br>
        <?php endif; ?>
        <?php if (_g('hitokoto') == 'open'): ?>
            <div id="tock">
                <div class="hibox">
                    <div class="hi container">
                        <a href="javascript:" onclick="getkoto();" title="换一条"><span class="hitokoto" id="hitokoto">Loading...（欢迎来到<?php echo $blogname; ?>~ 我是会动的哟！）</span></a>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
    <div id="hjsbox"></div>
    <div id="sousuo2" title="在搜索框中输入关键字后，按“回车”即可搜到结果。">
        <form name="keyform" method="get" action="<?php echo BLOG_URL; ?>index.php">
            <input name="keyword" type="search" placeholder="框中输文字，回车索结果。">
        </form>
    </div>
    <div id="linkk">
        <div id="menu" style="background-color: rgba(0,0,0,0.6);">
            <?php blog_navi(); ?>
        </div>
        <div id="menu2">
            <?php blog_navi2(); ?>
        </div>
        <?php echo iitboyDice_twitter(); ?>
		
		
		
		