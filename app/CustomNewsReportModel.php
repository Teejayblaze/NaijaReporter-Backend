<?php 

namespace App;

class CustomNewsReportModel {

    public $id;
    public $category;
    public $title;
    public $subtitle;
    public $duration;
    public $imagePath;
    public $bgColor;
    public $similarity;
    public $read;
    public $upvote; 
    public $author;

    public function __construct(
        $id,
        $category, 
        $title, 
        $subtitle, 
        $duration, 
        $imagePath, 
        $bgColor, 
        $similarity, 
        $read = 6, 
        $upvote = 100,
        $author
    )
    {
        $this->id = $id;
        $this->category = $category;
        $this->title = $title;
        $this->subtitle = $subtitle;
        $this->duration = $duration;
        $this->imagePath = $imagePath;
        $this->bgColor = $bgColor;
        $this->similarity = $similarity;
        $this->read = $read;
        $this->upvote = $upvote; 
        $this->author = $author;
    }
}