<?php
// echo '<pre>'.print_r($_SESSION,1).'</pre>';
$url 		= explode(URL, "http://" . $_SERVER["HTTP_HOST"] . $_SERVER['REQUEST_URI']);
$controller = '';
$action		= '';

if (is_array($url))
{
	$url_explode = explode('/', $url[1]);
	$controller  = $url_explode[0];

	if (empty($controller)) {
		$controller = 'index';
	}
	
	if (isset($url_explode[1])) {
		$action = $url_explode[1];
	} else {
		$action = 'index';
	}
}

$public_controller = explode(',', PUBLIC_URL);
if (in_array($controller, $public_controller))
{
	if (isset($_SESSION['acl'])) {
		header('location:'. URL);
	}
}
else
{
	if (isset($_SESSION['acl']))
	{
		if (isset($_SESSION['acl']['controller'][$controller]))
		{
			// access controller granted
			
			if ($action != 'index')
			{
				if (isset($_SESSION['acl']['action'][$controller][$action]))
				{
					// access controller > action granted

				} else {
					die('not allowed A');
				}
			}
		} else {
			die('not allowed C');
		}
	}
	else
	{
		echo "<script>window.location.href = '".URL."account/login';</script>";
	}
}