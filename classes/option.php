<?php

  class Option{

    public $name;
    public $id;

    public function __construct($id, $name){
      $this->id = $id;
      $this->name = $name;
    }

    public static function insertOption($tag, $surveyID){
      if($tag != ""){
        global $db;
        $tag = "#".$tag;
        $stmt = $db->prepare("INSERT INTO `Options` (`Name`, `SurveyID`) VALUES (?, ?);");
        $stmt->bind_param("si", $tag, $surveyID);
        $stmt->execute();
        $stmt->store_result();
        $id = $stmt->insert_id;
        $stmt->close();
      }
    }

  }

?>
