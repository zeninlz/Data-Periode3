<?php
include "../db.php";


class bestellingen
{
    private $dbh;
    private $table = "bestellingen"; 
    private $table2 = "producten"; 
    private $table3 = "reseveringen"; 
    private $table4 = "klanten"; 

    public function __construct(DB $dbh)
    {
        $this->dbh = $dbh;
    }

    public function insertbestellingen($reseveringCode, $productenCode): PDOStatement
    {
        return $this->dbh->execute("INSERT INTO $this->table (reseveringCode, productenCode) VALUES (?, ?)", [$reseveringCode, $productenCode, ]);
    }

    public function updatebestellingen($reseveringCode, $productenCode,$bestellingenCode): PDOStatement
    {
        return $this->dbh->execute("UPDATE $this->table SET  reseveringCode = ?, productenCode = ? WHERE bestellingenCode = ?", [$reseveringCode, $productenCode, $bestellingenCode]);
    }

    public function deletebestellingen($id): PDOStatement
    {
        return $this->dbh->execute("DELETE FROM $this->table WHERE bestellingenCode = ?", [$id]);
    }


    public function getAllbestellingen(): PDOStatement
    {
        return $this->dbh->execute("
            SELECT r.*, k.*, t.*, c.naam as klantNaam
            FROM $this->table r
            JOIN reseveringen k ON r.reseveringCode = k.reseveringCode
            JOIN producten t ON r.productenCode = t.productenCode
            JOIN klanten c ON k.klantennaam = c.klantenCode
        ");
    }
    

    public function getOnebestellingen($bestellingenCode): PDOStatement
    {
        return $this->dbh->execute("SELECT * FROM $this->table WHERE bestellingenCode = ?", [$bestellingenCode]);
    }

    
    public function getbestellingenWithDetails($bestellingenCode): PDOStatement
    {
        return $this->dbh->execute("
            SELECT r.*, k.*, t.*
            FROM $this->table r
            JOIN reseveringen k ON r.reseveringCode = k.reseveringCode
            JOIN producten t ON r.productenCode = t.productenCode
            JOIN klanten c ON k.klantennaam = c.klantenCode
            WHERE r.bestellingenCode = ?", [$bestellingenCode]);
    }
      ////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function bes($bestellingenCode) {
        $query = "SELECT * FROM $this->table WHERE bestellingenCode = :bestellingenCode";
        $statement = $this->dbh->execute($query, [':bestellingenCode' => $bestellingenCode]);
        return $statement->fetch(PDO::FETCH_ASSOC);
    }
  
    public function getAllproducten(): PDOStatement
    {
        return $this->dbh->execute("SELECT * FROM $this->table2");
    }
    public function getAllreseveringen(): PDOStatement
    {
        return $this->dbh->execute("SELECT * FROM $this->table3");
    }

    public function getAllklanten(): PDOStatement
    {
        return $this->dbh->execute("SELECT * FROM $this->table4");
    }



    
}
?>
