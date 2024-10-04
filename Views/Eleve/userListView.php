<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Administrateur</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <!-- <link rel="stylesheet" href="style.css"> -->
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
                    <li class="">
                        <a class="nav-link active" href="#">
                            <i class="fas fa-user-graduate"></i> Utilisateurs
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
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
                    <div></div>
                    <!-- <h1 class="h2">Dashboard Administrateur</h1> -->
                    <div class="d-flex align-items-center">
                        <a href="logout.php" class="btn btn-danger mr-2">Déconnexion</a>
                        <img src="./assets/img/logo.png" alt="Logo" style="width: 90px;">
                    </div>
                </div>

                <div class="d-flex justify-content-between mb-4">
                    <a href="new_user.php" class="btn btn-success">AJOUT D'UN UTILISATEUR</a>
                    <input type="text" class="form-control w-25" placeholder="Rechercher">
                </div>

                <!-- Section liste des utilisateurs -->
                <div class="bg-light p-4 rounded border border-primary">
                    <h5 class="text-center mb-4">Liste des Utilisateurs</h5>
                    <div class="table-responsive">
                        <?php
                        // Assurez-vous que $users est défini et est un tableau
                        if (!isset($users) || !is_array($users)) {
                            $users = [];
                        }
                        
                        if (count($users) > 0) : ?>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <!-- <th scope="col">ID</th> -->
                                        <th scope="col">Matricule</th>
                                        <th scope="col">Nom</th>
                                        <th scope="col">Prénom</th>
                                        <th scope="col">Rôle</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Date d'embauche</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($users as $user): ?>
                                        <tr>
                                            <!-- <td><?= htmlspecialchars($user['id']); ?></td> -->
                                            <td><?= htmlspecialchars($user['matricule']); ?></td>
                                            <td><?= htmlspecialchars($user['nom']); ?></td>
                                            <td><?= htmlspecialchars($user['prenom']); ?></td>
                                            <td><?= htmlspecialchars($user['role']); ?></td>
                                            <td><?= htmlspecialchars($user['email']); ?></td>
                                            <td><?= htmlspecialchars($user['date_embauche']); ?></td>
                                            <td class="actions">
                                                <a href="edit_user.php?id=<?= urlencode($user['id']); ?>" class="btn btn-sm btn-primary">Modifier</a>
                                                <!-- <button onclick="archiveUser(<?= $user['id']; ?>)" class="btn btn-sm btn-warning">Archiver</button> -->
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        <?php else: ?>
                            <p>Aucun utilisateur enregistré.</p>
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
        function archiveUser(userId) {
            if (confirm('Êtes-vous sûr de vouloir archiver cet utilisateur ?')) {
                // Ajoutez ici le code pour archiver l'utilisateur
                console.log('Archivage de l'utilisateur ' + userId);
            }
        }
    </script> -->
</body>
</html>