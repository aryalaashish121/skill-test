## Start
You can use whatever you like to get the site up and running. However it's ready to use Laravel Sail at port 48055.
Check out Laravel Sail [here](https://laravel.com/docs/9.x/sail) if needed to.

## Requirements
This is just a stupid application using Laravel/Vue/Inertia/Tailwind CSS. You can think of it as a dummy admin panel.

What I have done right now is to build out a way to view, create and update categories. I would like you to continue on this app to add Products as well.

It's important for me that you are using the same structure in code as I have done for the Categories. I'm using a thing called "Actions" and you can
read more about them [here](https://stitcher.io/blog/laravel-beyond-crud-03-actions). The reason for Actions is to not have a bunch of code in controllers.
The business logic should be in the actions.

Controllers are only allowed to use the function index, create, store, edit, update and destroy. Do not want functions like getSomeCategories or other methods.
If you can not use only these methods you can create a new controller. Look at Adam Wathan talk about this [here](https://www.youtube.com/watch?v=MF0jFKvS4SI).

Follow the same structure on front end as I have been doing.

## Todo

* Create a new model called Product and build out the UI and everything to be able to create, update, view and delete products. A product should have
 - A title
 - A description
 - What category (dropdown from the categories table)
 - A price
 - In stock (true/false) - (radio button)
 - An image.
* Make sure that there is some success UI to know that you have successfully created, updated or deleted the product.
* Add the success UI to categories as well.
* Create tests for the store, update and delete route.
* Send all of your code as a Pull request to this repository.

I have created a video for the requirements as well that you can find [here](https://www.loom.com/share/7703f076ac3145fba07c901e81e39143).
