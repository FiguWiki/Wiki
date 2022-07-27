<?php
# This file was automatically generated by the MediaWiki 1.38.2
# installer. If you make manual changes, please keep track in case you
# need to recreate them later.
#
# See docs/Configuration.md for all configurable settings
# and their default values, but don't forget to make changes in _this_
# file, not there.
#
# Further documentation for configuration settings may be found at:
# https://www.mediawiki.org/wiki/Manual:Configuration_settings

# Protect against web entry
if (!defined('MEDIAWIKI')) {
    exit;
}

error_reporting(error_reporting() & ~E_NOTICE & ~E_DEPRECATED & ~E_USER_DEPRECATED);

empty($IP) && $IP = __DIR__;


## Uncomment this to disable output compression
# $wgDisableOutputCompression = true;

$wgSitename = "FIGU.ORG.CN";
$wgMetaNamespace = "Topic";

## The URL base path to the directory containing the wiki;
## defaults for all runtime URL paths are based off of this.
## For more information on customizing the URLs
## (like /w/index.php/Page_title to /wiki/Page_title) please see:
## https://www.mediawiki.org/wiki/Manual:Short_URL
$wgScriptPath = "/".basename(__DIR__);;

## The protocol and server name to use in fully-qualified URLs
//$wgServer = "http://127.0.0.1:81";
## The protocol and server name to use in fully-qualified URLs
$http = $_SERVER['REQUEST_SCHEME'] ?: ($_SERVER['HTTPS'] ? "https" : "http");
$wgServer = "{$http}://{$_SERVER['SERVER_NAME']}".($_SERVER['SERVER_PORT'] == 80 ? "" : ":".$_SERVER['SERVER_PORT']);

## The URL path to static resources (images, scripts, etc.)
$wgResourceBasePath = $wgScriptPath;

## The URL paths to the logo.  Make sure you change this from the default,
## or else you'll overwrite your logo when you upgrade!
$wgLogos = [
    '1x' => "$wgResourceBasePath/resources/assets/change-your-logo.svg",
    
    
    'icon' => "$wgResourceBasePath/resources/assets/change-your-logo.svg",
];

## UPO means: this is also a user preference option

$wgEnableEmail = false;
$wgEnableUserEmail = true; # UPO

$wgEmergencyContact = "apache@🌻.invalid";
$wgPasswordSender = "apache@🌻.invalid";

$wgEnotifUserTalk = false; # UPO
$wgEnotifWatchlist = false; # UPO
$wgEmailAuthentication = true;

## Database settings
$wgDBtype = "sqlite";
$wgDBserver = "";
$wgDBname = "wiki";
$wgDBuser = "";
$wgDBpassword = "";

# SQLite-specific settings
$wgSQLiteDataDir = __DIR__."/data";
$wgObjectCaches[CACHE_DB] = [
    'class' => SqlBagOStuff::class,
    'loggroup' => 'SQLBagOStuff',
    'server' => [
        'type' => 'sqlite',
        'dbname' => 'wikicache',
        'tablePrefix' => '',
        'variables' => ['synchronous' => 'NORMAL'],
        'dbDirectory' => $wgSQLiteDataDir,
        'trxMode' => 'IMMEDIATE',
        'flags' => 0
    ]
];
$wgLocalisationCacheConf['storeServer'] = [
    'type' => 'sqlite',
    'dbname' => "{$wgDBname}_l10n_cache",
    'tablePrefix' => '',
    'variables' => ['synchronous' => 'NORMAL'],
    'dbDirectory' => $wgSQLiteDataDir,
    'trxMode' => 'IMMEDIATE',
    'flags' => 0
];
$wgJobTypeConf['default'] = [
    'class' => 'JobQueueDB',
    'claimTTL' => 3600,
    'server' => [
        'type' => 'sqlite',
        'dbname' => "{$wgDBname}_jobqueue",
        'tablePrefix' => '',
        'variables' => ['synchronous' => 'NORMAL'],
        'dbDirectory' => $wgSQLiteDataDir,
        'trxMode' => 'IMMEDIATE',
        'flags' => 0
    ]
];

# Shared database table
# This has no effect unless $wgSharedDB is also set.
$wgSharedTables[] = "actor";

## Shared memory settings
$wgMainCacheType = CACHE_MEMCACHED;
$wgMemCachedServers = ['172.20.128.1:11211'];

#$wgMainCacheType = CACHE_MEMCACHED;
$wgParserCacheType = CACHE_MEMCACHED; # optional
$wgMessageCacheType = CACHE_MEMCACHED; # optional
$wgSessionCacheType = CACHE_MEMCACHED; # optional
$wgSessionsInMemcached = true; # optional
$wgSessionsInObjectCache = true; # optional
#$wgMemCachedServers = array("unix:///var/run/memcached/memcached.sock:0");

## To enable image uploads, make sure the 'images' directory
## is writable, then set this to true:
$wgEnableUploads = true;
#$wgUseImageMagick = true;
#$wgImageMagickConvertCommand = "/usr/bin/convert";

# InstantCommons allows wiki to use images from https://commons.wikimedia.org
$wgUseInstantCommons = false;

# Periodically send a pingback to https://www.mediawiki.org/ with basic data
# about this MediaWiki instance. The Wikimedia Foundation shares this data
# with MediaWiki developers to help guide future development efforts.
$wgPingback = false;

# Site language code, should be one of the list in ./languages/data/Names.php
//$wgLanguageCode = "zh-cn";
$wgLanguageCode = "en";

# Time zone
$wgLocaltimezone = "PRC";

## Set $wgCacheDirectory to a writable directory on the web server
## to make your wiki go slightly faster. The directory should not
## be publicly accessible from the web.
#$wgCacheDirectory = "$IP/cache";

$wgSecretKey = "7963e10b78c4ec02c601fd0449fd861f8318de61d66c916e77320a618f802732";

# Changing this will log out all existing sessions.
$wgAuthenticationTokenVersion = "1";

# Site upgrade key. Must be set to a string (default provided) to turn on the
# web installer while LocalSettings.php is in place
$wgUpgradeKey = "1667c2cc4217b67c";

## For attaching licensing metadata to pages, and displaying an
## appropriate copyright notice / icon. GNU Free Documentation
## License and Creative Commons licenses are supported so far.
$wgRightsPage = ""; # Set to the title of a wiki page that describes your license/copyright
$wgRightsUrl = "";
$wgRightsText = "";
$wgRightsIcon = "";

# Path to the GNU diff3 utility. Used for conflict resolution.
$wgDiff3 = "";

# The following permissions were set based on your choice in the installer
$wgGroupPermissions['*']['createaccount'] = false;
$wgGroupPermissions['*']['edit'] = false;

## Default skin: you can change the default skin. Use the internal symbolic
## names, e.g. 'vector' or 'monobook':
$wgDefaultSkin = "minerva";
//$wgDefaultSkin = "vector";

# Enabled skins.
# The following skins were automatically enabled:
wfLoadSkin('MinervaNeue');
wfLoadSkin('MonoBook');
wfLoadSkin('Timeless');
wfLoadSkin('Vector');


# Enabled extensions. Most of the extensions are enabled by adding
# wfLoadExtension( 'ExtensionName' );
# to LocalSettings.php. Check specific extension documentation for more details.
# The following extensions were automatically enabled:
wfLoadExtension('CategoryTree');
wfLoadExtension('Cite');
wfLoadExtension('CiteThisPage');
wfLoadExtension('CodeEditor');
wfLoadExtension('Gadgets');
wfLoadExtension('ImageMap');
wfLoadExtension('InputBox');
wfLoadExtension('Interwiki');
wfLoadExtension('Math');
wfLoadExtension('MultimediaViewer');
wfLoadExtension('Nuke');
wfLoadExtension('PageImages');
wfLoadExtension('ParserFunctions');
wfLoadExtension('PdfHandler');
wfLoadExtension('Poem');
wfLoadExtension('Renameuser');
wfLoadExtension('ReplaceText');
wfLoadExtension('Scribunto');
wfLoadExtension('SecureLinkFixer');
wfLoadExtension('SyntaxHighlight_GeSHi');
wfLoadExtension('TemplateData');
wfLoadExtension('TextExtracts');
wfLoadExtension('WikiEditor');


# End of automatically generated settings.
# Add more configuration options below.

//todo: 1


## https://www.mediawiki.org/wiki/Manual:Short_URL
//$wgScriptPath = "/w";        // this should already have been configured this way
$wgArticlePath = "/$1";// "/wiki/$1";
$wgUsePathInfo = true;

$actions = ['edit', 'watch', 'unwatch', 'delete', 'revert', 'rollback',
    'protect', 'unprotect', 'markpatrolled', 'render', 'submit', 'history', 'purge', 'info'];

foreach ($actions as $action) {
    $wgActionPaths[$action] = "$wgArticlePath/$action";
}
$wgActionPaths['view'] = $wgArticlePath;

//todo: 2

// 支持嵌入iframe在页面里加入和平冥想的倒计时服务
$wgRawHtml = true;
//$wgAllowImageTag = true;
$wgAllowExternalImages = true;
$wgDefaultUserOptions["language"] = "zh-cn";

$wgUseGzip = true;
$wgDisableAnonTalk = true;
$wgCheckFileExtensions = true;
$wgRemoteUploads = true;
$wgUserHtml = true;
$wgUseImageResize = true;

// url不强制首字母大写
$wgCapitalLinks = true;
// 开启该项功能后，保存页面时，zlib工具将会压缩old revision表中的内容。
$wgCompressRevisions = true;

// 匿名用户登录时，在页面顶端的用户信息栏内输出其IP地址。
$wgShowIPinHeader = true;
$wgUseCategoryMagic = true;// 是否应当启用分类的伪名称空间？
$wgCategoryMagicGallery = true;// 在分类页面内，以缩略图的方式显示属于该分类的图像，而不是以条目的形式将其罗列出来。

$wgAllowUserCss = true;
$wgAllowUserJs = true;

$wgHashedUploadDirectory = true;

$wgCacheEpoch = filemtime(__FILE__);


$wgAllowDisplayTitle = true;
$wgRestrictDisplayTitle = false;

$wgDebugDumpSql = true;
$wgShowSQLErrors = true;
$wgShowDBErrorBacktrace = true;

$wgShowExceptionDetails = true;

wfLoadExtension('Purge');
$wgGroupPermissions['*']['purge'] = true;

require_once "$IP/extensions/SoundManager2Button/SoundManager2Button.php";
$wgFileExtensions[] = 'mp3';
// <sm2>Fa_la_la.mp3</sm2>

$wgFileExtensions = array_merge($wgFileExtensions, [
    'png', 'gif', 'jpg', 'jpeg', 'jp2', 'webp', 'ppt', 'pdf', 'psd',
    'mp3', 'xls', 'xlsx', 'swf', 'doc', 'docx', 'odt', 'odc', 'odp',
    'odg', 'mpp', 'pptx',
]);

$wgInvalidateCacheOnLocalSettingsChange = true;
wfLoadExtension('ExternalData');


wfLoadExtension('Elastica');
wfLoadExtension('CirrusSearch');
$wgCirrusSearchServers = [["host" => "172.20.128.1", 'port' => 9200]];
$wgSearchType = 'CirrusSearch';
$wgDebugLogGroups['CirrusSearch'] = __DIR__."/../../.apache24/logs/cirrus-errors.log";

//$wgDisableSearchUpdate = true;

$wgJobRunRate = 1;
$wgRunJobsAsync = true;

$wgHooks["UserGetLanguageObject"][] = function ($user, &$code) {
    $code = "zh-cn";
};

$wgHooks['ArticleViewHeader'][] = function (Article &$article, &$outputDone, &$pcache) {
    /** @var OutputPage $wgOut */
    global $wgOut;
    $wgOut->addModules(['ext.Colorbox']);
//    $wgOut->addHTML("<a class=\"iframe cboxElement\" href=\"/assets/book/index.html\">Outside Webpage (Iframe)</a>");
//    $wgOut->addScript(<<<HTML
//<script>
//$(".iframe").colorbox({iframe:true, width:"80%", height:"80%"});
//$.colorbox({href: "/assets/book/index.html", iframe:true, width:"80%", height:"80%"});
//$('.cboxElement').click(function (){return false;});
//</script>
//HTML
    //   );
    $wgOut->addHTML(<<<HTML
<a id="book_nav" href="javascript:;"><img src="/assets/book/images/book.png"/></a>
HTML
    );


//    $wgOut->addHTML(file_get_contents(__DIR__."/../assets/book/book.tpl.html"));
//    $wgOut->addHTML(<<<HTML
//<a id="colorboxload" data-url="/assets/book/index.html">test colorbox</a>
//HTML
//);

//    $wgOut->addWikiTextAsContent("{{#colorboxload:/assets/book/page.html}}");

//    $wgOut->addScriptFile("/assets/book/js/turn.js");
//    $wgOut->addScriptFile("/assets/book/js/jquery.fullscreen.js");
//    $wgOut->addScriptFile("/assets/book/js/jquery.address-1.6.min.js");
//    $wgOut->addScriptFile("/assets/book/js/onload.js");

//    $wgOut->addHTML(file_get_contents(__DIR__."/../assets/share.htm.html"));
    // $wgOut->addWikiTextAsContent('{{AdditionalHeader}}');
    
    
    return true;
};

//require_once "$IP/extensions/tryExtension/tryExtension.php";
require_once "$IP/extensions/Colorbox/Colorbox.php";

$wgAllowSiteCSSOnRestrictedPages = true;
wfLoadExtension('CSS');
wfLoadExtension('Api');
//RequestContext::getMain()->getRequest()->setVal('uselang', 'zh-cn');


if (false) {
    wfLoadExtension('LanguageSelector');
    $wgLanguageSelectorLanguages = ['zh-cn', 'en'];
//$wgLanguageSelectorDetectLanguage = LANGUAGE_SELECTOR_PREFER_CLIENT_LANG;
//$wgLanguageSelectorLocation = LANGUAGE_SELECTOR_IN_TOOLBOX;
}

$wgHooks["ParserSectionCreate"][] = function ($parser, $section, &$sectionContent, $showEditLinks) {
    if ($section && $sectionContent) {
        if (preg_match("/<span (.+?) id=\"(.+?)\"/s", $sectionContent, $out)) {
            $hash = substr(md5($out[2]), 0, 12);
            $sectionContent = str_replace($out[0], "<span {$out[1]} id=\"{$hash}\"", $sectionContent);
            //var_dump($hash);
        }
//        if (preg_match("/<span(.*?)id=\"(.+?)\"/s", $sectionContent, $out)) {
//            $hash = md5(rawurldecode($out[2]));
//            $sectionContent = str_replace($out[0], "<span{$out[1]}id=\"{$hash}\"", $sectionContent);
//            //var_dump($hash);
//        }
        // die($sectionContent);
        
    }
};

$wgHooks["BeforePageRedirect"][] = function ($out, &$redirect, &$code) {
    if (preg_match("/#(.+?)$/", $redirect, $out)) {
        // die(rawurldecode($out[1]));
        $hash = substr(md5(rawurldecode($out[1])), 0, 12);
        $redirect = str_replace($out[1], $hash, $redirect);
        //var_dump($hash);
    }
    // die($redirect);
};
wfLoadExtension('MobileFrontend');
$wgDefaultMobileSkin = 'minerva';
$wgMinervaTalkAtTop['base'] = true;
$wgMinervaAdvancedMainMenu['base'] = true;
$wgMinervaPersonalMenu['base'] = true;
$wgMinervaHistoryInPageActions['base'] = true;
$wgMinervaOverflowInPageActions['base'] = true;
$wgMinervaShowCategories['base'] = true;


if (file_exists($config = __DIR__."/LocalSettings.local.php")) {
    require $config;
}









