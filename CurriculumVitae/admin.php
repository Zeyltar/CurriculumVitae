<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>EDITOR</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="https://fonts.googleapis.com/css?family=Saira+Extra+Condensed:500,700" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Muli:400,400i,800,800i" rel="stylesheet">
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/resume.min.css" rel="stylesheet">

</head>

<body id="page-top">
  <?php
    include('inc/data.inc.php');
    include('inc/navbar.inc.php');
  ?>

  <div class="container-fluid p-0">
    <section class="resume-section p-3 p-lg-5 d-flex align-items-center" id="about">
      <div class="w-100">  
        <form method="POST" action="editAbout.php" enctype="multipart/form-data">
          <div class="form-row align-items-center">
            <div class="form-group col">
              <label for="firstname">Prénom</label>
              <input type="texte" class="form-control" id="firstname" name="firstname" maxlength=20 value="<?php echo $person->firstname; ?>" required>
            </div>
            <div class="form-group col">
              <label for="lastname">Nom</label>
              <input type="texte" class="form-control" id="lastname" name="lastname" maxlength=30 value="<?php echo $person->lastname; ?>" required>
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col">
              <label for="address">Adresse</label>
              <input type="texte" class="form-control" id="address" name="address" maxlength=50 value="<?php echo $person->address; ?>">
            </div>
            <div class="form-group col">
              <label for="telephone">Téléphone</label>
              <input type="telephone" class="form-control" id="telephone" name="telephone" pattern="[0-9]{10}" value="<?php echo $person->telephone; ?>"required>
            </div>
            <div class="form-group col">
              <label for="email">Email</label>
              <input type="email" class="form-control" id="email" name="email" maxlength=50 pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" value="<?php echo $person->email; ?>"required>
            </div>
          </div>
          <div class="form-group">
            <label for="about_text">À propos</label>
            <textarea class="form-control" id="about_text" name="about_text" maxlength=150><?php echo $person->about_text; ?></textarea>
          </div>
          <div class="form-group">
            <label for="profile_picture">Image de profil</label>
            <input type="file" class="form-control-file" id="profile_picture" name="profile_picture[]" accept=".gif,.jpg,.jpeg,.png">
          </div>
          <button type="submit" class="btn btn-primary">Enregister</button>
        </form>
      </div>
    </section>

    <hr class="m-0">

    <section class="resume-section p-3 p-lg-5 d-flex justify-content-center" id="experience">
      <div class="w-100">
        <h2 class="mb-5">Insérer ligne - Expérience</h2>
        <form class="mb-5" method="POST" action="addExperience.php" enctype="multipart/form-data">
          <div class="form-row">
            <div class="form-group col-3">
              <label for="exp_title">Nom du poste</label>
              <input type="texte" class="form-control" id="exp_title" name="exp_title" maxlength=30 placeholder="Exemple : Développeur" required>
            </div>          
          </div>
          <div class="form-row">
            <div class="form-group col-3">
              <label for="company_name">Nom de l'entreprise</label>
              <input type="texte" class="form-control" id="company_name" name="company_name" maxlength=30>
            </div>          
          </div>
          <div class="form-row">
            <div class="form-group col-3">
              <label for="exp_start_date">Date de début</label>
              <input type="date" class="form-control" id="exp_start_date" name="exp_start_date" required>
            </div>
            <div class="form-group col-3">
              <label for="exp_end_date">Date de fin</label>
              <input type="date" class="form-control" id="exp_end_date" name="exp_end_date">
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-6">
              <label for="exp_about_text">À propos</label>
              <textarea class="form-control" id="exp_about_text" name="exp_about_text" maxlength=300 required></textarea>
            </div>
          </div>
          <button type="submit" class="btn btn-primary">Ajouter</button>
        </form>

        <h2 class="mb-5">Modifier ligne - Expérience</h2>
        
        <?php
          $result = $pdo->query("SELECT experience.* FROM experience ORDER BY id_experience DESC;");
          
          $experiences = $result->fetchAll(PDO::FETCH_OBJ);
        ?>

        <?php  for ($i=0; $i < count($experiences) ; $i++) { ?>
          <div class="resume-item d-flex flex-column flex-md-row justify-content-between mb-5">
            <div class="resume-content">
                <h3 class="mb-0"><?php echo "id_experience: " . $experiences[$i]->id_experience; ?></h3>
                <p class="mb-0"><span class="text-primary">title: </span><?php echo $experiences[$i]->title; ?></p>
                
                <?php if (!empty($experiences[$i]->company_name)) { ?>
                  <p class="mb-0"><span class="text-primary">company_name: </span><?php echo $experiences[$i]->company_name; ?></p>
                <?php } ?>

                <p class="mb-0"><span class="text-primary">about_text: </span><?php echo $experiences[$i]->about_text; ?></p>
                <p class="mb-0"><span class="text-primary">start_date - end_date: </span><?php echo convert_date($experiences[$i]->start_date) . " - " . convert_date($experiences[$i]->end_date); ?></p>
            </div>
            <div class="resume-date text-md-right">
              <form action="editExperience.php" method="post">
                <div class="form-row">
                  <div class="form-group my-1">
                    <?php if (!empty($experiences[$i]->id_person)) { ?>
                      <button type="submit" class="btn btn-secondary" name="hide" value=<?php echo $experiences[$i]->id_experience ?>><i class="fas fa-eye-slash"></i></button>
                    <?php } else { ?>
                      <button type="submit" class="btn btn-primary" name="show" value=<?php echo $experiences[$i]->id_experience ?>><i class="fas fa-eye"></i></button>
                    <?php } ?>
                    
                    <button type="submit" class="btn btn-danger" name="delete" value=<?php echo $experiences[$i]->id_experience ?>><i class="fas fa-trash"></i></button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        <?php } ?>
      </div>
    </section>

    <hr class="m-0">

    <section class="resume-section p-3 p-lg-5 d-flex justify-content-center" id="education">
      <div class="w-100">
        <h2 class="mb-5">Insérer ligne - Cursus</h2>
        <form class="mb-5" method="POST" action="addCursus.php" enctype="multipart/form-data">
          <div class="form-row">
            <div class="form-group col-3">
              <label for="establishment_name">Nom de l'établissement</label>
              <input type="texte" class="form-control" id="establishment_name" name="establishment_name" maxlength=30 required>
            </div>          
          </div>
          <div class="form-row">
            <div class="form-group col-3">
              <label for="cursus_title">Nom du diplôme</label>
              <input type="texte" class="form-control" id="cursus_title" name="cursus_title" maxlength=50 required>
            </div>          
          </div>
          <div class="form-row">
            <div class="form-group col-3">
              <label for="cursus_start_date">Date de début</label>
              <input type="date" class="form-control" id="cursus_start_date" name="cursus_start_date" required>
            </div>
            <div class="form-group col-3">
              <label for="cursus_end_date">Date de fin</label>
              <input type="date" class="form-control" id="cursus_end_date" name="cursus_end_date">
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-6">
              <label for="cursus_about_text">À propos</label>
              <textarea class="form-control" id="cursus_about_text" name="cursus_about_text" maxlength=300></textarea>
            </div>
          </div>
          <button type="submit" class="btn btn-primary">Ajouter</button>
        </form>

        <h2 class="mb-5">Modifier ligne - Cursus</h2>
        
        <?php
          $result = $pdo->query("SELECT cursus.* FROM cursus ORDER BY id_cursus DESC;");
          
          $studies = $result->fetchAll(PDO::FETCH_OBJ);
        ?>

        <?php  for ($i=0; $i < count($studies) ; $i++) { ?>
          <div class="resume-item d-flex flex-column flex-md-row justify-content-between mb-5">
            <div class="resume-content">
                <h3 class="mb-0"><?php echo "id_cursus: " . $studies[$i]->id_cursus; ?></h3>
                <p class="mb-0"><span class="text-primary">title: </span><?php echo $studies[$i]->title; ?></p>
                <p class="mb-0"><span class="text-primary">establishment_name: </span><?php echo $studies[$i]->establishment_name; ?></p>
                
                <?php if (!empty($studies[$i]->about_text)) { ?>
                  <p class="mb-0"><span class="text-primary">about_text: </span><?php echo $studies[$i]->about_text; ?></p>
                <?php } ?>

                <p class="mb-0"><span class="text-primary">start_date - end_date: </span><?php echo convert_date($studies[$i]->start_date) . " - " . convert_date($studies[$i]->end_date); ?></p>
            </div>
            <div class="resume-date text-md-right">
              <form action="editCursus.php" method="post">
                <div class="form-row">
                  <div class="form-group my-1">
                    <?php if (!empty($studies[$i]->id_person)) { ?>
                      <button type="submit" class="btn btn-secondary" name="hide" value=<?php echo $studies[$i]->id_cursus ?>><i class="fas fa-eye-slash"></i></button>
                    <?php } else { ?>
                      <button type="submit" class="btn btn-primary" name="show" value=<?php echo $studies[$i]->id_cursus ?>><i class="fas fa-eye"></i></button>
                    <?php } ?>
                    
                    <button type="submit" class="btn btn-danger" name="delete" value=<?php echo $studies[$i]->id_cursus ?>><i class="fas fa-trash"></i></button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        <?php } ?>
        
      </div>
    </section>
  </div>
 <?php include("inc/footer.inc.php"); ?>