<?php
class sortie
{
    private $id;
    private $date_sortie;
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

    public function getdate_sortie()
    {
        return $this->date_sortie;
    }

    public function setdate_sortie($value)
    {
        $this->date_sortie = $value;
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
            $stmt = $connect->prepare("INSERT INTO `sortie`(`date_sortie`, `DESCRIPTION`, `OBSERVATION`, `VISIBLE`, `devise`, `taux`, `MONTANT`) VALUES (?,?,?,?,?,?,?)");
            $stmt->execute([$this->date_sortie, $this->description, $this->observation, $this->visible = 1, $this->devise, $this->taux, $this->montant]);
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
            $stmt = $connect->prepare("select * from sortie where visible=?");
            $stmt->execute([$this->id = 1]);
            return $stmt->fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    public function rpsortie()
    {
        $con = new Database();
        $connect = $con->open();
        try {
            $stmt = $connect->prepare("SELECT DATE_FORMAT(sortie.DATE_SORTIE,'%d/%m/%Y') as ddate, DESCRIPTION,(sortie.taux * sortie.MONTANT) as MONTANT FROM `sortie`WHERE DATE_FORMAT(sortie.DATE_SORTIE,'%Y-%m-%d')=?");
            $stmt->execute([$this->date_sortie]);
            return $stmt->fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    public function rpsumsortie()
    {
        $con = new Database();
        $connect = $con->open();
        try {
            $stmt = $connect->prepare("SELECT SUM(taux * MONTANT) as totalsortie FROM sortie WHERE DATE_FORMAT(sortie.DATE_SORTIE,'%Y-%m-%d')=?");
            $stmt->execute([$this->date_sortie]);
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
            $stmt = $connect->prepare("SELECT sum(taux*MONTANT) as totalsortie FROM sortie");
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
            $stmt = $connect->prepare("SELECT  sortie.ID as id,sortie.date_sortie as ddate,sortie.DESCRIPTION as description,sortie.devise as iddevise ,devise.description as devise, sortie.MONTANT as montant,sortie.taux as taux,sortie.OBSERVATION as observation,(sortie.MONTANT * sortie.taux) AS total  FROM sortie inner JOIN devise on sortie.devise=devise.id WHERE sortie.VISIBLE=?");
            $stmt->execute([$this->visible = 1]);
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
            $stmt = $connect->prepare("select from sortie where id=? and visible=?");
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
            $stmt = $connect->prepare("UPDATE `sortie` SET `visible`=? WHERE id=?");
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
            $stmt = $connect->prepare("UPDATE `sortie` SET `DATE_SORTIE`=?,`DESCRIPTION`=?,`OBSERVATION`=?,`VISIBLE`=?,`devise`=?,`taux`=?,`MONTANT`=? WHERE id=?");
            $stmt->execute([$this->date_sortie, $this->description, $this->observation, $this->visible = 1, $this->devise, $this->taux, $this->montant, $this->id]);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}