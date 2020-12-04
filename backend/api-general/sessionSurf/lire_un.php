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
    include_once 'models/Session.php';

    // On instancie la base de données
    $database = new Database();
    $db = $database->getConnection();

    // On instancie les produits
    $session = new Session($db);

    $donnees = json_decode(file_get_contents("php://input"));
    // On récupère le produit
    $session->lireUn();

    // On vérifie si le produit existe
    if ($session->idSessionSurf != null) {
        $tableauSession = [
            "dateDebut" => $session->dateDebut,
            "dateFin" => $session->dateFin,
            "avisSession" => $session->avisSession,
            "frequentation" => $session->frequentation,
            "latitude" => $session->latitude,
            "longitude" => $session->longitude,
            "idLieu" => $session->idLieu
        ];
        // On envoie le code réponse 200 OK
        http_response_code(200);

        // On encode en json et on envoie
        echo json_encode($tableauSession);
    } else {
        // 404 Not found
        http_response_code(404);

        echo json_encode(array("message" => "Le produit n'existe pas."));
    }
}
