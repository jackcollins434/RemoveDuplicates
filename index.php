<?php

require 'bootstrap.php';

$records = Record::all()->toArray();

foreach ($records as $record) {
    $newRecord = NewRecord::where('email', $record['email'])
        ->orWhere('phone', $record['phone'])
        ->first();

    if ($newRecord === null) {
        (new NewRecord)->fill($record)->save();
    } else {
        $newRecord->fill($record)->update();
    }
}
