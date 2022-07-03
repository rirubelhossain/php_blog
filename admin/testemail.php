<?php 
    $to = "rirubel28@gmail.com";
    $subject = "Test Mail";
    $headers = "From: rubelphp94@gmail.com\r\n";
    $headers .= "Reply-To: replytomail@gmail.com\r\n";
    $headers .= "CC: emrirubel421@gmail.com\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
    $message = '<html><body>';
    $message .= '<img src="//css-tricks.com/examples/WebsiteChangeRequestForm/images/wcrf-header.png" alt="Website Change Request" />';
    $message .= '<table rules="all" style="border-color: #666;" cellpadding="10">';
    $message .= "<tr style='background: #eee;'><td><strong>Name:</strong> </td><td>Details</td></tr>";
    $message .= "<tr><td><strong>Email:</strong> </td><td>Details</td></tr>";
    $message .= "<tr><td><strong>Type of Change:</strong> </td><td>Details</td></tr>";
    $message .= "<tr><td><strong>Urgency:</strong> </td><td>Details</td></tr>";
    $message .= "<tr><td><strong>URL To Change (main):</strong> </td><td>Details</td></tr>";
    $addURLS = 'google.com';
    if (($addURLS) != '') {
        $message .= "<tr><td><strong>URL To Change (additional):</strong> </td><td>" . $addURLS . "</td></tr>";
    }
    $curText = 'dummy text';           
    if (($curText) != '') {
        $message .= "<tr><td><strong>CURRENT Content:</strong> </td><td>" . $curText . "</td></tr>";
    }
    $message .= "<tr><td><strong>NEW Content:</strong> </td><td>New Text</td></tr>";
    $message .= "</table>";
    $message .= "</body></html>";

    if(mail($to,$subject,$message,$headers))
    {
        echo "Mail Send Sucuceed";
    }
    else{
        echo "Mail Send Failed";    
    }
?>