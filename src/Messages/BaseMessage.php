<?php

namespace DingTalkRobot\Messages;

/**
 * Class BaseMessage
 * @package DingTalkRobot\Messages
 */
abstract class BaseMessage
{
    /**
     * @var string $msgType 消息类型
     */
    protected $msgType;

    /**
     * @var array $msgBody 消息体
     */
    protected $msgBody = array();

    /**
     * @var array $at 设置的 @ 提醒某人看的数据
     */
    protected $at;

    public function __construct()
    {
        $this->setMsgType();
    }

    /**
     * @return array
     */
    final public function packageData()
    {
        $this->validate();
        $data = array();
        $data['msgtype'] = $this->msgType;
        $data[$this->msgType] = $this->msgBody;
        !empty($this->at) && $data['at'] = $this->at;

        return $data;
    }

    /**
     * 子类需要实现该方法定义消息类型
     * @return void
     */
    abstract protected function setMsgType();

    /**
     * 做一些校验类的工作,具体逻辑各自处理
     * @return mixed
     */
    abstract protected function validate();
}
