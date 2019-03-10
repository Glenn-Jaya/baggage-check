<?php

function find_all_items()
{
  global $db;


  $sql = "SELECT * FROM items ";
  //echo $sql;
  $result = mysqli_query($db, $sql);
  confirm_result_set($result);
  return $result;
}


function find_all_allowed_codes()
{
  global $db;

  $sql = "SELECT * FROM allowed";
  $result = mysqli_query($db, $sql);
  confirm_result_set($result);
  return $result;
}

function find_allowed_name_by_id($id)
{
  global $db;

  $sql = "SELECT * FROM allowed ";
  $sql .= "WHERE id = ". db_escape($db, $id) . " ";
  $sql .= "LIMIT 1";

  $resultSet = mysqli_query($db, $sql);
  $allowedAssocRow = mysqli_fetch_assoc($resultSet);
  $foundName = $allowedAssocRow["name"];

  return($foundName);

  // if empty set we want it to return ""
}


?>
