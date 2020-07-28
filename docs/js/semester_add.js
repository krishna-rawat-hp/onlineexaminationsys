function saveSemester(){
    bname = document.getElementById("bid");
    var semname = document.getElementById("semname");
    if(semname.value == ""){
        alert("Must enter semester name.");
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
    
    var sem = {
        "semname": semname.value,
        "bid": bname.value
    };

    xmlhttp.onreadystatechange = function(){
        if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
            var value = xmlhttp.responseText.trim();
            if(value == "1"){
                alert("Save successfully");
                semname.value ="";
            }else{
                alert("Unable to save session");
                semname.value ="";
            }
        }
    }
    xmlhttp.open("POST", "../scripts/semester_add.php");
    xmlhttp.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
    xmlhttp.send(JSON.stringify(sem));
}

function semesterDelete(id){
    sname = document.getElementById("s_"+id);
    var obj = {
        "semestername" : sname,
        "semesterid" : id
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
            alert("deleted successfully");
             sname.value = "";
        }
    }
    xmlhttp.open("POST", "../scripts/semester_delete.php");
    xmlhttp.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
    xmlhttp.send(JSON.stringify(obj));
}