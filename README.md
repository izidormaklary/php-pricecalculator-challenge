## The Mission

Make a price calculator with the following entities:
- Customer (Firstname, Lastname)
-  A customer group (Name)
- A product (product name, price in cents)



#### To calculate the price:
- [ ]  For the customer group: In case of variable discounts look for highest discount of all the groups the user has.
- [ ] If some groups have fixed discounts, count them all up.
- [ ] Look which discount (fixed or variable) will give the customer the most value.
- [ ] Now look at the discount of the customer.
- [ ] In case both customer and customer group have a percentage, take the largest percentage.
- [ ] First subtract fixed amounts, then percentages!
- [ ] A price can never be negative.

## Must-have features
- [ ] A dropdown where you can select a Product and a Customer and you get the basic information of the product + the price.
- [ ] Use a [MVC pattern](https://en.wikipedia.org/wiki/Model%E2%80%93view%E2%80%93controller). You can use the [MVC Boilerplate](https://github.com/becodeorg/php-mvc-boilerplate).
- [ ] Use separate objects for importing the entities with SQL, and for managing the entities.

## Nice to have features
- [ ] An actual login page for a customer
- [ ] A table where you can see in detail how the price is calculated
- [ ] The possibility to have different prices for different quantities (look, 1 EUR per item for 1, 0.9 EUR per item for 100, ...)
- [ ] A category page for the different products
