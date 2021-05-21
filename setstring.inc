<?php
// Report simple running errors
error_reporting(E_ERROR | E_WARNING | E_PARSE);
####################################
# setstring.inc - Version 1.0 - December 19 2002
# Copyright: Emmanuel M. Decarie - emm@scriptdigital.com - http://scriptdigital.com
# BSD License
# READ ME: http://www.scriptdigital.com/divers/phplocalization.html
# $Date: 2002/12/19 19:41:45 $ - $RCSfile: setstring.inc,v $ - $Revision: 1.1.1.1 $
####################################

# start the session
//session_start();

# Set the default language.
$defaultlanguage = "mal";

# Set to 1 if you want to use a cookie.
$use_cookie = 1;

# Cookie expiration.
$expire_cookie = 3600 * 24 * 2; /* 2 days */

# shortcuts for the links
$link_french 	= "<a href='" . $PHP_SELF . "?lang=fr'>Fran&ccedil;ais</a>";
$link_english 	= "<a href='" . $PHP_SELF . "?lang=en'>English</a>";
$link_logoff 	= "<a href='" . $PHP_SELF . "?logoff=1'>Logoff</a>";

# Set $getlang to the requested key for the language if a GET arg 'lang' exists.
$getlang = $_GET['lang'];

# Set a cookie to the GET arg 'lang' if it exists.
# Set the SESSION key 'lang' to the 'lang' value of the cookie if it exits.
if ( $use_cookie == 1 ) {
	if ( isset ($getlang) ) {
		setcookie ('lang', $getlang);
	}
	
	if ( isset ($_COOKIE['lang']) ) {
		$_SESSION['lang'] = $_COOKIE['lang'];
	}
}

# Destroy session and cookie.
if ( isset ($_GET['logoff']) ) {
	session_destroy ();
	if ( $use_cookie == 1 ) { setcookie ('lang',$getlang, -3600); }
	header ("Location: http://" . $_SERVER['HTTP_HOST'] . "/" . $PHP_SELF);
}

# The main routine.
# It expect an array for argument: ('lang1', 'string', 'lang2', string').
function setstring () {
	global $defaultlanguage;
	global $getlang;
	$lang = $_SESSION['lang'];
	$args = func_get_args ();
	
	# A newcomer.	
	if ( !isset ($lang) ) {
		//session_register ('lang');
		$lang = $defaultlanguage;
		$_SESSION['lang'] = $lang;
	}
	
	# give $_GET['lang'] the choice to set $lang 
	if (  isset ($getlang) ) { 
		$lang = $getlang;
		$_SESSION['lang'] = $lang;
		
	}
	
	# Now $lang have been set either by $languagedefautl, $getlang, or $_SESSION['lang'].
	# Loop in the language array and return $string if $lang is found.
	if ( count ($args) ) {
		if ( in_array ($lang, $args) ) {
			for ($i = 0; $i < count ($args); $i++) {
				if ( $args[$i] == $lang ) {
					return $args[$i + 1];
				}
			}
		}
	}
	return "";
}

?>
