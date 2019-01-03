<!DOCTYPE html>
<html lang="en">
	<?php include ("header.php"); ?>
	<?php 
		$object1 = new menuItem("The WP Burger", "Freshly made all-beef patty served up with homefries", 14);
		$object2 = new menuItem("WP Kebobs", "Tender cuts of beef and chicken, served with your choice of side",17);
		
	?>
            <div id="content" class="clearfix">
                <aside>
                        <h2><?php date_default_timezone_set('America/Toronto'); echo date("l")."'s Specials"; ?></h2>
                        <hr> 
                        <img src="images/burger_small.jpg" alt="Burger" title= "<?php echo date("l")."'s Special - Burger";?>">
                        <h3><?php echo $object1->getItemName(); ?></h3>
                        <p><?php echo $object1->getDescription()." - $".$object1->getPrice(); ?></p>
                        <hr>
                        <img src="images/kebobs.jpg" alt="Kebobs" title="WP Kebobs">
                        <h3><?php echo $object2->getItemName(); ?></h3>
                        <p><?php echo $object2->getDescription()." -$".$object2->getPrice(); ?></p>
                        <hr>
                </aside>
                <div class="main">
                    <h1>Welcome</h1>
                    <img src="images/dining_room.jpg" alt="Dining Room" title="The WP Eatery Dining Room" class="content_pic">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>
                    <h2>Book your Christmas Party!</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>
                </div><!-- End Main -->
            </div><!-- End Content -->
<?php include ("footer.php"); ?>		    