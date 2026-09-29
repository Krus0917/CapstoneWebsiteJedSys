<?= $this->extend('layout/main_layout') ?>
<?= $this->section('pageContents') ?>
<main>
    <div class="px-5 py-4 bg-black bg-opacity-75">
      <div class="container-fluid py-5">
        <h1 class="display-1 fw-bold text-light">Forum</h1>
        <div class="d-flex align-items-center ">
          <p class="col-md-8 fs-4 mb-0 lead text-light flex-grow-1">Share your thoughts and review our app.</p>
          <!-- Button to trigger review modal -->
          <?php $session = session(); if ($session->has('Firstname')): ?>
            <button type="button" class="btn btn-primary ms-3" data-bs-toggle="modal" data-bs-target="#reviewModal">
              Write a review
            </button>
          <?php else: ?>
            <a class="btn btn-outline-primary ms-3" href="<?= base_url('login') ?>">Log in to review</a>
          <?php endif; ?>
        </div>
      </div>
    </div>
    <div class="container-fluid px-5 py-5 text-bg-light">
    <div class="row featurette align-items-center">
          <div class="">
            <?php $session = session(); $firstname = $session->get('Firstname'); $lastname = $session->get('Lastname'); $displayName = trim(($firstname ?? '') . ' ' . ($lastname ?? '')); ?>

        <?php if (! $session->has('Firstname')): ?>
          <p class = "h3">Please <a href="<?= base_url('login') ?>">log in</a> to leave a review.</p>
        <?php endif; ?>

        <div id="reviews">
          <?= $this->include('load') ?>
        </div>
        </div>
    </div>
    </div>
</main>

<!-- Review Modal -->
<?php if ($session->has('Firstname')): ?>
<div class="modal fade" id="reviewModal" tabindex="-1" aria-labelledby="reviewModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="reviewModalLabel">Write a review</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="<?= base_url('submit_review') ?>" method="post">
        <div class="modal-body">
          <p class="mb-2">Reviewing as <strong><?= esc($displayName) ?></strong></p>

          <div class="mb-3">
            <label class="form-label">Rating</label>
            <div class="stars">
              <input type="radio" id="mstar5" name="rating" value="5" required><label for="mstar5">★</label>
              <input type="radio" id="mstar4" name="rating" value="4"><label for="mstar4">★</label>
              <input type="radio" id="mstar3" name="rating" value="3"><label for="mstar3">★</label>
              <input type="radio" id="mstar2" name="rating" value="2"><label for="mstar2">★</label>
              <input type="radio" id="mstar1" name="rating" value="1"><label for="mstar1">★</label>
            </div>
          </div>

          <div class="mb-3">
            <label for="comment" class="form-label">Your review</label>
            <textarea id="comment" name="comment" class="form-control" placeholder="Write your review..." required></textarea>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-primary">Submit Review</button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php endif; ?>

<?= $this->endSection('pageContents') ?>
