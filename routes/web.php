<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AssinaturaController;
use App\Http\Controllers\PremiumController;
use App\Http\Controllers\PerfilController;
use App\Models\Tenant;
use Illuminate\Support\Facades\Route;

Route::get('/',function(){
    return view('welcome');
});



Route::get('/cadastrar/basico',[ProfileController::class,'cadastrar'])->name('perfil.cadastrar.basico');
Route::get('/cadastrar/intermediario',[ProfileController::class,'cadastrar_intermediario'])->name('perfil.cadastrar.intermediario');

Route::post('/deletar/convidado',[ProfileController::class,'deletar_convidado'])->name('deletar.convidado');



Route::get('/cadastrar/empresarial',[ProfileController::class,'cadastrar_empresarial'])->name('perfil.cadastrar.empresarial');
Route::post('/cadastrarStore',[ProfileController::class,'cadastrarStore'])->name('perfil.cadastrar.store');
Route::post('/cadastrarInterStore',[ProfileController::class,'cadastrarInterStore'])->name('perfil.cadastrar.intermediario.store');
Route::post('/cadastrarEmpreStore',[ProfileController::class,'cadastrarEmpreStore'])->name('perfil.cadastrar.empresarial.store');

Route::get('subscriptions/checkout',[\App\Http\Controllers\Subscription\SubscriptionController::class,'index'])->name('subscriptions.checkout');
    //->middleware(['check.choice.plan']);
Route::get('subscriptions/premium',[\App\Http\Controllers\Subscription\SubscriptionController::class,'premium'])->name('subscriptions.premium');
    //->middleware(['subscribed']);

Route::get('/planos',[AssinaturaController::class,'listarPlanos'])->name('listar.planos');
Route::get('/cadastro',[AssinaturaController::class,'cadastro'])->name('cadastro.planos');

Route::middleware(['auth','verified'])->group(function () {

    Route::post("/pdf",[PerfilController::class,'criarImagem'])->name('gerar.imagem');
    Route::post("/mudardados",[PerfilController::class,'mudarDados'])->name('mudar.dados');
    Route::get('/home', [DashboardController::class,'index'])->name('home')->middleware(['check','free']);
    Route::get('/config', [DashboardController::class,'config'])->name('home.config');
    Route::get('/configuracao', [DashboardController::class,'configuracao'])->name('home.configuracao');
    Route::get('/coparticipacao', [DashboardController::class,'coparticipacao'])->name('home.coparticipacao');
    Route::post('/operadora/planos',[DashboardController::class,'operadoraPlanos'])->name('home.operadora.plano');
    Route::get('/assinatura',AssinaturaController::class)->name('subscribe');
    Route::get('/assinatura/intermediario',[AssinaturaController::class,'intermediario'])->name('subscribe.intermediario');
    Route::get('/assinatura/empresarial',[AssinaturaController::class,'empresarial'])->name('subscribe.empresarial');
    Route::get('/premium',PremiumController::class)->name('premium');
    Route::get('/perfil',[PerfilController::class,'index'])->name('perfil.index');
    Route::post('/perfil',[PerfilController::class,'editar'])->name('perfil.edit');
    Route::post('/photo',[PerfilController::class,'photo'])->name('perfil.photo');
    Route::post('/dashboard',[DashboardController::class,'orcamento'])->name('orcamento.montarOrcamento');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/profile/store', [ProfileController::class, 'store'])->name('profile.store');
    Route::post('/profile/convidado/cadastrar', [ProfileController::class, 'cadastrarConvidado'])->name('profile.convidado.cadastrar');

    Route::post('/tenant/edit',[\App\Http\Controllers\TenantController::class,'editar'])->name('tenant.edit');
    Route::post('/tenant/logo/edit',[\App\Http\Controllers\TenantController::class,'logo'])->name('tenant.logo');
    Route::post('/tenant/operadoras',[\App\Http\Controllers\TenantController::class,'operadoras'])->name('tenant.operadoras');
    Route::post('/tenant/basico/operadoras',[\App\Http\Controllers\TenantController::class,'tenant_operadora'])->name('tenant.basico.operadoras');
    Route::post('/tenant/listar/planos/operadoras',[\App\Http\Controllers\TenantController::class,'tenant_listar_planos_operadoras'])->name('tenant.listar.planos.operadoras');


    Route::post('/configuracao/observacao',[\App\Http\Controllers\DashboardController::class,'observacao'])->name('configuracao.observacao');
    Route::post('/configuracao/coparticipacao',[\App\Http\Controllers\DashboardController::class,'configurar_coparticipacao'])->name('configuracao.coparticipacao');
    Route::post('/configuracao/valores/coparticipacao',[\App\Http\Controllers\DashboardController::class,'configurar_coparticipacao_valores'])->name('configuracao.coparticipacao.valores');
    Route::post('/configuracao/mudar/telefone',[\App\Http\Controllers\DashboardController::class,'configurar_change_telefone'])->name('configurar.change.telefone');
    Route::post('/configuracao/observacoes/coparticipacao',[\App\Http\Controllers\DashboardController::class,'configurar_observacoes_coparticipacao'])->name('configurar.observacoes.coparticipacao');

    Route::post('/configuracao/verificar/valores',[\App\Http\Controllers\DashboardController::class,'configurar_verificar_valores'])->name('configuracao.veriricar.valores');

    Route::post('/configurar/finalizar',[\App\Http\Controllers\DashboardController::class,'configurar_finalizar'])->name('configurar.finalizar');

});

require __DIR__.'/auth.php';
