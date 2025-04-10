
/*
$genre_by = "genre";
$gd = "ASC";


if (isset($_GET["genre_by"]) && ($_GET["genre_by"] == "genre") ){

    $genre_by = $_GET["genre_by"];

    }


    if (isset($_GET["gd"]) && ($_GET["gd"] == "ASC" || $_GET["gd"] == "DESC")){

        $gd = $_GET["gd"];

        $sql = "SELECT * FROM shoes WHERE $genre_by LIKE 'Homme%' ORDER BY taille $gd ";
    
    } 














$size_by = "taille";
$sm = "ASC";



if (isset($_GET["size_by"]) && ($_GET["size_by"] == "taille") ){

    $size_by = $_GET["size_by"];

    }


    if (isset($_GET["sm"]) && ($_GET["sm"] == "ASC" || $_GET["sm"] == "DESC")){

        $sm = $_GET["sm"];

        $sql = "SELECT * FROM shoes WHERE $size_by BETWEEN 32 AND 36 ORDER BY $size_by $sm";
    
    } 

    
    
    
    
  
    
$date_by = "id";
$new = "ASC";


if (isset($_GET["date_by"]) && ($_GET["date_by"] == "id") ){

    $date_by = $_GET["date_by"];

    }


    if (isset($_GET["new"]) && ($_GET["new"] == "ASC" || $_GET["new"] == "DESC")){

        $new = $_GET["new"];

        $sql = "SELECT * FROM shoes ORDER BY shoes.$date_by $new";
    
    } 

    








$sort_by = "prix";
$order = "ASC";
    
    
if (isset($_GET["sort_by"]) && ($_GET["sort_by"] == "prix") ){
    
    
        $sort_by = $_GET["sort_by"];
    
    
     }
    
    
     if (isset($_GET["order"]) && ($_GET["order"] == "ASC" || $_GET["order"] == "DESC")){
    
        $order = $_GET["order"];
      
     
    
    
    } 
    
   
    

    $sql = "SELECT * FROM shoes ORDER BY $sort_by $order";
*/    


if ($result->num_rows > 0) {

                           
while ($ligne = $result->fetch_assoc()) {
     
     echo '
    
     <ul>
    
    <li style ="color: var(--couleur-4);  background: linear-gradient(0deg, white 85%, var(--couleur-3) 15% );  
    padding-top: 10px; padding-bottom: 10px; box-shadow: 5px 5px 5px black; width: 300px; height:450px; font-size:21px;">
    <strong style="font-style: italic;"> '. $ligne['marque'] .' </strong> '. $ligne['nom'] .' &nbsp; <strong style= "color: var(--couleur-1); float: right;"> '. $ligne['taille'] .' </strong> <br> <br>
    <img src="/img/shoes/'. $ligne['image'] .'" style= "width: 420px; height: 260px; margin: 40px -70px;" id ="img" alt=""/> 
    <br> <p style= "color: var(--couleur-1); margin: -35px 0; background-color: yellow; padding: 10px 10px; width: 110px; 
    font-size: 30px;"> '. $ligne['prix'] .' <i class="fa-solid fa-euro-sign"></i> </p>
    </li> </br>
    


     </ul> ';


 }


} else {
     
 echo "Aucun résultat trouvé.";
 
};
*/