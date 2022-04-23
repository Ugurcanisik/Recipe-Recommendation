<?php include 'header.php' ?>

<!-- Start All Pages -->
<div class="all-page-title page-breadcrumb">
  <div class="container text-center">
   <div class="row">
    <div class="col-lg-12">
     <h1>Staff</h1>
   </div>
 </div>
</div>
</div>
<!-- End All Pages -->

<!-- Start Stuff -->
<div class="stuff-box">
  <div class="container">
   <div class="row">
    <div class="col-lg-12">
     <div class="heading-title text-center">
      <h2>Staff</h2>
      
    </div>
  </div>
</div>
<div class="row">



  <?php 
  $staff=new Main();

  $staff->databring(array("staff","all"));

  if($staff->counter()){



    foreach ($staff->data() as $key) { ?>
     <div class="col-md-4 col-sm-6">
      <div class="our-team">
        <div class="pic">
          <img src="admin/<?php echo $key->staffpicture ?>">
          <ul class="social">
            
            
            <li><a href="<?php echo $key->staffinsta ?>" class="fa fa-instagram"></a></li>
            
          </ul>
        </div>
        <div class="team-content">
          <h3 class="title"><?php echo $key->staffname." ".$key->staffsurname ?></h3>
          <span class="post"><?php echo $key->stafftitle ?></span>
        </div>
      </div>
    </div>

  <?php   }


}else{


  Main::direct("index");

}




?>








</div>
</div>
</div>
<!-- End Stuff -->




<?php include 'footer.php' ?>