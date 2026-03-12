@extends('layout.app')

@section('title', 'Crear Producto')

@section('content')

<main class="form-wrap">
  <div class="card form-container">
    <h2>Crear Nuevo Producto</h2>

    <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
      @csrf

      <div class="form-grid">

        <div class="form-group">
          <label>Categoria</label>
          <select name="estado" required>
            @foreach ($categoryList as $category)
              <option value="{{ $category->id }}">{{ $category->name }}</option>                
            @endforeach


          </select>
        </div>

        <div class="form-group full">
          <label>Nombre</label>
          <input type="text" name="nombre" required placeholder="Ej: Parlante Bluetooth">
        </div>

        <div class="form-group">
          <label>Precio</label>
          <input type="number" name="precio" required min="0" placeholder="Ej: 99000">
        </div>

        <div class="form-group">
          <label>Imagen</label>
          <input type="file" name="imagen" accept="image/*">
        </div>

        <div class="form-group full">
          <label>Descripción</label>
          <textarea name="descripcion" required placeholder="Describe el producto..."></textarea>
        </div>

      </div>

      <div class="row-actions">
        <button class="btn btn-primary" type="submit">Guardar Producto</button>
        <a class="btn btn-ghost" href="/product">Volver al listado</a>
      </div>

    </form>
  </div>
</main>

@endsection