<?php

require_once("db.config.php");



class Super 
{
    public $errors =  array();
    public $success = array();

    #### Send Mail
    public function SendMAil () 
    {
        global $conn;

        $email   = ($_POST['email']);
        $name    = ($_POST['name']);
        $phone   = ($_POST['email']);
        $subject = ($_POST['subject']);
        $message = ($_POST['message']);
        
        ### if there an empty field return with an error message 
        if (empty($email)) 
        {
            array_push($this->errors, "Email Shouldn't be empty ");
        }
        if (empty($name)) 
        {
            array_push($this->errors, "Name Shouldn't be empty ");
        }
        if (empty($phone)) 
        {
            array_push($this->errors, "Phone Shouldn't be empty ");
        }
        if (empty($subject)) 
        {
            array_push($this->errors, "Subject Shouldn't be empty ");
        }
        if (empty($message)) 
        {
            array_push($this->errors, "Message Shouldn't be empty ");
        }

        ### if there is no errors continue the process
        if ($this->errors == 0 ) 
        {
            ## Send Message with the Data 

            $headers = "From: ". $name . "\r\n" .
            "CC: " . $email .".";
            $to = "faicaleljabli77@gmail.com";

            $send_mail = mail($to,$subject,$message,$headers);

            if ($send_mail) 
            {
                $qry = "INSERT INTO mail 
                (name, 
                email, 
                phone, 
                subject, 
                message) VALUES ('$name', 
                '$email',
                '$phone',
                'subject',
                'message')";

                $sql = $conn->prepare($qry);
                try 
                {
                    $sql->execute();
                    array_push($this->success, 
                    "Message Has Been Sent Successfully, And Data Was Recorded We Will Be In Touch");
                } catch(PDOException $e) 
                {
                    echo $sql . "<br>" . $e->getMessage();
                }
            }
        }

    }




}






?>