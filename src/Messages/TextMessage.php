<?php

namespace DingTalkRobot\Messages;

use DingTalkRobot\At;

/**
 * Class TextMessage
 * @package DingTalkRobot\Messages
 */
class TextMessage extends BaseMessage
{


    /**
     * 必填
     * @param string $content 消息内容
     * @return $this
     */
    public function setContent($content)
    {
        if ($content) {
            $this->msgBody['content'] = $content;
        }

        return $this;
    }

    /**
     * 选填
     * @param At $at
     * @return $this
     */
    public function setAt($at)
    {
        $this->at = $at->get();

        return $this;
    }

    protected function validate()
    {
    }

    /**
     * @return void
     */
    protected function setMsgType()
    {
        $this->msgType = 'text';
    }
}
