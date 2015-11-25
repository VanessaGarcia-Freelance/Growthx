
<?php

// rita, max, derek, dominic, thatcher --> no company name or name?
// swicth max and thatcher? but crop max

$headshots = array(
  1 => array (
    "name" => "Scott Levy",
    "company" => "GrowthX"
  ),
  2=> array (
    "name" => "Amanda Potter",
    "company" => "Cleanify"
  ),
  3=> array (
    "name" => "Andrew Goldner",
    "company" => "GrowthX"
  ),
  4=> array (
    "name" => "Thatcher Spring",
    "company" => "GearLaunch"
  ),
  5=> array (
    "name" => "Agustina Sartori",
    "company" => "GlamSt"
  ),
  6=> array (
    "name" => "Fynn Glover",
    "company" => "RootsRates"
  ),
  7=> array (
    "name" => "Dolly Singh",
    "company" => "Thesis Couture"
  ),
  8=> array (
    "name" => "Ryan Kulp",
    "company" => "GrowthX"
  ),
  9=> array (
    "name" => "Emilia Chagas",
    "company" => "Contentools"
  ),
  10=> array (
    "name" => "Andy Marell",
    "company" => "GrowthX"
  ),
  11=> array (
    "name" => "Rita Almela",
    "company" => "AlmaShopping"
  ),
  12=> array (
    "name" => "Max Menke",
    "company" => "GrowthX"
  ),
  13=> array (
    "name" => "Derek Skaletsky",
    "company" => "Knowtify"
  ),
  14=> array (
    "name" => "Dominick Accattato",
    "company" => "Infrared5"
  ),
  15=> array (
    "name" => "Max Lock",
    "company" => "Fleet"
  ),
  16=> array (
    "name" => "Kendall Romine",
    "company" => "GrowthX"
  ),
  17=> array (
    "name" => "Chris Allen",
    "company" => "Infrared5"
  ),
  18=> array (
    "name" => "Carolina Banales",
    "company" => "GlamSt"
  ),
  19=> array (
    "name" => "Christine Miao",
    "company" => "Clowder"
  ),
  20=> array (
    "name" => "Justin Potter",
    "company" => "Cleanify"
  ),
  21=> array (
    "name" => "Luis Sanchez",
    "company" => "Cleanify"
  ),
  22=> array (
    "name" => "David Drake",
    "company" => "Smoke Reports"
  ),
  23=> array (
    "name" => "Russell Lewis",
    "company" => "GrowthX"
  ),
  24=> array (
    "name" => "Ellie Bolus",
    "company" => "Choix"
  ),
  25=> array (
    "name" => "Priscilla Maciel",
    "company" => "AlmaShopping"
  ),
  26=> array (
    "name" => "Kellee Khalil",
    "company" => "Loverly"
  ),
  27=> array (
    "name" => "Will Bunker",
    "company" => "GrowthX"
  ),
  28=> array (
    "name" => "Abtin Hamidi",
    "company" => "CargoChief"
  ),
  29=> array (
    "name" => "Russell Jones",
    "company" => "Cargo Chief"
  ),
  30=> array (
    "name" => "Sean Sheppard",
    "company" => "GrowthX"
  ),
  31=> array (
    "name" => "Rebecca Allen",
    "company" => "Infrared5"
  ),
  32=> array (
    "name" => "Brad Holliday",
    "company" => "GrowthX"
  )

)
?>

<div id="ri-grid" class="membergrid ri-grid ri-grid-size-3">
  <img class="ri-loading-image" src="http://growthx1.wpengine.com/wp-content/uploads/2015/11/loading.gif"/>

  <ul>
  <?php  
     $totalimages = 32;
    //Display the contents 
  $i=1;
    while ($i <= $totalimages ) :    
    ?>
    <li>
      <a class="member" href="/community">
        <img src="<?php echo get_stylesheet_directory_uri().'/assets/images/grid-'.$i.'.jpg';?>" />
        <div class="text <?php if($i > 24){ echo 'bottomrow'; } ?>">
          <p class="name"><?php echo $headshots[$i]['name']; ?><br /><?php echo $headshots[$i]['company']; ?></p> 
        </div>
      </a>
    </li>

    
  <?php $i++; endwhile;?> 

</ul>
</div>
