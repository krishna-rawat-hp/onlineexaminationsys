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

function paperData(){
    var sessionlist = document.getElementById("sessionlist");
    var branchlist = document.getElementById("branchlist");
    var semesters = document.getElementById("semesters");
    var subjects = document.getElementById("subjects");
    var date = document.getElementById("date");
    var questioncount = document.getElementById("questioncount");
    var duration = document.getElementById("duration");
    var passcode = document.getElementById("passcode");

    var xmlhttp;
    if (window.XMLHttpRequest) {
        // code for modern browsers
        xmlhttp = new XMLHttpRequest();
    } else {
        // code for old IE browsers
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    } 
    
    var paper = {
        "sessionlist": sessionlist.value,
        "branchlist": branchlist.value,
        "semesters": semesters.value,
        "subjects": subjects.value,
        "date": date.value,
        "questioncount": questioncount.value,
        "duration": duration.value,
        "passcode": passcode.value
    };

    xmlhttp.onreadystatechange = function(){
        if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
            var value = xmlhttp.responseText.trim();
            if(value == "1"){
                window.location="design_paper.php"; 
            }else{
                window.location="paper_info.php";
            }
        }
    }
    
    xmlhttp.open("POST", "../scripts/paper_info.php");
    xmlhttp.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
    xmlhttp.send(JSON.stringify(paper));
}

function qidsListUpdate(id){
    if(id.checked == true){
        if(qids.length < max){
            qids.push(id.value);
        }else{
            id.checked = false;
            alert("Max question limit over.");
        }
        
        //add ques
    }else{
        pos = qids.indexOf(id.value, 0);
        if(pos >= 0){
            qids.splice(pos, 1);
        }
        //remove ques
    }
}

function savePaper(){
    if(qids.length == max){
    var xmlhttp;
    if (window.XMLHttpRequest) {
        // code for modern browsers
        xmlhttp = new XMLHttpRequest();
    } else {
        // code for old IE browsers
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    } 
    
    var paper = {
       "questions":qids
    };
    xmlhttp.onreadystatechange = function(){
        if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
            var value = xmlhttp.responseText.trim();
            if(value == "1"){
                alert("inserted successfully");
            }else{
                alert("unable to save try again later");
            }
        }
    }
    
    xmlhttp.open("POST", "../scripts/paper_add.php");
    xmlhttp.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
    xmlhttp.send(JSON.stringify(paper));
    }else{
        alert("please select "+max+" question");
    }
}

function viewQuestion(id){
    window.open("paper_question.php?pid="+id);
}