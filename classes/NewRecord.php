<?php

class NewRecord extends \Illuminate\Database\Eloquent\Model
{
    public $fillable = [
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
