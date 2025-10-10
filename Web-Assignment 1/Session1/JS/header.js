const headerHTML = `
  <header id="main">
    <div class="logo">
      <a href="index.html"><img src="./RES/logo.png" alt="SMIU Logo"></a>
    </div>
    <nav class="nav-linked">
      <ul>
        <li><a href="index.html">Home</a></li>
        <li><a href="gallery.html">Gallery</a></li>
        <li><a href="admission.html">Admission</a></li>
        <li><a href="contact.html">Contact</a></li>
        <li><a href="about.html">About</a></li>
      </ul>
    </nav>
  </header>
`;

const footerHTML = `
  <footer>
    <div class="footer-content">
      <div class="footer-section">
        <h3>Sindh Madressatul Islam University</h3>
        <p>Founded 1885 — bridging heritage with contemporary education. Proud alma mater of Quaid-e-Azam Muhammad Ali Jinnah.</p>
      </div>

      <div class="footer-section">
        <h3>Quick Links</h3>
        <ul>
          <li><a href="admission.html">Admissions</a></li>
          <li><a href="gallery.html">Gallery</a></li>
          <li><a href="contact.html">Contact</a></li>
          <li><a href="about.html">About</a></li>
        </ul>
      </div>

      <div class="footer-section">
        <h3>Contact</h3>
        <p>Aiwan-e-Tijarat Road, Karachi, Pakistan</p>
        <p>Phone: (021) 111 111 885</p>
        <p>Email: info@smiu.edu.pk</p>
      </div>
    </div>

    <div class="footer-bottom">
      <p>&copy; 2025 Sindh Madressatul Islam University</p>
    </div>
  </footer>
`;

document.getElementById("headercode").innerHTML = headerHTML;
document.getElementById("footer").innerHTML = footerHTML;

const current = location.pathname.split("/").pop().toLowerCase();
document.querySelectorAll(".nav-linked a").forEach(link => {
  if (link.getAttribute("href").toLowerCase() === current) {
    link.classList.add("active");
  }
});
