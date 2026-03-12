@extends('layout.app')

@section('title','Detalle del producto')

@section('content')
<div class="container">

  <div id="notFound" class="card" style="display:none;">
    <div class="notice">
      <h2>Producto no encontrado</h2>
      <a class="btn btn-ghost" href="/product/">Volver al listado</a>
    </div>
  </div>

  <section id="detail" class="detail" style="display:none;">
    <div class="card">
      <div class="image-box">
        <img id="img" />
      </div>
    </div>

    <div class="card">
      <div class="info">
        <h1 id="name"></h1>

        <div class="meta">
          <span>ID: <strong id="pid"></strong></span>
          <span id="statusBadge" class="badge"></span>
        </div>

        <p id="desc" class="desc"></p>
        <div id="price" class="price"></div>

        <div style="margin-top:15px;">
          <a class="btn btn-ghost" href="/product/">Volver</a>
        </div>
      </div>
    </div>
  </section>

</div>
@endsection

@push('scripts')
<script>
const STORAGE_KEY = "techmarket_products_v1";

/* 🔥 Obtener ID directamente de la URL */
const pathParts = window.location.pathname.split("/");
const productId = pathParts[pathParts.length - 1];

function loadProducts(){
  const raw = localStorage.getItem(STORAGE_KEY);
  if(!raw) return [];
  try{
    return JSON.parse(raw);
  }catch{
    return [];
  }
}

function formatCOP(value){
  const n = Math.round(Number(value) || 0);
  return "$" + n.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
}

const products = loadProducts();
const product = products.find(p => String(p.id_producto) === String(productId));

const notFound = document.getElementById("notFound");
const detail = document.getElementById("detail");

if(!product){
  notFound.style.display = "block";
} else {
  detail.style.display = "grid";

  document.getElementById("img").src = product.imagen;
  document.getElementById("name").textContent = product.nombre;
  document.getElementById("pid").textContent = product.id_producto;
  document.getElementById("desc").textContent = product.descripcion;
  document.getElementById("price").textContent = formatCOP(product.precio);

  const badge = document.getElementById("statusBadge");
  const active = (product.estado || "").toLowerCase() === "activo";
  badge.textContent = active ? "Activo" : "Inactivo";
  badge.classList.add(active ? "active" : "inactive");
}
</script>
@endpush