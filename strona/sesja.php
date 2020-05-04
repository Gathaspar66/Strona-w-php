<?php
for($i = 0; $i < count($_SESSION["pracownicy"]); $i++)
{
    echo "Imię:   " . $_SESSION["pracownicy"][$i]["imie"] . "<br>";
    echo "Nazwisko:   " . $_SESSION["pracownicy"][$i]["nazwisko"] . "<br>";
    echo "Płeć:   " . $_SESSION["pracownicy"][$i]["plec"] . "<br>";
    echo "Nazwisko panienskie:   " . $_SESSION["pracownicy"][$i]["nazw_pa"] . "<br>";
    echo "Kod pocztowy:   " . $_SESSION["pracownicy"][$i]["kod_pocztowy"] . "<br>";
    echo "Mail:   " . $_SESSION["pracownicy"][$i]["mail"] . "<br>";
    echo "<br>";
}

?>