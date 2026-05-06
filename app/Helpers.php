<?php

function settings($key = null, $default = null) {
    $settings = app(App\Settings::class);

    if ($key === null) {
        return app(App\Settings::class);
    }

    $keys = explode('.', $key);
    foreach ($keys as $innerKey) {
        $settings = $settings[$innerKey] ?? null;
    }

    return $settings ?? $default;
}
