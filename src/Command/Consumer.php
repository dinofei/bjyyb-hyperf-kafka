<?php

declare(strict_types=1);

namespace Hyperf\Kafka\Command;

use Psr\Container\ContainerInterface;
use Hyperf\Devtool\Generator\GeneratorCommand;

class Consumer extends GeneratorCommand
{
    /**
     * @var ContainerInterface
     */
    protected $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;

        parent::__construct('gen:kafka-consumer');
    }

    public function configure()
    {
        parent::configure();
        $this->setDescription('创建kafka消费者');
    }

    protected function getStub(): string
    {
        return __DIR__ . '/stubs/consumer.stub';
    }

    protected function getDefaultNamespace(): string
    {
        return $this->getConfig()['namespace'] ?? 'App\\Kafka\\Consumer';
    }
}
