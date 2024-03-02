<?php
include "../db.php";

class Producten
{
    private $dbh;
    private $table = "Producten"; 

    public function __construct(DB $dbh)
    {
        $this->dbh = $dbh;
    }

    public function insertProducten($naam, $omschrijving, $prijs): PDOStatement
    {
        return $this->dbh->execute("INSERT INTO $this->table VALUES (null, ?, ?, ?)", [$naam, $omschrijving, $prijs]);
    }

    public function updateProducten($naam, $omschrijving, $prijs, $id): PDOStatement
    {
        return $this->dbh->execute("UPDATE $this->table SET naam = ?, omschrijving = ?, prijs = ? WHERE productenCode = ?", [$naam, $omschrijving, $prijs, $id]);
    }

    public function deleteProducten($id): PDOStatement
    {
        return $this->dbh->execute("DELETE FROM $this->table WHERE productenCode = ?", [$id]);
    }

    public function getAllProducten(): PDOStatement
    {
        return $this->dbh->execute("SELECT * FROM $this->table");
    }

    public function getOneProducten($id): PDOStatement
    {
        return $this->dbh->execute("SELECT * FROM $this->table WHERE productenCode = ?", [$id]);
    }
}
?>
