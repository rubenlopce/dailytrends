<?php

class Feed{

    public $title;
    public $body;
    public $image;
    public $source;
    public $publisher;

    //Getters

    function getTitle(){
        return $this->title;
    }

    function getBody(){
        return $this->body;
    }

    function getImage(){
        return $this->image;
    }

    function getSource(){
        return $this->source;
    }

    function getPublisher(){
        return $this->publisher;
    }

    //Setters

    function setTitle($title){
        $this->title = $title;
    }

    function setBody($body){
        $this->body = $body;
    }

    function setImage($image){
        $this->image = $image;
    }

    function setSource($source){
        $this->source = $source;
    }

    function setPublisher($publisher){
        $this->publisher = $publisher;
    }

}

?>