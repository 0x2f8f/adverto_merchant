<?php

namespace App\Security;

use Lexik\Bundle\JWTAuthenticationBundle\Exception\InvalidPayloadException;
use Lexik\Bundle\JWTAuthenticationBundle\Security\Authenticator\JWTAuthenticator;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Http\Authenticator\Passport\Badge\UserBadge;
use Symfony\Component\Security\Http\Authenticator\Passport\Passport;
use Symfony\Component\Security\Http\Authenticator\Passport\SelfValidatingPassport;


class AdvertoV2Authenticator extends JWTAuthenticator
{
    /**
     * @return Passport
     */
    public function doAuthenticate(Request $request) /*: Passport */
    {
        $passport = null;
        try {
            $passport = parent::doAuthenticate($request);
        } catch (\Exception $e) {
        }
        if ($passport) {
            return $passport;
        }
        
        $token   = $this->getTokenExtractor()->extract($request);
        $payload = $this->parseJwt($token);
        $idClaim = 'sub';
        if (!isset($payload[$idClaim])) {
            throw new InvalidPayloadException($idClaim);
        }
        $userHash    = $payload[$idClaim];
        
        $passport = new SelfValidatingPassport(
            new UserBadge(
                $userHash,
                function ($userIdentifier) use ($payload) {
                    
                    return $this->loadUser($payload, $userIdentifier);
                }
            )
        );
        
        $passport->setAttribute('payload', $payload);
        $passport->setAttribute('token', $token);
        
        return $passport;
    }
    
    private function parseJwt(string $token): array
    {
        $tokenParts = explode(".", $token);
        if (!isset($tokenParts[1])) {
            return [];
        }
        $tokenHeader  = base64_decode($tokenParts[0]);
        $tokenPayload = base64_decode($tokenParts[1]);
        $jwtHeader    = json_decode($tokenHeader);
        $jwtPayload   = json_decode($tokenPayload);
        
        return json_decode(json_encode($jwtPayload), true);
    }
}