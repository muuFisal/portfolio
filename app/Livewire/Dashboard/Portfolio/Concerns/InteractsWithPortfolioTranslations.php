<?php

namespace App\Livewire\Dashboard\Portfolio\Concerns;

use Illuminate\Support\Arr;
use Illuminate\Support\Collection;

trait InteractsWithPortfolioTranslations
{
    protected function toTranslation(?string $ar, ?string $en, bool $nullable = false): ?array
    {
        $payload = [
            'ar' => trim((string) $ar),
            'en' => trim((string) $en),
        ];

        if ($nullable && blank($payload['ar']) && blank($payload['en'])) {
            return null;
        }

        return $payload;
    }

    protected function translationValue(mixed $value, string $locale): string
    {
        if (is_array($value)) {
            return (string) Arr::get($value, $locale, '');
        }

        return (string) ($value ?? '');
    }

    protected function splitLines(?string $value): array
    {
        return collect(preg_split('/\r\n|\r|\n/', (string) $value))
            ->map(fn ($item) => trim((string) $item))
            ->filter()
            ->values()
            ->all();
    }

    protected function translatedLines(?string $ar, ?string $en): array
    {
        $arLines = $this->splitLines($ar);
        $enLines = $this->splitLines($en);
        $count = max(count($arLines), count($enLines));

        if ($count === 0) {
            return [];
        }

        return collect(range(0, $count - 1))
            ->map(function (int $index) use ($arLines, $enLines) {
                return [
                    'ar' => $arLines[$index] ?? '',
                    'en' => $enLines[$index] ?? '',
                ];
            })
            ->filter(fn (array $item) => filled($item['ar']) || filled($item['en']))
            ->values()
            ->all();
    }

    protected function translatedLinesToText(?array $items, string $locale): string
    {
        return collect($items ?? [])
            ->map(function ($item) use ($locale) {
                if (is_array($item) && array_key_exists($locale, $item)) {
                    return (string) $item[$locale];
                }

                return '';
            })
            ->filter()
            ->implode(PHP_EOL);
    }

    protected function translatedRows(array $rows, array $translatedFields, array $plainFields = []): array
    {
        return collect($rows)
            ->map(function (array $row) use ($translatedFields, $plainFields) {
                $payload = [];

                foreach ($translatedFields as $field) {
                    $translation = $this->toTranslation(
                        $row[$field . '_ar'] ?? null,
                        $row[$field . '_en'] ?? null,
                        true
                    );

                    if ($translation !== null) {
                        $payload[$field] = $translation;
                    }
                }

                foreach ($plainFields as $field) {
                    $value = $row[$field] ?? null;

                    if ($value !== null && $value !== '') {
                        $payload[$field] = $value;
                    }
                }

                return $payload;
            })
            ->filter(fn (array $payload) => $payload !== [])
            ->values()
            ->all();
    }

    protected function translatedRowsForForm(?array $rows, array $translatedFields, array $plainFields = []): array
    {
        $collection = collect($rows ?? []);

        if ($collection->isEmpty()) {
            return [[]];
        }

        return $collection
            ->map(function (array $row) use ($translatedFields, $plainFields) {
                $payload = [];

                foreach ($translatedFields as $field) {
                    $payload[$field . '_ar'] = $this->translationValue($row[$field] ?? null, 'ar');
                    $payload[$field . '_en'] = $this->translationValue($row[$field] ?? null, 'en');
                }

                foreach ($plainFields as $field) {
                    $payload[$field] = $row[$field] ?? null;
                }

                return $payload;
            })
            ->values()
            ->all();
    }

    protected function commaSeparated(?string $value): array
    {
        return collect(explode(',', (string) $value))
            ->map(fn ($item) => trim((string) $item))
            ->filter()
            ->values()
            ->all();
    }

    protected function commaSeparatedToText(?array $values): string
    {
        return collect($values ?? [])
            ->filter(fn ($item) => filled($item))
            ->implode(', ');
    }

    protected function keyValueRows(?string $value): array
    {
        return collect($this->splitLines($value))
            ->mapWithKeys(function (string $line) {
                [$key, $item] = array_pad(explode('|', $line, 2), 2, null);

                return filled($key) && filled($item)
                    ? [trim($key) => trim($item)]
                    : [];
            })
            ->all();
    }

    protected function keyValueRowsToText(?array $rows): string
    {
        return Collection::make($rows ?? [])
            ->map(fn ($value, $key) => $key . '|' . $value)
            ->implode(PHP_EOL);
    }
}
