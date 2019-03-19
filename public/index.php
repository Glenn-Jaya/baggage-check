<?php
require_once('../private/initialize.php');
session_start(); // thought put here maybe that's category button not working
$item_name = $_POST['item_name']??"";

// echo $item_name;
$items_set = find_all_items();

$medical_cat = $_POST['medical']??"";
$personal_cat = $_POST['personal-items']??"";


// isset($_POST['medical']) ? if (// text = selected) add to array : else do nothing
// if(isset($_POST['medical'])) echo "medical"; // REPLACE WITH ADD TO SESSION VAR



// session_start();
if(!isset($_SESSION['selected'])) { initializeSessions(); }
// initializeSessions();

foreach ($_POST as $name =>$value)
{
  if ($name !== "itemName")
  {
    updateSelected($name);
  }
}
// updateSelected('medical');

echo "break";



// while($item = mysqli_fetch_assoc($items_set))
// {
//   // If db field is null, it's returned to php and php understands it as null with is_null() but htmlspecialchars converts null to an empty string ""
//   // echo "<br><br>" . h($item["name"]) . ",<br> id=" . h($item["id"]) . ",<br> carry_on=" . h($item["carry_on"]). ",<br> checked=" . h($item["checked"]). ",<br> description=" . h($item["description"]);
//   echo createItemDisplay($item);
//   // echo createItemDisplay2($item);
// }
// mysqli_free_result($items_set);

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Baggage</title>

    <link rel="stylesheet" media="all" href=" <?php echo url_for('stylesheets/baggage.css'); ?>" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <body>
    <h1>Coming Soon!</h1>

      <!-- <form action = "<?php //echo url_for("/displayTemp.php"); ?>" method = "POST"> -->
      <form action = "<?php echo url_for("/index.php"); ?>" method = "POST">
      <!-- <form action = "" method = "POST"> -->

        <div class = "searchBar">
          <input type="text" name="item_name" placeholder= "Enter item to search"
          ><button type="submit" class = "searchButton"><i class="fa fa-search"></i></button>
        </div>

        <!-- Note might have to remove the type = buttons below so that it submits every time and every time it does a category search -->
        <section class = "categoryRow">
				      <button type = "submit" name = "electronics" class ="<?php echo checkSelected('electronics') ? 'selectedBtn' : 'categoryBtn' ?>" value = "not_selected">Electronics</button>
				      <button type = "submit" name = "firearms-ammunition" class ="<?php echo checkSelected('firearms-ammunition') ? 'selectedBtn' : 'categoryBtn' ?>" value = "not_selected">Firearms & Ammunition</button>
				      <button type = "submit" name = "food-drink" class ="<?php echo checkSelected('food-drink') ? 'selectedBtn' : 'categoryBtn' ?>" value = "not_selected">Food & Drink</button>
				      <button type = "submit" name = "household-tools" class ="<?php echo checkSelected('household-tools') ? 'selectedBtn' : 'categoryBtn' ?>" value = "not_selected">Household & Tools</button>
        </section>
        <section class = "categoryRow">
				      <button type = "submit" name = "lighters-flammables" class ="<?php echo checkSelected('lighters-flammables') ? 'selectedBtn' : 'categoryBtn' ?>" value = "not_selected">Lighters & Flammables</button>
				      <!-- <button type = "submit" name = "medical" class ="categoryBtn" value = "<?php //echo checkSelected() ?  'selected' :  'not_selected'; ?>">Medical</button> -->
				      <!-- <button type = "submit" name = "medical" class ="<?php// echo checkSelected() ? 'selectedBtn' : 'categoryBtn' ?>" value = "<?php //echo checkSelected() ? 'selected' : 'not_selected' ?>">Medical</button> -->
				      <button type = "submit" name = "medical" class ="<?php echo checkSelected('medical') ? 'selectedBtn' : 'categoryBtn' ?>" value = "not_selected">Medical</button>
				      <button type = "submit" name = "personal-items" class ="<?php echo checkSelected('personal-items') ? 'selectedBtn' : 'categoryBtn' ?>" value = "not_selected">Personal Items</button>
				      <button type = "submit" name = "sports-camping" class ="<?php echo checkSelected('sports-camping') ? 'selectedBtn' : 'categoryBtn' ?>" value = "not_selected">Sports & Camping</button>
        </section>
      </form>

		</section>

    <script>

      function selectButton()
      {
          if (this.classList.contains("categoryBtn"))
          {
            this.classList.remove("categoryBtn");
            this.classList.add("selectedBtn");
            // might not do this anymore b/c might gotta use checkboxes T_T
            this.value = "selected";
          }
          else {
            this.classList.remove("selectedBtn");
            this.classList.add("categoryBtn");
            this.value = "not_selected";
          }
      }

      var buttons = document.getElementsByClassName("categoryBtn");
      for(i=0; i < buttons.length; i++) {
        buttons.item(i).addEventListener("click", selectButton);
      }
    </script>

    <?php
      // // echo $item_name;
      // $items_set = find_all_items();
      //
      // $medical_cat = $_POST['medical']??"";
      // $personal_cat = $_POST['personal-items']??"";
      //
      //
      // // isset($_POST['medical']) ? if (// text = selected) add to array : else do nothing
      // // if(isset($_POST['medical'])) echo "medical"; // REPLACE WITH ADD TO SESSION VAR
      //
      //
      //
      // // session_start();
      // if(!isset($_SESSION['selected'])) { $_SESSION['selected'] = []; }
      // $_SESSION['selected']?? initializeSessions();
      //
      // foreach ($_POST as $name =>$value)
      // {
      //   if ($name !== "itemName")
      //   {
      //     updateSelected($name);
      //   }
      // }
      // // updateSelected('medical');
      //
      // echo "break";
      //
      //
      //
      while($item = mysqli_fetch_assoc($items_set))
      {
        // If db field is null, it's returned to php and php understands it as null with is_null() but htmlspecialchars converts null to an empty string ""
        // echo "<br><br>" . h($item["name"]) . ",<br> id=" . h($item["id"]) . ",<br> carry_on=" . h($item["carry_on"]). ",<br> checked=" . h($item["checked"]). ",<br> description=" . h($item["description"]);
        echo createItemDisplay($item);
        // echo createItemDisplay2($item);
      }
      mysqli_free_result($items_set);
    ?>

  </body>
</html>
