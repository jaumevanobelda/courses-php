<?php
	class connect{
		public static function con(){
			//echo '<script> console.log("comença Connect")</script>';
			$servidor = "localhost";
			$usuari = "root";
			$contraseña = "";
			$tabla = "course";
			$conexio = new mysqli($servidor,$usuari,$contraseña,$tabla );
			//echo '<script> console.log("acaba Connect")</script>';
			return $conexio;
		}
		public static function close($conexio){
			mysqli_close($conexio);
		}
	}