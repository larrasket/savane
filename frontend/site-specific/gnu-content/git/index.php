<?php

# Instructions about Git usage.
#
# Copyright (C) 2007 Sylvain Beucler
# Copyright (C) 2013, 2017, 2019 Ineiev <ineiev@gnu.org>
# Copyright (C) 2017 Bob Proulx
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

global $project, $repo_list;

$n = count ($repo_list);
if ($n > 1)
  echo "<p>"._('Note: this group has multiple Git repositories.')."</p>";
print '
<h2>'._('Anonymous clone:').'</h2>

<pre>';

for ($i = 0; $i < $n; $i++)
  {
    if ($n > 1)
      print $repo_list[$i]['desc'] . "\n";
    print "git clone https://git." . $project->getTypeBaseHost()
           . "/git/" . $repo_list[$i]['url'] . "\n";
    if ($i < $n - 1)
      print "\n";
  }

print '</pre>

<h2>'._('Member clone:').'</h2>

<pre>';

$username = user_getname();
if ($username == "NA")
  # For anonymous user.
  $username = '&lt;<i>'._('membername').'</i>&gt;';

for ($i = 0; $i < $n; $i++)
  {
    if ($n > 1)
      print $repo_list[$i]['desc'] . "\n";
    print "git clone " . $username . "@git."
         . $project->getTypeBaseHost() . ":"
         . $repo_list[$i]['path'] . "\n";
    if ($i < $n - 1)
      print "\n";
  }
print '</pre>

<h2>'._('More information').'</h2>
<a href="//savannah.gnu.org/maintenance/UsingGit">
https://savannah.gnu.org/maintenance/UsingGit</a>';

?>
