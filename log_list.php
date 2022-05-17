<?php
/**
 * 站点首页模板
 */
if (!defined('EMLOG_ROOT')) {
    exit('error!');
}
?>
    <div id="content">
    <div id="contentleftt" style="background-color: rgba(255, 255, 255, 0.6);">
        <?php doAction('index_loglist_top'); ?>

        <?php
        if (!empty($logs)):
            foreach ($logs as $value):
                ?>
                <article class="post-list" role="article">
                    <h2>
                        <?php
                        if ($value['views'] >= 500) echo '<span class="hot-label">热门</span><i class="hot-arrow"></i> ';
                        if ((time() - $value['date']) < 86400 * 3) echo '<span class="new-label">近期更新</span><i class="new-arrow"></i>';
                        ?>
                        <a href="<?php echo $value['log_url']; ?>" title="<?php echo $value['log_title']; ?>"><?php echo $value['log_title']; ?></a>
                    </h2>
                    <div class="date1">
                        <i class="fa fa-clock-o"></i> 时间：<?php echo date('Y-m-d', $value['date']); ?>&nbsp;
                        <i class="fa fa-user"></i> 作者：<?php echo iitboyDice_log_author($value['author']); ?>&nbsp;
                        <i class="fa fa-sort"></i> 分类：<?php echo iitboyDice_log_sort($value['logid']); ?>&nbsp;
                        <i class="fa fa-eye"></i> 热度：<?php echo $value['views']; ?>&nbsp;
                        <i class="fa fa-comment"></i>
                        评论：<a href="<?php echo $value['log_url']; ?>#comments"><?php echo $value['comnum']; ?></a>&nbsp;
                        <i class="fa fa-edit"></i> <?php editflg($value['logid'], $value['author']); ?>
                    </div>
                    <div class="date3">
                        时间：<?php echo date('Y-m-d', $value['date']); ?>&nbsp;
                        分类：<?php echo iitboyDice_log_sort($value['logid']); ?>&nbsp;
                        热度：<a href="<?php echo $value['log_url']; ?>"><?php echo $value['views']; ?></a>&nbsp;
                    </div>
                    <?php if (_g('log_img') == 'open'): ?>
                        <div class="fl thumbnail_box">
                            <div class="thumbnail1">
                                <a href="<?php echo $value['log_url']; ?>" title="<?php echo $value['log_title']; ?>">
                                    <div class="boder_round">
                                        <?php
                                        $cover = $value['log_cover'] ?: iitboyDice_log_img($value['logid'], $value['content']);
                                        echo _g('js_lazyload') == 'open' ? '<img src="' . _g('log_img_default') . '" data-original="' . $cover . '" class="shake shake-opacity hint--top hint--error lazyload" alt="' . $value['log_title'] . '">' : '<img src="' . $cover . '" class="shake shake-opacity hint--top hint--error" alt="' . $value['log_title'] . '">'; ?>
                                    </div>
                                </a>
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php echo iitboyDice_log_description($value['log_description']); ?>
                    <div style="clear:both;"></div>
                    <div class="r">
                        <a href="<?php echo $value['log_url']; ?>">
                            <i class="fa fa-list"></i> 阅读全文»</a></div>
                    <div id="gaodu1"></div>
                    <div class="line"></div>

                </article>
            <?php
            endforeach;
        else:
            ?>
            <h2>未找到</h2>
            <p>抱歉，没有符合您查询条件的结果。</p>
        <?php endif; ?>
        <div id="pagemenui">
            <?php echo $page_url; ?>
        </div>
    </div><!-- end #contentleftt-->
<?php
include View::getView('side');
include View::getView('footer');
?>