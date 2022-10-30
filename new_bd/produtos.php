<?php
  class Produto{
    private $conexao;

    public function __construct()
    {
      try{
        $this->conexao = new PDO('mysql:host=localhost;dbname=exemplo', 'root', '');
        if ($this->conexao==null)
          throw new Exception('Erro na Conexão');
      }catch(Exception $e){
        echo $e->getMessage();
      }
    }

    public function insert(string $descricao): int { 
      $sql = 'insert into produtos(descricao) value (?)';

      $prepare = $this->conexao->prepare($sql);

      $prepare->bindParam(1, $descricao);

      $prepare->execute();

      return $prepare->rowCount();
 
    }
    public function list(): array{ 
      $sql = 'select * from produtos';

      $produtos =  [];
      
      foreach($this->conexao->query($sql) as $key => $value){
        array_push($produtos, $value);
      }
      return $produtos;
    }
    public function delete(int $id): int { 
      $sql = 'delete from produtos where id = ?';

      $prepare = $this->conexao->prepare($sql);

      $prepare->bindParam(1, $id);

      $prepare->execute();

      return $prepare->rowCount();
    }
    public function update(string $descricao, int $id): int { 
      $sql = 'update produtos set descricao = ? where id = ?';

      $prepare = $this->conexao->prepare($sql);

      $prepare->bindParam(1, $descricao);
      $prepare->bindParam(2, $id);

      $prepare->execute();

      return $prepare->rowCount();
 
    }
  }