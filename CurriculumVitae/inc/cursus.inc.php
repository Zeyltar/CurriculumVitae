<hr class="m-0">
<?php
  $result = $pdo->query("SELECT cursus.* FROM cursus JOIN person WHERE cursus.id_person = cursus.id_person ORDER BY start_date DESC;");
  $education = $result->fetchAll(PDO::FETCH_OBJ);
?>

<section class="resume-section p-3 p-lg-5 d-flex justify-content-center" id="education">
  <div class="w-100">
    <h2 class="mb-5">Cursus</h2>

    <?php  for ($i=0; $i < count($education) ; $i++) { ?>
      <div class="resume-item d-flex flex-column flex-md-row justify-content-between mb-5">
        <div class="resume-content">
          <h3 class="mb-0"><?php echo $education[$i]->establishment_name; ?></h3>
          <div class="subheading mb-3">
           <?php echo $education[$i]->title; ?>
          </div>
          <?php if (!empty($education[$i]->about_text)) { ?>
            <p><?php echo $education[$i]->about_text; ?></p>
          <?php } ?>
        </div>
        <div class="resume-date text-md-right">
          <span class="text-primary"><?php echo convert_date($education[$i]->start_date) . " - " . convert_date($education[$i]->end_date); ?></span>
        </div>
      </div>
    <?php } ?>
  </div>

</section>