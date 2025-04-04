<?php include 'connection.php'; ?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>shoe_shop</title>
    <link rel="stylesheet" href="/css/style2.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<script type= "text/javascript" src= 'accueil.js'> </script>

<?php 

ini_set('display_errors', 1);
error_reporting(E_ALL);

$serveur = "localhost";
$utilisateur = "samir2";  
$motdepasse = "Samb89";       
$base = "shoe_shop"; 





?>
    
</head>


<body>

<header>


<div class="svg">

<svg version="1.1" id="Calque_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="px" y="0px" viewBox="0 0 300 162" width="250px"
            height="118px" class="size-logo"><path class="couleur-logo" d="M90,85.9l29.2-78.6H99.9L86.5,41.4l3-34.1H69.2L40.1,85.9h18.8l14.3-38.1l-2.5,37.1L90,85.9z M112.7,85.9
            l29.2-78.6h-18.3L93.9,85.9H112.7z M165.6,81l-1-39.5l27.7-32.1L165.6,81z M300,53.3l-93.9,24.2l2.5-7.4h-19.8l6.4-18.8H212L217,37
            l-16.8,1l5.9-15.8h16.3l5.4-14.3H175l-19.3,22.7l9.4-23.2h-18.8l-29.2,78.6h19.3l12.4-33.6v33.6h24.7L85,109.1
            c-9.2,2.6-17.5,3.8-24.7,3.5c-7.2-0.3-12.8-2.3-16.8-5.9c-8.9-6.6-12-16.6-9.4-30.1c1.6-8.9,5.3-17.5,10.9-25.7
            C31.8,64.7,22.1,76.4,15.8,85.9C8.9,96.1,4.5,106.2,2.5,116.1S1.7,134,6,140.3c11.5,19.1,36.7,20.4,75.6,4L300,53.3z">
            </path>
        </svg>


</div>


<div>
 
<ul>

<li><a href="" class="lien" style="text-decoration:none; color:var(--couleur-1);" onclick="afficheMenu()">HOMME</a></li>
<li><a href="" class="lien" style="text-decoration:none; color:var(--couleur-1);" onclick="afficheMenu()">FEMME</a></li>
<li><a href="" class="lien" style="text-decoration:none; color:var(--couleur-1);" onclick="afficheMenu()">ENFANT</a></li>


 </ul>


</div>

<div class="icones">

<a href=""> <i class="fa-regular fa-heart icone"></i> </a>
<a href=""> <i class="fa-solid fa-user icone"></i> </a>
</div>


</header>
 



<div class="diapo">











<div class ="desc">

<img class ="slide" src="/img/shoes/jordan-1.webp" alt="">

<div style=" background: linear-gradient(45deg, var(--couleur-1)85%, yellow 15%); padding: 0 60px;"> 
<p style =" font-size: 30px; position: absolute; top: 210px; right: 385px; color: var(--couleur-1); transform: rotate(45deg); font-style: bold;"> NOUVEAUTE </p>

<p style ="float: left;">
<h2>JORDAN 1</h2>

The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from 
"de Finibus Bonorum et Malorum" by Cicero are also reproduced 
in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.



</p>

<input style ="background-color: var(--couleur-4); font-size: 25px; border: solid 2px var(--couleur-4);" type="button" value ="En savoir plus">


</div>








</div>




</div>




<aside>




<div class="chaussures">





<?php  
                        
                        
                        $connect = new mysqli($serveur, $utilisateur, $motdepasse, $base);

                         $sql = "SELECT * FROM shoes ";
                         $result = $connect -> query($sql); 
                             
                             
                         if ($result->num_rows > 0) {

                           
                            while ($ligne = $result->fetch_assoc()) {
                                 
                                 echo '
                                
                                 <ul>
                                
                            
                                <li style ="color: var(--couleur-4);  background: linear-gradient(0deg, white 85%, var(--couleur-3) 15% );  
                                padding-top: 10px; padding-bottom: 10px; box-shadow: 5px 5px 5px black;">
                               '. $ligne['nom'] .' <br> <br>
                                <img src="/img/shoes/jordan-1.webp" style= "width: 280px; height: 280px;" alt=""/> 
                                <br> <p style= "color: var(--couleur-1); "> '. $ligne['prix'] .' </p>
                                </li> </br>
                                


                                 </ul>
                               
                                 
                                 ';

                         
                             }


                         } else {
                                 
                             echo "Aucun résultat trouvé.";
                             
                         };
                     


                 ?>




</div>


</aside>





<nav id ="menu">
<form action="accueil.php" method="post">

<h1> &nbsp; Genre <hr> </h1>

<ul>

<li> <input type="checkbox" name="" id=""> Homme </li>
<li> <input type="checkbox" name="" id=""> Femme </li>
<li> <input type="checkbox" name="" id=""> Enfant </li>

</ul>




<h1> &nbsp; Taille <hr> </h1>

<ul>
<li> <input type="checkbox" name="" id=""> 38-40 </li>
<li> <input type="checkbox" name="" id=""> 40-42</li>
<li> <input type="checkbox" name="" id=""> 42-45</li>

</ul>


<h1> &nbsp; Nouveauté <hr> </h1>

<ul>

<li> <input type="checkbox" name="" id=""> Récent </li>
<li> <input type="checkbox" name="" id=""> Ancien </li>




</ul>

<h1> &nbsp; Prix <hr> </h1>

<ul>

<li> <input type="checkbox" name="asc"> Croissant </li>
<li> <input type="checkbox" name="des"> Décroissant </li>


</ul>

<input type="submit" name="submit" value="soumettre">



</form>

<?php 

if(isset($_POST['submit'])) {



if(isset($_POST['asc'])){






}



}





?>




 </nav>






<footer>


<div class ="copyright">

<svg version="1.1" id="Calque_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="px" y="0px" viewBox="0 0 300 162" width="100px"
            height="58px" class="size-logo"><path class="couleur-logo" d="M90,85.9l29.2-78.6H99.9L86.5,41.4l3-34.1H69.2L40.1,85.9h18.8l14.3-38.1l-2.5,37.1L90,85.9z M112.7,85.9
            l29.2-78.6h-18.3L93.9,85.9H112.7z M165.6,81l-1-39.5l27.7-32.1L165.6,81z M300,53.3l-93.9,24.2l2.5-7.4h-19.8l6.4-18.8H212L217,37
            l-16.8,1l5.9-15.8h16.3l5.4-14.3H175l-19.3,22.7l9.4-23.2h-18.8l-29.2,78.6h19.3l12.4-33.6v33.6h24.7L85,109.1
            c-9.2,2.6-17.5,3.8-24.7,3.5c-7.2-0.3-12.8-2.3-16.8-5.9c-8.9-6.6-12-16.6-9.4-30.1c1.6-8.9,5.3-17.5,10.9-25.7
            C31.8,64.7,22.1,76.4,15.8,85.9C8.9,96.1,4.5,106.2,2.5,116.1S1.7,134,6,140.3c11.5,19.1,36.7,20.4,75.6,4L300,53.3z">
            </path>
        </svg>
<p> <svg xmlns="http://www.w3.org/2000/svg"  width="12px"
height="12px" viewBox="0 0 512 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License 
    - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
    <path d="M256 48a208 208 0 1 1 0 416 208 208 0 1 1 0-416zm0 464A256 256 0 1 0 256 0a256 
    256 0 1 0 0 512zM199.4 312.6c-31.2-31.2-31.2-81.9 0-113.1s81.9-31.2 113.1 0c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9c-50-50-131-50-181 0s-50 131 0 181s131 
    50 181 0c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0c-31.2 31.2-81.9 31.2-113.1 0z"/></svg> Nike 2025</p>

</div>

<div class ="conditions">
 
<ul>

<li><a href="" style="text-decoration:none; color:var(--couleur-1);">Conditions</a></li>
<li><a href="" style="text-decoration:none; color:var(--couleur-1);">A propos</a></li>
<li><a href="" style="text-decoration:none; color:var(--couleur-1);">Newsletter</a></li> 


</ul>


</div>

</footer>



</body>


</html>