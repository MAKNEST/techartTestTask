<?php

namespace App\Bundle\Feedback;

class Bundle extends \TAO\Bundle
{
    public function init()
    {
        $this->infoblockSchema('feedback', 'feedback', 'Feedback');
    }
}