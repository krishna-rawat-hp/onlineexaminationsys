function saveStudentData(){
    var name = document.getElementById("sn");
    var fname = document.getElementById("fn");
    var branch = document.getElementById("sb");
    var medium = document.getElementById("sm");
    var semester = document.getElementById("ss");
    var phone_no = document.getElementById("pn");
    var password = document.getElementById("pp");
    if(name.value == "" || fname.value == "" || branch.value =="" || medium.value == "" || semester.value == "" || phone_no.value == "" || password.value == ""){
        alert("Must fill values.");
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
    
     var std = {
         "sn": name.value,
         "fn": fname.value,
         "sb": branch.value,
         "sm": medium.value,
         "ss": semester.value,
         "pn": phone_no.value,
         "pp": password.value
     };

    xmlhttp.onreadystatechange = function(){
        if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
            var value = xmlhttp.responseText.trim();
            if(value == "1"){
                alert("Save successfully");
            }else{
                alert("Unable to save session");
            }
        }
    }
    xmlhttp.open("POST", "../scripts/student_add.php");
    xmlhttp.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
    xmlhttp.send(JSON.stringify(std));
}