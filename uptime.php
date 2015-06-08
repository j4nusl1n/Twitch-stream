<?php
	function getTime($name){
		$content=file_get_contents("http://nightdev.com/hosted/uptime.php?channel=$name");
		//echo $content;
		if($content=="The channel is not live.") echo "現在沒開台喔 Kappa";
		else{
			//echo $content;
			$aryStr=explode(" ", $content);
			//echo $aryStr[0]." ".$aryStr[2];
			date_default_timezone_set("Asia/Taipei");
			$h=date("H");
			$m=date("i");
			echo "開台時間: ".date("m/d H:i", mktime($h-$aryStr[0], $m-$aryStr[2]))."。開台時數: ".$aryStr[0]." 小時 ".$aryStr[2]." 分";
		}
	}
	getTime($_GET["name"]);
?>