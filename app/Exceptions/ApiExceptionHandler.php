<?php

namespace App\Exceptions;

use Illuminate\Database\QueryException;
use Illuminate\Validation\ValidationException;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use ReflectionException;
use Symfony\Component\HttpKernel\Exception\HttpExceptionInterface;
use Throwable;

class ApiExceptionHandler
{
    public static function handle(Throwable $e)
    {

        if ($e instanceof ValidationException) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors'  => $e->errors(),
            ], 422);
        }

        if ($e instanceof AuthenticationException) {
            return response()->json([
                'success' => false,
                'message' => 'Unauthenticated',
            ], 401);
        }

        if ($e instanceof AuthorizationException) {
            return response()->json([
                'success' => false,
                'message' => 'Forbidden',
            ], 403);
        }

        if ($e instanceof ModelNotFoundException) {
            return response()->json([
                'success' => false,
                'message' => 'Resource not found',
            ], 404);
        }

        if ($e instanceof HttpExceptionInterface) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ], $e->getStatusCode());
        }

        if (! config('app.debug')) {
            return response()->json([
                'success' => false,
                'message' => 'Internal server error',
            ], 500);
        }
        // File not found
        if ($e instanceof ReflectionException) {
            return response()->json([
                'success' => false,
                'message' => 'Internal service resolution error.',
                'error'   => 'Class or dependency not found',
            ], 500);
        }





        if ($e instanceof QueryException) {

            // Table not found (PostgreSQL)
            if ($e->getCode() === '42P01') {
                return response()->json([
                    'success' => false,
                    'message' => 'Database table not found.',
                    'error'   => 'Migration missing or not executed',
                ], 500);
            }

            // PostgreSQL NOT NULL violation
            if ($e->getCode() === '23502') {
                return response()->json([
                    'success' => false,
                    'message' => 'A required field is missing.',
                    'error'   => 'Database constraint violation',
                ], 422);
            }

            // PostgreSQL foreign key violation
            if ($e->getCode() === '23503') {
                return response()->json([
                    'success' => false,
                    'message' => 'Invalid relationship reference.',
                    'error'   => 'Foreign key constraint violation',
                ], 422);
            }

            // Duplicate key / unique constraint
            if ($e->getCode() === '23505') {
                return response()->json([
                    'success' => false,
                    'message' => 'Duplicate record detected.',
                    'error'   => 'Unique constraint violation',
                ], 409);
            }
        }
        return null;
    }
}
