<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller as LaravelController;

class AppBaseController extends LaravelController
{

    // public function getAuthenticatedUser()
    // {
    //     try {
    //         if (! $user = JWTAuth::parseToken()->authenticate()) {
    //             return response()->json(['user_not_found'], 404);
    //         }
    //     } catch (TokenExpiredException $e) {
    //         return response()->json(['token_expired'], $e->getStatusCode());
    //     } catch (TokenInvalidException $e) {
    //         return response()->json(['token_invalid'], $e->getStatusCode());
    //     } catch (JWTException $e) {
    //         return response()->json(['token_absent'], $e->getStatusCode());
    //     }
    //     return $user;
    // }
}
