@extends('layouts.app')

@section('content')
<div class="container">
  <h1>Editar cliente</h1>
  <form method="POST" action="{{ route('tenant.customers.update', ['customer'=>$customer->id, 'tenant'=>request('tenant')]) }}">
    @csrf @method('PUT')
    <div><label>Nombre</label><input name="name" value="{{ old('name',$customer->name) }}" required></div>
    <div><label>Email</label><input name="email" value="{{ old('email',$customer->email) }}"></div>
    <div><label>Teléfono</label><input name="phone" value="{{ old('phone',$customer->phone) }}"></div>
    <div><label>Dirección</label><textarea name="address">{{ old('address',$customer->address) }}</textarea></div>
    <button>Actualizar</button>
    <a href="{{ route('tenant.customers.index', ['tenant'=>request('tenant')]) }}">Volver</a>
  </form>
</div>
@endsection
