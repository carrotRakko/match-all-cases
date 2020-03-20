#!/usr/bin/env php
<?php

if (!isset($argv) || !is_array($argv)) {
    throw new \RuntimeException('Unknown error occurred');
}

if (count($argv) < 2) {
    echo 'Pass at least one word!' . "\n";
    exit;
}

$words = array_map(
    function (string $raw_word): string {
        if (preg_match('/\A[A-Za-z1-9]+\z/', $raw_word) === 0) {
            echo 'Each word must be pattern of \\A[A-Za-z0-9]+\\z.';
            exit;
        }
        return strtolower($raw_word);
    },
    array_slice($argv, 1)
);

$re_components = [];

// ampontancase
$re_components[] = implode('', $words);

// CONSTANT_CASE
$re_components[] = implode(
    '_',
    array_map(
        function (string $word): string {
            return strtoupper($word);
        },
        $words
    )
);

// camelCase
$re_components[] = implode(
    '',
    array_merge(
        [$words[0]],
        array_map(
            function (string $word): string {
                return ucfirst($word);
            },
            array_slice($words, 1)
        )
    )
);

// PascalCase
$re_components[] = implode(
    '',
    array_map(
        function (string $word): string {
            return ucfirst($word);
        },
        $words
    )
);

// snake_case
$re_components[] = implode(
    '_',
    $words
);

// kebab-case
$re_components[] = implode(
    '-',
    $words
);

echo implode(
    '|',
    array_map(
        function (string $re_component): string {
            return '(?:' . $re_component . ')';
        },
        $re_components
    )
) . "\n";

