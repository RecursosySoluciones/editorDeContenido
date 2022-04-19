<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Editor de contenido Online</title>

	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css"> 
	<!-- include summernote css/js-->
	<link href="dist/summernote.css" rel="stylesheet">
</head>
<body>
	<div class="summernote container">
		<div class="row">	
			<table class="table">
				<thead>
				<tr>
					<th>ID</th>
					<th>LOCALIDAD</th>
					<th>TIPO_SERVICIO</th>
				</tr>
				<thead>
				<tbody>
					<?php include "view.php"; ?>
				</tbody>
			</table>
		</div>
	</div>

	<!-- include libries(jQuery, bootstrap) -->
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
	<script src="dist/summernote.min.js"></script>

	<script type="text/javascript">
	$(document).ready(function() {
		$('#summernote').summernote({
			height: "300px",
			styleWithSpan: false
		});
	});
	function postForm() {

		$('textarea[name="content"]').html($('#summernote').code());
	}
	</script>
</body>
</html>