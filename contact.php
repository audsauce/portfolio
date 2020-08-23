<?php 
//check if form submitted
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $problem= false;
    
    
   //check for value in each field
    if(empty($_POST['name'])){
        $problem = true;
        print'<p class="error">Please enter your name.</p>';
    }
    if(empty($_POST['email']) || (substr_count($_POST['email'], '@') !=1)){
        $problem = true;
        print'<p class="error">Please enter a valid email address.</p>';
    }
    if(empty($_POST['message'])){
        $problem = true;
        print'<p class="error">Please enter a message.</p>';
    }
    if(!$problem){
        //send form info to email address
        $to='amerriweather773@gmail.com';
        $subject = 'Premiere Products Contact Info from Audrey Merriweather';
        $txt = $_POST['message'] . " From: " . $_POST['email'];
        mail($to, $subject, $txt);
        print'<h3>Message sent successfully! Please feel free to send us another message.</h3>';
            
            //Clear the posted values
            $_POST=[];
    } else {
        print'<p class="error">Please try again.</p>';
    }
}
?>