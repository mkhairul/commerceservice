<?php

class Product extends Eloquent{

    protected $table = 'product';
    protected $fillable = array('name', 'slug', 'description', 'shortDescription', 'metaDescription', 'metaKeywords');

}
