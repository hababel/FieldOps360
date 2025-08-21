@extends('layouts.app')

@section('content')
<div class="container">
  <h1>Clientes</h1>
  @if(session('ok')) <p>{{ session('ok') }}</p> @endif

  <a href="{{ route('tenant.customers.create', ['tenant'=>request('tenant')]) }}">Nuevo</a>

  <table border="1" cellpadding="6">
    <tr>
			<th>Nombre</th>
			<th>Email</th>
			<th>Teléfono</th>
			<th>Acciones</th>
		</tr>
    @forelse($customers as $c)
      <tr>
        <td>{{ $c->name }}</td>
        <td>{{ $c->email }}</td>
        <td>{{ $c->phone }}</td>
        <td>
          <a href="{{ route('tenant.customers.edit', ['customer'=>$c->id, 'tenant'=>request('tenant')]) }}">Editar</a>
          <form action="{{ route('tenant.customers.destroy', ['customer'=>$c->id, 'tenant'=>request('tenant')]) }}" method="POST" style="display:inline">
            @csrf @method('DELETE')
            <button onclick="return confirm('¿Eliminar?')">Eliminar</button>
          </form>
        </td>
      </tr>
    @empty
      <tr><td colspan="4">Sin clientes</td></tr>
    @endforelse
  </table>

  {{ $customers->links() }}
</div>
@endsection
