<?php
require_once('../private/initialize.php');
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

      <form action = "<?php echo url_for("/displayTemp.php"); ?>" method = "POST">

        <div class = "searchBar">
          <input type="text" name="item_name" placeholder= "Enter item to search"
          ><button type="submit" class = "searchButton"><i class="fa fa-search"></i></button>
        </div>

        <section class = "categoryRow">
				      <button class ="categoryBtn">Electronics</button>
				      <button class ="categoryBtn">Firearms & Ammunition</button>
				      <button class ="categoryBtn">Food & Drink</button>
				      <button class ="categoryBtn">Household & Tools</button>
        </section>
        <section class = "categoryRow">
				      <button class ="categoryBtn">Lighters & Flammables</button>
				      <button class ="categoryBtn">Medical</button>
				      <button class ="categoryBtn">Personal Items</button>
				      <button class ="categoryBtn">Sports & Camping</button>
        </section>
      </form>



	<section class = "item_display">
		<h1> Hydrogen Peroxide</h1>
		<div class = "allowedStatus">
			<div class = "allowedBox">
				<span>Carried</span>
				<?php echo getAllowedBoxText("Yes"); ?>
			</div>
			<div class = "allowedBox">
				<span>Checked</span>
				<?php echo getAllowedBoxText("No"); ?>
			</div>
		</div>
		<div class="discriptionDisplay">
				3% hydrogen peroxide found in drugstores and used to clean cuts is considered essential non-prescription medication. These liquids must be declared to the Screening Officer separately. Carry on: You can carry volumes greater than 100 ml (3.4 oz.) in your carry-on baggage. Checked: You can carry volumes greater than 100 ml (3.4 oz.) in your checked baggage.
		</div>
	</section>

<section class = "item_display">
		<h1> Hydrogen Peroxide</h1>
		<div class = "allowedStatus">
			<div class = "allowedBox">
				<span>Carried</span>
				<?php echo getAllowedBoxText("Yes (<100ml)"); ?>
			</div>

			<div class = "allowedBox">
				<span>Checked</span>
				<?php echo getAllowedBoxText("Yes (<350ml)"); ?>
			</div>
		</div>
		<div class="discriptionDisplay">
				3% hydrogen peroxide found in drugstores and used to clean cuts is considered essential non-prescription medication. These liquids must be declared to the Screening Officer separately. Carry on: You can carry volumes greater than 100 ml (3.4 oz.) in your carry-on baggage. Checked: You can carry volumes greater than 100 ml (3.4 oz.) in your checked baggage.
		</div>
	</section>

<section class = "item_display">
		<h1> Hydrogen Peroxide</h1>
		<div class = "allowedStatus">
			<div class = "allowedBox">
				<span>Carried</span>
				<?php echo getAllowedBoxText("Check with carrier"); ?>
			</div>

			<div class = "allowedBox">
				<span>Checked</span>
				<?php echo getAllowedBoxText("Check with carrier"); ?>
			</div>
		</div>
		<div class="discriptionDisplay">
				3% hydrogen peroxide found in drugstores and used to clean cuts is considered essential non-prescription medication. These liquids must be declared to the Screening Officer separately. Carry on: You can carry volumes greater than 100 ml (3.4 oz.) in your carry-on baggage. Checked: You can carry volumes greater than 100 ml (3.4 oz.) in your checked baggage.
		</div>
	</section>

  </body>
</html>
