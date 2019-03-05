<?php

//criação de rota é feita pelas funções $this->get() ou $this->post;

$this->get('', function($arg) {
    echo 'Home';
});

$this->get('noticias', function($arg) {
    echo 'teste';
});

$this->get('noticias/{id}', function($arg) {
    //Carregamento do modulo através do Core;
    $tpl = $this->core->loadModule('template');

    //Renderizando o html atraves da pasta templates;
    $tpl->render('teste', $arg);
});