<?php
    require "libs.php";

    class User
    {
        private array $auth = [];

        function generateToken(string $user) : string {
            $token = Libs::generateRandomString();
            if (!empty($this->auth) && array_key_exists($user, $this->auth) && count($this->auth[$user]) >= 10) {
                array_shift($this->auth[$user]);    
            }

            $this->auth[$user][] = $token;
    
            return $token;
        }

        function verifyToken(string $user, string $token) : bool {
            if (array_key_exists($user, $this->auth) && in_array($token, $this->auth[$user])) {
                $keyRemove = array_search($token, $this->auth[$user]);
                unset($this->auth[$user][$keyRemove]);
                return true;
            }

            return false;
        }
    }

    $user = new User;

    $username = 'ali';
    for ($i=1; $i <= 11; $i++) { 
        $token = $user->generateToken($username);
    }
    var_dump($user->verifyToken($username, $token));

    $username = 'rafsanjani';
    $token = $user->generateToken($username);
    var_dump($user->verifyToken($username, $token));

    $username = 'rafsanjani';
    $token = $user->generateToken($username);
    var_dump($user->verifyToken($username, 'lalal'));