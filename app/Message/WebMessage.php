<?php

namespace App\Message;


class WebMessage implements IMessage
{
    public function messenger()
    {
        return 'User';
    }
}



