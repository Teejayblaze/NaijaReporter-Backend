<?php 

namespace App;

class CustomSimilarNewsModel {

    public $id;
    public $title;
    public $imagePath;
    public $duration;
    public $authorName;

    public function __construct($id, $title, $imagePath, $duration, $authorName)
    {
        $this->id = $id;
        $this->title = $title;
        $this->imagePath = $imagePath;
        $this->duration = $duration;
        $this->authorName = $authorName;
    }
}