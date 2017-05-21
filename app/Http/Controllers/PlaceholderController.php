<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PlaceholderController extends Controller
{
    /**
     * Mocks list of user's Results
     * Will be removed once focus shifts from creating Asrask
     *
     * @return Response HTTP Response
     */
    public function viewResults()
    {
        return response()->json([
            'data' => [
                'id'          => 1,
                'url'         => 'iGWY77uArw6N',
                'state'       => 'finished',
                'entry_count' => 2,
                'created_at'  => '2017-04-08 16:21:14',
                'updated_at'  => '2017-04-08 16:21:14',
                'thread'      => [
                    'id'         => 15,
                    'reddit_id'  => '5pl4uk',
                    'title'      => 'Cat.',
                    'permalink'  => 'cat',
                    'created_at' => '2017-04-08 16:21:14',
                    'updated_at' => '2017-04-08 16:21:14',
                    'subreddit'  => [
                        'id'        => 2,
                        'name'      => 'CatsStandingUp',
                        'reddit_id' => '2tq4v',
                    ],
                ],
                'beta'        => [
                    'id'        => 3,
                    'name'      => 'Aww',
                    'reddit_id' => '2qh1o',
                ],
            ],
        ]);
    }
    
    /**
     * Mocks a single Result
     *
     * @return Response HTTP Response
     */
    public function viewResult($result_id)
    {
        $results = [
            'iGWY77uArw6N' => [
                'data' => [
                    'id'          => 1,
                    'url'         => 'iGWY77uArw6N',
                    'state'       => 'finished',
                    'entry_count' => 2,
                    'created_at'  => '2017-04-08 16:21:14',
                    'updated_at'  => '2017-04-08 16:21:14',
                    'thread'      => [
                        'id'         => 15,
                        'reddit_id'  => '5pl4uk',
                        'title'      => 'Cat.',
                        'permalink'  => 'cat',
                        'created_at' => '2017-04-08 16:21:14',
                        'updated_at' => '2017-04-08 16:21:14',
                        'subreddit'  => [
                            'id'        => 2,
                            'name'      => 'CatsStandingUp',
                            'reddit_id' => '2tq4v',
                        ],
                    ],
                    'beta'        => [
                        'id'        => 3,
                        'name'      => 'Aww',
                        'reddit_id' => '2qh1o',
                    ],
                    'entries'     => [
                        [
                            'id'                  => 4,
                            'alpha_participation' => 24,
                            'beta_participation'  => 420,
                            'user'                => [
                                'id'        => 10,
                                'name'      => 'spez',
                                'reddit_id' => 'dhhnkbv',
                                'type'      => 'user',
                            ],
                            'comments'            => [
                                'dhse9ee',
                                'dhse9ff',
                            ],
                        ],
                        [
                            'id'                  => 5,
                            'alpha_participation' => 15,
                            'beta_participation'  => 534,
                            'user'                => [
                                'id'        => 11,
                                'name'      => 'kittsville',
                                'reddit_id' => 'dhce9mw',
                                'type'      => 'user',
                            ],
                            'comments'            => [
                                'dhse9sv',
                                'dhse9aa',
                                'dhse9bb',
                                'dhse9cc',
                                'dhse9dd',
                            ],
                        ],
                    ],
                ],
            ],
        ];
        
        if (array_key_exists($result_id, $results)) {
            return response()->json($results[$result_id]);
        } else {
            abort(404);
        }
    }
    
    /**
     * Mocks creation of a new result
     *
     * @return Response HTTP Response
     */
    public function newResult()
    {
        return response()->json([
            'data' => [
                'id'          => 2,
                'url'         => 'H2B2Xj4WFvf2',
                'thread'      => null,
                'state'       => 'validating',
                'entry_count' => null,
                'created_at'  => '2017-05-14 12:07:44',
                'updated_at'  => '2017-05-14 12:07:44',
                'beta'        => null,
            ],
        ], 201);
    }
    
    /**
     * Mocks deletion of a Result
     *
     * @return Response HTTP Response
     */
    public function deleteResult()
    {
        return response()->json([
            'data' => [
                'id'          => 2,
                'url'         => 'H2B2Xj4WFvf2',
                'state'       => 'deleted',
                'entry_count' => null,
                'created_at'  => '2017-05-14 12:07:44',
                'updated_at'  => '2017-05-14 12:07:44',
                'beta'        => null,
            ],
        ]);
    }
}
