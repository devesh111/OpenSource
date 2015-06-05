<?php
require_once('config.php');
if(!is_dir($Config['upload_folder'])){
	echo 'Upload directory does not exist. Please make sure this directory exists at <b><i>'.$Config['upload_folder'].'</i></b>';die();
}
else if(!is_dir($Config['module_dir'])){
	echo 'Module directory does not exist. Please make sure this directory exists at <b><i>'.$Config['module_dir'].'</i></b>';die();
}
else if(file_exists('install.php')){
	header('Location: install.php');
}
else{
	if(isset($_GET['action']) && preg_match('/^[a-z]+$/',$_GET['action'])){
		$Config['site_template'] = ((isset($_GET['template']) && preg_match('/^[a-z]+$/',$_GET['template'])) ? $_GET['template'] : $Config['site_template']);
		require_once($Config['module_dir'].'w3-global/default/assets/w3lib/db-class.php');		// Database Class
		require_once($Config['module_dir'].'w3-global/default/assets/w3lib/functions.php');	// Global Functions
		require_once($Config['module_dir'].'w3-global/default/assets/w3lib/validation.php');	// Global Validation Class
		require_once($Config['module_dir'].'w3-global/default/assets/w3lib/filters.php');		// Global Filter Class
		$db			= new Query;
		$GetModule	= $db->Select("*","w3_module","name='".$_GET['action']."'");
		$GetAdmin 	= '';
		$GetUser	= '';
		if($GetModule){
			if(isset($_GET['assets']) && preg_match('/^[a-zA-Z0-9\-\_]+$/',$_GET['assets'])){
				if($_GET['ext'] == 'gif' || $_GET['ext'] == 'png' || $_GET['ext'] == 'jpg'){
					$EXT = 'image/png';
				}
				else if($_GET['ext'] == 'ico'){
					$EXT = 'image/shortcut-icon';
				}
				else if($_GET['ext'] == 'css'){
					$EXT = 'text/css';
				}
				else if($_GET['ext'] == 'js'){
					$EXT = 'text/javascript';
				}
				header("content-type: ".$EXT);
				echo file_get_contents($Config['module_dir'].'/'.$GetModule['file'].'/'.$Config['site_template'].'/assets/'.$_GET['assets'].'.'.$_GET['ext']);
			exit;
			}
			if(isset($_SESSION['w3-admin']) && filter_var($_SESSION['w3-admin'],FILTER_VALIDATE_EMAIL)){
				$GetAdmin	=	$db->Select("*","w3_admin","email='".$_SESSION['w3-admin']."' && status!='0'");
				(!$GetAdmin ? session_unset($_SESSION['w3-admin']) : '');
			}
			if(isset($_SESSION['w3-user']) && filter_var($_SESSION['w3-user'],FILTER_VALIDATE_EMAIL)){
				$GetUser	=	$db->Select("*","w3_user","email='".$_SESSION['w3-user']."' && status!='0'");
				(!$GetUser ? session_unset($_SESSION['w3-user']) : '');
				if(!isset($_SESSION['w3-admin'])){
					$GetAdmin	=	$db->Select("*","w3_admin","email='".$_SESSION['w3-user']."' && status!='0'");
					($GetAdmin ? ($_SESSION['w3-admin'] = $GetAdmin['email']) : '');
				}
				if(isset($_GET['uid']) && is_numeric($_GET['uid']) && isset($_SESSION['w3-admin'])){
					$GetUser	=	$db->Select("*","w3_user","id='".$_GET['uid']."' && status!='0'");
					($GetUser ? ($_SESSION['w3-user'] = $GetUser['email']) : '');
				}
			}
			require_once($Config['module_dir'].'w3-global/default/index.php');		// Global index
			if($GetModule['status']=='0'){
				header('Location: '.$Config['site_url'].'/global/error=503');
			}
			else if($GetModule['status']=='1'){
					($GetAdmin!='' ? ((file_exists($Config['module_dir'].$GetModule['file'].'/'.$Config['site_template'].'/index.php') ? require_once($Config['module_dir'].$GetModule['file'].'/'.$Config['site_template'].'/index.php') : (header('Location: '.$Config['site_url'].'/global/error=404')))) : header("Location: ".$Config['site_url']."/login.html"));
			}
			else if($GetModule['status']=='2'){
					($GetUser!='' ? ((file_exists($Config['module_dir'].$GetModule['file'].'/'.$Config['site_template'].'/index.php') ? require_once($Config['module_dir'].$GetModule['file'].'/'.$Config['site_template'].'/index.php') : (header('Location: '.$Config['site_url'].'/global/error=404')))) : header("Location: ".$Config['site_url']."/login.html"));
			}
			else if($GetModule['status']=='3'){
				
				(file_exists($Config['module_dir'].$GetModule['file'].'/'.$Config['site_template'].'/index.php') ? require_once($Config['module_dir'].$GetModule['file'].'/'.$Config['site_template'].'/index.php') : (header('Location: '.$Config['site_url'].'/global/error=404')));
			}
			else{
				header("Location: ".$Config['site_url']."/login.html");
			}
		}else{header('Location: '.$Config['site_url'].'/global/error=404');}
	}else{header('Location: '.$Config['site_url'].'/global/error=404');}
}
?>