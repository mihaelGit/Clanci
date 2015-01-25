<?php
/****************************************************************/
/* Skripta za prijavu clanka i provjeru unesenih podataka. 
   Ako nesto nije u redu vraca se na prethodnu stranicu s
   upozorenjima, a inace, sprema se clanak u bazu.
   Podaci dolaze s options.php >include> modalSubmitArticle.php */
/****************************************************************/
session_start();
if($_POST){
    /************************************/
    /* Reset prijasnjih podataka sesije */
    /************************************/
    unset($_SESSION["SubmitArticleError"]);
    unset($_SESSION["SubmitArticleData"]);
    
    /************************************************/
    /* Sesija za povrat informacija prilikom greske */
    /************************************************/
    $_SESSION["SubmitArticleData"] = array(
        "title" => $_POST["title"],
        "summary" => $_POST["summary"],
        "category" => $_POST["category"],
        "file" => $_FILES['file']['name']
    );

    /*****************************************/
    /* Pregled da li su popunjeni svi podaci 
       ako ne dodaje se poruka za ispravak   */
    /*****************************************/
    foreach($_SESSION["SubmitArticleData"] as $info){
        if(empty($info)){
            $_SESSION["SubmitArticleError"]["empty"] = "Please fill all fields!";
        }
    }
    
    /***************************************/
    /* REGEX za provjeru ispravnosti unosa */   
    /***************************************/
    $titleREG = '/^[A-Za-z0-9\-\ \'\"\.]{1,150}$/'; // Title: alfanumeric whitespace - ' " . {1 do 150 znakova}
    $summaryREG = '/^[A-Za-z0-9\-\ \'\"\.\(\)\!\?\*\+\/\\\]{20,}$/'; // Summary: alfanumeric whitespace - ' " . ! ? * / \ {20 znakova min} 
    $categoryREG = '/^[0-9]{1,}$/'; // Category: numeric (vec zadano pa je tesko sjebat)
    $fileREG = '/\.pdf$/'; // File: file mora zavrsavat na .pdf
    
    /****************************************/
    /* Provjera da li su unos i regex match 
       Ako ne dodaje se poruka za ispravak  */
    /****************************************/
    if(!preg_match($titleREG, $_SESSION["SubmitArticleData"]["title"])){
        $_SESSION["SubmitArticleError"]["title"] = "Only alpha numeric \" ' - . characters allowed!";
    }
    if(!preg_match($summaryREG, $_SESSION["SubmitArticleData"]["summary"])){
        $_SESSION["SubmitArticleError"]["summary"] = "Min 20 characters!";
    }
    if(!preg_match($categoryREG, $_SESSION["SubmitArticleData"]["category"])){
        $_SESSION["SubmitArticleError"]["category"] = "Category not selected!";
    }
    if(!preg_match($fileREG, $_SESSION["SubmitArticleData"]["file"])){
        $_SESSION["SubmitArticleError"]["file"] = "Only .pdf allowed!";
    }
    
    /******************************/
    /* Ako postoje greske redirect 
       na prethodnu stranicu s 
       hintovima za ispravak      */
    /******************************/
    if(isset($_SESSION["SubmitArticleError"])){
        header("Location: ".$_SERVER['HTTP_REFERER']);exit;
    }
    /**************************************/
    /* Ako nema greske datoteka se pokusa 
       uplodat i dodaje se zapis u bazu,
       ako nesto podje po zlu dati 
       korisniku do znanja                */
    /**************************************/
    else{             
        $tmpn=$_FILES['file']['tmp_name'];
        if(!empty($_SESSION["SubmitArticleData"]["file"]) && !empty($tmpn)){ // provjera postoje li podaci o uplodanim fajlovima
            
            if(!file_exists('../articles/'.$_SESSION["SubmitArticleData"]["file"])){ // provjera postoji li već isti file na serveru
                
                if(move_uploaded_file($tmpn,'../articles/'.$_SESSION["SubmitArticleData"]["file"])){ // spremanje filea na server
                    require_once 'class/db.php';                                                       
                    require_once 'class/article.php';
                    $db = new db();
                    $article = new article($db->conn);
                    
                    if($article->submitArticle($_SESSION["user"]["id"], 
                            $_SESSION["SubmitArticleData"]["category"],
                            $_SESSION["SubmitArticleData"]["title"], 
                            $_SESSION["SubmitArticleData"]["summary"],
                            $_SESSION["SubmitArticleData"]["file"],
                            1)){
/* OVAJ DIO TREBA JOS PREPRAVITI ************************************************************************************* OVAJ DIO TREBA JOS PREPRAVITI */
/* OVAJ DIO TREBA JOS PREPRAVITI ************************************************************************************* OVAJ DIO TREBA JOS PREPRAVITI */
/* OVAJ DIO TREBA JOS PREPRAVITI ************************************************************************************* OVAJ DIO TREBA JOS PREPRAVITI */
/* OVAJ DIO TREBA JOS PREPRAVITI ************************************************************************************* OVAJ DIO TREBA JOS PREPRAVITI */
                        header("Location: ../options.php?status=success");exit;
                    }
                    // ako je nastala greska prilikom upisa u bazu
                    else{
                        header("Location: ../options.php?status=databaseerror");exit;
                    }
                    
		}
                // ako spremanje nije uspjelo obavjestiti korisnika
                else{
                    header("Location: ../options.php?status=filesaveerror");exit;
                }
            }
            // ako datoteka s istim imenom postoji
            else{
                header("Location: ../options.php?status=samefilenameerror");exit;
            }
        }
        // ako nesto nije u redu s nazivima datoteka ovdje je nemoguce zavrsit valjda xD
        else{
            header("Location: ../options.php?status=fileerror");exit;
        }
    }
}
// ako netko ne dodje ovdje pomocu FORM POSTA (upise sam adresu)
else{
    echo "Whoops how did u get here?";
}
