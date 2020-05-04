<?php

$inwalidacja=0;


$nazw_pa_blad=1;
$kod_pocztowy_blad=1;
$nazwisko_blad=1;
$imie_blad=1;
$mail_blad=1;
$plec_blad_k=1;
$plec_blad_m=1;


$nazwisko="";

$nazw_pa="";

$kod_pocztowy="";

$mail="";

$plec="";

$imie="";



$imie=$_POST["imie"];
$nazwisko=$_POST["nazwisko"];
$nazw_pa=$_POST["nazw_pa"];            
$kod_pocztowy=$_POST["kod_pocztowy"];
$mail=$_POST["mail"];
$plec=$_POST["plec"];



                        
        if (isset($_POST["wyslij"])) 
        {
            
                $nazw_pa_blad=0;
                $kod_pocztowy_blad=0;
                $nazwisko_blad=0;
                $imie_blad=0;
                $mail_blad=0;
                $plec_blad_k=0;
                $plec_blad_m=0;
            
                if (!empty($imie))
                {
                    $imie_blad=1;
                }

                if (!empty($nazwisko))
                {
                    $nazwisko_blad=1;
                }
    
                if (!empty($nazw_pa))
                {
                    $nazw_pa_blad=1;
                }
                
                
                if ($plec=="mezczyzna")
                {
                    $plec_blad_m=1;
                }
                
                if ($plec=="kobieta")
                {
                    $plec_blad_k=1;
                }
                
                
                if (!empty($kod_pocztowy))
                {
        
                    if (preg_match('/^[0-9]{2,2}-[0-9]{3,3}$/', $kod_pocztowy))
                    {
                        $kod_pocztowy_blad=1;
                    }
                }
                
                if (!empty($mail))
                {
                    
                    if (preg_match('/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/i', $mail))
                    {
                    $mail_blad=1;
                    }
                }  
                    
                                            
                                if ( ($imie_blad==1) and  ($nazwisko_blad==1) and ($nazw_pa_blad==1) and  ($kod_pocztowy_blad==1) and ($mail_blad==1)and (($plec_blad_k==1) or ($plec_blad_m=1))  )
                                {
                                    
                                    
                                    $inwalidacja=1;
                                    
                                    echo "Imie   " . $imie . "<br>";
                                    echo "Nazwisko:   " . $nazwisko . "<br>";
                                    echo "Płeć:   " . $plec . "<br>";
                                    echo "Nazwisko panienskie:   " . $nazw_pa . "<br>";
                                    echo "Kod pocztowy:   " . $kod_pocztowy . "<br>";
                                    echo "Mail:   " . $mail . "<br>";   
                                    $_SESSION["pracownicy"][]=array(imie=>$imie, nazwisko=>$nazwisko, plec=>$plec, nazw_pa=>$nazw_pa, kod_pocztowy=>$kod_pocztowy, mail=>$mail);
                                    
                                    
                                    
                                    
                                    $pol=mysqli_connect("127.0.0.1","lk41434","Kacpo98","lk41434");
                                    
                                    if($pol)
                                    {
                                        $sql ="Insert into pracownicy (imie,nazwisko,plec,nazw_pa,kod_pocztowy,mail)
                                        values
                                        ('$imie','$nazwisko','$plec','$nazw_pa','$kod_pocztowy','$mail')";
                                        
                                            if (!mysqli_query($pol,$sql))
                                            {
                                            echo "nie wprowadzono danych";
                                            }
                                                else{
                                                echo "wprowadzono nowy rekord";   
                                                }
                                    
                                    
                                    }
                                    else{
                                    
                                    echo "nie połaczono z bazą danych";
                                    }
                                
                                }
                           
                
}
              
if (!isset($_POST["wyslij"]) or $inwalidacja==0)
{
    
?>

<form id="formularz" method="POST" action="index.php?strona=2" ><br/>
                
                   <table>
            <tr>
                <td>Imię:</td> <td><input type="text" name="imie" value="<?php if($imie_blad == 1) echo $imie; ?>"><?php if($imie_blad == 0) echo "Błędne imię"; ?></td>
            </tr>
            
            <tr>
                <td>Nazwisko:</td> <td><input type="text" name="nazwisko" value="<?php if($nazwisko_blad == 1) echo $nazwisko; ?>"><?php if($nazwisko_blad == 0) echo "Błędne nazwisko"; ?></td>
            </tr>
            
            <tr>
                <td>Płeć:</td> <td><input type="radio" name="plec" value="kobieta" <?php if($plec_blad_k == 1) echo "checked";?>>kobieta<br><input type="radio" name="plec" value="mezczyzna" <?php if($plec_blad_m == 1) echo "checked";?>>mężczyzna <?php if($plec_blad_k == 0 and $plec_blad_m == 0 and $inwalidacja == 0) echo "Zaznacz płeć"; ?></td>
            </tr>
            
            <tr>
                <td>Nazwisko panieńskie</td> <td><input type="text" name="nazw_pa" value="<?php if($nazw_pa_blad == 1) echo $nazw_pa; ?>"><?php if($nazw_pa_blad == 0) echo "Błędne nazwisko panieńskie"; ?></td>
            </tr>
            
            <tr>
                <td>Email</td> <td><input type="text" name="mail" value="<?php if($mail_blad == 1) echo $mail; ?>"><?php if($mail_blad == 0) echo "Błędny email"; ?></td>
            </tr>
            
            <tr>
                <td>Kod pocztowy</td> <td><input type="text" name="kod_pocztowy" value="<?php if($kod_pocztowy_blad == 1) echo $kod_pocztowy; ?>"><?php if($kod_pocztowy_blad == 0) echo "Błędny kod pocztowy"; ?></td>
            </tr>
            
            <tr>
                <td></td> <td><input type='submit' name="wyslij" value='wyslij'></td>
            </tr>
        </table>
                </form>
                
                <?php
}
                
                ?>