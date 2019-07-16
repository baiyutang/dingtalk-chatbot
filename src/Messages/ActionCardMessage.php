<?php

namespace DingTalkRobot\Messages;

/**
 * 整体跳转
 * Class ActionCardMessage
 * @package DingTalkRobot\Messages
 */
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
     * 必填
     * @param string $singleTitle
     * @return $this
     */
    public function setSingleTitle($singleTitle)
    {
        $singleTitle && $this->msgBody['singleTitle'] = $singleTitle;

        return $this;
    }

    /**
     * 必填
     * @param string $singleURL 点击singleTitle按钮触发的URL
     * @return $this
     */
    public function setSingleURL($singleURL)
    {
        $singleURL && $this->msgBody['singleURL'] = $singleURL;

        return $this;
    }

    /**
     * @param string $hideAvatar 0-正常发消息者头像，1-隐藏发消息者头像
     * @return $this
     */
    public function setHideAvatar($hideAvatar)
    {
        $this->msgBody['hideAvatar'] = (int)$hideAvatar;

        return $this;
    }

    /**
     * @return void
     */
    protected function setMsgType()
    {
        $this->msgType = 'actionCard';
    }

    protected function validate()
    {
    }
}
