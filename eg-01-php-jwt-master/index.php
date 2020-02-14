<!DOCTYPE html>
<html>
<head>
	<title>Title</title>
</head>
<body>
<div id="result">
	
</div>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript">
	$.ajax({
        type: "GET",        
        url: "main.php",
        success: function(result){            
            $('#result').html(result);            
        }
    });
</script>
</body>
</html>