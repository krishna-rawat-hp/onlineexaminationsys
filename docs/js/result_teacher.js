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

function addSubjects(subElement, subid, subname){
    var subject = document.getElementById(subElement);
    var option = document.createElement("option");
    option.value = subid;
    option.text = subname;
    subject.add(option); 
}

function clearSubjects(subElement){
    var select = document.getElementById(subElement);
    var length = select.options.length;
    for (i = length; i>=0; i--) {
        select.remove(i);
    }
}

function populateSubjects(){
    semester = document.getElementById("semesters");
    if(semesters.value != "-1"){
        var xmlhttp;
        if (window.XMLHttpRequest) {
            // code for modern browsers
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for old IE browsers
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        } 
        
        var sub = {
            "semesterid": semester.value
        };

        xmlhttp.onreadystatechange = function(){
            if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
                var subArray = JSON.parse(xmlhttp.responseText.trim());
                clearSubjects("subjects");
                addSubjects("subjects", "-1", "Select Subject");
                for (let i = 0; i < subArray.length; i++) {
                    addSubjects("subjects", subArray[i].subjectid, subArray[i].subjectname);
                }
            }
        }
        xmlhttp.open("POST", "../scripts/get_subject.php");
        xmlhttp.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
        xmlhttp.send(JSON.stringify(sub));
    }else{
        clearSemesters("subjects");
        alert("please select any semester");
    }
}

function viewFullResult(id){
    window.open("result_view_teacher1.php?pid="+id,"_self");
}