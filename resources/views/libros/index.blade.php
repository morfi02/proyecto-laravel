<!-- resources/views/libros/index.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">Listado de Libros</h1>
    
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @auth
    <a href="{{ route('libros.create') }}" class="btn btn-primary mb-3">
        <i class="bi bi-plus-circle"></i> Nuevo Libro
    </a>
    @endauth

    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th>Título</th>
                    <th>Autor</th>
                    <th>Fecha Publicación</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($libros as $libro)
                <tr>
                    <td>{{ $libro->titulo }}</td>
                    <td>{{ $libro->autor }}</td>
                    <td>{{ $libro->fecha_publicacion->format('d/m/Y') }}</td>
                    <td>
                        <a href="{{ route('libros.show', $libro) }}" 
                           class="btn btn-sm btn-info"
                           title="Ver detalles">
                            <i class="bi bi-eye"></i>
                        </a>
                        
                        @auth
                        @if(auth()->user()->hasRole('admin'))
                        <a href="{{ route('libros.edit', $libro) }}" 
                           class="btn btn-sm btn-warning"
                           title="Editar">
                            <i class="bi bi-pencil"></i>
                        </a>
                        
                        <form action="{{ route('libros.destroy', $libro) }}" 
                              method="POST" 
                              class="d-inline"
                              onsubmit="return confirm('¿Seguro que quieres eliminar este libro?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" 
                                    class="btn btn-sm btn-danger"
                                    title="Eliminar">
                                <i class="bi bi-trash"></i>
                            </button>
                        </form>
                        @endif
                        @endauth
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-center">No hay libros registrados</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{ $libros->links() }}
</div>
@endsection