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

function saveQuestion(){
    var subid = document.getElementById("subjects");
    var questionname = document.getElementById("question");
    var option1 = document.getElementById("txt1");
    var option2 = document.getElementById("txt2");
    var option3 = document.getElementById("txt3");
    var option4 = document.getElementById("txt4");
    var options = document.getElementsByName('option');
    var selected = "";
    for(var i = 0; i < options.length; i++){
        if (options[i].checked) {
            console.log(options[i].value);
            selected=options[i].value;
            
          }
    }
    if(selected == ""){
        alert("Must select correct answer.");
        return;
    }
    if(question.value == "" || option1.value == "" || option2.value == "" || option3.value == "" || option4.value == "" || options.value == ""){
        alert("Must fill all entry and select the option.");
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
    
    var ques = {
        "subjectid": subid.value,
        "question": questionname.value,
        "option1": option1.value,
        "option2": option2.value,
        "option3": option3.value,
        "option4": option4.value,
        "answer": selected
    };

    xmlhttp.onreadystatechange = function(){
        if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
            var value = xmlhttp.responseText.trim();
            if(value == "0"){
                alert("Unable to Save Question");
                questionname.value="";
                option1.value="";
                option2.value="";
                option3.value="";
                option4.value="";
                selected.value="";
            }else{
                alert("Save Successfully");
                questionname.value="";
                option1.value="";
                option2.value="";
                option3.value="";
                option4.value="";
                selected.value="";
            }
        }
    }
    xmlhttp.open("POST", "../scripts/question_add.php");
    xmlhttp.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
    xmlhttp.send(JSON.stringify(ques));
}

function questionEdit(id, branchid, semesterid, subjectid){
    window.open("questions_edit2.php?qid="+id+"&bid=" + branchid+"&sid="+semesterid+"&subid="+subjectid+"_self");
}

function questionView(id, branchid, semesterid, subjectid){
    window.open("question_view2.php?qid="+id+"&bid=" + branchid+"&sid="+semesterid+"&subid="+subjectid+"_self");
}

function Editquestion(id, bid, sid, subid){
    var questionname = document.getElementById("quest"+id);
    var option1 = document.getElementById("opt1"+id);
    var option2 = document.getElementById("opt2"+id);
    var option3 = document.getElementById("opt3"+id);
    var option4 = document.getElementById("opt4"+id);
    var options = document.getElementsByName('option');
    var selected = "";
    for(var i = 0; i < options.length; i++){
        if (options[i].checked) {
            console.log(options[i].value);
            selected=options[i].value;
            
          }
    }
    if(selected == ""){
        alert("Must select correct answer.");
        return;
    }
    if(questionname.value == "" || option1.value == "" || option2.value == "" || option3.value == "" || option4.value == "" || options.value == ""){
        alert("Must fill all entry and select the option.");
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
    
    var ques = {
        "questionid": id,
        "question": questionname.value,
        "option1": option1.value,
        "option2": option2.value,
        "option3": option3.value,
        "option4": option4.value,
        "answer": selected
    };

    xmlhttp.onreadystatechange = function(){
        if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
            var value = xmlhttp.responseText.trim();
            if(value == "0"){
                alert("Unable to Save Question");
            }else{
                alert("Save Successfully");
            }
        }
    }
    xmlhttp.open("POST", "../scripts/question_edit.php");
    xmlhttp.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
    xmlhttp.send(JSON.stringify(ques));
}

