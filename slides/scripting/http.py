import urllib
import sys

if (len(sys.argv) < 2):
    print "Must specify a URL\n"
    sys.exit(-1)

host = sys.argv[1]

f = urllib.urlopen (host)
print f.read()
