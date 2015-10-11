<?php

  Class Survey{

    public $name;
    public $id;
    public $options = array();

    public function __construct($surveyID){
      global $db;
      $this->id = $surveyID;
      $stmt = $db->prepare("SELECT `SurveyTag` FROM `Surveys` WHERE `SurveyID` = ?;");
      $stmt->bind_param("i", $surveyID);
      if($stmt->execute()){
        $stmt->store_result();
        $stmt->bind_result($name);
        $stmt->fetch();
        $this->name = $name;
        $this->getOptions();
      }else{
        $name = null;
      }
      $stmt->close();
    }

    private function getOptions(){
      global $db;
      $opts = array();
      $stmt = $db->prepare("SELECT `Name`, `ID` FROM `Options` WHERE `SurveyID` = ?;");
      $id = $this->id;
      $stmt->bind_param("i", $id);
      if($stmt->execute()){
        $stmt->bind_result($name, $id);
        while($stmt->fetch() !== null){
          $opts[] = new Option($id, $name);
        }
      }
      $this->options = $opts;
      $stmt->close();
    }

    public static function insertSurvey($name, $options){
      global $db;
      $name = "#".$name;
      $stmt = $db->prepare("INSERT INTO `Surveys` (`SurveyTag`) VALUES (?);");
      $stmt->bind_param("s", $name);
      $stmt->execute();
      $stmt->store_result();
      $id = $stmt->insert_id;
      $stmt->close();

      if($id > 0){
        foreach($options as $option){
          Option::insertOption($option, $id);
        }
        return $id;
      } else {
        return -1;
      }
    }
  }
?>
