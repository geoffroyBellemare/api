<?php


namespace App\Tests\EventSubscriber;


use ApiPlatform\Core\EventListener\EventPriorities;
use App\Entity\Company;
use App\Entity\Prestation;
use App\Entity\User;
use App\EventSubscriber\AuthoredEntitySubscriber;
use App\EventSubscriber\CompanizedEntitySubscriber;
use phpDocumentor\Reflection\Types\Mixed_;
use Symfony\Component\HttpFoundation\Request;
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpKernel\Event\ViewEvent;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;

class CompanizedEntitySubscriberTest extends TestCase
{
    public function testConfiguration() {
        $result = CompanizedEntitySubscriber::getSubscribedEvents();
        $this->assertArrayHasKey( KernelEvents::VIEW, $result);
        $this->assertEquals(["setCompany", EventPriorities::PRE_WRITE], $result[KernelEvents::VIEW]);
    }

//    public function testNoTokenPresent() {
//        $tokenStorageMock = $this->getTokenStorageMock(false);
//        $eventMock = $this->getEventMockObject("POST", new Prestation());
//        (new  CompanizedEntitySubscriber($tokenStorageMock))->setCompany($eventMock);
//    }
    /**
     * @@dataProvider providerSetCompanyCall
     */
    public function testSetCompanyCall(string $class, string $method, bool $shouldCallSetCompany) {
        $tockenStorageMock = $this->getTokenStorageMock($shouldCallSetCompany);
        $eventMock = $this->getEventMockObject($method, $this->getEntityMock($class, $shouldCallSetCompany));
        (new  CompanizedEntitySubscriber($tockenStorageMock))->setCompany($eventMock);

//        $tockenStorageMock = $this->getTokenStorageMock(true);
//        $eventMock = $this->getEventMockObject("POST", $this->getEntityMock(Prestation::class, true));
//        (new  CompanizedEntitySubscriber($tockenStorageMock))->setCompany($eventMock);
//
//        $tockenStorageMock = $this->getTokenStorageMock(false);
//        $eventMock = $this->getEventMockObject("GET", $this->getEntityMock(Prestation::class, false));
//        (new  CompanizedEntitySubscriber($tockenStorageMock))->setCompany($eventMock);
    }

    public function providerSetCompanyCall(): array
    {
        return  [
            [ Prestation::class, "POST", true ],
            [ Prestation::class, "GET", false ]
        ];
    }

    /**
     * @return \PHPUnit\Framework\MockObject\MockObject|TokenStorageInterface
     */
    protected function getTokenStorageMock(bool $hasToken): \PHPUnit\Framework\MockObject\MockObject
    {

        $userMock = $this->getMockBuilder(User::class)
            ->setMethods(["getCompany"])
            ->getMock();
        $userMock->expects($hasToken ? $this->once() : $this->never())
            ->method("getCompany")
            ->willReturn(new Company());

        $tokenMock = $this->getMockBuilder(TokenInterface::class)
            ->getMockForAbstractClass();
        $tokenMock->expects($hasToken ? $this->once() : $this->never())
            ->method('getUser')
            ->willReturn($userMock);

        $tokenStorageMock = $this->getMockBuilder(TokenStorageInterface::class)
            ->getMockForAbstractClass();
        $tokenStorageMock->expects($hasToken ? $this->once() : $this->never())
            ->method('getToken')
            ->willReturn($hasToken ? $tokenMock : null);

        return $tokenStorageMock;
    }

    /**
     * @return \PHPUnit\Framework\MockObject\MockObject
     */
    protected function getEventMockObject(string $method, $controllerResult)
    {
        $requestMock = $this->getMockBuilder(Request::class)->getMock();
        $requestMock->expects($this->once())
            ->method("getMethod")
            ->willReturn($method);

        $eventMock = $this->getMockBuilder(ViewEvent::class)
            ->disableOriginalConstructor()
            ->getMock();
        $eventMock->expects($this->once())
            ->method("getControllerResult")
            ->willReturn($controllerResult);
        $eventMock->expects($this->once())
            ->method("getRequest")
            ->willReturn($requestMock);
        return $eventMock;
    }

    /**
     * @return \PHPUnit\Framework\MockObject\MockObject
     */
    protected function getEntityMock(string $class, bool $shouldCallSetCompany = true): \PHPUnit\Framework\MockObject\MockObject
    {
        $userMock = $this->getMockBuilder($class)
            ->setMethods(["setCompany"])
            ->getMock();
        $userMock->expects($shouldCallSetCompany ? $this->once() : $this->never())
            ->method("setCompany");
        return $userMock;
    }
}