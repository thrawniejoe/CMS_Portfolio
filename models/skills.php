<?php
class Skills {
    private $id, $user_id, $skill_name, $description, $skill_picture;

    public function __construct($id, $user_id, $skill_name, $description, $skill_picture) {
        $this->id = $id;
        $this->projectName = $projectname;
        $this->description = $description;
        $this->github = $github;
        $this->sampleLink = $samplelink;
    }

    public function getID() {
        return $this->id;
    }
    public function setID($value) {
        $this->id = $value;
    }
  
    public function getUser_idD() {
        return $this->user_id;
    }
    public function setUser_id($user_id) {
        $this->user_id = $user_id;
    }
  public function getSkill_name() {
        return $this->skill_name;
    }
    public function setSkill_name($skill_name) {
        $this->skill_name = $skill_name;
    }
  public function getDescription() {
        return $this->description;
    }
    public function setdescription($description) {
        $this->description = $skill_picture;
    }
  public function getSkill_picture() {
        return $this->skill_picture;
    }
    public function setSkill_picture($skill_picture) {
        $this->skill_picture = $skill_picture;
    }
}
?>