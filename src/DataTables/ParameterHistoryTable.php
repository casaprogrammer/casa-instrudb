<?php

/*
 * DataTables example server-side processing script.
 *
 * Please note that this script is intentionally extremely simply to show how
 * server-side processing can be implemented, and probably shouldn't be used as
 * the basis for a large complex system. It is suitable for simple use cases as
 * for learning.
 *
 * See http://datatables.net/usage/server-side for full details on the server-
 * side processing requirements of DataTables.
 *
 * @license MIT - http://datatables.net/license_mit
 */

/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * Easy set variables
 */

if ($_GET) {
    $instrumentId = $_GET['instrumentId'];
}

// DB table to use
$table = <<<EOT
 (
    SELECT 
      parameter_name,
      parameter_value, 
      date_calibration, 
    FROM
      parameter_logs 
      LEFT JOIN instruments ON instruments.id = instrument_id
      WHERE `instrument_id` = $instrumentId
 ) temp
EOT;

// Table's primary key
$primaryKey = 'id';

// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case simple
// indexes
$columns = array(
    array('db' => 'parameter_name', 'dt' => 0),
    array('db' => 'parameter_value',  'dt' => 1),
    array('db' => 'date_calibration',     'dt' => 2),
);

// SQL connection information
require('/webroot/www/InstruDB/config/DataTablesConfig.php');


/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * If you just want to use the basic configuration for DataTables with PHP
 * server-side, there is no need to edit below this line.
 */

require('/webroot/www/InstruDB/config/ssp.class.php');

echo json_encode(
    SSP::simple($_GET, $sql_details, $table, $primaryKey, $columns)
);
