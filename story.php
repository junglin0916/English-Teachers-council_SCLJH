<?php

		
 error_reporting (0); 

    $url = 'https://docs.google.com/document/d/1rV9Jz2fIlPPWF4kL-J7_jfENYXOYOgSzSPpmbtWkEV0/edit?usp=sharing';
    preg_match('/[\\?\\&]v=([^\\?\\&]+)/', $url, $matches);
    $id = $matches[0];
    $width = '700px';
    $height = '600px';
    

    echo  'This is the story page;'

   
?>
<!DOCTYPE html>
<html>
<head>

	<title>Love Story Role play</title>
</head>
<body>

<iframe width="800" height="925" src="https://docs.google.com/document/d/e/2PACX-1vRtNetAnNsoLOkgScNeofGhPlipuvaOWtAU2TPYy9mQCZ8OIqia1hodxjJgAmIqASSSvWfdhUKSCAsQ/pub?embedded=true"></iframe>