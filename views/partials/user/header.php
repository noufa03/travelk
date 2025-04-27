<div class="header--wrapper">
  <div>
  </div>
  <div class="info">
    <div class="header--title">
      <span>Hello, <?= $_SESSION["user"]["email"] ?></span>
    </div>
    <?php $profile = $profile['profile'] ?? ''; ?>
    <img src="/<?= $profile ? $profile : '/restaurants/default-pics/default-profile.svg' ?>" class="profile-image" alt="">
  </div>
</div>


<style>
  .profile-image {
    height: 3rem;
    width: 3rem;
    border-radius: 100%;
    object-fit: cover;
  }
</style>