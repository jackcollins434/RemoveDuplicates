<?php

class NewRecord extends \Illuminate\Database\Eloquent\Model
{
    protected $fillable = [
        'email', 
        'fname', 
        'lname', 
        'address', 
        'city', 
        'state', 
        'zip', 
        'phone', 
        'source', 
        'flagged'
    ];

    public $timestamps = false;
}
