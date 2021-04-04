<?php
session_start();
?>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<header class="landingpage-header">
  <div id="header-menu">
    <svg xmlns="http://www.w3.org/2000/svg" height="35px" viewBox="0 0 512 512" width="35px">
      <path d="m368 154.667969h-352c-8.832031 0-16-7.167969-16-16s7.167969-16 16-16h352c8.832031 0 16 7.167969 16 16s-7.167969 16-16 16zm0 0" />
      <path d="m368 32h-352c-8.832031 0-16-7.167969-16-16s7.167969-16 16-16h352c8.832031 0 16 7.167969 16 16s-7.167969 16-16 16zm0 0" />
      <path d="m368 277.332031h-352c-8.832031 0-16-7.167969-16-16s7.167969-16 16-16h352c8.832031 0 16 7.167969 16 16s-7.167969 16-16 16zm0 0" />
    </svg>
  </div>
  <a class="logo" href=/interact/index.php>
    <div class="logo-image"></div>
    <h1>Interact</h1>
  </a>
  <nav>
    <ul class="top-menu">
      <li>
        <a href="/interact/about.php">About</a>
      </li>
      <li>
        <a href="/interact/help.php">Help</a>
      </li>
      <li>
        <a href='/interact/login.php'>Login</a>
      </li>
      <a id='important-content' href='/interact/register.php'>
        <h1 id='important-text'>Register</h1>
      </a>
    </ul>
  </nav>
</header>
<script>
  $(document).ready(function() {
    $('.top-menu li').hover(function() {
      $(this).append('<div id=underline-deco></div>')
    }, function() {
      $(this).find('#underline-deco').remove();
    });
  });
</script>