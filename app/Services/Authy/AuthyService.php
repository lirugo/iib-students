<?php

namespace App\Services\Authy;

use App\Services\Authy\Exceptions\InvalidTokenException;
use App\Services\Authy\Exceptions\RegistrationFailedException;
use App\Services\Authy\Exceptions\SmsRequestFailedExceptions;
use App\User;
use Authy\AuthyApi;
use Authy\AuthyFormatException;

class AuthyService{

    private $client;

    /**
     * AuthyService constructor.
     * @param AuthyApi $client
     */
    public function __construct(AuthyApi $client){
        $this->client = $client;
    }

    /**
     * @param User $user
     * @return int (user id)
     * @throws RegistrationFailedException
     */
    public function registerUser(User $user){
        //Register user
        $user = $this->client->registerUser(
            $user->email,
            $user->phoneNumber->phone_number,
            $user->phoneNumber->diallingCode->dialling_code
        );
        //Check state user
        if(!$user->ok()) {
            throw new RegistrationFailedException;
        }
        //Return user id
        return $user->id();
    }

    /**
     * @param $token
     * @param User $user
     * @return bool true
     * @throws InvalidTokenException
     */
    public function verifyToken($token, User $user = null){
        // Check format is correct
        try {
            $verification = $this->client->verifyToken(
                $user ? $user->authy_id : request()->session()->get('authy.authy_id'),
                $token
            );
        }catch (AuthyFormatException $e){
            throw new InvalidTokenException;
        }

        //Check if there are errors, but format is correct
        if(!$verification->ok()){
            throw new InvalidTokenException;
        }

        return true;
    }

    /**
     * @param User $user
     * @throws SmsRequestFailedExceptions
     */
    public function requestSms(User $user){
        //Request force SMS
        $request = $this->client->requestSms($user->authy_id,[
                'force' => true
            ]);
        //Check status request
        if(!$request->ok()){
            throw new SmsRequestFailedExceptions;
        }
    }

}