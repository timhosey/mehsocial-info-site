<?php require_once('header.php'); ?>

<!-- First Grid -->
<div class="w3-row-padding w3-padding-64 w3-container">
  <div class="w3-content">
    <div class="w3-twothird">
      <h1>system details</h1>
      <h5 class="w3-padding-32">
        host device: asus vm65n 2201 nuc<br />
        host cpu: intel i5-7400u (4 core, 4 thread) @ 3.1 ghz<br />
        host mem: 15871 mib<br />
        host os: arch linux<br />
        <?php $uptime = getUptime(); ?>
        host uptime: <?= $uptime['days'].'d '.$uptime['hours'].'h '.$uptime['mins'].'m'; ?>
      </h5>

      <p class="w3-text-grey">
        this server is administered by tim hosey, aka @timcade@meh.social.<br />
        tim does not stand for any form of white supremacy, nazi iconography or support of any sort,
        nor racism, homophobia, transphobia, or any other harmful/shitty views. it will not be tolerated
        on meh social. if you wish to espouse your horrible views, do it somewhere else. you do not have
        any clout or weight enough to offset being a terrible person.<br />
        please report any violations of the rules (even if you're not sure). tim is happy to review and
        keep meh social free of nonsense.<br />
        please also protect yourself! block and mute freely as you see fit.
      </p>
    </div>

    <div class="w3-third w3-center">
      <i class="fa fa-anchor w3-padding-64 w3-text-red"></i>
    </div>
  </div>
</div>

<!-- Second Grid -->
<div class="w3-row-padding w3-light-grey w3-padding-64 w3-container">
  <div class="w3-content">
    <div class="w3-third w3-center">
      <i class="fa fa-coffee w3-padding-64 w3-text-red w3-margin-right"></i>
    </div>

    <div class="w3-twothird">
      <h1>Lorem Ipsum</h1>
      <h5 class="w3-padding-32">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</h5>

      <p class="w3-text-grey">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Excepteur sint
        occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
        laboris nisi ut aliquip ex ea commodo consequat.</p>
    </div>
  </div>
</div>

<div class="w3-container w3-black w3-center w3-opacity w3-padding-64">
    <h1 class="w3-margin w3-xlarge">Quote of the day: live life</h1>
</div>

<?php require_once('footer.php'); ?>