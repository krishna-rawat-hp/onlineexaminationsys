function saveSession(){
    var name = document.getElementById("tn");
    var branch = document.getElementById("bb");
    var mobno = document.getElementById("pn");
    var password = document.getElementById("pp");
    var conf_pass = document.getElementById("cp");
    if(name.value == "" || branch.value == "" || mobno.value =="" || password.value == "" || conf_pass.value == ""){
        alert("Must fill values.");
        return;
    }
    if(password.length < 5 ){
        document.getElementById("msg").innerHTML="*** password length must be greater then 5 character"
    }
    var xmlhttp;
    if (window.XMLHttpRequest) {
        // code for modern browsers
        xmlhttp = new XMLHttpRequest();
    } else {
        // code for old IE browsers
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    } 
    
     var obj = {
         "tn": name.value,
         "bb": branch.value,
         "pn": mobno.value,
         "pp": password.value,
         "cp": conf_pass.value
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
    xmlhttp.open("POST", "../scripts/teachersAdd.php");
    xmlhttp.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
    xmlhttp.send(JSON.stringify(obj));
}