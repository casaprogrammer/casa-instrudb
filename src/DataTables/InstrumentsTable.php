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

// DB table to use
$table = <<<EOT
 (
    SELECT 
      instruments.id,
      instrument_name,
      tag_name, 
      brand, 
      model,
      serial_number,
      category_id,
      location_id,
      category_name, 
      location_name,
      '<button class="btn btn-block btn-xs btn-info" id="buttonDetails"><i class="fas fa-clipboard-list"></i> Details</button>
      <button class="btn btn-block btn-xs btn-secondary" id="buttonHistory"><i class="fas fa-history"></i> History</button>' as buttons
    FROM
      instruments 
      LEFT JOIN categories ON categories.id = category_id
      LEFT JOIN locations ON locations.id = location_id
      WHERE `status` = 1
 ) temp
EOT;

// Table's primary key
$primaryKey = 'id';

// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case simple
// indexes
$columns = array(
    array('db' => 'id', 'dt' => 0),
    array('db' => 'instrument_name',  'dt' => 1),
    array('db' => 'tag_name',     'dt' => 2),
    array('db' => 'brand',     'dt' => 3),
    array('db' => 'model',     'dt' => 4),
    array('db' => 'serial_number',     'dt' => 5),
    array('db' => 'category_name',     'dt' => 6),
    array('db' => 'location_name',     'dt' => 7),
    array('db' => 'category_id',     'dt' => 8),
    array('db' => 'location_id',     'dt' => 9),
    array('db' => 'buttons',     'dt' => 10)
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