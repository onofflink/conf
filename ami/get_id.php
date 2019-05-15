<?php 
/* ============================ */
/*   PHP Asterisk Peer Status   */
/* ============================ */
/*    (C) 2009 Matt Riddell     */
/*     Daily Asterisk News      */
/* www.venturevoip.com/news.php */
/*      Public domain code      */
/* ============================ */

/* Connection details */
$manager_host = "127.0.0.1";
$manager_user = "usrami";
$manager_pass = "sc8899";

/* Default Port */
$manager_port = "5038";

/* Connection timeout */
$manager_connection_timeout = 30;

$conf_code = $_GET['ROOMNUM'];
$chan = $_GET['CHAN'];

//$id = $_GET['ID'];

/* Connect to the manager */
$fp = fsockopen($manager_host, $manager_port, $errno, $errstr, $manager_connection_timeout);
if (!$fp) {
    echo "There was an error connecting to the manager: $errstr (Error Number: $errno)\n";
} else {
    //echo "-- Connected to the Asterisk Manager" . "<br>";
    //echo "-- About to log in" . "<br>";

    $login = "Action: login\r\n";
    $login .= "Username: $manager_user\r\n";
    $login .= "Secret: $manager_pass\r\n";
    $login .= "Events: Off\r\n";
    $login .= "\r\n";
    fwrite($fp,$login);

    $manager_version = fgets($fp);

    $cmd_response = fgets($fp);

    $response = fgets($fp);

    $blank_line = fgets($fp);

    if (substr($response,0,9) == "Message: ") {
        /* We have got a response */
        $loginresponse = trim(substr($response,9));
        if (!$loginresponse == "Authentication Accepted") {
            echo "-- Unable to log in: $loginresponse\n";
            fclose($fp);
            exit(0);
        } else {
            //echo "-- Logged in Successfully" . "<br>";
			
			$checkpeer = "Action: command\r\n";
            $checkpeer .= "Command: meetme list $conf_code\r\n";
			
            $checkpeer .= "\r\n";

			//echo $checkpeer . "<br>";

            fwrite($fp,$checkpeer);
            
			// asterisk 13 version
			/*  
			while ($line != "--END COMMAND--") {
				$line = trim(fgets($fp));
				//echo $line . "<br>";

				$p= preg_split('/ /', $line,-1,PREG_SPLIT_NO_EMPTY);
			
				//echo 'p0:' . $p[0] . "<br>";

				if ($p[0] == 'User') {
					$line_id =  $p[2];
					$line_ch =  $p[6];

					if($line_ch == $chan) {
						$my_id = $line_id;
						
						break;
					}
				}
			}
			*/


			// asterisk 1.8 version
			while ($line != "--END COMMAND--") {
				$line = trim(fgets($fp));
				//echo $line . "<br>";

				$p= preg_split('/ /', $line,-1,PREG_SPLIT_NO_EMPTY);
			
				//echo 'p0:' . $p[0] . "<br>";

				if ($p[0] == 'User') {
					$line_id =  $p[2];
					$line_ch =  $p[7];

					//echo 'test:' . $p[0] . $p[2] . $p[7] . "<br>";

					if($line_ch == $chan) {
						$my_id = $line_id;
						
						break;
					}
				}
			}

			//echo 'ch:' . $chan . "<br>";
			//echo 'id:' . $my_id . "<br>";
	
            //fclose($fp);

			if($my_id) {
				echo "SUCCESS - " . $my_id;
			}
			else {
				echo "ERROR - No USERID";
			}

            
        }
    } else {
        echo "ERROR - Unexpected response: $response\n";
        fclose($fp);
        exit(0);
    }
}
?>