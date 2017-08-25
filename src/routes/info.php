<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

$app = new \Slim\App;

//Get All acoes

$app->get('/api/provas/{ano}', function(Request $request, Response $response){

          $ano = $request->getAttribute('ano');

          switch ($ano) {
            case '2016':
              $url = 'https://www.fema.edu.br/images/pdfs/Vestibular/prova_2016.pdf';
              break;

            case '2015':
                $url = 'https://www.fema.edu.br/images/pdfs/Vestibular/prova_2015.pdf';
              break;

            case '2014':
                $url = 'https://www.fema.edu.br/images/pdfs/Vestibular/prova_2014.pdf';
              break;

            default:

              break;
          }

          $json_str = '{
                        "messages": [
                          {
                            "attachment": {
                              "type": "file",
                              "payload": {
                                "url": ".$url"
                              }
                            }
                          }
                        ]
                      }'
          echo $json_str;



          } catch (PDOException $e) {
              echo '{"eror":
                        {"text": '.$e->getMessage().'};

                    }';
          }

});

//Get Single acao
$app->get('/api/acao/{id}', function(Request $request, Response $response){

          $id = $request->getAttribute('id');
          $sql = "SELECT * FROM acoes WHERE id= $id";

          try {
              //get DB oci_fetch_object
              $db = new db();
              $db = $db->connect();

              $stmt = $db->query($sql);
              $acao = $stmt->fetchAll(PDO::FETCH_OBJ);
              $db = null;

              echo json_encode($acao, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);

          } catch (PDOException $e) {
              echo '{"eror":
                        {"text": '.$e->getMessage().'};

                    }';
          }

});

//ADD acao
/* $app->post('/api/acao/add', function(Request $request, Response $response){

          $realizador = $request->getParam('realizador');
          $prazo = $request->getParam('prazo');
          $descricao = $request->getParam('descricao');
          $favorecido = $request->getParam('favorecido');
          $local = $request->getParam('local');
          $contato = $request->getParam('contato');

          $sql = "INSERT INTO acoes (realizador, prazo, descricao, favorecido, local, contato) VALUES
          (:realizador, :prazo, :descricao, :favorecido, :local, :contato)";

          try {
              //get DB oci_fetch_object
              $db = new db();
              //connect
              $db = $db->connect();

              $stmt = $db->prepare($sql);

              $stmt->bindParam(':realizador', $realizador);
              $stmt->bindParam(':prazo', $prazo);
              $stmt->bindParam(':descricao', $descricao);
              $stmt->bindParam(':favorecido', $favorecido);
              $stmt->bindParam(':local', $local);
              $stmt->bindParam(':contato', $contato);

              $stmt->execute();

              echo '{"notice":{"text": "Acao adicionada"}';

          } catch (PDOException $e) {
              echo '{"eror":
                        {"text": '.$e->getMessage().'};

                    }';
          }

});


//UPDATE acao
$app->put('/api/acao/update/{id}', function(Request $request, Response $response){

          $id = $request->getAttribute('id');
          $realizador = $request->getParam('realizador');
          $prazo = $request->getParam('prazo');
          $descricao = $request->getParam('descricao');
          $favorecido = $request->getParam('favorecido');
          $local = $request->getParam('local');
          $contato = $request->getParam('contato');

          $sql = "UPDATE acoes SET
                        realizador = :realizador,
                        prazo      = :prazo,
                        descricao  = :descricao,
                        favorecido = :favorecido,
                        address    = :address,
                        local      = :local,
                        contato    = :contato
                  WHERE id = $id";

          try {
              //get DB oci_fetch_object
              $db = new db();
              //connect
              $db = $db->connect();

              $stmt = $db->prepare($sql);

              $stmt->bindParam(':realizador', $realizador);
              $stmt->bindParam(':prazo', $prazo);
              $stmt->bindParam(':descricao', $descricao);
              $stmt->bindParam(':favorecido', $favorecido);
              $stmt->bindParam(':local', $local);
              $stmt->bindParam(':contato', $contato);

              $stmt->execute();

              echo '{"notice":{"text": "Acao atualizada"}';

          } catch (PDOException $e) {
              echo '{"eror":
                        {"text": '.$e->getMessage().'};

                    }';
          }

});


//DELETE acao
$app->delete('/api/acao/delete/{id}', function(Request $request, Response $response){

          $id = $request->getAttribute('id');
          $sql = "DELETE FROM acoes WHERE id= $id";

          try {
              //get DB oci_fetch_object
              $db = new db();
              $db = $db->connect();

              $stmt = $db->prepare($sql);
              $stmt->execute();
              $db = null;

              echo '{"notice":{"text": "Acao deletada"}';

          } catch (PDOException $e) {
              echo '{"eror":
                        {"text": '.$e->getMessage().'};

                    }';
          }

});
*/
