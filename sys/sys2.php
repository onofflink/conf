<?php

	include_once "mon_svc_common.php";
	include_once "mon_svc_linux.php";

	$loadavg = loadavg(true);
	$memory = memory();

	$fsys = filesystems();
	foreach ($fsys as $fs) {
		if($fs["mount"]=="/") {
			$hdd_tot = $fs["size"];
			$hdd_use = $fs["used"];
		}
	}

	$cpu = $loadavg['avg'][0] . " / 4 Core";

	$mem = number_format($memory["ram"]["app"]/1024/1024,1) . " / " . number_format($memory["ram"]["total"]/1024/1024,1) . " GB";
	$hdd = number_format($hdd_use/1024/1024,0) . " / " . number_format($hdd_tot/1024/1024,0) ." GB";

	$cpu2 = number_format($loadavg['cpupercent'],2)." %";
	$mem2 = number_format($memory["ram"]["app"]/$memory["ram"]["total"]*100,2) . " %";
	$hdd2 = number_format($hdd_use/$hdd_tot*100,2) ." %";

	$net = network();
	$net1 = number_format($net['  eth0']['tx_packets'] / 1024 / 1024 ,2);
	$net2 = number_format($net['  eth0']['rx_packets'] / 1024 / 1024 ,2);

	//echo $cpu . " (" . $cpu2 . ")" . "<br>";
	//echo $mem . " (" . $mem2 . ")" . "<br>";
	//echo $hdd . " (" . $hdd2 . ")" . "<br>";

	//$arr[] = array("no"=>"1","cpu"=>$loadavg['avg'][0]." / 4.0 (Load)","mem"=>$mem,"hdd"=>$hdd);
	//$arr[] = array("no"=>"2","cpu"=>number_format($loadavg['cpupercent'],2)." %","mem"=>$mem,"hdd"=>$hdd);


	echo "<tr>";
	echo "<td class='systb1'>CPU</td>";
	echo "<td class='systb2'>" . $cpu . " (" . $cpu2 . ")</td>";
	echo "</tr>";

	echo "<tr>";
	echo "<td class='systb1'>Memory</td>";
	echo "<td class='systb2'>" . $mem . " (" . $mem2 . ")</td>";
	echo "</tr>";

	echo "<tr>";
	echo "<td class='systb1'>HDD</td>";
	echo "<td class='systb2'>" . $hdd . " (" . $hdd2 . ")</td>";
	echo "</tr>";

	echo "<tr>";
	echo "<td class='systb1'>Network SEND</td>";
	echo "<td class='systb2'>" . $net1 . " (KB/s)</td>";
	echo "</tr>";

	echo "<tr>";
	echo "<td class='systb1'>Network RECV</td>";
	echo "<td class='systb2'>" . $net2 . " (KB/s)</td>";
	echo "</tr>";

	

?>