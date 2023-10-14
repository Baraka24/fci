<?php
class paiement
{
    private $id;
    private $montant;
    private $devise;
    private $taux;
    private $date_paiement;
    private $membre;
    private $cotisation;
    private $visible;
    private $du;
    private $au;


    public function getId()
    {
        return $this->id;
    }

    public function setId($value)
    {
        $this->id = $value;
    }

    public function getMontant()
    {
        return $this->montant;
    }

    public function setMontant($value)
    {
        $this->montant = $value;
    }

    public function getDevise()
    {
        return $this->devise;
    }

    public function setDevise($value)
    {
        $this->devise = $value;
    }

    public function getTaux()
    {
        return $this->taux;
    }

    public function setTaux($value)
    {
        $this->taux = $value;
    }

    public function getDate_paiement()
    {
        return $this->date_paiement;
    }

    public function setDate_paiement($value)
    {
        $this->date_paiement = $value;
    }

    public function getMembre()
    {
        return $this->membre;
    }

    public function setMembre($value)
    {
        $this->membre = $value;
    }

    public function getCotisation()
    {
        return $this->cotisation;
    }

    public function setCotisation($value)
    {
        $this->cotisation = $value;
    }

    public function getVisible()
    {
        return $this->visible;
    }

    public function setVisible($value)
    {
        $this->visible = $value;
    }
    public function getDu()
    {
        return $this->du;
    }

    public function setDu($value)
    {
        $this->du = $value;
    }

    public function getAu()
    {
        return $this->au;
    }

    public function setAu($value)
    {
        $this->au = $value;
    }

    public function inserer()
    {

        $con = new Database();
        $connect = $con->open();
        try {
            $stmt = $connect->prepare("INSERT INTO `paiement`(`DATE_PAIE`, `MEMBRE`, `COTISATION`, `VISIBLE`, `devise`, `taux`, `MONTANT`) VALUES (?,?,?,?,?,?,?)");
            $stmt->execute([$this->date_paiement, $this->membre, $this->cotisation, $this->visible = 1, $this->devise, $this->taux, $this->montant]);
            $con->close();
        } catch (Exception $e) {
            return $this->$e;
        }
    }
    public function paid()
    {
        $con = new Database();
        $connect = $con->open();
        try {
            $stmt = $connect->prepare("SELECT sum(MONTANT*taux) as paid from paiement WHERE MEMBRE=?");
            $stmt->execute([$this->membre]);
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
            $stmt = $connect->prepare("SELECT IFNULL(sum(taux*MONTANT), 0) as totalpaiement FROM paiement");
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    public function sumwhere()
    {
        $con = new Database();
        $connect = $con->open();
        try {
            $stmt = $connect->prepare("SELECT IFNULL(sum(taux*MONTANT), 0) as totalpaiement FROM paiement WHERE membre=?");
            $stmt->execute([$this->membre]);
            return $stmt->fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    public function summotif()
    {
        $con = new Database();
        $connect = $con->open();
        try {
            $stmt = $connect->prepare("SELECT IFNULL(sum(taux*MONTANT), 0) as summotif FROM paiement WHERE COTISATION=?");
            $stmt->execute([$this->cotisation]);
            return $stmt->fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    public function rpentree()
    {
        $con = new Database();
        $connect = $con->open();
        try {
            $stmt = $connect->prepare("SELECT DATE_FORMAT(paiement.DATE_PAIE,'%d/%m/%Y') as ddate, COTISATION.DESCRIPTION as COTISATION,(paiement.taux * paiement.MONTANT) as MONTANT FROM `paiement`inner join COTISATION on paiement.COTISATION=COTISATION.ID WHERE DATE_FORMAT(paiement.DATE_PAIE,'%Y-%m-%d')=?");
            $stmt->execute([$this->date_paiement]);
            return $stmt->fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    public function rpsumentree()
    {
        $con = new Database();
        $connect = $con->open();
        try {
            $stmt = $connect->prepare("SELECT SUM(taux * MONTANT) as totalentree FROM paiement WHERE DATE_FORMAT(paiement.DATE_PAIE,'%Y-%m-%d')=?");
            $stmt->execute([$this->date_paiement]);
            return $stmt->fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    public function du_au($date, $date2)
    {
        $con = new Database();
        $connect = $con->open();
        try {
            $stmt = $connect->prepare("SELECT DATE_FORMAT(paiement.DATE_PAIE,'%d/%m/%Y') as ddate, COTISATION.DESCRIPTION as COTISATION,(paiement.taux * paiement.MONTANT) as MONTANT FROM `paiement`inner join COTISATION on paiement.COTISATION=COTISATION.ID WHERE DATE_FORMAT(paiement.DATE_PAIE,'%Y-%m-%d') BETWEEN $date AND $date2 ");
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }


    public function afficher()
    {
        $con = new Database();
        $connect = $con->open();
        try {
            $stmt = $connect->prepare("SELECT * from paiement where visible=?");
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
            $stmt = $connect->prepare("SELECT *, paiement.visible as visible, paiement.id as id, membre.nom as nom,membre.POSTNOM as postnom,membre.PRENOM as prenom,cotisation.DESCRIPTION as motif,devise.description as devise, paiement.MONTANT as montant,paiement.taux as taux,(paiement.MONTANT * paiement.taux) as total FROM paiement inner join membre on paiement.MEMBRE=MEMBRE.ID inner join cotisation on paiement.COTISATION=COTISATION.ID inner join devise on paiement.devise=devise.id WHERE paiement.visible=?");
            $stmt->execute([$this->visible = 1]);
            return $stmt->fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    public function afficherallwhere()
    {
        $con = new Database();
        $connect = $con->open();
        try {
            $stmt = $connect->prepare("SELECT paiement.visible as visible, paiement.id as id, membre.nom as nom,membre.POSTNOM as postnom,membre.PRENOM as prenom,cotisation.DESCRIPTION as motif,devise.description as devise, paiement.MONTANT as montant,paiement.taux as taux,(paiement.MONTANT * paiement.taux) as total FROM paiement inner join membre on paiement.MEMBRE=MEMBRE.ID inner join cotisation on paiement.COTISATION=COTISATION.ID inner join devise on paiement.devise=devise.id WHERE paiement.visible=? AND paiement.membre=?");
            $stmt->execute([$this->visible = 1, $this->membre]);
            return $stmt->fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    public function afficherallid()
    {
        $con = new Database();
        $connect = $con->open();
        try {
            $stmt = $connect->prepare("SELECT *,paiement.visible as visible, paiement.id as id,paiement.membre as idmembre ,membre.nom as nom,membre.POSTNOM as postnom,membre.PRENOM as prenom,paiement.cotisation as cotisation,cotisation.DESCRIPTION as motif,paiement.devise as iddevise,devise.description as devise, paiement.MONTANT as montant,paiement.taux as taux,(paiement.MONTANT * paiement.taux) as total FROM paiement inner join membre on paiement.MEMBRE=MEMBRE.ID inner join cotisation on paiement.COTISATION=COTISATION.ID inner join devise on paiement.devise=devise.id WHERE paiement.id=?");
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
            $stmt = $connect->prepare("SELECT * from paiement where id=? and visible=?");
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
            $stmt = $connect->prepare("UPDATE `paiement` SET `visible`=? where id=?");
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
            $stmt = $connect->prepare("UPDATE `paiement` SET `DATE_PAIE`=?,`MEMBRE`=?,`COTISATION`=?,`VISIBLE`=?,`devise`=?,`taux`=?,`MONTANT`=? WHERE id=?");
            $stmt->execute([$this->date_paiement, $this->membre, $this->cotisation, $this->visible = 1, $this->devise, $this->taux, $this->montant, $this->id]);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}