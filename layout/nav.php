<!-- insert the navigator -->
<nav class='navbar navbar-inverse'>
  <div class='container-fluid'>
    <!-- responsive navigator -->
    <div class='navbar-header'>
      <button type='button' class='navbar-toggle' data-toggle='collapse' data-target='#mainNavbar'>
        <span class='icon-bar'></span>
        <span class='icon-bar'></span>
        <span class='icon-bar'></span>
      </button>
    </div>

    <!-- navigator items -->
    <div class='collapse navbar-collapse' id='mainNavbar'>
      <?php include "process_nav.php" ?>
    </div>
  </div>
</nav>

<!-- highligh the navigator item corresponding to the current page through Javascript -->
<script src="js/nav_active.js" type="text/javascript" charset="utf-8"></script>
