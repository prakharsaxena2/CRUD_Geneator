# CRUD_Generator
CRUD Geneator operation
# Step 1 — creating the project
Create a new Laravel project:

composer create-project laravel/laravel Contest

# Step 2 — setup
Connect your laravel application to a database and start the server.

# Step 3 — command creation
Here is where we start working on the artisan command for the CRUD generator.

Create a CRUD generator command: php artisan make:command CrudGenerator

If now you run: php artisan

You should have a new command available: command:name Command description

Of course the command is not setup yet and that’s why you see a default name and description.

Before we work on the command, we need some stubs or blueprints if you prefer.

# Step 4 — stubs
Copy the following stubs inside resources/stubs.

The stubs directory does not exist, so make sure you create it. Also, name the files with the headers below. Controller.stub, Model.stub and Request.stub.

# Step 5 — working on the generator
Let’s now work on the artisan console command that we created in step 3.

Open CrudGenerator.php. You can find the file inside app/Console/Commands.

Change signature and description as following:

protected $signature = 'crud:generator {name : Class (singular), e.g User}';

protected $description = 'Create CRUD operations';
The description is pretty straight forward.

Regarding the signature, we give it a name and we accept an argument that we call name.

The way you can call the command is like this:

php artisan crud:generator Car


Take a look at $modelTemplate. We use str_replace, to replace the placeholders inside the Model.stub file with our desired values.

Basically, in the case of the Model.stub file, we replace {{modelName}} with $name. Remember that name in the example above, is Car.

You can open Model.stub and do the math, wherever you see {{modelName}}, replace it with Car.

file_put_contents will simply create a new file where again we make use of $name, thus the file will be named Car.php and we pass to that file the content we get from $modelTemplate, which is the content of the Model.stub file, but with the placeholders replaced.

The same thing happens for controller and request. Thus, I will just paste the content for each function here.

Obviously we need to get the input that the user passed using the command, which in our case it will always be Car, we call the functions we explained above and at the end we create a route resource and we append it to the api.php file.

# Step 6 — running the command
Let’s give it a try now that we have everything setup.

Open a terminal and run:

php artisan crud:generator Car
