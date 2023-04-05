<style>
.row {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
}

.col {
  margin: 20px;
}

.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 300px;
  margin: auto;
  text-align: center;
}

.card-img-top {
  width: 100%;
  height: 200px;
  object-fit: cover;
}

.card-title {
  font-size: 24px;
}

.card-text {
  font-size: 16px;
}

.btn-primary {
  background-color: #007bff;
  border: none;
  border-radius: 4px;
  color: white;
  padding: 12px 24px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 18px;
  margin: 4px 2px;
  cursor: pointer;
}
</style>

<div class="row">
  <?php
  // subject papers array (can be retrieved from database)
  $subject_papers = array(
    array(
      'subject' => 'Mathematics',
      'paper' => 'Algebra',
      'description' => 'Test your knowledge in algebra.',
      'image' => 'mathematics-algebra.jpg'
    ),
    array(
      'subject' => 'Physics',
      'paper' => 'Mechanics',
      'description' => 'Test your knowledge in mechanics.',
      'image' => 'courses-1.jpg '
    ),
    array(
      'subject' => 'Chemistry',
      'paper' => 'Chemistry',
      'description' => 'Test your knowledge in chemistry.',
      'image' => 'chemistry-organic.jpg'
    ),
  );

  // loop through subject papers array to create cards
  foreach ($subject_papers as $subject_paper) {
  ?>
    <div class="col">
      <div class="card">
        <img src="<?php echo $subject_paper['image']; ?>" class="card-img-top" alt="<?php echo $subject_paper['subject']; ?>">
        <div class="card-body">
          <h5 class="card-title"><?php echo $subject_paper['subject']; ?> - <?php echo $subject_paper['paper']; ?></h5>
          <p class="card-text"><?php echo $subject_paper['description']; ?></p>
          <a href="tsa.php" class="btn btn-primary">Take Assessment</a>
        </div>
      </div>
    </div>
  <?php
  }
  ?>
</div>
