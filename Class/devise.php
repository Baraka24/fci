<?php
class devise
{
    private $id;
    private $description;
    private $taux;
    private $statuts;
    private $visible;

    public function getId()
    {
        return $this->id;
    }

    public function setId($value)
    {
        $this->id = $value;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($value)
    {
        $this->description = $value;
    }

    public function getTaux()
    {
        return $this->taux;
    }

    public function setTaux($value)
    {
        $this->taux = $value;
    }
    public function getStatuts()
    {
        return $this->statuts;
    }

    public function setStatuts($value)
    {
        $this->statuts = $value;
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
            $stmt = $connect->prepare("INSERT INTO `devise`(`description`, `taux`, `visible`) VALUES (?,?,?)");
            $stmt->execute([$this->description, $this->taux, $this->visible = 1]);
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
            $stmt = $connect->prepare("SELECT * FROM `devise` WHERE visible=?");
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
            $stmt = $connect->prepare("SELECT * from `devise` where id=? and visible=?");
            $stmt->execute([$this->id, $this->visible = 1]);
            return $stmt->fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    public function afficherbystatuts()
    {
        $con = new Database();
        $connect = $con->open();
        try {
            $stmt = $connect->prepare("SELECT * from `devise` where statuts=? and visible=?");
            $stmt->execute([$this->statuts = 1, $this->visible = 1]);
            return $stmt->fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    public function afficherbydescription()
    {
        $con = new Database();
        $connect = $con->open();
        try {
            $stmt = $connect->prepare("SELECT * from `devise` where description=? and visible=?");
            $stmt->execute([$this->description, $this->visible = 1]);
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
            $stmt = $connect->prepare("UPDATE `devise` SET `visible`=? WHERE id=?");
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
            $stmt = $connect->prepare("UPDATE `devise` SET `description`=?,`taux`=?,`statuts`=?,`visible`=? WHERE id=?");
            $stmt->execute([$this->description, $this->taux, $this->statuts, $this->visible = 1, $this->id]);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}
