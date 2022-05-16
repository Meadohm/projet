     	 
         
    <?php $session_id=$_SESSION['Code_Us'];?>
    

         
         <!-- <div class="navbar navbar-fixed-top navbar-inverse"> -->
         <div  class="navbar navbar-inverse">
            <div class="navbar-inner" style="background-color: #0a3326;">
                <div class="container">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>

                    <div class="nav-collapse collapse">

					<ul class="nav">
                        
					<?php

					$query=mysqli_query($conn, "select * from usager where CodeUs='$session_id'")

                    or die(mysqli_error($conn));

					$row=mysqli_fetch_array($query);
					?>

					<li>
                        <a href="dasboard.php" class="">
                        <i class="icon-home icon-large"></i></a>
                    </li>

					<li class="" ><a href="dasboard.php" class="">Bienvenue :&nbsp;
                    <i class="icon-user icon-large"></i>&nbsp;
                    <?php echo ucwords($row['NomUs']); ?>
                    </a></li>	

					<li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu">
                        <li><a href=""><i class="icon-pencil icon-large"> <!-- edit_info.php -->

                        </i>&nbsp;Modifier les informations</a></li>
                        <li><a href="myRdv.php"><i class="icon-file-alt icon-large"> <!-- myschedule.php-->

                        </i>&nbsp;Mes Rendez-vous</a></li>
                        <li><a href="logout.php"><i class="icon-signout icon-large"> <!-- myschedule.php-->

                        </i>Se déconnecter</a></li>
                        </ul>
                        </li>
                        
                            </ul>
                            
                            <ul>
                            <li>
                            <a href="#" style="margin-left: 40rem; font-size:20px; margin:20px;" 
                            
                            class="">Déconnexion</a>
                            </li>
                            </ul>
                    </div>
                </div>
            </div>
        </div>

	     
    