<?php

session_start();

if (isset($_SESSION['usuario'])){
include "../header.php";








?>
 <div id="layoutSidenav_content"    >
           
 <div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Holy guacamole!</strong> You should check in on some of those fields below.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>

<div class="alert alert-warning alert-dismissible fade show" role="alert" style="margin-bottom: 200%;">
  <strong>Holy guacamole!</strong> You should check in on some of those fields below.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>


 
                
            </div>



            



   <?php
   include "../footer.php";
}else {

   header("location:../../index.php");

}

   ?>


</script>