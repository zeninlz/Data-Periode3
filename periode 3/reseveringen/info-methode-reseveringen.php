<?php
include "../db.php";


class reseveringen
{
    private $dbh;
    private $table = "reseveringen"; 
    private $table2 = "klanten"; 
    private $table3 = "tafels"; 

    public function __construct(DB $dbh)
    {
        $this->dbh = $dbh;
    }

    public function insertReservering($datum, $tijd, $klantennaam, $tafelnr): PDOStatement
    {
        return $this->dbh->execute("INSERT INTO $this->table (datum, tijd, klantennaam, tafelnr) VALUES (?, ?, ?, ?)", [$datum, $tijd, $klantennaam, $tafelnr]);
    }

    public function updateReservering($datum, $tijd, $tafelnr, $reserveringCode): PDOStatement
    {
        return $this->dbh->execute("UPDATE $this->table SET datum = ?, tijd = ?, tafelnr = ? WHERE reseveringCode = ?", [$datum, $tijd, $tafelnr, $reserveringCode]);
    }

    public function deleteReservering($id): PDOStatement
    {
        return $this->dbh->execute("DELETE FROM $this->table WHERE reseveringCode = ?", [$id]);
    }


    public function getAllReserveringen(): PDOStatement
    {
        return $this->dbh->execute("    SELECT r.*, k.*, t.*
        FROM $this->table r
        JOIN klanten k ON r.klantennaam = k.klantenCode
        JOIN tafels t ON r.tafelnr = t.tafelCode
        ");
    }

    public function getOneReservering($reserveringCode): PDOStatement
    {
        return $this->dbh->execute("SELECT * FROM $this->table WHERE reseveringCode = ?", [$reserveringCode]);
    }

    // Deze functie haalt een reservering op met de bijbehorende klant- en tafelinformatie
    public function getReserveringWithDetails($reserveringCode): PDOStatement
    {
        return $this->dbh->execute("
            SELECT r.*, k.*, t.*
            FROM $this->table r
            JOIN klanten k ON r.klantenCode = k.klantenCode
            JOIN tafels t ON r.tafelCode = t.tafelCode
            WHERE r.reseveringCode = ?", [$reserveringCode]);
    }

    public function res($reserveringCode) {
        $query = "SELECT * FROM $this->table WHERE reseveringCode = :ReseveringCode";
        $statement = $this->dbh->execute($query, [':ReseveringCode' => $reserveringCode]);
        return $statement->fetch(PDO::FETCH_ASSOC);
    }
  
    public function getAllKlanten(): PDOStatement
    {
        return $this->dbh->execute("SELECT * FROM $this->table2");
    }
    public function getAlltafels(): PDOStatement
    {
        return $this->dbh->execute("SELECT * FROM $this->table3");
    }





    
}
?>
