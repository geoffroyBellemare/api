Feature: Manage prestation
  @createSchema @prestation @cartItem
  Scenario: Create a prestation
    Given I am authenticated as "admin"
    Given I am company owner as "admin"
    When I add "Content-Type" header equal to "application/ld+json"
    And I add "Accept" header equal to "application/ld+json"
    And I send a "POST" request to "api/prestations" with body:
    """
    {
      "name": "Ios last",
      "price": 12,
      "quantity": 7
    }
    """
    Then the response status code should be 201
    And the response should be in JSON
    And the JSON matches expected template:
    """
    {
      "@context": "/api/contexts/Prestation",
      "@id": "@string@",
      "@type": "Prestation",
      "id": "@integer@",
      "name": "Ios last",
      "price": 12,
      "quantity": 7
    }
    """
  Scenario: Throws an error when prestation post is invalid
    Given I am authenticated as "admin"
    When I add "Content-Type" header equal to "application/ld+json"
    And I add "Accept" header equal to "application/ld+json"
    And I send a "POST" request to "api/prestations" with body:
    """
    {
      "name": "",
      "price": 12,
      "quantity": 7
    }
    """
    Then the response status code should be 400
    And the response should be in JSON
    And the JSON matches expected template:
    """
    {
      "@context":"\/api\/contexts\/ConstraintViolationList",
      "@type":"ConstraintViolationList",
      "hydra:title":"An error occurred",
      "hydra:description":"name: This value should not be blank.",
      "violations":[{"propertyPath":"name","message":"This value should not be blank."}]
    }
  """
  Scenario: Throws an error when create  prestation without a company registered
    Given I am authenticated as "john_doe"
    When I add "Content-Type" header equal to "application/ld+json"
    And I add "Accept" header equal to "application/ld+json"
    And I send a "POST" request to "api/prestations" with body:
    """
    {
      "name": "ggggg",
      "price": 12,
      "quantity": 7
    }
    """
    Then the response status code should be 400
    And the response should be in JSON
    And the JSON matches expected template:
    """
    {
      "@context":"\/api\/contexts\/ConstraintViolationList",
      "@type":"ConstraintViolationList",
      "hydra:title":"An error occurred",
      "hydra:description":"prestation: You Must Register your Company.",
      "violations":[{"propertyPath":"prestation","message":"You Must Register your Company."}]
    }
  """
  Scenario: Throws an error when delete prestation with non owner
    Given I am authenticated as "john_doe"
    When I add "Content-Type" header equal to "application/ld+json"
    And I add "Accept" header equal to "application/ld+json"
    And I send a "DELETE" request to "api/prestations/1"
    Then the response status code should be 403
    And the response should be in JSON
    And the JSON matches expected template:
    """
    {
      "status":403,
      "message":"@string@"
    }
    """
  Scenario: Throws an error when delete prestation with wrong id
    Given I am authenticated as "john_doe"
    When I add "Content-Type" header equal to "application/ld+json"
    And I add "Accept" header equal to "application/ld+json"
    And I send a "DELETE" request to "api/prestations/166"
    Then the response status code should be 404
    And the response should be in JSON
    And the JSON matches expected template:
    """
    {
      "status":404,
      "message":"@string@"
    }
    """
  Scenario: delete prestation
    Given I am authenticated as "admin"
    When I add "Content-Type" header equal to "application/ld+json"
    And I add "Accept" header equal to "application/ld+json"
    And I send a "DELETE" request to "api/prestations/1"
    Then the response status code should be 204
  @cartItem
  Scenario: Adding to cart a prestation
    Given I am authenticated as "john_doe"
    When I add "Content-Type" header equal to "application/ld+json"
    And I add "Accept" header equal to "application/ld+json"
    And I send a "POST" request to "api/shopping_cart_items" with body:
    """
    {
       "prestation": "/api/prestations/2",
       "startTime": "2019-09-17T22:13:19+00:00",
       "endTime": "2019-09-17T22:13:19+00:00"
    }
    """
    Then the response status code should be 201
    And the response should be in JSON
    And the JSON matches expected template:
    """
    {
      "@context": "/api/contexts/ShoppingCartItem",
      "@id": "@string@",
      "@type": "@string@",
      "id": "@integer@",
      "cart": {
        "@id": "@string@",
        "@type": "ShoppingCart",
        "totalAmount": @integer@
      },
      "prestation": {
        "@id": "@string@",
        "@type": "Prestation",
        "id": @integer@,
        "name": "@string@",
        "price": @integer@,
        "quantity": @integer@
      },
      "quantity": @integer@,
      "totalAmount": @integer@,
      "startTime": "@string@",
      "endTime": "@string@"
    }
    """
    Then I should have 1 product in the cart for john_doe
    Then The totalAmount should be 10
    Scenario: Update a cartItem
      Given I am authenticated as "john_doe"
      When I add "Content-Type" header equal to "application/ld+json"
      And I add "Accept" header equal to "application/ld+json"
      Then I send a "PUT" request to "/api/shopping_cart_items/1" with body:
      """
      {
         "p": "hfhhfhf"
      }
      """
      Then the response status code should be 200
      And the response should be in JSON
      And the JSON matches expected template:
      """
      {
        "@context": "/api/contexts/ShoppingCartItem",
        "@id": "@string@",
        "@type": "@string@",
        "id": "@integer@",
        "cart": {
          "@id": "@string@",
          "@type": "ShoppingCart",
          "totalAmount": @integer@
        },
        "prestation": {
          "@id": "@string@",
          "@type": "Prestation",
          "id": @integer@,
          "name": "@string@",
          "price": @integer@,
          "quantity": @integer@
        },
        "quantity": @integer@,
        "totalAmount": @integer@,
        "startTime": "@string@",
        "endTime": "@string@"
      }
      """
      Then I should have 1 product in the cart for john_doe
      Then The totalAmount should be 20
      Then I should have 2 times in the cart for item 1
  Scenario: Delete cartItem from cart
    Given I am authenticated as "john_doe"
    When I add "Content-Type" header equal to "application/ld+json"
    And I add "Accept" header equal to "application/ld+json"
    Then I send a "DELETE" request to "/api/shopping_cart_items/1"
    Then the response status code should be 200
    And the response should be in JSON
    And the JSON matches expected template:
    """
    {
      "totalAmount":10
    }
    """
    Then I should have 1 product in the cart for john_doe
    Then The totalAmount should be 10
    Then I should have 1 times in the cart for item 1
  Scenario: Throw an error when try addind to cart for non registered user
    When I add "Content-Type" header equal to "application/ld+json"
    And I add "Accept" header equal to "application/ld+json"
    And I send a "PUT" request to "api/shopping_cart_items/1" with body:
      """
      {
         "p": "hhh"
      }
      """
    Then the response status code should be 401
    And the response should be in JSON
    And the JSON matches expected template:
    """
    {
      "code":401,
      "message":"@string@"
    }
    """
    Scenario: Throw an error when addind to cart non existing prestation
      Given I am authenticated as "john_doe"
      When I add "Content-Type" header equal to "application/ld+json"
      And I add "Accept" header equal to "application/ld+json"
      And I send a "POST" request to "api/shopping_cart_items" with body:
      """
      {
         "prestation": "/api/prestations/444",
         "startTime": "2019-09-17T22:13:19+00:00",
         "endTime": "2019-09-17T22:13:19+00:00"
      }
      """
      Then the response status code should be 400
      And the response should be in JSON
      And the JSON matches expected template:
      """
      {
        "@context":"\/api\/contexts\/ConstraintViolationList",
        "@type":"ConstraintViolationList",
        "hydra:title":"An error occurred",
        "hydra:description":"@string@",
        "violations":[
           {
           "propertyPath":"@string@",
           "message":"@string@"
           }
         ]
      }
      """

  Scenario: Start Command
    Given I am authenticated as "john_doe"
    When I add "Content-Type" header equal to "application/ld+json"
    And I add "Accept" header equal to "application/ld+json"
    Then I send a "POST" request to "/api/commands" with body:
     """
     {
      "gg":"hhhh"
     }
     """
    Then the response status code should be 201
    And the response should be in JSON
    And the JSON matches expected template:
     """
     {
      "command": {
         "id":7,
         "secondaryId":"@string@",
         "totalAmount":10,
         "created":{
          "date":"@string@",
          "timezone_type":3,"timezone":"UTC"
          },
          "state":"ready"
       },
       "clientSecret":"@string@"
     }
     """
    Then The User cart is in pending state

  Scenario: Throw Error when Delete cartItem on pending cart
    Given I am authenticated as "john_doe"
    When I add "Content-Type" header equal to "application/ld+json"
    And I add "Accept" header equal to "application/ld+json"
    Then I send a "DELETE" request to "/api/shopping_cart_items/1"
    Then the response status code should be 406
    And the response should be in JSON
    And the JSON matches expected template:
    """
     {
     "@context":"\/api\/contexts\/ConstraintViolationList",
     "@type":"ConstraintViolationList",
     "hydra:title":"An error occurred",
     "hydra:description":"@string@",
     "violations":[
        {"propertyPath":"@string@","message":"@string@"}
      ]
     }
     """

   Scenario: Throw Error when Start Command with empty cart
     Given I am authenticated as "john_doe"
     When I add "Content-Type" header equal to "application/ld+json"
     And I add "Accept" header equal to "application/ld+json"
     Then I send a "POST" request to "/api/commands" with body:
     """
     {
      "gg":"hhhh"
     }
     """
     Then the response status code should be 400
     And the response should be in JSON
     And the JSON matches expected template:
     """
     {
     "@context":"\/api\/contexts\/ConstraintViolationList",
     "@type":"ConstraintViolationList",
     "hydra:title":"An error occurred",
     "hydra:description":"@string@",
     "violations":[
        {"propertyPath":"@string@","message":"@string@"}
      ]
     }
     """


