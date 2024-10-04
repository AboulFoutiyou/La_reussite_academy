<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription Employé</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="/../La_reussite_academy/Public/CSS/employe.css">
</head>
<body>
    <div class="container ">
        <?php 
        if(isset($_GET['error'])){
            if($_GET['error'] == 'exists'){
                echo "<div class='alert alert-danger'>Un utilisateur avec cet email existe déjà.</div>";
            } else if($_GET['error'] == 'missingFields'){
                echo "<div class='alert alert-danger'>Tous les champs obligatoires doivent être remplis.</div>";
            } else{
                echo "<div class='alert alert-danger'>".$_GET['error']."</div>";
            }
        } 
        if(isset($_GET['success']) && $_GET['success'] == 'true'){
            echo "<div class='alert alert-success'>Inscription réussie !</div>";
        }
        ?>
        <form class="row gy-5 needs-validation" method="POST" action="/../La_reussite_academy/Controllers/employe.php">
            <div class="col-6">
                <label for="nom" class="form-label">Nom</label>
                <input type="text" name="nom" class="form-control" required>
                <label for="prenom" class="form-label">Prénom</label>
                <input type="text" name="prenom" class="form-control" required>
                <label for="date_naissance" class="form-label">Date de naissance</label>
                <input type="date" name="date_naissance" class="form-control" required>
            </div>
            <div class="col-6">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" required>
                <label for="telephone" class="form-label">Téléphone</label>
                <input type="tel" name="telephone" class="form-control" required>
                <label for="role" class="form-label">Rôle</label>
                <select name="role_id" id="role" class="form-select" aria-label="Veuillez choisir une fonction" required>
                    <option selected disabled>Veuillez choisir une fonction</option>
                    <option value="7">Gardien</option>
                    <option value="6">Jardinier</option>
                    <option value="8">Technicien de surface</option>
                    <option value="1">Directeur</option>
                    <option value="3">Comptable</option>
                    <option value="2">Surveillant</option>
                </select>
                <div id="mot_de_passe_section" style="display: none;" class="form-label">
                    <label>Mot de passe:</label>
                    <input type="password" name="mot_de_passe" class="form-control"><br>
                </div>
            </div>
            <div class="col-12" style="text-align: center">
                <button class="btn" type="submit">Enregistrer</button>
            </div>
        </form>
    </div>
    <script>
        // Affiche la section mot de passe si le rôle est directeur ou surveillant
        document.getElementById('role').addEventListener('change', function() {
            var role = this.value;
            var passwordSection = document.getElementById('mot_de_passe_section');
            if (role == '1' || role == '2' || role == '3') {
                passwordSection.style.display = 'block';
            } else {
                passwordSection.style.display = 'none';
            }
        });
    </script>
</body>
</html>
