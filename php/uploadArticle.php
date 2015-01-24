<?php
session_start();
if(isset($_FILES['file']['name']))
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

}
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