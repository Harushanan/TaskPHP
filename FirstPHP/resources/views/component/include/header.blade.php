<nav>
  <div class="logo">PetCare</div>
  
  <!-- Hamburger Icon -->
  <div class="menu-toggle" onclick="toggleMenu()">
    &#9776; <!-- Unicode for hamburger -->
  </div>

  <ul id="nav-menu">
    <li><a href="/">Home</a></li>
    <li><a href="/adminHome">Admin</a></li>
  </ul>
</nav>


<script>
  function toggleMenu() {
    const menu = document.getElementById('nav-menu');
    menu.classList.toggle('show');
  }
</script>
