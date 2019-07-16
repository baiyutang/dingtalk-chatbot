<?php

namespace DingTalkRobot\Messages;

/**
 * 独立跳转，可设置多按钮，只有在按钮区才可点击
 * Class ButtonsActionCardMessage
 * @package DingTalkRobot\Messages
 */
class ButtonsActionCardMessage extends BaseMessage
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
     * 调用多次设置多个按钮
     * @param array $button ['title' => '按钮显示文本', 'actionURL' => '按钮跳转地址']
     */
    public function setButton(array $button)
    {
        $this->msgBody['btns'][] = $button;
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
     * @param string $btnOrientation 0-按钮竖直排列，1-按钮横向排列
     * @return $this
     */
    public function setBtnOrientation($btnOrientation)
    {
        $this->msgBody['btnOrientation'] = (int)$btnOrientation;

        return $this;
    }

    /**
     * @return void
     */
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
