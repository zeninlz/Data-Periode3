<?php
include "../db.php";
class klanten
{
    private $dbh;
    private $table = "klanten"; 

    public function __construct(DB $dbh)
    {
        $this->dbh = $dbh;
    }

    public function insertklanten($naam, $achternaam, $email, $nummer): PDOStatement
    {
        return $this->dbh->execute("INSERT INTO $this->table VALUES (null, ?, ?, ?, ?)", [$naam, $achternaam, $email, $nummer]);
    }

    public function updateklanten($naam, $achternaam, $email, $nummer, $id): PDOStatement
    {
        return $this->dbh->execute("UPDATE $this->table SET naam = ?, achternaam = ?, email = ?, nummer = ? WHERE klantenCode = ?", [$naam, $achternaam, $email, $nummer, $id]);
    }

    public function deleteklanten($id): PDOStatement
    {
        return $this->dbh->execute("DELETE FROM $this->table WHERE klantenCode = ?", [$id]);
    }

    public function getAllklanten(): PDOStatement
    {
        return $this->dbh->execute("SELECT * FROM $this->table");
    }

    public function getOneklanten($id): PDOStatement
    {
        return $this->dbh->execute("SELECT * FROM $this->table WHERE klantenCode = ?", [$id]);
    }
}
?>
