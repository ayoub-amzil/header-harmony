<?php

namespace HeaderHarmony;

use InvalidArgumentException;

class HeaderHarmony
{
    protected array $config;

    public function __construct()
    {
        $this->config = config('header-harmony');

        if (!is_array($this->config)) {
            throw new \RuntimeException('HeaderHarmony configuration is missing or invalid.');
        }
    }

    /**
     * Get headers for a specific service.
     *
     * @throws InvalidArgumentException
     */
    public function for(string $service): array
    {
        if (!isset($this->config[$service])) {
            throw new InvalidArgumentException("Service '{$service}' is not defined in the header-harmony config.");
        }

        return $this->config[$service];
    }

    /**
     * Get all available header presets.
     */
    public function all(): array
    {
        return $this->config;
    }

    /**
     * Dynamically add or override a preset (useful for testing or runtime injection).
     *
     * @throws InvalidArgumentException
     */
    public function add(string $name, array $headers): void
    {
        foreach ($headers as $key => $value) {
            if (!is_string($key) || (!is_string($value) && !is_numeric($value))) {
                throw new InvalidArgumentException('Each header must be a string key with a string or numeric value.');
            }
        }

        $this->config[$name] = $headers;
    }
}
