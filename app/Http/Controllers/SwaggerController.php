<?php

namespace App\Http\Controllers;

use LaravelSwagger\SwaggerController as BaseSwaggerController;

class SwaggerController extends BaseSwaggerController
{
    public function generateSwagger()
    {
        $swagger = parent::generateSwagger();
        $swagger->info([
            'title' => 'API Documentation',
            'description' => 'Documentation for API endpoints',
            'version' => '1.0.0',
        ]);
        $swagger->host('localhost:8000');
        $swagger->basePath('/api');
        $swagger->schemes(['http', 'https']);
        $swagger->produces(['application/json']);
        $swagger->securityDefinitions([
            'api_key' => [
                'type' => 'apiKey',
                'name' => 'Authorization',
                'in' => 'header',
            ],
            'oauth2' => [
                'type' => 'oauth2',
                'flow' => 'accessCode',
                'scopes' => [
                    'read' => 'Read',
                    'write' => 'Write',
                ],
            ],
        ]);
        $swagger->security([
            'api_key' => [],
        ]);
        return $swagger;
    }
}
