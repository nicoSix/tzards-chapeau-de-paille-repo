<?php
class Lieu{
    // Connexion
    private $connexion;
    private $table = "Lieu";

    // object properties
    public $idLieu;
    public $ville;
    public $pays;
    public $photoLieu;
    public $idTemperatureEau;
    public $idHoule;
    public $idMaree;
    public $idEvenement;
    public $idCompo;
    public $idMeteo;

    /**
     * Constructeur avec $db pour la connexion à la base de données
     *
     * @param $db
     */
    public function __construct($db){
        $this->connexion = $db;
    }

    public function lire(){
        // On écrit la requête
        $sql = "SELECT * FROM $this->table";

        // On prépare la requête
        $query = $this->connexion->prepare($sql);

        // On exécute la requête
        $query->execute();

        // On retourne le résultat
        return $query;
    }

    /**
     * Créer un produit
     *
     * @return void
     */
    public function creer(){

        // Ecriture de la requête SQL en y insérant le nom de la table
        $sql = "INSERT INTO " . $this->table . " SET longitude=:longitude, idLieu=:idLieu, dateDebut=:dateDebut, dateFin=:dateFin, avisSession=:avisSession, frequentation=:frequentation, latitude=:latitude";

        // Préparation de la requête
        $query = $this->connexion->prepare($sql);

        // Protection contre les injections
        $this->idLieu=htmlspecialchars(strip_tags($this->idLieu));
        $this->dateDebut=htmlspecialchars(strip_tags($this->dateDebut));
        $this->dateFin=htmlspecialchars(strip_tags($this->dateFin));
        $this->avisSession=htmlspecialchars(strip_tags($this->avisSession));
        $this->frequentation=htmlspecialchars(strip_tags($this->frequentation));
        $this->latitude=htmlspecialchars(strip_tags($this->latitude));
        $this->longitude=htmlspecialchars(strip_tags($this->longitude));


        // Ajout des données protégées
        $query->bindParam(":idLieu", $this->idLieu);
        $query->bindParam(":dateDebut", $this->dateDebut);
        $query->bindParam(":dateFin", $this->dateFin);
        $query->bindParam(":frequentation", $this->frequentation);
        $query->bindParam(":avisSession", $this->avisSession);
        $query->bindParam(":latitude", $this->latitude);
        $query->bindParam(":longitude", $this->longitude);


        // Exécution de la requête
        if($query->execute()){
            return true;
        }
        return false;
    }

    /**
     * Lire un produit
     *
     * @return void
     */
    public function lireUn(){
        // On écrit la requête
        $sql = "SELECT * FROM $this->table WHERE idSessionSurf = :idSessionSurf";

        // On prépare la requête
        $query = $this->connexion->prepare($sql);
        $this->idSessionSurf=htmlspecialchars(strip_tags($this->idSessionSurf));
        $query->bindParam(":idSessionSurf", $this->idSessionSurf);

        // On exécute la requête
        $query->execute();

        // on récupère la ligne
        $row = $query->fetch(PDO::FETCH_ASSOC);
        
        // On hydrate l'objet
        $this->dateDebut = $row['dateDebut'];
        $this->dateFin = $row['dateFin'];
        $this->frequentation = $row['frequentation'];
        $this->latitude = $row['latitude'];
        $this->longitude = $row['longitude'];
        $this->idLieu = $row['idLieu'];
        $this->avisSession = $row['avisSession'];
    }

    /**
     * Supprimer un produit
     *
     * @return void
     */
    public function supprimer(){
        // On écrit la requête
        $sql = "DELETE FROM " . $this->table . " WHERE idSessionSurf = :idSessionSurf";

        $this->idSessionSurf = $_GET['id'];

        // On prépare la requête
        $query = $this->connexion->prepare( $sql );
        $this->idSessionSurf=htmlspecialchars(strip_tags($this->idSessionSurf));
        $query->bindParam(":idSessionSurf", $this->idSessionSurf);

        // On exécute la requête
        if($query->execute()){
            return true;
        }
        
        return false;
    }

    /**
     * Mettre à jour un produit
     *
     * @return void
     */
    public function modifier(){
        // On écrit la requête
        $sql = "UPDATE " . $this->table . " SET longitude=:longitude, idLieu=:idLieu, dateDebut=:dateDebut, dateFin=:dateFin, avisSession=:avisSession, frequentation=:frequentation, latitude=:latitude WHERE idSessionSurf =:idSessionSurf";
        
        // On prépare la requête
        $query = $this->connexion->prepare($sql);
        
        // On sécurise les données
        $this->idLieu=htmlspecialchars(strip_tags($this->idLieu));
        $this->dateDebut=htmlspecialchars(strip_tags($this->dateDebut));
        $this->dateFin=htmlspecialchars(strip_tags($this->dateFin));
        $this->avisSession=htmlspecialchars(strip_tags($this->avisSession));
        $this->frequentation=htmlspecialchars(strip_tags($this->frequentation));
        $this->latitude=htmlspecialchars(strip_tags($this->latitude));
        $this->longitude=htmlspecialchars(strip_tags($this->longitude));
        $this->idSessionSurf=htmlspecialchars(strip_tags($this->idSessionSurf));
        
        // On attache les variables
        $query->bindParam(":idLieu", $this->idLieu);
        $query->bindParam(":dateDebut", $this->dateDebut);
        $query->bindParam(":dateFin", $this->dateFin);
        $query->bindParam(":frequentation", $this->frequentation);
        $query->bindParam(":avisSession", $this->avisSession);
        $query->bindParam(":latitude", $this->latitude);
        $query->bindParam(":longitude", $this->longitude);
        $query->bindParam(":idSessionSurf", $this->idSessionSurf);

        
        // On exécute
        if($query->execute()){
            return true;
        }
        
        return false;
    }

}