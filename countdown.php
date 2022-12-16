<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
<script src="public/js/moment.js"></script>
<script src="public/js/countdown.js"></script>
<script src="public/js/moment-countdown.js"></script>
<script>
    var a = moment("2022-12-17").countdown().toString();
    console.log(a);
</script>
</html>
<?php 
date_default_timezone_set('Asia/Ho_Chi_Minh');

echo date("Y-m-d H:i:s");

?>