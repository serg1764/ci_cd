<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class HelloController
{
    #[Route('/api/hello', methods: ['GET'])]
    public function hello(): JsonResponse
    {
        $version = $_ENV['APP_VERSION'] ?? 'v1';
        $serviceName = 'svc4';
        
        return new JsonResponse([
            'service' => $serviceName,
            'version' => $version,
            'message' => "Hello World {$version} service 4"
        ]);
    }

    #[Route('/healthz', methods: ['GET'])]
    public function healthz(): Response
    {
        return new Response('ok', 200);
    }
}
