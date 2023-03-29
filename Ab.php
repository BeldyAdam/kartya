<?php
class Ab{
    //Adattagok
    private $host = "localhost";
    private $felhasznaloNev = "root";
    private $jelszo = "";
    private $abNev = "magyar_kártya";
    private $kapcsolat;

    //Konstruktor
    function __construct()
    {
        $this->kapcsolat = new mysqli(
            $this->host, 
            $this->felhasznaloNev, 
            $this->jelszo, 
            $this->abNev);
        if ($this->kapcsolat->connect_error) {
            $szoveg = "<p>Sikertelen kapcsolódás!</p>";
        }
        else {
            $szoveg = "<p>Sikeres kapcsolódás!</p>";}
        echo $szoveg;
        $this->kapcsolat->query("SET NAMES UTF8");
        /* $this->kapcsolat->query("set characters set UTF8");  rossz*/ 
    }
    //Metódus
    function adatLeker($oszlop, $tabla){
        $sql = "SELECT $oszlop FROM $tabla";
        $phpTomb = $this->kapcsolat->query($sql);
        while ($sor = $phpTomb->fetch_row()){
            echo "<img src = \"forras/$sor[0]\" alt=\"kártya képe\">";
            echo "<br>";
        }
    }
    function adatLeker2($oszlop1, $oszlop2, $tabla){
        $sql = "SELECT $oszlop1, $oszlop1, FROM $tabla";
        $phpTomb = $this->kapcsolat->query($sql);
        while ($sor = $phpTomb->fetch_assoc()){
            echo "<img src = \"forras/$sor[$oszlop2]\" alt=\"kártya képe\">";
            echo "<br>";
        }
    }

    function adatLekerTablazat($oszlop1, $oszlop2, $tabla)
    {
        $sql = "SELECT $oszlop1, $oszlop2 FROM $tabla";
        $phpTomb = $this->kapcsolat->query($sql);

        echo "<table>";
        echo "<tr><th>$oszlop1</th><th>Kép</th></tr>";

        while ($sor = $phpTomb->fetch_assoc()) {
            echo "<tr>";
            echo "<td>$sor[$oszlop1]</td>";
            echo "<td><img src='forras/$sor[$oszlop2]' alt='kártya képe'></td>";
            echo "</tr>";
        }

        echo "</table>";
    }


    function kapcsolatBezar(){
        $this->kapcsolat->close();
    }
}

?>