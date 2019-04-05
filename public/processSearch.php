<?php
  // sleep(2);
  require_once('../private/initialize.php');
  session_start();
  if (anyCategoriesSelected()===false)
  {
    $items_set = find_all_items();
  }
  // else {
  //   $categoriesArray = convertSessionSelectedToArrayOfIDs();
  //   $items_set = findItemsInMultCategories($categoriesArray);
  // }
  //
  while($item = mysqli_fetch_assoc($items_set))
  {
    // commented out below is for title of items
    // if ( ($item_name === "") || stripos($item['name'], $item_name) !== false)
    // {
      echo createItemDisplay($item);
    // }
  }

  mysqli_free_result($items_set);
?>
