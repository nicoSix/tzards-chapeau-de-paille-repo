<?php
class Session{
    // Connexion
    private $connexion;
    private $table = "sessionSurf";

    // object properties
    public $idSessionSurf;
    public $dateDebut;
    public $dateFin;
    public $avisSession;
    public $frequentation;
    public $latitude;
    public $longitude;
    public $idLieu;

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
        $sql = "SELECT c.nom as categories_nom, p.id, p.nom, p.description, p.prix, p.categories_id, p.created_at FROM " . $this->table . " p LEFT JOIN categories c ON p.categories_id = c.id WHERE p.id = ? LIMIT 0,1";

        // On prépare la requête
        $query = $this->connexion->prepare( $sql );

        // On attache l'id
        $query->bindParam(1, $this->id);

        // On exécute la requête
        $query->execute();

        // on récupère la ligne
        $row = $query->fetch(PDO::FETCH_ASSOC);

        // On hydrate l'objet
        $this->nom = $row['nom'];
        $this->prix = $row['prix'];
        $this->description = $row['description'];
        $this->categories_id = $row['categories_id'];
        $this->categories_nom = $row['categories_nom'];
    }

    /**
     * Supprimer un produit
     *
     * @return void
     */
    public function supprimer(){
        // On écrit la requête
        $sql = "DELETE FROM " . $this->table . " WHERE id = idUti";

        // On prépare la requête
        $query = $this->connexion->prepare( $sql );

        // On sécurise les données
        $this->idUti=htmlspecialchars(strip_tags($this->idUti));

        // On attache l'id
        $query->bindParam(1, $this->id);

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
        $sql = "UPDATE " . $this->table . " SET nomUti=:nomUti, prenomUti=:prenomUti, numTelUti=:numTelUti, mailUti=:mailUti, mdpUti=:mdpUti, admin=:admin WHERE idUti = :idUti";
        
        // On prépare la requête
        $query = $this->connexion->prepare($sql);
        
        // On sécurise les données
        $this->nomUti=htmlspecialchars(strip_tags($this->nomUti));
        $this->prenomUti=htmlspecialchars(strip_tags($this->prenomUti));
        $this->numTelUti=htmlspecialchars(strip_tags($this->numTelUti));
        $this->mailUti=htmlspecialchars(strip_tags($this->mailUti));
        $this->mdpUti=htmlspecialchars(strip_tags($this->mdpUti));
        $this->admin=htmlspecialchars(strip_tags($this->admin));
        
        // On attache les variables
        $query->bindParam(':nomUti', $this->nomUti);
        $query->bindParam(':prenomUti', $this->prenomUti);
        $query->bindParam(':numTelUti', $this->numTelUti);
        $query->bindParam(':mailUti', $this->mailUti);
        $query->bindParam(':mdpUti', $this->mdpUti);
        $query->bindParam(':admin', $this->admin);

        
        // On exécute
        if($query->execute()){
            return true;
        }
        
        return false;
    }

}