function login(){
  var login_packet = {
    username : $("#login .username").val(),
    password : $("#login .password").val()
  };
  var xhr = new XMLHttpRequest({mozSystem:true});
  xhr.open("POST", "http://localhost/annonetwork/backend/signin.php", false);
  xhr.send(JSON.stringify(login_packet));
  if(xhr.responseText == "true"){
   console.log("Login successful, redirecting to home.html");
    localStorage.setItem("username", $("#signup .username").val());
   console.log('hey'+localStorage.getItem('username'));
    window.location = "home.html";
  }
  else{
    console.log("Login unsuccessful, show the message");
    $('#login').append("Login not successful, Please try again.");
  }
}

function signup(){

   var signup_packet = {
    username : $("#signup .username").val(),
    password : $("#signup .password").val()
  };

  var xhr = new XMLHttpRequest({mozSystem:true});
  xhr.open("POST", "http://localhost/annonetwork/backend/register.php", false);
  xhr.send(JSON.stringify(signup_packet));

 if(xhr.responseText == "true"){
   console.log("Sign up successful, redirecting to home.html");
   localStorage.setItem("username", $("#signup .username").val());
   console.log('hey'+localStorage.getItem('username'));
   window.location = "home.html";
  }
  else{
    console.log("Login unsuccessful, show the message");
    $('#signup').append("Username already exists");
  }
}

function addTag(){
  console.log("Tag added");
  var value;
  if(value = $('#channels').val()){
    tags.push({"name":value});
    $("#tagRow").append(value+' ');
    $('#channels').val("");
  }

}

function postQue(){
 var que_json = {
    username : "check",//localStorage.getItem("username"),
    quesstat : $('#question').val(),
  }

  que_json['tags'] = tags;
  $('#question').val("");
  $('#tagRow').append("<br><br>Question has been posted. Thank you!");

  console.log(JSON.stringify(que_json));

  var xhr = new XMLHttpRequest({mozSystem:true});
  xhr.open("POST", "http://localhost/annonetwork/backend/insert.php", false);
  xhr.send(JSON.stringify(que_json));
}
