<?php

declare(strict_types=1);

namespace App\OpenApi;

use ApiPlatform\Core\OpenApi\Factory\OpenApiFactoryInterface;
use ApiPlatform\Core\OpenApi\OpenApi;
use ApiPlatform\Core\OpenApi\Model;

final class CompanyConnectionDecorator implements OpenApiFactoryInterface
{
    public function __construct(
        private OpenApiFactoryInterface $decorated
    ) {
    }
    
    public function __invoke(array $context = []): OpenApi
    {
        /** @var OpenApi $openApi */
        $openApi = ($this->decorated)($context);
        $schemas = $openApi->getComponents()->getSchemas();
    
        $schemas['ConnectSteps']       = new \ArrayObject([
                                                                'type'       => 'object',
                                                                'properties' => [
                                                                    'general'    => [
                                                                        'type'    => 'object',
                                                                        'example' => '',
                                                                    ],
                                                                    'legal_data' => [
                                                                        'type'    => 'object',
                                                                        'example' => '',
                                                                    ],
                                                                ],
                                                            ]);
        $pathItem = new Model\PathItem(
            ref:  'Post',
            get: new Model\Operation(
                      operationId: 'ConnectStepsCredentialsItem',
                      tags:        ['Post'],
                      responses:   [
                                       '200' => [
                                           'description' => 'Company connect',
                                           'content'     => [
                                               'application/json' => [
                                                   'schema' => [
                                                       '$ref' => '#/components/schemas/ConnectSteps',
                                                   ],
                                               ],
                                           ],
                                       ],
                                   ],
                      summary:     'Сonnection steps',
                      security:    []
                  ),
        );
        $openApi->getPaths()->addPath('/api/v1/connect', $pathItem);
        
        $schemas['CompanyConnect']       = new \ArrayObject([
                                                                'type'       => 'object',
                                                                'properties' => [
                                                                    'general'    => [
                                                                        'type'    => 'string',
                                                                        'example' => '',
                                                                    ],
                                                                    'legal_data' => [
                                                                        'type'    => 'string',
                                                                        'example' => '',
                                                                    ],
                                                                ],
                                                            ]);
        $pathItem = new Model\PathItem(
            ref:  'Post',
            get: new Model\Operation(
                      operationId: 'CompanyConnectCredentialsItem',
                      tags:        ['Post'],
                      responses:   [
                                       '200' => [
                                           'description' => 'Company connect',
                                           'content'     => [
                                               'application/json' => [
                                                   'schema' => [
                                                       '$ref' => '#/components/schemas/CompanyConnect',
                                                   ],
                                               ],
                                           ],
                                       ],
                                   ],
                      summary:     'Company connect',
                  ),
        );
        $openApi->getPaths()->addPath('/api/v1/connect/company', $pathItem);
        
        
        return $openApi;
    }
}