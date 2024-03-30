<?php

namespace PhpDocumentorMarkdown\Test\Util\App;

use phpDocumentor\Kernel as PhpDocumentorKernel;
use Symfony\Component\Config\Loader\LoaderInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class TestKernel extends PhpDocumentorKernel
{
    /*public function registerBundles(): iterable
    {
        return [];
    }*/

    public function getWorkingDir(): string
    {
        return dirname(__DIR__, 1);
    }

    public function getProjectDir(): string
    {
        //return dirname(__DIR__, 3) . '/vendor/phpdocumentor/phpdocumentor';
        return dirname(__DIR__, 3);
    }

    public function registerBundles(): iterable
    {
        $contents = require $this->getProjectDir() . '/vendor/phpdocumentor/phpdocumentor/config/bundles.php';
        foreach ($contents as $class => $envs) {
            if (isset($envs['all']) === false && isset($envs[$this->environment]) === false) {
                continue;
            }

            yield new $class();
        }
    }

    protected function configureContainer(ContainerBuilder $c, LoaderInterface $loader): void
    {
        $c->setParameter('container.autowiring.strict_mode', true);
        $c->setParameter('container.dumper.inline_class_loader', true);
        $confDir = $this->getProjectDir() . '/vendor/phpdocumentor/phpdocumentor/config';
        $loader->load($confDir . '/packages/*' . self::CONFIG_EXTS, 'glob');
        if (is_dir($confDir . '/packages/' . $this->environment)) {
            $loader->load($confDir . '/packages/' . $this->environment . '/**/*' . self::CONFIG_EXTS, 'glob');
        }

        $loader->load($confDir . '/services' . self::CONFIG_EXTS, 'glob');
        $loader->load($confDir . '/services_' . $this->environment . self::CONFIG_EXTS, 'glob');
    }
}
