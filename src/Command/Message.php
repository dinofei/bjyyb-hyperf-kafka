<?php

declare(strict_types=1);

namespace Hyperf\Kafka\Command;

use Psr\Container\ContainerInterface;
use Hyperf\Devtool\Generator\GeneratorCommand;

class Message extends GeneratorCommand
{
    /**
     * @var ContainerInterface
     */
    protected $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;

        parent::__construct('gen:kafka-message');
    }

    public function configure()
    {
        parent::configure();
        $this->setDescription('创建kafka消息');
    }

    protected function getStub(): string
    {
        return __DIR__ . '/stubs/message.stub';
    }

    protected function getDefaultNamespace(): string
    {
        return $this->getConfig()['namespace'] ?? 'App\\Kafka\\Producer';
    }
}
