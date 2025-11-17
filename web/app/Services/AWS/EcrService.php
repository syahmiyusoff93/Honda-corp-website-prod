<?php

namespace App\Services\AWS;

use Aws\Ecr\EcrClient;
use Aws\Exception\AwsException;

class EcrService
{
    private $ecrClient;

    public function __construct()
    {
        $this->ecrClient = new EcrClient([
            'version' => 'latest',
            'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
            'credentials' => [
                'key' => env('AWS_ACCESS_KEY_ID'),
                'secret' => env('AWS_SECRET_ACCESS_KEY'),
            ],
        ]);
    }

    public function getAuthorizationToken()
    {
        try {
            $result = $this->ecrClient->getAuthorizationToken();
            return $result['authorizationData'][0];
        } catch (AwsException $e) {
            throw new \Exception('ECR Authorization failed: ' . $e->getMessage());
        }
    }

    public function createRepository($repositoryName)
    {
        try {
            $result = $this->ecrClient->createRepository([
                'repositoryName' => $repositoryName,
            ]);
            return $result['repository'];
        } catch (AwsException $e) {
            if ($e->getAwsErrorCode() === 'RepositoryAlreadyExistsException') {
                return $this->describeRepository($repositoryName);
            }
            throw new \Exception('ECR Repository creation failed: ' . $e->getMessage());
        }
    }

    public function describeRepository($repositoryName)
    {
        try {
            $result = $this->ecrClient->describeRepositories([
                'repositoryNames' => [$repositoryName],
            ]);
            return $result['repositories'][0];
        } catch (AwsException $e) {
            throw new \Exception('ECR Repository not found: ' . $e->getMessage());
        }
    }
}
