<?php

session_start();
if (isset($_SESSION['usuario'])){
include "../header2.php";


?>

<div id="layoutSidenav_content">
<div class="card" style="width: 100%;">
  <div class="card-body">
    <h5 style="text-align:center ;" class="card-title">CON AMOR LA VIDA ES MEJOR</h5>
    
  </div>
</div>

<img src="../../Img/inicio.png" class="img-fluid" alt="...">


<div class="accordion" id="accordionPanelsStayOpenExample">
  <div class="accordion-item">
    <h2 class="accordion-header" id="panelsStayOpen-headingOne">
      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
     Frase Motivacional
      </button>
    </h2>
    <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
      <div class="accordion-body" style="text-align: justify;margin-left:10px; margin-right:10px">
        <strong>La felicidad no consiste en vivir sin problemas, sino en saber vivir; es el encuentro con lo mejor de uno mismo, el arte de sacarle a la vida el máximo posible.
La felicidad es hacer lo que se desea, y desear lo que se hace.
La gente feliz parece ser la que no tiene motivo especial para ser feliz, salvo que lo es.
No son la riqueza ni el esplendor, sino la tranquilidad y el trabajo los que proporcionan la felicidad.
Cuando la gracia se combina con las arrugas, resultan adorables. Hay un amanecer indescriptible en la vejez feliz.
      </div>
    </div>
  
</div>



</div>

        <?php
   include "../footer.php";
   
}else {

   header("location:../../index.php");

}