<?php

session_start();

if (isset($_SESSION['usuario'])){
include "../header.php";








?>
 <div id="layoutSidenav_content"    >
           


 

     <div class="card"  style="width: 60rem;" >
     <div class="container"  style="text-align:center">

  <img src="../../Img/bienvenida.jpg" class="img-fluid" alt="...">
  <div class="card-body">
    <p class="card-text">Tener una dieta saludable, con abundantes vegetales, con pocos alimentos procesados, pocos azúcares y bollería, sin alcohol, y con alimentos ricos en nutrientes, no solo ayudará a tu salud física, sino a tu salud mental. Es decir, con una nutrición saludable serás más feliz y tu cerebro funcionará mejor.</p>
  </div>
  </div>
</div>
   


                </div>
                
            </div>



            



   <?php
   include "../footer.php";
}else {

   header("location:../../index.php");

}

   ?>


</script>