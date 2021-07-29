<?php

namespace Source\Models;

use \Source\Db\Database;
use \PDO;

class Notice  {

  public $id;

  public $title;

  public $description;

  public $date;

  public $hour;

  public function __construct() {
    
  }

  public function save() {
    $database = new Database('noticies');
    $this->id = $database->insert([
      'title' =>$this->title,
      'description' =>$this->description,
      'date' =>$this->date,
      'hour' =>$this->hour
    ]);
    return true;
  }

  public function update() {
    return (new Database('noticies'))
    ->update('id = '.$this->id, [
      'title' => $this->title,
      'description' =>$this->description,
      'date' => $this->date,
      'hour' => $this->hour
    ]);
  }

  public function delete($id) {
    return (new Database('noticies'))
    ->delete('id ='. $id);
  }

  public static function getNotices($where = null, $order = null, $limit = null, $offset = null) {
    return (new Database('noticies'))
      ->select($where, $order, $limit, $offset)
      ->fetchAll(PDO::FETCH_CLASS, self::class);
  }

  public function getNotice($id) {
    return (new Database('noticies'))
      ->select('id = ' .$id)
      ->fetchObject(self::class);
  }


}