<?php
require 'bootstrap.php';
$records = Record::all()->toArray();
foreach ($records as $record) {
    if ($record['email'] === null && $record['phone'] === null) {
    } else {
        if ($record['email'] !== null && $record['phone'] === null) {
            $newRecord = NewRecord::where('email', $record['email'])->first();
            if ($newRecord === null) {
                (new NewRecord)->fill($record)->save();
            } else {
                $attributes = $newRecord->getAttributes();
            $updated = 0;
            foreach ($attributes as $attribute => $value) {
                // dd($newRecord);
                if ($newRecord[$attribute] === null && $record[$attribute] !== null) {
                    $attributes[$attribute] = $record[$attribute];
                }
            }
                // $newRecord->fill($record)->update();
            }
            continue;
        }
        $newRecord = NewRecord::where('email', $record['email'])
        ->orWhere('phone', $record['phone'])
        ->first();
        if ($newRecord === null) {
            (new NewRecord)->fill($record)->save();
        } else {
            $attributes = $newRecord->getAttributes();
            $updated = 0;
            foreach ($attributes as $attribute => $value) {
                // dd($newRecord);
                if ($newRecord[$attribute] === null && $record[$attribute] !== null) {
                    $attributes[$attribute] = $record[$attribute];
                }
            }
            $newRecord = NewRecord::where('email', $record['email'])
            ->orWhere('phone', $record['phone'])
            ->first();
            $newRecord->fill($attributes);
            $record = NewRecord::find(58);
            $record->fill($attributes)->update();
        }
    }
}
