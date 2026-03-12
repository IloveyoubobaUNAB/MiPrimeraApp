<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'TechMarket')</title>

  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  @stack('styles')
</head>
<body>

<header class="topbar">
  <div class="topbar-inner">
    <div class="logo">
      <div class="logo-badge">🤑</div>
      <div>
        <div>Leather Drop</div>
        <div style="font-size:12px;">La tienda que necesitas</div>
      </div>
    </div>

    <nav class="nav-links">
      <a href="/product/">Tienda</a>
      <a href="/product/create">Crear Producto</a>
    </nav>

    @hasSection('actions')
      <div class="actions">
        @yield('actions')
      </div>
    @endif
  </div>
</header>

<main>
  @yield('content')
</main>

<footer class="footer">
  <p>© 2026 Leather Drop - Todos los derechos reservados</p>
  <p>Proyecto académico</p>
</footer>

@stack('scripts')
</body>
</html>