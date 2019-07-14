<?php

namespace DingTalkRobot\Messages;

/**
 * Class LinkMessage
 * @package DingTalkRobot\Messages
 */
class LinkMessage extends BaseMessage
{

    /**
     * 必填
     * @param string $title 消息标题
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
     * @param string $text 消息内容，如果太长只会部分展示
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
     * 必填
     * @param string $url 点击消息跳转的URL
     * @return $this
     */
    public function setActionUrl($url)
    {
        if ($url) {
            $this->msgBody['messageUrl'] = $url;
        }

        return $this;
    }

    /**
     * 选填
     * @param string $url 图片URL
     * @return $this
     */
    public function setPicUrl($url)
    {
        if ($url) {
            $this->msgBody['picUrl'] = $url;
        }

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
        $this->msgType = 'link';
    }
}
