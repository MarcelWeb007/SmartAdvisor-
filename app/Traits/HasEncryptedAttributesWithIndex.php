<?php

namespace App\Traits;

trait HasEncryptedAttributesWithIndex
{
    public static function bootHasEncryptedAttributesWithIndex(): void
    {
        static::saving(function ($model) {
            foreach ($model->getIndexableAttributes() as $attribute) {
                $indexField = "{$attribute}_index";

                if (!isset($model->{$attribute})) {
                    continue;
                }

                $value = $model->{$attribute};

                if (is_string($value)) {
                    $model->{$indexField} = mb_strtolower($value);
                } elseif (is_numeric($value)) {
                    $model->{$indexField} = round($value, 2);
                } elseif ($value instanceof \DateTime) {
                    /** @var \Carbon\Carbon $carbon */
                    $carbon = \Carbon\Carbon::instance($value);
                    $model->{$indexField} = $carbon->toDateString();
                }

                // Tu peux ajouter ici d'autres types (bool, json...)
            }
        });
    }

    public function getIndexableAttributes(): array
    {
        return property_exists($this, 'indexable') ? $this->indexable : [];
    }
}
