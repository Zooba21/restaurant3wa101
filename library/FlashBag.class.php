<?php

class FlashBag
{
    public function __construct()
    {
        if(session_status() == PHP_SESSION_NONE)
        {
            session_start();
        }

        // Do we have already a flash bag ?
        if(array_key_exists('flashbag', $_SESSION) == false)
        {
            // No, create it.
            $_SESSION['flashbag'] = array();
        }
    }

    public function add($message)
    {
        // Add the specified message at the end of the flash bag.
        array_push($_SESSION['flashbag'], $message);
    }

    public function fetchMessage()
    {
        // Consume the oldest flash bag message.
        return array_shift($_SESSION['flashbag']);
    }

    public function fetchMessages()
    {
        // Consume all the flash bag messages.
        $messages = $_SESSION['flashbag'];

        // The flash bag is now empty.
        $_SESSION['flashbag'] = array();

        return $messages;
    }

    public function hasMessages()
    {
        // Do we have some messages in the flash bag ?
        return empty($_SESSION['flashbag']) == false;
    }
}
