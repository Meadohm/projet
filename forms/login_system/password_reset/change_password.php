<?php 

    include 'change_password_process.php' 
    
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Changer le mot de passe</title>

    <link href="../assets/B5/css/bootstrap.min.css" rel="stylesheet" />

                       <!-- Lien du cdn font awesome -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet"/>


    <style type="text/css">

body{

    background-color: #C9E3CC;
    font-family: Courier New, monospace;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    text-align: center;
    padding: 0 20px;
    
}

h1{
    font-family:  monospace, Courier New;
    color: #000;
    font-size: 20px;
    font-weight: 500;
    margin-bottom: 40px;
    text-decoration: underline;
 
    /* background-color: #C18845; */
}

.btn{

    margin-top: 20px;
}

label{

  text-align: left;
  margin-right: 20px;
  margin-top: 10px;
}

input{

    margin-right: 80px;
    margin-top: 5px;
}

.input-field label.active::before{

content: '\f070';
color: #A7001E;

} 

.input-field1  label{

position: absolute;
top: 198px;
right: 300px;
font-size: 1rem;
cursor: pointer;
color: rgba(0, 0, 0, 0.8);

}

.input-field1 input:hover{
 
      color: #ff4754;
    }

.input-field2 input:hover{
 
 color: #ff4754;
}

.input-field2  label{

    position: absolute;
    top: 242px;
    right: 300px;
    font-size: 1rem;
    cursor: pointer;
    color: rgba(0, 0, 0, 0.8);

}

.keyicone {

    position: absolute;
   top: 203px;
   left: 515px;
}

.keyicone1 {

position: absolute;
top: 248px;
left: 545px;
}

.envelopicone{

    position: absolute;
    top: 140px;
    right: 300px;

}

</style>

</head>
<body>
    <div class="container p-3 mt-4 border border-5 rounded-3 bg-info" style="width: 70%">

        <h1 class="display-10 text-center p-2 text-uppercase">
        Changement de mot de passe
        </h1>

        <form action="" method="post" >
            <div class="row mb-3 justify-content-md-center" >
            <i class="envelopicone fas fa-envelope" style="color:#F5DF4D;"></i>
                <label for="inputEmail" class="col-4 col-form-label">E-mail :</label>
                
                <div class="col-lg-6">
                    <input type="email" name="email" id="inputEmail" class="form-control" 
                    placeholder="Entrez votre dresse e-mail actuelle" name="signup_EmailUs"
                      pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" autofocus required>
                </div>
                
            </div>
            <div class="row mb-3 justify-content-md-center">
                <label for="inputPassword" class="col-4 col-form-label">Nouveau mot de passe :</label>

                <div class="col-lg-6 input-field input-field1">

                <i class="keyicone fa fa-key fa-fw" style="color:#F5DF4D;"></i>
                    <input type="password" name="new_password" placeholder="Entrez le mot de passe" 
                    pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                      title="Doit contenir au moins un chiffre et une lettre majuscule
                                        et minuscule, et au moins 8 caractères ou plus"
                        id="inputPassword" class="form-control" required />
                            <label class="fas fa-eye"></label>
                </div>

                <label for="inputPasswordRepet" class="col-4 col-form-label">Répétez le mot de passe :</label>

                <div class="col-lg-6 input-field input-field2">

                <i class="keyicone1 fa fa-key fa-fw" style="color:#F5DF4D;"></i>
                    <input type="password" name="repet_password" placeholder="Confirmez le mot de passe" 
                    pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                      title="Doit contenir au moins un chiffre et une lettre majuscule
                                       et minuscule, et au moins 8 caractères ou plus"
                                id="inputPasswordRepet" class="form-control" required />
                                <label class="fas fa-eye"></label>
                </div>

            </div>

            <div class="row mb-3 justify-content-md-center">
                <div class="col-8">
                    <button type="submit" class="btn btn-primary" name="change">
                        Modifier maintenant</button>
                </div>
            </div>
        </form>
    </div>


     <script type="text/javascript">

                let input1 = document.querySelector(".input-field1 input");
                let showbtn1 = document.querySelector(".input-field1 label");

                showbtn1.onclick = function () {

                if(input1.type === "password"){

                    input1.type = "text";
                    showbtn1.classList.add('active');
                }
                else{

                    input1.type = "password";
                    showbtn1.classList.remove('active');
                }
                }




            let input2 = document.querySelector(".input-field2 input");
            let showbtn2 = document.querySelector(".input-field2 label");

            showbtn2.onclick = function () {

            if(input2.type === "password"){

                input2.type = "text";
                showbtn2.classList.add('active');
            }
            else{

                input2.type = "password";
                showbtn2.classList.remove('active');
            }
            }

     </script>



</body>
</html>