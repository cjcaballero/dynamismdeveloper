<?php
      
    
        $mysqli = $nameError = $emailError = $phoneError = $addressError = $listboxError= $name = $email = $phone = $address = "";


    if(isset($_POST['name'])) 
        {

        $name              = checkInput($_POST['name']);
        $email             = checkInput($_POST['email']);
        $phone             = checkInput($_POST['phone']);
        $address           = checkInput($_POST['address']); 
        $listbox           = checkInput($_POST['medios']); 


        $con=mysqli_connect("localhost","bocadito_2019","Bocadito2019","bocadito_2019");
        // Check connection
        if (mysqli_connect_errno())
          {
          echo "Failed to connect to MySQL: " . mysqli_connect_error();
          }
          else{


               mysqli_query($con,'INSERT INTO customers(name,email,phone,address,medio)
                    VALUES ('$name', '$email','$phone','$address','$listbox')');


            
                      header("Location: checkout.php");


          }



            mysqli_close($con);

    }
    else{

      echo 'No jalo';


    }  


    function checkInput($data) 
    {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }
?>
