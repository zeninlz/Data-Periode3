<?php
include "../db.php";

class Artikel
{
    private $dbh;
    private $table = "artikel";

    public function __construct(DB $dbh)
    {
        $this->dbh = $dbh;
    }

    public function insertArtikel(String $naam, int $prijs) : PDOStatement
    {
        return $this->dbh->execute("INSERT INTO $this->table VALUES (null, ?, ?)", [$naam, $prijs]);
    }

    public function updateArtikel(String $naam, int $prijs, int $id) : PDOStatement
    {
        return $this->dbh->execute("UPDATE $this->table SET naam = ?, prijs = ? WHERE artikelCode = ?", [$naam, $prijs, $id]);
    }

    public function deleteArtikel(int $id) : PDOStatement
    {
        return $this->dbh->execute("DELETE FROM $this->table WHERE artikelCode = ?", [$id]);
    }

    public function getAllArtikel() : PDOStatement
    {
        return $this->dbh->execute("SELECT * FROM $this->table");
    }

    public function getOneArtikel(int $id) : PDOStatement
    {
        return $this->dbh->execute("SELECT * FROM $this->table WHERE artikelCode = ?", [$id]);
    }
}