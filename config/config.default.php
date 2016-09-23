<?php
defined('DIRECTACCESS') OR exit('No direct script access allowed');

/**
 * This is the config file. Here you can adjust the site by changing the values below.
 */
$settings = array();

/**
 * Set the languages that are available for the user.
 */
$settings["languages"] = array("English" => "en_US", "Nederlands" => "nl_NL", "Swedish" => "sv_SE", "Polish" => "pl_PL");
$settings["defaultlanguage"] = "en_US";

/**
 * Change your language and timezone here if required.
 * Timezones: http://php.net/manual/en/timezones.php
 */
setlocale(LC_ALL, $settings["defaultlanguage"].'.UTF8');
date_default_timezone_set('UTC');

/**
 * The error level of PHP. Changing this is NOT needed.
 */
error_reporting(E_ALL);
ini_set('display_errors', '0');

/**
 * Development mode. If you want to develop your own template, get extra debug info when development is set to true.
 */
$settings["development"] = false;

/**
 * The location of php4dvd on your domain. This property sets itself automatically, but if it fails,
 * you can overwrite it manuall. If you run php4dvd on www.mydomain.com, leave this property empty.
 * If you run php4dvd on www.mydomain.com/php4dvd/, please fill out 'php4dvd'.
 */
$baseurl = $_SERVER['PHP_SELF'];
$baseurl = pathinfo($baseurl,PATHINFO_DIRNAME);
$baseurl = preg_replace("/^\//", "", $baseurl);
$baseurl = preg_replace("/^\\\\/", "", $baseurl);
$baseurl = preg_replace("/install/i", "", $baseurl);
$settings["url"]["base"] = $baseurl;

/**
 * The database settings.
 * Fill in the hostname of the databse, the databse name and the username and password to connect. 
 */
$settings["db"] = array();
$settings["db"]["host"] = "localhost";
$settings["db"]["port"] = 3306;
$settings["db"]["name"] = "php4dvd";
$settings["db"]["user"] = "root";
$settings["db"]["pass"] = "";
$settings["db"]["utf8"] = true;
$settings["db"]["debug"] = $settings["development"];

/**
 * Fix for MySQL with NO_ZERO_IN_DATE and/or STRICT_ALL_TABLES activated
 * http://dev.mysql.com/doc/refman/5.7/en/sql-mode.html#sqlmode_no_zero_in_date
 * Activate if you get SQL ERROR 1292 (0000-00-00) when saving movies.
 * If you get an error when activating this feature. Contact your webhost.
 */
$settings["db"]["NO_ZERO_IN_DATE"] = false;

/**
 * The location of the images (movie image and cover)
 */
$settings["photo"]["movies"] = "./movies/";
$settings["photo"]["covers"] = $settings["photo"]["movies"]."covers/";

/**
 * Define min/max size limits for upload (size in bytes) 
 */
$settings["photo"]["min_upload_size"] = 10000;
$settings["photo"]["max_upload_size"] = 2000000;

/**
 * Set max width/height limits (in pixels)
 */
$settings["photo"]["max_width"] = 2500;
$settings["photo"]["max_height"] = 3500;
 
/**
 * Thumbnails are made of the covers you upload. These are resized to a maximum width and height.
 */
$settings["photo"]["tn_maxwidth"] = 214;
$settings["photo"]["tn_maxheight"] = 800;

/**
 * Maximum width and height of posters.
 */
$settings["photo"]["p_maxwidth"] = 214;
$settings["photo"]["p_maxheight"] = 800;

/**
 * Can guest visitors view your movies? If you only want users with a login to view your movies, set this to false.
 */
$settings["user"]["guestview"] = false;

/**
 * Default admin username. You can't delete this user.
 */
$settings["user"]["defaultAdmin"] = "admin";

/**
 * Default template
 * Default theme skins: black, blue, green, purple, red, yellow
 */
$settings["template"] = 'default';
$settings["template_skin"] = 'blue';
$settings["template_skin_light"] = false;

/**
 * Smarty settings. 
 * The directory of the template engine Smarty. Default values will do fine.
 */
if(!isset($template_name))
	$template_name = $settings["template"];

$settings["smarty"]						= array();
$settings["smarty"]["template_dir"]		= "tpl/";
$settings["smarty"]["template"]			= $template_name;
$settings["smarty"]["compile_dir"]		= "compiled/";
$settings["smarty"]["debug"]			= $settings["development"];
$settings["smarty"]["development"]		= $settings["development"];

/**
 * Pretty URL
 * Rewrite /.?go=movie&id=1&name=name-of-movie into /movie/id/1/name/name-of-movie/
 */
 
$settings["pretty_url"] = false;

/**
 * Default amount of movies per page.
 * Display all movies with -1
 * 0 = 100
 */
 
$settings["results_per_page"] = 0;

/**
 * Number of pages before and after current.
 */
$settings["pagination"] = 0;