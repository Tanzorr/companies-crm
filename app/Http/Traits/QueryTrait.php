<?php

namespace App\Http\Traits;

trait QueryTrait
{

    public function scopeSearch($query, $search, $fields)
    {
        return $query->where(function ($query) use ($search, $fields) {
            foreach ($fields as $field) {
                $query->orWhere($field, 'like', '%' . $search . '%');
            }
        });
    }

}
