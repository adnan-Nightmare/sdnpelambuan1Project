<?php

class User_model{
    private $name = 'Admin';

    public function getUser(){
        return $this->name;
    }
}