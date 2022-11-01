<?php
   $nameErr=$emailErr=$phonenoErr="";
   $name=$email=$phoneno=$comment="";

   if($_SERVER['REQUEST_METHOD']=='POST')
   {
      if(empty($_POST['name']))
      {
         $nameErr="This field is required";
      }
      else
      {
         $pattern="/^[a-zA-Z]+$/";
         $check=preg_match_all($pattern,$_POST['name']);
         if($check)
         {
            $name=$_POST['name'];
         }
         else
         {
            $nameErr="Enter the correct pattern";
         }
      }
      //validating email
      if(empty($_POST['email']))
      {
         $emailErr="This field is required";
      }
      else
      {
        $check=filter_var($_POST['email'],FILTER_VALIDATE_EMAIL);
        if($check)
        {
           $email=$_POST['email'];
        }
        else
        {
           $emailErr="Enter the correct email format";
        }
      }
      //validating phone no
      if(empty($_POST['phoneno']))
      {
         $phonenoErr="This field is required";
      }
      else
      {
         $pattern="/^[0-9]{10}/";
         $check=preg_match_all($pattern,$_POST['phoneno']);
         if($check)
         {
            $phoneno=$_POST['phoneno'];
         }
         else
         {
            $phonenoErr="Enter correct phone number";
         }
      }
      if($_POST['comment'])
      {
         $comment=htmlspecialchars($_POST['comment']);
      }
   }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validating and displaying the inputs</title>
    <link rel="stylesheet" href="style.css">
</head>
<body style:text-align="center">
<div class="form-container" >
    <div><span class="red-message">* Required</span></div>
    <form auto_complete="off" method="post" action="<?php echo $_SERVER["PHP_SELF"] ;?>"  >
      <div>
        <div class="form-element">
         <!-- to get name-->
            <label for="name">Name :</label>
            <input name="name" type="text" id="name" placeholder="Enter your name">
            <span class='red-message'>* <?php echo $nameErr;?></span>
         </div>
         <!-- to get email--->
            <label for="-email">E-mail :</label>
            <input name="email" id="email" type=""  placeholder="Enter your E-mail">
            <span class='red-message'>* <?php echo $emailErr;?></span>
         </div>
         <!--get phone number-->
         <div class="form-element">
            <label for="phoneno">Phone no :</label>
            <input name="phoneno" id="phoneno" type="" maxlength="10" placeholder="Enter your phone no">
            <span class='red-message'>* <?php echo $phonenoErr;?></span>
         <!-- to get comment--->
         <div class="form-element">
            <label for="comment">comment:</label>
            <textarea id="comment" rows="5" cols="40" name="comment" placeholder="Type your comment" maxlenght="200"></textarea>
         </div>
         <input type="submit"  name="submit">
     </div>
   </form>

   <h2>Your input:</h2>
   <?php
     echo "Name:",$name,"<br><br>";
     echo "Email:",$email,"<br><br>";
     echo "phoneno:",$phoneno,"<br><br>";
     echo "comment:",$comment;
   ?>
 </div>
</body>
</html>
