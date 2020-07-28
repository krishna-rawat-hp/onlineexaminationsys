function saveSession(){    //function defined for save branch
    var sessionname = document.getElementById("sessionname");
    if(sessionname.value == ""){
        alert("Must Enter Session Name.");
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
    
    var obj = {
        "sessionname": sessionname.value
    };

    xmlhttp.onreadystatechange = function(){
        if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
            var value = xmlhttp.responseText.trim();
            if(value == "1"){
                alert("Save successfully");
                sessionname.value = "";
            }else{
                alert("Unable to save session");
                sessionname.value = "";
            }
        }
    }
    xmlhttp.open("POST", "../scripts/session_add.php");
    xmlhttp.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
    xmlhttp.send(JSON.stringify(obj));
}

function sessionEdit(id){        //function for edit the branch
    sname = document.getElementById("t_"+ id);
    if(sname.value == ""){
        alert("Must Enter Session Name");
        return;
    }

    var obj = {
        "sessionname": sname.value,
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
                alert("Edited Successfully");
                sname.value = "";
            }else{
                alert("Unable to Edit Session.");
                sname.value = "";
            }
        }
    }
    xmlhttp.open("POST", "../scripts/session_edit.php");
    xmlhttp.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
    xmlhttp.send(JSON.stringify(obj));
}