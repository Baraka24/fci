<?php
class cotisation
{
    private $id;
    private $desciption;
    private $devise;
    private $montant;
    private $taux;
    private $visible;

    public function getId()
    {
        return $this->id;
    }

    public function setId($value)
    {
        $this->id = $value;
    }

    public function getDesciption()
    {
        return $this->desciption;
    }

    public function setDesciption($value)
    {
        $this->desciption = $value;
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
            $stmt = $connect->prepare("INSERT INTO `cotisation`(`DESCRIPTION`, `VISIBLE`, `devise`, `taux`, `MONTANT`) VALUES (?,?,?,?,?)");
            $stmt->execute([$this->desciption, $this->visible = 1, $this->devise, $this->taux, $this->montant]);
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
            $stmt = $connect->prepare("SELECT cotisation.id as id, cotisation.DESCRIPTION as DESCRIPTION,devise.description as devise,cotisation.MONTANT as MONTANT,cotisation.taux as taux FROM `cotisation` inner join devise on cotisation.devise= devise.id WHERE cotisation.VISIBLE=?");
            $stmt->execute([$this->id = 1]);
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
            $stmt = $connect->prepare("SELECT * from cotisation where visible=?");
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
            $stmt = $connect->prepare("SELECT * from cotisation where id=? and visible=?");
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
            $stmt = $connect->prepare("UPDATE `cotisation` SET `VISIBLE`=? WHERE id=?");
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
            $stmt = $connect->prepare("UPDATE `cotisation` SET `DESCRIPTION`=?,`VISIBLE`=?,`devise`=?,`taux`=?,`MONTANT`=? WHERE id=?");
            $stmt->execute([$this->desciption, $this->visible = 1, $this->devise, $this->taux, $this->montant, $this->id]);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}
