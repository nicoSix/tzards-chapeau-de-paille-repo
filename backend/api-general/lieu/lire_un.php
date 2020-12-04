<?php
// Headers requis
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// On vérifie que la méthode utilisée est correcte
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    // On inclut les fichiers de configuration et d'accès aux données
    include_once 'config/Database.php';
    include_once 'models/Lieu.php';

    // On instancie la base de données
    $database = new Database();
    $db = $database->getConnection();

    // On instancie les produits
    $lieu = new Lieu($db);

    $donnees = json_decode(file_get_contents("php://input"));
    // On récupère le produit
    $lieu->lireUn();

    // On vérifie si le produit existe
    if ($lieu->idLieu != null) {
        $tableauLieu = [
            "ville" => $lieu->ville,
            "pays" => $lieu->pays,
            "photoLieu" => $lieu->photoLieu,
            "idTemperatureEau" => $lieu->idTemperatureEau,
            "idHoule" => $lieu->idHoule,
            "idMaree" => $lieu->idMaree,
            "idEvenement" => $lieu->idEvenement,
            "idCompo" => $lieu->idCompo,
            "idMeteo" => $lieu->idMeteo
        ];
        // On envoie le code réponse 200 OK
        http_response_code(200);

        // On encode en json et on envoie
        echo json_encode($tableauLieu);
    } else {
        // 404 Not found
        http_response_code(404);

        echo json_encode(array("message" => "Le produit n'existe pas."));
    }
}