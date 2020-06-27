<?php 
$connect = mysqli_connect("localhost", "root", "", 'livreor');

$request = "SELECT * FROM utilisateurs WHERE login ='".$_SESSION['login']."'";
$querytest = mysqli_query($connect, $request);
$id = mysqli_fetch_all($querytest, MYSQLI_ASSOC);
$iduser = $id[0]['id'];

// requete pour récupérer tous les messages
$requete1 = "SELECT id, messages FROM message ORDER by date DESC";
$query1 = mysqli_query($connect , $requete1);
$message = mysqli_fetch_all($query1);


// dans le foreach qui fait apparaître les messages + id

foreach($message as $key => $value){

        $idmessage=($value[0]); //on récupére l'id du message
        echo ' <a href="likes.php?id='. $idmessage.'"></a>'; // on associe l'id du comment pour le récupérer ensuite dans le form en get (+ création d'un fichier likes.php)

        //on compte tous les likes pour les afficher à côté de l'icone like pour chaque message
        $requestcountlikes = "SELECT COUNT(*) FROM likes WHERE id_message = $idmessage AND reaction = 1 ";
        $query3 = mysqli_query($connect, $requestcountlikes);
        $countlikes = mysqli_fetch_all($query3);


        //on compte tous les dislikes pour les afficher à côté de l'icone dislike pour chaque message
        $requestcountdislikes = "SELECT COUNT(*) FROM likes WHERE id_message = $idmessage  AND reaction = -1 ";
        $query4 = mysqli_query($connect, $requestcountdislikes);
        $countdislikes = mysqli_fetch_all($query4);

        
        //on met les bouton like et dislike dans la boucle pour qu'ils se répètent à chaque message
        echo'<form action="messages.php" method="GET"> 
                <input type="submit" name="like" id="likebutton" value="' . $idcomment . '"/> <p>' .$countlikes[0][0].' &nbsp; people like this</p>
                <input type="submit" name="dislike" id="dislikebutton" value="' . $idcomment . '"/><p>'.$countdislikes[0][0]. '" &nbsp; people dislike this </p>
            </form> ';


        //on compte toutes les entrées likes effectuées par l'utilisateur pour un message
        $requestcountlikesbyid = "SELECT COUNT(*) FROM likes WHERE id_message = $idmessage  AND id_utilisateur = $iduser AND reaction = 1 ";
        $query5 = mysqli_query($connect, $requestcountlikesbyid);
        $countlikesbyid = mysqli_fetch_all($query5);

        //on compte toutes les entrées likes effectuées par l'utilisateur pour un message
        $requestcountbyid = "SELECT COUNT(*) FROM likes WHERE id_message = $idmessage  AND id_utilisateur = $iduser AND reaction = -1 ";
        $query6 = mysqli_query($connect, $requestcountbyid);
        $countdislikesbyid = mysqli_fetch_all($query6);

}

        if (isset($_GET["like"])){

            $getid = ($_GET['like']);
            var_dump($getid);

            if ($countlikesbyid[0][0] == "0"){ // si la valeur de count ="0" alors on fait la requete pour insérer 1

            $requestlike = "INSERT INTO `likes`(`id_com`, `id_util`, `reaction`) VALUES ($getid, '$iduser', 1) ";
            var_dump($requestlike);
            $querylike = mysqli_query($connect, $requestlike);
            }

        }

            
        if (isset($_GET["dislike"])){
            $getid = ($_GET['dislike']);

            if ($countdislikesbyid[0][0] == "0"){ // si la valeur de count ="0" alors on fait la requete pour insérer -1

            $requestdislike = "INSERT INTO likes (id_com, id_util, reaction) VALUES ($getid, $iduser, -1)";
            var_dump($requestdislike);
            $querydislike = mysqli_query($connect, $requestdislike);

            }

        }

        //condition à corriger pour pas qu'un utilisateur clique indéfiniment

    

?>