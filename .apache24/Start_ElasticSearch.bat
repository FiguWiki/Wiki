if "%1"=="hide" goto CmdBegin
start mshta vbscript:createobject("wscript.shell").run("""%~0"" hide",0)(window.close)&&exit
:CmdBegin
title "ElasticSearch"
call %~dp0elasticsearch-8.3.2\bin\elasticsearch.bat