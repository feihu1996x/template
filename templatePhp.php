<?php
/*
* @file: 
* @brief: 
* @author: feihu1996.cn
* @date: 
* @version: 1.0
*/
ini_set('display_errors', true);
error_reporting(E_ALL);

/* 脚本异常处理 */
set_error_handler("errorHandler");
register_shutdown_function("superErrorHandler");

function errorHandler($type, $message, $file, $line)
{
	$msg = (string)$type." : ".(string)$message." in ".(string)$file." on ".(string)$line." line.";
	throw new Exception($msg);
}

function superErrorHandler()
{
	if ($error = error_get_last())
	{
		$type = $error['type'];
		$message = $error['message'];
		$file = $error['file'];
		$line = $error['line'];
		$msg = (string)$type." : ".(string)$message." in ".(string)$file." on ".(string)$line." line.";
		throw new Exception($msg);
	}
}
