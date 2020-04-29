<?php
include '../conf.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>test AJAX</title>
	<script type="text/javascript" src="jquery.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			// body...
			$('#ajax_query').click(function() {
				// body...
				//alert('qwe');
				$.ajax({
					method: "POST",
					url: "answer1.php?mod=get",
					data: {id: 1}
				}).done(function( answer ) {
					// body...
					$('#ajax_answer').html( answer );
				});
				return false;
			});//--click
		});//--document
	</script>
</head>
<body>
	<a href="#" id="ajax_query">ajax_query</a><br>
	<div id="ajax_answer"></div>
</body>
</html>