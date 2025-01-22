<?php
function letter() {
	 $dic = array( 'Q', 'W', 'E', 'R', 'T', 'Y', 'U', 'I', 'O', 'P', 'A', 'S', 'D', 'F', 'G', 'H', 'J', 'K', 'L',
		'Ñ', 'Z', 'X', 'C', 'V', 'B', 'N', 'M' );
	return $dic[rand(0,sizeof($dic) -1)];
    }

    function string($length) {
	 $cad = "";
	for ( $i = 0; $i < $length; $i++) {
        if(rand(0,3) === 0){
            $cad = $cad . letter();
        }else{
            $cad = $cad . strtolower(letter());
        }
	    
	}
	return $cad;
    }



?>