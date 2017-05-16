<?php
class Project {
    private $id, $projectName, $description, $github, $sampleLink;

    public function __construct($id, $projectname, $description, $github, $samplelink) {
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
    public function getprojectName() {
        return $this->projectName;
    }
    public function setprojectName($value) {
        $this->projectName = $value;
    }
    public function getdescription() {
        return $this->description;
    }
    public function setdescription($value) {
        $this->description = $value;
    }
      
    public function getgithub() {
        return $this->github;
    }
    public function setgithub($value) {
        $this->github = $value;
    }
    public function getsampleLink() {
        return $this->sampleLink;
    }
    public function setsampleLink($value) {
        $this->sampleLink = $value;
    }
}
?>