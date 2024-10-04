<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Élèves</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./assets/css/style1.css">
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <nav class="col-md-3 col-lg-2 d-md-block sidebar collapse">
                <div class="position-sticky pt-3">
                    <div class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark">
                        <svg class="me-2" width="52" height="40">
                            <circle cx="20" cy="20" r="18" stroke="black" stroke-width="2" fill="none"/>
                            <text x="15" y="25" fill="black" font-size="12">D</text>
                        </svg> 
                        <span class="fs-4" style="font-weight: bold; font-size: 1.5rem;">Directeur</span> 
                    </div>
                    <br> <br>
                    <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="fas fa-tachometer-alt"></i> Tableau de Bord
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="fas fa-user-graduate"></i> Utilisateurs
                        </a>
                    </li>
                    <li class="">
                        <a class="nav-link active" href="#">
                            <i class="fas fa-chalkboard-teacher"></i> Élèves
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="fas fa-chalkboard-teacher"></i> Enseignants
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="fas fa-users"></i> Employés
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="fas fa-book"></i> Cours
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="fas fa-clipboard-list"></i> Présences
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="fas fa-clipboard"></i> Notes
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="fas fa-calendar-alt"></i> Emplois du temps
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="fas fa-dollar-sign"></i> Comptabilité
                        </a>
                    </li>
                </ul>
            </nav>

            <!-- Main Content -->
            <main class="col-md-10 ml-sm-auto px-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Liste des Élèves</h1>
                    <div class="d-flex align-items-center">
                        <a href="logout.php" class="btn btn-danger mr-2">Déconnexion</a>
                        <img src="./assets/img/logo.png" alt="Logo" style="width: 90px;">
                    </div>
                </div>

                <div class="d-flex justify-content-between mb-4">
                    <a href="ajout_eleveView.php?action=createEleve" class="btn btn-success">AJOUT D'UN ÉLÈVE</a>
                    <input type="text" class="form-control w-25" placeholder="Rechercher">
                </div>

                <!-- Section liste des élèves -->
                <div class="bg-light p-4 rounded border border-primary">
                    <h5 class="text-center mb-4">Liste des Élèves</h5>
                    <div class="table-responsive">
                        <?php
                        // Assurez-vous que $eleves est défini et est un tableau
                        if (!isset($eleves) || !is_array($eleves)) {
                            $eleves = [];
                        }

                        if (count($eleves) > 0) : ?>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <!-- <th scope="col">ID</th> -->
                                        <th scope="col">Matricule</th>
                                        <th scope="col">Nom</th>
                                        <th scope="col">Prénom</th>
                                        <th scope="col">Date de Naissance</th>
                                        <th scope="col">Nom du Tuteur</th>
                                        <th scope="col">Departement</th>
                                        <th scope="col">Classe</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($eleves as $eleve): ?>
                                        <tr>
                                            <!--td><?= htmlspecialchars($eleve['id']); ?></td>-->
                                            <td><?= htmlspecialchars($eleve['matricule']); ?></td>
                                            <td><?= htmlspecialchars($eleve['nom']); ?></td>
                                            <td><?= htmlspecialchars($eleve['prenom']); ?></td>
                                            <td><?= htmlspecialchars($eleve['date_naissance']); ?></td>
                                            <td><?= htmlspecialchars($eleve['nom_tuteur']); ?></td>
                                            <td><?= htmlspecialchars($eleve['departement']); ?></td>
                                            <td><?= htmlspecialchars($eleve['classe']); ?></td>
                                            <td class="actions">
                                                <a href="edit_eleve.php?id=<?= urlencode($eleve['id']); ?>" class="btn btn-sm btn-primary">Modifier</a>
                                                <!-- <button onclick="deleteEleve(<?= $eleve['id']; ?>)" class="btn btn-sm btn-danger">Archiver</button> -->
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        <?php else: ?>
                            <p>Aucun élève enregistré.</p>
                        <?php endif; ?>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- <script>
        function deleteEleve(eleveId) {
            if (confirm('Êtes-vous sûr de vouloir supprimer cet élève ?')) {
                window.location.href = 'index.php?action=deleteEleve&id=' + eleveId;
            }
        }
    </script> -->
</body>
</html>
