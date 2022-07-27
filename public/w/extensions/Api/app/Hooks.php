<?php

namespace App;

class Hooks
{
    public static $app;

    public static function Init(){
        //todo
        global $app;
        if ($app == null) {
            $app = require __DIR__."/../bootstrap/app.php";
        }
        self::$app = $app;
        global $wgActionPaths, $wgArticlePath;
        $wgActionPaths["md"] = "$wgArticlePath/md";
    }

    /**
     * @param \Parser $parser
     * @return bool true
     * @throws \MWException
     */
    public static function onParserFirstCallInit( $parser ) {
        $parser->setFunctionHook( 'spa', 'App\\HomePage::Render' );
        return true;
    }



    public static function onBeforeInitialize(\Title &$title, $unused, \OutputPage $output, \User $user, \WebRequest $request, \MediaWiki $mediaWiki)
    {

    }

    public static function onPageContentLanguage(\Title $title, &$pageLang, $userLang)
    {
        //$pageLang = \Language::factory('zh-cn');
    }
}
