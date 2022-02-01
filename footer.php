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
        <a onclick="goTop();" href="javascript:void(0);">返回顶部</a> &nbsp;&nbsp;
        <a href="/">首页</a> &nbsp;&nbsp;
        <a href="<?php echo BLOG_URL; ?>m/" title="手机版本" target="_blank">手机版本</a> &nbsp;&nbsp;
        <a href="<?php echo BLOG_URL; ?>admin" title="站长的后花园，闲人止步！ ^_^">后花园</a>&nbsp;&nbsp;
        <a href="#" title="会员注册" target="_blank">会员注册</a> &nbsp;&nbsp;
        <br>版权所有：<a href="<?php echo BLOG_URL; ?>" class="chaffle" data-chaffle="zh"><?php echo $blogname; ?></a>&nbsp;&nbsp;&nbsp;
        站长：<span>
                <?php
                if (!empty($tws)):
                    echo $author; //微语;
                elseif (isset($logid)):
                    blog_author($author); //日志＋自建页面;
                else:
                    blog_author($value['author']); //列表页
                endif;
                ?>
            </span>&nbsp;&nbsp;&nbsp;
        <a href="http://dxoca.cn" target="_blank" title="看看作者还有什么新鲜的“主题”勒？" class="hint--top hint--bounce">主题：<span data-chaffle="cn" data-chaffle-onLoad>寒光唯美式</span></a>&nbsp;&nbsp;
        <a href="http://www.emlog.net" title="大名鼎鼎的emlog博客系统，地球人都在用。" target="_blank">程序：emlog</a>&nbsp;&nbsp;
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
    </div>
</div>
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
