<?php
?>

<body class="bg-gradient bg-light">

  <!-- Encabezado -->
  <div class="container py-4 bg-success text-white rounded-bottom shadow">
    <div class="row align-items-center">
      <div class="col-md-4 text-center text-md-start mb-3 mb-md-0">
        <a href="?">
          <img src="img/AltairAir.png" alt="Logo Altair Air" class="img-fluid rounded" style="width: 160px; height: auto;">
        </a>
      </div>
      <div class="col-md-8 text-center text-md-start">
        <h1 class="fw-bold">Altair Air</h1>
        <p class="mb-0 fst-italic">Tu destino, entre las estrellas ✈️</p>
      </div>
    </div>
  </div>

  <!-- Menú de pestañas -->
  <div class="container mt-4">
    <ul class="nav nav-tabs justify-content-center bg-white shadow-sm rounded" id="myTab" role="tablist">
      <li class="nav-item" role="presentation">
        <button class="nav-link active text-success fw-semibold" id="home-tab" data-bs-toggle="tab" data-bs-target="#home"
          type="button" role="tab" aria-controls="home" aria-selected="true">
          <i class="bi bi-house-door-fill me-1"></i>Inicio
        </button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link text-success fw-semibold" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile"
          type="button" role="tab" aria-controls="profile" aria-selected="false">
          <i class="bi bi-person-circle me-1"></i>Iniciar sesion
        </button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link text-success fw-semibold" id="messages-tab" data-bs-toggle="tab" data-bs-target="#messages"
          type="button" role="tab" aria-controls="messages" aria-selected="false">
          <i class="bi bi-chat-left-text-fill me-1"></i>Mensajes
        </button>
      </li>
    </ul>
  </div>

  <div class="tab-content container py-4">
    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
      <div class="card border-0 shadow-sm p-4">
        <h4 class="text-success fw-bold">Bienvenido a Altair Air</h4>
        <p class="text-muted">Explora nuestros destinos, promociones y servicios premium.</p>
      </div>
    </div>

    <!-- Iniciar sesion -->
    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
      <div class="d-flex justify-content-center mt-4">
        <div class="card border-0 shadow-sm p-4" style="max-width: 380px; width: 100%;">

          <img src="img/AltairAir.png" alt="Altair Air" class="img-fluid rounded mb-3">

          <div class="card-body">
            

            <a href="?pid=<?php echo base64_encode('presentacion/autenticar.php') ?>">
              <h4 class="card-title text-center mb-3 text-success">Iniciar sesión</h4>
            </a>
          </div>

        </div>
      </div>
    </div>

    <div class="tab-pane fade" id="messages" role="tabpanel" aria-labelledby="messages-tab">
      <div class="card border-0 shadow-sm p-4">
        <h4 class="text-success fw-bold">Centro de mensajes</h4>
        <p class="text-muted">Aquí verás tus notificaciones, actualizaciones y ofertas exclusivas.</p>
      </div>
    </div>
  </div>

  <!-- Sección adaptable -->
  <div class="container my-4">
    <div class="row justify-content-center align-items-stretch g-4">
      <div class="col-md-4 col-sm-12 bg-white p-4 rounded shadow-sm text-center border-top border-4 border-success">
        <h5 class="text-success fw-bold">🌍 Destinos</h5>
        <p class="text-muted">Descubre los lugares más increíbles con Altair Air.</p>
      </div>
      <div class="col-md-4 col-sm-12 bg-white p-4 rounded shadow-sm text-center border-top border-4 border-info">
        <h5 class="text-info fw-bold">🎫 Reservas</h5>
        <p class="text-muted">Reserva tu vuelo de forma rápida y segura.</p>
      </div>
      <div class="col-md-4 col-sm-12 bg-white p-4 rounded shadow-sm text-center border-top border-4 border-success">
        <h5 class="text-success fw-bold">💬 Soporte</h5>
        <p class="text-muted">Atención al cliente 24/7 para acompañarte en tu viaje.</p>
      </div>
    </div>
  </div>

  <!-- Pie de página -->
  <footer class="text-center py-3 mt-4 bg-success text-white shadow-sm">
    © 2025 <strong>Altair Air</strong> — Todos los derechos reservados ✈️
  </footer>

  <!-- Bootstrap + Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>