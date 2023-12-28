<!-- foreach1.php -->
<HTML>
<HEAD><TITLE>Bucles</TITLE></HEAD>
<BODY>
<CENTER>
<H3>Lista de autores</H3>
</CENTER>
<?php
 $Nombres[0]='Abraham';
 $Nombres[1]='Agustín';
 $Nombres[2]='Javier';
 echo "<B>Bucle clásico</B><Br>\n";
 for ($i = 0; $i < 3; $i++)
    {
    echo "Un autor de este libro se llama:<B> $Nombres[$i]</B>";
    echo "<BR>\n";
    }
 echo "<B>Bucle foreach</B><BR>\n";   
 foreach ($Nombres as $autor) // bucle foreach
   echo "Un autor de este libro se llama:<B> $autor</B><BR>\n";
?>   
</BODY>
</HTML>
