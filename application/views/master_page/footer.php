	<!-- scripts -->
	<?php
		//imprimir scripts local
		foreach ($local as $key) {
			echo "\n <script src='".base_url("assets/js/{$key}.js")."' type='text/javascript' ></script> \n";
		}
		//imprimir scripts externo
		foreach ($externo as $key) {
			echo "\n <script src='".base_url("{$key}")."' type='text/javascript'></script> \n";
		}
	?>
	</body>
</html>