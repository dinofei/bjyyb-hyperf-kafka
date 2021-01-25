## 本组件移植官方kafka测试版本，修复完善一些问题使用

### 安装

```
composer require bjyyb/hyperf-kafka:dev-main
```

### 使用

*创建一个消费者*
```
php bin/hyperf.php gen:kafka-consumer Test
```
- topic  主题
- groupId 分组
- nums 进程数
- autoCommit 自动提交
- enable 是否开启
- $pool 连接池

```
Hyperf\Kafka\Result::ACK  // 确认
Hyperf\Kafka\Result::DROP // 丢弃不处理
Hyperf\Kafka\Result::REQUEUE // 重新加入队列
```

*创建一个发送者*
```
php bin/hyperf.php gen:kafka-message TestMessage
```
- $topic 主题
- $value 发送内容
- $key 用于计算发送到那个分区
- $headers 没使用
- $pool 连接池

*发送消息*
```php
$message = new App\Kafka\Producer\TestMessage('hello kafka');
$producer = make(Hyperf\Kafka\Manager\Producer::class);
$producer->send($message);
```