<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Tenant;

class SetTenant
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

		$slug = $request->query('tenant', 'acme');
		$tenant = Tenant::where('slug', $slug)->first();
		if (!$tenant) {
			abort(400, 'Tenant inválido o no encontrado.');
		}

		app()->instance('currentTenantId', $tenant->id);

        return $next($request);
    }
}
