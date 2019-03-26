<?php
require_once('../private/initialize.php');
session_start();

$item_name = $_POST['item_name']??"";

if(!isset($_SESSION['selected'])) { initializeSessions(); }

foreach ($_POST as $name =>$value)
{
  if ($name !== "item_name")
  {
    updateSelected($name);
  }
}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Baggage</title>

    <link rel="stylesheet" media="all" href=" <?php echo url_for('stylesheets/baggage.css'); ?>" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="buttonHandler.js"></script>
  </head>
  <body>
    <section id = header>
      <h1>Baggage Check</h1>
      <p>Determine what you can bring as carry on or checked luggage!<p>
    </section>



      <form action = "<?php echo url_for("/index.php"); ?>" method = "POST">

        <div class = "search-bar">
          <input type="text" name="item_name" placeholder= "Enter item to search" value = <?php echo $item_name ?>
          ><button type="submit" class = "search-button"><i class="fa fa-search"></i></button>
        </div>

        <section class = "category-row">
				      <button type = "submit" name = "electronics" class ="<?php echo checkSelected('electronics') ? 'selected-btn' : 'not-selected-btn' ?>" value = "not_selected">Electronics</button>
				      <button type = "submit" name = "firearms-ammunition" class ="<?php echo checkSelected('firearms-ammunition') ? 'selected-btn' : 'not-selected-btn' ?>" value = "not_selected">Firearms & Ammunition</button>
				      <button type = "submit" name = "food-drink" class ="<?php echo checkSelected('food-drink') ? 'selected-btn' : 'not-selected-btn' ?>" value = "not_selected">Food & Drink</button>
				      <button type = "submit" name = "household-tools" class ="<?php echo checkSelected('household-tools') ? 'selected-btn' : 'not-selected-btn' ?>" value = "not_selected">Household & Tools</button>
        </section>
        <section class = "category-row">
				      <button type = "submit" name = "lighters-flammables" class ="<?php echo checkSelected('lighters-flammables') ? 'selected-btn' : 'not-selected-btn' ?>" value = "not_selected">Lighters & Flammables</button>
				      <!-- <button type = "submit" name = "medical" class ="not-selected-btn" value = "<?php //echo checkSelected() ?  'selected' :  'not_selected'; ?>">Medical</button> -->
				      <!-- <button type = "submit" name = "medical" class ="<?php// echo checkSelected() ? 'selected-btn' : 'not-selected-btn' ?>" value = "<?php //echo checkSelected() ? 'selected' : 'not_selected' ?>">Medical</button> -->
				      <button type = "submit" name = "medical" class ="<?php echo checkSelected('medical') ? 'selected-btn' : 'not-selected-btn' ?>" value = "not_selected">Medical</button>
				      <button type = "submit" name = "personal-items" class ="<?php echo checkSelected('personal-items') ? 'selected-btn' : 'not-selected-btn' ?>" value = "not_selected">Personal Items</button>
				      <button type = "submit" name = "sports-camping" class ="<?php echo checkSelected('sports-camping') ? 'selected-btn' : 'not-selected-btn' ?>" value = "not_selected">Sports & Camping</button>
        </section>
      </form>
		</section>

    <?php
      if (anyCategoriesSelected()===false)
      {
        $items_set = find_all_items();
      }
      else {
        $categoriesArray = convertSessionSelectedToArrayOfIDs();
        $items_set = findItemsInMultCategories($categoriesArray);
      }

      while($item = mysqli_fetch_assoc($items_set))
      {
        if ( ($item_name === "") || stripos($item['name'], $item_name) !== false)
        {
          echo createItemDisplay($item);
        }
      }

      mysqli_free_result($items_set);
    ?>

  </body>
</html>
