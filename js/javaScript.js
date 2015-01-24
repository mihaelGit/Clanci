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