<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">
<link rel="icon" href="../../../../favicon.ico">

<title>Sticky Footer Navbar Template for Bootstrap</title>

<!-- Bootstrap core CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

<!-- Google ICONS -->
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

<!-- Custom styles for this template -->
<link rel="stylesheet" href="assets/css/style.css">

<!-- Bootstrap core CSS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- Toastr -->
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<?php
    $sql = "SELECT * FROM company ORDER BY id ASC LIMIT 1";
    $result = mysqli_query($connect, $sql);
    while($row = mysqli_fetch_assoc($result)) {
        $company_name  = $row['name'];
        $logo  = $row['logo'];
        $company_phone  = $row['company_phone'];
	} 
?>