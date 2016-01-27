<?php

// DB constants
!defined("DB_HOST") ? define("DB_HOST", "127.0.0.1") : null;
!defined("DB_USER") ? define("DB_USER", "addadb") : null;
!defined("DB_PASS") ? define("DB_PASS", "oasis") : null;
!defined("DB_TIMEZONE") ? define("DB_TIMEZONE", "Asia/Calcutta") : null;
!defined("DB_DATE_FORMAT") ? define("DB_DATE_FORMAT", "%H:%i % %d %b") : null;

$database = "event_master";

$conn = @mysql_connect(DB_HOST, DB_USER, DB_PASS);

@mysql_select_db($database) or die("We are updating our Servers. Please check back later. ");