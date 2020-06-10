<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/' => [[['_route' => 'default_index', '_controller' => 'App\\Controller\\DefaultController::index'], null, null, null, false, false, null]],
        '/qr' => [[['_route' => 'qr', '_controller' => 'App\\Controller\\DefaultController::qr'], null, null, null, false, false, null]],
        '/api/ephemeral_key' => [[['_route' => 'api_ephemeral_keys_post_collection', '_controller' => 'api_platform.action.post_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\EphemeralKey', '_api_collection_operation_name' => 'post'], null, ['POST' => 0], null, false, false, null]],
        '/api/image/presign' => [[['_route' => 'api_image_pre_sign_urls_post_collection', '_controller' => 'api_platform.action.post_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\ImagePreSignUrl', '_api_collection_operation_name' => 'post'], null, ['POST' => 0], null, false, false, null]],
        '/api/command/paymentItent' => [[['_route' => 'api_commands_post_PaymentIntent_collection', '_controller' => 'App\\Controller\\CommandIntentAction', '_format' => null, '_api_resource_class' => 'App\\Entity\\Command', '_api_collection_operation_name' => 'post_PaymentIntent'], null, ['POST' => 0], null, false, false, null]],
        '/api/commands/hooks' => [[['_route' => 'api_commands_post-hooks_collection', '_controller' => 'App\\Controller\\StripeHooksAction', '_format' => null, '_api_resource_class' => 'App\\Entity\\Command', '_api_collection_operation_name' => 'post-hooks', '_api_receive' => false], null, ['POST' => 0], null, false, false, null]],
        '/admin' => [[['_route' => 'easyadmin', '_controller' => 'EasyCorp\\Bundle\\EasyAdminBundle\\Controller\\EasyAdminController::indexAction'], null, null, null, true, false, null]],
        '/api/login_check' => [[['_route' => 'api_login_check'], null, null, null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/spots/(?'
                    .'|page(?:/(\\d+))?(*:32)'
                    .'|(\\d+)(*:44)'
                    .'|([^/]++)(*:59)'
                    .'|add(*:69)'
                    .'|([^/]++)(*:84)'
                .')'
                .'|/api(?'
                    .'|(?:/(index)(?:\\.([^/]++))?)?(*:127)'
                    .'|/(?'
                        .'|docs(?:\\.([^/]++))?(*:158)'
                        .'|c(?'
                            .'|o(?'
                                .'|ntexts/(.+)(?:\\.([^/]++))?(*:200)'
                                .'|m(?'
                                    .'|m(?'
                                        .'|and(?'
                                            .'|_items(?'
                                                .'|(?:\\.([^/]++))?(?'
                                                    .'|(*:249)'
                                                .')'
                                                .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                                    .'|(*:287)'
                                                .')'
                                            .')'
                                            .'|s(?'
                                                .'|(?:\\.([^/]++))?(?'
                                                    .'|(*:319)'
                                                .')'
                                                .'|/(?'
                                                    .'|([^/\\.]++)(?:\\.([^/]++))?(?'
                                                        .'|(*:360)'
                                                    .')'
                                                    .'|([^/]++)/(?'
                                                        .'|shopping_cart_items(?:\\.([^/]++))?(*:415)'
                                                        .'|command_items(?:\\.([^/]++))?(*:451)'
                                                    .')'
                                                .')'
                                            .')'
                                            .'|/(?'
                                                .'|([^/]++)/checkout(*:483)'
                                                .'|paymentItent/([^/]++)(*:512)'
                                            .')'
                                        .')'
                                        .'|ents(?'
                                            .'|(?:\\.([^/]++))?(?'
                                                .'|(*:547)'
                                            .')'
                                            .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                                .'|(*:585)'
                                            .')'
                                        .')'
                                    .')'
                                    .'|panies(?'
                                        .'|(?:\\.([^/]++))?(?'
                                            .'|(*:623)'
                                        .')'
                                        .'|/(?'
                                            .'|([^/\\.]++)(?:\\.([^/]++))?(?'
                                                .'|(*:664)'
                                            .')'
                                            .'|([^/]++)/prestations(?:\\.([^/]++))?(*:708)'
                                        .')'
                                    .')'
                                .')'
                            .')'
                            .'|art/paymentItent/([^/]++)(*:745)'
                        .')'
                        .'|s(?'
                            .'|pot(?'
                                .'|s(?'
                                    .'|(?:\\.([^/]++))?(?'
                                        .'|(*:786)'
                                    .')'
                                    .'|/(?'
                                        .'|([^/\\.]++)(?:\\.([^/]++))?(?'
                                            .'|(*:827)'
                                        .')'
                                        .'|([^/]++)/comments(?:\\.([^/]++))?(*:868)'
                                    .')'
                                .')'
                                .'|_sub_types(?'
                                    .'|(?:\\.([^/]++))?(?'
                                        .'|(*:909)'
                                    .')'
                                    .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                        .'|(*:947)'
                                    .')'
                                .')'
                            .')'
                            .'|hopping_cart(?'
                                .'|s(?'
                                    .'|(?:\\.([^/]++))?(?'
                                        .'|(*:995)'
                                    .')'
                                    .'|/([^/\\.]++)(?:\\.([^/]++))?(*:1030)'
                                .')'
                                .'|_items(?'
                                    .'|(?:\\.([^/]++))?(?'
                                        .'|(*:1067)'
                                    .')'
                                    .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                        .'|(*:1106)'
                                    .')'
                                .')'
                            .')'
                        .')'
                        .'|prestations(?'
                            .'|(?:\\.([^/]++))?(?'
                                .'|(*:1151)'
                            .')'
                            .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                .'|(*:1190)'
                            .')'
                        .')'
                        .'|towns(?'
                            .'|(?:\\.([^/]++))?(?'
                                .'|(*:1227)'
                            .')'
                            .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                .'|(*:1266)'
                            .')'
                        .')'
                        .'|users(?'
                            .'|(?:\\.([^/]++))?(?'
                                .'|(*:1303)'
                            .')'
                            .'|/(?'
                                .'|([^/\\.]++)(?:\\.([^/]++))?(?'
                                    .'|(*:1345)'
                                .')'
                                .'|([^/]++)/reset\\-password(*:1379)'
                                .'|confirmation(*:1400)'
                            .')'
                        .')'
                        .'|images(?'
                            .'|(?:\\.([^/]++))?(?'
                                .'|(*:1438)'
                            .')'
                            .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                .'|(*:1477)'
                            .')'
                        .')'
                    .')'
                .')'
                .'|/qr\\-code/([\\w\\W]+)\\.([^/]++)(*:1519)'
            .')/?$}sD',
    ],
    [ // $dynamicRoutes
        32 => [[['_route' => 'spot_list', 'page' => 5, '_controller' => 'App\\Controller\\SpotController::list'], ['page'], null, null, false, true, null]],
        44 => [[['_route' => 'spot_by_id', '_controller' => 'App\\Controller\\SpotController::post'], ['id'], ['GET' => 0], null, false, true, null]],
        59 => [[['_route' => 'spot_by_slug', '_controller' => 'App\\Controller\\SpotController::postBySlug'], ['slug'], ['GET' => 0], null, false, true, null]],
        69 => [[['_route' => 'spot_add', '_controller' => 'App\\Controller\\SpotController::add'], [], ['POST' => 0], null, false, false, null]],
        84 => [[['_route' => 'spot_delete', '_controller' => 'App\\Controller\\SpotController::delete'], ['id'], ['DELETE' => 0], null, false, true, null]],
        127 => [[['_route' => 'api_entrypoint', '_controller' => 'api_platform.action.entrypoint', '_format' => '', '_api_respond' => 'true', 'index' => 'index'], ['index', '_format'], null, null, false, true, null]],
        158 => [[['_route' => 'api_doc', '_controller' => 'api_platform.action.documentation', '_format' => '', '_api_respond' => 'true'], ['_format'], null, null, false, true, null]],
        200 => [[['_route' => 'api_jsonld_context', '_controller' => 'api_platform.jsonld.action.context', '_format' => 'jsonld', '_api_respond' => 'true'], ['shortName', '_format'], null, null, false, true, null]],
        249 => [
            [['_route' => 'api_command_items_get_collection', '_controller' => 'api_platform.action.get_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\CommandItem', '_api_collection_operation_name' => 'get'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_command_items_post_collection', '_controller' => 'api_platform.action.post_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\CommandItem', '_api_collection_operation_name' => 'post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        287 => [
            [['_route' => 'api_command_items_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\CommandItem', '_api_item_operation_name' => 'get'], ['id', '_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_command_items_delete_item', '_controller' => 'api_platform.action.delete_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\CommandItem', '_api_item_operation_name' => 'delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
            [['_route' => 'api_command_items_put_item', '_controller' => 'api_platform.action.put_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\CommandItem', '_api_item_operation_name' => 'put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => 'api_command_items_patch_item', '_controller' => 'api_platform.action.patch_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\CommandItem', '_api_item_operation_name' => 'patch'], ['id', '_format'], ['PATCH' => 0], null, false, true, null],
        ],
        319 => [
            [['_route' => 'api_commands_get_collection', '_controller' => 'api_platform.action.get_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\Command', '_api_collection_operation_name' => 'get'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_commands_post_collection', '_controller' => 'api_platform.action.post_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\Command', '_api_collection_operation_name' => 'post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        360 => [
            [['_route' => 'api_commands_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Command', '_api_item_operation_name' => 'get'], ['id', '_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_commands_put_item', '_controller' => 'api_platform.action.put_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Command', '_api_item_operation_name' => 'put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
        ],
        415 => [[['_route' => 'api_commands_shopping_cart_items_get_subresource', '_controller' => 'api_platform.action.get_subresource', '_format' => null, '_api_resource_class' => 'App\\Entity\\ShoppingCartItem', '_api_subresource_operation_name' => 'api_commands_shopping_cart_items_get_subresource', '_api_subresource_context' => ['property' => 'shoppingCartItems', 'identifiers' => [['id', 'App\\Entity\\Command', true]], 'collection' => true, 'operationId' => 'api_commands_shopping_cart_items_get_subresource']], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        451 => [[['_route' => 'api_commands_command_items_get_subresource', '_controller' => 'api_platform.action.get_subresource', '_format' => null, '_api_resource_class' => 'App\\Entity\\CommandItem', '_api_subresource_operation_name' => 'api_commands_command_items_get_subresource', '_api_subresource_context' => ['property' => 'commandItems', 'identifiers' => [['id', 'App\\Entity\\Command', true]], 'collection' => true, 'operationId' => 'api_commands_command_items_get_subresource']], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        483 => [[['_route' => 'api_commands_put-checkout-session_item', '_controller' => 'CreateCheckoutSession', '_format' => null, '_api_resource_class' => 'App\\Entity\\Command', '_api_item_operation_name' => 'put-checkout-session'], ['id'], ['PUT' => 0], null, false, false, null]],
        512 => [[['_route' => 'api_commands_get-paymentIntent_item', '_controller' => 'App\\Controller\\CommandIntentAction', '_format' => null, '_api_resource_class' => 'App\\Entity\\Command', '_api_item_operation_name' => 'get-paymentIntent'], ['id'], ['GET' => 0], null, false, true, null]],
        547 => [
            [['_route' => 'api_comments_post_collection', '_controller' => 'api_platform.action.post_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\Comment', '_api_collection_operation_name' => 'post'], ['_format'], ['POST' => 0], null, false, true, null],
            [['_route' => 'api_comments_get_collection', '_controller' => 'api_platform.action.get_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\Comment', '_api_collection_operation_name' => 'get'], ['_format'], ['GET' => 0], null, false, true, null],
        ],
        585 => [
            [['_route' => 'api_comments_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Comment', '_api_item_operation_name' => 'get'], ['id', '_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_comments_put_item', '_controller' => 'api_platform.action.put_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Comment', '_api_item_operation_name' => 'put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
        ],
        623 => [
            [['_route' => 'api_companies_get_collection', '_controller' => 'api_platform.action.get_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\Company', '_api_collection_operation_name' => 'get'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_companies_post_collection', '_controller' => 'api_platform.action.post_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\Company', '_api_collection_operation_name' => 'post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        664 => [
            [['_route' => 'api_companies_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Company', '_api_item_operation_name' => 'get'], ['id', '_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_companies_delete_item', '_controller' => 'api_platform.action.delete_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Company', '_api_item_operation_name' => 'delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
            [['_route' => 'api_companies_put_item', '_controller' => 'api_platform.action.put_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Company', '_api_item_operation_name' => 'put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => 'api_companies_patch_item', '_controller' => 'api_platform.action.patch_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Company', '_api_item_operation_name' => 'patch'], ['id', '_format'], ['PATCH' => 0], null, false, true, null],
        ],
        708 => [[['_route' => 'api_companies_prestations_get_subresource', '_controller' => 'api_platform.action.get_subresource', '_format' => null, '_api_resource_class' => 'App\\Entity\\Prestation', '_api_subresource_operation_name' => 'api_companies_prestations_get_subresource', '_api_subresource_context' => ['property' => 'prestations', 'identifiers' => [['id', 'App\\Entity\\Company', true]], 'collection' => true, 'operationId' => 'api_companies_prestations_get_subresource']], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        745 => [[['_route' => 'api_shopping_carts_put-PaymentIntent_item', '_controller' => 'App\\Controller\\PaymentIntentAction', '_format' => null, '_api_resource_class' => 'App\\Entity\\ShoppingCart', '_api_item_operation_name' => 'put-PaymentIntent'], ['id'], ['PUT' => 0], null, false, true, null]],
        786 => [
            [['_route' => 'api_spots_get_collection', '_controller' => 'api_platform.action.get_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\Spot', '_api_collection_operation_name' => 'get'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_spots_post_collection', '_controller' => 'api_platform.action.post_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\Spot', '_api_collection_operation_name' => 'post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        827 => [
            [['_route' => 'api_spots_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Spot', '_api_item_operation_name' => 'get'], ['id', '_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_spots_put_item', '_controller' => 'api_platform.action.put_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Spot', '_api_item_operation_name' => 'put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
        ],
        868 => [[['_route' => 'api_spots_comments_get_subresource', '_controller' => 'api_platform.action.get_subresource', '_format' => null, '_api_resource_class' => 'App\\Entity\\Comment', '_api_subresource_operation_name' => 'api_spots_comments_get_subresource', '_api_subresource_context' => ['property' => 'comments', 'identifiers' => [['id', 'App\\Entity\\Spot', true]], 'collection' => true, 'operationId' => 'api_spots_comments_get_subresource']], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        909 => [
            [['_route' => 'api_spot_sub_types_get_collection', '_controller' => 'api_platform.action.get_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\SpotSubType', '_api_collection_operation_name' => 'get'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_spot_sub_types_post_collection', '_controller' => 'api_platform.action.post_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\SpotSubType', '_api_collection_operation_name' => 'post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        947 => [
            [['_route' => 'api_spot_sub_types_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\SpotSubType', '_api_item_operation_name' => 'get'], ['id', '_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_spot_sub_types_delete_item', '_controller' => 'api_platform.action.delete_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\SpotSubType', '_api_item_operation_name' => 'delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
            [['_route' => 'api_spot_sub_types_put_item', '_controller' => 'api_platform.action.put_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\SpotSubType', '_api_item_operation_name' => 'put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => 'api_spot_sub_types_patch_item', '_controller' => 'api_platform.action.patch_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\SpotSubType', '_api_item_operation_name' => 'patch'], ['id', '_format'], ['PATCH' => 0], null, false, true, null],
        ],
        995 => [
            [['_route' => 'api_shopping_carts_get_collection', '_controller' => 'api_platform.action.get_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\ShoppingCart', '_api_collection_operation_name' => 'get'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_shopping_carts_post_collection', '_controller' => 'api_platform.action.post_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\ShoppingCart', '_api_collection_operation_name' => 'post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        1030 => [[['_route' => 'api_shopping_carts_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\ShoppingCart', '_api_item_operation_name' => 'get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        1067 => [
            [['_route' => 'api_shopping_cart_items_get_collection', '_controller' => 'api_platform.action.get_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\ShoppingCartItem', '_api_collection_operation_name' => 'get'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_shopping_cart_items_post_collection', '_controller' => 'api_platform.action.post_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\ShoppingCartItem', '_api_collection_operation_name' => 'post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        1106 => [
            [['_route' => 'api_shopping_cart_items_delete_item', '_controller' => 'api_platform.action.delete_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\ShoppingCartItem', '_api_item_operation_name' => 'delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
            [['_route' => 'api_shopping_cart_items_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\ShoppingCartItem', '_api_item_operation_name' => 'get'], ['id', '_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_shopping_cart_items_put_item', '_controller' => 'api_platform.action.put_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\ShoppingCartItem', '_api_item_operation_name' => 'put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
        ],
        1151 => [
            [['_route' => 'api_prestations_get_collection', '_controller' => 'api_platform.action.get_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\Prestation', '_api_collection_operation_name' => 'get'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_prestations_post_collection', '_controller' => 'api_platform.action.post_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\Prestation', '_api_collection_operation_name' => 'post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        1190 => [
            [['_route' => 'api_prestations_put_item', '_controller' => 'api_platform.action.put_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Prestation', '_api_item_operation_name' => 'put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => 'api_prestations_delete_item', '_controller' => 'api_platform.action.delete_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Prestation', '_api_item_operation_name' => 'delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
            [['_route' => 'api_prestations_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Prestation', '_api_item_operation_name' => 'get'], ['id', '_format'], ['GET' => 0], null, false, true, null],
        ],
        1227 => [
            [['_route' => 'api_towns_get_collection', '_controller' => 'api_platform.action.get_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\Town', '_api_collection_operation_name' => 'get'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_towns_post_collection', '_controller' => 'api_platform.action.post_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\Town', '_api_collection_operation_name' => 'post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        1266 => [
            [['_route' => 'api_towns_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Town', '_api_item_operation_name' => 'get'], ['id', '_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_towns_delete_item', '_controller' => 'api_platform.action.delete_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Town', '_api_item_operation_name' => 'delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
            [['_route' => 'api_towns_put_item', '_controller' => 'api_platform.action.put_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Town', '_api_item_operation_name' => 'put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => 'api_towns_patch_item', '_controller' => 'api_platform.action.patch_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Town', '_api_item_operation_name' => 'patch'], ['id', '_format'], ['PATCH' => 0], null, false, true, null],
        ],
        1303 => [
            [['_route' => 'api_users_get_collection', '_controller' => 'api_platform.action.get_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\User', '_api_collection_operation_name' => 'get'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_users_post_collection', '_controller' => 'api_platform.action.post_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\User', '_api_collection_operation_name' => 'post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        1345 => [
            [['_route' => 'api_users_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\User', '_api_item_operation_name' => 'get'], ['id', '_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_users_put_item', '_controller' => 'api_platform.action.put_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\User', '_api_item_operation_name' => 'put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
        ],
        1379 => [[['_route' => 'api_users_put-reset-password_item', '_controller' => 'App\\Controller\\ResetPasswordAction', '_format' => null, '_api_resource_class' => 'App\\Entity\\User', '_api_item_operation_name' => 'put-reset-password'], ['id'], ['PUT' => 0], null, false, false, null]],
        1400 => [[['_route' => 'api_user_confirmations_post_collection', '_controller' => 'api_platform.action.post_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\UserConfirmation', '_api_collection_operation_name' => 'post'], [], ['POST' => 0], null, false, false, null]],
        1438 => [
            [['_route' => 'api_images_get_collection', '_controller' => 'api_platform.action.get_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\Image', '_api_collection_operation_name' => 'get'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_images_post_collection', '_controller' => 'api_platform.action.post_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\Image', '_api_collection_operation_name' => 'post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        1477 => [
            [['_route' => 'api_images_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Image', '_api_item_operation_name' => 'get'], ['id', '_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_images_delete_item', '_controller' => 'api_platform.action.delete_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Image', '_api_item_operation_name' => 'delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
            [['_route' => 'api_images_put_item', '_controller' => 'api_platform.action.put_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Image', '_api_item_operation_name' => 'put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => 'api_images_patch_item', '_controller' => 'api_platform.action.patch_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Image', '_api_item_operation_name' => 'patch'], ['id', '_format'], ['PATCH' => 0], null, false, true, null],
        ],
        1519 => [
            [['_route' => 'qr_code_generate', '_controller' => 'Endroid\\QrCodeBundle\\Controller\\GenerateController'], ['text', 'extension'], null, null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
