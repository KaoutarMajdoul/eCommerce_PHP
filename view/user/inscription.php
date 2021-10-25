
<br>

<div class="container">

    <form action="./index.php?controller=User&action=inscription" method="post">

        <div class="row">

            <div class="col-6">

                <div class="form-group">
                    <label for="nom">Nom</label>
                    <input type="text" class="form-control" placeholder="Nom" id="nom" name="nom" />
                </div>

            </div>


            <div class="col-6">

                <div class="form-group">
                    <label for="prenom">Prénom</label>
                    <input type="text" class="form-control" placeholder="Prénom" id="prenom" name="prenom" />
                </div>

            </div>

            <div class="col-6">

                <div class="form-group">
                    <label for="mail">Email</label>
                    <input type="email" class="form-control" placeholder="Email" id="mail" name="mail" />
                </div>

            </div>

            <div class="col-6">

                <div class="form-group">
                    <label for="mail">Confirmation de l'email</label>
                    <input type="email" class="form-control" placeholder="Email" id="mail" name="confirm_mail" />
                </div>

            </div>

            <div class="col-6">

                    <div class="form-group">
                        <label for="password">Mot de passe</label>
                        <input type="password" class="form-control" placeholder="Mot de passe" id="password" name="password" />
                    </div>

            </div>

            <div class="col-6">

                    <div class="form-group">
                        <label for="confirm_password">Confirmation du mot de passe</label>
                        <input type="password" class="form-control" placeholder="Confirmation" id="confirm_password" name="confirm_password" />
                    </div>

            </div>

            <div class="col-6">
                    <div class="form-group">
                        <label for="adresse">Adresse</label>
                        <input type="text" class="form-control" placeholder="Adresse" id="adresse" name="adresse" />
                    </div>

            </div>

            <div class="col-6">
                    <div class="form-group">
                        <label for="ville">Ville</label>
                        <input type="text" class="form-control" placeholder="Ville" id="ville" name="ville" />
                    </div>

            </div>

            <div class="col-6">
                    <div class="form-group">
                        <label for="pays">Pays</label>
                        <input type="text" class="form-control" placeholder="Pays" id="pays" name="pays" />
                    </div>
            </div>

            <div class="col-12">
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Inscription</button>
                </div>
            </div>

        </div>

    </form>

</div>