<html>

<head>

	<title>Calcular ecuacion</title>

</head>

<body>

	<?php
	
		$a = $_POST[ 'a' ];
		$b = $_POST[ 'b' ];
		$c = $_POST[ 'c' ];
		
		for( $i = 0; $i < 4; $i++ )
		{
		
			echo "a = " . $a[ $i ] . " b = " . $b[ $i ] . " c = " . $c[ $i ];
		
			if( ( pow( $b[ $i ], 2 ) - ( 4 * $a[ $i ] * $c[ $i ] ) ) > 0 )
			{
				$x1 = ( ( $b[ $i ] * -1 ) + ( sqrt( pow( $b[ $i ], 2 ) - ( 4 * $a[ $i ] * $c[ $i ] ) ) ) ) / ( 2 * $a[ $i ] );
				$x2 = ( ( $b[ $i ] * -1 ) - ( sqrt( pow( $b[ $i ], 2 ) - ( 4 * $a[ $i ] * $c[ $i ] ) ) ) ) / ( 2 * $a[ $i ] );
			
				printf( "<br>X1 = %.2f <br>X2 = %.2f<hr>", $x1, $x2 );
			}
			else
			{
				echo "<br>La funcion es compleja.";
			}
			
		}
	
	?>

</body>

</html>