<?php
// Headers requis
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: PUT");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// On vérifie la méthode
if($_SERVER['REQUEST_METHOD'] == 'PUT'){
    // On inclut les fichiers de configuration et d'accès aux données
    include_once 'config/Database.php';
    include_once 'models/Lieu.php';

    // On instancie la base de données
    $database = new Database();
    $db = $database->getConnection();

    // On instancie les produits
    $lieu = new Lieu($db);

    // On récupère les informations envoyées
    $donnees = json_decode(file_get_contents("php://input"));
    
    if(!empty($donnees->ville) && !empty($donnees->pays) && !empty($donnees->photoLieu) && !empty($donnees->idTemperatureEau) && !empty($donnees->idHoule) 
        && !empty($donnees->idMaree) && !empty($donnees->idEvenement) && !empty($donnees->idCompo) && !empty($donnees->idMeteo)){     
        // Ici on a reçu les données
        // On hydrate notre objet
        $lieu->ville = $donnees->ville;
        $lieu->pays = $donnees->pays;
        $lieu->photoLieu = $donnees->photoLieu;
        $lieu->idTemperatureEau = $donnees->idTemperatureEau;
        $lieu->idHoule = $donnees->idHoule;
        $lieu->idMaree = $donnees->idMaree;
        $lieu->idEvenement = $donnees->idEvenement;
        $lieu->idCompo = $donnees->idCompo;
        $lieu->idMeteo = $donnees->idMeteo;

        if($lieu->modifier()){
            // Ici la modification a fonctionné
            // On envoie un code 200
            http_response_code(200);
            echo json_encode(["message" => "La modification a été effectuée"]);
        }else{
            // Ici la création n'a pas fonctionné
            // On envoie un code 503
            http_response_code(503);
            echo json_encode(["message" => "La modification n'a pas été effectuée"]);         
        }
    }
}else{
    // On gère l'erreur
    http_response_code(405);
    echo json_encode(["message" => "La méthode n'est pas autorisée"]);
}