<?php
require_once('../private/initialize.php');
session_start();

$item_name = $_GET['item_name']??"";
$categories = $_GET['categories']??"";


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
    <a href="index.php">Reset</a><br>
    <a href="index.php?name=<?php echo u('john doe');?>">John</a>
    <section id = header>
      <h1>Baggage Check</h1>
      <p>Determine what you can bring as carry on or checked luggage!<p>
    </section>



      <form action = "<?php echo url_for("/index.php"); ?>" method = "GET">

        <div class = "search-bar">
          <input type="text" name="item_name" placeholder= "Enter item to search" value = <?php echo $item_name ?>
          ><button type="submit" class = "search-button"><i class="fa fa-search"></i></button>
        </div>

        <section class = "category-row">
				      <button type = "submit" name = "categories" class ="<?php echo h(isCategorySelected('electronics', $categories)); ?>" value = "<?php echo h(setCategoriesValue("electronics", $categories));?>">Electronics</button>
				      <button type = "submit" name = "categories" class ="<?php echo h(isCategorySelected('firearms-ammunition', $categories)); ?>" value = "<?php echo h(setCategoriesValue("firearms-ammunition", $categories));?>">Firearms & Ammunition</button>
				      <button type = "submit" name = "categories" class ="<?php echo h(isCategorySelected('food-drink', $categories)); ?>" value = "<?php echo h(setCategoriesValue("food-drink", $categories));?>">Food & Drink</button>
				      <button type = "submit" name = "categories" class ="<?php echo h(isCategorySelected('household-tools', $categories)); ?>" value = "<?php echo h(setCategoriesValue("household-tools", $categories));?>">Household & Tools</button>
        </section>
        <section class = "category-row">
				      <button type = "submit" name = "categories" class ="<?php echo h(isCategorySelected('lighters-flammables', $categories)); ?>" value = "<?php echo h(setCategoriesValue("lighters-flammables", $categories));?>">Lighters & Flammables</button>
				      <button type = "submit" name = "categories" class ="<?php echo h(isCategorySelected('medical', $categories)); ?>" value = "<?php echo h(setCategoriesValue("medical", $categories));?>">Medical</button>
				      <button type = "submit" name = "categories" class ="<?php echo h(isCategorySelected('personal-items', $categories)); ?>" value = "<?php echo h(setCategoriesValue("personal-items", $categories));?>">Personal Items</button>
				      <button type = "submit" name = "categories" class ="<?php echo h(isCategorySelected('sports-camping', $categories)); ?>" value = "<?php echo h(setCategoriesValue("sports-camping", $categories));?>">Sports & Camping</button>
        </section>
      </form>
		</section>

    <?php
      if (strcmp($categories,'')===0)
      {
        $items_set = find_all_items();
      }
      else {
        $categoriesIntArray = convertCategoriesToIntArray($categories);
        $items_set = findItemsInMultCategories($categoriesIntArray);
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
