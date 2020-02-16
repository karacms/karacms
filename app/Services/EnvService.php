<?php

namespace App\Services;

class EnvService
{
    /**
     * Check if the .env file writable
     *
     * @return bool
     */
    public function isEnvWritable()
    {
        return is_writeable(base_path('.env'));
    }

    /**
     * Update the .env
     *
     * @param array $data the key => value data
     *
     * @return bool
     */
    public function update($data)
    {
        $envFile = base_path('.env');
        $content = file_get_contents($envFile);

        if ( ! $this->isEnvWritable()) {
            throw new \Exception('Sorry, we cannot update the .env due to file permission');
        }

        $replacement = [];

        foreach ($data as $key => $value) {
            $find = "{$key}=" . env($key);
            $replace = "{$key}={$value}";

            $replacement[$find] = $replace;
        }

        $envFileContent = strtr($content, $replacement);

        return file_put_contents($envFile, $envFileContent);
    }
}
