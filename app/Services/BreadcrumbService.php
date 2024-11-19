<?php

namespace App\Services;

class BreadcrumbService
{
    protected array $breadcrumbs = [];

    public function add(string $label, ?string $url = null): self
    {
        $this->breadcrumbs[] = [
            'label' => $label,
            'url' => $url,
        ];

        return $this;
    }

    public function get(): array
    {
        return $this->breadcrumbs;
    }

    public function reset(): self
    {
        $this->breadcrumbs = [];

        return $this;
    }
}
