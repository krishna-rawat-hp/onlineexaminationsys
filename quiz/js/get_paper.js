function getPaper(id){
    var xmlhttp;
    if (window.XMLHttpRequest) {
        // code for modern browsers
        xmlhttp = new XMLHttpRequest();
    } else {
        // code for old IE browsers
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    } 
    
    var id = {
        "paperid":id
    };

    xmlhttp.onreadystatechange = function(){
        if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
            paper = JSON.parse(xmlhttp.responseText.trim());
            if(paper['questions'].length > 0){
                max = paper['questions'].length - 1;
                c = 0;
                document.getElementById("questno").innerHTML = c+1;
                document.getElementById("question").value = paper['questions'][c]['question'];
                document.getElementById("opt1").value = paper['questions'][c]['a'];
                document.getElementById("opt2").value = paper['questions'][c]['b'];
                document.getElementById("opt3").value = paper['questions'][c]['c'];
                document.getElementById("opt4").value = paper['questions'][c]['d'];
                answer = new Array(max+1);
                for (let index = 0; index < answer.length; index++) {
                    answer[index] = -1;
                }
                answerView();
                timer_handler = setInterval(examTimer, 1000);
            }else{
                alert("No questions found in paper!!");
            }
            
            //console.log(paper);
            //console.log(); 
            // document.write(paper.questions[0].a);
        }
    }
    
    xmlhttp.open("POST", "../scripts/get_paper.php");
    xmlhttp.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
    xmlhttp.send(JSON.stringify(id));
}

function prevQuestion(){
    if(c >= 1){
        c--;
        document.getElementById("questno").innerHTML = c+1;
        document.getElementById("question").value = paper['questions'][c]['question'];
        document.getElementById("opt1").value = paper['questions'][c]['a'];
        document.getElementById("opt2").value = paper['questions'][c]['b'];
        document.getElementById("opt3").value = paper['questions'][c]['c'];
        document.getElementById("opt4").value = paper['questions'][c]['d'];
        answerView();
    }else{
        alert("No question to show.");
    }
}

function nextQuestion(){
    if(c < max){
        c++;
        document.getElementById("questno").innerHTML = c+1;
        document.getElementById("question").value = paper['questions'][c]['question'];
        document.getElementById("opt1").value = paper['questions'][c]['a'];
        document.getElementById("opt2").value = paper['questions'][c]['b'];
        document.getElementById("opt3").value = paper['questions'][c]['c'];
        document.getElementById("opt4").value = paper['questions'][c]['d'];
        answerView();
    }else{
        alert("No question remaining.");
    }
}

function saveAnswer(){
    if(document.getElementById("a").checked == true){
        answer[c] = "a";
    }else if(document.getElementById("b").checked == true){
        answer[c] = "b";
    }else if(document.getElementById("c").checked == true){
        answer[c] = "c";
    }else if(document.getElementById("d").checked == true){
        answer[c] = "d";
    }else{
            alert("must select answer");
    }
}

function answerView(){
    if(answer[c] == -1){
        document.getElementById("a").checked = false;
        document.getElementById("b").checked = false;
        document.getElementById("c").checked = false;
        document.getElementById("d").checked = false;
    }else{
        if(answer[c] == "a"){
            document.getElementById("a").checked = true;
            document.getElementById("b").checked = false;
            document.getElementById("c").checked = false;
            document.getElementById("d").checked = false;
        }else if(answer[c] == "b"){
            document.getElementById("a").checked = false;
            document.getElementById("b").checked = true;
            document.getElementById("c").checked = false;
            document.getElementById("d").checked = false;
        }else if(answer[c] == "c"){
            document.getElementById("a").checked = false;
            document.getElementById("b").checked = false;
            document.getElementById("c").checked = true;
            document.getElementById("d").checked = false;
        }else if(answer[c] == "d"){
            document.getElementById("a").checked = false;
            document.getElementById("b").checked = false;
            document.getElementById("c").checked = false;
            document.getElementById("d").checked = true;
        }else{
            document.getElementById("a").checked = false;
            document.getElementById("b").checked = false;
            document.getElementById("c").checked = false;
            document.getElementById("d").checked = false;
        }
    }
}
function examTimer(){
    if(timer == 0){
        clearInterval(timer_handler);
        submitPaper();
    }else{
        timer--;
        temp_timer = timer;
        hour = parseInt(temp_timer / 3600);
        temp_timer = parseInt(temp_timer % 3600);
        min = parseInt(temp_timer / 60);
        sec = parseInt(temp_timer % 60);
        document.getElementById('tmr').innerHTML = hour + " : "+ min + " : " + sec;
    }
}

function submitPaper(){
    var paperid = document.getElementById("paperid");
    var xmlhttp;
    if (window.XMLHttpRequest) {
        // code for modern browsers
        xmlhttp = new XMLHttpRequest();
    } else {
        // code for old IE browsers
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    } 
    
    var paper = {
       "paperid" : paperid.value,
       "answer" : answer
    };
    xmlhttp.onreadystatechange = function(){
        if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
            var value = xmlhttp.responseText.trim();
            if(value == 1){
                alert("paper Save Successfully");
                window.open("result_show.php?pid="+paperid.value,"_self");
            }else if(value == 0){
                alert("unable to save try again!!");
            }else{
                alert("some error occur try again later");
            }
        }
    }
    
    xmlhttp.open("POST", "../scripts/save_paper.php");
    xmlhttp.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
    xmlhttp.send(JSON.stringify(paper));
}


