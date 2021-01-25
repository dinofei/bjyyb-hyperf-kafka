<?php

namespace Hyperf\Kafka\Manager;

use Hyperf\Kafka\Producer as KafkaProducer;
use longlang\phpkafka\Producer\ProduceMessage;

class Producer
{
    protected $producer;

    protected $pool = 'default';

    public function send(ProduceMessage $message)
    {
        $producer = make(KafkaProducer::class, ['name' => $message->pool ?? $this->pool]);
        return $producer->send($message->getTopic(), $message->getValue(), $message->getKey(), $message->getHeaders(), $message->getPartitionIndex());
    }
}
