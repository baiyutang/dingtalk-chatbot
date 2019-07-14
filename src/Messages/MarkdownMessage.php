<?php

namespace DingTalkRobot\Messages;

use DingTalkRobot\At;

/**
 * Class MarkdownMessage
 * @package DingTalkRobot\Messages
 */
class MarkdownMessage extends BaseMessage
{
    /**
     * 必填
     * @param string $title 首屏会话透出的展示内容
     * 展示内容加上机器人名称和标点，手机最多容纳 15 个字符，电脑最多 10 个字，所以请酌情设置标题字数
     * @return $this
     */
    public function setTitle($title)
    {
        if ($title) {
            $this->msgBody['title'] = $title;
        }

        return $this;
    }

    /**
     * 必填
     * @see https://open-doc.dingtalk.com/microapp/serverapi2/qf2nxq#-6
     * @param string $text markdown格式的消息，目前只支持md语法的子集
     * @return $this
     */
    public function setText($text)
    {
        if ($text) {
            $this->msgBody['text'] = $text;
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
        $this->handleAt();
    }

    protected function handleAt()
    {
        if (empty($this->at)) {
            return null;
        }

        if (isset($this->at['isAtAll']) && $this->at['isAtAll'] === true) {
            unset($this->at['atMobiles']);
            $this->msgBody['text'] .= "\n\n@all";
        } else {
            if (!empty($this->at['atMobiles'])) {
                $mobiles = array_unique($this->at['atMobiles']);
                $this->msgBody['text'] .= "\n\n@" . implode(" @", $mobiles);
            }
        }
    }

    /**
     * @return void
     */
    protected function setMsgType()
    {
        $this->msgType = 'markdown';
    }
}
