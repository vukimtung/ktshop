<?php
    header('Content-Type: application/json');

    // database
    // define('DB_HOST', 'localhost');
    // define('DB_USERNAME', 'root');
    // define('DB_PASSWORD', '');
    // define('DB_NAME', 'webbanhphp');

    // $mysqli = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
    
    // if(!$mysqli){
    //     die("Connect failed: " . $mysqli->error);
    // }

    include("../../phantrangfrontend/connect.php");

    
    // $sql="SELECT id_order, total as thanhtien FROM orders WHERE (status !='Đã hủy')";
    $sql="SELECT product_id, name_pro, SUM(quantity * unitprice) as tong FROM order_details o LEFT JOIN products p ON o.product_id = p.id_pro  GROUP BY product_id ORDER BY tong DESC limit 8";
    $result=$connect->query($sql);

    $data = array();
    foreach ($result as $row) {
        $data[] = $row;
    }

    $result->close();

    print json_encode($data);
?>