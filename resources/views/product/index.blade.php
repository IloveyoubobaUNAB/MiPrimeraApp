@extends('layout.app')

@section('title', 'TechMarket - Productos')

@section('content')

<div class="container">

  <div class="header-row">
    <div>
      <h2>Productos Para Vestir Bien</h2>
      <p class="small">Clic en el nombre o imagen para ver detalles.</p>
    </div>
    <div class="tools">
      <input type="search" id="search" placeholder="Buscar por nombre...">
    </div>
  </div>

  <div class="grid" id="grid">
    @foreach ($misProductos as $product)
        <div class="card product-card">
            <div class="card-img">
                {{-- Validamos si existe la imagen --}}
                @if (isset($product->image) && $product->image)
                    <img src="{{ asset('img/' . $product->image) }}" alt="{{ $product->name }}">
                @else
                    <img src="https://via.placeholder.com/150" alt="Sin imagen">
                @endif
            </div>
            
            <div class="card-body">
                <div class="card-meta">
                    <span>ID: {{ $product->id }}</span>
                    <span class="badge active">Activo</span>
                </div>
                
                <h3 class="card-name">{{ $product->name }}</h3>
                <p class="card-desc">{{ $product->description }}</p>
                <div class="card-price">${{ number_format($product->price, 0, ',', '.') }}</div>
            </div>

            <div class="card-footer">
                <button class="btn btn-primary">Agregar</button>
                <a href="/product/{{ $product->id }}" class="btn btn-ghost">Ver</a>
            </div>
        </div>
    @endforeach
  </div>

  <div class="empty" id="empty" style="display:none;">
    No hay productos para mostrar.
  </div>

</div>

@push('scripts')
<script>
  const searchInput = document.getElementById('search');
  const emptyState  = document.getElementById('empty');

  searchInput.addEventListener('input', () => {
    const query   = searchInput.value.trim().toLowerCase();
    const cards   = document.querySelectorAll('.product-card');
    let   visible = 0;

    cards.forEach(card => {
      const name = card.querySelector('.card-name').textContent.toLowerCase();
      const show = name.includes(query);
      card.style.display = show ? '' : 'none';
      if (show) visible++;
    });

    emptyState.style.display = visible === 0 ? 'block' : 'none';
  });
</script>
@endpush

@endsection