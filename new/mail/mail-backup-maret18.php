<?php session_start();
//print_r($_POST);echo "<br>";
if ($_POST[pass1] != $_POST[pass2]) {
    echo "Verification Do Not Match!";
    die();
}
//print_r($_POST);
function enc($d)
{
    $d = htmlspecialchars(stripslashes(trim($d)));
    return $d;
}

//notify email
if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['notify_email'] != "") {

    //get all POST values
    $email = enc($_POST["notify_email"]);
    include_once "../sendmail/sendmail.php";

    $msg = "Notify Me of Virtual Office Indonesia offers: " . $email;

    $mail->SetFrom('cs@vOffice.co.id', 'Notify Me');
    $mail->Subject = ('Notify Me @ voffice.co.id (From Website)');
    $mail->MsgHTML($msg);
//    $mail->AddAddress('Javad@flexiesolutions.com', 'Javad');
    $mail->AddAddress('cs@voffice.co.id', 'Customer Service');
    $mail->AddBCC('albert.g@voffice.com.my');
    $mail->AddBCC('kevin@cre8.id');
    $mail->AddBCC('adam.goh@voffice.co.id');
    if ($mail->Send()) {
        echo "2";
    } else {
        echo "Mailer Error: " . $mail->ErrorInfo;
    }

}

//contact us popup
if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['contact_us'] != "") {

    //get all POST values

    include_once "../sendmail/sendmail.php";

    $message = "<table name='contact_seller' style='border-collapse:collapse';> <tbody>";

    $message .= "
                            <tr><td>First Name: </td><td>" . $_POST['firstname'] . "</td></tr>
                            <tr><td>Last Name: </td><td>" . $_POST['lastname'] . "</td></tr>
                            <tr><td>Phone: </td><td>" . $_POST['phone'] . "</td></tr>
                            <tr><td>eMail: </td><td>" . $_POST['email'] . "</td></tr>
                            <tr><td>Service: </td><td>" . $_POST['service'] . "</td></tr>
                            <tr><td>Message: </td><td>" . $_POST['message'] . "</td></tr>
                        ";

    $message .= "</tbody>
            </table>";

    $mail->SetFrom('cs@voffice.co.id', 'voffice.co.id');
    $mail->AddReplyTo($_POST['email'], $_POST['firstname']);
    $mail->Subject = ('Contact Us @ voffice.co.id (From Website)');
    $mail->MsgHTML($message);
//    $mail->AddAddress('Javad@flexiesolutions.com', 'Javad');
    $mail->AddAddress('cs@voffice.co.id', 'Customer Service');
    $mail->AddBCC('albert.g@voffice.com.my');
    $mail->AddBCC('kevin@cre8.id');
    $mail->AddBCC('adam.goh@voffice.co.id');
    if ($mail->Send()) {
        echo "2";
    } else {
        echo "Mailer Error: " . $mail->ErrorInfo;
    }

}

//schedule visit
if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['Schedule_a_Visit'] != "") {

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
    if ($mail->Send()) {
        echo "2";
    } else {
        echo "Mailer Error: " . $mail->ErrorInfo;
    }

}

//flexible serviced office Inquire
if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['Schedule_a_Visit_flexible'] != "") {

    //get all POST values
    $plan = enc($_POST["plan"]);
    $name = enc($_POST["name"]);
    $phone = enc($_POST["phone"]);
    $email = enc($_POST["email"]);
    $message = enc($_POST["message"]);
    $capacity = enc($_POST["capacity"]);
    $location = enc($_POST["location"]);

    if ($plan == "hr") {
        $plan = "Hourly";
    } elseif ($plan == "dl") {
        $plan = "Daily";
    } elseif ($plan == "mn") {
        $plan = "Monthly";
    } elseif ($plan == "lt") {
        $plan = "Long Term";
    }

    if ($capacity == "1") {
        $capacity = "1 Orang";
    } else if ($capacity == "2") {
        $capacity = " 2 Orang";
    } else if ($capacity == "3") {
        $capacity = " 3 Orang";
    } else if ($capacity == "4") {
        $capacity = " 4 Orang";
    } else if ($capacity == "5") {
        $capacity = " 5 Orang";
    } else if ($capacity == "6+") {
        $capacity = " Lebih dari 6 Orang";
    }

    if ($location == "office8") {
        $location = "Office 8, Jakarta Selatan";
    } else if ($location == "MR") {
        $location = " Menara Rajawali, Jakarta Selatan";
    } else if ($location == "CT") {
        $location = "Centennial Tower, Jakarta Selatan";
    } else if ($location == "MK") {
        $location = " Menara Kuningan, Jakarta Selatan";
    } else if ($location == "MT") {
        $location = " Metropolitan Tower, Jakarta Selatan";
    } else if ($location == "TCB") {
        $location = "The CEO Building, Jakarta Selatan";
    } else if ($location == "GS") {
        $location = "Graha Surveyor, Jakarta Selatan";
    } else if ($location == "TCT") {
        $location = "The City Tower, Jakarta Pusat";
    } else if ($location == "KT") {
        $location = "Kencana Tower, Jakarta Barat";
    } else if ($location == "GS") {
        $location = "Grand Slipi Tower, Jakarta Barat";
    } else if ($location == "K2T") {
        $location = "Kirana 2 Tower, Jakarta Utara";
    } else if ($location == "PIK") {
        $location = "PIK Avenue, Jakarta Utara";
    } else if ($location == "BMT1") {
        $location = "Bumi Mandiri Tower I, Surabaya";
    } else if ($location == "BMT2") {
        $location = "Bumi Mandiri Tower II, Surabaya";
    } else if ($location == "IT") {
        $location = "Intiland Tower, Surabaya";
    } else if ($location == "SPAZIO") {
        $location = "Spazio, Surabaya";
    } else if ($location == "IBIS") {
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

    $mail->SetFrom($email, $name);
    $mail->Subject = "[New]Contact Us Inquiry Serviced Office Flexible";
    $mail->Body = $body;
    $mail->IsHTML(true);
    $mail->AddAddress('cs@voffice.co.id', 'Customer Service');
    $mail->AddCC('astrid@voffice.co.id');
    $mail->AddBCC('albert.g@voffice.com.my');
    $mail->AddBCC('kevin@cre8.id');
    $mail->AddBCC('adam.goh@voffice.co.id');
    if ($mail->Send()) {
        echo "2";
    } else {
        echo "Mailer Error: " . $mail->ErrorInfo;
    }
}

//flexible serviced office
if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['serviced_office_flexible'] != "") {

    //get all POST values
    $name = enc($_POST["name"]);
    $phone = enc($_POST["phone"]);
    $email = enc($_POST["email"]);
    $message = enc($_POST["message"]);
    $capacity = enc($_POST["capacity"]);
    $location = enc($_POST["location"]);


    if ($capacity == "1") {
        $capacity = "1 Orang";
    } else if ($capacity == "2") {
        $capacity = " 2 Orang";
    } else if ($capacity == "3") {
        $capacity = " 3 Orang";
    } else if ($capacity == "4") {
        $capacity = " 4 Orang";
    } else if ($capacity == "5") {
        $capacity = " 5 Orang";
    } else if ($capacity == "6+") {
        $capacity = " Lebih dari 6 Orang";
    }

    if ($location == "office8") {
        $location = "Office 8, Jakarta Selatan";
    } else if ($location == "MR") {
        $location = " Menara Rajawali, Jakarta Selatan";
    } else if ($location == "CT") {
        $location = "Centennial Tower, Jakarta Selatan";
    } else if ($location == "MK") {
        $location = " Menara Kuningan, Jakarta Selatan";
    } else if ($location == "MT") {
        $location = " Metropolitan Tower, Jakarta Selatan";
    } else if ($location == "TCB") {
        $location = "The CEO Building, Jakarta Selatan";
    } else if ($location == "GS") {
        $location = "Graha Surveyor, Jakarta Selatan";
    } else if ($location == "TCT") {
        $location = "The City Tower, Jakarta Pusat";
    } else if ($location == "KT") {
        $location = "Kencana Tower, Jakarta Barat";
    } else if ($location == "GS") {
        $location = "Grand Slipi Tower, Jakarta Barat";
    } else if ($location == "K2T") {
        $location = "Kirana 2 Tower, Jakarta Utara";
    } else if ($location == "PIK") {
        $location = "PIK Avenue, Jakarta Utara";
    } else if ($location == "BMT1") {
        $location = "Bumi Mandiri Tower I, Surabaya";
    } else if ($location == "BMT2") {
        $location = "Bumi Mandiri Tower II, Surabaya";
    } else if ($location == "IT") {
        $location = "Intiland Tower, Surabaya";
    } else if ($location == "SPAZIO") {
        $location = "Spazio, Surabaya";
    } else if ($location == "IBIS") {
        $location = "Ibis Style, Surabaya";
    }

    $body = "Name : " . $name . "<br/>";
    $body .= "Phone : " . $phone . "<br/>";
    $body .= "Email : " . $email . "<br/>";
    $body .= "Lokasi : " . $location . "<br/>";
    $body .= "Kapasitas Orang : " . $capacity . "<br/>";
    $body .= "Message : " . $message . "<br/>";

    include_once "../sendmail/sendmail.php";

    $mail->SetFrom($email, $name);
    $mail->Subject = "[New]Contact Us Contact Us Serviced Office Flexible";
    $mail->Body = $body;
    $mail->IsHTML(true);
    $mail->AddAddress('cs@voffice.co.id', 'Customer Service');
    $mail->AddCC('astrid@voffice.co.id');
    $mail->AddBCC('albert.g@voffice.com.my');
    $mail->AddBCC('kevin@cre8.id');
    $mail->AddBCC('adam.goh@voffice.co.id');
    if ($mail->Send()) {
        echo "2";
    } else {
        echo "Mailer Error: " . $mail->ErrorInfo;
    }
}

//serviced office standard
if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['serviced_office_standard'] != "") {

    //get all POST values
    $name = enc($_POST["name"]);
    $phone = enc($_POST["phone"]);
    $email = enc($_POST["email"]);
    $message = enc($_POST["message"]);
    $capacity = enc($_POST["capacity"]);
    $location = enc($_POST["location"]);


    if ($capacity == "1") {
        $capacity = "1 Orang";
    } else if ($capacity == "2") {
        $capacity = " 2 Orang";
    } else if ($capacity == "3") {
        $capacity = " 3 Orang";
    } else if ($capacity == "4") {
        $capacity = " 4 Orang";
    } else if ($capacity == "5") {
        $capacity = " 5 Orang";
    } else if ($capacity == "6+") {
        $capacity = " Lebih dari 6 Orang";
    }

    if ($location == "office8") {
        $location = "Office 8, Jakarta Selatan";
    } else if ($location == "MR") {
        $location = " Menara Rajawali, Jakarta Selatan";
    } else if ($location == "CT") {
        $location = "Centennial Tower, Jakarta Selatan";
    } else if ($location == "MK") {
        $location = " Menara Kuningan, Jakarta Selatan";
    } else if ($location == "MT") {
        $location = " Metropolitan Tower, Jakarta Selatan";
    } else if ($location == "TCB") {
        $location = "The CEO Building, Jakarta Selatan";
    } else if ($location == "GS") {
        $location = "Graha Surveyor, Jakarta Selatan";
    } else if ($location == "TCT") {
        $location = "The City Tower, Jakarta Pusat";
    } else if ($location == "KT") {
        $location = "Kencana Tower, Jakarta Barat";
    } else if ($location == "GS") {
        $location = "Grand Slipi Tower, Jakarta Barat";
    } else if ($location == "K2T") {
        $location = "Kirana 2 Tower, Jakarta Utara";
    } else if ($location == "PIK") {
        $location = "PIK Avenue, Jakarta Utara";
    } else if ($location == "BMT1") {
        $location = "Bumi Mandiri Tower I, Surabaya";
    } else if ($location == "BMT2") {
        $location = "Bumi Mandiri Tower II, Surabaya";
    } else if ($location == "IT") {
        $location = "Intiland Tower, Surabaya";
    } else if ($location == "SPAZIO") {
        $location = "Spazio, Surabaya";
    } else if ($location == "IBIS") {
        $location = "Ibis Style, Surabaya";
    }

    $body = "Name : " . $name . "<br/>";
    $body .= "Phone : " . $phone . "<br/>";
    $body .= "Email : " . $email . "<br/>";
    $body .= "Lokasi : " . $location . "<br/>";
    $body .= "Kapasitas Orang : " . $capacity . "<br/>";
    $body .= "Message : " . $message . "<br/>";

    include_once "../sendmail/sendmail.php";

    $mail->SetFrom($email, $name);
    $mail->Subject = "[New]Contact Us Serviced Office Standard";
    $mail->Body = $body;
    $mail->IsHTML(true);
    $mail->AddAddress('cs@voffice.co.id', 'Customer Service');
    $mail->AddCC('astrid@voffice.co.id');
    $mail->AddBCC('albert.g@voffice.com.my');
    $mail->AddBCC('kevin@cre8.id');
    $mail->AddBCC('adam.goh@voffice.co.id');
    if ($mail->Send()) {
        echo "2";
    } else {
        echo "Mailer Error: " . $mail->ErrorInfo;
    }
}

//serviced office premium
if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['serviced_office_premium'] != "") {

    //get all POST values
    $name = enc($_POST["name"]);
    $phone = enc($_POST["phone"]);
    $email = enc($_POST["email"]);
    $message = enc($_POST["message"]);
    $capacity = enc($_POST["capacity"]);
    $location = enc($_POST["location"]);


    if ($capacity == "1") {
        $capacity = "1 Orang";
    } else if ($capacity == "2") {
        $capacity = " 2 Orang";
    } else if ($capacity == "3") {
        $capacity = " 3 Orang";
    } else if ($capacity == "4") {
        $capacity = " 4 Orang";
    } else if ($capacity == "5") {
        $capacity = " 5 Orang";
    } else if ($capacity == "6+") {
        $capacity = " Lebih dari 6 Orang";
    }

    if ($location == "office8") {
        $location = "Office 8, Jakarta Selatan";
    } else if ($location == "MR") {
        $location = " Menara Rajawali, Jakarta Selatan";
    } else if ($location == "CT") {
        $location = "Centennial Tower, Jakarta Selatan";
    } else if ($location == "MK") {
        $location = " Menara Kuningan, Jakarta Selatan";
    } else if ($location == "MT") {
        $location = " Metropolitan Tower, Jakarta Selatan";
    } else if ($location == "TCB") {
        $location = "The CEO Building, Jakarta Selatan";
    } else if ($location == "GS") {
        $location = "Graha Surveyor, Jakarta Selatan";
    } else if ($location == "TCT") {
        $location = "The City Tower, Jakarta Pusat";
    } else if ($location == "KT") {
        $location = "Kencana Tower, Jakarta Barat";
    } else if ($location == "GS") {
        $location = "Grand Slipi Tower, Jakarta Barat";
    } else if ($location == "K2T") {
        $location = "Kirana 2 Tower, Jakarta Utara";
    } else if ($location == "PIK") {
        $location = "PIK Avenue, Jakarta Utara";
    } else if ($location == "BMT1") {
        $location = "Bumi Mandiri Tower I, Surabaya";
    } else if ($location == "BMT2") {
        $location = "Bumi Mandiri Tower II, Surabaya";
    } else if ($location == "IT") {
        $location = "Intiland Tower, Surabaya";
    } else if ($location == "SPAZIO") {
        $location = "Spazio, Surabaya";
    } else if ($location == "IBIS") {
        $location = "Ibis Style, Surabaya";
    }

    $body = "Name : " . $name . "<br/>";
    $body .= "Phone : " . $phone . "<br/>";
    $body .= "Email : " . $email . "<br/>";
    $body .= "Lokasi : " . $location . "<br/>";
    $body .= "Kapasitas Orang : " . $capacity . "<br/>";
    $body .= "Message : " . $message . "<br/>";

    include_once "../sendmail/sendmail.php";

    $mail->SetFrom($email, $name);
    $mail->Subject = "[New]Contact Us Serviced Office Premium";
    $mail->Body = $body;
    $mail->IsHTML(true);
    $mail->AddAddress('cs@voffice.co.id', 'Customer Service');
    $mail->AddCC('astrid@voffice.co.id');
    $mail->AddBCC('albert.g@voffice.com.my');
    $mail->AddBCC('kevin@cre8.id');
    $mail->AddBCC('adam.goh@voffice.co.id');
    if ($mail->Send()) {
        echo "2";
    } else {
        echo "Mailer Error: " . $mail->ErrorInfo;
    }
}


//dedicated desk
if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['request_dedicateddesk'] != "") {

    //get all POST values
    $name = enc($_POST["name"]);
    $phone = enc($_POST["phone"]);
    $email = enc($_POST["email"]);
    $message = enc($_POST["message"]);
    $plan = enc($_POST["plan"]);


    if ($plan == "sdd") {
        $plan = "Standard Dedicated Desk";
    } else {
        $plan = "Corporate Dedicated Desk";
    }

    $body = "Name : " . $name . "<br/>";
    $body .= "Phone : " . $phone . "<br/>";
    $body .= "Email : " . $email . "<br/>";
    $body .= "Plan : " . $plan . "<br/>";
    $body .= "Message : " . $message . "<br/>";

    include_once "../sendmail/sendmail.php";

    $mail->SetFrom($email, $name);
    $mail->Subject = "[New]Contact Us Dedicated Desk";
    $mail->Body = $body;
    $mail->IsHTML(true);
    $mail->AddAddress('cs@voffice.co.id', 'Customer Service');
    $mail->AddCC('astrid@voffice.co.id');
    $mail->AddBCC('albert.g@voffice.com.my');
    $mail->AddBCC('kevin@cre8.id');
    $mail->AddBCC('adam.goh@voffice.co.id');
    if ($mail->Send()) {
        echo "2";
    } else {
        echo "Mailer Error: " . $mail->ErrorInfo;
    }
}

//dedicated desk
if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['request_coworkingspace'] != "") {

    //get all POST values
    $name = enc($_POST["name"]);
    $phone = enc($_POST["phone"]);
    $email = enc($_POST["email"]);
    $message = enc($_POST["message"]);


    $body = "Name : " . $name . "<br/>";
    $body .= "Phone : " . $phone . "<br/>";
    $body .= "Email : " . $email . "<br/>";
    $body .= "Message : " . $message . "<br/>";

    include_once "../sendmail/sendmail.php";

    $mail->SetFrom($email, $name);
    $mail->Subject = "[New]Contact Us Coworking Space vOffice";
    $mail->Body = $body;
    $mail->IsHTML(true);
    $mail->AddAddress('cs@voffice.co.id', 'Customer Service');
    $mail->AddCC('astrid@voffice.co.id');
    $mail->AddBCC('albert.g@voffice.com.my');
    $mail->AddBCC('kevin@cre8.id');
    $mail->AddBCC('adam.goh@voffice.co.id');
    if ($mail->Send()) {
        echo "2";
    } else {
        echo "Mailer Error: " . $mail->ErrorInfo;
    }
}


//Virtual Office Plan
if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['contactvo'] != "") {

    //get all POST values

    include_once "../sendmail/sendmail.php";

    $message = "<table name='contact_seller' style='border-collapse:collapse';> <tbody>";

    $message .= "New Signup Virtual Office Plan, Please contact them ASAP
                            <tr><td>Name: </td><td>" . $_POST['name'] . "</td></tr>
                            <tr><td>Phone: </td><td>" . $_POST['phone'] . "</td></tr>
                            <tr><td>Email: </td><td>" . $_POST['email'] . "</td></tr>
                            <tr><td>Plan: </td><td>" . $_POST['subject'] . "</td></tr>
                            <tr><td>Message: </td><td>" . $_POST['message'] . "</td></tr>
                        ";

    $message .= "</tbody>
            </table>";

    $mail->SetFrom('cs@voffice.co.id', 'voffice.co.id');
//    $mail->SetFrom('kevin@cre8.id', 'kevin');
    $mail->AddReplyTo($_POST['email'], $_POST['name']);
    $mail->Subject = ('[New Signup VO] Virtual Office Plan | from Website');
    $mail->MsgHTML($message);
    $mail->AddAddress('cs@voffice.co.id', 'Customer Service');
//    $mail->AddAddress('kevin@cre8.id', 'kevin');
    $mail->AddBCC('albert.g@voffice.com.my');
    $mail->AddBCC('kevin@cre8.id');
    $mail->AddBCC('adam.goh@voffice.co.id');
    if ($mail->Send()) {
        echo "2";
    } else {
        echo "Mailer Error: " . $mail->ErrorInfo;
    }

}

//meeting room
if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['meetingroom_inquiry'] != "") {

    //get all POST values

    include_once "../sendmail/sendmail.php";

    $message = "<table name='contact_seller' style='border-collapse:collapse';> <tbody>";

    $message .= "Customer would like to book our meetingroom, please contact them
                            <tr><td>Name: </td><td>" . $_POST['name'] . "</td></tr>
                            <tr><td>Phone: </td><td>" . $_POST['phone'] . "</td></tr>
                            <tr><td>Email: </td><td>" . $_POST['email'] . "</td></tr>
                            <tr><td>Message: </td><td>" . $_POST['message'] . "</td></tr>
                        ";

    $message .= "</tbody>
            </table>";

    $mail->SetFrom('cs@voffice.co.id', 'voffice.co.id');
    $mail->AddReplyTo($_POST['email'], $_POST['name']);
    $mail->Subject = ('Book a Meetingroom @ voffice.co.id (From Website)');
    $mail->MsgHTML($message);
//    $mail->AddAddress('Javad@flexiesolutions.com', 'Javad');
    $mail->AddAddress('cs@voffice.co.id', 'Customer Service');
    $mail->AddCC('astrid@voffice.co.id');
    $mail->AddBCC('albert.g@voffice.com.my');
    $mail->AddBCC('kevin@cre8.id');
    $mail->AddBCC('adam.goh@voffice.co.id');
    if ($mail->Send()) {
        echo "2";
    } else {
        echo "Mailer Error: " . $mail->ErrorInfo;
    }

}

//event space
if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['eventspace_inquiry'] != "") {

    //get all POST values

    include_once "../sendmail/sendmail.php";

    $message = "<table name='contact_seller' style='border-collapse:collapse';> <tbody>";

    $message .= "Customer would like to book our eventspace, please contact them
                            <tr><td>Name: </td><td>" . $_POST['name'] . "</td></tr>
                            <tr><td>Phone: </td><td>" . $_POST['phone'] . "</td></tr>
                            <tr><td>Email: </td><td>" . $_POST['email'] . "</td></tr>
                            <tr><td>Message: </td><td>" . $_POST['message'] . "</td></tr>
                        ";

    $message .= "</tbody>
            </table>";

    $mail->SetFrom('cs@voffice.co.id', 'voffice.co.id');
    $mail->AddReplyTo($_POST['email'], $_POST['name']);
    $mail->Subject = ('Book a Event Space @ voffice.co.id (From Website)');
    $mail->MsgHTML($message);
    // $mail->AddAddress('Javad@flexiesolutions.com', 'Javad');
    $mail->AddAddress('cs@voffice.co.id', 'Customer Service');
    $mail->AddCC('astrid@voffice.co.id');
    $mail->AddBCC('albert.g@voffice.com.my');
    $mail->AddBCC('kevin@cre8.id');
    $mail->AddBCC('adam.goh@voffice.co.id');
    if ($mail->Send()) {
        echo "2";
    } else {
        echo "Mailer Error: " . $mail->ErrorInfo;
    }

}

//serviced office
if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['servicedoffice_inquiry'] != "") {

    //get all POST values

    include_once "../sendmail/sendmail.php";

    $message = "<table name='contact_seller' style='border-collapse:collapse';> <tbody>";

    $message .= "Quick Form, please contact them
                            <tr><td>Name: </td><td>" . $_POST['name'] . "</td></tr>
                            <tr><td>Phone: </td><td>" . $_POST['phone'] . "</td></tr>
                            <tr><td>Email: </td><td>" . $_POST['email'] . "</td></tr>
                            <tr><td>Message: </td><td>" . $_POST['message'] . "</td></tr>
                        ";

    $message .= "</tbody>
            </table>";

    $mail->SetFrom('cs@voffice.co.id', 'voffice.co.id');
    $mail->AddReplyTo($_POST['email'], $_POST['name']);
    $mail->Subject = ('Quick Form Serviced Office @ voffice.co.id (From Website)');
    $mail->MsgHTML($message);
//    $mail->AddAddress('Javad@flexiesolutions.com', 'Javad');
    $mail->AddAddress('cs@voffice.co.id', 'Customer Service');
    $mail->AddCC('astrid@voffice.co.id');
    $mail->AddBCC('albert.g@voffice.com.my');
    $mail->AddBCC('kevin@cre8.id');
    $mail->AddBCC('adam.goh@voffice.co.id');
    if ($mail->Send()) {
        echo "2";
    } else {
        echo "Mailer Error: " . $mail->ErrorInfo;
    }

}

//Contact Us
if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['contact_us_refer'] != "") {

    //get all POST values

    include_once "../sendmail/sendmail.php";

    $message = "<table name='contact_seller' style='border-collapse:collapse';> <tbody>";

    $message .= "<tr><td>Customer having inquiries, please contact them</td></tr>
                            <tr><td>Name: </td><td>" . $_POST['name'] . "</td></tr>
                            <tr><td>Phone: </td><td>" . $_POST['phone'] . "</td></tr>
                            <tr><td>Company Name: </td><td>" . $_POST['coname'] . "</td></tr>
                            <tr><td>Service: </td><td>" . $_POST['subject'] . "</td></tr>
                            <tr><td>Message: </td><td>" . $_POST['message'] . "</td></tr>
                        ";
    $message .= "<br><br>";

    /*$message .=" <tr><td>They would like to refer a friend to vOffice and get a chance to earn rewards. friend's details are as below.</td></tr>
    <tr><td>Name: </td><td>" . $_POST['solutation'].".".$_POST['ffname'] ." ".$_POST['flname']."</td></tr>
    <tr><td>Phone: </td><td>".$_POST['fphone']."</td></tr>
    <tr><td>Time: </td><td>".$_POST['femail']."</td></tr>
    ";*/

    $message .= "</tbody>
            </table>";

    $mail->SetFrom('cs@voffice.co.id', 'voffice.co.id');
    $mail->AddReplyTo($_POST['email'], $_POST['name']);
    $mail->Subject = ('Contact Us @ voffice.co.id (From Website)');
    $mail->MsgHTML($message);
//    $mail->AddAddress('Javad@flexiesolutions.com', 'Javad');
    $mail->AddAddress('cs@voffice.co.id', 'Customer Service');
    $mail->AddBCC('albert.g@voffice.com.my');
    $mail->AddBCC('kevin@cre8.id');
    $mail->AddBCC('adam.goh@voffice.co.id');
    if ($mail->Send()) {
        echo "2";
    } else {
        echo "Mailer Error: " . $mail->ErrorInfo;
    }

}

//Promo
if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['promo'] != "") {

    //get all POST values

    include_once "../sendmail/sendmail.php";

    $message = "<table name='contact_seller' style='border-collapse:collapse';> <tbody>";

    $message .= "[New Inquiry] Promo Imlek, please contact them
                            <tr><td>Name: </td><td>" . $_POST['name'] . "</td></tr>
                            <tr><td>Phone: </td><td>" . $_POST['phone'] . "</td></tr>
                            <tr><td>Email: </td><td>" . $_POST['email'] . "</td></tr>
                            <tr><td>Message: </td><td>" . $_POST['message'] . "</td></tr>
                        ";

    $message .= "</tbody>
            </table>";

    $mail->SetFrom('cs@voffice.co.id', 'voffice.co.id');
//    $mail->SetFrom('kevin@cre8.id', 'kevin');
    $mail->AddReplyTo($_POST['email'], $_POST['name']);
    $mail->Subject = ('[New Inquiry] Promo Imlek vOffice');
    $mail->MsgHTML($message);
    $mail->AddAddress('cs@voffice.co.id', 'Customer Service');
//    $mail->AddAddress('kevin@cre8.id', 'kevin');
    $mail->AddBCC('albert.g@voffice.com.my');
    $mail->AddBCC('kevin@cre8.id');
    $mail->AddBCC('adam.goh@voffice.co.id');
    if ($mail->Send()) {
        echo "2";
    } else {
        echo "Mailer Error: " . $mail->ErrorInfo;
    }

}

//Buat PT + Virtual Office
if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['buatpt'] != "") {

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
//    $mail->SetFrom('kevin@cre8.id', 'kevin');
    $mail->AddReplyTo($_POST['email'], $_POST['name']);
    $mail->Subject = ('[New Signup] Pembuatan PT + Virtual Office | from Website');
    $mail->MsgHTML($message);
    $mail->AddAddress('cs@izin.co.id', 'Izin Team');
//    $mail->AddAddress('kevin@cre8.id', 'kevin');
    $mail->AddBCC('albert.g@voffice.com.my');
    $mail->AddBCC('kevin@cre8.id');
    $mail->AddBCC('adam.goh@voffice.co.id');
    if ($mail->Send()) {
        echo "2";
    } else {
        echo "Mailer Error: " . $mail->ErrorInfo;
    }

}

//pembuatan PT voffice
if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['request_proposal'] != "") {

    //get all POST values
    $service = enc($_POST["service"]);
    $name = enc($_POST["name"]);
    $phone = enc($_POST["phone"]);
    $email = enc($_POST["email"]);
    $message = enc($_POST["message"]);
    $domisili = enc($_POST["domisili"]);

    if ($service == "PT-LITE") {
        $service = "Buat PT - Lite";
    } elseif ($service == "PT-FULL") {
        $service = "Buat PT - Full Service";
    } elseif ($service == "PT-FULL-VO") {
        $service = "Buat PT - Full Service + Virtual Office";
    } elseif ($service == "PMA") {
        $service = "Company Incorporation for Foreigners (PMA)";
    } elseif ($service == "CV") {
        $service = "Buat CV";
    } elseif ($service == "CV-VO") {
        $service = "Buat CV + Virtual Office";
    } elseif ($service == "OTHER") {
        $service = "Other Services";
    }

    $body = "Name : " . $name . "<br/>";
    $body .= "Phone : " . $phone . "<br/>";
    $body .= "Email : " . $email . "<br/>";
    $body .= "Service : " . $service . "<br/>";
    $body .= "Message : " . $message . "<br/>";
    $body .= "Apakah Anda memiliki domisili untuk perusahaan Anda ? : " . $domisili . "<br/><br/><br/>";

    include_once "../sendmail/sendmail.php";

    $mail->SetFrom($email, $name);
    $mail->Subject = "[New]Contact Us Pembuatan PT vOffice";
    $mail->Body = $body;
    $mail->IsHTML(true);
    //$mail->AddAddress('reymarth.voffice@gmail.com');
    $mail->AddAddress('cs@voffice.co.id', 'Customer Service');
    $mail->AddBCC('albert.g@voffice.com.my');
    $mail->AddBCC('kevin@cre8.id');
    $mail->AddBCC('adam.goh@voffice.co.id');
    if ($mail->Send()) {
        echo "2";
    } else {
        echo "Mailer Error: " . $mail->ErrorInfo;
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['request_meetingroom'] != "") {

    //get all POST values
    $service = enc($_POST["service"]);
    $name = enc($_POST["name"]);
    $phone = enc($_POST["phone"]);
    $email = enc($_POST["email"]);
    $message = enc($_POST["message"]);
    $waktu = enc($_POST["waktu"]);
    $date = enc($_POST["date"]);
    $capacity = enc($_POST["capacity"]);
    $location = enc($_POST["location"]);

    if ($service == "hr") {
        $service = "Hourly";
    } elseif ($service == "plan10") {
        $service = "Plan 10";
    } elseif ($service == "plan30") {
        $service = "Plan 30";
    } elseif ($service == "plan50") {
        $service = "Plan 50";
    }

    if ($capacity == "1sampai5") {
        $capacity = "1 - 5 Orang";
    } else if ($capacity == "5sampai10") {
        $capacity = " 5 - 10 Orang";
    } else if ($capacity == "lebihdari10") {
        $capacity = " Lebih dari 10 Orang";
    }

    if ($location == "office8") {
        $location = "Office 8, Jakarta Selatan";
    } else if ($location == "MR") {
        $location = " Menara Rajawali, Jakarta Selatan";
    } else if ($location == "CT") {
        $location = "Centennial Tower, Jakarta Selatan";
    } else if ($location == "MK") {
        $location = " Menara Kuningan, Jakarta Selatan";
    } else if ($location == "MT") {
        $location = " Metropolitan Tower, Jakarta Selatan";
    } else if ($location == "TCB") {
        $location = "The CEO Building, Jakarta Selatan";
    } else if ($location == "GS") {
        $location = "Graha Surveyor, Jakarta Selatan";
    } else if ($location == "TCT") {
        $location = "The City Tower, Jakarta Pusat";
    } else if ($location == "KT") {
        $location = "Kencana Tower, Jakarta Barat";
    } else if ($location == "GS") {
        $location = "Grand Slipi Tower, Jakarta Barat";
    } else if ($location == "K2T") {
        $location = "Kirana 2 Tower, Jakarta Utara";
    } else if ($location == "PIK") {
        $location = "PIK Avenue, Jakarta Utara";
    } else if ($location == "BMT1") {
        $location = "Bumi Mandiri Tower I, Surabaya";
    } else if ($location == "BMT2") {
        $location = "Bumi Mandiri Tower II, Surabaya";
    } else if ($location == "IT") {
        $location = "Intiland Tower, Surabaya";
    } else if ($location == "SPAZIO") {
        $location = "Spazio, Surabaya";
    } else if ($location == "IBIS") {
        $location = "Ibis Style, Surabaya";
    }

    $body = "Name : " . $name . "<br/>";
    $body .= "Phone : " . $phone . "<br/>";
    $body .= "Email : " . $email . "<br/>";
    $body .= "Plan : " . $service . "<br/>";
    $body .= "Lokasi : " . $location . "<br/>";
    $body .= "Kapasitas Orang : " . $capacity . "<br/>";
    $body .= "Message : " . $message . "<br/>";

    include_once "../sendmail/sendmail.php";

    $mail->SetFrom($email, $name);
    $mail->Subject = "[New]Contact Us Booking Meeting Room";
    $mail->Body = $body;
    $mail->IsHTML(true);
    $mail->AddAddress('cs@voffice.co.id', 'Customer Service');
    $mail->AddCC('astrid@voffice.co.id');
    $mail->AddBCC('albert.g@voffice.com.my');
    $mail->AddBCC('kevin@cre8.id');
    $mail->AddBCC('adam.goh@voffice.co.id');
    if ($mail->Send()) {
        echo "2";
    } else {
        echo "Mailer Error: " . $mail->ErrorInfo;
    }
}


//Virtual Office Plan
if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['contactvo'] != "") {

    //get all POST values

    include_once "../sendmail/sendmail.php";

    $message = "<table name='contact_seller' style='border-collapse:collapse';> <tbody>";

    $message .= "New Signup Virtual Office Plan, Please contact them ASAP
                            <tr><td>Name: </td><td>" . $_POST['name'] . "</td></tr>
                            <tr><td>Phone: </td><td>" . $_POST['phone'] . "</td></tr>
                            <tr><td>Email: </td><td>" . $_POST['email'] . "</td></tr>
                            <tr><td>Plan: </td><td>" . $_POST['subject'] . "</td></tr>
                            <tr><td>Message: </td><td>" . $_POST['message'] . "</td></tr>
                        ";

    $message .= "</tbody>
            </table>";

    $mail->SetFrom('cs@voffice.co.id', 'voffice.co.id');
//    $mail->SetFrom('kevin@cre8.id', 'kevin');
    $mail->AddReplyTo($_POST['email'], $_POST['name']);
    $mail->Subject = ('[New Signup VO] Virtual Office Plan | from Website');
    $mail->MsgHTML($message);
    $mail->AddAddress('cs@voffice.co.id', 'Customer Service');
//    $mail->AddAddress('kevin@cre8.id', 'kevin');
    $mail->AddBCC('albert.g@voffice.com.my');
    $mail->AddBCC('kevin@cre8.id');
    $mail->AddBCC('adam.goh@voffice.co.id');
    if ($mail->Send()) {
        echo "2";
    } else {
        echo "Mailer Error: " . $mail->ErrorInfo;
    }

}


//Corporate Desking
if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['corpdesk'] != "") {

    //get all POST values
    $name = enc($_POST["name"]);
    $phone = enc($_POST["phone"]);
    $email = enc($_POST["email"]);
    $message = enc($_POST["message"]);
    $ip = enc($_POST['ip']);
    $url = enc($_POST['url']);

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
    $mail->SetFrom($email, $name);
    $mail->AddReplyTo($_POST['email'], $_POST['name']);
    $mail->Subject = ('[Corporate Dedicated Desk] Contact Us | from Website vOffice.co.id');
    $mail->MsgHTML($message);
    $mail->AddAddress('cs@voffice.co.id', 'Customer Service');
    $mail->AddCC('astrid@voffice.co.id');
//    $mail->AddAddress('kevin@cre8.id', 'kevin');
    $mail->AddBCC('albert.g@voffice.com.my');
    $mail->AddBCC('kevin@cre8.id');
    $mail->AddBCC('adam.goh@voffice.co.id');
    if ($mail->Send()) {
        echo "2";
    } else {
        echo "Mailer Error: " . $mail->ErrorInfo;
    }

}


//New Loc Rawamangun Jakarta Timur
if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['jaktim'] != "") {

    //get all POST values
    $name = enc($_POST["name"]);
    $phone = enc($_POST["phone"]);
    $email = enc($_POST["email"]); 
    $plan = enc($_POST["plan"]);
    $message = enc($_POST["message"]);
    $ip = enc($_POST['ip']);
    $url = enc($_POST['url']);

     if ($plan == "Virtual Office") {
        $plan = "Virtual Office";
    } elseif ($plan == "Serviced Office") {
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
    $mail->SetFrom($email, $name);
    $mail->AddReplyTo($_POST['email'], $_POST['name']);
    $mail->Subject = ('[New Inquiry] vOffice Jakarta Timur Rawamangun | From Website voffice.co.id');
    $mail->MsgHTML($message);
    $mail->AddAddress('cs@voffice.co.id', 'Customer Service');
    $mail->AddCC('astrid@voffice.co.id');
//    $mail->AddAddress('kevin@cre8.id', 'kevin');
    $mail->AddBCC('albert.g@voffice.com.my');
    $mail->AddBCC('kevin@cre8.id');
    $mail->AddBCC('adam.goh@voffice.co.id');
    if ($mail->Send()) {
        echo "2";
    } else {
        echo "Mailer Error: " . $mail->ErrorInfo;
    }

}


//New Loc Satrio Tower
if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['satrio'] != "") {

    //get all POST values
    $name = enc($_POST["name"]);
    $phone = enc($_POST["phone"]);
    $email = enc($_POST["email"]); 
    $plan = enc($_POST["plan"]);
    $message = enc($_POST["message"]);
    $ip = enc($_POST['ip']);
    $url = enc($_POST['url']);

      if ($plan == "Virtual Office") {
        $plan = "Virtual Office";
    } elseif ($plan == "Serviced Office") {
        $plan = "Serviced Office";
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

    $mail->SetFrom('cs@voffice.co.id', 'voffice.co.id');
//    $mail->SetFrom('kevin@cre8.id', 'kevin');
    $mail->AddReplyTo($_POST['email'], $_POST['name']);
    $mail->Subject = ('[New Inquiry] vOffice Satrio Tower | From Website vOffice.co.id');
    $mail->MsgHTML($message);
    $mail->AddAddress('cs@voffice.co.id', 'Customer Service');
    $mail->AddCC('astrid@voffice.co.id');
//    $mail->AddAddress('kevin@cre8.id', 'kevin');
    $mail->AddBCC('albert.g@voffice.com.my');
    $mail->AddBCC('kevin@cre8.id');
    $mail->AddBCC('adam.goh@voffice.co.id');
    if ($mail->Send()) {
        echo "2";
    } else {
        echo "Mailer Error: " . $mail->ErrorInfo;
    }

}


//New Loc Wisma Barito
if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['barito'] != "") {

    //get all POST values
    $name = enc($_POST["name"]);
    $phone = enc($_POST["phone"]);
    $email = enc($_POST["email"]); 
    $plan = enc($_POST["plan"]);
    $message = enc($_POST["message"]);
    $ip = enc($_POST['ip']);
    $url = enc($_POST['url']);

    if ($plan == "Virtual Office") {
        $plan = "Virtual Office";
    } elseif ($plan == "Serviced Office") {
        $plan = "Serviced Office";
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

    $mail->SetFrom('cs@voffice.co.id', 'voffice.co.id');
//    $mail->SetFrom('kevin@cre8.id', 'kevin');
    $mail->AddReplyTo($_POST['email'], $_POST['name']);
    $mail->Subject = ('[New Inquiry] vOffice Wisma Barito | From Website vOffice.co.id');
    $mail->MsgHTML($message);
    $mail->AddAddress('cs@voffice.co.id', 'Customer Service');
    $mail->AddCC('astrid@voffice.co.id');
//    $mail->AddAddress('kevin@cre8.id', 'kevin');
    $mail->AddBCC('albert.g@voffice.com.my');
    $mail->AddBCC('kevin@cre8.id');
    $mail->AddBCC('adam.goh@voffice.co.id');
    if ($mail->Send()) {
        echo "2";
    } else {
        echo "Mailer Error: " . $mail->ErrorInfo;
    }

}


//Business Partner BD Agent Page
if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['business_partner'] != "") {

    //get all POST values
    $name = enc($_POST["name"]);
    $phone = enc($_POST["phone"]);
    $email = enc($_POST["email"]);
    $message = enc($_POST["message"]);
    $ip = enc($_POST['ip']);
    $url = enc($_POST['url']);

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

    $mail->SetFrom($email, $name);
//    $mail->SetFrom('cs@voffice.co.id', 'voffice.co.id');
    $mail->AddReplyTo($_POST['email'], $_POST['name']);
    $mail->Subject = ('[Business Partner] Signup | From Website vOffice.co.id');
    $mail->MsgHTML($message);
    $mail->AddAddress('yunice@voffice.co.id', 'Yunice');
//    $mail->AddAddress('kevin@cre8.id', 'kevin');
    $mail->AddBCC('albert.g@voffice.com.my');
    $mail->AddBCC('kevin@cre8.id');
    $mail->AddBCC('adam.goh@voffice.co.id');
    if ($mail->Send()) {
        echo "2";
    } else {
        echo "Mailer Error: " . $mail->ErrorInfo;
    }

}


//Smarter Business Page
if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['sbs'] != "") {

    //get all POST values
    $name = enc($_POST["name"]);
    $phone = enc($_POST["phone"]);
    $email = enc($_POST["email"]);
    $message = enc($_POST["message"]);
    $ip = enc($_POST['ip']);
    $url = enc($_POST['url']);

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

    $mail->SetFrom($email, $name);
//    $mail->SetFrom('cs@voffice.co.id', 'voffice.co.id');
    $mail->AddReplyTo($_POST['email'], $_POST['name']);
    $mail->Subject = ('[Smarter Business Page] Contact Us | From Website vOffice.co.id');
    $mail->MsgHTML($message);
    $mail->AddAddress('hestiana@voffice.co.id', 'Hesti');
//    $mail->AddAddress('kevin@cre8.id', 'kevin');
    $mail->AddBCC('albert.g@voffice.com.my');
    $mail->AddBCC('kevin@cre8.id');
    $mail->AddBCC('adam.goh@voffice.co.id');
    if ($mail->Send()) {
        echo "2";
    } else {
        echo "Mailer Error: " . $mail->ErrorInfo;
    }

}




//Christmas Sale SO
//if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['request_serviced'] != "") {
//
//    $service = enc($_POST["service"]);
//
//    //get all POST values
//    $name = enc($_POST["name"]);
//    $email = enc($_POST["email"]);
//    $phone = enc($_POST["phone"]);
//    $message = enc($_POST["message"]);
//
//    $body = "[Christmas Deals] Customer having inquiries, please contact them" . "<br/><br/>";
//    $body .= "Name : " . $name . "<br/>";
//    $body .= "Phone : " . $phone . "<br/>";
//    $body .= "Email : " . $email . "<br/>";
//    $body .= "Message : " . $message . "<br/><br/><br/>";
//
//    include_once "../sendmail/sendmail.php";
//
//    $mail->SetFrom($email, $name);
//    $mail->Subject = "[New Inquiry] Christmas Sale Serviced Office | From Website";
//    $mail->Body = $body;
//    $mail->IsHTML(true);
//    $mail->AddAddress('cs@voffice.co.id', 'Customer Service');
//    $mail->AddBCC('kevin@cre8.id');
//    $mail->AddBCC('albert.g@voffice.com.my');
//    $mail->AddBCC('adam.goh@voffice.co.id');
//    if ($mail->Send()) {
//        echo "2";
//    } else {
//        echo "Mailer Error: " . $mail->ErrorInfo;
//    }
//}


//Christmas Sale SO
//if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['request_servicedoffice'] != "") {
//
//    $service = enc($_POST["service"]);
//
//    //get all POST values
//    $name = enc($_POST["name"]);
//    $email = enc($_POST["email"]);
//    $phone = enc($_POST["phone"]);
//    $message = enc($_POST["message"]);
//
//    $body = "[Serviced Office] Customer having inquiries, please contact them" . "<br/><br/>";
//    $body .= "Name : " . $name . "<br/>";
//    $body .= "Phone : " . $phone . "<br/>";
//    $body .= "Email : " . $email . "<br/>";
//    $body .= "Message : " . $message . "<br/><br/><br/>";
//
//    include_once "../sendmail/sendmail.php";
//
//    $mail->SetFrom($email, $name);
//    $mail->Subject = "[New Inquiry]  Serviced Office Page | From Website";
//    $mail->Body = $body;
//    $mail->IsHTML(true);
//    $mail->AddAddress('cs@voffice.co.id', 'Customer Service');
//    $mail->AddBCC('kevin@cre8.id');
//    $mail->AddBCC('albert.g@voffice.com.my');
//    $mail->AddBCC('adam.goh@voffice.co.id');
//    if ($mail->Send()) {
//        echo "2";
//    } else {
//        echo "Mailer Error: " . $mail->ErrorInfo;
//    }
//}