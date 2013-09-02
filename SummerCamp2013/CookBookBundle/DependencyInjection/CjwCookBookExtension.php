<?php

namespace CjwNetwork\SummerCamp2013\CookBookBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\Extension\PrependExtensionInterface;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;
use Symfony\Component\Yaml\Yaml;

/**
 * This is the class that loads and manages your bundle configuration
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html}
 */
class CjwCookBookExtension extends Extension implements PrependExtensionInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $loader = new Loader\YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.yml');
    }

    public function prepend( ContainerBuilder $container )
    {
        // Loading our YAML file containing our template rules
        $config = Yaml::parse( __DIR__ . '/../Resources/config/override.yml' );
        // We explicitly prepend loaded configuration for "ezpublish" namespace.
        // So it will be placed under the "ezpublish" configuration key, like in ezpublish.yml.
        $container->prependExtensionConfig( 'ezpublish', $config );
    }
}
