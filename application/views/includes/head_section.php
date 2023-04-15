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
	<style>

#all_review {
    height: 1864px;
    overflow: hidden;
    margin-bottom: 20px;
}
.reviewMain {
    padding: 70px 0 0;
    position: relative;
}
.review_height {
    height: auto!important;
    margin-bottom: 20px!important;
}
.subReview {
    background: #fff;
    border-radius: 20px;
    box-shadow: 0 0 20px -7px #666;
    position: relative;
    display: flex;
    flex-wrap: nowrap;
    padding: 20px 20px 20px 0;
    margin: 0 15px 65px;
    min-height: 240px;
}
.rvwSub1 {
    text-align: center;
    width: 110px;
    border-right: solid 2px #ccc;
    margin: 0 30px 0 0;
}
.qtIcon {
    margin: -53px 5px 0;
}
.qtIcon svg {
    width: 55px;
    height: 55px;
    fill: #43b97e;
}
.starRevw {
    text-align: center;
    width: auto;
    display: inline-block;
    margin: 20px auto;
}
.starRevw svg {
    display: block;
    margin: 0 auto 9px;
    width: 20px;
    height: 20px;
}
.rvwSub2 {
    width: 100%;
}
.subReview h3 {
    font-size: 26px;
    margin: 5px 0 0;
    padding: 0 0 5px;
    text-transform: capitalize;
}
.subReview .mesg {
    font-size: 14px;
    color: #666;
    line-height: 22px;
}
.reviews_summary {
    background-color: #051d4d;
    border-bottom: 1px solid #ededed;
}
.reviews_summary .wrapper {
    background: rgba(0,0,0,0.4);
    background: -webkit-linear-gradient(top,rgba(0,0,0,0.4),transparent);
    background: linear-gradient(to bottom,rgba(0,0,0,0.4),transparent);
    padding: 60px 0 55px;
}
.reviews_summary figure {
    width: 120px;
    height: 144px;
    overflow: hidden;
    display: block;
    position: relative;
    float: left;
    margin-right: 20px;
    background-color: #fff;
    -webkit-border-radius: 3px;
    -moz-border-radius: 3px;
    -ms-border-radius: 3px;
    border-radius: 3px;
    margin-bottom: 0;
}

img {
    display: inline-block;
    max-width: 100%;
    height: auto;
}
.reviews_summary h1 {
    font-weight: 500;
    color: #fff;
    margin-top: 5px;
    font-size: 32px;
}
.reviews_summary .rating {
    font-size: 14px;
    display: flex;
    align-items: center;
    color: #999;
}
.jq-ry-container {
    position: relative;
    padding: 0 5px;
    line-height: 0;
    display: inline-block;
    cursor: pointer;
    -webkit-box-sizing: content-box;
    -moz-box-sizing: content-box;
    box-sizing: content-box;
    direction: ltr;
}
.jq-ry-container > .jq-ry-group-wrapper {
    position: relative;
    width: 100%;
}

.jq-ry-container > .jq-ry-group-wrapper > .jq-ry-group {
    position: relative;
    line-height: 0;
    z-index: 10;
    white-space: nowrap;
}

.jq-ry-container svg {
    background-color: #ccc;
    padding: 0.35em;
    margin-right: 2px;
    border-radius: 5px;
    display: inline-block;
}
.jq-ry-container > .jq-ry-group-wrapper > .jq-ry-group.jq-ry-rated-group {
    z-index: 11;
    position: absolute;
    top: 0;
    left: 0;
    overflow: hidden;
    width: 90%;
}
.rating em {
    display: inline-block;
    margin-left: 23px;
}
.review_detail .progress {
    margin-bottom: 11px;
    -webkit-border-radius: 3px;
    -moz-border-radius: 3px;
    -ms-border-radius: 3px;
    border-radius: 3px;
    height: 15px;
}
.review_detail .progress-bar {
    background-color: #ffc107;
}
.review_detail strong {
    font-size: 12px;
    font-size: .75rem;
    color: #999;
    position: relative;
    top: -3px;
}

@media only screen and (max-width: 767px) {
	.reviews_summary figure{float:none;margin:0 auto}
	.reviews_summary .rating,.reviews_summary h1{display:block;text-align:center}
	.reviews_summary h1{margin:15px 0 5px} .review_detail{margin-top:25px}
	.reviewMain::after{bottom:-46px}
}
	</style>
</head>
