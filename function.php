<?php
/**
 * function.php
 * 自定义函数
 * Author：Admin
 * Create：2022/1/28
 * Modify：2022/1/28
 */

function iitboyDice_getHeaderData()
{
    if (!is_file(dirname(__FILE__) . '/header.php')) {
        return false;
    }
    $tplData = implode('', @file(dirname(__FILE__) . '/header.php'));
    preg_match("/Template Name:(.*)/i", $tplData, $tplName);
    preg_match("/Template Url:(.*)/i", $tplData, $tplUrl);
    preg_match("/Version:(.*)/i", $tplData, $tplVersion);
    preg_match("/Author:(.*)/i", $tplData, $author);
    preg_match("/Description:(.*)/i", $tplData, $tplDes);
    preg_match("/Author Url:(.*)/i", $tplData, $authorUrl);
    return [
        'tplfile' => 'iitboyDice',
        'tplname' => !empty($tplName[1]) ? (trim($tplName[1])) : 'Dice寒光唯美式',
        'tplurl' => !empty($tplUrl[1]) ? (trim($tplUrl[1])) : '',
        'tpldes' => !empty($tplDes[1]) ? (trim($tplDes[1])) : '',
        'author' => !empty($author[1]) ? (trim($author[1])) : '',
        'author_url' => !empty($authorUrl[1]) ? (trim($authorUrl[1])) : '',
        'agreement' => '在原作者寒光同意的基础上进行二次开发，请尊重我们的劳动成果，用户不可二次转售，谢谢配合！<br/><br/>下载的模板仅供学习交流，若使用商业用途，请购买正版授权，否则产生的一切后果将由下载用户自行承担。<br/><br/>售后服务范围只限于处理主题自身bug、使用问题，不提供二次开发指导，也不处理服务器环境问题、域名类问题等。'
    ];
}

/**
 * CURL请求函数:支持POST及基本header头信息定义
 * @param string $api_url 目标url
 * @param array $post_data post参数
 * @param array $header 头信息数组
 * @param string $referer_url 来源url
 * @return array [code:状态码(200执行成功、400执行异常) | data:数据]
 */
function iitboyDice_curl($api_url, $post_data = [], $header = [], $referer_url = '')
{
    $ch = curl_init();//初始化CURL句柄
    curl_setopt($ch, CURLOPT_URL, $api_url);

    /**配置返回信息**/
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);//获取的信息以文件流的形式返回，不直接输出
    curl_setopt($ch, CURLOPT_HEADER, 0);//不返回header部分

    /**配置超时**/
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);//连接前等待时间,0不等待
    curl_setopt($ch, CURLOPT_TIMEOUT, 5);//连接后等待时间,0不等待。如下载mp3

    /**配置页面重定向**/
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);//跟踪爬取重定向页面
    curl_setopt($ch, CURLOPT_MAXREDIRS, 10);//指定最多的HTTP重定向的数量
    curl_setopt($ch, CURLOPT_AUTOREFERER, 1); // 自动设置Referer

    /**配置Header、请求头、协议信息**/
    if ($header && is_array($header)) {
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
    }
    curl_setopt($ch, CURLOPT_ENCODING, "");//Accept-Encoding编码，支持"identity"/"deflate"/"gzip",空支持所有编码
    curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);//模拟浏览器头信息
    if ($referer_url && is_array($referer_url)) {
        curl_setopt($ch, CURLOPT_REFERER, $referer_url);//伪造来源地址
    }
    //curl_setopt( $ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1 );    //设置curl使用的HTTP协议

    /**配置POST请求**/
    if ($post_data && is_array($post_data)) {
        curl_setopt($ch, CURLOPT_POST, 1);//支持post提交数据
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post_data));//
    }

    /**禁止证书验证防止curl输出空白**/
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);//禁止 cURL 验证对等证书
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);//是否检测服务器的域名与证书上的是否一致

    $code = 200; //执行成功
    $data = curl_exec($ch);
    //捕抓异常
    if (curl_errno($ch) || empty($data)) {
        $code = 400; //执行异常
        $data = curl_error($ch);
    }
    curl_close($ch);

    return ['code' => $code, 'data' => $data];
}

/**
 * CDN 数据
 * @return array[]
 */
function iitboyDice_cdn()
{
    return array(
        'bootcdn' => array(
            'cdn' => array(
                'css' => array(
                    'https://cdn.bootcdn.net/ajax/libs/animate.css/4.1.1/animate.min.css',
                    'https://cdn.bootcdn.net/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css',
                    'https://cdn.bootcdn.net/ajax/libs/csshake/1.5.3/csshake.min.css',
                    'https://cdn.bootcdn.net/ajax/libs/hint.css/2.7.0/hint.min.css',
                ),
                'js' => array(
                    'https://cdn.bootcdn.net/ajax/libs/jquery/1.12.4/jquery.min.js',
                    'https://cdn.bootcdn.net/ajax/libs/jquery.pjax/2.0.1/jquery.pjax.min.js',
                    'https://cdn.bootcdn.net/ajax/libs/jquery_lazyload/1.9.7/jquery.lazyload.min.js',
                    'https://cdn.bootcdn.net/ajax/libs/lrsjng.jquery-qrcode/0.9.5/jquery.qrcode.min.js',
                ),
            ),
            'dns' => 'https://cdn.bootcdn.net'
        ),
        'baomitu' => array(
            'cdn' => array(
                'css' => array(
                    'https://lib.baomitu.com/animate.css/4.1.1/animate.min.css',
                    'https://lib.baomitu.com/font-awesome/4.7.0/css/font-awesome.min.css',
                    'https://lib.baomitu.com/csshake/1.5.3/csshake.min.css',
                    'https://lib.baomitu.com/hint.css/2.6.0/hint.min.css',
                ),
                'js' => array(
                    'https://lib.baomitu.com/jquery/1.12.4/jquery.min.js',
                    'https://lib.baomitu.com/jquery.pjax/2.0.1/jquery.pjax.min.js',
                    'https://lib.baomitu.com/jquery_lazyload/1.9.7/jquery.lazyload.min.js',
                    'https://lib.baomitu.com/lrsjng.jquery-qrcode/0.18.0/jquery-qrcode.min.js',
                ),
            ),
            'dns' => 'https://lib.baomitu.com'
        ),
        'staticfile' => array(
            'cdn' => array(
                'css' => array(
                    'https://cdn.staticfile.org/animate.css/4.1.1/animate.min.css',
                    'https://cdn.staticfile.org/font-awesome/4.7.0/css/font-awesome.min.css',
                    'https://cdn.staticfile.org/csshake/1.5.3/csshake.min.css',
                    'https://cdn.staticfile.org/hint.css/2.7.0/hint.min.css',
                ),
                'js' => array(
                    'https://cdn.staticfile.org/jquery/1.12.4/jquery.min.js',
                    'https://cdn.staticfile.org/jquery.pjax/2.0.1/jquery.pjax.min.js',
                    'https://cdn.staticfile.org/jquery_lazyload/1.9.7/jquery.lazyload.min.js',
                    'https://cdn.staticfile.org/lrsjng.jquery-qrcode/0.18.0/jquery-qrcode.min.js',
                ),
            ),
            'dns' => 'https://cdn.staticfile.org'
        ),
        'bytedance' => array(
            'cdn' => array(
                'css' => array(
                    'https://s1.pstatp.com/cdn/expire-1-M/animate.css/4.1.1/animate.min.css',
                    'https://s1.pstatp.com/cdn/expire-1-M/font-awesome/4.7.0/css/font-awesome.min.css',
                    'https://s1.pstatp.com/cdn/expire-1-M/csshake/1.5.3/csshake.min.css',
                    'https://s1.pstatp.com/cdn/expire-1-M/hint.css/2.6.0/hint.min.css',
                ),
                'js' => array(
                    'https://s1.pstatp.com/cdn/expire-1-M/jquery/1.12.4/jquery.min.js',
                    'https://s1.pstatp.com/cdn/expire-1-M/jquery.pjax/2.0.1/jquery.pjax.min.js',
                    'https://s1.pstatp.com/cdn/expire-1-M/jquery_lazyload/1.9.7/jquery.lazyload.min.js',
                    'https://s1.pstatp.com/cdn/expire-1-M/lrsjng.jquery-qrcode/0.18.0/jquery-qrcode.min.js',
                ),
            ),
            'dns' => 'https://s1.pstatp.com'
        ),
        'jsdelivr' => array(
            'cdn' => array(
                'css' => array(
                    'https://cdn.jsdelivr.net/npm/animate.css@4.1.1/animate.min.css',
                    'https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css',
                    'https://cdn.jsdelivr.net/npm/csshake@1.5.3/dist/csshake.min.css',
                    'https://cdn.jsdelivr.net/npm/hint.css@2.7.0/hint.min.css',
                ),
                'js' => array(
                    'https://cdn.jsdelivr.net/npm/jquery@1.12.4/dist/jquery.min.js',
                    'https://cdn.jsdelivr.net/npm/jquery-pjax@2.0.1/jquery.pjax.min.js',
                    'https://cdn.jsdelivr.net/npm/lazyload@1.8.4/jquery.lazyload.min.js',
                    'https://cdn.jsdelivr.net/npm/chaffle@2.1.0/src/chaffle.min.js',
                    'https://cdn.jsdelivr.net/gh/lrsjng/jquery-qrcode@0.18.0/dist/jquery-qrcode.min.js',
                ),
            ),
            'dns' => 'https://cdn.jsdelivr.net'
        ),
        'cdnjs' => array(
            'cdn' => array(
                'css' => array(
                    'https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css',
                    'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css',
                    'https://cdnjs.cloudflare.com/ajax/libs/csshake/1.5.3/csshake.min.css',
                    'https://cdnjs.cloudflare.com/ajax/libs/hint.css/2.7.0/hint.min.css',
                ),
                'js' => array(
                    'https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js',
                    'https://cdnjs.cloudflare.com/ajax/libs/jquery.pjax/2.0.1/jquery.pjax.min.js',
                    'https://cdnjs.cloudflare.com/ajax/libs/jquery_lazyload/1.9.7/jquery.lazyload.min.js',
                    'https://cdnjs.cloudflare.com/ajax/libs/lrsjng.jquery-qrcode/0.18.0/jquery-qrcode.min.js',
                ),
            ),
            'dns' => 'https://cdnjs.cloudflare.com'
        ),
        'close' => array(
            'cdn' => array(
                'css' => array(
                    TEMPLATE_URL . '/css/animate.min.css',
                    TEMPLATE_URL . '/css/font-awesome.min.css',
                    TEMPLATE_URL . '/css/csshake.min.css',
                    TEMPLATE_URL . '/css/hint.min.css',
                ),
                'js' => array(
                    TEMPLATE_URL . '/js/jquery.min.js',
                    TEMPLATE_URL . '/js/jquery.pjax.min.js',
                    TEMPLATE_URL . '/js/jquery.lazyload.min.js',
                    TEMPLATE_URL . '/js/chaffle.min.js',
                    TEMPLATE_URL . '/js/jquery-qrcode.min.js',
                ),
            ),
            'dns' => false
        )
    );
}

/**
 * DNS 读取
 * @return string
 */
function iitboyDice_dns_prefetch()
{
    $ary = iitboyDice_cdn();
    return empty($ary[_g('cdn')]) ? PHP_EOL : '<meta http-equiv="x-dns-prefetch-control" content="on">
    <link rel="dns-prefetch" href="' . $ary[_g('cdn')]['dns'] . '">' . PHP_EOL;
}

/**
 * 静态资源
 * @param string $type
 * @return string
 */
function iitboyDice_assets($type = '')
{
    $ary = iitboyDice_cdn();
    $res = '';
    if (!empty($ary[_g('cdn')])) {
        if ($type == 'css') {
            $cdncss = $ary[_g('cdn')]['cdn']['css'];
            foreach ($cdncss as $css) {
                if (strpos($css, 'csshake') !== false && _g('css_csshake') == 'close') continue;
                if (strpos($css, 'hint') !== false && _g('css_hint') == 'close') continue;
                $res .= '<link rel="stylesheet" href="' . $css . '" crossorigin="anonymous" referrerpolicy="no-referrer">' . PHP_EOL . '    ';
            }
        }
        if ($type == 'js') {
            $cdnjs = $ary[_g('cdn')]['cdn']['js'];
            foreach ($cdnjs as $js) {
                if (strpos($js, 'lazyload') !== false && _g('js_lazyload') == 'close') continue;
                if (strpos($js, 'chaffle') !== false && _g('js_chaffle') == 'close') continue;
                if (strpos($js, 'qrcode') !== false && (_g('js_qrcode') == 'close' || _g('log_qrcode') == 'close')) continue;
                $res .= '<script src="' . $js . '" crossorigin="anonymous" referrerpolicy="no-referrer"></script>' . PHP_EOL . '    ';
            }
        }
        $res = trim($res) . PHP_EOL;
    }
    return $res;
}

/**
 * 将十进制数字转换为二十六进制字母串
 * @param $intNum
 * @param bool $isLower
 * @return string
 */
function iitboyDice_num2alpha($intNum, $isLower = true)
{
    $num26 = base_convert($intNum, 10, 26);
    $addcode = $isLower ? 49 : 17;
    $result = '';
    for ($i = 0; $i < strlen($num26); $i++) {
        $code = ord($num26[$i]);
        if ($code < 58) {
            $result .= chr($code + $addcode);
        } else {
            $result .= chr($code + $addcode - 39);
        }
    }
    return $result;
}

/**
 * 将二十六进制字母串转换为十进制数字
 * @param $strAlpha
 * @return int
 */
function iitboyDice_alpha2num($strAlpha)
{
    if (ord($strAlpha[0]) > 90) {
        $startCode = 97;
        $reduceCode = 10;
    } else {
        $startCode = 65;
        $reduceCode = -22;
    }
    $num26 = '';
    for ($i = 0; $i < strlen($strAlpha); $i++) {
        $code = ord($strAlpha[$i]);
        if ($code < $startCode + 10) {
            $num26 .= $code - $startCode;
        } else {
            $num26 .= chr($code - $reduceCode);
        }
    }
    return (int)base_convert($num26, 26, 10);
}

/**
 * 边栏 - 个人资料 自定义
 * @return string
 */
function iitboyDice_widget_blogger_div()
{
    global $CACHE;
    $user_cache = $CACHE->readCache('user');
    $res = '';
    if (_g('blogger') == 'open' && !empty(_g('blogger_icon'))) {
        $res .= '<div id="blogger-icon"><h3><span></span></h3>';
        $res .= (!empty(_g('qq')) && in_array('qq', _g('blogger_icon'))) ? '<a href="http://wpa.qq.com/msgrd?v=3&uin=' . _g('qq') . '&site=qq&menu=yes" target="_blank" class="hint--left  hint--rounded" title="在线联系站长QQ"><img src="' . TEMPLATE_URL . 'images/qq.png" onmouseover="this.src=\'' . TEMPLATE_URL . 'images/qq2.png\'" onmouseout="this.src=\'' . TEMPLATE_URL . 'images/qq.png\'" alt=""></a>' : '';
        $res .= (!empty(_g('wechat_img')) && in_array('wechat', _g('blogger_icon'))) ? '<a class="hint--bottom  hint--rounded" title="扫一扫加站长微信"><img src="' . TEMPLATE_URL . 'images/weixin.png" onmouseover="this.src=\'' . TEMPLATE_URL . 'images/weixin2.png\'" onmouseout="this.src=\'' . TEMPLATE_URL . 'images/weixin.png\'" class="icon-img" alt=""><span style="background-image:url(' . _g('wechat_img') . ');"></span></a>' : '';
        $res .= ((!empty(_g('email')) || !empty($user_cache[1]['mail'])) && in_array('email', _g('blogger_icon'))) ? '<a href="mailto:' . (empty(_g('email')) ? $user_cache[1]['mail'] : _g('email')) . '" target="_blank" class="hint--top  hint--rounded" title="在线给站长写信。"><img src="' . TEMPLATE_URL . 'images/mail.png" onmouseover="this.src=\'' . TEMPLATE_URL . 'images/mail2.png\'" onmouseout="this . src = \'' . TEMPLATE_URL . 'images/mail.png\'" alt=""></a>' : '';
        $res .= (!empty(_g('about')) && in_array('about', _g('blogger_icon'))) ? '<a href="' . _g('about') . '" target="_blank" class="hint--top  hint--rounded" title="站长介绍"><img src="' . TEMPLATE_URL . 'images/ren.png" onmouseover="this.src=\'' . TEMPLATE_URL . 'images/ren2.png\'" onmouseout="this.src=\'' . TEMPLATE_URL . 'images/ren.png\'" alt=""></a>' : '';
        $res .= (!empty(_g('guestbook')) && in_array('guestbook', _g('blogger_icon'))) ? '<a href="' . _g('guestbook') . '" class="hint--top  hint--rounded" title="给本站留言"><img src="' . TEMPLATE_URL . 'images/liuyan.png" onmouseover="this.src=\'' . TEMPLATE_URL . 'images/liuyan2.png\'" onmouseout="this.src=\'' . TEMPLATE_URL . 'images/liuyan.png\'" alt=""></a>' : '';
        $res .= (!empty(_g('donate')) && in_array('donate', _g('blogger_icon'))) ? '<a href="' . _g('donate') . '" class="hint--bottom  hint--rounded" title="喜欢本站就捐赠支持吧！"><img src="' . TEMPLATE_URL . 'images/juan.png" onmouseover="this.src=\'' . TEMPLATE_URL . 'images/juan2.png\'" onmouseout="this.src=\'' . TEMPLATE_URL . 'images/juan.png\'" class="icon-img" alt=""><span style="background-image:url(' . _g('donate_img') . ');"></span></a>' : '';
        $res .= (!empty(_g('rss')) && in_array('rss', _g('blogger_icon'))) ? '<a href="' . _g('rss') . '" target="_blank" class="hint--top  hint--rounded" title="RSS订阅本站文章"><img src="' . TEMPLATE_URL . 'images/rss.png" onmouseover="this.src=\'' . TEMPLATE_URL . 'images/rss2.png\'" onmouseout="this.src=\'' . TEMPLATE_URL . 'images/rss.png\'" alt=""></a>' : '';
        $res .= '</div>';
    }
    return $res;
}

function iitboyDice_twitter()
{
    if (empty(_g('twitter_div'))) {
        $db = Database::getInstance();
        $list = $db->query("SELECT id,content,img,author,date,replynum FROM " . DB_PREFIX . "twitter ORDER BY `date` DESC LIMIT 1");
        $row = $db->fetch_array($list);
        $t = strpos(Option::EMLOG_VERSION, 'pro') === false ? 'href="/t"' : '';
        $res = empty($row['content']) ? '' : '<a ' . $t . '>' . $row['content'] . '</a>';
    } else {
        $res = _g('twitter_div');
    }
    return _g('twitter') == 'open' ? '<div id="gonggao"><div id="ggwz">' . $res . '</div><div id="gonggao_img"><img src="' . TEMPLATE_URL . 'images/gonggao.png" alt=""></div></div><div id="gonggao_bk"><div class="ggwz2"><img src="' . TEMPLATE_URL . 'images/gonggao_xlb.gif" alt=""><b>公告：</b>' . $res . '</div></div>' : false;
}

/**
 * 文章缩略图
 * @param int $logid
 * @param string $content
 * @return bool|mixed|string
 */
function iitboyDice_log_img($logid = 0, $content = '')
{
    $img = '';
    if (in_array('attachment', _g('log_img_get')) && empty($img)) {
        $img = iitboyDice_log_img_attachment($logid);
    }
    if (in_array('content', _g('log_img_get')) && empty($img)) {
        $img = iitboyDice_log_img_content($content);
    }
    if (in_array('random', _g('log_img_get')) && empty($img)) {
        $img = iitboyDice_log_img_random($logid);
    }
    return $img ?: _g('log_img_default');
}

/**
 * 文章附件缩略图
 * @param $logid
 * @return bool|string
 */
function iitboyDice_log_img_attachment($logid)
{
    $db = Database::getInstance();
    $row = $db->fetch_array($db->query("SELECT filepath FROM " . DB_PREFIX . "attachment WHERE blogid='$logid'"));
    return !empty($row['filepath']) ? BLOG_URL . substr($row['filepath'], 3, strlen($row['filepath'])) : false;
}

/**
 * 文章正文提取缩略图
 * @param $content
 * @return bool|mixed
 */
function iitboyDice_log_img_content($content)
{
    preg_match_all("/\<img.*?src\=\"(.*?)\"[^>]*>/i", $content, $match);
    return (!empty($match[1])) ? $match[1][0] : false;
}

/**
 * 文章随机缩略图
 * @param $logid
 * @return string
 */
function iitboyDice_log_img_random($logid)
{
    $name = $logid % 20;
    return is_file(TEMPLATE_PATH . 'images/rand/' . $name . '.jpg') ? TEMPLATE_URL . 'images/rand/' . $name . '.jpg' : _g('log_img_default');
}

function iitboyDice_log_description($log_description)
{
    $log_excerpt_num = empty(_g('log_excerpt_num')) ? 150 : _g('log_excerpt_num');
    return (mb_strlen(strip_tags($log_description), 'utf-8') > $log_excerpt_num) ? mb_substr(strip_tags($log_description), 0, $log_excerpt_num, "utf-8") . '……' : mb_substr(strip_tags($log_description), 0, $log_excerpt_num, "utf-8");
}

/**
 * 文章作者
 * @param $uid
 * @return string
 */
function iitboyDice_log_author($uid)
{
    global $CACHE;
    $user_cache = $CACHE->readCache('user');
    return '<a href="' . Url::author($uid) . '" title="' . $user_cache[$uid]['des'] . PHP_EOL . $user_cache[$uid]['mail'] . '">' . $user_cache[$uid]['name_orig'] . '</a>';
}

/**
 * 文章分类
 * @param $logid
 * @return string
 */
function iitboyDice_log_sort($logid)
{
    global $CACHE;
    $log_cache_sort = $CACHE->readCache('logsort');
    return empty($log_cache_sort[$logid]) ? '未分类' : '<a href="' . Url::sort($log_cache_sort[$logid]['id']) . '">' . $log_cache_sort[$logid]['name'] . '</a>';
}

/**
 * 判断文章分类
 * @param $sortid
 * @return string
 */
function iitboyDice_log_sort_all($sortid)
{
    global $CACHE;
    $sort_cache = $CACHE->readCache('sort');
    $sort = '<i class="fa fa-home fa-lg"></i> <a href="/" title="返回网站首页">首页</a> ';
    if ($sortid == '-1') {
        $sort .= '<i class="fa fa-angle-right"></i> 未分类 ';
    } else {
        $sortAry = $sort_cache[$sortid];
        $sort .= '<i class="fa fa-angle-right"></i> <a href="' . Url::sort($sortid) . '">' . $sortAry['sortname'] . '</a> ';
        /**子分类**/
        if ($sortAry['pid'] != '0') {
            $sortAry2 = $sort_cache[$sortAry['pid']];
            $sort .= '<i class="fa fa-angle-right"></i> <a href="' . Url::sort($sortAry2['sid']) . '">' . $sortAry2['sortname'] . '</a> ';
        }
    }
    return $sort;
}

/**
 * 百度收录
 * @param $logid
 * @return string
 */
function iitboyDice_log_baidu($logid)
{
    global $CACHE;
    $logsite_cache = @$CACHE->readCache('logsite');
    if (empty($logsite_cache[$logid]['baidu']) || $logsite_cache[$logid]['baidu'] == 'unknown') {
        $head = array(
            "Accept" => " text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9",
            "Host" => "www.baidu.com"
        );
        $data = iitboyDice_curl('https://www.baidu.com/s?wd=' . Url::log($logid), [], $head, 'https://www.baidu.com/');
        $res = $data['code'] == '200' ? (strpos($data['data'], '没有找到') !== false ? (ROLE == ROLE_ADMIN ? 'submit' : 'none') : (strpos($data['data'], '百度安全验证') !== false ? 'unknown' : 'exist')) : 'unknown';
        $logsite_cache[$logid]['baidu'] = $res;
        $logsite_cache[$logid]['time'] = time();
        $cacheData = serialize($logsite_cache);
        $CACHE->cacheWrite($cacheData, 'logsite');
    } else {
        $res = $logsite_cache[$logid]['baidu'];
    }
    $ico = '<i class="fa fa-paw"></i> ';
    switch ($res) {
        case 'submit':
        case 'none':
            return ROLE == ROLE_ADMIN ? $ico . '<a style="color:red;" rel="external nofollow" title="点击提交百度收录！" target="_blank" href="http://zhanzhang.baidu.com/sitesubmit/index?sitename=' . Url::log($logid) . '">提交收录</a>' : $ico . '百度未收录';
            break;
        case 'exist':
            return $ico . '百度已收录';
            break;
        case 'unknown':
        default:
            return $ico . '<a rel="external nofollow" title="点击查看百度收录" target="_blank" href="https://www.baidu.com/s?wd=' . Url::log($logid) . '">未知收录</a>';
            break;
    }
}

/**
 * 文章编辑
 * @param $logid
 * @param $author
 * @return string
 */
function iitboyDice_log_edit($logid, $author)
{
    if (ROLE == ROLE_ADMIN || $author == UID) {
        return '<i class="fa fa-edit"></i> <a href="' . BLOG_URL . 'admin/' . (strpos(Option::EMLOG_VERSION, 'pro') === false ? 'write_log' : 'article') . '.php?action=edit&gid=' . $logid . '" target="_blank">编辑</a>';
    }
    return false;
}

/**
 * @param int $logid
 * @return array
 */
function iitboyDice_getTagIdsFromBlogId($logid = 0)
{
    $db = Database::getInstance();
    $Tag_Model = new Tag_Model();
    if (strpos(Option::EMLOG_VERSION, 'pro') === false) {
        $tagids = [];
        $condition = $logid ? "WHERE gid = '$logid' OR gid LIKE '%,$logid,%' OR gid LIKE '%,$logid'" : '';
        $query = $db->query("select tagname,tid from " . DB_PREFIX . "tag $condition");
        while ($row = $db->fetch_array($query)) {
            $tagids[] = intval($row['tid']);
        }
    } else {
        $tagids = $Tag_Model->getTagIdsFromBlogId($logid);
    }
    return $tagids;
}

/**
 * 文章标签
 * @param $logid
 * @return string
 */
function iitboyDice_log_tags($logid)
{
    $tag = '';
    $Tag_Model = new Tag_Model();
    //根据文章id获取标签id
    $tagids = iitboyDice_getTagIdsFromBlogId($logid);
    foreach ($tagids as $value) {
        $tag_res = $Tag_Model->getOneTag($value);
        $tag .= '<a rel="tag" href="' . Url::tag($tag_res['tagname']) . '" title=' . $tag_res['tagname'] . '>' . $tag_res['tagname'] . '</a>';
    }
    return $tag ?: '<span class="color">&nbsp;╭(′▽`)╯标签走丢啦~</span>';
}

/**
 * 相关文章
 * @param $logData
 * @return bool|string
 */
function iitboyDice_related_logs($logData)
{
    $related_log_type = _g('related_type');
    $related_log_sort = _g('related_desc');
    $related_log_num = _g('related_num');

    $db = Database::getInstance();
    extract($logData);

    $sql = "SELECT gid,title,sortid FROM " . DB_PREFIX . "blog WHERE hide='n' AND type='blog'";
    if ($related_log_type == 'tag') {
        $Tag_Model = new Tag_Model();
        //根据文章id获取标签id
        $tagids = iitboyDice_getTagIdsFromBlogId($logid);
        $related_log_id_str = [];
        foreach ($tagids as $tag) {
            $logids = $Tag_Model->getBlogIdsFromTagId($tag);
            foreach ($logids as $log) {
                array_push($related_log_id_str, $log);
            }
        }
        $related_log_id_str = implode(',', array_unique($related_log_id_str)) ?: 0;
        $sql .= " AND gid!=$logid AND gid IN ($related_log_id_str)";
    } else {
        $sql .= " AND gid!=$logid AND sortid=$sortid";
    }
    switch ($related_log_sort) {
        case 'views_desc':
        {
            $sql .= " ORDER BY views DESC";
            break;
        }
        case 'views_asc':
        {
            $sql .= " ORDER BY views ASC";
            break;
        }
        case 'comnum_desc':
        {
            $sql .= " ORDER BY comnum DESC";
            break;
        }
        case 'comnum_asc':
        {
            $sql .= " ORDER BY comnum ASC";
            break;
        }
        case 'rand':
        {
            $sql .= " ORDER BY rand()";
            break;
        }
    }
    $sql .= " LIMIT 0,$related_log_num";
    $related_logs = array();
    $query = $db->query($sql);
    while ($row = $db->fetch_array($query)) {
        $row['gid'] = intval($row['gid']);
        $row['title'] = htmlspecialchars($row['title']);
        $related_logs[] = $row;
    }
    $out = '';
    if (!empty($related_logs)) {
        $out .= '<div class="gxq"><div class="bti"><i class="fa fa-folder-open"></i> <span data-chaffle="cn">相关文章</span></div><ul>';
        foreach ($related_logs as $val) {
            $out .= '<li><i class="fa fa-dot-circle-o"><a href="' . Url::log($val['gid']) . '" title="查看文章:' . $val['title'] . '" class="shake shake-little">' . $val['title'] . '</a></i></li>';
        }
        $out .= '</ul><div id="gaodu1"></div></div>';
    }
    return $out;
}

/**
 * 头像
 * @param $email
 * @param bool $lazyload
 * @return string
 */
function iitboyDice_getGravatar($email, $lazyload = true)
{
    $email = strtolower(trim($email));
    if (empty($email)) {
        $src = iitboyDice_getMultiavatar($email);
    } else if (preg_match("/^[1-9]\d{4,10}@qq\.com/i", $email)) {
        $src = iitboyDice_getAvatarCache('https://q1.qlogo.cn/g?b=qq&nk=' . str_ireplace('@qq.com', '', $email) . '&s=100', 'qq');
    } else {
        $src = iitboyDice_getAvatarCache(getGravatar($email), 'gr');
    }
    return (_g('lazyload') == 'open' && $lazyload) ? '<img src="' . _g('avatar') . '" data-original="' . $src . '" class="lazyload">' : '<img src="' . $src . '">';
}


/**
 * 随机头像
 * @param $email
 * @return string
 */
function iitboyDice_getMultiavatar($email)
{
    $name = iitboyDice_createHash($email) % 20;
    return is_file(TEMPLATE_PATH . 'images/avatar/' . $name . '.jpg') ? TEMPLATE_URL . 'images/avatar/' . $name . '.jpg' : _g('avatar');
}

/**
 * 根据字符串生成数字
 * @param $str
 * @return int
 */
function iitboyDice_createHash($str)
{
    preg_match_all("/\d+/", md5($str), $arr);
    return abs(array_sum($arr[0]));
}

function iitboyDice_getAvatarCache($url, $type)
{
    if (_g('avatar_cache') == 'open') {
        iitboyDice_cache_dir('avatar/qq');
        iitboyDice_cache_dir('avatar/gr');
        $jm = md5(sha1($type . AUTH_KEY . $url));
        switch ($type) {
            case 'qq':
                $qq_file = EMLOG_ROOT . '/content/cache/avatar/qq/' . $jm;
                $qq_file_url = BLOG_URL . '/content/cache/avatar/qq/' . $jm;
                return (is_file($qq_file) && (time() - filemtime($qq_file) < _g('avatar_cache_time'))) ? $qq_file_url : (iitboyDice_setAvatarCache($url, $qq_file) ? $qq_file_url : $url);
                break;
            case 'gr':
                $gr_file = EMLOG_ROOT . '/content/cache/avatar/gr/' . $jm;
                $gr_file_url = BLOG_URL . '/content/cache/avatar/gr/' . $jm;
                return (is_file($gr_file) && (time() - filemtime($gr_file) < _g('avatar_cache_time'))) ? $gr_file_url : (iitboyDice_setAvatarCache($url, $gr_file) ? $gr_file_url : $url);
                break;
            default:
                return iitboyDice_getMultiavatar($url);
                break;
        }
    } else {
        return $url;
    }
}

function iitboyDice_setAvatarCache($url, $file)
{
    $data = iitboyDice_curl($url);
    if ($data['code'] == 400) return false;
    return file_put_contents($file, $data['data']);
}

function iitboyDice_cache_dir($dir)
{
    $cache_path = EMLOG_ROOT . '/content/cache/' . $dir;
    if (!is_dir($cache_path)) mkdir($cache_path, 0777, true);
}


function iitboyDice_replace($replace, $htmlContent, $isStrReplace = false)
{
    if ($isStrReplace === true) {
        foreach ($replace as $key => $value) {
            $htmlContent = str_replace($key, $value, $htmlContent);
        }
        return $htmlContent;
    }
    return preg_replace(array_keys($replace), array_values($replace), $htmlContent);
}

/**
 * 删除 HTML 注释
 * @param $htmlContent
 * @return string|string[]|null
 */
function iitboyDice_html_annotation($htmlContent)
{
    $replace = array(
        '/<!--[^]><!\[](.*?)[^\]]-->/s' => '',
    );
    return iitboyDice_replace($replace, $htmlContent);
}

/**
 * 删除 HTML 中多余的换行和空格
 * @param $htmlContent
 * @return string|string[]|null
 */
function iitboyDice_html_linefeeds_whitespace($htmlContent)
{
    $replace = array(
        "/\n([\S])/" => '$1',
        "/\r/" => '',
        "/\n/" => '',
        "/\t/" => '',
        "/ +/" => ' ',
        "/> +</" => '><',
    );
    if (preg_match_all('/(crayon-|<\/pre>)/i', $htmlContent, $matches)) {
        return $htmlContent;
    }
    return iitboyDice_replace($replace, $htmlContent);
}

/**
 * 验证speeder是否加载
 * @return bool
 */
function iitboyDice_check_speeder()
{
    return function_exists('dps_speeder_menu');
}