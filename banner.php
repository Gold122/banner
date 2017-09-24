<?php


	##		DON'T ALLOW EDIT		##
	##								##			
	##  Copyright by: Gold122,Anno  ##
	##								##
	##		DON'T ALLOW COPY		##

	require_once('config.php');
	require_once('src/ts3admin.class.php');
	require_once('src/functions.php');
	
	$ts = new ts3admin($c['ts3']['host'], $c['ts3']['query_port'], 2);
	if($ts->getElement('success', $ts->connect()))
	{
		$ts->login($c['ts3']['login'], $c['ts3']['password']);
		$ts->selectServer($c['ts3']['login_port']);
		$ts->setName($c['ts3']['name']);
		$whoam = $ts->getElement('data',$ts->whoAmI());
		$ts->clientMove($whoam['client_id'],$c['ts3']['channel']);
		
		while(1)
		{
			foreach($c['partners'] as $partners)
			{
				$yt = curl('http://api.goldproject.pl/yt.php?id='.$partners);
				if($yt != NULL)
				{
					if($yt != 'bad')
					{
						$serverInfo = $ts->getElement('data', $ts->serverInfo());
						$time = date("H:i");
						$online = $serverInfo['virtualserver_clientsonline'] - $serverInfo['virtualserver_queryclientsonline'];
						$uptime = $ts->convertSecondsToArrayTime($serverInfo['virtualserver_uptime']);
						$image = imagecreatefrompng($c['ts3']['banner']['banner']);
						imagealphablending($image, true);
						$white = imagecolorallocate($image,255,255,255);
				
						imagettftextCenter($image, $c['ts3']['positon']['online']['size'], 0, $c['ts3']['positon']['online']['x'], $c['ts3']['positon']['online']['y'], $white , $c['ts3']['banner']['font'] , $online);
						imagettftextCenter($image, $c['ts3']['positon']['odwiedzin']['size'], 0, $c['ts3']['positon']['odwiedzin']['x'], $c['ts3']['positon']['odwiedzin']['y'], $white , $c['ts3']['banner']['font'] , $serverInfo['virtualserver_client_connections']);
						imagettftextCenter($image, $c['ts3']['positon']['uptime']['size'], 0, $c['ts3']['positon']['uptime']['x'], $c['ts3']['positon']['uptime']['y'], $white , $c['ts3']['banner']['font'] , $uptime['days'].' D');
						imagettftextCenter($image, $c['ts3']['positon']['time']['size'], 0, $c['ts3']['positon']['time']['x'], $c['ts3']['positon']['time']['y'], $white , $c['ts3']['banner']['font'] , $time);
						$img = imagecreatefromjpeg($yt);
						$w = imagesx($img); 
						$h = imagesy($img);
						imagecopyresampled($image, $img, 46,106,0,0,747,150,$w,$h);
						imagepng($image, $c['ts3']['banner']['save_to']);
						imagedestroy($img);
						imagedestroy($image);
						sleep(60);
					}
					else
					{
						echo 'ERROR : BAD CHANNEL ID : '.$partners;
						echo PHP_EOL;
					}
				}
				else
				{
					echo 'ERROR : Brak Polaczenia z API';
					echo PHP_EOL;
					break;
				}
			}
		}
	}
	else
	{
		echo 'ERROR : Brak Polaczenia z ts';
		die;
	}