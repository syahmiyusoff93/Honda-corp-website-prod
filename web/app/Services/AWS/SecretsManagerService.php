<?php

namespace App\Services\AWS;

use Aws\SecretsManager\SecretsManagerClient;
use Aws\Exception\AwsException;

class SecretsManagerService
{
    private $secretsClient;

    public function __construct()
    {
        $this->secretsClient = new SecretsManagerClient([
            'version' => 'latest',
            'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
            'credentials' => [
                'key' => env('AWS_ACCESS_KEY_ID'),
                'secret' => env('AWS_SECRET_ACCESS_KEY'),
            ],
        ]);
    }

    public function getSecret($secretName)
    {
        try {
            $result = $this->secretsClient->getSecretValue([
                'SecretId' => env('AWS_SECRETS_MANAGER_PREFIX', '') . $secretName,
            ]);
            return json_decode($result['SecretString'], true);
        } catch (AwsException $e) {
            throw new \Exception('Failed to retrieve secret: ' . $e->getMessage());
        }
    }

    public function createSecret($secretName, $secretValue, $description = '')
    {
        try {
            $result = $this->secretsClient->createSecret([
                'Name' => env('AWS_SECRETS_MANAGER_PREFIX', '') . $secretName,
                'SecretString' => json_encode($secretValue),
                'Description' => $description,
            ]);
            return $result;
        } catch (AwsException $e) {
            throw new \Exception('Failed to create secret: ' . $e->getMessage());
        }
    }

    public function updateSecret($secretName, $secretValue)
    {
        try {
            $result = $this->secretsClient->updateSecret([
                'SecretId' => env('AWS_SECRETS_MANAGER_PREFIX', '') . $secretName,
                'SecretString' => json_encode($secretValue),
            ]);
            return $result;
        } catch (AwsException $e) {
            throw new \Exception('Failed to update secret: ' . $e->getMessage());
        }
    }
}
