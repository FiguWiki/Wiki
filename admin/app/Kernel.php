<?php

namespace App;

const DIR_SEP = DIRECTORY_SEPARATOR;
define("IS_SERVER",$_SERVER && $_SERVER['SERVER_NAME'] == "figu.org.cn");


class Kernel extends \Illuminate\Foundation\Application
{
    public function publicPath()
    {
        return dirname($this->basePath).DIR_SEP.'public'.DIR_SEP."admin";
        // return parent::publicPath(); // TODO: Change the autogenerated stub
    }
}
