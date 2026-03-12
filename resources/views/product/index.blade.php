@extends('layout.app')

@section('title', 'TechMarket - Productos')

@section('content')

<div class="container">

  <div class="header-row">
    <div>
      <h2>Productos Tecnológicos</h2>
      <p class="small">Clic en el nombre o imagen para ver detalles.</p>
    </div>
    <div class="tools">
      <input type="search" id="search" placeholder="Buscar por nombre...">
    </div>
  </div>

  <div class="grid" id="grid">

    @foreach ($misProductos as $product)
    <div class="card product-card">
        <a class="card-img" href="/product/{{ $product->id }}">
            @if ($product->image)
                {{-- Esta es la línea clave para la imagen --}}
                <img src="{{ asset('img/' . $product->image) }}" alt="{{ $product->name }}">
            @else
                <img src="https://via.placeholder.com/150" alt="Sin imagen">
            @endif
        </a>
        
        <div class="card-body">
            <div class="card-meta">
                <span>ID: {{ $product->id }}</span>
                <span class="badge active">Activo</span>
            </div>
            
            <a class="card-name" href="/product/{{ $product->id }}">{{ $product->name }}</a>
            <p class="card-desc">{{ $product->description }}</p>
            <div class="card-price">${{ number_format($product->price, 0, ',', '.') }}</div>
        </div>

        <div class="card-footer">
            <button class="btn-add">Agregar</button>
            <a href="/product/{{ $product->id }}" class="btn-view">Ver</a>
        </div>
    </div>
@endforeach
        
      </a>
      <div class="card-body">
        <div class="card-meta">
          <span>{{$product->id}}</span>
          <span class="badge active">Activo</span>
        </div>
        <a class="card-name" href="/product/101">{{$product->name}}</a>
        <p class="card-desc">{{$product->description}}</p>
        <div class="card-price">{{$product->price}}</div>
      </div>
      <div class="card-footer">
        <button class="btn btn-primary">Agregar</button>
        <a class="btn btn-ghost" href="/product/101">Ver</a>
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