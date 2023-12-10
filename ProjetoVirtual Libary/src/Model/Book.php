<?php

namespace QI\VirtualLibary\Model;

class Book
 {
    private $id;
    private $titlebook;
    private $authorname;
    private $genderbook;
    private $numberchapters;
    private $description;


    public function __get($attribute)
    {
        return $this->$attribute;
    }
    public function __set($attribute,$value)
    {
        $this->$attribute = $value;
    }




/**
     * This method creat a new Call object
     * @param string TitleBook $titlebook
     * @param string AuthorName $authorname
     * @param string GenderBook $genderbook
     * @param int NumberChapters $numberchapters
     * @param string $description
     */

     public function __construct($titlebook,$authorname,$genderbook,$numberchapters,$description){
        $this->titlebook = $titlebook;
        $this->authorname = $authorname;
        $this->genderbook = $genderbook;
        $this->numberchapters = $numberchapters;
        $this->description = $description;
    }
}