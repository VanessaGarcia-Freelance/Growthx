
<?php

// rita,  , derek, dominic, thatcher --> no company name or name?
// swicth max and thatcher? but crop max

$headshots = array(
  1 => array (
    "name" => "Scott Levy",
    "company" => "GrowthX",
    "img" => "grid-1"
  ),
  2=> array (
    "name" => "Amanda Potter",
    "company" => "Cleanify",
    "img" => "grid-2"
  ),
  3=> array (
    "name" => "Andrew Goldner",
    "company" => "GrowthX",
    "img" => "grid-3"
  ),
  4=> array (
    "name" => "Max Menke",
    "company" => "GrowthX",
    "img" => "grid-12"
  ),
  5=> array (
    "name" => "Agustina Sartori",
    "company" => "GlamSt",
    "img" => "grid-5"
  ),
  6=> array (
    "name" => "Fynn Glover",
    "company" => "RootsRates",
    "img" => "grid-6"
  ),
  7=> array (
    "name" => "Dolly Singh",
    "company" => "Thesis Couture",
    "img" => "grid-7"
  ),
  8=> array (
    "name" => "Ryan Kulp",
    "company" => "GrowthX",
    "img" => "grid-8"
  ),
  9=> array (
    "name" => "Emilia Chagas",
    "company" => "Contentools",
    "img" => "grid-9"
  ),
  10=> array (
    "name" => "Andy Marell",
    "company" => "GrowthX",
    "img" => "grid-10"
  ),
  11=> array (

    //"name" => "Rita Almela",
    //"company" => "AlmaShopping",
    "name" => " ",
    "company" => " ",
    "img" => "grid-11"
  ),
  12=> array (
    //"name" => "Thatcher Spring",
    //"company" => "GearLaunch",
    "name" => " ",
    "company" => " ",
    "img" => "grid-4"
  ),
  13=> array (
    //"name" => "Derek Skaletsky",
   // "company" => "Knowtify",
    "name" => " ",
    "company" => " ",
    "img" => "grid-13"
  ),
  14=> array (
    //"name" => "Dominick Accattato",
//    "company" => "Infrared5",
    "name" => " ",
    "company" => " ",
    "img" => "grid-14"
  ),
  15=> array (
    "name" => "Max Lock",
    "company" => "Fleet", 
    "img" => "grid-15"
  ),
  16=> array (
    "name" => "Kendall Romine",
    "company" => "GrowthX",
    "img" => "grid-16"
  ),
  17=> array (
    "name" => "Chris Allen",
    "company" => "Infrared5",
    "img" => "grid-17"
  ),
  18=> array (
    "name" => "Carolina Banales",
    "company" => "GlamSt",
    "img" => "grid-18"
  ),
  19=> array (
    "name" => "Christine Miao",
    "company" => "Clowder",
    "img" => "grid-19"
  ),
  20=> array (
    "name" => "Justin Potter",
    "company" => "Cleanify",
    "img" => "grid-20"
  ),
  21=> array (
    "name" => "Luis Sanchez",
    "company" => "Cleanify",
    "img" => "grid-21"
  ),
  22=> array (
    "name" => "David Drake",
    "company" => "Smoke Reports",
    "img" => "grid-22"
  ),
  23=> array (
    "name" => "Russell Lewis",
    "company" => "GrowthX",
    "img" => "grid-23"
  ),
  24=> array (
    "name" => "Ellie Bolus",
    "company" => "Choix",
    "img" => "grid-24"
  ),
  25=> array (
    "name" => "Priscilla Maciel",
    "company" => "AlmaShopping",
    "img" => "grid-25"
  ),
  26=> array (
    "name" => "Kellee Khalil",
    "company" => "Loverly",
    "img" => "grid-26"
  ),
  27=> array (
    "name" => "Will Bunker",
    "company" => "GrowthX",
    "img" => "grid-27"
  ),
  28=> array (
    "name" => "Abtin Hamidi",
    "company" => "CargoChief",
    "img" => "grid-28"
  ),
  29=> array (
    "name" => "Russell Jones",
    "company" => "Cargo Chief",
    "img" => "grid-29"
  ),
  30=> array (
    "name" => "Sean Sheppard",
    "company" => "GrowthX",
    "img" => "grid-30"
  ),
  31=> array (
    "name" => "Rebecca Allen",
    "company" => "Infrared5",
    "img" => "grid-31"
  ),
  32=> array (
    "name" => "Brad Holliday",
    "company" => "GrowthX",
    "img" => "grid-32"
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
        <img src="<?php echo get_stylesheet_directory_uri().'/assets/images/'.$headshots[$i]['img'].'.jpg';?>" />
        <div class="text <?php if($i > 24){ echo 'bottomrow'; } ?>">
          <p class="name"><?php echo $headshots[$i]['name']; ?><br /><?php echo $headshots[$i]['company']; ?></p> 
        </div>
      </a>
    </li>

    
  <?php $i++; endwhile;?> 

</ul>
</div>
