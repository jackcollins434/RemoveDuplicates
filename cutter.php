<?php

require 'bootstrap.php';

$records = NewRecord::where('phone', '<>', '0')->whereNotNull('phone')->get();

foreach ($records as $record) {
    $record->phone = preg_replace('/[^0-9]/', '', $record->phone);
    $record->update();
}
