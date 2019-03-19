<?php
  require_once('../private/initialize.php');

  $item_name = $_POST['item_name']??"";

  // $electronics_cat = $_POST['electronics']??"";
  // $firearms_cat = $_POST['firearms-ammunition']??"";
  // $food_cat = $_POST['food-drink']??"";
  // $household_cat = $_POST['household-tools']??"";
  // $flammables_cat = $_POST['lighters-flammables']??"";
  // $medical_cat = $_POST['medical']??"";
  // $personal_cat = $_POST['personal-items']??"";
  // $sports_cat = $_POST['sports-camping']??"";
  //
  // echo "to delete";
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" media="all" href=" <?php echo url_for('stylesheets/baggage.css'); ?>" />
    <style media="screen">
      body{
        color:white;
      }
    </style>
  </head>
  <body>
    <p>
    <?php
      echo $item_name;
      $items_set = find_all_items();
      while($item = mysqli_fetch_assoc($items_set))
      {
        // If db field is null, it's returned to php and php understands it as null with is_null() but htmlspecialchars converts null to an empty string ""
        // echo "<br><br>" . h($item["name"]) . ",<br> id=" . h($item["id"]) . ",<br> carry_on=" . h($item["carry_on"]). ",<br> checked=" . h($item["checked"]). ",<br> description=" . h($item["description"]);
        echo createItemDisplay($item);
        // echo createItemDisplay2($item);
      }
      mysqli_free_result($items_set);
    ?>
  </p>
  </body>
</html>
