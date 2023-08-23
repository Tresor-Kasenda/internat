<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class StatusVerification
{
    /**
     * Handle an incoming request.
     *
     * @param Closure(Request): (Response) $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->check() && !auth()->user()->status) {
            auth()->logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            session()->flash('error', "Votre compte n'est pas encore activé. Veuillez attendre la confirmation de l'administrateur.");
            return redirect()->route('home');
        }
        return $next($request);
    }
}
