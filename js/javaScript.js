function modalOn(idName){
    document.getElementById(idName).style.display = 'block';
}

function modalCancel(idName){
    document.getElementById(idName).style.display = 'none';
}

function go(){
    if(document.getElementById("navOptions").className != "showing"){
        document.getElementById("navOptions").className = "showing";
        document.getElementById("menuIcon").className = "fa fa-bars fa-rotate-90";
    }
    else{
        document.getElementById("navOptions").className = "";
        document.getElementById("menuIcon").className = "fa fa-bars";
    }
}

function tabPick(idName, nod){
    var parentofSelected = nod.parentNode;
    var children = parentofSelected.childNodes;
    for(var i=0;i < children.length;i++){
        children[i].className = "";
    }
    nod.className = "selected";
   
    document.getElementById("published").style.display = "none";
    document.getElementById("underReview").style.display = "none";
    document.getElementById("returned").style.display = "none";
    
    document.getElementById(idName).style.display = "block";
}

function tabPick1(idName, nod){
    var parentofSelected = nod.parentNode;
    var children = parentofSelected.childNodes;
    for(var i=0;i < children.length;i++){
        children[i].className = "";
    }
    nod.className = "selected";
    
    document.getElementById("publish").style.display = "none";
    document.getElementById("forReview").style.display = "none";
    document.getElementById("promote").style.display = "none";
    document.getElementById("members").style.display = "none";
    document.getElementById("articles").style.display = "none";
   
    document.getElementById(idName).style.display = "block";
 
}

function tabPick2(idName, nod){
    var parentofSelected = nod.parentNode;
    var children = parentofSelected.childNodes;
    for(var i=0;i < children.length;i++){
        children[i].className = "";
    }
    nod.className = "selected";
    
    document.getElementById("review").style.display = "none";
    document.getElementById("corrections").style.display = "none";
    document.getElementById("finished").style.display = "none";
   
    document.getElementById(idName).style.display = "block";
 
}