<?php

require 'functions.reopentracker.php';

$str = serialize($_REQUEST);

$file = 'torren.torrent';

$current = file_get_contents($file);

echo sha1(bencode(bdecode($current)['info']));
