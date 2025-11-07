    // Header 
    document.getElementById('headercode').innerHTML = `
    <nav class="navbar navbar-expand-sm navbar-dark"
    style="background: linear-gradient(0deg, rgba(34,193,195,1) 0%, rgba(253,187,45,1) 100%);">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.html">
        <img src="../Session1/RES/logo.png" alt="SMIU Logo" width="100" class="p-2">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
        data-bs-target="#navMenu" aria-controls="navMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navMenu">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0 nav-linked">
            <li class="nav-item"><a class="nav-link text-dark" href="index.html">Home</a></li>
            <li class="nav-item"><a class="nav-link text-dark" href="Gallery.html">Gallery</a></li>
            <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-dark" href="#" id="dropdownId" data-bs-toggle="dropdown"
                aria-expanded="false">Admission</a>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="cs.html">Computer Science</a></li>
                <li><a class="dropdown-item" href="se.html">Software Engineering</a></li>
                <li><a class="dropdown-item" href="ai.html">Artificial Intelligence</a></li>
                <li><a class="dropdown-item" href="ds.html">Data Science</a></li>
                <li><a class="dropdown-item" href="cy.html">Cyber Security</a></li>
                <li><a class="dropdown-item" href="it.html">Information Technology</a></li>
            </ul>
            </li>
            <li class="nav-item"><a class="nav-link text-dark" href="Contact.html">Contact</a></li>
            <li class="nav-item"><a class="nav-link text-dark" href="About.html">About</a></li>
        </ul>
        <form class="d-flex">
            <input class="form-control me-2" type="search" placeholder="Search">
            <button class="btn btn-outline-dark" type="submit">Search</button>
        </form>
        </div>
    </div>
    </nav>
    `;

    // Footer
    const footerHTML = `
    <footer class="text-light pt-5 pb-3 mt-5"
    style="background: linear-gradient(0deg, rgba(34,193,195,1) 0%, rgba(253,187,45,1) 100%);">
    <div class="container">
        <div class="row gy-4">
        <div class="col-md-4">
            <h5 class="fw-bold text-dark">Sindh Madressatul Islam University</h5>
            <p class="small text-dark">
            Founded 1885 — bridging heritage with contemporary education. Proud alma mater of
            Quaid-e-Azam Muhammad Ali Jinnah.
            </p>
        </div>
        <div class="col-md-4">
            <h5 class="fw-bold text-dark">Quick Links</h5>
            <ul class="list-unstyled">
            <li><a href="admission.html" class="text-dark text-decoration-none">Admissions</a></li>
            <li><a href="gallery.html" class="text-dark text-decoration-none">Gallery</a></li>
            <li><a href="contact.html" class="text-dark text-decoration-none">Contact</a></li>
            <li><a href="about.html" class="text-dark text-decoration-none">About</a></li>
            </ul>
        </div>
        <div class="col-md-4">
            <h5 class="fw-bold text-dark">Contact</h5>
            <p class="small text-dark mb-1">Aiwan-e-Tijarat Road, Karachi, Pakistan</p>
            <p class="small text-dark mb-1">Phone: (021) 111 111 885</p>
            <p class="small text-dark">Email: info@smiu.edu.pk</p>
        </div>
        </div>
        <div class="text-center border-top border-dark mt-4 pt-3">
        <small class="text-dark">&copy; 2025 Sindh Madressatul Islam University</small>
        </div>
    </div>
    </footer>
    `;

    document.getElementById("footer").innerHTML = footerHTML;

    // Highlight current page
    const current = location.pathname.split("/").pop().toLowerCase();
    document.querySelectorAll(".nav-linked a").forEach(link => {
    if (link.getAttribute("href").toLowerCase() === current) {
        link.classList.add("active");
    }
    });
