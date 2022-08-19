<?php
/**
 * 页面底部信息
 */
if (!defined('EMLOG_ROOT')) {
    exit('error!');
}
?>
    <!--end #content-->
    </div>
    <div></div>
    <div id="footerbar-out" style="clear:both; margin: 0 auto; padding: 0;">
        <div id="footerbar">
            <?php if (empty(_g('foot_a'))): ?>
                <a onclick="goTop();" href="javascript:void(0);">返回顶部</a> &nbsp;&nbsp;
                <a href="/">首页</a> &nbsp;&nbsp;
                <a href="<?php echo BLOG_URL; ?>m/" title="手机版本" target="_blank">手机版本</a> &nbsp;&nbsp;
                <a href="<?php echo BLOG_URL; ?>admin" title="站长的后花园，闲人止步！ ^_^">后花园</a>&nbsp;&nbsp;
                <a href="<?php echo _g('login'); ?>" title="会员注册" target="_blank">会员注册</a> &nbsp;&nbsp;
            <?php else: echo _g('foot_a'); endif; ?>
            <br>
            <?php if (_g('foot_dice') == 'open'): ?>
                版权所有：
                <a href="<?php echo BLOG_URL; ?>" class="chaffle" data-chaffle="cn"><?php echo $blogname; ?></a>&nbsp;&nbsp;&nbsp;
                <a href="http://dxoca.cn" target="_blank" title="看看作者还有什么新鲜的“主题”勒？" class="hint--top hint--bounce">主题：<span data-chaffle="cn">寒光唯美式</span></a>&nbsp;&nbsp;
                <a href="http://www.emlog.net" title="大名鼎鼎的emlog博客系统，地球人都在用。" target="_blank">程序：<span data-chaffle="en" data-chaffle-onLoad>emlog</span></a>&nbsp;&nbsp;
                <br>
            <?php endif; ?>
            <a href="https://beian.miit.gov.cn" target="_blank"><?php echo $icp; ?></a>&nbsp;&nbsp;
            <?php echo $footer_info; ?>&nbsp;&nbsp;
            <?php doAction('index_footer'); ?>
        </div>
        <div id="dening">
            <div id="shangxia" class="animate__animated animate__bounceInUp">
                <div id="shang" title="回到顶部"></div>
                <div id="comt">
                    <?php if (empty($logid)): ?>
                        <a href="<?php echo _g('comment'); ?>" id="comt-reset" title="随便看看评论喽~"><img src="<?php echo TEMPLATE_URL; ?>images/kongbai.png" alt=""></a>
                    <?php endif; ?>
                </div>
                <div id="xia" title="直下底部"></div>
            </div>
            <script src="<?php echo TEMPLATE_URL; ?>js/iitboy.min.js"></script>
            <?php if (_g('hitokoto') == 'open'): ?>
                <script>
                    setTimeout("getkoto()", 1000);

                    function getkoto() {
                        fetch('https://v1.hitokoto.cn')
                            .then(response => response.json())
                            .then(data => {
                                const hitokoto = document.getElementById('hitokoto');
                                hitokoto.innerText = data.hitokoto
                            })
                            .catch(console.error)
                    }
                </script>
            <?php endif; ?>
            <script>

            </script>
        </div>
    </div>
<?php if (_g('bgi') == 'open'): ?>
    <img class="bg-image" src="<?php echo _g('bg_img'); ?>" alt="">
    <img class="mbg-image" src="<?php echo _g('mbg_img'); ?>" alt="">
<?php endif; ?>
    <div class="loading">
        <div class="loading2">
            <div class="block"></div>
            <div class="block"></div>
            <div class="block"></div>
            <div class="block"></div>
        </div>
    </div>

    </body>
    </html>
<?php
echo iitboyDice_html_speeder();