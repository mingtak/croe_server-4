<?php
define (SYSNAME, 'NAIP');
define (VERSION, 'V3.4');
define (BUILD, '1005');
define (SYSOP, 'sysop');
define (SYSOPLOGIN, '7599e787a3efb2d06317a9bd7ab9808f');

define (SITETITLE, '微笑加倍　健康倍速');
define (SYSTITLE, SITETITLE . ' - 後端管理系統');
define (MASTERMAIL, 'allan.sung@gmail.com');

define (DBCONSERVER, 'localhost');
define (DBCONID, 'core-marketing');
define (DBCONPASSWORD, 'core');
define (DATABASE, 'core_marketing');
define (MAINFOLDER, 'supportan-demo');

define (SYSPATH, '/var/www/html/core_web/server-4/');
define (SITEURL, 'http://2016smile365.com.tw/');
define (ADMINURL, 'http://2016smile365.com.tw/admin/');

define (CONFIG, SYSPATH . 'config/');
define (MODULES, SYSPATH . 'modules/');
define (INCLUDES, SYSPATH . 'includes/');
define (PAGES, SYSPATH . 'pages/');
define (UPLOADPATH, SYSPATH . 'upload/');
define (PLUGINPATH, SYSPATH . 'plugin/');

define (CSS, SITEURL . 'css/');
define (JSCRIPT, SITEURL . 'js/');
define (IMAGES, SITEURL . 'images/');
define (POPUPS, SITEURL . 'popups/');
define (PLUGIN, SITEURL . 'plugin/');
define (UPLOAD, SITEURL . 'upload/');

define (DB, ADMINURL . 'db/');
define (COMMON, DB . 'common/');

define ('TABLE_PREFIX', 'supportan_');
define ('TABLE_PAGE', TABLE_PREFIX.'page');
define ('TABLE_LOGIN', TABLE_PREFIX.'login');
define ('TABLE_LOG', TABLE_PREFIX.'log');
?>
