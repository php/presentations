#! /bin/bash -x
phpdoc -d /home/jesus/fortalk/SDPHP_MondoRegex \
-t /home/jesus/fortalk/SDPHP_MondoRegex/apidoc \
--pear -ti 'MondoRegex' \
-o 'HTML:frames:default,HTML:frames:phpedit,HTML:frames:earthli,HTML:frames:l0l33t,HTML:frames:phpdoc.de,HTML:frames:phphtmllib,XML:DocBook/peardoc2:default' 
