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

//Hellolive
if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['hellolive_inquiry'] != "") {

    //get all POST values
    $name = enc($_POST["name"]);
    $phone = enc($_POST["phone"]);
    $email = enc($_POST["email"]);
    $message = enc($_POST["message"]);
    $ip = enc($_POST['ip']);
    $url = enc($_POST['url']);

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
            
    $mail->SetFrom('contact@vOffice.co.id', 'vOffice.co.id');
    $mail->AddReplyTo($_POST['email'], $_POST['name']);
    $mail->Subject = ('[Hellolive] Inquiry | From Website voffice.co.id');
    $mail->MsgHTML($message);

    $mail->AddAddress('vofficecoidcs@voindo.freshdesk.com', 'Customer Service');
    $mail->AddCC('hadiyusuf.voffice@gmail.com');
    if ($mail->Send()) {
        echo "2";
    } else {
        echo "Mailer Error: " . $mail->ErrorInfo;
    }

}
