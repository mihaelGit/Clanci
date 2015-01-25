<?php
session_start();
if($_POST){
    
    /************************************************/
    /* Sesija za povrat informacija prilikom greske */
    /************************************************/
    $_SESSION["SubmitArticleData"] = array(
    "title" => $_POST["title"],
    "summary" => $_POST["summary"],
    "category" => $_POST["category"],
    );
    
    
    
    foreach($_SESSION["SubmitArticleData"] as $info){
        if(empty($info)){
            $_SESSION["SubmitArticleError"]["empty"] = "Please fill all fields!";
            header("Location: ".$_SERVER['HTTP_REFERER']);exit;
            exit;
        }
    }
    
    $titleREG = '/^[A-Za-z0-9\-\ \'\"\.]{1,50}$/';
    $summaryREG = '/^[A-Za-z0-9\-\ \'\"\.\(\)\!\?\*\+\/\\\]{20,}$/';
    $categoryREG = '/^[0-9]{1,}$/';
    
    if(preg_match($titleREG, $_SESSION["SubmitArticleData"]["title"])){
        echo 'title ok<br/>';
    }else{
        $_SESSION["SubmitArticleError"]["title"] = "Title error!";
        header("Location: ".$_SERVER['HTTP_REFERER']);exit;
    }
    if(preg_match($summaryREG, $_SESSION["SubmitArticleData"]["summary"])){
        echo 'summary ok<br/>';
    }/*else{
        header("Location: ".$_SERVER['HTTP_REFERER']);exit;
    }*/
    if(preg_match($categoryREG, $_SESSION["SubmitArticleData"]["category"])){
        echo 'category ok<br/>';
    }/*else{
        header("Location: ".$_SERVER['HTTP_REFERER']);exit;
    }*/
}
/*if(isset($_FILES['file']['name']))
{
    
    $name=$_FILES['file']['name'];
    $tmpn=$_FILES['file']['tmp_name'];
    
    if(!empty($name) && !empty($tmpn)){
	if(!file_exists('../articles/'.$name)){
            if(move_uploaded_file($tmpn,'../articles/'.$name)){
                            echo "Horray";
			}		
		}
    }

}*/
else{
    echo 'Whoops';
}
/*	$name=$_FILES['file']['name'];
	$tmpn=$_FILES['file']['tmp_name'];
	
	if(!empty($name) && !empty($tmpn))
	{
		if(!file_exists('files/'.$name))
		{
			if(move_uploaded_file($tmpn,'files/'.$name))
			{
			
			$_SESSION['upload']='Uploaded: '.$name.'.';
			}		
		}
	}
}

header("Location: ".$_SERVER['HTTP_REFERER']);
*/