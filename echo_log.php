<?php
/**
 * 阅读文章页面
 */
if (!defined('EMLOG_ROOT')) {
    exit('error!');
}
?>
    <div id="content">
    <div id="contentleftt" style="background-color: rgba(255, 255, 255, 0.6);">

        <div class="biaoti" id="masked"><?php topflg($top); ?><?php echo $log_title; ?></div>
        <div class="date2">
            <?php echo iitboyDice_log_sort_all($sortid); ?>&nbsp;
            <i class="fa fa-user"></i> 作者：<?php blog_author($author); ?>&nbsp;
            <i class="fa fa-clock-o"></i> <?php echo date("Y年m月d日", $date); ?>&nbsp;
            <i class="fa fa-eye"></i> 热度：<?php echo $views; ?>&nbsp;
            <i class="fa fa-comment"></i> 评论：<?php echo $comnum; ?>&nbsp;
            <?php if (_g('baidu') == 'open') echo iitboyDice_log_baidu($logid); ?>&nbsp;
            <?php echo iitboyDice_log_edit($logid, $author); ?>&nbsp;
        </div>

        <div class="date4">
            时间：<?php echo date('Y-n-j G:i', $date); ?>&nbsp;&nbsp;
            热度：<?php echo $views; ?>°&nbsp;
        </div>
        <div class="xiantiao"><img src="<?php echo TEMPLATE_URL; ?>images/xiantiao1.png"></div>
        <div id="zoom"><?php echo $log_content; ?></div>
        <?php doAction('down_log', $logid); ?>
        <div class="post-tags"><?php echo iitboyDice_log_tags($logid); ?></div>
        <?php if (_g('log_copyright') == 'open'): ?>
            <div id="banquan">
                <?php if (_g('log_qrcode') == 'open'): ?>
                    <div id="log-qrcode" class="tupian hint--right hint--rounded" title="这篇文章太棒了，我要分享给我的小伙伴们！&#10;&#10; 1、用手机扫二维码。&#10;&#10; 2、点右上角就可以分享到朋友圈啦。">
                        <?php if (_g('js_qrcode') == 'close'): ?>
                            <img src="<?php echo (empty(_g('log_qrcode_api')) ? 'https://api.isoyu.com/qr/?m=2&e=L&p=3&url=' : _g('log_qrcode_api')) . Url::log($logid); ?>" alt="二维码加载中...">
                        <?php endif; ?>
                    </div>
                <?php if (_g('js_qrcode') == 'open'): ?>
                    <script>$('#log-qrcode').qrcode({text: window.location.href, size: 100, quiet: 2,});</script>
                <?php endif; ?>
                <?php endif; ?>
                <div class="xinxi">
                    <span class="zuozhe">本文作者：</span><?php blog_author($author); ?> &nbsp;&nbsp;&nbsp;&nbsp;
                    <span class="biaoti2">文章标题：</span>
                    <a href="<?php echo Url::log($logid); ?>"><?php echo $log_title; ?></a><br>
                    <span class="blog_url">本文地址：</span><a href="<?php echo Url::log($logid); ?>"><?php echo Url::log($logid); ?></a><br>
                    <b>版权声明：</b>若无注明，本文皆为“<span class="blog_name"><?php echo $blogname; ?></span>”原创，转载请保留文章出处。
                </div>
                <div id="gaodu1"></div>
            </div>
        <?php endif; ?>
        <?php doAction('copyright_log', $logData); ?>
        <div class="cutline"><span><a href="#">正文到此结束</a></span></div>

        <div class="rkdic">
            <?php if (_g('ad_log') == 'open') echo _g('ad_log_text'); ?>
        </div>

        <div class="clear"></div>
        <div id="shangxiapian_2"><?php neighbor_log2($neighborLog); ?>
            <div id="gaodu1"></div>
        </div>
        <div id="shangxiapian"><?php neighbor_log($neighborLog); ?>
            <div id="gaodu1"></div>
        </div>
        <?php echo iitboyDice_related_logs($logData); ?>
        <?php doAction('log_related', $logData); ?>
        <?php blog_comments_post($logid, $ckname, $ckmail, $ckurl, $verifyCode, $allow_remark); ?>
        <?php blog_comments($comments); ?>
        <div style="clear:both;"></div>
    </div><!--end #contentleftt-->

<?php
include View::getView('side');
include View::getView('footer');
?>