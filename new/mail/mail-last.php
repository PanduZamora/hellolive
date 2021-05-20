<?php session_start();
//print_r($_POST);echo "<br>";
if ($_POST[pass1] != $_POST[pass2])
{
    echo "Verification Do Not Match!";
    die();
}
//print_r($_POST);
function enc($d)
{
    $d = htmlspecialchars(stripslashes(trim($d)));
    return $d;
}

//schedule visit
if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['Schedule_a_Visit'] != "")
{

    //get all POST values

    include_once "../sendmail/sendmail.php";

    $message = "<table name='contact_seller' style='border-collapse:collapse';> <tbody>";

    $message .= "Please contact the customer below to schedule a tour at voffice
                            <tr><td>First Name: </td><td>" . $_POST['firstname'] . "</td></tr>
                            <tr><td>Last Name: </td><td>" . $_POST['lastname'] . "</td></tr>
                            <tr><td>Phone: </td><td>" . $_POST['phone'] . "</td></tr>
                            <tr><td>eMail: </td><td>" . $_POST['email'] . "</td></tr>
                            <tr><td>Message: </td><td>" . $_POST['message'] . "</td></tr>
                            <tr><td>Service: </td><td>" . $_POST['service'] . "</td></tr>
                            <tr><td>Date: </td><td>" . $_POST['date'] . "</td></tr>
                            <tr><td>Pax: </td><td>" . $_POST['pax'] . "</td></tr>
                        ";

    $message .= "</tbody>
            </table>";

    $mail->SetFrom('cs@voffice.co.id', 'voffice.co.id');
    $mail->AddReplyTo($_POST['email'], $_POST['firstname']);
    $mail->Subject = ('Schedule a Visit @ voffice.co.id (From Website)');
    $mail->MsgHTML($message);
    // $mail->AddAddress('Javad@flexiesolutions.com', 'Javad');
    $mail->AddAddress('cs@voffice.co.id', 'Customer Service');
    $mail->AddCC('astrid@voffice.co.id');
    $mail->AddBCC('albert.g@voffice.com.my');
    $mail->AddBCC('kevin@cre8.id');
    $mail->AddBCC('adam.goh@voffice.co.id');
    if ($mail->Send())
    {
        echo "2";
    }
    else
    {
        echo "Mailer Error: " . $mail->ErrorInfo;
    }

}

//flexible serviced office Inquire
if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['Schedule_a_Visit_flexible'] != "")
{

    //get all POST values
    $plan     = enc($_POST["plan"]);
    $name     = enc($_POST["name"]);
    $phone    = enc($_POST["phone"]);
    $email    = enc($_POST["email"]);
    $message  = enc($_POST["message"]);
    $capacity = enc($_POST["capacity"]);
    $location = enc($_POST["location"]);

    if ($plan == "hr")
    {
        $plan = "Hourly";
    }
    elseif ($plan == "dl")
    {
        $plan = "Daily";
    }
    elseif ($plan == "mn")
    {
        $plan = "Monthly";
    }
    elseif ($plan == "lt")
    {
        $plan = "Long Term";
    }

    if ($capacity == "1")
    {
        $capacity = "1 Orang";
    }
    else if ($capacity == "2")
    {
        $capacity = " 2 Orang";
    }
    else if ($capacity == "3")
    {
        $capacity = " 3 Orang";
    }
    else if ($capacity == "4")
    {
        $capacity = " 4 Orang";
    }
    else if ($capacity == "5")
    {
        $capacity = " 5 Orang";
    }
    else if ($capacity == "6+")
    {
        $capacity = " Lebih dari 6 Orang";
    }

    if ($location == "office8")
    {
        $location = "Office 8, Jakarta Selatan";
    }
    else if ($location == "MR")
    {
        $location = " Menara Rajawali, Jakarta Selatan";
    }
    else if ($location == "CT")
    {
        $location = "Centennial Tower, Jakarta Selatan";
    }
    else if ($location == "MK")
    {
        $location = " Menara Kuningan, Jakarta Selatan";
    }
    else if ($location == "MT")
    {
        $location = " Metropolitan Tower, Jakarta Selatan";
    }
    else if ($location == "TCB")
    {
        $location = "The CEO Building, Jakarta Selatan";
    }
    else if ($location == "GS")
    {
        $location = "Graha Surveyor, Jakarta Selatan";
    }
    else if ($location == "TCT")
    {
        $location = "The City Tower, Jakarta Pusat";
    }
    else if ($location == "KT")
    {
        $location = "Kencana Tower, Jakarta Barat";
    }
    else if ($location == "GS")
    {
        $location = "Grand Slipi Tower, Jakarta Barat";
    }
    else if ($location == "K2T")
    {
        $location = "Kirana 2 Tower, Jakarta Utara";
    }
    else if ($location == "PIK")
    {
        $location = "PIK Avenue, Jakarta Utara";
    }
    else if ($location == "BMT1")
    {
        $location = "Bumi Mandiri Tower I, Surabaya";
    }
    else if ($location == "BMT2")
    {
        $location = "Bumi Mandiri Tower II, Surabaya";
    }
    else if ($location == "IT")
    {
        $location = "Intiland Tower, Surabaya";
    }
    else if ($location == "SPAZIO")
    {
        $location = "Spazio, Surabaya";
    }
    else if ($location == "IBIS")
    {
        $location = "Ibis Style, Surabaya";
    }

    $body = "Name : " . $name . "<br/>";
    $body .= "Phone : " . $phone . "<br/>";
    $body .= "Email : " . $email . "<br/>";
    $body .= "Plan : " . $plan . "<br/>";
    $body .= "Lokasi : " . $location . "<br/>";
    $body .= "Kapasitas Orang : " . $capacity . "<br/>";
    $body .= "Message : " . $message . "<br/>";

    include_once "../sendmail/sendmail.php";

    $mail->SetFrom('contact@vOffice.co.id', 'Contact');
    $mail->Subject = "[New]Contact Us Inquiry Serviced Office Flexible";
    $mail->Body    = $body;
    $mail->IsHTML(true);
    $mail->AddAddress('cs@voffice.co.id', 'Customer Service');
    $mail->AddCC('astrid@voffice.co.id');
    $mail->AddBCC('albert.g@voffice.com.my');
    $mail->AddBCC('kevin@cre8.id');
    $mail->AddBCC('adam.goh@voffice.co.id');
    if ($mail->Send())
    {
        echo "2";
    }
    else
    {
        echo "Mailer Error: " . $mail->ErrorInfo;
    }
}

//flexible serviced office
if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['serviced_office_flexible'] != "")
{

    //get all POST values
    $name     = enc($_POST["name"]);
    $phone    = enc($_POST["phone"]);
    $email    = enc($_POST["email"]);
    $message  = enc($_POST["message"]);
    $capacity = enc($_POST["capacity"]);
    $location = enc($_POST["location"]);

    if ($capacity == "1")
    {
        $capacity = "1 Orang";
    }
    else if ($capacity == "2")
    {
        $capacity = " 2 Orang";
    }
    else if ($capacity == "3")
    {
        $capacity = " 3 Orang";
    }
    else if ($capacity == "4")
    {
        $capacity = " 4 Orang";
    }
    else if ($capacity == "5")
    {
        $capacity = " 5 Orang";
    }
    else if ($capacity == "6+")
    {
        $capacity = " Lebih dari 6 Orang";
    }

    if ($location == "office8")
    {
        $location = "Office 8, Jakarta Selatan";
    }
    else if ($location == "MR")
    {
        $location = " Menara Rajawali, Jakarta Selatan";
    }
    else if ($location == "CT")
    {
        $location = "Centennial Tower, Jakarta Selatan";
    }
    else if ($location == "MK")
    {
        $location = " Menara Kuningan, Jakarta Selatan";
    }
    else if ($location == "MT")
    {
        $location = " Metropolitan Tower, Jakarta Selatan";
    }
    else if ($location == "TCB")
    {
        $location = "The CEO Building, Jakarta Selatan";
    }
    else if ($location == "GS")
    {
        $location = "Graha Surveyor, Jakarta Selatan";
    }
    else if ($location == "TCT")
    {
        $location = "The City Tower, Jakarta Pusat";
    }
    else if ($location == "KT")
    {
        $location = "Kencana Tower, Jakarta Barat";
    }
    else if ($location == "GS")
    {
        $location = "Grand Slipi Tower, Jakarta Barat";
    }
    else if ($location == "K2T")
    {
        $location = "Kirana 2 Tower, Jakarta Utara";
    }
    else if ($location == "PIK")
    {
        $location = "PIK Avenue, Jakarta Utara";
    }
    else if ($location == "BMT1")
    {
        $location = "Bumi Mandiri Tower I, Surabaya";
    }
    else if ($location == "BMT2")
    {
        $location = "Bumi Mandiri Tower II, Surabaya";
    }
    else if ($location == "IT")
    {
        $location = "Intiland Tower, Surabaya";
    }
    else if ($location == "SPAZIO")
    {
        $location = "Spazio, Surabaya";
    }
    else if ($location == "IBIS")
    {
        $location = "Ibis Style, Surabaya";
    }

    $body = "Name : " . $name . "<br/>";
    $body .= "Phone : " . $phone . "<br/>";
    $body .= "Email : " . $email . "<br/>";
    $body .= "Lokasi : " . $location . "<br/>";
    $body .= "Kapasitas Orang : " . $capacity . "<br/>";
    $body .= "Message : " . $message . "<br/>";

    include_once "../sendmail/sendmail.php";

    $mail->SetFrom('contact@vOffice.co.id', 'Contact');
    $mail->Subject = "[New]Contact Us Contact Us Serviced Office Flexible";
    $mail->Body    = $body;
    $mail->IsHTML(true);
    $mail->AddAddress('cs@voffice.co.id', 'Customer Service');
    $mail->AddCC('astrid@voffice.co.id');
    $mail->AddBCC('albert.g@voffice.com.my');
    $mail->AddBCC('kevin@cre8.id');
    $mail->AddBCC('adam.goh@voffice.co.id');
    if ($mail->Send())
    {
        echo "2";
    }
    else
    {
        echo "Mailer Error: " . $mail->ErrorInfo;
    }
}

//serviced office standard
if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['serviced_office_standard'] != "")
{

    //get all POST values
    $name     = enc($_POST["name"]);
    $phone    = enc($_POST["phone"]);
    $email    = enc($_POST["email"]);
    $message  = enc($_POST["message"]);
    $capacity = enc($_POST["capacity"]);
    $location = enc($_POST["location"]);

    if ($capacity == "1")
    {
        $capacity = "1 Orang";
    }
    else if ($capacity == "2")
    {
        $capacity = " 2 Orang";
    }
    else if ($capacity == "3")
    {
        $capacity = " 3 Orang";
    }
    else if ($capacity == "4")
    {
        $capacity = " 4 Orang";
    }
    else if ($capacity == "5")
    {
        $capacity = " 5 Orang";
    }
    else if ($capacity == "6+")
    {
        $capacity = " Lebih dari 6 Orang";
    }

    if ($location == "office8")
    {
        $location = "Office 8, Jakarta Selatan";
    }
    else if ($location == "MR")
    {
        $location = " Menara Rajawali, Jakarta Selatan";
    }
    else if ($location == "CT")
    {
        $location = "Centennial Tower, Jakarta Selatan";
    }
    else if ($location == "MK")
    {
        $location = " Menara Kuningan, Jakarta Selatan";
    }
    else if ($location == "MT")
    {
        $location = " Metropolitan Tower, Jakarta Selatan";
    }
    else if ($location == "TCB")
    {
        $location = "The CEO Building, Jakarta Selatan";
    }
    else if ($location == "GS")
    {
        $location = "Graha Surveyor, Jakarta Selatan";
    }
    else if ($location == "TCT")
    {
        $location = "The City Tower, Jakarta Pusat";
    }
    else if ($location == "KT")
    {
        $location = "Kencana Tower, Jakarta Barat";
    }
    else if ($location == "GS")
    {
        $location = "Grand Slipi Tower, Jakarta Barat";
    }
    else if ($location == "K2T")
    {
        $location = "Kirana 2 Tower, Jakarta Utara";
    }
    else if ($location == "PIK")
    {
        $location = "PIK Avenue, Jakarta Utara";
    }
    else if ($location == "BMT1")
    {
        $location = "Bumi Mandiri Tower I, Surabaya";
    }
    else if ($location == "BMT2")
    {
        $location = "Bumi Mandiri Tower II, Surabaya";
    }
    else if ($location == "IT")
    {
        $location = "Intiland Tower, Surabaya";
    }
    else if ($location == "SPAZIO")
    {
        $location = "Spazio, Surabaya";
    }
    else if ($location == "IBIS")
    {
        $location = "Ibis Style, Surabaya";
    }

    $body = "Name : " . $name . "<br/>";
    $body .= "Phone : " . $phone . "<br/>";
    $body .= "Email : " . $email . "<br/>";
    $body .= "Lokasi : " . $location . "<br/>";
    $body .= "Kapasitas Orang : " . $capacity . "<br/>";
    $body .= "Message : " . $message . "<br/>";

    include_once "../sendmail/sendmail.php";

    $mail->SetFrom('contact@vOffice.co.id', 'Contact');
    $mail->Subject = "[New]Contact Us Serviced Office Standard";
    $mail->Body    = $body;
    $mail->IsHTML(true);
    $mail->AddAddress('cs@voffice.co.id', 'Customer Service');
    $mail->AddCC('astrid@voffice.co.id');
    $mail->AddBCC('albert.g@voffice.com.my');
    $mail->AddBCC('kevin@cre8.id');
    $mail->AddBCC('adam.goh@voffice.co.id');
    if ($mail->Send())
    {
        echo "2";
    }
    else
    {
        echo "Mailer Error: " . $mail->ErrorInfo;
    }
}

//serviced office premium
if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['serviced_office_premium'] != "")
{

    //get all POST values
    $name     = enc($_POST["name"]);
    $phone    = enc($_POST["phone"]);
    $email    = enc($_POST["email"]);
    $message  = enc($_POST["message"]);
    $capacity = enc($_POST["capacity"]);
    $location = enc($_POST["location"]);

    if ($capacity == "1")
    {
        $capacity = "1 Orang";
    }
    else if ($capacity == "2")
    {
        $capacity = " 2 Orang";
    }
    else if ($capacity == "3")
    {
        $capacity = " 3 Orang";
    }
    else if ($capacity == "4")
    {
        $capacity = " 4 Orang";
    }
    else if ($capacity == "5")
    {
        $capacity = " 5 Orang";
    }
    else if ($capacity == "6+")
    {
        $capacity = " Lebih dari 6 Orang";
    }

    if ($location == "office8")
    {
        $location = "Office 8, Jakarta Selatan";
    }
    else if ($location == "MR")
    {
        $location = " Menara Rajawali, Jakarta Selatan";
    }
    else if ($location == "CT")
    {
        $location = "Centennial Tower, Jakarta Selatan";
    }
    else if ($location == "MK")
    {
        $location = " Menara Kuningan, Jakarta Selatan";
    }
    else if ($location == "MT")
    {
        $location = " Metropolitan Tower, Jakarta Selatan";
    }
    else if ($location == "TCB")
    {
        $location = "The CEO Building, Jakarta Selatan";
    }
    else if ($location == "GS")
    {
        $location = "Graha Surveyor, Jakarta Selatan";
    }
    else if ($location == "TCT")
    {
        $location = "The City Tower, Jakarta Pusat";
    }
    else if ($location == "KT")
    {
        $location = "Kencana Tower, Jakarta Barat";
    }
    else if ($location == "GS")
    {
        $location = "Grand Slipi Tower, Jakarta Barat";
    }
    else if ($location == "K2T")
    {
        $location = "Kirana 2 Tower, Jakarta Utara";
    }
    else if ($location == "PIK")
    {
        $location = "PIK Avenue, Jakarta Utara";
    }
    else if ($location == "BMT1")
    {
        $location = "Bumi Mandiri Tower I, Surabaya";
    }
    else if ($location == "BMT2")
    {
        $location = "Bumi Mandiri Tower II, Surabaya";
    }
    else if ($location == "IT")
    {
        $location = "Intiland Tower, Surabaya";
    }
    else if ($location == "SPAZIO")
    {
        $location = "Spazio, Surabaya";
    }
    else if ($location == "IBIS")
    {
        $location = "Ibis Style, Surabaya";
    }

    $body = "Name : " . $name . "<br/>";
    $body .= "Phone : " . $phone . "<br/>";
    $body .= "Email : " . $email . "<br/>";
    $body .= "Lokasi : " . $location . "<br/>";
    $body .= "Kapasitas Orang : " . $capacity . "<br/>";
    $body .= "Message : " . $message . "<br/>";

    include_once "../sendmail/sendmail.php";

    $mail->SetFrom('contact@vOffice.co.id', 'Contact');
    $mail->Subject = "[New]Contact Us Serviced Office Premium";
    $mail->Body    = $body;
    $mail->IsHTML(true);
    $mail->AddAddress('cs@voffice.co.id', 'Customer Service');
    $mail->AddCC('astrid@voffice.co.id');
    $mail->AddBCC('albert.g@voffice.com.my');
    $mail->AddBCC('kevin@cre8.id');
    $mail->AddBCC('adam.goh@voffice.co.id');
    if ($mail->Send())
    {
        echo "2";
    }
    else
    {
        echo "Mailer Error: " . $mail->ErrorInfo;
    }
}

//dedicated desk
if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['request_dedicateddesk'] != "")
{

    //get all POST values
    $name    = enc($_POST["name"]);
    $phone   = enc($_POST["phone"]);
    $email   = enc($_POST["email"]);
    $message = enc($_POST["message"]);
    $plan    = enc($_POST["plan"]);

    if ($plan == "sdd")
    {
        $plan = "Standard Dedicated Desk";
    }
    else
    {
        $plan = "Corporate Dedicated Desk";
    }

    $body = "Name : " . $name . "<br/>";
    $body .= "Phone : " . $phone . "<br/>";
    $body .= "Email : " . $email . "<br/>";
    $body .= "Plan : " . $plan . "<br/>";
    $body .= "Message : " . $message . "<br/>";

    include_once "../sendmail/sendmail.php";

    $mail->SetFrom('contact@vOffice.co.id', 'Contact');
    $mail->Subject = "[New]Contact Us Dedicated Desk";
    $mail->Body    = $body;
    $mail->IsHTML(true);
    $mail->AddAddress('cs@voffice.co.id', 'Customer Service');
    $mail->AddCC('astrid@voffice.co.id');
    $mail->AddBCC('albert.g@voffice.com.my');
    $mail->AddBCC('kevin@cre8.id');
    $mail->AddBCC('adam.goh@voffice.co.id');
    if ($mail->Send())
    {
        echo "2";
    }
    else
    {
        echo "Mailer Error: " . $mail->ErrorInfo;
    }
}

//coworking space
if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['request_coworkingspace'] != "")
{

    //get all POST values
    $name    = enc($_POST["name"]);
    $phone   = enc($_POST["phone"]);
    $email   = enc($_POST["email"]);
    $plan    = enc($_POST["plan"]);
    $message = enc($_POST["message"]);

    if ($plan == "Daily")
    {
        $plan = "Daily Plan";
    }
    elseif ($plan == "Weekly")
    {
        $plan = "Weekly Plan";
    }

    $body = "Name : " . $name . "<br/>";
    $body .= "Phone : " . $phone . "<br/>";
    $body .= "Email : " . $email . "<br/>";
    $body .= "Plan : " . $plan . "<br/>";
    $body .= "Message : " . $message . "<br/>";

    include_once "../sendmail/sendmail.php";

    $mail->SetFrom('contact@vOffice.co.id', 'Contact');
    $mail->Subject = "[New]Contact Us Coworking Space vOffice";
    $mail->Body    = $body;
    $mail->IsHTML(true);
    $mail->AddAddress('cs@voffice.co.id', 'Customer Service');
    $mail->AddCC('astrid@voffice.co.id');
    $mail->AddBCC('albert.g@voffice.com.my');
    $mail->AddBCC('kevin@cre8.id');
    $mail->AddBCC('adam.goh@voffice.co.id');
    if ($mail->Send())
    {
        echo "2";
    }
    else
    {
        echo "Mailer Error: " . $mail->ErrorInfo;
    }
}

//Corporate Desking
if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['corpdesk'] != "")
{

    //get all POST values
    $name    = enc($_POST["name"]);
    $phone   = enc($_POST["phone"]);
    $email   = enc($_POST["email"]);
    $message = enc($_POST["message"]);
    $ip      = enc($_POST['ip']);
    $url     = enc($_POST['url']);

    include_once "../sendmail/sendmail.php";

    $message = "<table name='contact_seller' style='border-collapse:collapse';> <tbody>";

    $message .= "[New Inquiry] Corporate Dedicated Desk, please contact them :
                            <tr><td>&nbsp; </td><td>&nbsp;</td></tr>
                            <tr><td>Name: </td><td>" . $_POST['name'] . "</td></tr>
                            <tr><td>Phone: </td><td>" . $_POST['phone'] . "</td></tr>
                            <tr><td>Email: </td><td>" . $_POST['email'] . "</td></tr>
                            <tr><td>Message: </td><td>" . $_POST['message'] . "</td></tr>
                            <tr><td>&nbsp; </td><td>&nbsp;</td></tr>
                            <tr><td>Source: </td><td> Website </td></tr>
                            <tr><td>From Page: </td><td><a href=" . $_POST['url'] . ">" . $_POST['url'] . "</a></td></tr>
                        ";

    $message .= "</tbody>
            </table>";

    //    $mail->SetFrom('cs@voffice.co.id', 'voffice.co.id');
    $mail->SetFrom('contact@vOffice.co.id', 'Contact');
    $mail->AddReplyTo($_POST['email'], $_POST['name']);
    $mail->Subject = ('[Corporate Dedicated Desk] Contact Us | from Website vOffice.co.id');
    $mail->MsgHTML($message);
    $mail->AddAddress('cs@voffice.co.id', 'Customer Service');
    $mail->AddCC('astrid@voffice.co.id');
//    $mail->AddAddress('kevin@cre8.id', 'kevin');
    $mail->AddBCC('albert.g@voffice.com.my');
    $mail->AddBCC('kevin@cre8.id');
    $mail->AddBCC('adam.goh@voffice.co.id');
    if ($mail->Send())
    {
        echo "2";
    }
    else
    {
        echo "Mailer Error: " . $mail->ErrorInfo;
    }

}

//==================================================================== New Code ====================================================================

//notify email
if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['notify_email'] != "")
{

    //get all POST values
    $email = enc($_POST["notify_email"]);

    include_once "../sendmail/sendmail.php";

    $msg = "<table name='contact_seller' style='border-collapse:collapse';> <tbody>";

    $msg .= "Notify Me of Virtual Office Indonesia offers :
                            <tr><td>&nbsp; </td><td>&nbsp;</td></tr>
                            <tr><td>Email: </td><td>" . $_POST['notify_email'] . "</td></tr>
                            <tr><td>&nbsp; </td><td>&nbsp;</td></tr>
                            <tr><td>Source: </td><td> Website </td></tr>
                            <tr><td>From Page: </td><td><a href=" . $_POST['url'] . ">" . $_POST['url'] . "</a></td></tr>
                        ";

    $msg .= "</tbody>
            </table>";

    $mail->SetFrom('cs@vOffice.co.id', 'Notify Me');
    $mail->Subject = ('Notify Me of Virtual Office Indonesia offers | From Website vOffice)');
    $mail->MsgHTML($msg);
//      $mail->AddAddress('kevin@cre8.id', 'kevin');
    $mail->AddAddress('cs@voffice.co.id', 'Customer Service');
    $mail->AddBCC('albert.g@voffice.com.my');
    $mail->AddBCC('kevin@cre8.id');
    $mail->AddBCC('adam.goh@voffice.co.id');
    if ($mail->Send())
    {
        echo "2";
    }
    else
    {
        echo "Mailer Error: " . $mail->ErrorInfo;
    }
}

//Virtual Office Plan Page
if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['contactvo'] != "")
{

    //get all POST values
    $name    = enc($_POST["name"]);
    $phone   = enc($_POST["phone"]);
    $email   = enc($_POST["email"]);
    $plan    = enc($_POST["subject"]);
    $message = enc($_POST["message"]);
    $ip      = enc($_POST['ip']);
    $url     = enc($_POST['url']);

    include_once "../sendmail/sendmail.php";

    $message = "<table name='contact_seller' style='border-collapse:collapse';> <tbody>";

    $message .= "[New Inquiry] Signup Virtual Office, please contact them :
                            <tr><td>&nbsp; </td><td>&nbsp;</td></tr>
                            <tr><td>Name: </td><td>" . $_POST['name'] . "</td></tr>
                            <tr><td>Phone: </td><td>" . $_POST['phone'] . "</td></tr>
                            <tr><td>Email: </td><td>" . $_POST['email'] . "</td></tr>
                            <tr><td>Plan: </td><td>" . $_POST['subject'] . "</td></tr>
                            <tr><td>Message: </td><td>" . $_POST['message'] . "</td></tr>
                            <tr><td>&nbsp; </td><td>&nbsp;</td></tr>
                            <tr><td>Source: </td><td> Website </td></tr>
                            <tr><td>From Page: </td><td><a href=" . $_POST['url'] . ">" . $_POST['url'] . "</a></td></tr>
                        ";

    $message .= "</tbody>
            </table>";

    //    $mail->SetFrom('cs@voffice.co.id', 'voffice.co.id');
    $mail->SetFrom('contact@vOffice.co.id', 'Contact');
    $mail->AddReplyTo($_POST['email'], $_POST['name']);
    $mail->Subject = ('[Virtual Office] Signup | From Website vOffice.co.id');
    $mail->MsgHTML($message);
    //    $mail->AddAddress('kevin@cre8.id', 'kevin');
    $mail->AddAddress('cs@voffice.co.id', 'Customer Service');
    $mail->AddBCC('albert.g@voffice.com.my');
    $mail->AddBCC('kevin@cre8.id');
    $mail->AddBCC('adam.goh@voffice.co.id');
    if ($mail->Send())
    {
        echo "2";
    }
    else
    {
        echo "Mailer Error: " . $mail->ErrorInfo;
    }

}

//Virtual Office Promo Page
if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['contactvopromo'] != "")
{

    //get all POST values
    $name    = enc($_POST["name"]);
    $phone   = enc($_POST["phone"]);
    $email   = enc($_POST["email"]);
    $plan    = enc($_POST["subject"]);
    $message = enc($_POST["message"]);
    $ip      = enc($_POST['ip']);
    $url     = enc($_POST['url']);

    include_once "../sendmail/sendmail.php";

    $message = "<table name='contact_seller' style='border-collapse:collapse';> <tbody>";

    $message .= "[New Inquiry] Signup Promo Juni Virtual Office, please contact them :
                            <tr><td>&nbsp; </td><td>&nbsp;</td></tr>
                            <tr><td>Name: </td><td>" . $_POST['name'] . "</td></tr>
                            <tr><td>Phone: </td><td>" . $_POST['phone'] . "</td></tr>
                            <tr><td>Email: </td><td>" . $_POST['email'] . "</td></tr>
                            <tr><td>Plan: </td><td>" . $_POST['subject'] . "</td></tr>
                            <tr><td>Message: </td><td>" . $_POST['message'] . "</td></tr>
                            <tr><td>&nbsp; </td><td>&nbsp;</td></tr>
                            <tr><td>Source: </td><td> Website </td></tr>
                            <tr><td>From Page: </td><td><a href=" . $_POST['url'] . ">" . $_POST['url'] . "</a></td></tr>
                        ";

    $message .= "</tbody>
            </table>";

    //    $mail->SetFrom('cs@voffice.co.id', 'voffice.co.id');
    $mail->SetFrom('contact@vOffice.co.id', 'Contact');
    $mail->AddReplyTo($_POST['email'], $_POST['name']);
    $mail->Subject = ('[Virtual Office Promo] Promo Juni Signup | From Website vOffice.co.id');
    $mail->MsgHTML($message);
    //    $mail->AddAddress('kevin@cre8.id', 'kevin');
    $mail->AddAddress('cs@voffice.co.id', 'Customer Service');
    $mail->AddBCC('albert.g@voffice.com.my');
    $mail->AddBCC('kevin@cre8.id');
    $mail->AddBCC('adam.goh@voffice.co.id');
    if ($mail->Send())
    {
        echo "2";
    }
    else
    {
        echo "Mailer Error: " . $mail->ErrorInfo;
    }

}

//Pembuatan PT/CV + Virtual Office vOffice Page
if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['request_proposal'] != "")
{

    //get all POST values
    $service  = enc($_POST["service"]);
    $name     = enc($_POST["name"]);
    $phone    = enc($_POST["phone"]);
    $email    = enc($_POST["email"]);
    $message  = enc($_POST["message"]);
    $domisili = enc($_POST["domisili"]);

    if ($service == "PT-LITE")
    {
        $service = "Buat PT Lite";
    }
    elseif ($service == "PT-FULL")
    {
        $service = "Buat PT Full";
    }
    elseif ($service == "PT-FULL-VO")
    {
        $service = "Buat PT Full + Virtual Office Lite";
    }
    elseif ($service == "PT-FULL-VO-PRE")
    {
        $service = "Buat PT Full + Virtual Office Premium";
    }
    elseif ($service == "CV")
    {
        $service = "Buat CV";
    }
    elseif ($service == "CV-VO")
    {
        $service = "Buat CV + Virtual Office Lite";
    }
    elseif ($service == "CV-VO-PRE")
    {
        $service = "Buat CV + Virtual Office Premium";
    }
    elseif ($service == "OTHER")
    {
        $service = "Other Services";
    }

    include_once "../sendmail/sendmail.php";

    $message = "<table name='contact_seller' style='border-collapse:collapse';> <tbody>";

    $message .= "[New Inquiry] Pembuatan PT/CV + Virtual Office, please contact them :
                            <tr><td>&nbsp; </td><td>&nbsp;</td></tr>
                            <tr><td>Name: </td><td>" . $_POST['name'] . "</td></tr>
                            <tr><td>Phone: </td><td>" . $_POST['phone'] . "</td></tr>
                            <tr><td>Email: </td><td>" . $_POST['email'] . "</td></tr>
                            <tr><td>Service: </td><td>" . $service . "</td></tr>
                            <tr><td>Message: </td><td>" . $_POST['message'] . "</td></tr>
                            <tr><td>Anda memiliki domisili perusahaan?: </td><td>" . $_POST['domisili'] . "</td></tr>
                            <tr><td>&nbsp; </td><td>&nbsp;</td></tr>
                            <tr><td>Source: </td><td> Website </td></tr>
                            <tr><td>From Page: </td><td><a href=" . $_POST['url'] . ">" . $_POST['url'] . "</a></td></tr>
                        ";

    $message .= "</tbody>
            </table>";

    //    $mail->SetFrom('cs@voffice.co.id', 'voffice.co.id');
    $mail->SetFrom('contact@vOffice.co.id', 'Contact');
    $mail->AddReplyTo($_POST['email'], $_POST['name']);
    $mail->Subject = "[Buat PT/CV + Virtual Office] Contact Us | From Website vOffice.co.id";
    $mail->MsgHTML($message);
//    $mail->AddAddress('kevin@cre8.id', 'kevin');
    $mail->AddAddress('cs@voffice.co.id', 'Customer Service');
    $mail->AddBCC('albert.g@voffice.com.my');
    $mail->AddBCC('kevin@cre8.id');
    $mail->AddBCC('adam.goh@voffice.co.id');
    if ($mail->Send())
    {
        echo "2";
    }
    else
    {
        echo "Mailer Error: " . $mail->ErrorInfo;
    }
}

//Serviced office Location Quick Form
if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['servicedoffice_inquiry'] != "")
{

    //get all POST values
    $name    = enc($_POST["name"]);
    $phone   = enc($_POST["phone"]);
    $email   = enc($_POST["email"]);
    $message = enc($_POST["message"]);
    $ip      = enc($_POST['ip']);
    $url     = enc($_POST['url']);

    include_once "../sendmail/sendmail.php";

    $message = "<table name='contact_seller' style='border-collapse:collapse';> <tbody>";

    $message .= "Quick Form, please contact them:
                            <tr><td>&nbsp; </td><td>&nbsp;</td></tr>
                            <tr><td>Name: </td><td>" . $_POST['name'] . "</td></tr>
                            <tr><td>Phone: </td><td>" . $_POST['phone'] . "</td></tr>
                            <tr><td>Email: </td><td>" . $_POST['email'] . "</td></tr>
                            <tr><td>Message: </td><td>" . $_POST['message'] . "</td></tr>
                            <tr><td>&nbsp; </td><td>&nbsp;</td></tr>
                            <tr><td>Source: </td><td> Website </td></tr>
                            <tr><td>From Page: </td><td><a href=" . $_POST['url'] . ">" . $_POST['url'] . "</a></td></tr>
                        ";

    $message .= "</tbody>
            </table>";

    //    $mail->SetFrom('cs@voffice.co.id', 'voffice.co.id');
    $mail->SetFrom('contact@vOffice.co.id', 'Contact');
    $mail->AddReplyTo($_POST['email'], $_POST['name']);
    $mail->Subject = ('Quick Form Serviced Office @ voffice.co.id (From Website)');
    $mail->MsgHTML($message);
//        $mail->AddAddress('kevin@cre8.id', 'kevin');
    $mail->AddAddress('cs@voffice.co.id', 'Customer Service');
    $mail->AddCC('astrid@voffice.co.id');
    $mail->AddBCC('albert.g@voffice.com.my');
    $mail->AddBCC('kevin@cre8.id');
    $mail->AddBCC('adam.goh@voffice.co.id');
    if ($mail->Send())
    {
        echo "2";
    }
    else
    {
        echo "Mailer Error: " . $mail->ErrorInfo;
    }

}

//Event Space Page
if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['eventspace_inquiry'] != "")
{

    //get all POST values
    $name    = enc($_POST["name"]);
    $phone   = enc($_POST["phone"]);
    $email   = enc($_POST["email"]);
    $message = enc($_POST["message"]);
    $ip      = enc($_POST['ip']);
    $url     = enc($_POST['url']);

    include_once "../sendmail/sendmail.php";

    $message = "<table name='contact_seller' style='border-collapse:collapse';> <tbody>";

    $message .= "Customer would like to book our Eventspace, please contact them
                            <tr><td>&nbsp; </td><td>&nbsp;</td></tr>
                            <tr><td>Name: </td><td>" . $_POST['name'] . "</td></tr>
                            <tr><td>Phone: </td><td>" . $_POST['phone'] . "</td></tr>
                            <tr><td>Email: </td><td>" . $_POST['email'] . "</td></tr>
                            <tr><td>Message: </td><td>" . $_POST['message'] . "</td></tr>
                            <tr><td>&nbsp; </td><td>&nbsp;</td></tr>
                            <tr><td>Source: </td><td> Website </td></tr>
                            <tr><td>From Page: </td><td><a href=" . $_POST['url'] . ">" . $_POST['url'] . "</a></td></tr>
                        ";

    $message .= "</tbody>
            </table>";

    //    $mail->SetFrom('cs@voffice.co.id', 'voffice.co.id');
    $mail->SetFrom('contact@vOffice.co.id', 'Contact');
    $mail->AddReplyTo($_POST['email'], $_POST['name']);
    $mail->Subject = ('[Event Space] Booking | From Website voffice.co.id');
    $mail->MsgHTML($message);
//        $mail->AddAddress('kevin@cre8.id', 'kevin');
    $mail->AddAddress('cs@voffice.co.id', 'Customer Service');
    $mail->AddCC('astrid@voffice.co.id');
    $mail->AddBCC('albert.g@voffice.com.my');
    $mail->AddBCC('kevin@cre8.id');
    $mail->AddBCC('adam.goh@voffice.co.id');
    if ($mail->Send())
    {
        echo "2";
    }
    else
    {
        echo "Mailer Error: " . $mail->ErrorInfo;
    }

}

//Virtual Office Plan Page
if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['contactvospk'] != "")
{

    //get all POST values
    $name    = enc($_POST["name"]);
    $phone   = enc($_POST["phone"]);
    $email   = enc($_POST["email"]);
    $plan    = enc($_POST["subject"]);
    $message = enc($_POST["message"]);
    $result  = enc($_POST["result"]);
    $ip      = enc($_POST['ip']);
    $url     = enc($_POST['url']);

    include_once "../sendmail/sendmail.php";

    $message = "<table name='contact_seller' style='border-collapse:collapse';> <tbody>";

    $message .= "[New Inquiry] Signup Virtual Office, please contact them :
                            <tr><td>&nbsp; </td><td>&nbsp;</td></tr>
                            <tr><td>Name: </td><td>" . $_POST['name'] . "</td></tr>
                            <tr><td>Phone: </td><td>" . $_POST['phone'] . "</td></tr>
                            <tr><td>Email: </td><td>" . $_POST['email'] . "</td></tr>
                            <tr><td>Plan: </td><td>" . $_POST['subject'] . "</td></tr>
                            <tr><td>Result spk: </td><td>" . $_POST['result'] . "</td></tr>
                            <tr><td>Message: </td><td>" . $_POST['message'] . "</td></tr>
                            <tr><td>&nbsp; </td><td>&nbsp;</td></tr>
                            <tr><td>Source: </td><td> Website </td></tr>
                            <tr><td>From Page: </td><td><a href=" . $_POST['url'] . ">" . $_POST['url'] . "</a></td></tr>
                        ";

    $message .= "</tbody>
            </table>";

    //    $mail->SetFrom('cs@voffice.co.id', 'voffice.co.id');
    $mail->SetFrom('contact@vOffice.co.id', 'Contact');
    $mail->AddReplyTo($_POST['email'], $_POST['name']);
    $mail->Subject = ('[Virtual Office] Signup | From Website vOffice.co.id');
    $mail->MsgHTML($message);
    $mail->AddAddress('kevin@cre8.id', 'kevin');
    $mail->AddCC('aulia@voffice.co.id');
    // $mail->AddAddress('aulia@voffice.co.id');
    if ($mail->Send())
    {
        echo "2";
    }
    else
    {
        echo "Mailer Error: " . $mail->ErrorInfo;
    }

}

//Contact Us Page
if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['contact_us_refer'] != "")
{

    //get all POST values
    $name    = enc($_POST["name"]);
    $phone   = enc($_POST["phone"]);
    $email   = enc($_POST["email"]);
    $coname  = enc($_POST["coname"]);
    $plan    = enc($_POST["subject"]);
    $message = enc($_POST["message"]);
    $ip      = enc($_POST['ip']);
    $url     = enc($_POST['url']);

    include_once "../sendmail/sendmail.php";

    $message = "<table name='contact_seller' style='border-collapse:collapse';> <tbody>";

    $message .= "[Contact Us] Customer having inquiries, please contact them :
                            <tr><td>&nbsp; </td><td>&nbsp;</td></tr>
                            <tr><td>Name: </td><td>" . $_POST['name'] . "</td></tr>
                            <tr><td>Phone: </td><td>" . $_POST['phone'] . "</td></tr>
                            <tr><td>Email: </td><td>" . $_POST['email'] . "</td></tr>
                            <tr><td>Company Name: </td><td>" . $_POST['coname'] . "</td></tr>
                            <tr><td>Plan: </td><td>" . $_POST['subject'] . "</td></tr>
                            <tr><td>Message: </td><td>" . $_POST['message'] . "</td></tr>
                            <tr><td>&nbsp; </td><td>&nbsp;</td></tr>
                            <tr><td>Source: </td><td> Website </td></tr>
                            <tr><td>From Page: </td><td><a href=" . $_POST['url'] . ">" . $_POST['url'] . "</a></td></tr>
                        ";

    $message .= "</tbody>
            </table>";

    //    $mail->SetFrom('cs@voffice.co.id', 'voffice.co.id');
    $mail->SetFrom('contact@vOffice.co.id', 'Contact');
    $mail->AddReplyTo($_POST['email'], $_POST['name']);
    $mail->Subject = ('[Contact Us] From Website vOffice.co.id');
    $mail->MsgHTML($message);
//    $mail->AddAddress('kevin@cre8.id', 'kevin');
    $mail->AddAddress('cs@voffice.co.id', 'Customer Service');
    $mail->AddBCC('albert.g@voffice.com.my');
    $mail->AddBCC('kevin@cre8.id');
    $mail->AddBCC('adam.goh@voffice.co.id');
    if ($mail->Send())
    {
        echo "2";
    }
    else
    {
        echo "Mailer Error: " . $mail->ErrorInfo;
    }

}

//Gallery Page | Contact Us Pop Up
if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['contact_us'] != "")
{

    //get all POST values
    $name    = enc($_POST["name"]);
    $phone   = enc($_POST["phone"]);
    $email   = enc($_POST["email"]);
    $plan    = enc($_POST["service"]);
    $message = enc($_POST["message"]);
    $ip      = enc($_POST['ip']);
    $url     = enc($_POST['url']);

    include_once "../sendmail/sendmail.php";

    $message = "<table name='contact_seller' style='border-collapse:collapse';> <tbody>";

    $message .= "[Contact Us] Customer having inquiries, please contact them :
                        <tr><td>&nbsp; </td><td>&nbsp;</td></tr>
                        <tr><td>Name: </td><td>" . $_POST['name'] . "</td></tr>
                        <tr><td>Phone: </td><td>" . $_POST['phone'] . "</td></tr>
                        <tr><td>eMail: </td><td>" . $_POST['email'] . "</td></tr>
                        <tr><td>Service: </td><td>" . $_POST['service'] . "</td></tr>
                        <tr><td>Message: </td><td>" . $_POST['message'] . "</td></tr>
                        <tr><td>&nbsp; </td><td>&nbsp;</td></tr>
                        <tr><td>Source: </td><td> Website </td></tr>
                        <tr><td>From Page: </td><td><a href=" . $_POST['url'] . ">" . $_POST['url'] . "</a></td></tr>
                    ";

    $message .= "</tbody>
            </table>";

    //    $mail->SetFrom('cs@voffice.co.id', 'voffice.co.id');
    $mail->SetFrom('contact@vOffice.co.id', 'Contact');
    $mail->AddReplyTo($_POST['email'], $_POST['name']);
    $mail->Subject = ('[Contact Us] From Website vOffice.co.id');
    $mail->MsgHTML($message);
//    $mail->AddAddress('kevin@cre8.id', 'kevin');
    $mail->AddAddress('cs@voffice.co.id', 'Customer Service');
    $mail->AddBCC('albert.g@voffice.com.my');
    $mail->AddBCC('kevin@cre8.id');
    $mail->AddBCC('adam.goh@voffice.co.id');
    if ($mail->Send())
    {
        echo "2";
    }
    else
    {
        echo "Mailer Error: " . $mail->ErrorInfo;
    }

}

//Serviced Office Plan Page
if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['contactsopromo'] != "")
{

    //get all POST values
    $name    = enc($_POST["name"]);
    $phone   = enc($_POST["phone"]);
    $email   = enc($_POST["email"]);
    $plan    = enc($_POST["subject"]);
    $message = enc($_POST["message"]);
    $ip      = enc($_POST['ip']);
    $url     = enc($_POST['url']);

    include_once "../sendmail/sendmail.php";

    $message = "<table name='contact_seller' style='border-collapse:collapse';> <tbody>";

    $message .= "[New Inquiry] Signup Promo Juni Serviced Office, please contact them :
                            <tr><td>&nbsp; </td><td>&nbsp;</td></tr>
                            <tr><td>Name: </td><td>" . $_POST['name'] . "</td></tr>
                            <tr><td>Phone: </td><td>" . $_POST['phone'] . "</td></tr>
                            <tr><td>Email: </td><td>" . $_POST['email'] . "</td></tr>
                            <tr><td>Plan: </td><td>" . $_POST['subject'] . "</td></tr>
                            <tr><td>Message: </td><td>" . $_POST['message'] . "</td></tr>
                            <tr><td>&nbsp; </td><td>&nbsp;</td></tr>
                            <tr><td>Source: </td><td> Website </td></tr>
                            <tr><td>From Page: </td><td><a href=" . $_POST['url'] . ">" . $_POST['url'] . "</a></td></tr>
                        ";

    $message .= "</tbody>
            </table>";

    //    $mail->SetFrom('cs@voffice.co.id', 'voffice.co.id');
    $mail->SetFrom('contact@vOffice.co.id', 'Contact');
    $mail->AddReplyTo($_POST['email'], $_POST['name']);
    $mail->Subject = ('[Serviced Office Promo] Promo Juni Signup | From Website vOffice.co.id');
    $mail->MsgHTML($message);
    $mail->AddAddress('cs@voffice.co.id', 'Customer Service');
//    $mail->AddAddress('kevin@cre8.id', 'kevin');
    $mail->AddCC('astrid@voffice.co.id');
    $mail->AddBCC('albert.g@voffice.com.my');
    $mail->AddBCC('kevin@cre8.id');
    $mail->AddBCC('adam.goh@voffice.co.id');
    if ($mail->Send())
    {
        echo "2";
    }
    else
    {
        echo "Mailer Error: " . $mail->ErrorInfo;
    }

}

//Booking Meeting Room Page
if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['request_meetingroom'] != "")
{

    //get all POST values
    $service  = enc($_POST["service"]);
    $name     = enc($_POST["name"]);
    $phone    = enc($_POST["phone"]);
    $email    = enc($_POST["email"]);
    $message  = enc($_POST["message"]);
    $waktu    = enc($_POST["waktu"]);
    $date     = enc($_POST["date"]);
    $capacity = enc($_POST["capacity"]);
    $location = enc($_POST["location"]);

    if ($service == "hr")
    {
        $service = "Hourly";
    }
    elseif ($service == "plan10")
    {
        $service = "Plan 10";
    }
    elseif ($service == "plan30")
    {
        $service = "Plan 30";
    }
    elseif ($service == "plan50")
    {
        $service = "Plan 50";
    }

    if ($capacity == "1sampai5")
    {
        $capacity = "1 - 5 Orang";
    }
    else if ($capacity == "5sampai10")
    {
        $capacity = " 5 - 10 Orang";
    }
    else if ($capacity == "lebihdari10")
    {
        $capacity = " Lebih dari 10 Orang";
    }

    if ($location == "office8")
    {
        $location = "Office 8, Jakarta Selatan";
    }
    else if ($location == "MR")
    {
        $location = " Menara Rajawali, Jakarta Selatan";
    }
    else if ($location == "CT")
    {
        $location = "Centennial Tower, Jakarta Selatan";
    }
    else if ($location == "MK")
    {
        $location = " Menara Kuningan, Jakarta Selatan";
    }
    else if ($location == "MT")
    {
        $location = " Metropolitan Tower, Jakarta Selatan";
    }
    else if ($location == "TCB")
    {
        $location = "The CEO Building, Jakarta Selatan";
    }
    else if ($location == "GS")
    {
        $location = "Graha Surveyor, Jakarta Selatan";
    }
    else if ($location == "TCT")
    {
        $location = "The City Tower, Jakarta Pusat";
    }
    else if ($location == "KT")
    {
        $location = "Kencana Tower, Jakarta Barat";
    }
    else if ($location == "GS")
    {
        $location = "Grand Slipi Tower, Jakarta Barat";
    }
    else if ($location == "K2T")
    {
        $location = "Kirana 2 Tower, Jakarta Utara";
    }
    else if ($location == "PIK")
    {
        $location = "PIK Avenue, Jakarta Utara";
    }
    else if ($location == "BMT1")
    {
        $location = "Bumi Mandiri Tower I, Surabaya";
    }
    else if ($location == "BMT2")
    {
        $location = "Bumi Mandiri Tower II, Surabaya";
    }
    else if ($location == "IT")
    {
        $location = "Intiland Tower, Surabaya";
    }
    else if ($location == "SPAZIO")
    {
        $location = "Spazio, Surabaya";
    }
    else if ($location == "IBIS")
    {
        $location = "Ibis Style, Surabaya";
    }

    include_once "../sendmail/sendmail.php";

    $message = "<table name='contact_seller' style='border-collapse:collapse';> <tbody>";

    $message .= "[New Inquiry] Booking Meeting Room, please contact them :
                            <tr><td>&nbsp; </td><td>&nbsp;</td></tr>
                            <tr><td>Name: </td><td>" . $_POST['name'] . "</td></tr>
                            <tr><td>Phone: </td><td>" . $_POST['phone'] . "</td></tr>
                            <tr><td>Email: </td><td>" . $_POST['email'] . "</td></tr>
                            <tr><td>Plan: </td><td>" . $service . "</td></tr>
                            <tr><td>Lokasi: </td><td>" . $location . "</td></tr>
                            <tr><td>Kapasitas Orang: </td><td>" . $capacity . "</td></tr>
                            <tr><td>Message: </td><td>" . $_POST['message'] . "</td></tr>
                            <tr><td>&nbsp; </td><td>&nbsp;</td></tr>
                            <tr><td>Source: </td><td> Website </td></tr>
                            <tr><td>From Page: </td><td><a href=" . $_POST['url'] . ">" . $_POST['url'] . "</a></td></tr>
                        ";

    $message .= "</tbody>
            </table>";

    //    $mail->SetFrom('cs@voffice.co.id', 'voffice.co.id');
    $mail->SetFrom('contact@vOffice.co.id', 'Contact');
    $mail->AddReplyTo($_POST['email'], $_POST['name']);
    $mail->Subject = "[Meeting Room] Booking | From Website vOffice.co.id";
    $mail->MsgHTML($message);
//        $mail->AddAddress('kevin@cre8.id', 'kevin');
    $mail->AddAddress('cs@voffice.co.id', 'Customer Service');
    $mail->AddCC('astrid@voffice.co.id');
    $mail->AddBCC('albert.g@voffice.com.my');
    $mail->AddBCC('kevin@cre8.id');
    $mail->AddBCC('adam.goh@voffice.co.id');
    if ($mail->Send())
    {
        echo "2";
    }
    else
    {
        echo "Mailer Error: " . $mail->ErrorInfo;
    }
}

//New Loc Rawamangun Jakarta Timur Page
if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['jaktim'] != "")
{

    //get all POST values
    $name    = enc($_POST["name"]);
    $phone   = enc($_POST["phone"]);
    $email   = enc($_POST["email"]);
    $plan    = enc($_POST["plan"]);
    $message = enc($_POST["message"]);
    $ip      = enc($_POST['ip']);
    $url     = enc($_POST['url']);

    if ($plan == "Virtual Office")
    {
        $plan = "Virtual Office";
    }
    elseif ($plan == "Serviced Office")
    {
        $plan = "Serviced Office";
    }

    include_once "../sendmail/sendmail.php";

    $message = "<table name='contact_seller' style='border-collapse:collapse';> <tbody>";

    $message .= "[New Inquiry] vOffice Jakarta Timur Rawamangun, please contact them :
                            <tr><td>&nbsp; </td><td>&nbsp;</td></tr>
                            <tr><td>Name: </td><td>" . $_POST['name'] . "</td></tr>
                            <tr><td>Phone: </td><td>" . $_POST['phone'] . "</td></tr>
                            <tr><td>Email: </td><td>" . $_POST['email'] . "</td></tr>
                            <tr><td>Plan : </td><td>" . $_POST['plan'] . "</td></tr>
                            <tr><td>Message: </td><td>" . $_POST['message'] . "</td></tr>
                            <tr><td>&nbsp; </td><td>&nbsp;</td></tr>
                            <tr><td>Source: </td><td> Website </td></tr>
                            <tr><td>From Page: </td><td><a href=" . $_POST['url'] . ">" . $_POST['url'] . "</a></td></tr>
                        ";

    $message .= "</tbody>
            </table>";

    //    $mail->SetFrom('cs@voffice.co.id', 'voffice.co.id');
    $mail->SetFrom('contact@vOffice.co.id', 'Contact');
    $mail->AddReplyTo($_POST['email'], $_POST['name']);
    $mail->Subject = ('[New Inquiry] vOffice Jakarta Timur Rawamangun | From Website vOffice.co.id');
    $mail->MsgHTML($message);
    $mail->AddAddress('cs@voffice.co.id', 'Customer Service');
    $mail->AddCC('astrid@voffice.co.id');
//    $mail->AddAddress('kevin@cre8.id', 'kevin');
    $mail->AddBCC('albert.g@voffice.com.my');
    $mail->AddBCC('kevin@cre8.id');
    $mail->AddBCC('adam.goh@voffice.co.id');
    if ($mail->Send())
    {
        echo "2";
    }
    else
    {
        echo "Mailer Error: " . $mail->ErrorInfo;
    }

}


//New Loc BSD Page
if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['bsd'] != "")
{

    //get all POST values
    $name    = enc($_POST["name"]);
    $phone   = enc($_POST["phone"]);
    $email   = enc($_POST["email"]);
    $plan    = enc($_POST["plan"]);
    $message = enc($_POST["message"]);
    $ip      = enc($_POST['ip']);
    $url     = enc($_POST['url']);

    if ($plan == "Virtual Office")
    {
        $plan = "Virtual Office";
    }
    elseif ($plan == "Serviced Office")
    {
        $plan = "Serviced Office";
    }

    include_once "../sendmail/sendmail.php";

    $message = "<table name='contact_seller' style='border-collapse:collapse';> <tbody>";

    $message .= "[New Inquiry] vOffice BSD Tanggerang, please contact them :
                            <tr><td>&nbsp; </td><td>&nbsp;</td></tr>
                            <tr><td>Name: </td><td>" . $_POST['name'] . "</td></tr>
                            <tr><td>Phone: </td><td>" . $_POST['phone'] . "</td></tr>
                            <tr><td>Email: </td><td>" . $_POST['email'] . "</td></tr>
                            <tr><td>Plan : </td><td>" . $_POST['plan'] . "</td></tr>
                            <tr><td>Message: </td><td>" . $_POST['message'] . "</td></tr>
                            <tr><td>&nbsp; </td><td>&nbsp;</td></tr>
                            <tr><td>Source: </td><td> Website </td></tr>
                            <tr><td>From Page: </td><td><a href=" . $_POST['url'] . ">" . $_POST['url'] . "</a></td></tr>
                        ";

    $message .= "</tbody>
            </table>";

    //    $mail->SetFrom('cs@voffice.co.id', 'voffice.co.id');
    $mail->SetFrom('contact@vOffice.co.id', 'Contact');
    $mail->AddReplyTo($_POST['email'], $_POST['name']);
    $mail->Subject = ('[New Inquiry] vOffice BSD, Tanggerang | From Website vOffice.co.id');
    $mail->MsgHTML($message);
    $mail->AddAddress('cs@voffice.co.id', 'Customer Service');
    $mail->AddCC('astrid@voffice.co.id');
//    $mail->AddAddress('kevin@cre8.id', 'kevin');
    $mail->AddBCC('albert.g@voffice.com.my');
    $mail->AddBCC('kevin@cre8.id');
    $mail->AddBCC('adam.goh@voffice.co.id');
    if ($mail->Send())
    {
        echo "2";
    }
    else
    {
        echo "Mailer Error: " . $mail->ErrorInfo;
    }

}

//New Loc BSD Page
if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['ct'] != "")
{

    //get all POST values
    $name    = enc($_POST["name"]);
    $phone   = enc($_POST["phone"]);
    $email   = enc($_POST["email"]);
    $plan    = enc($_POST["plan"]);
    $message = enc($_POST["message"]);
    $ip      = enc($_POST['ip']);
    $url     = enc($_POST['url']);

    if ($plan == "Virtual Office")
    {
        $plan = "Virtual Office";
    }
    elseif ($plan == "Serviced Office")
    {
        $plan = "Serviced Office";
    }

    include_once "../sendmail/sendmail.php";

    $message = "<table name='contact_seller' style='border-collapse:collapse';> <tbody>";

    $message .= "[New Inquiry] Serviced Centennial Tower, please contact them :
                            <tr><td>&nbsp; </td><td>&nbsp;</td></tr>
                            <tr><td>Name: </td><td>" . $_POST['name'] . "</td></tr>
                            <tr><td>Phone: </td><td>" . $_POST['phone'] . "</td></tr>
                            <tr><td>Email: </td><td>" . $_POST['email'] . "</td></tr>
                            <tr><td>Plan : </td><td>" . $_POST['plan'] . "</td></tr>
                            <tr><td>Message: </td><td>" . $_POST['message'] . "</td></tr>
                            <tr><td>&nbsp; </td><td>&nbsp;</td></tr>
                            <tr><td>Source: </td><td> Website </td></tr>
                            <tr><td>From Page: </td><td><a href=" . $_POST['url'] . ">" . $_POST['url'] . "</a></td></tr>
                        ";

    $message .= "</tbody>
            </table>";

    //    $mail->SetFrom('cs@voffice.co.id', 'voffice.co.id');
    $mail->SetFrom('contact@vOffice.co.id', 'Contact');
    $mail->AddReplyTo($_POST['email'], $_POST['name']);
    $mail->Subject = ('[New Inquiry] vOffice Centennial Tower, Gatot Subroto | From Website vOffice.co.id');
    $mail->MsgHTML($message);
    $mail->AddAddress('cs@voffice.co.id', 'Customer Service');
    $mail->AddCC('astrid@voffice.co.id');
//    $mail->AddAddress('kevin@cre8.id', 'kevin');
    $mail->AddBCC('albert.g@voffice.com.my');
    $mail->AddBCC('kevin@cre8.id');
    $mail->AddBCC('adam.goh@voffice.co.id');
    if ($mail->Send())
    {
        echo "2";
    }
    else
    {
        echo "Mailer Error: " . $mail->ErrorInfo;
    }

}

//Virtual Office + Pembuatan PT
if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['vopt'] != "")
{

    //get all POST values
    $name    = enc($_POST["name"]);
    $phone   = enc($_POST["phone"]);
    $email   = enc($_POST["email"]);
    $message = enc($_POST["message"]);
    $ip      = enc($_POST['ip']);
    $url     = enc($_POST['url']);

    include_once "../sendmail/sendmail.php";

    $message = "<table name='contact_seller' style='border-collapse:collapse';> <tbody>";

    $message .= "[New Inquiry] Virtual Office Gratis Pembuatan PT , please contact them :
                            <tr><td>&nbsp; </td><td>&nbsp;</td></tr>
                            <tr><td>Name: </td><td>" . $_POST['name'] . "</td></tr>
                            <tr><td>Phone: </td><td>" . $_POST['phone'] . "</td></tr>
                            <tr><td>Email: </td><td>" . $_POST['email'] . "</td></tr>
                            <tr><td>Message: </td><td>" . $_POST['message'] . "</td></tr>
                            <tr><td>&nbsp; </td><td>&nbsp;</td></tr>
                            <tr><td>Source: </td><td> Website </td></tr>
                            <tr><td>From Page: </td><td><a href=" . $_POST['url'] . ">" . $_POST['url'] . "</a></td></tr>
                        ";

    $message .= "</tbody>
            </table>";

    //    $mail->SetFrom('cs@voffice.co.id', 'voffice.co.id');
    $mail->SetFrom('contact@vOffice.co.id', 'Contact');
    $mail->AddReplyTo($_POST['email'], $_POST['name']);
    $mail->Subject = ('[New Inquiry] Virtual Office Gratis Pembuatan PT | From Website vOffice.co.id');
    $mail->MsgHTML($message);
//    $mail->AddAddress('cs@voffice.co.id', 'Customer Service');
    // $mail->AddCC('astrid@voffice.co.id');
    $mail->AddAddress('kevin@cre8.id', 'kevin');
//    $mail->AddBCC('albert.g@voffice.com.my');
//    $mail->AddBCC('kevin@cre8.id');
//    $mail->AddBCC('adam.goh@voffice.co.id');
    if ($mail->Send())
    {
        echo "2";
    }
    else
    {
        echo "Mailer Error: " . $mail->ErrorInfo;
    }

}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['call'] != "")
{

    //get all POST values
    $name    = enc($_POST["name"]);
    $phone   = enc($_POST["phone"]);
    $email   = enc($_POST["email"]);
    $message = enc($_POST["message"]);
    $ip      = enc($_POST['ip']);
    $url     = enc($_POST['url']);

    include_once "../sendmail/sendmail.php";

    $message = "<table name='contact_seller' style='border-collapse:collapse';> <tbody>";

    $message .= "[New Inquiry] Call Answering , please contact them :
                            <tr><td>&nbsp; </td><td>&nbsp;</td></tr>
                            <tr><td>Name: </td><td>" . $_POST['name'] . "</td></tr>
                            <tr><td>Phone: </td><td>" . $_POST['phone'] . "</td></tr>
                            <tr><td>Email: </td><td>" . $_POST['email'] . "</td></tr>
                            <tr><td>Message: </td><td>" . $_POST['message'] . "</td></tr>
                            <tr><td>&nbsp; </td><td>&nbsp;</td></tr>
                            <tr><td>Source: </td><td> Website </td></tr>
                            <tr><td>From Page: </td><td><a href=" . $_POST['url'] . ">" . $_POST['url'] . "</a></td></tr>
                        ";

    $message .= "</tbody>
            </table>";

    //    $mail->SetFrom('cs@voffice.co.id', 'voffice.co.id');
    $mail->SetFrom('contact@vOffice.co.id', 'Contact');
    $mail->AddReplyTo($_POST['email'], $_POST['name']);
    $mail->Subject = ('[New Inquiry] Call Answering | From Website vOffice.co.id');
    $mail->MsgHTML($message);
   $mail->AddAddress('info@helloka.id', 'Helloka.id');
   $mail->AddBCC('albert.g@voffice.com.my');
   $mail->AddBCC('kevin@cre8.id');
   $mail->AddBCC('adam.goh@voffice.co.id');
    if ($mail->Send())
    {
        echo "2";
    }
    else
    {
        echo "Mailer Error: " . $mail->ErrorInfo;
    }

}

//Promo egg citing deals
if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['promo_egg'] != "")
{

    //get all POST values
    $name    = enc($_POST["name"]);
    $phone   = enc($_POST["phone"]);
    $email   = enc($_POST["email"]);
    $message = enc($_POST["message"]);
    $ip      = enc($_POST['ip']);
    $url     = enc($_POST['url']);

    include_once "../sendmail/sendmail.php";

    $message = "<table name='contact_seller' style='border-collapse:collapse';> <tbody>";

    $message .= "[New Inquiry] Promo egg citing deals 50% off on Flexi Desk and 20% off on Meeting room and Event Space , please contact them :
                            <tr><td>&nbsp; </td><td>&nbsp;</td></tr>
                            <tr><td>Name: </td><td>" . $_POST['name'] . "</td></tr>
                            <tr><td>Phone: </td><td>" . $_POST['phone'] . "</td></tr>
                            <tr><td>Email: </td><td>" . $_POST['email'] . "</td></tr>
                            <tr><td>Message: </td><td>" . $_POST['message'] . "</td></tr>
                            <tr><td>&nbsp; </td><td>&nbsp;</td></tr>
                            <tr><td>Source: </td><td> Website </td></tr>
                            <tr><td>From Page: </td><td><a href=" . $_POST['url'] . ">" . $_POST['url'] . "</a></td></tr>
                        ";

    $message .= "</tbody>
            </table>";

    //    $mail->SetFrom('cs@voffice.co.id', 'voffice.co.id');
    $mail->SetFrom('contact@vOffice.co.id', 'Contact');
    $mail->AddReplyTo($_POST['email'], $_POST['name']);
    $mail->Subject = ('[New Inquiry] Promo egg citing deals | From Website vOffice.co.id');
    $mail->MsgHTML($message);
    $mail->AddAddress('cs@voffice.co.id', 'Customer Service');
    $mail->AddCC('astrid@voffice.co.id');
//    $mail->AddAddress('kevin@cre8.id', 'kevin');
    $mail->AddBCC('albert.g@voffice.com.my');
    $mail->AddBCC('kevin@cre8.id');
    $mail->AddBCC('adam.goh@voffice.co.id');
    if ($mail->Send())
    {
        echo "2";
    }
    else
    {
        echo "Mailer Error: " . $mail->ErrorInfo;
    }

}

//New Loc Satrio Tower Page
if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['satrio'] != "")
{

    //get all POST values
    $name    = enc($_POST["name"]);
    $phone   = enc($_POST["phone"]);
    $email   = enc($_POST["email"]);
    $plan    = enc($_POST["plan"]);
    $message = enc($_POST["message"]);
    $ip      = enc($_POST['ip']);
    $url     = enc($_POST['url']);

    if ($plan == "Virtual Office")
    {
        $plan = "Virtual Office";
    }
    elseif ($plan == "Serviced Office")
    {
        $plan = "Serviced Office";
    }
    elseif ($plan == "Event Space")
    {
        $plan = "Event Space";
    }

    include_once "../sendmail/sendmail.php";

    $message = "<table name='contact_seller' style='border-collapse:collapse';> <tbody>";

    $message .= "[New Inquiry] vOffice Satrio Tower, please contact them :
                            <tr><td>&nbsp; </td><td>&nbsp;</td></tr>
                            <tr><td>Name: </td><td>" . $_POST['name'] . "</td></tr>
                            <tr><td>Phone: </td><td>" . $_POST['phone'] . "</td></tr>
                            <tr><td>Email: </td><td>" . $_POST['email'] . "</td></tr>
                            <tr><td>Plan : </td><td>" . $_POST['plan'] . "</td></tr>
                            <tr><td>Message: </td><td>" . $_POST['message'] . "</td></tr>
                            <tr><td>&nbsp; </td><td>&nbsp;</td></tr>
                            <tr><td>Source: </td><td> Website </td></tr>
                            <tr><td>From Page: </td><td><a href=" . $_POST['url'] . ">" . $_POST['url'] . "</a></td></tr>
                        ";

    $message .= "</tbody>
            </table>";

    //    $mail->SetFrom('cs@voffice.co.id', 'voffice.co.id');
    $mail->SetFrom('contact@vOffice.co.id', 'Contact');
    $mail->AddReplyTo($_POST['email'], $_POST['name']);
    $mail->Subject = ('[New Inquiry] vOffice Satrio Tower | From Website vOffice.co.id');
    $mail->MsgHTML($message);
    $mail->AddAddress('cs@voffice.co.id', 'Customer Service');
    $mail->AddCC('astrid@voffice.co.id');
//    $mail->AddAddress('kevin@cre8.id', 'kevin');
    $mail->AddBCC('albert.g@voffice.com.my');
    $mail->AddBCC('kevin@cre8.id');
    $mail->AddBCC('adam.goh@voffice.co.id');
    if ($mail->Send())
    {
        echo "2";
    }
    else
    {
        echo "Mailer Error: " . $mail->ErrorInfo;
    }

}

//New Loc Wisma Barito Page
if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['barito'] != "")
{

    //get all POST values
    $name    = enc($_POST["name"]);
    $phone   = enc($_POST["phone"]);
    $email   = enc($_POST["email"]);
    $plan    = enc($_POST["plan"]);
    $message = enc($_POST["message"]);
    $ip      = enc($_POST['ip']);
    $url     = enc($_POST['url']);

    if ($plan == "Virtual Office")
    {
        $plan = "Virtual Office";
    }
    elseif ($plan == "Serviced Office")
    {
        $plan = "Serviced Office";
    }
    elseif ($plan == "Event Space")
    {
        $plan = "Event Space";
    }

    include_once "../sendmail/sendmail.php";

    $message = "<table name='contact_seller' style='border-collapse:collapse';> <tbody>";

    $message .= "[New Inquiry] vOffice Wisma Barito Pacific, please contact them :
                            <tr><td>&nbsp; </td><td>&nbsp;</td></tr>
                            <tr><td>Name: </td><td>" . $_POST['name'] . "</td></tr>
                            <tr><td>Phone: </td><td>" . $_POST['phone'] . "</td></tr>
                            <tr><td>Email: </td><td>" . $_POST['email'] . "</td></tr>
                            <tr><td>Message: </td><td>" . $_POST['message'] . "</td></tr>
                            <tr><td>Plan : </td><td>" . $_POST['plan'] . "</td></tr>
                            <tr><td>&nbsp; </td><td>&nbsp;</td></tr>
                            <tr><td>Source: </td><td> Website </td></tr>
                            <tr><td>From Page: </td><td><a href=" . $_POST['url'] . ">" . $_POST['url'] . "</a></td></tr>
                        ";

    $message .= "</tbody>
            </table>";

    //    $mail->SetFrom('cs@voffice.co.id', 'voffice.co.id');
    $mail->SetFrom('contact@vOffice.co.id', 'Contact');
    $mail->AddReplyTo($_POST['email'], $_POST['name']);
    $mail->Subject = ('[New Inquiry] vOffice Wisma Barito | From Website vOffice.co.id');
    $mail->MsgHTML($message);
    $mail->AddAddress('cs@voffice.co.id', 'Customer Service');
    $mail->AddCC('astrid@voffice.co.id');
//    $mail->AddAddress('kevin@cre8.id', 'kevin');
    $mail->AddBCC('albert.g@voffice.com.my');
    $mail->AddBCC('kevin@cre8.id');
    $mail->AddBCC('adam.goh@voffice.co.id');
    if ($mail->Send())
    {
        echo "2";
    }
    else
    {
        echo "Mailer Error: " . $mail->ErrorInfo;
    }

}

//Business Partner BD Agent Page
if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['business_partner'] != "")
{

    //get all POST values
    $name    = enc($_POST["name"]);
    $phone   = enc($_POST["phone"]);
    $email   = enc($_POST["email"]);
    $message = enc($_POST["message"]);
    $ip      = enc($_POST['ip']);
    $url     = enc($_POST['url']);

    include_once "../sendmail/sendmail.php";

    $message = "<table name='contact_seller' style='border-collapse:collapse';> <tbody>";

    $message .= "[Signup] Become Our Business Partners, pls contact them :
                            <tr><td>&nbsp; </td><td>&nbsp;</td></tr>
                            <tr><td>Name: </td><td>" . $_POST['name'] . "</td></tr>
                            <tr><td>Phone: </td><td>" . $_POST['phone'] . "</td></tr>
                            <tr><td>Email: </td><td>" . $_POST['email'] . "</td></tr>
                            <tr><td>Message: </td><td>" . $_POST['message'] . "</td></tr>
                            <tr><td>&nbsp; </td><td>&nbsp;</td></tr>
                            <tr><td>Source: </td><td> Website </td></tr>
                            <tr><td>From Page: </td><td><a href=" . $_POST['url'] . ">" . $_POST['url'] . "</a></td></tr>
                        ";

    $message .= "</tbody>
            </table>";

    //    $mail->SetFrom('cs@voffice.co.id', 'voffice.co.id');
    $mail->SetFrom('contact@vOffice.co.id', 'Contact');
    $mail->AddReplyTo($_POST['email'], $_POST['name']);
    $mail->Subject = ('[Business Partner] Signup | From Website vOffice.co.id');
    $mail->MsgHTML($message);
    //    $mail->AddAddress('kevin@cre8.id', 'kevin');
    $mail->AddAddress('yunice@voffice.co.id', 'Yunice');
    $mail->AddCC('rizqi@voffice.co.id', 'Meidina');
    $mail->AddBCC('albert.g@voffice.com.my');
    $mail->AddBCC('kevin@cre8.id');
    $mail->AddBCC('adam.goh@voffice.co.id');
    if ($mail->Send())
    {
        echo "2";
    }
    else
    {
        echo "Mailer Error: " . $mail->ErrorInfo;
    }

}

//Smarter Business Page
if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['sbs'] != "")
{

    //get all POST values
    $name    = enc($_POST["name"]);
    $phone   = enc($_POST["phone"]);
    $email   = enc($_POST["email"]);
    $message = enc($_POST["message"]);
    $ip      = enc($_POST['ip']);
    $url     = enc($_POST['url']);

    include_once "../sendmail/sendmail.php";

    $message = "<table name='contact_seller' style='border-collapse:collapse';> <tbody>";

    $message .= "Ask Us For More and Get 2 Hours Free of Meeting Room! , pls contact them :
                            <tr><td>&nbsp; </td><td>&nbsp;</td></tr>
                            <tr><td>Name: </td><td>" . $_POST['name'] . "</td></tr>
                            <tr><td>Phone: </td><td>" . $_POST['phone'] . "</td></tr>
                            <tr><td>Email: </td><td>" . $_POST['email'] . "</td></tr>
                            <tr><td>Message: </td><td>" . $_POST['message'] . "</td></tr>
                            <tr><td>&nbsp; </td><td>&nbsp;</td></tr>
                            <tr><td>Source: </td><td> Website </td></tr>
                            <tr><td>From Page: </td><td><a href=" . $_POST['url'] . ">" . $_POST['url'] . "</a></td></tr>
                        ";

    $message .= "</tbody>
            </table>";

    //    $mail->SetFrom('cs@voffice.co.id', 'voffice.co.id');
    $mail->SetFrom('contact@vOffice.co.id', 'Contact');
    $mail->AddReplyTo($_POST['email'], $_POST['name']);
    $mail->Subject = ('[Smarter Business Page] Contact Us | From Website vOffice.co.id');
    $mail->MsgHTML($message);
    //    $mail->AddAddress('kevin@cre8.id', 'kevin');
    $mail->AddAddress('hestiana@voffice.co.id', 'Hesti');
    $mail->AddBCC('albert.g@voffice.com.my');
    $mail->AddBCC('kevin@cre8.id');
    $mail->AddBCC('adam.goh@voffice.co.id');
    if ($mail->Send())
    {
        echo "2";
    }
    else
    {
        echo "Mailer Error: " . $mail->ErrorInfo;
    }

}

//Tanya Virtual Office - What is Virtual Office Page
if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['tanyavo'] != "")
{

    //get all POST values
    $name    = enc($_POST["name"]);
    $phone   = enc($_POST["phone"]);
    $email   = enc($_POST["email"]);
    $message = enc($_POST["message"]);
    $ip      = enc($_POST['ip']);
    $url     = enc($_POST['url']);

    include_once "../sendmail/sendmail.php";

    $message = "<table name='contact_seller' style='border-collapse:collapse';> <tbody>";

    $message .= "Question about virtual office :
                            <tr><td>&nbsp; </td><td>&nbsp;</td></tr>
                            <tr><td>Name: </td><td>" . $_POST['name'] . "</td></tr>
                            <tr><td>Phone: </td><td>" . $_POST['phone'] . "</td></tr>
                            <tr><td>Email: </td><td>" . $_POST['email'] . "</td></tr>
                            <tr><td>Message: </td><td>" . $_POST['message'] . "</td></tr>
                            <tr><td>&nbsp; </td><td>&nbsp;</td></tr>
                            <tr><td>Source: </td><td> Website </td></tr>
                            <tr><td>From Page: </td><td><a href=" . $_POST['url'] . ">" . $_POST['url'] . "</a></td></tr>
                        ";

    $message .= "</tbody>
            </table>";

    //    $mail->SetFrom('cs@voffice.co.id', 'voffice.co.id');
    $mail->SetFrom('contact@vOffice.co.id', 'Contact');
    $mail->AddReplyTo($_POST['email'], $_POST['name']);
    $mail->Subject = ('Question Virtual Office | From Website vOffice.co.id');
    $mail->MsgHTML($message);
    //    $mail->AddAddress('kevin@cre8.id', 'kevin');
    $mail->AddAddress('cs@voffice.co.id', 'Customer Service');
    $mail->AddBCC('albert.g@voffice.com.my');
    $mail->AddBCC('kevin@cre8.id');
    $mail->AddBCC('adam.goh@voffice.co.id');
    $mail->AddBCC('ratu@voffice.co.id');
    if ($mail->Send())
    {
        echo "2";
    }
    else
    {
        echo "Mailer Error: " . $mail->ErrorInfo;
    }

}

//Buat PT + Virtual Office
if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['buatpt'] != "")
{

    //get all POST values

    include_once "../sendmail/sendmail.php";

    $message = "<table name='contact_seller' style='border-collapse:collapse';> <tbody>";

    $message .= "Signup Pembuatan PT + Virtual Office IDR 12 Juta, please contact them
                            <tr><td>Name: </td><td>" . $_POST['name'] . "</td></tr>
                            <tr><td>Phone: </td><td>" . $_POST['phone'] . "</td></tr>
                            <tr><td>Email: </td><td>" . $_POST['email'] . "</td></tr>
                            <tr><td>Message: </td><td>" . $_POST['message'] . "</td></tr>
                        ";

    $message .= "</tbody>
            </table>";

    $mail->SetFrom('cs@voffice.co.id', 'vOffice.co.id');
    $mail->AddReplyTo($_POST['email'], $_POST['name']);
    $mail->Subject = ('[New Signup] Pembuatan PT + Virtual Office | from Website');
    $mail->MsgHTML($message);
    //    $mail->AddAddress('kevin@cre8.id', 'kevin');
    $mail->AddAddress('cs@izin.co.id', 'Izin Team');
    $mail->AddBCC('albert.g@voffice.com.my');
    $mail->AddBCC('kevin@cre8.id');
    $mail->AddBCC('adam.goh@voffice.co.id');
    if ($mail->Send())
    {
        echo "2";
    }
    else
    {
        echo "Mailer Error: " . $mail->ErrorInfo;
    }

}

//crm form
if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['crm'] != "")
{

    $name    = enc($_POST["name"]);
    $phone   = enc($_POST["phone"]);
    $email   = enc($_POST["email"]);
    $message = enc($_POST["message"]);
    $ip      = enc($_POST['ip']);
    $url     = enc($_POST['url']);

    include_once "../sendmail/sendmail.php";

    $message = "<table name='contact_seller' style='border-collapse:collapse';> <tbody>";

    $message .= "Pls contact them :
                            <tr><td>&nbsp; </td><td>&nbsp;</td></tr>
                            <tr><td>Name: </td><td>" . $_POST['name'] . "</td></tr>
                            <tr><td>Phone: </td><td>" . $_POST['phone'] . "</td></tr>
                            <tr><td>Email: </td><td>" . $_POST['email'] . "</td></tr>
                            <tr><td>Message: </td><td>" . $_POST['message'] . "</td></tr>
                             <tr><td>&nbsp; </td><td>&nbsp;</td></tr>
                            <tr><td>Source: </td><td> Website </td></tr>
                            <tr><td>From Page: </td><td><a href=" . $_POST['url'] . ">" . $_POST['url'] . "</a></td></tr>
                        ";

    $message .= "</tbody>
            </table>";

    $mail->SetFrom('contact@vOffice.co.id', 'Contact');
    $mail->AddReplyTo($_POST['email'], $_POST['name']);
    $mail->Subject = ('CRM | From Website');
    $mail->MsgHTML($message);
    $mail->AddAddress('vannesa@voffice.co.id', 'Vanessa');
    $mail->AddBCC('kevin@cre8.id', 'kevin');
    $mail->AddBCC('albert.g@voffice.com.my');
    $mail->AddBCC('kevin@cre8.id');
    $mail->AddBCC('adam.goh@voffice.co.id');
    if ($mail->Send())
    {
        echo "2";
    }
    else
    {
        echo "Mailer Error: " . $mail->ErrorInfo;
    }
}

//vambassador form
if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['vambassador'] != "")
{

    $name    = enc($_POST["name"]);
    $phone   = enc($_POST["phone"]);
    $email   = enc($_POST["email"]);
    $message = enc($_POST["message"]);
    $ip      = enc($_POST['ip']);
    $url     = enc($_POST['url']);

    include_once "../sendmail/sendmail.php";

    $message = "<table name='contact_seller' style='border-collapse:collapse';> <tbody>";

    $message .= "Pls contact them :
                            <tr><td>&nbsp; </td><td>&nbsp;</td></tr>
                            <tr><td>Name: </td><td>" . $_POST['name'] . "</td></tr>
                            <tr><td>Phone: </td><td>" . $_POST['phone'] . "</td></tr>
                            <tr><td>Email: </td><td>" . $_POST['email'] . "</td></tr>
                            <tr><td>Message: </td><td>" . $_POST['message'] . "</td></tr>
                            <tr><td>&nbsp; </td><td>&nbsp;</td></tr>
                            <tr><td>Source: </td><td> Website </td></tr>
                            <tr><td>From Page: </td><td><a href=" . $_POST['url'] . ">" . $_POST['url'] . "</a></td></tr>
                        ";

    $message .= "</tbody>
            </table>";

    $mail->SetFrom('contact@vOffice.co.id', 'Contact');
    $mail->AddReplyTo($_POST['email'], $_POST['name']);
    $mail->Subject = ('VAmbassador | From Website');
    $mail->MsgHTML($message);
    $mail->AddAddress('vanessa@voffice.co.id', 'Vanessa');
    $mail->AddBCC('albert.g@voffice.com.my');
    $mail->AddBCC('kevin@cre8.id');
    $mail->AddBCC('adam.goh@voffice.co.id');
    if ($mail->Send())
    {
        echo "2";
    }
    else
    {
        echo "Mailer Error: " . $mail->ErrorInfo;
    }

}

//test form
if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['mail'] != "")
{

    $name    = enc($_POST["form_field_1"]);
    $phone   = enc($_POST["form_field_2"]);
    $email   = enc($_POST["form_field_3"]);
    $message = enc($_POST["form_field_4"]);
    $ip      = enc($_POST['ip']);
    $url     = enc($_POST['url']);

    include_once "../sendmail/sendmail.php";

    $message = "<table name='contact_seller' style='border-collapse:collapse';> <tbody>";

    $message .= "Pls contact them :
                            <tr><td>&nbsp; </td><td>&nbsp;</td></tr>
                            <tr><td>Name: </td><td>" . $_POST['form_field_1'] . "</td></tr>
                            <tr><td>Phone: </td><td>" . $_POST['form_field_2'] . "</td></tr>
                            <tr><td>Email: </td><td>" . $_POST['form_field_3'] . "</td></tr>
                            <tr><td>Message: </td><td>" . $_POST['form_field_4'] . "</td></tr>
                            <tr><td>&nbsp; </td><td>&nbsp;</td></tr>
                            <tr><td>Source: </td><td> Website </td></tr>
                            <tr><td>From Page: </td><td><a href=" . $_POST['url'] . ">" . $_POST['url'] . "</a></td></tr>
                        ";

    $message .= "</tbody>
            </table>";

    $mail->SetFrom('contact@vOffice.co.id', 'Contact');
    $mail->AddReplyTo($_POST['email'], $_POST['name']);
    $mail->Subject = ('Mail | From Website');
    $mail->MsgHTML($message);
    $mail->AddAddress('aulia@voffice.co.id', 'Aulia');
     $mail->AddBCC('kevin@cre8.id');
    if ($mail->Send())
    {
       header("location: /virtual-office-pt.php");
    }
    else
    {
        echo "Mailer Error: " . $mail->ErrorInfo;
    }

}


//Merry riana
if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['merry_riana'] != "")
{

    $name    = enc($_POST["name"]);
    $phone   = enc($_POST["phone"]);
    $email   = enc($_POST["email"]);
    $message = enc($_POST["message"]);
    $ip      = enc($_POST['ip']);
    $url     = enc($_POST['url']);

    include_once "../sendmail/sendmail.php";

    $message = "<table name='contact_seller' style='border-collapse:collapse';> <tbody>";

    $message .= "Pls contact them :
                            <tr><td>&nbsp; </td><td>&nbsp;</td></tr>
                            <tr><td>Name: </td><td>" . $_POST['name'] . "</td></tr>
                            <tr><td>Phone: </td><td>" . $_POST['phone'] . "</td></tr>
                            <tr><td>Email: </td><td>" . $_POST['email'] . "</td></tr>
                            <tr><td>Message: </td><td>" . $_POST['message'] . "</td></tr>
                            <tr><td>&nbsp; </td><td>&nbsp;</td></tr>
                            <tr><td>Source: </td><td> Website </td></tr>
                            <tr><td>From Page: </td><td><a href=" . $_POST['url'] . ">" . $_POST['url'] . "</a></td></tr>
                        ";

    $message .= "</tbody>
            </table>";

    $mail->SetFrom('contact@vOffice.co.id', 'Contact');
    $mail->AddReplyTo($_POST['email'], $_POST['name']);
    $mail->Subject = ('Daftar Public Speaking Classes | From Website');
    $mail->MsgHTML($message);
    $mail->AddAddress('haekal@voffice.co.id', 'Haekal');
    $mail->AddBCC('albert.g@voffice.com.my');
    $mail->AddBCC('kevin@cre8.id');
    $mail->AddBCC('adam.goh@voffice.co.id');
    if ($mail->Send())
    {
        echo "2";
    }
    else
    {
        echo "Mailer Error: " . $mail->ErrorInfo;
    }

}

//Stranger Page
if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['strangerpage'] != "")
{

    $name    = enc($_POST["name"]);
    $phone   = enc($_POST["phone"]);
    $email   = enc($_POST["email"]);
    $message = enc($_POST["message"]);
    $ip      = enc($_POST['ip']);
    $url     = enc($_POST['url']);

    include_once "../sendmail/sendmail.php";

    $message = "<table name='contact_seller' style='border-collapse:collapse';> <tbody>";

    $message .= "[From Stranger Page] Customer having inquiries, Pls contact them :
                            <tr><td>&nbsp; </td><td>&nbsp;</td></tr>
                            <tr><td>Name: </td><td>" . $_POST['name'] . "</td></tr>
                            <tr><td>Phone: </td><td>" . $_POST['phone'] . "</td></tr>
                            <tr><td>Email: </td><td>" . $_POST['email'] . "</td></tr>
                            <tr><td>Message: </td><td>" . $_POST['message'] . "</td></tr>
                            <tr><td>&nbsp; </td><td>&nbsp;</td></tr>
                            <tr><td>Source: </td><td> Website </td></tr>
                            <tr><td>From Page: </td><td><a href=" . $_POST['url'] . ">" . $_POST['url'] . "</a></td></tr>
                        ";

    $message .= "</tbody>
            </table>";

    $mail->SetFrom('contact@vOffice.co.id', 'Contact');
    $mail->AddReplyTo($_POST['email'], $_POST['name']);
    $mail->Subject = ('[Inquiry From Stranger Page] | From Website vOffice.co.id');
    $mail->MsgHTML($message);
    // $mail->AddAddress('hestiana@voffice.co.id', 'Hestiana Larasati');
    // $mail->AddBCC('albert.g@voffice.com.my');
    $mail->AddBCC('kevin@cre8.id');
    $mail->AddBCC('javad@flexiesolutions.com');
    if ($mail->Send())
    {
        echo "2";
//        header("Location:http://voffice.co.id/jakarta-virtual-office/thank-you.php");
    }
    else
    {
        echo "Mailer Error: " . $mail->ErrorInfo;
    }

}
//Konsultasi Gratis
if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['konsultasi'] != "")
{

    //get all POST values
    $name    = enc($_POST["name"]);
    $phone   = enc($_POST["phone"]);
    $email   = enc($_POST["email"]);
    $message = enc($_POST["message"]);
    $ip      = enc($_POST['ip']);
    $url     = enc($_POST['url']);

    include_once "../sendmail/sendmail.php";

    $message = "<table name='contact_seller' style='border-collapse:collapse';> <tbody>";

    $message .= "[New Inquiry] Konsultasi Pajak Gratis , please contact them :
                            <tr><td>&nbsp; </td><td>&nbsp;</td></tr>
                            <tr><td>Name: </td><td>" . $_POST['name'] . "</td></tr>
                            <tr><td>Phone: </td><td>" . $_POST['phone'] . "</td></tr>
                            <tr><td>Email: </td><td>" . $_POST['email'] . "</td></tr>
                            <tr><td>Message: </td><td>" . $_POST['message'] . "</td></tr>
                            <tr><td>&nbsp; </td><td>&nbsp;</td></tr>
                            <tr><td>Source: </td><td> Website </td></tr>
                            <tr><td>From Page: </td><td><a href=" . $_POST['url'] . ">" . $_POST['url'] . "</a></td></tr>
                        ";

    $message .= "</tbody>
            </table>";

    //    $mail->SetFrom('cs@voffice.co.id', 'voffice.co.id');
    $mail->SetFrom('contact@vOffice.co.id', 'Contact');
    $mail->AddReplyTo($_POST['email'], $_POST['name']);
    $mail->Subject = ('[New Inquiry] Konsultasi Pajak Gratis | From Website vOffice.co.id');
    $mail->MsgHTML($message);
//    $mail->AddAddress('cs@voffice.co.id', 'Customer Service');
    // $mail->AddCC('astrid@voffice.co.id');
    $mail->AddAddress('kevin@cre8.id', 'kevin');
//    $mail->AddBCC('albert.g@voffice.com.my');
//    $mail->AddBCC('kevin@cre8.id');
//    $mail->AddBCC('adam.goh@voffice.co.id');
    if ($mail->Send())
    {
        echo "2";
    }
    else
    {
        echo "Mailer Error: " . $mail->ErrorInfo;
    }

}