	<!-- scripts -->
	<?php
		//imprimir scripts local
		foreach ($scripts as $key => $value) {
			if( $value == true )
				echo "\n <script src='".base_url("assets/js/{$key}.js")."'></script> \n";
		}
		//imprimir scripts outhers
		foreach ($scripts_outhers as $key => $value) {
			if( $value == true )
				echo "\n <script src='".base_url("{$key}.js")."'></script> \n";
		}
	?>
	</body>
</html>