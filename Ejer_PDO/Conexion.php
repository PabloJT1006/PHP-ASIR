<?php
    require_once 'mysql-login.php'; //FICHERO DONDE ESTAN LOS DATOS
    
    try {
        $PDO  = new PDO('mysql:host='.$servidor.';dbname='.$basedatos,$usuario,$contraseña); //CONEXION
        print("<center>Conexcion exitosa!</center>");
    } catch (PDOException $e) {
        print "¡Error!: " .$e->getMessage().""; //MUESTRA EL ERROR EN CASO DE NO TENER CONEXION
        die();
    }

    echo "<br><br>";

    $query = "SELECT * FROM ALUMNOS"; //CONSULTA DE LA TABLA ALUMNOS

    $resultado = $PDO->query($query); //SE GUARDAN LOS DATOS DE LA CONSULTA

    print("<center><strong>Datos de la tabla Alumnos</strong></center><br>");

    print("<table border=5 align=center style='text-align=center;'>");
    print("<tr>");
    print("<td>Codigo</td><td>Nombre</td><td>Apellido</td><td>Sexo</td><td>Edad</td>");
    print("</tr>");
    foreach ($resultado as $rows) { //MOSTRAR LOS DATOS DE LA CONSULTAS 
        print("<tr>");
        print("<td>".$rows["Codigo"]."</td>");
        print("<td>".$rows["Nombre"]."</td>");
        print("<td>".$rows["Apellido"]."</td>");
        print("<td>".$rows["Sexo"]."</td>");
        print("<td>".$rows["Edad"]."</td>");
        print("</tr>");
    }
    print("</table>");
    $resultado=null; //ELIMINAR LOS DATOS DEL RESULTADO PARA QUE NO SALGAN LOS ANTERIORES

    print("<br>");

    print("<center><strong>Mujeres entre 20 y 25 años</strong></center><br>");

    $query = "SELECT * FROM ALUMNOS WHERE EDAD>20 AND EDAD<30 AND SEXO='MUJER'"; //CONSULTA MUJERES ENTRE 20 Y 30 

    $resultado = $PDO->query($query);   //SE GUARDAN LOS DATOS DE LA CONSULTA

    print("<table border=5 align=center style='text-align=center;'>");
    print("<tr>");
    print("<td>Codigo</td><td>Nombre</td><td>Apellido</td><td>Sexo</td><td>Edad</td>");
    print("</tr>");
    foreach ($resultado as $rows) { //MOSTRAR LOS DATOS DE LA CONSULTA ANTERIOR
        print("<tr>");
        print("<td>".$rows["Codigo"]."</td>");
        print("<td>".$rows["Nombre"]."</td>");
        print("<td>".$rows["Apellido"]."</td>");
        print("<td>".$rows["Sexo"]."</td>");
        print("<td>".$rows["Edad"]."</td>");
        print("</tr>");
    }
    print("</table>");
    $resultado=null; //BORRA LOS DATOS GUARDADOS ANTERIORMENTE

    echo "<br>";

    $query="SELECT * FROM ALUMNOS WHERE EDAD<30 AND SEXO='HOMBRE'"; //CONSULTA DE LOS HOMBRES MENORES DE 30 AÑOS

    $resultado = $PDO->query($query); //SE GUARDAN LOS DATOS DE LA CONSULTA

	$fichero=fopen('hombres.dat', 'w'); //CREACION DEL FICHERO

	fclose($fichero);

	$fichero=fopen('hombres.dat', 'a'); //ABRIR EL FICHERO PARA AÑADIR

	foreach($resultado as $linea){ //LEER EL RESULTADO LINEA POR LINEA
		$c= $linea['Codigo'];
		$n= $linea['Nombre'];
        $a= $linea['Apellido'];
		$s= $linea['Sexo'];
        $e= $linea['Edad'];

		fputs($fichero, "$c\t");    //AÑADIR LOS DATOS
		fputs($fichero,  "$n\t");   //AÑADIR LOS DATOS
		fputs($fichero,  "$a\t");   //AÑADIR LOS DATOS
		fputs($fichero,  "$s\t");   //AÑADIR LOS DATOS
		fputs($fichero,  "$e\n");   //AÑADIR LOS DATOS
	}

	fclose($fichero);
            
	$fichero=fopen('hombres.dat', 'r'); //ABRIR EL FICHERO EN MODO LECTURA

	echo "<table border=5 align=center style='text-align=center;'>";

	$linea = fscanf( $fichero, "%s\t%s\t%s\t%s\t%d\n", $c, $n,$a,$s,$e); //ESCANEAR EL FICHERO
	echo "<h3><center>Datos introducidos en el fichero hombres.dat</center></h3>";
	echo "<tr><th>Codigo</th><th>Nombre</th><th>Apellido</th><th>Sexo</th><th>Edad</th></tr>";

	while (!feof($fichero)){
		echo "<tr>";
		echo "<td>".$c."</td>";
		echo "<td>".$n."</td>";
		echo "<td>".$a."</td>";
		echo "<td>".$s."</td>";
		echo "<td>".$e."</td>";
		echo "<tr>";			
		$linea = fscanf( $fichero, "%s\t%s\t%s\t%s\t%d\n", $c, $n, $a, $s, $e); //ESCANEAR EL FICHERO
	}
	echo "</table>";
	fclose($fichero);	//CERRAR EL FICHERO
    $resultado=null;    //BORRAR LOS DATOS GUARDADOS ANTERIORMENTE

    echo "<br><br>";

    $query="SELECT * FROM ALUMNOS WHERE NOMBRE='Raul' OR (EDAD>20 AND EDAD<30 AND SEXO='MUJER')"; //CREAR LA CONSULTA

    $resultado= $PDO->query($query); //GUARDAR DATOS DE LA CONSULTA

    $i = 0;
    foreach($resultado as $linea) {
        $c= $linea['Codigo'];
		$n= $linea['Nombre'];
        $a= $linea['Apellido'];
		$s= $linea['Sexo'];
        $e= $linea['Edad'];

        $DATOS[$i][]= $c;
        $DATOS[$i][]= $n;
        $DATOS[$i][]= $a;
        $DATOS[$i][]= $s;
        $DATOS[$i][]= $e;
        $i ++;
    }
    echo "<center>";
    echo "<table border=1>";
			echo "<h3>Array de los datos de mujeres entre 20 y 30</h3>";
			echo "<tr><th>Codigo</th><th>Nombre</th><th>Apellido</th><th>Sexo</th><th>Edad</th></tr>";	
			foreach ($DATOS as $indice1=>$valores){
				echo "<tr>";
				foreach ($valores as $indice2=>$valor){
					echo "<td>".$valor."</td>";
				}
				echo"</tr>";
			}
	echo "</table>";
    echo "</center>";
?>