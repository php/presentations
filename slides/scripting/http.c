/*
 * A Simple HTTP client with C
 */

#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include <stdarg.h>

#include <netdb.h>
#include <netinet/in.h>
#include <errno.h>
#include <sys/socket.h>
#include <unistd.h>

#ifndef PF_INET
#define PF_INET AF_INET
#endif

static void err (char *msgformat, ...)
{
    char    msgbuf [4096];
    va_list argv;
    int     len;

    va_start (argv, msgformat);
    len = vsprintf (msgbuf, msgformat, argv);
    va_end (argv);

    msgbuf[len] = 0;
    
    fprintf (stderr, msgbuf);
    fprintf (stderr, "\n");

    exit (-1);
}

static int connect_server (char *host, int port)
{
    struct hostent *hp;
    struct sockaddr_in remote;
    int sock;

    sock = socket (PF_INET, SOCK_STREAM, 0);
    if (sock == -1) {
	err ("Cannot open a new socket [%d]: %s", 
	     errno, strerror (errno));
    }

    hp = gethostbyname (host);
    if (hp == NULL) {
	err ("Cannot resolve hostname %s [%d]: %s", 
	     host, errno, strerror (errno));
    }

    memset (&remote, 0, sizeof (struct sockaddr_in));
    remote.sin_family = AF_INET;
    remote.sin_port   = htons (port);
    remote.sin_addr   = *((struct in_addr *) hp->h_addr);

    if (connect (sock, 
		 (struct sockaddr *) &remote, 
		 sizeof (struct sockaddr)) == -1) {
	err ("Cannot connect to %s [%d]: %s", 
	     host, errno, strerror (errno));
    }

    return sock;
}

static void send_request (int sock)
{
    int bytes;
#define REQUEST "GET / HTTP/1.0\r\n\r\n"

    bytes = send (sock, REQUEST, sizeof REQUEST, 0);
    if (bytes != sizeof REQUEST) {
	err ("Couldn't send HTTP Request");
    }
}

/* 
 * Doesn't handle HTTP header seperation 
 */
static void read_result (int sock, char **data)
{
    char *page = NULL;
    char  buf[4096];
    int   size = 0;
    int   bytes;

    do {
	memset (buf, 0, sizeof buf);

	bytes = recv (sock, buf, sizeof buf, 0);
	if (bytes == -1) {
	    err ("Cannot recieve data [%d]: %s",  
		 errno, strerror (errno));
	}

	if (bytes == 0) {
	    break;
	}

	page = realloc (page, size + bytes);
	if (page == NULL) {
	    err ("Cannot allocate %d bytes", size + bytes);
	}

	memcpy (page + size, buf, bytes);
	size += bytes;
    } while (1);

    *data = page;
}

static void close_connection (int sock)
{
    close (sock);
}

static char *perform_http_request (char *host, int port)
{
    char *data;
    int sock;

    sock = connect_server (host, port);
    send_request (sock);
    read_result (sock, &data);
    close_connection (sock);

    return data;
}

int main (int argc, char **argv)
{
    char *host;
    char *data;
    int   port = 80;

    switch (argc) {
	case 3:
	    port = atoi (argv[2]);
	case 2:
	    host = strdup (argv[1]);
	    break;
	default:
	    err ("Wrong argument count: "
		 "You must specify a hostname");
	    break;
    }

    data = perform_http_request (host, port);

    puts (data);

    free (data);
    free (host);

    return 1;
}
