<?php
session_start();
if (isset($_SESSION['message'])) {
    $message = $_SESSION['message'];
    unset($_SESSION['message']);
}
if (isset($_SESSION['error'])) {
    $error = $_SESSION['error'];
    unset($_SESSION['error']);
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire d'inscription des élèves</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        .form-container {
            background-color: #ededed; /* Gris clair */
            padding: 20px;
            border-radius: 8px;
        }

        .btn-green {
            background-color: #18BE78; /* Vert */
            color: #fff;
        }

        .btn-green:hover {
            background-color: #0D5E3C; /* Vert foncé pour le hover */
        }

        .text-success {
            color: #18BE78;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <a href="enregistrer_eleve.php"><button type="button" class="btn btn-lg btn-success ml-2">Retour</button></a>
        <div class="row justify-content-center">
            <div class="col-md-8 form-container">
                <h3 class="text-center text-success mb-4">Inscription des Élèves</h3>
                <?php if (isset($_SESSION['error'])): ?>
                    <div class="alert alert-danger">
                        <?php echo $_SESSION['error']; unset($_SESSION['error']); ?>
                    </div>
                <?php endif; ?>

                <form method="POST" >
                    

                    <div class="mb-3">
                        <label for="nom" class="form-label">Nom</label>
                        <input type="text" class="form-control" id="nom" name="nom" required>
                    </div>

                    <div class="mb-3">
                        <label for="prenom" class="form-label">Prénom</label>
                        <input type="text" class="form-control" id="prenom" name="prenom" required>
                    </div>

                    <div class="mb-3">
                        <label for="date_naissance" class="form-label">Date de Naissance</label>
                        <input type="date" class="form-control" id="date_naissance" name="date_naissance" required>
                    </div>

                    <div class="mb-3">
                        <label for="nom_tuteur" class="form-label">Nom du Tuteur</label>
                        <input type="text" class="form-control" id="nom_tuteur" name="nom_tuteur" required>
                    </div>

                    <div class="mb-3">
                        <label for="tel_tuteur" class="form-label">Téléphone du Tuteur</label>
                        <input type="tel" class="form-control" id="tel_tuteur" name="tel_tuteur" required placeholder="00-000-00-00">
                    </div>

                    <div class="mb-3">
                        <label for="email_tuteur" class="form-label">Email du Tuteur</label>
                        <input type="email" class="form-control" id="email_tuteur" name="email_tuteur" required>
                    </div>

                    <div class="mb-3">
                        <label for="departement" class="form-label">Département</label>
                        <select class="form-select" id="departement" name="departement" required>
                            <option value="">Sélectionnez un département</option>
                            <option value="primaire">Primaire</option>
                            <option value="secondaire">Secondaire</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="classe" class="form-label">Classe</label>
                        <select class="form-select" id="classe" name="classe" required>
                            <option selected disabled>Sélectionnez une classe</option>
                        </select>
                    </div>
                    <div class="d-grid gap-2 col-6 mx-auto">
                        <button type="submit" class="btn btn-green">Ajouter</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('departement').addEventListener('change', function() {
            var departement = this.value;
            var classeSelect = document.getElementById('classe');
            classeSelect.innerHTML = '<option selected disabled>Sélectionnez une classe</option>'; // Efface les options existantes

            if (departement === 'primaire') {
                classeSelect.innerHTML += '<option value="CI">CI</option>';
                classeSelect.innerHTML += '<option value="CP">CP</option>';
                classeSelect.innerHTML += '<option value="CE1">CE1</option>';
                classeSelect.innerHTML += '<option value="CE2">CE2</option>';
                classeSelect.innerHTML += '<option value="CM1">CM1</option>';
                classeSelect.innerHTML += '<option value="CM2">CM2</option>';
            } else if (departement === 'secondaire') {
                classeSelect.innerHTML += '<option value="6E">6ème</option>';
                classeSelect.innerHTML += '<option value="5E">5ème</option>';
                classeSelect.innerHTML += '<option value="4E">4ème</option>';
                classeSelect.innerHTML += '<option value="3E">3ème</option>';
            }
        });
    </script>
</body>
</html>