<?php

	//LOGOWANIE DO SERWERA
	$c['ts3'] = array(
            'host' => 'localhost', // IP ts3
	    'login_port' => 9987, // port ts3
            'query_port' => 10011, // port query 
            'login' => 'serveradmin', // login
	    'password' => 'password', // password
            'name' => 'Banner', 
			'channel' => '1',  // ID kanalu na ktorym ma siedziec bot
	);

	
	$c['ts3']['banner'] = array(
		'font' => 'fonts/agane.ttf',
		'banner' => 'img/banner.png',
		'save_to' => '/var/www/html/banner/banner.png',  // Sciezka gdzie ma zapisywac banner
	);
	$c['ts3']['positon'] = array(
				'online' => array(
					'size' => '25',
					'x' => '399',
					'y' => '384',
				),
				'odwiedzin' => array(
					'size' => '25',
					'x' => '104',
					'y' => '384',
				),
				'uptime' => array(
					'size' => '25',
					'x' => '695',
					'y' => '384',
				),
				'time' => array(
					'size' => '25',
					'x' => '1495',
					'y' => '531',
				),
	);
	
	$c['partners'] = array(
		'UCzgVSSvfIpBbc9IrTlGKEaQ',   // ID kanału yt ( https://i.imgur.com/q6ZWDhN.png )
		'UCS4c5bpra5blCUsHKPFSkig',
	);


?>