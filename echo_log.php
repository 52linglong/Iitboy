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

        <h1 class="biaoti" id="masked"><?php echo $log_title; ?></h1>
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
        <div id="emlogEchoLog"><?php echo $log_content; ?></div>
        <?php doAction('down_log', $logid); ?>
        <div class="post-tags"><?php echo iitboyDice_log_tags($logid); ?></div>
        <?php echo iitboyDice_log_copyright($logData); ?>
        <?php doAction('copyright_log', $logData); ?>
        <?php doAction('log_copyright', $logData); ?>
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