<?php

set_time_limit(0);

define('LINESIZE', 1024);
define('PORT', 1053);    
define('MAXCLIENTS', 5); 

function killDaemon()
{
    global $listenfd, $client;

    socket_close($listenfd);

    $msg = "Shutting Down...\n";
    $msg_len = strlen ($msg);

    for ($i = 0; $i < MAXCLIENTS; $i++) {
        if ($client[$i] != null) {
            socket_write($client[$i], $msg, $msg_len);
            socket_close($client[$i]);
        }
    }

    exit();
}

function closeClient($i)
{
    global $client, $remote_host, $remote_port;
	
    socket_close($client[$i]);
    $client[$i] = null;
    unset($remote_host[$i]);
    unset($remote_port[$i]);
}


$listenfd = socket_create (AF_INET, SOCK_STREAM, 0);
if (! $listenfd) {
	die ("Couldn't create socket!");
}

socket_set_option ($listenfd, SOL_SOCKET, SO_REUSEADDR, 1);

if (!socket_bind ($listenfd, "0.0.0.0", PORT)) {
	socket_close ($listenfd);
	die ('Cannot bind to port ' . PORT . " and address 0.0.0.0\n");
}

socket_listen ($listenfd, 10);

$maxi = -1;
for ($i = 0; $i < MAXCLIENTS; $i++) {
	$client[$i] = null;
}

while(1) {
	$rfds[0] = $listenfd;

	for ($i = 0; $i < FD_SETSIZE; $i++) {
		if ($client[$i] != null) {
			$rfds[$i + 1] = $client[$i];
		}
	}


	$nready = socket_select($rfds, $null, $null, null);
	if (in_array($listenfd, $rfds)) {
		for ($i = 0; $i < FD_SETSIZE; $i++) {
			if ($client[$i] == null) {
				$client[$i] = socket_accept($listenfd);
				socket_set_option ($client[$i], 
								   SOL_SOCKET, SO_REUSEADDR, 
								   1);
				socket_getpeername($client[$i], 
								   $remote_host[$i], 
								   $remote_port[$i]);
				break;
			}

			if ($i == FD_SETSIZE - 1) {
				trigger_error("too many clients", E_USER_ERROR);
				exit ();
			}
		}

		if ($i > $maxi) {
			$maxi = $i;
		}

		if (--$nready <= 0) {
			continue;
		}
	}


	// check the clients for incoming data.

	for ($i = 0; $i <= $maxi; $i++) {
		if ($client[$i] == null)
			continue;

		if (in_array($client[$i], $rfds)) {
			$n = trim(socket_read($client[$i], LINESIZE));

			if (!$n) {
				closeClient($i);
			} else {
				switch ($n) {
				case '/kill':
					killDaemon();
					break;
				case '/quit':
					closeClient($i);
					break;
				default:
					for ($j = 0; $j <= $maxi; $j++) {
						if ($client[$j] != null) {
							socket_write($client[$j], 
										 "From client[$i]: $n\r\n");
						}
					}
					break;
				}
			}

			if  (--$nready <= 0) {
				break;
			}
		}
	}
}

/**
 * Local Variables:
 * c-basic-offset: 4
 * tab-width: 4
 * End:
 */

?>


