<?php

namespace App\Http\Middleware;

use Closure;

class ProvjeriDrzavu
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        /**

         Međusoftver „ProvjeriDrzavu“ bi mogao provjeravat iz koje je države
         korisnik i ako ne prođe uvjete preusmjerit korisnika na ponovnu registraciju.
         Postoje dvije vrste međusoftvera ovisno o tome kad se izvršavaju:
         prije nego li je zahtjev prošao ili poslije. Isto tako je moguće definirati globalne
         međusoftvere koji će se izvršavati pri svakom zahtjevu ili je moguće postaviti da
         međusoftver bude dodatni sloj samo na nekoj ili nekim rutama. [9]

         **/

        return $next($request);
    }
}
