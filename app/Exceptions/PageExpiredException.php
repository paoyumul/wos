<?php

namespace App\Exceptions;

use Exception;

class PageExpiredException extends Exception
{
    /**
     * Prepare exception for rendering.
     *
     * @param $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function render($request)
    {
        $response = parent::render($request);

        if ($response->status() === 419) {
            session()->flash('message', 'The page expired, please try again.');

            return back();
        }

        return $response;
    }
}
