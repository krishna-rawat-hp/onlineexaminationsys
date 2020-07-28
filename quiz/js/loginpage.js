function loginData(){    //function defined for save branch
    var username = document.getElementById("username");
    var password = document.getElementById("password");
    var logintype = document.getElementById("logintype");
    if(username.value == ""){
        alert("Must enter username.");
        return;
    }
    if(password.value == ""){
        alert("Must enter password.");
        return;
    }
    if(logintype.value == "-1"){
        alert("Must Select Login Type.");
        return;
    }
    var xmlhttp;
    if (window.XMLHttpRequest) {
        // code for modern browsers
        xmlhttp = new XMLHttpRequest();
    } else {
        // code for old IE browsers
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    } 
    
    var login = {
        "username": username.value,
        "password": password.value,
        "logintype": logintype.value
    };

    xmlhttp.onreadystatechange = function(){
        if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
            var value = xmlhttp.responseText.trim();
            if(value == "1"){
               window.location="homepage_faculty.php";
            }else if(value == "2"){
                window.location="homepage_hod.php";
            }else if(value == "3"){
                window.location="homepage_student.php";
            }else{
                alert("invalid Username Password");
            }
            
        }
    }
    
    xmlhttp.open("POST", "../scripts/doLogin.php");
    xmlhttp.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
    xmlhttp.send(JSON.stringify(login));
}

var elem = document.documentElement;
function openFullscreen() {
  if (elem.requestFullscreen) {
    elem.requestFullscreen();
  } else if (elem.mozRequestFullScreen) { /* Firefox */
    elem.mozRequestFullScreen();
  } else if (elem.webkitRequestFullscreen) { /* Chrome, Safari & Opera */
    elem.webkitRequestFullscreen();
  } else if (elem.msRequestFullscreen) { /* IE/Edge */
    elem.msRequestFullscreen();
  }
}
