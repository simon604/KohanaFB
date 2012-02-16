<?php
/*
$ajaxRequest = !empty($_SERVER['HTTP_X_REQUESTED_WITH'])
    && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';
if ($ajaxRequest) { */

if (isset($responseData)) {
	if (is_array($responseData)){
        $responseData = json_encode($responseData);
	}
	print $responseData;
}
?>