<?php


namespace App\Upload;

use App\Entity\User;
use Aws\S3\S3Client;
use Aws\S3\Exception\S3Exception;
use Aws\Credentials\Credentials;
use Stripe\Checkout\Session;

class AwsS3
{
    /**
     * @var String
     */
    private $key;
    /**
     * @var String
     */
    private $secret;
    /**
     * @var String
     */
    private $bucket;

    /**
     * @var String
     */
    private $url;

    public function __construct(String $Key, String $secret, String $bucket)
    {

        $this->key = $Key;
        $this->secret = $secret;
        $this->bucket = $bucket;

        $this->url = "https://slideguide2.s3.eu-west-2.amazonaws.com";
            //"https://slideguide1.s3.eu-west-3.amazonaws.com";
    }

    /**
     * @param User $user
     * @param String $path
     * @param String $file_type
     * @return String
     */
    public function getUserPreUrl(User $user, String $path, String $file_type): String
    {
        return $this->url."/users/". $user->getId() ."/". $path ."/". uniqid() . $file_type;
    }

    /**
     * @param String $url
     */
    public function setUrl(String $url): void
    {
        $this->url = $url;
    }

    public function preSignUrl()
    {
        $credentials = new Credentials($this->key, $this->secret);

        $s3 = new S3Client([
            'version'     => 'latest',
            'region'      => 'eu-west-3',
            'credentials' => $credentials
        ]);

        try {
            $cmd = $s3->getCommand('PutObject', [
                'Bucket' => $this->bucket,
                'Key' => "userId/filename.jpeg",
                'ContentType' => "image/jpeg"
            ]);
            $request = $s3->createPresignedRequest($cmd, '+20 minutes');
            return (string)$request->getUri();
        } catch (S3Exception $e) {
            return $e->getMessage();
        }



    }
}