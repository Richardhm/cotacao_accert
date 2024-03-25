<?php

namespace App\Http\Middleware;

use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class FreeCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

//        $testDateEnd = auth()->user()->tenant()->first()->test_date_end;
//        if(auth()->user()->tenant()->first()->test_date_end) {
//            $testDateEnd = new \DateTime($testDateEnd);
//            $dataAtual = new \DateTime();
//            $diferenca = $dataAtual->diff($testDateEnd);
//            $diferencaEmDias = $diferenca->days * ($testDateEnd > $dataAtual ? 1 : -1);
//            if($diferencaEmDias < 0) {
//                return redirect(route('listar.planos'));
//            }
//
//        }


        if (auth()->user()->tenant()->first()->test_date_end) {
            $testDateEnd = new \DateTime(auth()->user()->tenant()->first()->test_date_end);
            $dataAtual = new \DateTime();
            $testDateEnd->setTime(0, 0, 0);
            $dataAtual->setTime(0, 0, 0);
            $diferenca = $testDateEnd->diff($dataAtual);
            $diferencaEmDias = $diferenca->days;
            if ($testDateEnd < $dataAtual) {$diferencaEmDias *= -1;}
            if($diferencaEmDias <= 0) {
                return redirect(route('listar.planos'));
            }


        }





        return $next($request);
    }
}
