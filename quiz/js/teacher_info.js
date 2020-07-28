function saveStudentinfo(){
    var teachername = document.getElementById("teachername");
    var branchid = document.getElementById("branchlist");
    var password = document.getElementById("password");
    var conf_password = document.getElementById("c_pass");
    var contact_no = document.getElementById("contactno");
    if(teachername.value == "" || branchid == "" || contact_no == ""){
        alert("Must fill student details.");
        return;
    }

    if(password.value == ""){
        document.getElementById("message").innerHTML="** must enter password!!";
        return;
    }
    if(password.value != conf_password.value){
        document.getElementById("messages").innerHTML="** please enter same password!!";
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
    
    var techs = {
        "teachername": teachername.value,
        "branchid": branchid.value,
        "password": password.value,
        "contactno":contact_no.value
    };

    xmlhttp.onreadystatechange = function(){
        if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
            var value = xmlhttp.responseText.trim();
            if(value == "1"){
                alert("Save successfully");
                //window.location="student_info.php"
                teachername.value = "";
                branchid.value ="";
                password.value = "";
                contact_no.value = "";
            }else{
                alert("Unable to save teacher detail");
               // window.location="student_info.php"
               teachername.value = "";
                branchid.value ="";
                password.value = "";
                contact_no.value = "";
            }
        }
    }
    xmlhttp.open("POST", "../scripts/teacher_info.php");
    xmlhttp.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
    xmlhttp.send(JSON.stringify(techs));
}

function profileUpdate(name){     
    teachername = document.getElementById("tn"+ name);
    password = document.getElementById("pw"+ name);
    contactno = document.getElementById("cn"+ name);
    if(teachername == "" || password == "" || contactno == ""){
        alert("Must Fill all values");
        return;
    }

    var obj = {
        "teachername": teachername.value,
        "password": password.value,
        "contactno": contactno.value,
        "name": name
    };

    var xmlhttp;
    if (window.XMLHttpRequest) {
        // code for modern browsers
        xmlhttp = new XMLHttpRequest();
    } else {
        // code for old IE browsers
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    } 
    
    xmlhttp.onreadystatechange = function(){
        if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
            var value = xmlhttp.responseText.trim();
            if(value == "1"){
                alert("Updated successfully");
                window.location="teacher_profile_update.php"
            }else{
                alert("Unable to Update Profile.");
                window.location="teacher_profile_update.php"
            }
        }
    }
    xmlhttp.open("POST", "../scripts/teacher_profile_edit.php");
    xmlhttp.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
    xmlhttp.send(JSON.stringify(obj));
}

function profileUpdateHod(name){     
    HODname = document.getElementById("hn"+ name);
    password = document.getElementById("pw"+ name);
    contactno = document.getElementById("cn"+ name);
    if(HODname == "" || password == "" || contactno == ""){
        alert("Must Fill all values");
        return;
    }

    var obj = {
        "hodname": HODname.value,
        "password": password.value,
        "contactno": contactno.value,
        "name": name
    };

    var xmlhttp;
    if (window.XMLHttpRequest) {
        // code for modern browsers
        xmlhttp = new XMLHttpRequest();
    } else {
        // code for old IE browsers
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    } 
    
    xmlhttp.onreadystatechange = function(){
        if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
            var value = xmlhttp.responseText.trim();
            if(value == "1"){
                alert("Updated successfully");
                //window.location="hod_profile_update.php"
            }else{
                alert("Unable to Update Profile.");
                //window.location="hod_profile_update.php"
            }
        }
    }
    xmlhttp.open("POST", "../scripts/hod_profile_edit.php");
    xmlhttp.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
    xmlhttp.send(JSON.stringify(obj));
}
