<?php
class Project {
    private $id, $projectName, $description, $github, $sampleLink, $displayPicture;

    public function __construct($id, $projectname, $description, $github, $samplelink, $displayPicture) {
        $this->id = $id;
        $this->projectName = $projectname;
        $this->description = $description;
        $this->github = $github;
        $this->sampleLink = $samplelink;
        $this->displayPicture = $displayPicture;
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
    public function getDisplayPicture($value){
        $this->displayPicture = $value;
    }
    public function setDisplayPicture($value) {
        $this->displayPicture = $value;
    }
}
?>