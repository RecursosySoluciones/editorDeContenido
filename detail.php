<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editor de contenido Online</title>

    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css"> 
	<!-- include summernote css/js-->
	<link href="dist/summernote.css" rel="stylesheet">
    <style>
        body{width:100%}
        .row{padding:20px}
    </style>
</head>
<body>
<div class="row">
        <div style="width:100%">
            <?php
                require "koneksi.php";
                $id = isset($_GET['id']) ? $_GET['id'] :'';
                $query = $pdo->prepare("SELECT * FROM web_comercial_uy_info WHERE ID = :id ");
                $query->bindValue(':id',$id);
                $query->execute();
            ?>
                <form id="postForm" action="update.php" method="POST" enctype="multipart/form-data" onsubmit="return postForm()">
					<textarea id="summernote" name="content" rows="10"></textarea>
					<input type="hidden" name="id" placeholder="<?php echo $id;?>" value="<?php echo $id;?>">
					<br/>
					<button type="submit" class="btn btn-primary">Update</button>
					<!-- <button type="button" id="cancel" class="btn">Cancel</button> -->
                    <a href="index.php">
                        <button type="button" id="cancel" class="btn">Cancel</button>
                    </a>
					
				</form>
            <?php

                if($query->rowCount() > 0 ){ 
                    $r = $query->fetch();
                ?>
                    <h3 class="title">
                        <?php echo $r['LOCALIDAD'];?>
                        <?php echo $r['TIPO_SERVICIO'];?>
                    </h3>
                    <hr/>
                    <div class="content"><?php echo $r['INFORMACION'];?></div>
                    <hr/>
                    <!-- <a href="index.php"><h2><< Back</h2></a> -->
                <?php
                
                }else{

                    echo "Article Not found";
                }
            ?>
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