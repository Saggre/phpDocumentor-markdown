<?php

namespace PhpDocumentorMarkdown;

use Composer\Script\Event;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class PhpdocBinaryHandler
{
    public const PHPDOC_BINARY_VERSION = 'v3.3.1';

    /**
     * Get output path for PHPDocumentor phar.
     *
     * @return string
     */
    public static function getBinaryPath(): string
    {
        return dirname(__FILE__, 2) . '/bin/phpdoc';
    }

    /**
     * Call the binary.
     *
     * @param string $command
     * @return false|string|null
     */
    public static function call(string $command)
    {
        $path = self::getBinaryPath();
        return shell_exec("$path $command");
    }

    /**
     * Get PHPDocumentor phar download url.
     *
     * @param string $version
     * @return string
     */
    protected static function getBinaryUrl(string $version = self::PHPDOC_BINARY_VERSION): string
    {
        return "https://github.com/phpDocumentor/phpDocumentor/releases/download/$version/phpDocumentor.phar";
    }

    /**
     * Whether PHPDocumentor binary exists.
     *
     * @return bool
     */
    protected static function binaryExists(): bool
    {
        return file_exists(self::getBinaryPath());
    }

    /**
     * Get PHPDocumentor version or null if no valid version found.
     *
     * @return array|null
     */
    protected static function getBinaryVersion(): ?array
    {
        $version = self::call('-V');

        if (empty($version)) {
            return null;
        }

        preg_match_all('(\d+)', $version, $matches);

        return $matches[0] ?? null;
    }

    /**
     * Make sure a valid PHPDocumentor binary is available in shell.
     *
     * @return array PHPDocumentor binary version numbers
     * @throws \Exception Throws if binary is invalid or does not exist.
     */
    protected static function assertBinaryVersion(): array
    {
        $version = self::getBinaryVersion();

        if (empty($version)) {
            throw new \Exception("No PHPDocumentor binary");
        }

        if ($version[0] !== '3') {
            $versionString = implode('.', $version);
            throw new \Exception("PHPDocumentor binary detected as version $versionString, must be at 3.x.x");
        }

        return $version;
    }

    /**
     * @throws \Exception
     */
    public static function downloadBinaryIfNotExists(?Event $event = null): void
    {
        $path = self::getBinaryPath();

        if (!self::binaryExists()) {
            $extra = $event->getComposer()->getPackage()->getExtra();
            $url = $extra['phpdoc-binary-url'] ?? self::getBinaryUrl();

            $client = new Client([
                'base_uri' => $url,
                'timeout' => 200,
            ]);

            try {
                Utils::cliOutput('Downloading PHPDocumentor binary...');
                $client->request('GET', '', ['sink' => $path]);
            } catch (GuzzleException $e) {
                throw new \Exception("Unable to download PHPDocumentor binary from $url to $path", 0, $e);
            }
        }

        if (0775 !== (fileperms($path) & 0777)) {
            if (!chmod($path, 0775)) {
                throw new \Exception("Unable to set permission to execute PHPDocumentor binary at $path");
            }

            Utils::cliOutput('Set permissions for PHPDocumentor binary');
        }

        try {
            $version = self::assertBinaryVersion();
            $versionString = implode('.', $version);

            Utils::cliOutput("Validated PHPDocumentor binary version $versionString");
        } catch (\Exception $e) {
            throw new \Exception("Unable to verify PHPDocumentor binary version", 0, $e);
        }
    }
}
