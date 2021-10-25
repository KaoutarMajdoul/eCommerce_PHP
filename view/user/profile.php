
<br>

<div class="container">

        <div class="row">


            <div class="col-3">

                <ul class="list-group">

                    <li class="list-group-item active">Information</li>
                    <li class="list-group-item ">Modification mot de passe</li>
                    <li class="list-group-item ">Modification email</li>

                </ul>

            </div>


            <div class="col-6">

                <div class="row">

                    <div class="col-6">
                        <p>Nom</p>
                    </div>
                    <div class="col-6">
                        <p><?= $_SESSION['user']['nom']; ?></p>
                    </div>

                </div>



                <div class="row">

                    <div class="col-6">
                        <p>Prénom</p>
                    </div>
                    <div class="col-6">
                        <p><?= $_SESSION['user']['prenom']; ?></p>
                    </div>

                </div>



                <div class="row">

                    <div class="col-6">
                        <p>Email</p>
                    </div>
                    <div class="col-6">
                        <p><?= $_SESSION['user']['email']; ?></p>
                    </div>

                </div>


                <div class="row">

                    <div class="col-6">
                        <p>Adresse</p>
                    </div>
                    <div class="col-6">
                        <p><?= $_SESSION['user']['adresse']; ?></p>
                    </div>

                </div>


                <div class="row">

                    <div class="col-6">
                        <p>Nom ville</p>
                    </div>
                    <div class="col-6">
                        <p><?= $_SESSION['user']['nomVille']; ?></p>
                    </div>

                </div>



                <div class="row">

                    <div class="col-6">
                        <p>Pays</p>
                    </div>
                    <div class="col-6">
                        <p><?= $_SESSION['user']['pays']; ?></p>
                    </div>

                </div>



            </div>
        </div>

</div>