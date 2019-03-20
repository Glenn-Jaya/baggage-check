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

function findItemsInCategory($id)
{
  global $db;

  $sql = "SELECT * FROM items ";
  $sql .= "INNER JOIN item_category on items.id = item_category.item_id ";
  $sql .= "INNER JOIN categories on categories.id = item_category.category_id ";
  $sql .= "WHERE categories.id = '" . $id . "'";

  $result = mysqli_query($db, $sql);
  confirm_result_set($result);

  // return find_all_items();
  return $result;
}

function findItemNameById($id)
{
    global $db;
    $foundName = "";
    $sql = "SELECT * FROM items where id = '" . $id . "' ";
    $sql .= "LIMIT 1";

    $resultSet = mysqli_query($db, $sql);
    $allowedAssocRow = mysqli_fetch_assoc($resultSet);
    $foundName = $allowedAssocRow ["name"];

    return($foundName);
}

function findItemsInMultCategories($categoriesArray)
{
  global $db;

  $sql = "SELECT * FROM items as it ";
  $sql .= "INNER JOIN item_category AS ic on it.id = ic.item_id ";
  $categoriesInQuotes = "'".implode("','", $categoriesArray)."'";
  $sql .= "WHERE ic.category_id IN ( " . $categoriesInQuotes . ") ";
  $sql .= "GROUP BY it.id ";
  $sql .= "HAVING COUNT(it.id) = '" . count($categoriesArray) . "'";

  $result = mysqli_query($db, $sql);
  confirm_result_set($result);

  return($result);
}

function findCategoryIdByName($categoryName)
{
    global $db;
    $foundID = "";
    $sql = "SELECT * FROM categories where name = '" . $categoryName . "' ";
    $sql .= "LIMIT 1";

    $resultSet = mysqli_query($db, $sql);
    $allowedAssocRow = mysqli_fetch_assoc($resultSet);
    $foundID = $allowedAssocRow ["id"];

    return($foundID);
}



?>
