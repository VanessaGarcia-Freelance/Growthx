
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
        <div class="text">
          <p class="name">Name</p> 
        </div>
      </a>
    </li>

    
  <?php $i++; endwhile;?> 

</ul>
</div>
