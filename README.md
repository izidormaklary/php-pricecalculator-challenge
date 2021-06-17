## Contributors
- Izidor Maklary
- Mari Mizutani

## Description


## The Mission

Make a price calculator with the following entities:
- Customer (Firstname, Lastname)
-  A customer group (Name)
- A product (product name, price in cents)



#### To calculate the price:
- [x]  For the customer group: In case of variable discounts look for highest discount of all the groups the user has.
- [x] If some groups have fixed discounts, count them all up.
- [x] Look which discount (fixed or variable) will give the customer the most value.
- [x] Now look at the discount of the customer.
- [x] In case both customer and customer group have a percentage, take the largest percentage.
- [x] First subtract fixed amounts, then percentages!
- [x] A price can never be negative.

## Must-have features
- [x] A dropdown where you can select a Product and a Customer and you get the basic information of the product + the price.
- [x] Use a [MVC pattern](https://en.wikipedia.org/wiki/Model%E2%80%93view%E2%80%93controller). You can use the [MVC Boilerplate](https://github.com/becodeorg/php-mvc-boilerplate).
- [x] Use separate objects for importing the entities with SQL, and for managing the entities.

## Nice to have features
- [ ] An actual login page for a customer
- [x] A table where you can see in detail how the price is calculated
- [x] The possibility to have different prices for different quantities (look, 1 EUR per item for 1, 0.9 EUR per item for 100, ...)
- [ ] A category page for the different products

  
  
  