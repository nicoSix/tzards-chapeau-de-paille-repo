<?php
// Headers requis
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// On vérifie que la méthode utilisée est correcte
if($_SERVER['REQUEST_METHOD'] == 'GET'){
    // On inclut les fichiers de configuration et d'accès aux données
    include_once 'config/Database.php';
    include_once 'models/Users.php';

    // On instancie la base de données
    $database = new Database();
    $db = $database->getConnection();

    // On instancie les produits
    $users = new Users($db);

    $donnees = json_decode(file_get_contents("php://input"));

    // On récupère le produit
    $users->lireUn();
    if(!empty($users->idUti)){

        // On récupère le produit
        $users->lireUn();

        // On vérifie si le produit existe
        if($users->idUti != null){
            
            $tableauUsers = [
                "nomUti" => $users->nomUti,
                "prenomUti" =>$users->prenomUti,
                "numTelUti" => $users->numTelUti,
                "mailUti" => $users->mailUti,
                "mdpUti" => $users->mdpUti,
                "admin" => $users->admin
            ];

            // On envoie le code réponse 200 OK
            http_response_code(200);

            // On encode en json et on envoie
            echo json_encode($tableauUsers);
        }else{
            // 404 Not found
            http_response_code(404);
         
            echo json_encode(array("message" => "Le produit n'existe pas."));
        }
        
    }
}else{
    // On gère l'erreur
    http_response_code(405);
    echo json_encode(["message" => "La méthode n'est pas autorisée"]);
}