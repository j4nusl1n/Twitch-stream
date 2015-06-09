<?php
	header("Content-Type:text/html; charset=utf-8");
	date_default_timezone_set("Asia/Taipei");
	function getTime($name){
		$content=file_get_contents("http://nightdev.com/hosted/uptime.php?channel=$name");
		//echo $content;
		if($content=="The channel is not live.") echo "現在沒開台喔 Kappa";
		else{
			//echo $content;
			$aryStr=explode(" ", $content);
			//echo count($aryStr);
			//echo $aryStr[0]." ".$aryStr[2];
			$hour=date("H");
			$minute=date("i");
			if(count($aryStr)>2){
				echo "開台時間: ".date("m/d H:i", mktime($hour-$aryStr[0], $minute-$aryStr[2]))."。開台時數: ".$aryStr[0]." 小時 ".$aryStr[2]." 分";
			}
			else{
				if($aryStr[1]=="hours"||$aryStr[1]=="hour")
					echo "開台時間: ".date("m/d H:i", mktime($hour-$aryStr[0], $minute))."。開台時數: ".$aryStr[0]." 小時";
				else if($aryStr[1]=="minutes"||$aryStr[1]=="minutes")
					echo "開台時間: ".date("m/d H:i", mktime($hour, $minute-$aryStr[0]))."。開台時數: ".$aryStr[0]." 分";
			}
		}
	}
	getTime($_GET["name"]);
?>