@extends('layouts.app')

@section('content')
<div class="container">
  <h1>Nuevo cliente</h1>
  <form method="POST" action="{{ route('tenant.customers.store', ['tenant'=>request('tenant')]) }}">
    @csrf
    <div><label>Nombre</label><input name="name" value="{{ old('name') }}" required></div>
    <div><label>Email</label><input name="email" value="{{ old('email') }}"></div>
    <div><label>Teléfono</label><input name="phone" value="{{ old('phone') }}"></div>
    <div><label>Dirección</label><textarea name="address">{{ old('address') }}</textarea></div>
    <button>Guardar</button>
    <a href="{{ route('tenant.customers.index', ['tenant'=>request('tenant')]) }}">Cancelar</a>
  </form>
  @error('name')<p>{{ $message }}</p>@enderror
</div>
@endsection
