# DingtalkChatBot 钉钉群自定义机器人

采用面向对象的开发方法

## 功能列表
- [x] 实现原始 text / markdown / link / action card 类型消息发送
- [x] 消息设置可支持链式调用
- [x] 单独设置 @ 的数据，亦可链式调用设置多个 @ 的手机号。注意：设置 @ 所有人时，@ 单独手机号会失效
- [x] 发送群可指根据配置随意指定
- [x] 机器人token均可配置

## 用法
> 1. `git clone git@github.com:baiyutang/dingtalk-robot.git` 或 `composer require baiyutang/dingtalk-robot`
> 2. `src/config.php` 文件中 `$groups` 数组中，修改钉钉群机器人为推送的目标群 token
> 3. 参照示例组装代码

## 配置钉钉群的两种方式
* 修改 `Config.php` 文件中数组，配置 `array('group_name'=>'...your token...')`，然后 `$client = new ChatBot('group_name')`;
* 支持直接指定token，当 `$client = new ChatBot('param')`，当构造函数接收到的参数不在 `Config.php` 的 `$groups` 数组的键中，会被认定是一个 token

## 示例
```php
// text 类型
use DingTalkRobot\At;
use DingTalkRobot\GroupChat;
use DingTalkRobot\Messages\TextMessage;
use DingTalkRobot\ChatBot;

// 链式调用设置 @ 多个手机号
$at = new At();
$at->setMobile('181****3753')
    ->setMobile('181****3751');

// 链式调用设置消息内容
$message = new TextMessage();
$message->setContent('我就是我, 是不一样的烟火')
    ->setAt($at);

$client = new ChatBot();
// 可以指定群，若不设置则发送默认的群
$client->send($message, new GroupChat('other'));
```
---
```php
// markdown 类型
use DingTalkRobot\GroupChat;
use DingTalkRobot\Messages\MarkdownMessage;
use DingTalkRobot\ChatBot;

$markdown = new MarkdownMessage();
$markdown->setTitle('杭州天气')
    ->setText("#### 杭州天气\n" .
        "> 9度，西北风1级，空气良89，相对温度73%\n" .
        "> ![screenshot](http://tinyurl.com/y4lbucte)\n" .
        "> 10点20分发布 [天气](http://www.thinkpage.cn/)");

$client = new ChatBot();

$client->send($markdown, new GroupChat());
```
## 相关
* [钉钉开发文档：自定义机器人](https://open-doc.dingtalk.com/microapp/serverapi2/qf2nxq#-9)

## License
[MIT license](LICENSE)
