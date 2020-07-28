function saveBranch(){    //function defined for save branch
    var branchname = document.getElementById("branchname");
    if(branchname.value == ""){
        alert("Must enter branch name.");
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
    
    var brch = {
        "branchname": branchname.value
    };

    xmlhttp.onreadystatechange = function(){
        if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
            var value = xmlhttp.responseText.trim();
            if(value == "1"){
                alert("Save successfully");
                branchname.value ="";
            }else{
                alert("Unable to save session");
                branchname.value ="";
            }
        }
    }
    xmlhttp.open("POST", "../scripts/branch_add.php");
    xmlhttp.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
    xmlhttp.send(JSON.stringify(brch));
}

function branchEdit(id){        //function for edit the branch
    bname = document.getElementById("t_"+ id);
    if(bname.value == ""){
        alert("Must Enter Branch Name");
        return;
    }

    var obj = {
        "branchname": bname.value,
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
                alert("Edited successfully");
                bname.value ="";
            }else{
                alert("Unable to edit branch.");
                bname.value ="";
            }
        }
    }
    xmlhttp.open("POST", "../scripts/branch_edit.php");
    xmlhttp.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
    xmlhttp.send(JSON.stringify(obj));
}