<?php

namespace App;

class Hooks
{
    public static function onPageContentLanguage(\Title $title, &$pageLang, $userLang)
    {
        $pageLang = \Language::factory('zh-cn');
    }
}
