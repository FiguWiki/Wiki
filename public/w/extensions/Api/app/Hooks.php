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
     * @see https://www.mediawiki.org/wiki/Manual:Hooks/GetMagicVariableIDs
     * @param string[] &$variableIDs
     */
    public function onGetMagicVariableIDs( &$variableIDs ) {
        // Add the following to a wiki page to see how it works:
        // {{MYWORD}}
        $variableIDs[] = 'index';
    }

    /**
     * @param \Parser $parser
     * @return bool true
     * @throws \MWException
     */
    public static function onParserFirstCallInit( $parser ) {
        $parser->setFunctionHook( 'index', 'App\\HomePage::Render' );
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
