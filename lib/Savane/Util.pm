#!/usr/bin/perl
# <one line to give a brief idea of what this does.>
# 
#  Copyright 2005 (c) Sylvain Beucler <beuc--beuc.net>
#
# This file is part of Savane.
# 
# Savane is free software: you can redistribute it and/or modify
# it under the terms of the GNU Affero General Public License as
# published by the Free Software Foundation, either version 3 of the
# License, or (at your option) any later version.
# 
# Savane is distributed in the hope that it will be useful,
# but WITHOUT ANY WARRANTY; without even the implied warranty of
# MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
# GNU Affero General Public License for more details.
# 
# You should have received a copy of the GNU Affero General Public License
# along with this program.  If not, see <http://www.gnu.org/licenses/>.
#
#

##
## Desc: any subs that may be useful in very rare cases
##

use strict "vars";
use Fcntl ':flock';
require Exporter;

# Exports
our @ISA = qw(Exporter);
our @EXPORT = qw(SQLStringEscape );

## Escapes data to be sent in a SQL string
## Returns a copy of the string, escaped
# arg0 : the string to escape
sub SQLStringEscape {
    my $str = $_[0];
    $str =~ s/\\/\\\\/g;
    $str =~ s/\'/\'\'/g;
    $str =~ s/\n/\\n/g;
    return $str;
}


