<?php

namespace App\Message;


class AdminMessage implements IMessage
{
    public function messenger()
    {
        return 'Admin';
    }
}
