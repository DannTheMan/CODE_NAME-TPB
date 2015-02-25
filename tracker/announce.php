<?php
/*
 * ReopenTracker
 *
 * This is a fork of the OpenTracker project, which impliments PDO driver for SQLite
 * database support and is easily changed to MySQL if that is the preferred database.
 *
 * This application requires PHP5.
 *
 * @since  1.0.0
 */
header('Content-Type: text/plain; charset=utf-8');
require 'config.inc.php';
require 'class.reopendb.php';
require 'class.reopentracker.php';
require 'functions.reopentracker.php';
//log_request('announce');
$rotdb = new reopen_tracker;

$rotdb->announce();
