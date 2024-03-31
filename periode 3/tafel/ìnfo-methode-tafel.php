<?php
include "../db.php";

class tafels
{
    private $dbh;
    private $table = "tafels"; 

    public function __construct(DB $dbh)
    {
        $this->dbh = $dbh;
    }

    public function insertTafels($tafelnr, $bijzonderheden, $aantalpersonen): PDOStatement
    {
        return $this->dbh->execute("INSERT INTO $this->table VALUES (null, ?, ?, ?)", [$tafelnr, $bijzonderheden, $aantalpersonen]);
    }

    public function updateTafels($tafelnr, $bijzonderheden, $aantalpersonen, $id): PDOStatement
    {
        return $this->dbh->execute("UPDATE $this->table SET tafelnr = ?, bijzonderheden = ?, aantalpersonen = ? WHERE tafelCode = ?", [$tafelnr, $bijzonderheden, $aantalpersonen, $id]);
    }

    public function deleteTafels($id): PDOStatement
    {
        return $this->dbh->execute("DELETE FROM $this->table WHERE tafelCode = ?", [$id]);
    }

    public function getAllTafels(): PDOStatement
    {
        return $this->dbh->execute("SELECT * FROM $this->table");
    }

    public function getOneTafels($id): PDOStatement
    {
        return $this->dbh->execute("SELECT * FROM $this->table WHERE tafelCode = ?", [$id]);
    }


    
}
?>
