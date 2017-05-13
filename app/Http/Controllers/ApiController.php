<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiController extends Controller
{
    /**
     * Lists all API routes
     *
     * @return Response HTTP Response
     */
    public function viewRoutes()
    {
        return response()->json([
            'comments' => [
                "Welcome to Rendant, Raofu's REST API",
                'Please consider reading the documentation:',
                'https://github.com/kittsville/Rendant/wiki',
                'If you have any questions either email me:',
                'kittsville@gmail.com',
                'Or open an issue:',
                'https://github.com/kittsville/Rendant/issues/new',
                'Oh, and get a browser plugin to format JSON!'
            ],
            'routes' => [
                [
                    'method'      => 'GET',
                    'url'         => '/',
                    'needs_login' => false,
                    'needs_admin' => false,
                    'comments'    => [
                        'You are here',
                    ],
                ],
                [
                    'method'      => 'GET',
                    'url'         => '/results',
                    'needs_login' => true,
                    'needs_admin' => false,
                    'comments'    => [
                        'Lists all thread analyses your account can access',
                    ],
                ],
                [
                    'method'      => 'GET',
                    'url'         => '/results/{id}',
                    'needs_login' => true,
                    'needs_admin' => false,
                    'comments'    => [
                        'View a single thread analysis',
                        'This is a list of users detected as brigading',
                    ],
                ],
                [
                    'method'      => 'DELETE',
                    'url'         => '/results/{id}',
                    'needs_login' => true,
                    'needs_admin' => false,
                    'comments'    => [],
                ],
                [
                    'method'      => 'POST',
                    'url'         => '/results/new',
                    'needs_login' => true,
                    'needs_admin' => false,
                    'comments'    => [
                        'Request analysis of a thread to detect brigaders',
                    ],
                ],
            ],
        ]);
    }
}
