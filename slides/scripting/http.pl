#!/usr/bin/perl

use strict;
use LWP::Simple;

die "URL to fetch is required!\n" 
    if scalar @ARGV < 1;

print get pop;
