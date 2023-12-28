<html>

<head>

	<title>Calcular ecuacion</title>

</head>

<body>

	<?php
	
		function Ecuacion( $A, $B, $C )
		{
			if( ( pow( $B, 2 ) - ( 4 * $A * $C ) ) > 0 )
			{
				$x1 = ( ( $B * -1 ) + ( sqrt( pow( $B, 2 ) - ( 4 * $A * $C ) ) ) ) / ( 2 * $A );
				$x2 = ( ( $B * -1 ) - ( sqrt( pow( $B, 2 ) - ( 4 * $A * $C ) ) ) ) / ( 2 * $A );
			
				printf( "<br>X1 = %.2f <br>X2 = %.2f", $x1, $x2 );
			}
			else
			{
				echo "<br>La funcion es compleja.";
			}
		}
	
		$a = $_POST[ 'a' ];
		$b = $_POST[ 'b' ];
		$c = $_POST[ 'c' ];
		
		echo "a = " . $a . " b = " . $b . " c = " . $c;
		
		Ecuacion( $a, $b, $c );
	
	?>

</body>

</html>