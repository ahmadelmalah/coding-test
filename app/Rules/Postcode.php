<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Exception;

class Postcode implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $client = new \GuzzleHttp\Client();
        try {
            $response = $client->request('GET', "https://api.postcodes.io/postcodes/$value/validate");
            $responseObject = json_decode($response->getBody()->read(1024));
            return $responseObject->result;
        } catch (Exception $e) {
            // Exception handling goes here
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Invalid Post Code';
    }
}
