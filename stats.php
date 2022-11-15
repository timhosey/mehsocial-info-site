  <div class="w3-content w3-justify w3-text-grey w3-padding-64" id="stats">
    <h2 class="w3-text-light-grey">stats</h2>
    <hr style="width:200px" class="w3-opacity">
    <?php
      $stats = getStats();
      $cpuUsage = getCPU();
      $memUsage = getMem();
      $diskUsage = getStorage();
    ?>

    <p class="w3-wide">cpu - <strong><?= $cpuUsage ?>%</strong></p>
    <div class="w3-white">
      <div class="w3-dark-grey" style="height:28px;width:<?= $cpuUsage ?>%"></div>
    </div>
    <p class="w3-wide">mem - <strong><?= $memUsage ?>%</strong></p>
    <div class="w3-white">
      <div class="w3-dark-grey" style="height:28px;width:<?= $memUsage ?>%"></div>
    </div>
    <p class="w3-wide">sto - <strong><?= $diskUsage ?>%</strong></p>
    <div class="w3-white">
      <div class="w3-dark-grey" style="height:28px;width:<?= $diskUsage ?>%"></div>
    </div>

    <p>
      mastodon version: <strong><?= $stats['version']; ?></strong><br />
      current users: <strong><?= $stats['stats']['user_count']; ?></strong><br />
      posts made: <strong><?= $stats['stats']['status_count']; ?></strong><br />
      connected domains: <strong><?= $stats['stats']['domain_count']; ?></strong>
    </p>
  </div>