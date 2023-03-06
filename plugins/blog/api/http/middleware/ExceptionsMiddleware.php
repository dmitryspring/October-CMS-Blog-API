<?php namespace Blog\Api\Http\Middleware;

use App;
use ApplicationException;
use Closure;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\HttpException;

/**
 * ExceptionsMiddleware
 */
class ExceptionsMiddleware
{
    /**
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next): mixed
    {
        $this->registerExceptionHandlers();

        return $next($request);
    }

    /**
     * @return void
     */
    private function registerExceptionHandlers(): void
    {

        App::error(function (\October\Rain\Exception\ValidationException $e) {
            return response()->json([
                'message' => 'Validation error',
                'errors'  => $e->getErrors()
            ], 422);
        });

        App::error(function (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'message' => 'Validation error',
                'errors'  => $e->errors()
            ], 422);
        });

    }
}
