<hr class="m-0">
<?php
  $result = $pdo->query("SELECT experience.* FROM experience JOIN person WHERE experience.id_person = person.id_person ORDER BY start_date DESC;");
  $experiences = $result->fetchAll(PDO::FETCH_OBJ);
?>

<section class="resume-section p-3 p-lg-5 d-flex justify-content-center" id="experience">
  <div class="w-100">
    <h2 class="mb-5">Expérience</h2>

    <?php  for ($i=0; $i < count($experiences) ; $i++) { ?>
      <div class="resume-item d-flex flex-column flex-md-row justify-content-between mb-5">
        <div class="resume-content">
          <h3 class="mb-0"><?php echo $experiences[$i]->title; ?></h3>
          <?php if (!empty($experiences[$i]->company_name)) { ?>
            <div class="subheading mb-3">
              <?php echo $experiences[$i]->company_name; ?>
            </div>
          <?php } ?>
          <p><?php echo $experiences[$i]->about_text; ?></p>
        </div>
        <div class="resume-date text-md-right">
          <span class="text-primary"><?php echo convert_date($experiences[$i]->start_date) . " - " . convert_date($experiences[$i]->end_date); ?></span>
        </div>
      </div>
    <?php } ?>
  </div>

</section>