  



                                    
 <?php

$baza=mysqli_connect("127.0.0.1","lk41434","Kacpo98","lk41434");

    if (mysqli_connect_errno())
    
        {echo "Wystąpił błąd połączenia z bazą";}

#$wynik = mysqli_query($baza,"SELECT * FROM pracownicy");


$data=$_GET['szukaj'];
$tablica_slow=explode(' ',$data);
#var_dump($tablica_slow);
 for($i=0;$i<count($tablica_slow);$i++){
                //  echo $tablica_slow[$i];
                //  echo $i;
                  $lista_kryteriow[$i]=" nazwisko LIKE '%$tablica_slow[$i]%'";
            } 
        $blad=0;
        if(empty($data))
        {
            echo "Musisz podac ciag do wyszukiwarki";
            $blad=1;
        }

$where=implode(' OR ', $lista_kryteriow);
$modifieddata="%".$data."%";
$data2=$data;       
        
        
        
        
 #$sql = "SELECT count(*) as ilosc FROM pracownicy where nazwisko like '$modifieddata'";
  $tekstCount="SELECT COUNT(*) as ilosc FROM pracownicy WHERE $where ";
          $result1 = mysqli_query($baza, $tekstCount);
            $data = mysqli_fetch_assoc($result1);
            $ilosc = $data['ilosc'];

    			$liczba_wyn = $ilosc;
                $liczba_na_str=5; 
                $liczba_str=$liczba_wyn/$liczba_na_str;
                $liczba_str=ceil($liczba_str);
                if(isset($_GET['str'])) 
                    $str=$_GET['str'];
                else
                    $str=1;
                $pomin=($str-1)*$liczba_na_str;
                
                
                
                
                
                
				$tablica_slow=explode(' ',$_GET['szukaj']);

			 for($i=0;$i<count($tablica_slow);$i++){

                  $lista_kryteriow[$i]=" nazwisko LIKE '%$tablica_slow[$i]%'";
            } 

            $where=implode(' OR ', $lista_kryteriow);
            //  $tekst="SELECT * FROM pracownicy WHERE nazwisko LIKE '%$lewa%' LIMIT $pomin, $liczba_na_str ";
             $sql="SELECT * FROM pracownicy WHERE $where LIMIT $pomin, $liczba_na_str ";
                
                
                
                
$wynik = mysqli_query($baza,$sql);


echo '<table border=4>';
echo '<tr><td>  ID   </td><td> Imię</td><td>Nazwisko</td><td>Nazwisko panienskie</td><td>Płeć</td><td>Kod pocztowy</td><td>E-mail</td></tr>'; 
while ($wiersz = mysqli_fetch_array($wynik))
{
echo '<tr><td>'. $wiersz['ID'] .
'</td><td>'. $wiersz['imie'] .
'</td><td>'. $wiersz['nazwisko'] .
'</td><td>'. $wiersz['nazw_pa'] .
'</td><td>'. $wiersz['plec'] .
'</td><td>'. $wiersz['kod_pocztowy'] .
'</td><td>'. $wiersz['mail'] .

'</td></tr>'; 
}

echo '</table>';

$linki=' ';
                if($str>1) 
                {
                    $linki=$linki. '<a href="'.$_SERVER['PHP_SELF'].'?szukaj='.$data2.'&str='.($str-1).'"><-</a>';
                }
                else
                { 
                $linki=$linki. '<-'; 
                }
                for($i=1; $i<=$liczba_str; $i++) 
                {
                    if($str==$i) 
                    { 
                        $linki=$linki.' '.$i;  
                    }
                    else
                    { 
                        $linki=$linki. '<a href="'.$_SERVER['PHP_SELF'].'?szukaj='.$data2.'&str='.$i.'">'.$i.'</a>';  
                    }
                }
                if($str<$liczba_str)
                {
                    $linki=$linki. '<a href="'.$_SERVER['PHP_SELF'].'?szukaj='.$data2.'&str='.($str+1).'">-></a>'; 
                }
                else
                { 
                    $linki=$linki. '->';
                }
                echo $linki;




mysqli_close($baza);

?> 