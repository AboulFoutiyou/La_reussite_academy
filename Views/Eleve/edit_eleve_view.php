<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un Élève</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Modifier un Élève</h1>

        <?php if (isset($error)): ?>
            <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>

        <?php if (isset($eleve)): ?>

            <form action="edit_eleve.php" method="POST">
                <input type="hidden" name="id" value="<?= htmlspecialchars($eleve['id']) ?>">
                
                <!-- <div class="form-group">
                    <label for="matricule">Matricule</label>
                    <input type="text" class="form-control" id="matricule" name="matricule" value="<?= htmlspecialchars($eleve['matricule']) ?>" required>
                </div> -->

                <div class="form-group">
                    <label for="nom">Nom</label>
                    <input type="text" class="form-control" id="nom" name="nom" value="<?= htmlspecialchars($eleve['nom']) ?>" required>
                </div>

                <div class="form-group">
                    <label for="prenom">Prénom</label>
                    <input type="text" class="form-control" id="prenom" name="prenom" value="<?= htmlspecialchars($eleve['prenom']) ?>" required>
                </div>

                <div class="form-group">
                    <label for="date_naissance">Date de Naissance</label>
                    <input type="date" class="form-control" id="date_naissance" name="date_naissance" value="<?= htmlspecialchars($eleve['date_naissance']) ?>" required>
                </div>

                <div class="form-group">
                    <label for="nom_tuteur">Nom du Tuteur</label>
                    <input type="text" class="form-control" id="nom_tuteur" name="nom_tuteur" value="<?= htmlspecialchars($eleve['nom_tuteur']) ?>" required>
                </div>

                <div class="form-group">
                    <label for="departement">Département</label>
                    <input type="text" class="form-control" id="departement" name="departement" value="<?= htmlspecialchars($eleve['departement']) ?>" required>
                </div>

                <div class="form-group">
                    <label for="classe">Classe</label>
                    <input type="text" class="form-control" id="classe" name="classe" value="<?= htmlspecialchars($eleve['classe']) ?>" required>
                </div>

                <button type="submit" class="btn btn-primary">Mettre à jour</button>
                <a href="liste_eleves.php" class="btn btn-secondary">Annuler</a>
            </form>
        <?php endif; ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>