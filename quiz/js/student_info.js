function addSemester(semElement, semid, semname){
    var semester = document.getElementById(semElement);
    var option = document.createElement("option");
    option.value = semid;
    option.text = semname;
    semester.add(option); 
}

function clearSemesters(semElement){
    var select = document.getElementById(semElement);
    var length = select.options.length;
    for (i = length; i>=0; i--) {
        select.remove(i);
    }
}
function populateSemester(){
    branch = document.getElementById("branchlist");
    if(branch.value != "-1"){
        var xmlhttp;
        if (window.XMLHttpRequest) {
            // code for modern browsers
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for old IE browsers
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        } 
        
        var sub = {
            "branchid": branch.value
        };

        xmlhttp.onreadystatechange = function(){
            if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
                var semArray = JSON.parse(xmlhttp.responseText.trim());
                clearSemesters("semesters");
                addSemester("semesters", "-1", "Select Semester");
                for (let i = 0; i < semArray.length; i++) {
                    addSemester("semesters", semArray[i].semesterid, semArray[i].semestername);
                }
            }
        }
        xmlhttp.open("POST", "../scripts/get_semester.php");
        xmlhttp.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
        xmlhttp.send(JSON.stringify(sub));
    }else{
        clearSemesters("semesters");
        alert("please select any branch");
    }
}

function addSemester(semElement, semid, semname){
    var semester = document.getElementById(semElement);
    var option = document.createElement("option");
    option.value = semid;
    option.text = semname;
    semester.add(option); 
}

function clearSemesters(semElement){
    var select = document.getElementById(semElement);
    var length = select.options.length;
    for (i = length; i>=0; i--) {
        select.remove(i);
    }
}
function fetchSemester(){
    branch = document.getElementById("branchdrop");
    if(branch.value != "-1"){
        var xmlhttp;
        if (window.XMLHttpRequest) {
            // code for modern browsers
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for old IE browsers
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        } 
        
        var sub = {
            "branchid": branch.value
        };

        xmlhttp.onreadystatechange = function(){
            if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
                var semArray = JSON.parse(xmlhttp.responseText.trim());
                clearSemesters("semester");
                addSemester("semester", "-1", "Select Semester");
                for (let i = 0; i < semArray.length; i++) {
                    addSemester("semester", semArray[i].semesterid, semArray[i].semestername);
                }
            }
        }
        xmlhttp.open("POST", "../scripts/get_semester.php");
        xmlhttp.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
        xmlhttp.send(JSON.stringify(sub));
    }else{
        clearSemesters("semester");
        alert("please select any branch");
    }
}

function saveStudentinfo(){
    var rollno = document.getElementById("rollno").value;
    var sname = document.getElementById("sname").value;
    var fname = document.getElementById("fname").value;
    var branchid = document.getElementById("branchlist").value;
    var semid = document.getElementById("semesters").value;
    var sessionid = document.getElementById("sessionlist").value;
    var adm_bid = document.getElementById("branchdrop").value;
    var adm_semid = document.getElementById("semester").value;
    var adm_sessionid = document.getElementById("sessionlist").value;
    var password = document.getElementById("password").value;
    var conf_password = document.getElementById("c_pass").value;
    var contact_no = document.getElementById("contactno").value;
    if(rollno.value == "" || sname == "" || fname == "" || branchid == "" || semid == "" || sessionid == "" || adm_bid == "" || adm_semid == "" || adm_sessionid == "" || contact_no == ""){
        alert("Must fill student details.");
        return;
    }

    if(password == ""){
        document.getElementById("message").innerHTML="** must enter password!!";
    }
    if(password != conf_password){
        document.getElementById("messages").innerHTML="** please enter same password!!";
    }
    var xmlhttp;
    if (window.XMLHttpRequest) {
        // code for modern browsers
        xmlhttp = new XMLHttpRequest();
    } else {
        // code for old IE browsers
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    } 
    
    var subj = {
        "rollno": rollno,
        "sname": sname,
        "fname": fname,
        "branchid": branchid,
        "semesterid": semid,
        "sessionid": sessionid,
        "adm_bid": adm_bid,
        "adm_semid": adm_semid,
        "adm_sessionid": adm_sessionid,
        "password": password,
        "contactno":contact_no
    };

    xmlhttp.onreadystatechange = function(){
        if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
            var value = xmlhttp.responseText.trim();
            if(value == "1"){
                alert("Save successfully");
                //window.location="student_info.php"
                rollno.value = "";
                sname.value = "";
                fname.value = "";
                branchid.value = "";
                semid.value = "";
                sessionid.value = "";
                adm_bid.value = "";
                adm_semid.value = "";
                adm_sessionid.value = "";
                password.value = "";
                contact_no.value = "";
            }else{
                alert("Unable to save Student");
               // window.location="student_info.php"
               rollno.value = "";
                sname.value = "";
                fname.value = "";
                branchid.value = "";
                semid.value = "";
                sessionid.value = "";
                adm_bid.value = "";
                adm_semid.value = "";
                adm_sessionid.value = "";
                password.value = "";
                contact_no.value = "";
            }
        }
    }
    xmlhttp.open("POST", "../scripts/student_info.php");
    xmlhttp.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
    xmlhttp.send(JSON.stringify(subj));
}

function profileUpdate(id){     
    rollno = document.getElementById("rn"+ id);
    studentname = document.getElementById("sn"+ id);
    fathername = document.getElementById("fn"+ id);
    password = document.getElementById("pw"+ id);
    contactno = document.getElementById("cn"+ id);
    if(rollno.value == "" || studentname == "" || fathername == "" || password == "" || contactno == ""){
        alert("Must Fill all values");
        return;
    }

    var obj = {
        "rollno": rollno.value,
        "studentname": studentname.value,
        "fathername": fathername.value,
        "password": password.value,
        "contactno": contactno.value,
        "id": id
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
                window.location="student_profile_update.php"
            }else{
                alert("Unable to update Profile.");
                window.location="student_profile_update.php"
            }
        }
    }
    xmlhttp.open("POST", "../scripts/student_profile_edit.php");
    xmlhttp.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
    xmlhttp.send(JSON.stringify(obj));
}



