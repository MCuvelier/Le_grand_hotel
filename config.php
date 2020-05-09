<?php

/**
 * Configuration for database connection
 *
 */

$host       = "localhost";
$username   = "eleve1";
$password   = "eleve1";
$dbname     = "eleve1_db";
$dsn        = "mysql:host=$host;dbname=$dbname";
$options    = array(
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
              );
