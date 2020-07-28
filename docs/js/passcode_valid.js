function passcodeValid(id){    
    var passcode = document.getElementById("passcode");
    if(passcode.value == ""){
        alert("Must enter username.");
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
    
    var valid = {
        "paperid":id,
        "passcode": passcode.value,
    };

    xmlhttp.onreadystatechange = function(){
        if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
            var value = xmlhttp.responseText.trim();
            if(value == "1"){
               window.location="exam_conduct.php";
            }else{
                alert("invalid Passcode");
            }
            
        }
    }
    
    xmlhttp.open("POST", "../scripts/passcode_valid.php");
    xmlhttp.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
    xmlhttp.send(JSON.stringify(valid));
}
