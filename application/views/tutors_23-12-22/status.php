<!DOCTYPE html>
{% load static %}
<html>

<head>
  <meta charset="utf-8">
  <title>Quiz_home</title>
  <link href="{% static 'css/bootstrap.css' %}" rel="stylesheet">
  <link href="{% static 'css/dash.css' %}" rel="stylesheet">
  <link href="{% static 'dashboard/css/dashboard.css' %}" rel="stylesheet">
  <link href="{% static 'css/style.css' %}" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC:wght@100;300;400;500;700;900&amp;display=swap"
    rel="stylesheet">
  <link rel="shortcut icon" href="{% static 'images/fav.png' %}" type="image/x-icon">
  <link href="{% static 'css/chat.css' %}" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
  <style>
    .body {
      font-family: 'Noto Sans TC', sans-serif;
    }

    .header2 {
      justify-content: space-between;
      display: flex;
    }

    .logo2 {
      margin: 20px 25px 10px 25px;
      height: 30px;
      display: flex;
      width: fit-content;
    }

    .heading2 {
      color: black;
      top: 10%;
    }

    /* .big_container2:after{content: ""; background: rgb(255 255 255 / 50%); position: absolute;top: 0; right: 0; width: 100%; height: 100%;} */
    .big_container2 {
      position: relative;
      display: flex;
      /* justify-content: center; */
      /* align-items: center; */
      min-height: 100vh;
      /* background: linear-gradient(rgba(255,255,255,.5), rgba(255,255,255,.5)), url(../static/images/test.webp); */
      background: #eef1ef url(https://www.payu.in/static/920cd2454d87d933833ae246b08a221e.webp) repeat left top;
      background-position: center;
      flex-direction: column;
    }

    .first2 {
      height: auto;
      background-color: white;
      border: 3px solid #47bf7f;
      margin: auto;
      width: 70%;
      border-radius: 23px;
      padding-bottom: 28px;
    }

    @media screen and (max-width: 767px) {
      .first2 {
        height: auto;
        background-color: white;
        border: 3px solid #47bf7f;
        margin: auto;
        width: 85%;
        border-radius: 23px;
        padding-bottom: 28px;
      }
    }

    .head_content2 {
      text-align: center;
      padding-bottom: 5px;
      height: fit-content;
      width: fit-content;
      display: flex;
      justify-content: center;
      color: #47bf7f;
      font-size: 40px;
      font-weight: bold;
      margin: 27px auto 33px auto;
      font-family: 'Noto Sans TC', sans-serif;
    }

    .ins-div {
      /* margin: 30px 10% 20px 10%; */
      display: flex;
      justify-content: center;
      font-size: 18px;

    }

    .ins-div-2 {
      display: flex;
      /* width: fit-content; */
      width: 382px;
      background-color: #ffc61ab0;
      border-radius: 15px;
      justify-content: center;
      padding: 20px;
    }

    .instructions {
      list-style: none;
      margin-top: 10px;
    }

    .bold {
      font-size: 20px
    }

    @media screen and (max-width: 478px) {
      .head_content2 {
        text-align: center;
        padding-bottom: 5px;
        height: fit-content;
        width: fit-content;
        display: flex;
        justify-content: center;
        color: #47bf7f;
        font-size: 28px;
        font-weight: bold;
        margin: 27px auto 33px auto;
        font-family: 'Noto Sans TC', sans-serif;
      }

      .ins-div {
        font-size: 15px;
      }

      .ins-div-2 {
        padding: 10px;
        width: 300px;

      }
    }
  </style>

  <style>
    .button {
      display: inline-block;
      border-radius: 40px;
      background-color: #47bf7f;
      border: none;
      color: #FFFFFF;
      text-align: center;
      font-size: 21px;
      padding: 10px;
      width: 225px;
      transition: all 0.5s;
      cursor: pointer;
      margin: 5px;
      font-family: 'Noto Sans TC', sans-serif;
    }

    .button span {
      cursor: pointer;
      display: inline-block;
      position: relative;
      transition: 0.5s;
    }

    /* .button span:after{
	content: '\003E';
} */
    .button span:after {
      content: '\003E';
      position: absolute;
      opacity: 1;
      top: 0;
      right: -20px;
      transition: 0.5s;
    }

    .button:hover {
      background-color: #0e9d56;
    }

    .button:hover span {
      padding-right: 25px;
    }

    .button:hover span:after {
      content: '\2192';
      opacity: 1;
      right: 0;

    }
  </style>

  <!-- Google Tag Manager -->
  <script>(function (w, d, s, l, i) {
      w[l] = w[l] || []; w[l].push({
        'gtm.start':
          new Date().getTime(), event: 'gtm.js'
      }); var f = d.getElementsByTagName(s)[0],
        j = d.createElement(s), dl = l != 'dataLayer' ? '&l=' + l : ''; j.async = true; j.src =
          'https://www.googletagmanager.com/gtm.js?id=' + i + dl; f.parentNode.insertBefore(j, f);
    })(window, document, 'script', 'dataLayer', 'GTM-NVND638');</script>
  <!-- End Google Tag Manager -->


</head>

<body>
  <!-- Google Tag Manager (noscript) -->
  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NVND638" height="0" width="0"
      style="display:none;visibility:hidden"></iframe></noscript>
  <!-- End Google Tag Manager (noscript) -->

  <!-- <div class="header2">
			<div class="logo2"><img src="{% static 'images/logo2.png' %}" alt="logo2"></div>
		</div> -->

  {% for message in messages %}
  <script>
    alert('{{message}}')
  </script>
  {% endfor %}



  <div class="big_container2">
    <!-- <div class="heading2"><span>Intructions</span></div> -->
    <div class="header2">
      <div class="logo2"><img src="{% static 'images/logo.png' %}" alt="logo2"></div>
    </div>
    <div class="first2">
      <div class="head_content2">
        <span>Result of the Test</span>
      </div>

      <div class="ins-div">
        <div class="ins-div-2">
          <ul>
            <li class="instructions"><b>Total Attempted Questions:</b></li>
            <li class="instructions"><b>Total Correct Answers:</b></li>
            <li class="instructions"><b>Total Marks:</b></li>
            <li class="instructions"><b>Status:</b></li>
          </ul>
          <div style="margin-left: 10%;">
            <ul>
              <li class="instructions">{{attempted}}</li>
              <li class="instructions">{{correct}}</li>
              <li class="instructions">{{Marks}}% </li>
              <li class="instructions">
                <div style="color: red; display: inline-block" id="status">{{status}}<div>
              </li>
            </ul>
          </div>
        </div>
      </div>

      <!-- <div class="ques_time_div2"> -->
      <!-- <div class="ques-div2">
          <div class="ques-circle2"><div class="que-circle-num2">10 ques</div></div>
          <div class="text2">Total Questions</div>
        </div>

        <div class="time-div2">
          <div class="time-circle2"><div class="que-circle-num2">20 mins</div></div>
          <div class="text2">Total Time</div>
        </div>
      </div> -->
      <div style="padding: 41px 41px 0 41px; text-align: center;">
        <b class="bold" id="heading">Best of Luck for next time</b>
        <p style="font-size: 13px;" id="content">We would like to thank you for the time and effort you put in to
          complete the test. Unfortunately, you could not make it this time. You could turn up for our test after 1
          month as this is not the end of your journey with TutorChamps.</p>
        <b class="bold" id="fail">Thanks for applying!</b>
      </div>
      <div class="text-center psr mt-3">
        <!-- <input type="submit" class="formBtn theme-btn btn-style-one" value="Create A New Order Now">

        <a href="" class="theme-btn btn-style-one"><span class="txt">Go to Home</span></a> -->
        <button class="button" style="vertical-align:middle"><span><a href="/tutor/" id="url">Go To Home</a> </span></button>
      </div>


      <!-- </div> -->

    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
      var status = $("#status").text();
      var newStatus = status.trim();
      console.log(status);
      console.log(newStatus);
      if (newStatus == "Pass") {
        console.log("true");
        $("#heading").text("Congratulation, You nailed it")
        $("#content").text("Good things happen to those who hustle.You have successfully passed our test and joined the elite club of our TutorChamps. Please visit your Dashboard to solve questions or assignments and start earning today.")
        $("#fail").css('display','none');
        $("#url").text("Go To Dashboard");
        $("#url").prop('href','/tutor/dashboard/')

      }
      else{
        console.log("false");
      }
    </script>

</body>

</html>