<?php

namespace DingTalkRobot\Messages;

class ActionCardMessage extends BaseMessage
{
    /**
     * 必填
     * @param string $title 首屏会话透出的展示内容
     * @return $this
     */
    public function setTitle($title)
    {
        $title && $this->msgBody['title'] = $title;

        return $this;
    }

    /**
     * 必填
     * @param string $text markdown格式的消息
     * @return $this
     */
    public function setText($text)
    {
        $text && $this->msgBody['text'] = $text;

        return $this;
    }

    /**
     * @param string $singleTitle
     * @return $this
     */
    public function setSingleTitle($singleTitle)
    {
        $singleTitle && $this->msgBody['singleTitle'] = $singleTitle;

        return $this;
    }

    /**
     * @param string $singleURL
     * @return $this
     */
    public function setSingleURL($singleURL)
    {
        $singleURL && $this->msgBody['singleURL'] = $singleURL;

        return $this;
    }

    /**
     * @param string $hideAvatar
     * @return $this
     */
    public function setHideAvatar($hideAvatar)
    {
        $this->msgBody['hideAvatar'] = $$hideAvatar;

        return $this;
    }

    /**
     * @param string $btnOrientation
     * @return $this
     */
    public function setBtnOrientation($btnOrientation)
    {
        $this->msgBody['btnOrientation'] = $btnOrientation;

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
        $this->msgType = 'actionCard';
    }
}
