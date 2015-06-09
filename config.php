<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
ob_start("ob_gzhandler");
session_start();
// Main Database
$Config	= array(
	"db_user"							=>	"root",
	"db_pass"							=>	"",
	"db_name"							=>	"framework",
	"db_host"							=>	"localhost",
	"db_pfix"							=>	"",
	"site_name"							=>	"Untitled",
	"site_domain"						=>	"localhost",
	"site_url"							=>	"http://localhost",
	"site_title"						=>	"Untitled",
	"site_description"					=>	"",
	"upload_folder"						=>	$_SERVER['DOCUMENT_ROOT']."files",
	"admin_email"						=>	"you@example.com",
	"admin_email_pass"					=>	"XXXXX",
	"site_template"						=>	"default",
	"module_dir"						=>	"modules/"
);
date_default_timezone_set("Asia/Kolkata");
?>
