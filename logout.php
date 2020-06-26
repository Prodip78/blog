<?php
include 'lib/session.php';

   Session::checkSession();

?>

			 <div class="floatleft icon clear">
                        <ul class="inline-ul floatleft">
                            


                    <?php
                    
                        if (isset($_GET['action']) && $_GET['action'] =="logout" ) {
                          session::destroy();
                        }


                        ?>


                            </li>
                            <li><a href="logout.php?action=logout">Logout</a></li>
                        </ul>
                    </div>