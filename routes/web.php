<?php

Auth::routes();

Route::group(['prefix' => 'painel', 'middleware' => 'auth'], function () {

  Route::get('/', 'Painel\PainelController@index');
  Route::get('/login', 'Painel\PainelController@index');
  
  // rotas textos
  Route::get('/textos', 'Painel\TextosController@index');
  Route::get('/textos/create', 'Painel\TextosController@create');
  Route::post('/textos/create', 'Painel\TextosController@store');
  Route::get('/textos/{id}/delete/', 'Painel\TextosController@destroy');
  Route::get('/textos/view/{id}', 'Painel\TextosController@view');
  Route::get('/textos/editar/{id}', 'Painel\TextosController@edit');
  Route::post('/textos/editar/{id}', 'Painel\TextosController@update');
  Route::get('/textos/galeria/{id}', 'Painel\TextosController@galeria');
  Route::post('/textos/upload/store', 'Painel\TextosController@fileStore');
  Route::post('/textos/delete', 'Painel\TextosController@fileDestroy');
  Route::get('/textos/{id}/deleteFoto/', 'Painel\TextosController@destroyFoto');

  // rotas servicos
  Route::get('/servicos', 'Painel\ServicosController@index');
  Route::get('/servicos/create', 'Painel\ServicosController@create');
  Route::post('/servicos/create', 'Painel\ServicosController@store');
  Route::get('/servicos/{id}/delete/', 'Painel\ServicosController@destroy');
  Route::get('/servicos/view/{id}', 'Painel\ServicosController@view');
  Route::get('/servicos/editar/{id}', 'Painel\ServicosController@edit');
  Route::post('/servicos/editar/{id}', 'Painel\ServicosController@update');
  Route::get('/servicos/galeria/{id}', 'Painel\ServicosController@galeria');
  Route::post('/servicos/upload/store', 'Painel\ServicosController@fileStore');
  Route::post('/servicos/delete', 'Painel\ServicosController@fileDestroy');
  Route::get('/servicos/{id}/deleteFoto/', 'Painel\ServicosController@destroyFoto');


  //Rotas certificados
  Route::get('/certificados', 'Painel\CertificadosController@index');
  Route::get('/certificados/view/{id}', 'Painel\CertificadosController@view');
  Route::get('/certificados', 'Painel\CertificadosController@index');
  Route::get('/certificados/create', 'Painel\CertificadosController@create');
  Route::post('/certificados/create', 'Painel\CertificadosController@store');
  Route::get('/certificados/editar/{id}', 'Painel\CertificadosController@edit');
  Route::post('/certificados/editar/{id}', 'Painel\CertificadosController@update');
  Route::get('/certificados/{id}/delete/', 'Painel\CertificadosController@destroy');


  
  //Rota empresa
  Route::get('/empresa', 'Painel\EmpresaController@index');
  Route::get('/empresa/view/{id}', 'Painel\EmpresaController@view');
  Route::get('/empresa/create', 'Painel\EmpresaController@create');
  Route::post('/empresa/create', 'Painel\EmpresaController@store');
  Route::get('/empresa/editar/{id}', 'Painel\EmpresaController@edit');
  Route::post('/empresa/editar/{id}', 'Painel\EmpresaController@update');
  Route::get('/empresa/{id}/delete/', 'Painel\EmpresaController@destroy');
  Route::get('/empresa/galeria/{id}', 'Painel\EmpresaController@galeria');
  Route::post('/empresa/upload/store', 'Painel\EmpresaController@fileStore');
  Route::post('/empresa/delete', 'Painel\EmpresaController@fileDestroy');
  Route::get('/empresa/{id}/deleteFoto/', 'Painel\EmpresaController@destroyFoto');
});


Route::group(['namespace' => 'Site'], function () {

  Route::get('/', 'SiteController@index');
  Route::get('/laboratorio', 'SiteController@lab');
  Route::get('/quimicapura', 'SiteController@quimicapura');
  Route::get('/qualidade', 'SiteController@qualidade');
  Route::get('/certificacoes', 'SiteController@certificacoes');
  Route::get('/servicos/{id}', 'SiteController@servicosdet');

  //teste servicos
  Route::get('/servicos', 'SiteController@servicos');
  Route::get('/servicos1', 'SiteController@servicos1');


  Route::get('/envie-sua-amostra', 'SiteController@amostra');
  Route::post('/amostra/SolicitarOrcamento', 'SiteController@enviarMensagem');



  // Route::get('/empresa', 'SiteController@empresa');
  // Route::get('/produtos', 'SiteController@produtos');
  // Route::get('/produtos/detalhes/{id}', 'SiteController@detalhes');
  // Route::get('/sustentabilidade', 'SiteController@sustentabilidade');
  // Route::get('/noticias', 'SiteController@noticias');
  // Route::get('/noticias/detalhes/{id}', 'SiteController@noticiadetalhes');
});
