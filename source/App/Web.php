<?php

namespace Source\App;

use League\Plates\Engine;
use Source\Models\Notice;

class Web {

  public function __construct($router) {
    $this->view = Engine::create(
        dirname(__DIR__, 2) . "/theme",
        "php"
    );
    $this->view->addData(["router" => $router]);
  }

  public function home(array $data): void {
    $notice = new Notice();
    echo $this->view->render("home", [
        "noticies" => $notice->getNotices("", "id DESC")
    ]);
  }
  public function create(array $data): void {
    echo $this->view->render("create", []);
  }

  public function store(array $data) : void {
      $noticeData = filter_var_array($data, FILTER_SANITIZE_STRING);
      if(in_array("", $noticeData)){
          $callback["message"] = message("Informe o título, data, hora e descricão", "warning");
          echo json_encode($callback);
          return;
      }

      $notice = new Notice();
      $notice->title = $noticeData["title"];
      $notice->description = $noticeData["description"];
      $notice->date = $noticeData["date"];
      $notice->hour = $noticeData["hour"];
      $notice->save();

      $callback["message"] = message("Cadastro efetuado!", "success");
      echo json_encode($callback);

  }

  public function edit(array $data): void {
    if(!empty($data)) {
      $noticeData = filter_var_array($data, FILTER_VALIDATE_INT);
      $notice = (new Notice())->getNotice($noticeData['id']);
      if($notice) {
        echo $this->view->render("edit", ["notice" => $notice]);
        return;
      } else {
        header("Location:".ROOT);
      }
      return;
    }
    header("Location: ".ROOT); 
  }

  public function update(array $data){
      $noticeData = filter_var_array($data, FILTER_SANITIZE_STRING);
      if(in_array("", $noticeData)){
          $callback["message"] = message("Informe o título, data, hora e descricão!", "warning");
          echo json_encode($callback);
          return;
      }
      $notice = (new Notice())->getNotice($noticeData['id']);

      $notice->title = $noticeData["title"];
      $notice->description = $noticeData["description"];
      $notice->date = $noticeData["date"];
      $notice->hour = $noticeData["hour"];
      $notice->update();
      $callback["message"] = message("Atualização efetuada!", "success");
      echo json_encode($callback);
  }

  public function destroy(array $data) {
      if(empty($data["id"])) {
          return;
      }
      $id = filter_var($data["id"], FILTER_VALIDATE_INT);
      $notice = (new Notice())->getNotice($id);
      if($notice) {
          $notice->delete($id);
      }
      $callback["remove"] = true;
      echo json_encode($callback);
  }

  public function error(array $data): void {

    $error = new \stdClass();
    $error->code = $data['errcode'];
    $error->link = "/";
    echo $this->view->render("error", ["error" => $error]);
   
  }
}