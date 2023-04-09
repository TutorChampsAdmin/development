<?php 
$req_url = "https://" . $_SERVER[ 'HTTP_HOST' ] . $_SERVER[ 'REQUEST_URI' ];
if($req_url != strtolower($req_url)) {
    $req_url = strtolower($req_url);
    header("HTTP/1.1 301 Moved Permanently");
    header('Location:  '. trim($req_url)  );
    die;
}

$req_url = preg_replace('/\/page.*/', '', $req_url);
if(strpos($req_url, '/index.php') !== false || strpos($req_url, '/index.php/') !== false) {
    $req_url = str_replace('/index.php','',$req_url);
    if($home_page == '1'){
        redirect($req_url,'location',301);
    }else{
        redirect($req_url);
    } 
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="images/fav.png">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC:wght@100;300;400;500;700;900&amp;display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Mulish:wght@300;900&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,500;0,600;0,700;0,800;0,900;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
	<link rel="stylesheet" href="https://cdn.tutorialjinni.com/intl-tel-input/17.0.19/css/intlTelInput.css" />
	<link rel="stylesheet" href="<?php echo base_url();?>assets/main/css/style.css" />
	<title>Homework Help | Online Homework Help 24/7 | TutorChamps</title>
	</head>