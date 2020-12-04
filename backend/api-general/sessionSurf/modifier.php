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
    include_once 'models/Users.php';

    // On instancie la base de données
    $database = new Database();
    $db = $database->getConnection();

    // On instancie les produits
    $user = new Users($db);

    // On récupère les informations envoyées
    $donnees = json_decode(file_get_contents("php://input"));
    
    if(!empty($donnees->dateDebut) && !empty($donnees->dateFin) && !empty($donnees->avisSession) && !empty($donnees->frequentation) && !empty($donnees->latitude) && !empty($donnees->longitude)
    && !empty($donnees->idLieu)){        
        // Ici on a reçu les données
        // On hydrate notre objet
        $session->idSessionSurf = $donnees->idSessionSurf;
        $session->dateDebut = $donnees->dateDebut;
        $session->dateFin = $donnees->dateFin;
        $session->avisSession = $donnees->avisSession;
        $session->frequentation = $donnees->frequentation;
        $session->latitude = $donnees->latitude;
        $session->longitude = $donnees->longitude;
        $session->idLieu = $donnees->idLieu;

        if($user->modifier()){
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