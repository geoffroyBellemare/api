<?php

// This file has been auto-generated by the Symfony Dependency Injection Component
// You can reference it in the "opcache.preload" php.ini setting on PHP >= 7.4 when preloading is desired

use Symfony\Component\DependencyInjection\Dumper\Preloader;

require dirname(__DIR__, 3).'/vendor/autoload.php';
require __DIR__.'/ContainerNaJYBHP/srcApp_KernelDevDebugContainer.php';

$classes = [];
$classes[] = 'App\Kernel';
$classes[] = 'Symfony\Bundle\FrameworkBundle\Controller\ControllerNameParser';
$classes[] = 'Symfony\Component\HttpKernel\ControllerMetadata\ArgumentMetadataFactory';
$classes[] = 'Symfony\Component\HttpKernel\EventListener\ResponseListener';
$classes[] = 'Symfony\Component\HttpKernel\EventListener\StreamedResponseListener';
$classes[] = 'Symfony\Component\HttpKernel\EventListener\LocaleListener';
$classes[] = 'Symfony\Component\HttpKernel\EventListener\ValidateRequestListener';
$classes[] = 'Symfony\Bundle\FrameworkBundle\EventListener\ResolveControllerNameSubscriber';
$classes[] = 'Symfony\Component\HttpKernel\EventListener\DisallowRobotsIndexingListener';
$classes[] = 'Symfony\Component\HttpKernel\EventListener\ErrorListener';
$classes[] = 'Symfony\Component\DependencyInjection\ParameterBag\ContainerBag';
$classes[] = 'Symfony\Component\HttpKernel\HttpKernel';
$classes[] = 'Symfony\Component\HttpKernel\Controller\TraceableArgumentResolver';
$classes[] = 'Symfony\Component\HttpKernel\Controller\ArgumentResolver';
$classes[] = 'Symfony\Component\HttpFoundation\RequestStack';
$classes[] = 'Symfony\Component\Config\ResourceCheckerConfigCacheFactory';
$classes[] = 'Symfony\Component\HttpKernel\EventListener\LocaleAwareListener';
$classes[] = 'Symfony\Component\HttpKernel\EventListener\SessionListener';
$classes[] = 'Symfony\Component\DependencyInjection\ServiceLocator';
$classes[] = 'Symfony\Component\Form\FormRegistry';
$classes[] = 'Symfony\Component\Form\Extension\DependencyInjection\DependencyInjectionExtension';
$classes[] = 'Symfony\Component\Form\ResolvedFormTypeFactory';
$classes[] = 'Symfony\Component\Validator\Validator\ValidatorInterface';
$classes[] = 'Symfony\Component\Validator\Validation';
$classes[] = 'Symfony\Component\Validator\ContainerConstraintValidatorFactory';
$classes[] = 'Symfony\Component\Validator\Util\LegacyTranslatorProxy';
$classes[] = 'Symfony\Bridge\Doctrine\Validator\DoctrineInitializer';
$classes[] = 'Symfony\Component\Validator\Mapping\Loader\PropertyInfoLoader';
$classes[] = 'Symfony\Bridge\Doctrine\Validator\DoctrineLoader';
$classes[] = 'Symfony\Component\HttpKernel\EventListener\DebugHandlersListener';
$classes[] = 'Symfony\Bridge\Monolog\Logger';
$classes[] = 'Symfony\Component\HttpKernel\Debug\FileLinkFormatter';
$classes[] = 'Symfony\Component\Stopwatch\Stopwatch';
$classes[] = 'Symfony\Component\HttpKernel\Controller\TraceableControllerResolver';
$classes[] = 'Symfony\Bundle\FrameworkBundle\Controller\ControllerResolver';
$classes[] = 'Symfony\Component\Routing\RequestContext';
$classes[] = 'Symfony\Component\HttpKernel\EventListener\RouterListener';
$classes[] = 'Doctrine\Common\Annotations\AnnotationReader';
$classes[] = 'Doctrine\Common\Annotations\AnnotationRegistry';
$classes[] = 'Symfony\Component\Serializer\Serializer';
$classes[] = 'App\Serializer\UserAttributeNormalizer';
$classes[] = 'ApiPlatform\Core\Swagger\Serializer\ApiGatewayNormalizer';
$classes[] = 'ApiPlatform\Core\Swagger\Serializer\DocumentationNormalizer';
$classes[] = 'ApiPlatform\Core\Bridge\Symfony\Routing\RouterOperationPathResolver';
$classes[] = 'ApiPlatform\Core\Hydra\Serializer\ConstraintViolationListNormalizer';
$classes[] = 'ApiPlatform\Core\Problem\Serializer\ConstraintViolationListNormalizer';
$classes[] = 'ApiPlatform\Core\Hydra\Serializer\DocumentationNormalizer';
$classes[] = 'ApiPlatform\Core\Hydra\Serializer\EntrypointNormalizer';
$classes[] = 'ApiPlatform\Core\Hydra\Serializer\ErrorNormalizer';
$classes[] = 'ApiPlatform\Core\Problem\Serializer\ErrorNormalizer';
$classes[] = 'Symfony\Component\Serializer\Normalizer\ProblemNormalizer';
$classes[] = 'ApiPlatform\Core\JsonLd\Serializer\ItemNormalizer';
$classes[] = 'ApiPlatform\Core\Serializer\ItemNormalizer';
$classes[] = 'Symfony\Component\Serializer\Normalizer\JsonSerializableNormalizer';
$classes[] = 'Symfony\Component\Serializer\Normalizer\DateTimeNormalizer';
$classes[] = 'Symfony\Component\Serializer\Normalizer\ConstraintViolationListNormalizer';
$classes[] = 'Symfony\Component\Serializer\Normalizer\DateTimeZoneNormalizer';
$classes[] = 'Symfony\Component\Serializer\Normalizer\DateIntervalNormalizer';
$classes[] = 'Symfony\Component\Serializer\Normalizer\DataUriNormalizer';
$classes[] = 'ApiPlatform\Core\Hydra\Serializer\CollectionFiltersNormalizer';
$classes[] = 'ApiPlatform\Core\Hydra\Serializer\PartialCollectionViewNormalizer';
$classes[] = 'ApiPlatform\Core\Hydra\Serializer\CollectionNormalizer';
$classes[] = 'Symfony\Component\Serializer\Normalizer\ArrayDenormalizer';
$classes[] = 'ApiPlatform\Core\JsonLd\Serializer\ObjectNormalizer';
$classes[] = 'Symfony\Component\Serializer\Normalizer\ObjectNormalizer';
$classes[] = 'Symfony\Component\Serializer\Mapping\ClassDiscriminatorFromClassMetadata';
$classes[] = 'Symfony\Component\Serializer\Encoder\XmlEncoder';
$classes[] = 'Symfony\Component\Serializer\Encoder\JsonEncoder';
$classes[] = 'Symfony\Component\Serializer\Encoder\YamlEncoder';
$classes[] = 'Symfony\Component\Serializer\Encoder\CsvEncoder';
$classes[] = 'ApiPlatform\Core\Serializer\JsonEncoder';
$classes[] = 'Symfony\Component\Serializer\Mapping\Factory\ClassMetadataFactory';
$classes[] = 'Symfony\Component\Serializer\Mapping\Loader\LoaderChain';
$classes[] = 'Symfony\Component\Serializer\Mapping\Loader\AnnotationLoader';
$classes[] = 'Symfony\Component\Serializer\NameConverter\MetadataAwareNameConverter';
$classes[] = 'Symfony\Component\PropertyInfo\PropertyInfoExtractor';
$classes[] = 'Symfony\Component\WebLink\EventListener\AddLinkHeaderListener';
$classes[] = 'Symfony\Component\Mime\MimeTypes';
$classes[] = 'Sensio\Bundle\FrameworkExtraBundle\EventListener\ControllerListener';
$classes[] = 'Sensio\Bundle\FrameworkExtraBundle\EventListener\ParamConverterListener';
$classes[] = 'Sensio\Bundle\FrameworkExtraBundle\Request\ParamConverter\ParamConverterManager';
$classes[] = 'Sensio\Bundle\FrameworkExtraBundle\Request\ParamConverter\DoctrineParamConverter';
$classes[] = 'Symfony\Component\ExpressionLanguage\ExpressionLanguage';
$classes[] = 'Sensio\Bundle\FrameworkExtraBundle\Request\ParamConverter\DateTimeParamConverter';
$classes[] = 'Sensio\Bundle\FrameworkExtraBundle\EventListener\TemplateListener';
$classes[] = 'Sensio\Bundle\FrameworkExtraBundle\Templating\TemplateGuesser';
$classes[] = 'Sensio\Bundle\FrameworkExtraBundle\EventListener\HttpCacheListener';
$classes[] = 'Sensio\Bundle\FrameworkExtraBundle\EventListener\SecurityListener';
$classes[] = 'Sensio\Bundle\FrameworkExtraBundle\Security\ExpressionLanguage';
$classes[] = 'Sensio\Bundle\FrameworkExtraBundle\EventListener\IsGrantedListener';
$classes[] = 'Sensio\Bundle\FrameworkExtraBundle\Request\ArgumentNameConverter';
$classes[] = 'Doctrine\Bundle\DoctrineBundle\Registry';
$classes[] = 'Doctrine\DBAL\Connection';
$classes[] = 'Doctrine\DBAL\Configuration';
$classes[] = 'Doctrine\DBAL\Logging\LoggerChain';
$classes[] = 'Symfony\Bridge\Doctrine\Logger\DbalLogger';
$classes[] = 'Doctrine\DBAL\Logging\DebugStack';
$classes[] = 'Symfony\Bridge\Doctrine\ContainerAwareEventManager';
$classes[] = 'Doctrine\Bundle\DoctrineBundle\ConnectionFactory';
$classes[] = 'Symfony\Component\Cache\Adapter\ArrayAdapter';
$classes[] = 'Doctrine\ORM\EntityManager';
$classes[] = 'Doctrine\ORM\Configuration';
$classes[] = 'Symfony\Component\Cache\DoctrineProvider';
$classes[] = 'Doctrine\Common\Persistence\Mapping\Driver\MappingDriverChain';
$classes[] = 'Doctrine\ORM\Mapping\Driver\AnnotationDriver';
$classes[] = 'Doctrine\ORM\Mapping\UnderscoreNamingStrategy';
$classes[] = 'Doctrine\ORM\Mapping\DefaultQuoteStrategy';
$classes[] = 'Doctrine\Bundle\DoctrineBundle\Mapping\ContainerEntityListenerResolver';
$classes[] = 'Doctrine\Bundle\DoctrineBundle\Repository\ContainerRepositoryFactory';
$classes[] = 'Doctrine\Bundle\DoctrineBundle\ManagerConfigurator';
$classes[] = 'Twig\Environment';
$classes[] = 'Symfony\Bridge\Twig\Extension\CsrfExtension';
$classes[] = 'Symfony\Bridge\Twig\Extension\ProfilerExtension';
$classes[] = 'Twig\Profiler\Profile';
$classes[] = 'Symfony\Bridge\Twig\Extension\TranslationExtension';
$classes[] = 'Symfony\Bridge\Twig\Extension\AssetExtension';
$classes[] = 'Symfony\Component\Asset\Packages';
$classes[] = 'Symfony\Component\Asset\PathPackage';
$classes[] = 'Symfony\Component\Asset\VersionStrategy\EmptyVersionStrategy';
$classes[] = 'Symfony\Component\Asset\Context\RequestStackContext';
$classes[] = 'Symfony\Bridge\Twig\Extension\CodeExtension';
$classes[] = 'Symfony\Bridge\Twig\Extension\RoutingExtension';
$classes[] = 'Symfony\Bridge\Twig\Extension\YamlExtension';
$classes[] = 'Symfony\Bridge\Twig\Extension\StopwatchExtension';
$classes[] = 'Symfony\Bridge\Twig\Extension\ExpressionExtension';
$classes[] = 'Symfony\Bridge\Twig\Extension\HttpKernelExtension';
$classes[] = 'Symfony\Bridge\Twig\Extension\HttpFoundationExtension';
$classes[] = 'Symfony\Component\HttpFoundation\UrlHelper';
$classes[] = 'Symfony\Bridge\Twig\Extension\WebLinkExtension';
$classes[] = 'Symfony\Bridge\Twig\Extension\FormExtension';
$classes[] = 'Symfony\Bridge\Twig\Extension\LogoutUrlExtension';
$classes[] = 'Symfony\Bridge\Twig\Extension\SecurityExtension';
$classes[] = 'Doctrine\Bundle\DoctrineBundle\Twig\DoctrineExtension';
$classes[] = 'Twig\Extension\DebugExtension';
$classes[] = 'EasyCorp\Bundle\EasyAdminBundle\Twig\EasyAdminTwigExtension';
$classes[] = 'Endroid\QrCodeBundle\Twig\QrCodeExtension';
$classes[] = 'Symfony\Bridge\Twig\AppVariable';
$classes[] = 'Twig\RuntimeLoader\ContainerRuntimeLoader';
$classes[] = 'Symfony\Bundle\TwigBundle\DependencyInjection\Configurator\EnvironmentConfigurator';
$classes[] = 'Symfony\Bundle\TwigBundle\Loader\NativeFilesystemLoader';
$classes[] = 'Symfony\Component\Security\Core\Authorization\AuthorizationChecker';
$classes[] = 'Symfony\Component\Security\Core\Authentication\Token\Storage\UsageTrackingTokenStorage';
$classes[] = 'Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorage';
$classes[] = 'Symfony\Component\Security\Core\Authentication\AuthenticationProviderManager';
$classes[] = 'Symfony\Component\Security\Core\Authentication\AuthenticationTrustResolver';
$classes[] = 'Symfony\Component\Security\Core\Authorization\ExpressionLanguage';
$classes[] = 'Symfony\Component\Security\Core\Role\RoleHierarchy';
$classes[] = 'Symfony\Component\Security\Http\Logout\LogoutUrlGenerator';
$classes[] = 'Symfony\Component\Cache\Adapter\AbstractAdapter';
$classes[] = 'Symfony\Component\Security\Http\RememberMe\ResponseListener';
$classes[] = 'Symfony\Component\Security\Core\Authorization\TraceableAccessDecisionManager';
$classes[] = 'Symfony\Component\Security\Core\Authorization\AccessDecisionManager';
$classes[] = 'Symfony\Bundle\SecurityBundle\Debug\TraceableFirewallListener';
$classes[] = 'Symfony\Bundle\SecurityBundle\Security\FirewallMap';
$classes[] = 'EasyCorp\Bundle\EasyAdminBundle\Configuration\ConfigManager';
$classes[] = 'EasyCorp\Bundle\EasyAdminBundle\Configuration\NormalizerConfigPass';
$classes[] = 'EasyCorp\Bundle\EasyAdminBundle\Configuration\DesignConfigPass';
$classes[] = 'EasyCorp\Bundle\EasyAdminBundle\Configuration\MenuConfigPass';
$classes[] = 'EasyCorp\Bundle\EasyAdminBundle\Configuration\ActionConfigPass';
$classes[] = 'EasyCorp\Bundle\EasyAdminBundle\Configuration\MetadataConfigPass';
$classes[] = 'EasyCorp\Bundle\EasyAdminBundle\Configuration\PropertyConfigPass';
$classes[] = 'EasyCorp\Bundle\EasyAdminBundle\Configuration\ViewConfigPass';
$classes[] = 'EasyCorp\Bundle\EasyAdminBundle\Configuration\TemplateConfigPass';
$classes[] = 'EasyCorp\Bundle\EasyAdminBundle\Configuration\DefaultConfigPass';
$classes[] = 'EasyCorp\Bundle\EasyAdminBundle\Router\EasyAdminRouter';
$classes[] = 'EasyCorp\Bundle\EasyAdminBundle\Security\AuthorizationChecker';
$classes[] = 'EasyCorp\Bundle\EasyAdminBundle\EventListener\ControllerListener';
$classes[] = 'EasyCorp\Bundle\EasyAdminBundle\Form\Filter\FilterRegistry';
$classes[] = 'Nelmio\CorsBundle\EventListener\CorsListener';
$classes[] = 'Nelmio\CorsBundle\Options\Resolver';
$classes[] = 'Nelmio\CorsBundle\Options\ConfigProvider';
$classes[] = 'ApiPlatform\Core\Api\ResourceClassResolver';
$classes[] = 'ApiPlatform\Core\Bridge\Symfony\Routing\Router';
$classes[] = 'ApiPlatform\Core\Bridge\Symfony\Routing\IriConverter';
$classes[] = 'ApiPlatform\Core\Bridge\Symfony\Routing\CachedRouteNameResolver';
$classes[] = 'ApiPlatform\Core\Bridge\Symfony\Routing\RouteNameResolver';
$classes[] = 'ApiPlatform\Core\Serializer\SerializerFilterContextBuilder';
$classes[] = 'App\Serializer\UserContextBuilder';
$classes[] = 'ApiPlatform\Core\Serializer\SerializerContextBuilder';
$classes[] = 'ApiPlatform\Core\PathResolver\CustomOperationPathResolver';
$classes[] = 'ApiPlatform\Core\PathResolver\OperationPathResolver';
$classes[] = 'ApiPlatform\Core\Operation\UnderscorePathSegmentNameGenerator';
$classes[] = 'ApiPlatform\Core\EventListener\AddFormatListener';
$classes[] = 'Negotiation\Negotiator';
$classes[] = 'ApiPlatform\Core\EventListener\ReadListener';
$classes[] = 'ApiPlatform\Core\Bridge\Symfony\Bundle\DataProvider\TraceableChainCollectionDataProvider';
$classes[] = 'ApiPlatform\Core\DataProvider\ChainCollectionDataProvider';
$classes[] = 'ApiPlatform\Core\EventListener\DeserializeListener';
$classes[] = 'ApiPlatform\Core\Api\CachedIdentifiersExtractor';
$classes[] = 'ApiPlatform\Core\Api\IdentifiersExtractor';
$classes[] = 'ApiPlatform\Core\Identifier\IdentifierConverter';
$classes[] = 'ApiPlatform\Core\Operation\Factory\CachedSubresourceOperationFactory';
$classes[] = 'ApiPlatform\Core\Operation\Factory\SubresourceOperationFactory';
$classes[] = 'ApiPlatform\Core\Metadata\Resource\Factory\CachedResourceNameCollectionFactory';
$classes[] = 'ApiPlatform\Core\Metadata\Resource\Factory\ExtractorResourceNameCollectionFactory';
$classes[] = 'ApiPlatform\Core\Metadata\Resource\Factory\AnnotationResourceNameCollectionFactory';
$classes[] = 'ApiPlatform\Core\Metadata\Resource\Factory\CachedResourceMetadataFactory';
$classes[] = 'ApiPlatform\Core\Metadata\Resource\Factory\FormatsResourceMetadataFactory';
$classes[] = 'ApiPlatform\Core\Metadata\Resource\Factory\OperationResourceMetadataFactory';
$classes[] = 'ApiPlatform\Core\Metadata\Resource\Factory\AnnotationResourceFilterMetadataFactory';
$classes[] = 'ApiPlatform\Core\Metadata\Resource\Factory\ShortNameResourceMetadataFactory';
$classes[] = 'ApiPlatform\Core\Metadata\Resource\Factory\PhpDocResourceMetadataFactory';
$classes[] = 'ApiPlatform\Core\Metadata\Resource\Factory\InputOutputResourceMetadataFactory';
$classes[] = 'ApiPlatform\Core\Metadata\Resource\Factory\ExtractorResourceMetadataFactory';
$classes[] = 'ApiPlatform\Core\Metadata\Resource\Factory\AnnotationResourceMetadataFactory';
$classes[] = 'ApiPlatform\Core\Metadata\Property\Factory\CachedPropertyNameCollectionFactory';
$classes[] = 'ApiPlatform\Core\Metadata\Property\Factory\ExtractorPropertyNameCollectionFactory';
$classes[] = 'ApiPlatform\Core\Metadata\Property\Factory\InheritedPropertyNameCollectionFactory';
$classes[] = 'ApiPlatform\Core\Bridge\Symfony\PropertyInfo\Metadata\Property\PropertyInfoPropertyNameCollectionFactory';
$classes[] = 'ApiPlatform\Core\Metadata\Property\Factory\CachedPropertyMetadataFactory';
$classes[] = 'ApiPlatform\Core\Bridge\Symfony\Validator\Metadata\Property\ValidatorPropertyMetadataFactory';
$classes[] = 'ApiPlatform\Core\Metadata\Property\Factory\ExtractorPropertyMetadataFactory';
$classes[] = 'ApiPlatform\Core\Metadata\Property\Factory\AnnotationPropertyMetadataFactory';
$classes[] = 'ApiPlatform\Core\Metadata\Property\Factory\AnnotationSubresourceMetadataFactory';
$classes[] = 'ApiPlatform\Core\Metadata\Property\Factory\SerializerPropertyMetadataFactory';
$classes[] = 'ApiPlatform\Core\Bridge\Doctrine\Orm\Metadata\Property\DoctrineOrmPropertyMetadataFactory';
$classes[] = 'ApiPlatform\Core\Metadata\Property\Factory\InheritedPropertyMetadataFactory';
$classes[] = 'ApiPlatform\Core\Bridge\Symfony\PropertyInfo\Metadata\Property\PropertyInfoPropertyMetadataFactory';
$classes[] = 'ApiPlatform\Core\Metadata\Extractor\XmlExtractor';
$classes[] = 'ApiPlatform\Core\Metadata\Extractor\YamlExtractor';
$classes[] = 'ApiPlatform\Core\JsonSchema\TypeFactory';
$classes[] = 'ApiPlatform\Core\Bridge\Symfony\Bundle\EventListener\SwaggerUiListener';
$classes[] = 'ApiPlatform\Core\JsonLd\ContextBuilder';
$classes[] = 'ApiPlatform\Core\Hydra\EventListener\AddLinkHeaderListener';
$classes[] = 'ApiPlatform\Core\Hydra\JsonSchema\SchemaFactory';
$classes[] = 'ApiPlatform\Core\JsonSchema\SchemaFactory';
$classes[] = 'ApiPlatform\Core\HttpCache\EventListener\AddHeadersListener';
$classes[] = 'ApiPlatform\Core\Filter\QueryParameterValidateListener';
$classes[] = 'ApiPlatform\Core\Bridge\Symfony\Bundle\DataProvider\TraceableChainItemDataProvider';
$classes[] = 'ApiPlatform\Core\DataProvider\ChainItemDataProvider';
$classes[] = 'ApiPlatform\Core\Bridge\Symfony\Bundle\DataProvider\TraceableChainSubresourceDataProvider';
$classes[] = 'ApiPlatform\Core\DataProvider\ChainSubresourceDataProvider';
$classes[] = 'ApiPlatform\Core\Security\EventListener\DenyAccessListener';
$classes[] = 'ApiPlatform\Core\Security\ResourceAccessChecker';
$classes[] = 'ApiPlatform\Core\Security\Core\Authorization\ExpressionLanguageProvider';
$classes[] = 'Monolog\Handler\StreamHandler';
$classes[] = 'Monolog\Processor\PsrLogMessageProcessor';
$classes[] = 'Symfony\Bridge\Monolog\Handler\ConsoleHandler';
$classes[] = 'Endroid\QrCode\Writer\BinaryWriter';
$classes[] = 'Endroid\QrCode\Writer\DebugWriter';
$classes[] = 'Endroid\QrCode\Writer\EpsWriter';
$classes[] = 'Endroid\QrCode\Writer\PngWriter';
$classes[] = 'Endroid\QrCode\Writer\SvgWriter';
$classes[] = 'Endroid\QrCode\Factory\QrCodeFactory';
$classes[] = 'Endroid\QrCode\WriterRegistry';
$classes[] = 'Symfony\Bundle\FrameworkBundle\Translation\Translator';
$classes[] = 'Symfony\Component\Translation\Formatter\MessageFormatter';
$classes[] = 'Symfony\Component\Translation\IdentityTranslator';
$classes[] = 'Symfony\Bundle\FrameworkBundle\Routing\Router';
$classes[] = 'Symfony\Component\PropertyAccess\PropertyAccessor';
$classes[] = 'Symfony\Component\HttpKernel\Debug\TraceableEventDispatcher';
$classes[] = 'Symfony\Component\EventDispatcher\EventDispatcher';
$classes[] = 'Monolog\Handler\NullHandler';
$classes[] = 'Doctrine\Common\Annotations\CachedReader';

Preloader::preload($classes);
