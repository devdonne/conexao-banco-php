<?php
  declare(strict_types=1);
  require 'produtos.php';

  function listar(){
    $produto = new Produto();

    echo '<h3>  Produtos:</h3>';
    
    foreach($produto->list() as $value){
      echo 'id: '.$value['id'].'<br> Descrição: '.$value['descricao'].'<hr>';
    }
  }
   function inserir(){
      $produto = new Produto();

      $produto->insert('inserindo mais uma descrição!');
   }
   listar();

   /*outras duas implementações */