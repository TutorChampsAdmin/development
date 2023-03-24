<!DOCTYPE html>
{% load static %}
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <script src="https://unpkg.com/phosphor-icons"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@400;500;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{% static 'css/styles-tutor-register-new.css' %}">
  <title>Tutor</title>
</head>
<body>
  <div class="navbar">
    <img class="logo" src="{% static 'images/assets-tutor-register/logo.png' %}">
  </div>

  <div class="landing-grid">
    <div class="landing-left">
      <p class="heading">Benefits of Becoming Tutors with <span class="green">TutorChamps</span></p>
      <ul class="benefits">
        <li><i class="ph-arrow-right"></i>Share your expertise across the globe.</li>
        <li><i class="ph-arrow-right"></i>Earn money by sharing your knowledge on a daily basis.</li>
        <li><i class="ph-arrow-right"></i>Increase your knowledge by practicing and solving a variety of questions.</li>
        <li><i class="ph-arrow-right"></i>Earn and Learn everywhere/everytime.</li>
        <li><i class="ph-arrow-right"></i>Join 3000+ Tutors team.</li>
      </ul>
    </div>
    <div class="landing-right">
      <center>
        <form name="RegForm" method="post">
          {% csrf_token %}
          <center>
            {% for message in messages %}
              <p>{{message}}</p>
            {% endfor %}
            <p class="form-heading">Register Here</p>
            <p class="form-body">You just need to share your basic info to start the process to be a <span class="green">Tutor</span><span class="yellow">Champ</span></p>
            <div class="form-grid">
              <div class="name-input">
                <label for="name">Enter your Name</label><br>
                <input type="text" id="name" name="name" required>
              </div>
              <div class="phone-input">
                <label for="phone">Enter your Phone No.</label><br>
                <input type="tel" id="phone" name="phone"  required>
              </div>
              <div class="email-input">
                <label for="mail">Enter your Email</label><br>
                <input id="email" required name="email" type="email">
              </div>
              <div class="email-confirm-input">
                <label for="mail-confirm">Confirm your Email</label><br>
                <input required name="email2" type="email" id="confemail" onblur="confirmEmail()">
              </div>
              <div class="qualification-input">
                <label for="qualification">Qualification Level</label>
                <select name="level" id="qualification" required>
                  <option value="" disabled selected>Select your option</option>
                  <option value="Undergraduate">Undergraduate</option>
                  <option value="Graduate">Graduate</option>
                  <option value="Postgraduate">Postgraduate </option>
                  <option value="PhD">PhD</option>
                </select>
              </div>
              <div class="subject-input">
                <label for="subject">Select Subject</label>
                <select name="subject" id="subject" required>
                  <option value="" disabled selected>Select your option</option>
                  <option value="Essay Writing">Essay Writing</option>
                  <option value="Physics">Physics</option>
                  <option value="Chemistry">Chemistry </option>
                  <option value="Maths">Maths</option>
                  <option value="Finance">Finance</option>
                  <option value="Biology">Biology </option>
                  <option value="Civil Engineering">Civil Engineering </option>
                  <option value="Computer Science">Computer Science Engineering</option>
                  <option value="Mechanical">Mechanical Engineering </option>
                  <option value="Electrical">Electrical Engineering </option>
                  <option value="Chemical Engineering">Chemical Engineering </option>
                  <option value="Accounting">Accounting</option>
                  <option value="Economics">Economics</option>
                  <option value="Management">Management</option>
                  <option value="Nursing">Nursing</option>
                </select>
              </div>
            </div>
            <button type="submit" class="button button-form">Submit<span class="arrow"></span></button></a>
            <p class="term">*We are currently onboarding tutors from India only!</p>
          </center>
        </form>
      </center>
    </div>
    <img class="green-decoration" src="{% static 'images/assets-tutor-register/pattern-18.png' %}" width="100%">
    <img class="yellow-decoration" src="{% static 'images/assets-tutor-register/pattern-1.png' %}" width="100%">
  </div>

  <script>
    function confirmEmail() {
      var email = document.getElementById("email").value;
      var confemail = document.getElementById("confemail").value;
      if (email != confemail) {
        alert("Emails do not match.");
      }
    }
  </script>

</body>
</html>