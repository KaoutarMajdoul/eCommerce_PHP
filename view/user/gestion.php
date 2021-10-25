

<table class="table">
    <thead>
    <tr>
        <th>Id</th>
        <th>Nom</th>
        <th>Prénom</th>
        <th>Email</th>
        <th>date Inscription</th>
    </tr>
    </thead>
    <tbody>

<?php
    foreach ($users as $user)
    {
?>

        <form action="./index.php?url=gestionUtilisateurs" method="post">

            <tr>
                <td><?= $user->getId(); ?></td>
                <td><?= $user->getNom(); ?></td>
                <td><?= $user->getPrenom(); ?></td>
                <td><?= $user->getEmail(); ?></td>
                <td><?= $user->getDateInscription(); ?></td>
                <td>
                    <input type="text" name="idUser" value="<?= $user->getId(); ?>" hidden>
                    <button class="btn btn-danger" type="submit">Supprimer</button>
                </td>
            </tr>

        </form>
<?php
    }
?>

    </tbody>
</table>