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

function saveSubject(){
    var semid = document.getElementById("semesters");
    var subname = document.getElementById("subjectname");
    if(subname.value == ""){
        alert("Must enter subject name.");
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
    
    var subj = {
        "semesterid": semid.value,
        "subjectname": subname.value
    };

    xmlhttp.onreadystatechange = function(){
        if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
            var value = xmlhttp.responseText.trim();
            if(value == "1"){
                alert("Save successfully");
                subname.value="";
            }else{
                alert("Unable to save subject");
                subname.value="";
            }
        }
    }
    xmlhttp.open("POST", "../scripts/subject_add.php");
    xmlhttp.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
    xmlhttp.send(JSON.stringify(subj));
}

function subjectEdit(id){
    var subname = document.getElementById("t_"+id);
    if(subname.value == ""){
        alert("Must enter subject name.");
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
    
    var subj = {
        "subjectid": id,
        "subjectname": subname.value
    };

    xmlhttp.onreadystatechange = function(){
        if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
            var value = xmlhttp.responseText.trim();
            if(value == "1"){
                alert("Save successfully");
                subname.value = "";
            }else{
                alert("Unable to save subject");
                subname.value = "";
            }
        }
    }
    xmlhttp.open("POST", "../scripts/subject_edit.php");
    xmlhttp.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
    xmlhttp.send(JSON.stringify(subj));
}


