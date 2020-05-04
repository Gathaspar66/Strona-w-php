<?php
    session_start();
    if (!isset($_SESSION["pracownicy"]))
    {
        $_SESSION["pracownicy"]=array();
    }

    if (count($_SESSION["pracownicy"])>6)
    {
        session_destroy();
    }

?>

<!doctype html>
<html>

<head>

<link rel="stylesheet" type="text/css" href="xyz.css"/> 
<meta charset="UTF-8">
<title>Kacper Łu</title>
</head>

<body>
<div id="calosc">

	<div id="gora">
		LOGO 
	</div>
	<div id="lewo"> 
		<ul type="circle" >
			<li> <a href="index.php?strona=1">Strona główna</a> </li>
			<li> <a href="index.php?strona=2">formularz</a> </li>
            <li> <a href="index.php?strona=3">Zawartość sesji</a> </li>
            <li> <a href="index.php?strona=4">Baza pracowników</a> </li>
		</ul>    
	</div>
	<div id="srodek">
		<?php   
         if(isset($_GET['szukaj']))
        {
            include('wyszukiwarka.php');
        }

		if(isset($_GET["strona"]))
		$str = $_GET["strona"];
		else
		$str = 1;

		if(($str==1) && ( !isset($_GET['szukaj'])))
		echo "strona głowna";
        
		else if($str==2)
		include("form.php");
        
        else if ($str==3)
        include("sesja.php");
        
        
        else if ($str==4)
        include("baza.php");
       

		?>

	</div>
	<div id="prawo">
    
		<ul>
      <form action="index.php">
      <input type="text" name="szukaj">
      <input type="submit" value="Wyszukaj">
      
      </form>
    </ul> 
	</div>



	<div id="stopka"> <?php
            if (count($_SESSION["pracownicy"])>0)
                echo "Liczba dodanych pracowników:". count($_SESSION["pracownicy"]);
        ?> </div>

</div>  



</body>

</html>				