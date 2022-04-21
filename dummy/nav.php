<?php
  require 'session.php';
  $name=$_SESSION['name'];
 ?>
    <nav class="eng">

      <ul>
        <li><a href="profile.php">Profile</a></li>
        <li><a href="message.php">Message</a></li>
        <li><a href="closed_complaints.php?name=<?php echo $name; ?>">Closed Complaints</a></li>
        <li><a href="open_complaints.php?name=<?php echo $name; ?>">Open Complaints</a></li>
        <!-- <li><a href="mail.php">Send mail</a></li> -->

      </ul>

    </nav>
