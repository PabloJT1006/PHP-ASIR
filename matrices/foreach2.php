<!-- foreach2.php -->
<HTML>
<HEAD><TITLE>Bucles</TITLE></HEAD>
<BODY>
<CENTER>
<H3>Lista de autores</H3>
</CENTER>
<?php
 $Nombres = array ('primero' => 'Javier',
                   'segundo' => 'Jorge',
                   'tercero' => 'Santiago');
 echo "<B>Bucle foreach</B><BR>\n";   
 foreach ($Nombres as $clave => $autor)
   {
   echo "Un autor de este libro se llama:<B> $autor</B>\n";
   echo " y su clave es <B>$clave</B>.<BR>\n";
   }
?>   
</BODY>
</HTML>
