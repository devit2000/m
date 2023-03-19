<?php
include('../configuration.php');
// Connect to datadase
function dbConn()
{
    $conn = mysqli_connect(HOST, USER, PWD, DB);
    if (!mysqli_connect_errno()) {
        return $conn;
    } else {
        echo "Error in connecting database :" . mysqli_connect_error();
        exit();
    }
}

// Close a database
function dbClose($conn)
{
    mysqli_close($conn);
}

// Select a table from a database
function dbSelect($table, $column = "*", $criteria = "", $clause = "")
{
    if (empty($table)) {
        return false;
    }
    $sql = "Select " . $column . " From " . $table;
    if (!empty($criteria)) {
        $sql .= " Where " . $criteria;
    }
    if (!empty($clause)) {
        $sql .= " " . $clause;
    }
    echo $sql;
    $conn = dbConn();
    $result = mysqli_query($conn, $sql);
    if (!$result) {
        echo "Error in selecting data : " . mysqli_error($conn);
        return false;
    }
    dbClose($conn);
    return $result;
}

// Insert a record in a database
function dbInsert($table, $data = array())
{
    if (empty($table) || empty($data)) {
        return false;
    }
    $conn = dbConn();
    $fields = implode(",", array_keys($data));
    $values = implode("','", /*mysqli_real_escape_string($conn, */ array_values($data));
    $sql = "insert into " . $table . " (" . $fields . ") values ('" . $values . "')";

    $result = mysqli_query($conn, $sql);
    if (!$result) {
        echo ("Error description: " . mysqli_error($conn));
        return false;
    }
    dbClose($conn);
    return true;
}

// Update
function dbUpdate($table, $data = array(), $criteria = "")
{
    if (empty($table) || empty($data) || empty($criteria)) {
        return false;
    }
    $fv = "";
    $conn = dbConn();
    foreach ($data as $field => $value) {
        $fv .= " " . $field . "='" . mysqli_real_escape_string($conn, $value) . "',"; //????????
    }
    $fv = substr($fv, 0, strlen($fv) - 1);
    $sql = "Update " . $table . " set " . $fv . " Where " . $criteria;
    $result = mysqli_query($conn, $sql);

    if (!$result) {
        echo ("Error description: " . mysqli_error($conn));
        return false;
    }
    dbClose($conn);
    return true;
}

//Delect a record from a database
function dbDelete($table, $criteria)
{
    if (empty($table) || empty($criteria)) {
        return false;
    }
    $sql = "Delect From " . $table . " Where " . $criteria;
    $conn = dbConn();
    $result = mysqli_query($conn, $sql);

    if (!$result) {
        echo ("Error description: " . mysqli_error($conn));
    }
    dbClose($conn);
    return true;
}

// Count records in database
function dbCount($table = "", $criteria = "")
{
    if (empty($table)) {
        return false;
    }
    $sql = "Select * From " . $table;

    if (!empty($criteria)) {
        $sql .= " Where " . $criteria;
    }
    $conn = dbConn();
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);

    if (!$result) {
        echo ("Error description: " . mysqli_error($conn));
        return false;
    }
    dbClose($conn);
    return $num;
}
