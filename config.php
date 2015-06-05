<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
ob_start("ob_gzhandler");
session_start();
// Main Database
$Config	= array(
	"db_user"							=>	"refv4",
	"db_pass"							=>	"kullu00700",
	"db_name"							=>	"refv4",
	"db_host"							=>	"localhost",
	"db_pfix"							=>	"",
	"site_name"							=>	"Referaly",
	"site_domain"						=>	"ref-v4.etlabs.in",
	"site_url"							=>	"http://ref-v4.etlabs.in",
	"site_title"						=>	"Referaly",
	"site_description"					=>	"",
	"upload_folder"						=>	$_SERVER['DOCUMENT_ROOT']."files",
	"appid"								=>	"515293141939627",
	"secret"							=>	"542d8cb8eeed1943856bc3e8e6447006",
	"admin_email"						=>	"kuldeep@etlabs.in",
	"admin_email_pass"					=>	"T5wbZuL7z4X",
	"site_template"						=>	"default",
	"module_dir"						=>	"/home/admin/refv4module/"
);
date_default_timezone_set("Asia/Kolkata");
?>