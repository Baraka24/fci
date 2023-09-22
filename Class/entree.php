<?php
class entree
{
    private $id;
    private $date_entree;
    private $description;
    private $devise;
    private $montant;
    private $taux;
    private $observation;
    private $visible;


    public function getId()
    {
        return $this->id;
    }

    public function setId($value)
    {
        $this->id = $value;
    }

    public function getDate_entree()
    {
        return $this->date_entree;
    }

    public function setDate_entree($value)
    {
        $this->date_entree = $value;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($value)
    {
        $this->description = $value;
    }

    public function getDevise()
    {
        return $this->devise;
    }

    public function setDevise($value)
    {
        $this->devise = $value;
    }

    public function getMontant()
    {
        return $this->montant;
    }

    public function setMontant($value)
    {
        $this->montant = $value;
    }

    public function getTaux()
    {
        return $this->taux;
    }

    public function setTaux($value)
    {
        $this->taux = $value;
    }

    public function getObservation()
    {
        return $this->observation;
    }

    public function setObservation($value)
    {
        $this->observation = $value;
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
            $stmt = $connect->prepare("INSERT INTO `entree`(`DATE_ENTREE`, `DESCRIPTION`, `OBSERVATION`, `VISIBLE`, `devise`, `taux`, `MONTANT`) VALUES (?,?,?,?,?,?,?)");
            $stmt->execute([$this->date_entree, $this->description, $this->observation, $this->visible = 1, $this->devise, $this->taux, $this->montant]);
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
            $stmt = $connect->prepare("select * from entree where visible=?");
            $stmt->execute([$this->id = 1]);
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
            $stmt = $connect->prepare("SELECT sum(taux*MONTANT) as totalentree FROM entree");
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    public function afficherall()
    {
        $con = new Database();
        $connect = $con->open();
        try {
            $stmt = $connect->prepare("SELECT  entree.ID as id,entree.DATE_ENTREE as ddate,entree.DESCRIPTION as description, devise.description as devise, entree.MONTANT as montant,entree.taux as taux,entree.OBSERVATION as observation,(entree.MONTANT * entree.taux) AS total  FROM entree inner JOIN devise on entree.devise=devise.id WHERE entree.VISIBLE=?");
            $stmt->execute([$this->visible = 1]);
            return $stmt->fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    public function afficherallbyid()
    {
        $con = new Database();
        $connect = $con->open();
        try {
            $stmt = $connect->prepare("SELECT  entree.ID as id,entree.DATE_ENTREE as ddate,entree.DESCRIPTION as description, entree.devise as iddevise ,devise.description as devise, entree.MONTANT as montant,entree.taux as taux,entree.OBSERVATION as observation,(entree.MONTANT * entree.taux) AS total  FROM entree inner JOIN devise on entree.devise=devise.id WHERE entree.ID=?");
            $stmt->execute([$this->id]);
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
            $stmt = $connect->prepare("select from entree where id=? and visible=?");
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
            $stmt = $connect->prepare("UPDATE `entree` SET `visible`=? WHERE id=?");
            $stmt->execute([$this->visible = 0, $this->id]);
            return $stmt->fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    public function modifier()
    {
        try {
            $con = new Database();
            $connect = $con->open();
            $stmt = $connect->prepare("UPDATE `entree` SET `DATE_ENTREE`=?,`DESCRIPTION`=?,`OBSERVATION`=?,`VISIBLE`=?,`devise`=?,`taux`=?,`MONTANT`=? WHERE id=?");
            $stmt->execute([$this->date_entree, $this->description, $this->observation, $this->visible = 1, $this->devise, $this->taux, $this->montant, $this->id]);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}
