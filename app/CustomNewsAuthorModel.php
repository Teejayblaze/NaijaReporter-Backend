<?php 

namespace App;

class CustomNewsAuthorModel {

    public $id;
    public $name;
    public $imagePath;
    public $description;

    public function __construct($id, $name, $imagePath, $description)
    {
        $this->id = $id;
        $this->name = $name;
        $this->imagePath = $imagePath;
        $this->description = $description;
    }
}