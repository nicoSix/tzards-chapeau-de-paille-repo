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
        if(isset($_GET['id'])){
            $this->idSessionSurf =$_GET['id'];
        } 
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
        $sql = "INSERT INTO " . $this->table . " SET ville=:ville, pays=:pays, photoLieu=:photoLieu, idTemperatureEau=:idTemperatureEau, 
        idHoule=:idHoule, idMaree=:idMaree, idEvenement=:idEvenement, idCompo=:idCompo, idMeteo=:idMeteo";
        
        // Préparation de la requête
        $query = $this->connexion->prepare($sql);

        // Protection contre les injections
        $this->ville=htmlspecialchars(strip_tags($this->ville));
        $this->pays=htmlspecialchars(strip_tags($this->pays));
        $this->photoLieu=htmlspecialchars(strip_tags($this->photoLieu));
        $this->idMaree=htmlspecialchars(strip_tags($this->idMaree));
        $this->idHoule=htmlspecialchars(strip_tags($this->idHoule));
        $this->idEvenement=htmlspecialchars(strip_tags($this->idEvenement));
        $this->idCompo=htmlspecialchars(strip_tags($this->idCompo));
        $this->idMeteo=htmlspecialchars(strip_tags($this->idMeteo));
        $this->idTemperatureEau=htmlspecialchars(strip_tags($this->idTemperatureEau));


        // Ajout des données protégées
        $query->bindParam(":ville", $this->ville);
        $query->bindParam(":pays", $this->pays);
        $query->bindParam(":photoLieu", $this->photoLieu);
        $query->bindParam(":idHoule", $this->idHoule);
        $query->bindParam(":idMaree", $this->idMaree);
        $query->bindParam(":idEvenement", $this->idEvenement);
        $query->bindParam(":idCompo", $this->idCompo);
        $query->bindParam(":idMeteo", $this->idMeteo);
        $query->bindParam(":idTemperatureEau", $this->idTemperatureEau);


        


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
        $sql = "SELECT * FROM $this->table WHERE idLieu = :idLieu";

        // On prépare la requête
        $query = $this->connexion->prepare($sql);
        $this->idLieu=htmlspecialchars(strip_tags($this->idLieu));
        $query->bindParam(":idLieu", $this->idLieu);

        // On exécute la requête
        $query->execute();

        // on récupère la ligne
        $row = $query->fetch(PDO::FETCH_ASSOC);
        
        // On hydrate l'objet
        //$this->idLieu = $row['idLieu'];
        $this->ville = $row['ville'];
        $this->pays = $row['pays'];
        $this->photoLieu = $row['photoLieu'];
        $this->idTemperatureEau = $row['idTemperatureEau'];
        $this->idHoule = $row['idHoule'];
        $this->idMaree = $row['idMaree'];
        $this->idEvenement = $row['idEvenement'];
        $this->idCompo = $row['idCompo'];
        $this->idMeteo = $row['idMeteo'];

    }

    /**
     * Supprimer un produit
     *
     * @return void
     */
    public function supprimer(){
        // On écrit la requête
        $sql = "DELETE FROM " . $this->table . " WHERE idLieu = :idLieu";

        $this->idLieu = $_GET['id'];

        // On prépare la requête
        $query = $this->connexion->prepare( $sql );
        $this->idLieu=htmlspecialchars(strip_tags($this->idLieu));
        $query->bindParam(":idLieu", $this->idLieu);

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
        $sql = "UPDATE " . $this->table . " SET ille=:ville, pays=:pays, photoLieu=:photoLieu, idTemperatureEau=:idTemperatureEau, 
        idHoule=:idHoule, idMaree=:idMaree, idEvenement=:idEvenement, idCompo=:idCompo, idMeteo=:idMeteo WHERE idLieu =:idLieu";
        
        // On prépare la requête
        $query = $this->connexion->prepare($sql);
        
        // On sécurise les données
        $this->idLieu=htmlspecialchars(strip_tags($this->idLieu));
        $this->ville=htmlspecialchars(strip_tags($this->ville));
        $this->pays=htmlspecialchars(strip_tags($this->pays));
        $this->photoLieu=htmlspecialchars(strip_tags($this->photoLieu));
        $this->idMaree=htmlspecialchars(strip_tags($this->idMaree));
        $this->idHoule=htmlspecialchars(strip_tags($this->idHoule));
        $this->idEvenement=htmlspecialchars(strip_tags($this->idEvenement));
        $this->idCompo=htmlspecialchars(strip_tags($this->idCompo));
        $this->idMeteo=htmlspecialchars(strip_tags($this->idMeteo));
        $this->idTemperatureEau=htmlspecialchars(strip_tags($this->idTemperatureEau));
        
        // On attache les variables
        $query->bindParam(":idLieu", $this->idLieu);
        $query->bindParam(":ville", $this->ville);
        $query->bindParam(":pays", $this->pays);
        $query->bindParam(":photoLieu", $this->photoLieu);
        $query->bindParam(":idHoule", $this->idHoule);
        $query->bindParam(":idMaree", $this->idMaree);
        $query->bindParam(":idEvenement", $this->idEvenement);
        $query->bindParam(":idCompo", $this->idCompo);
        $query->bindParam(":idMeteo", $this->idMeteo);
        $query->bindParam(":idTemperatureEau", $this->idTemperatureEau);

        
        // On exécute
        if($query->execute()){
            return true;
        }
        
        return false;
    }

}