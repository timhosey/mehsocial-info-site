  <!-- About Section -->
  <div class="w3-content w3-justify w3-text-grey w3-padding-64" id="about">
    <h2 class="w3-text-light-grey">about</h2>
    <hr style="width:200px" class="w3-opacity">
    <p>
      host device: asus vm65n 2201 nuc<br />
      host cpu: intel i5-7400u (4 core, 4 thread) @ 3.1 ghz<br />
      host mem: 15871 mib<br />
      host os: arch linux<br />
      <?php $uptime = getUptime(); ?>
      host uptime: <?= $uptime['days'].'d '.$uptime['hours'].'h '.$uptime['mins'].'m'; ?>
    </p>
    <h3 class="w3-padding-16 w3-text-light-grey">current stats</h3>
    <?php $cpuUsage = getCPU(); ?>
    <p class="w3-wide">cpu - <?= $cpuUsage ?>%</p>
    <div class="w3-white">
      <div class="w3-dark-grey" style="height:28px;width:<?= $cpuUsage ?>%"></div>
    </div>
    <?php $memUsage = getMem(); ?>
    <p class="w3-wide">memory - <?= $memUsage ?>%</p>
    <div class="w3-white">
      <div class="w3-dark-grey" style="height:28px;width:<?= $memUsage ?>%"></div>
    </div>
    <?php $diskUsage = getStorage(); ?>
    <p class="w3-wide">storage - <?= $diskUsage ?>%</p>
    <div class="w3-white">
      <div class="w3-dark-grey" style="height:28px;width:<?= $diskUsage ?>%"></div>
    </div><br>

    <p>
      last backup:
    </p>
    
    <div class="w3-row w3-center w3-padding-16 w3-section w3-light-grey">
      <p>
        this server is administered by tim hosey, aka <a href="https://meh.social/@timcade">@timcade@meh.social</a>.
      </p>
    </div>

    <button class="w3-button w3-light-grey w3-padding-large w3-section">
    <a href="https://meh.social/@timcade"><i class="fa fa-download"></i> connect with tim</a>
    </button>
    
    <!-- Testimonials
    <h3 class="w3-padding-24 w3-text-light-grey">My Reputation</h3>  
    <img src="/w3images/bandmember.jpg" alt="Avatar" class="w3-left w3-circle w3-margin-right" style="width:80px">
    <p><span class="w3-large w3-margin-right">Chris Fox.</span> CEO at Mighty Schools.</p>
    <p>John Doe saved us from a web disaster.</p><br>
    
    <img src="/w3images/avatar_g2.jpg" alt="Avatar" class="w3-left w3-circle w3-margin-right" style="width:80px">
    <p><span class="w3-large w3-margin-right">Rebecca Flex.</span> CEO at Company.</p>
    <p>No one is better than John Doe.</p>
    -->
  <!-- End About Section -->
  </div>