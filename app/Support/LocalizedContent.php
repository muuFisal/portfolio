<?php

namespace App\Support;

use Illuminate\Support\Arr;

class LocalizedContent
{
    public function locale(?string $locale = null): string
    {
        return in_array($locale, ['ar', 'en'], true) ? $locale : app()->getLocale();
    }

    public function translate(mixed $value, ?string $locale = null): mixed
    {
        $locale = $this->locale($locale);
        $fallback = config('app.fallback_locale', 'en');

        if (! is_array($value)) {
            return $value;
        }

        if ($this->isTranslationPayload($value)) {
            return $value[$locale] ?? $value[$fallback] ?? Arr::first($value);
        }

        if ($this->isLocalizedCollection($value)) {
            return array_values(array_map(
                fn ($item) => $this->translate($item, $locale),
                $value
            ));
        }

        $translated = [];

        foreach ($value as $key => $item) {
            $translated[$key] = $this->translate($item, $locale);
        }

        return $translated;
    }

    protected function isTranslationPayload(array $value): bool
    {
        return array_key_exists('ar', $value) || array_key_exists('en', $value);
    }

    protected function isLocalizedCollection(array $value): bool
    {
        if ($value === []) {
            return true;
        }

        if (Arr::isAssoc($value)) {
            return false;
        }

        return collect($value)->every(function ($item) {
            if (! is_array($item)) {
                return false;
            }

            return array_key_exists('ar', $item)
                || array_key_exists('en', $item)
                || ! Arr::isAssoc($item);
        });
    }
}
