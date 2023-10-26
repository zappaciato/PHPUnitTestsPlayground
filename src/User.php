<?php

/**
 * User
 *
 * A user of the system
 */
class User
{

    /**
     * First name
     * @var string
     */
    public $first_name;

    /**
     * Last name
     * @var string
     */
    public $surname;

/**
 * Email address
 *
 * @var string
 */
    public $email;

    /**
     * Get the user's full name from their first name and surname
     *
     * @return string The user's full name
     */
    public function getFullName(): string
    {
        return trim("$this->first_name $this->surname"); //cuts aout empty space.. if there's no name or surname it will return empty string not a string with a space in it;
    }

    public function notify($message)
    {
        $mailer = new Mailer();
        return $mailer->sendMessage($this->email, $message);
    }
}
