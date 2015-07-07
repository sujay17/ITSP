//Logging in with Google accounts requires setting special identity, so this example shows how to do it.
<?php
require 'openid.php';
 
try
{
    # Change 'localhost' to your domain name.
    $openid = new LightOpenID($_SERVER['HTTP_HOST']);
     
    //Not already logged in
    if(!$openid->mode)
    {
        //The google openid url
        $openid->identity = 'https://www.google.com/accounts/o8/id';
         
        //Get additional google account information about the user , name , email , country
        $openid->required = array('contact/email' , 'namePerson/first' , 'namePerson/last' , 'pref/language' , 'contact/country/home'); 
         
        //start discovery
        header('Location: ' . $openid->authUrl());
    }
     
    else if($openid->mode == 'cancel')
    {
        echo 'User has canceled authentication!';
        //redirect back to login page ??
    }
     
    //Echo login information by default
    else
    {
        if($openid->validate())
        {
            //User logged in
            $d = $openid->getAttributes();
             
            $first_name = $d['namePerson/first'];
            $last_name = $d['namePerson/last'];
            $email = $d['contact/email'];
            $language_code = $d['pref/language'];
            $country_code = $d['contact/country/home'];
             
            $data = array(
                'first_name' => $first_name ,
                'last_name' => $last_name ,
                'email' => $email ,
            );
             
                        //now signup/login the user.
            process_signup_login($data);
        }
        else
        {
            //user is not logged in
        }
    }
}
 
catch(ErrorException $e) 
{
    echo $e->getMessage();
}
?>