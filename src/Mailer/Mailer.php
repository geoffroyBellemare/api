<?php


namespace App\Mailer;


use App\Entity\Command;
use App\Entity\Company;
use App\Entity\User;
use Endroid\QrCode\Factory\QrCodeFactoryInterface;
use Twig\Environment;

class Mailer
{
    /**
     * @var \Swift_Mailer
     */
    private $mailer;
    /**
     * @var Environment
     */
    private $twig;
    /**
     * @var QrCodeFactoryInterface
     */
    private $qrCodeFactory;

    public function __construct(\Swift_Mailer $mailer, Environment $twig, QrCodeFactoryInterface $qrCodeFactory)
    {
        $this->mailer = $mailer;
        $this->twig = $twig;
        $this->qrCodeFactory = $qrCodeFactory;
    }

    public function sendConfirmationUser(User $user )
    {

        $qrCode = $this->qrCodeFactory->create('QR Code', ['size' => 200]);

        $message = (new \Swift_Message())
            ->setContentType('text/html')
            ->setFrom("slideguide76@gmail.com")
            ->setTo($user->getEmail());

        $img = $message->embed(new\Swift_Image($qrCode->writeString()));
        $body = $this->twig->render(
                    "Email/confirmation.html.twig",
                    [
                        "user" => $user,
                        "img" => $img
                    ]
                );

        $message->setBody($body);

//        $message = ( new\Swift_Message("Please Confirm your Account!!!") )
//            ->setFrom("slideguide76@gmail.com")
//            ->setTo($user->getEmail())
//            ->setBody($body, "text/html");
//        $qrCode = $this->qrCodeFactory->create('QR Code', ['size' => 200]);
//        $image = $message->embed(new\Swift_Image($qrCode->writeString()));
//
//
//        $img = $message->embed(\Swift_Image::fromPath('assets/img/logo-
//louvre.jpg'));
        $this->mailer->send($message);
    }
    public function sendConfirmation(Command $command) {
        $body = "";
        $qrCode = $this->qrCodeFactory->create('QR Code', ['size' => 200]);
        $message = (new \Swift_Message())
            ->setContentType('text/html')
            ->setSubject("confirmation commande")
            ->setFrom("slideguide76@gmail.com")
            ->setTo("rrastakong@gmail.com");
        $imgQr = $message->embed(new\Swift_Image($qrCode->writeString(), 'image.jpg', 'image/jpeg'));
        $body = $this->twig->render(
            "Email/confirmationCommandCustomerSucces.html.twig",
            [
                "user" => $command->getCustomer(),
                "img" => $imgQr,
                "totalAmount" => $command->getTotalAmount(),
                "items" => $command->getCommandItems()
            ]
        );
        $message->setBody($body);
        $this->mailer->send($message);
    }
    public function sendConfirmationCommand($entity)
    {
        $body = "";
        $qrCode = $this->qrCodeFactory->create('QR Code', ['size' => 200]);
        $message = (new \Swift_Message())
            ->setContentType('text/html')
            ->setSubject("confirmation commande")
            ->setFrom("slideguide76@gmail.com")
            ->setTo("rrastakong@gmail.com");
        $img = $message->embed(new\Swift_Image($qrCode->writeString(), 'image.jpg', 'image/jpeg'));
        if ($entity instanceof Command) {
            $body = $this->twig->render(
                "Email/confirmationCommandCompanySucces.html.twig",
                [
                    "company" => $entity
                ]
            );
        } else if ($entity instanceof User) {
            $body = $this->twig->render(
                "Email/confirmationCommandCustomerSucces.html.twig",
                [
                    "user" => $entity,
                    "img" => $img
                ]
            );
        }


//        $message = ( new\Swift_Message("You have a New Command!!!") )
//            ->setFrom("slideguide76@gmail.com")
//            ->setTo("rrastakong@gmail.com")
//            ->setBody($body, "text/html");
//
//        $this->mailer->send($message);



        /*1*/
//        $img = $message->embed(\Swift_Image::fromPath('assets/img/logo-
//louvre.jpg'));
        /*2*/
        $message->setBody($body);
        $this->mailer->send($message);
    }
}