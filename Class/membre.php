<?php
class membre
{
    private $id;
    private $numero;
    private $nom;
    private $postnom;
    private $prenom;
    private $lieu_de_travail;
    private $numero_de_telephone;
    private $nom_utilisateur;
    private $mot_de_passe;
    private $profile;
    private $status;
    private $visible;
    private $role;


    public function getId()
    {
        return $this->id;
    }

    public function setId($value)
    {
        $this->id = $value;
    }

    public function getNumero()
    {
        return $this->numero;
    }

    public function setNumero($value)
    {
        $this->numero = $value;
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

    public function getLieu_de_travail()
    {
        return $this->lieu_de_travail;
    }

    public function setLieu_de_travail($value)
    {
        $this->lieu_de_travail = $value;
    }

    public function getNumero_de_telephone()
    {
        return $this->numero_de_telephone;
    }

    public function setNumero_de_telephone($value)
    {
        $this->numero_de_telephone = $value;
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

    public function getProfile()
    {
        return $this->profile;
    }

    public function setProfile($value)
    {
        $this->profile = $value;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function setStatus($value)
    {
        $this->status = $value;
    }

    public function getVisible()
    {
        return $this->visible;
    }

    public function setVisible($value)
    {
        $this->visible = $value;
    }
    public function getRole()
    {
        return $this->role;
    }

    public function setRole($value)
    {
        $this->role = $value;
    }

    public function inserer()
    {

        $con = new Database();
        $connect = $con->open();
        try {
            $stmt = $connect->prepare("INSERT INTO `membre`(`numero`,`nom`, `postnom`,`prenom`, `lieu_de_travail`,`numero_de_telephone`,`nom_utilisateur`, `mot_de_passe`,`profile`,`statut`,`visible`) VALUES (?,?,?,?,?,?,?,?,?,?,?)");
            $stmt->execute([$this->numero, $this->nom, $this->postnom, $this->prenom, $this->lieu_de_travail, $this->numero_de_telephone, $this->nom_utilisateur, $this->mot_de_passe, $this->profile, $this->status, $this->visible = 1]);
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
            $stmt = $connect->prepare("SELECT * FROM `membre`where visible=? AND ROLE=?");
            $stmt->execute([$this->visible = 1, $this->role = 0]);
            return $stmt->fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    public function lastnumber()
    {
        $con = new Database();
        $connect = $con->open();
        try {
            $stmt = $connect->prepare("SELECT COUNT(*) as NUMERO FROM membre");
            $stmt->execute();
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
            $stmt = $connect->prepare("SELECT * FROM `membre`where id=?");
            $stmt->execute([$this->id]);
            return $stmt->fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    public function sum()
    {
        $con = new Database();
        $connect = $con->open();
        try {
            $stmt = $connect->prepare("SELECT count(*) as totalmembre FROM membre where visible=1 AND ROLE=0");
            $stmt->execute();
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
            $stmt = $connect->prepare("UPDATE `membre` SET `visible`=? where id=?");
            $stmt->execute([$this->visible = 0, $this->id]);
            return $stmt->fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    public function make_admin()
    {
        try {
            $con = new Database();
            $connect = $con->open();
            $stmt = $connect->prepare("UPDATE `membre` SET `role`=? where id=?");
            $stmt->execute([$this->role = 1, $this->id]);
            return $stmt->fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    public function unmake_admin()
    {
        try {
            $con = new Database();
            $connect = $con->open();
            $stmt = $connect->prepare("UPDATE `membre` SET `role`=? where id=?");
            $stmt->execute([$this->role = 0, $this->id]);
            return $stmt->fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    public function approved()
    {
        try {
            $con = new Database();
            $connect = $con->open();
            $stmt = $connect->prepare("UPDATE `membre` SET `statut`=? WHERE id=?");
            $stmt->execute([$this->status, $this->id]);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    public function modifier()
    {
        try {
            $con = new Database();
            $connect = $con->open();
            $stmt = $connect->prepare("UPDATE `membre` SET `numero`=?,`nom`=?, `postnom`=?,`prenom`=?, `lieu_de_travail`=?,`numero_de_telephone`=?,`nom_utilisateur`=?, `mot_de_passe`=?,`profile`=?,`statut`=?,`visible`=? WHERE id=?");
            $stmt->execute([$this->numero, $this->nom, $this->postnom, $this->prenom, $this->lieu_de_travail, $this->numero_de_telephone, $this->nom_utilisateur, $this->mot_de_passe, $this->profile, $this->status, $this->visible = 1, $this->id]);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    public function modifierbymember()
    {
        try {
            $con = new Database();
            $connect = $con->open();
            $stmt = $connect->prepare("UPDATE `membre` SET `nom`=?, `postnom`=?,`prenom`=?, `lieu_de_travail`=?,`numero_de_telephone`=?,`profile`=? WHERE id=?");
            $stmt->execute([$this->nom, $this->postnom, $this->prenom, $this->lieu_de_travail, $this->numero_de_telephone, $this->profile, $this->id]);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    public function modifierbymembernoprofile()
    {
        try {
            $con = new Database();
            $connect = $con->open();
            $stmt = $connect->prepare("UPDATE `membre` SET `nom`=?, `postnom`=?,`prenom`=?, `lieu_de_travail`=?,`numero_de_telephone`=? WHERE id=?");
            $stmt->execute([$this->nom, $this->postnom, $this->prenom, $this->lieu_de_travail, $this->numero_de_telephone, $this->id]);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    public function modifierbyadmin()
    {
        try {
            $con = new Database();
            $connect = $con->open();
            $stmt = $connect->prepare("UPDATE `membre` SET `numero`=?,`nom`=?, `postnom`=?,`prenom`=?, `lieu_de_travail`=?,`numero_de_telephone`=?,`visible`=? WHERE id=?");
            $stmt->execute([$this->numero, $this->nom, $this->postnom, $this->prenom, $this->lieu_de_travail, $this->numero_de_telephone, $this->visible = 1, $this->id]);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    public function modifierpassword()
    {
        try {
            $con = new Database();
            $connect = $con->open();
            $stmt = $connect->prepare("UPDATE `membre` SET `nom_utilisateur`=? , `mot_de_passe`=? WHERE id=?");
            $stmt->execute([$this->nom_utilisateur, $this->mot_de_passe, $this->id]);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}
