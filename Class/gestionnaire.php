<?php
class gestionnaire
{
    private $id;
    private $nom;
    private $postnom;
    private $prenom;
    private $nom_utilisateur;
    private $mot_de_passe;
    private $description;
    private $profile;
    private $visible;

    public function getId()
    {
        return $this->id;
    }

    public function setId($value)
    {
        $this->id = $value;
    }

    public function getNom()
    {
        return $this->nom;
    }

    public function setNom($value)
    {
        $this->nom = $value;
    }

    public function getPostnom()
    {
        return $this->postnom;
    }

    public function setPostnom($value)
    {
        $this->postnom = $value;
    }

    public function getPrenom()
    {
        return $this->prenom;
    }

    public function setPrenom($value)
    {
        $this->prenom = $value;
    }

    public function getNom_utilisateur()
    {
        return $this->nom_utilisateur;
    }

    public function setNom_utilisateur($value)
    {
        $this->nom_utilisateur = $value;
    }

    public function getMot_de_passe()
    {
        return $this->mot_de_passe;
    }

    public function setMot_de_passe($value)
    {
        $this->mot_de_passe = $value;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($value)
    {
        $this->description = $value;
    }

    public function getProfile()
    {
        return $this->profile;
    }

    public function setProfile($value)
    {
        $this->profile = $value;
    }

    public function getVisible()
    {
        return $this->visible;
    }

    public function setVisible($value)
    {
        $this->visible = $value;
    }

    public function inserer()
    {

        $con = new Database();
        $connect = $con->open();
        try {
            $stmt = $connect->prepare("INSERT INTO `gestionnaire`(`nom`,`postnom`, `nom_utilisateur`,`mot_de_passe`,`description`,`profile`, `visible`) VALUES (?,?,?,?,?,?,?)");
            $stmt->execute([$this->nom, $this->postnom, $this->nom_utilisateur, $this->mot_de_passe, $this->description, $this->profile, $this->visible = 1]);
            $con->close();
        } catch (Exception $e) {
            return $this->$e;
        }
    }

    public function afficher()
    {
        $con = new Database();
        $connect = $con->open();
        try {
            $stmt = $connect->prepare("select * from gestionnaire where visible=?");
            $stmt->execute([$this->id = 1]);
            return $stmt->fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    public function afficherbyid()
    {
        $con = new Database();
        $connect = $con->open();
        try {
            $stmt = $connect->prepare("select from gestionnaire where id=? and visible=?");
            $stmt->execute([$this->id, $this->visible = 1]);
            return $stmt->fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    public function supprimer()
    {
        try {
            $con = new Database();
            $connect = $con->open();
            $stmt = $connect->prepare("UPDATE `gestionnaire` SET `visible`=? where id=?");
            $stmt->execute([$this->visible = 0, $this->id]);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    public function modifier()
    {
        try {
            $con = new Database();
            $connect = $con->open();
            $stmt = $connect->prepare("UPDATE `gestionnaire` SET `nom`=?,`postnom`=?,`nom_utilisateur`=?,`mot_de_passe`=?,`description`=?,`profile`=?,`visible`=? WHERE id=?");
            $stmt->execute([$this->nom, $this->postnom, $this->nom_utilisateur, $this->mot_de_passe, $this->description, $this->profile, $this->visible = 1, $this->id]);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}
