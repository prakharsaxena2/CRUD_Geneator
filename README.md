# CRUD_Geneator
CRUD Geneator operation
Step 1 — creating the project
Create a new Laravel project:

composer create-project laravel/laravel Contest

Step 2 — setup
Connect your laravel application to a database and start the server.

Step 3 — command creation
Here is where we start working on the artisan command for the CRUD generator.

Create a CRUD generator command: php artisan make:command CrudGenerator

If now you run: php artisan

You should have a new command available: command:name Command description

Of course the command is not setup yet and that’s why you see a default name and description.

Before we work on the command, we need some stubs or blueprints if you prefer.

Step 4 — stubs
Copy the following stubs inside resources/stubs.

The stubs directory does not exist, so make sure you create it. Also, name the files with the headers below. Controller.stub, Model.stub and Request.stub.

As you can see below, the stub files have placeholders which we are going to replace later with real data.

Controller.stub
<?php
    namespace App\Http\Controllers;

    use App\Http\Requests\{{modelName}}Request;
    use App\{{modelName}};

    class {{modelName}}Controller extends Controller
    {
        public function index()
        {
            ${{modelNamePluralLowerCase}} = {{modelName}}::latest()->get();
            return response()->json(${{modelNamePluralLowerCase}});
        }
        public function store({{modelName}}Request $request)
        {
            ${{modelNameSingularLowerCase}} = {{modelName}}::create($request->all());
            return response()->json(${{modelNameSingularLowerCase}}, 201);
        }
        public function show($id)
        {
            ${{modelNameSingularLowerCase}} = {{modelName}}::findOrFail($id);
            return response()->json(${{modelNameSingularLowerCase}});
        }
        public function update({{modelName}}Request $request, $id)
        {
            ${{modelNameSingularLowerCase}} = {{modelName}}::findOrFail($id);
            ${{modelNameSingularLowerCase}}->update($request->all());
            return response()->json(${{modelNameSingularLowerCase}}, 200);
        }
        public function destroy($id)
        {
            {{modelName}}::destroy($id);
            return response()->json(null, 204);
        }
    }
Model.stub
<?php
    namespace App;

    use Illuminate\Database\Eloquent\Model;

    class {{modelName}} extends Model
    {
        protected $guarded = ['id'];
    }
Request.stub
<?php
    namespace App\Http\Requests;

    use Illuminate\Foundation\Http\FormRequest;

    class {{modelName}}Request extends FormRequest
    {
        public function authorize()
        {
            return true;
        }
        public function rules()
        {
            return [];
        }
    }
This is how your resources directory should look:



Step 5 — working on the generator
Let’s now work on the artisan console command that we created in step 3.

Open CrudGenerator.php. You can find the file inside app/Console/Commands.

Change signature and description as following:

protected $signature = 'crud:generator {name : Class (singular), e.g User}';

protected $description = 'Create CRUD operations';
The description is pretty straight forward.

Regarding the signature, we give it a name and we accept an argument that we call name.

The way you can call the command is like this:

php artisan crud:generator Car

Cool, now let’s create a function to get the stub we need.

protected function getStub($type)
{
    return file_get_contents(resource_path("stubs/$type.stub"));
}
getStub simply takes the type we are looking for and returns the content of the stub file.

Next, let’s take a look on how we can create a model using the stub inside resources/stubs.

protected function model($name)
{
    $modelTemplate = str_replace(
        ['{{modelName}}'],
        [$name],
        $this->getStub('Model')
    );

    file_put_contents(app_path("/{$name}.php"), $modelTemplate);
}
As you can see, the model function simply takes the name we pass through the command.

Take a look at $modelTemplate. We use str_replace, to replace the placeholders inside the Model.stub file with our desired values.

Basically, in the case of the Model.stub file, we replace {{modelName}} with $name. Remember that name in the example above, is Car.

You can open Model.stub and do the math, wherever you see {{modelName}}, replace it with Car.

file_put_contents will simply create a new file where again we make use of $name, thus the file will be named Car.php and we pass to that file the content we get from $modelTemplate, which is the content of the Model.stub file, but with the placeholders replaced.

The same thing happens for controller and request. Thus, I will just paste the content for each function here.

protected function controller($name)
{
    $controllerTemplate = str_replace(
        [
            '{{modelName}}',
            '{{modelNamePluralLowerCase}}',
            '{{modelNameSingularLowerCase}}'
        ],
        [
            $name,
            strtolower(str_plural($name)),
            strtolower($name)
        ],
        $this->getStub('Controller')
    );

    file_put_contents(app_path("/Http/Controllers/{$name}Controller.php"), $controllerTemplate);
}
protected function request($name)
{
    $requestTemplate = str_replace(
        ['{{modelName}}'],
        [$name],
        $this->getStub('Request')
    );

    if(!file_exists($path = app_path('/Http/Requests')))
        mkdir($path, 0777, true);

    file_put_contents(app_path("/Http/Requests/{$name}Request.php"), $requestTemplate);
}
Great, until now we took a look at our helper protected functions.

Now inside handle(), we simply call them.

public function handle()
{
    $name = $this->argument('name');

    $this->controller($name);
    $this->model($name);
    $this->request($name);

    File::append(base_path('routes/api.php'), 'Route::resource(\'' . str_plural(strtolower($name)) . "', '{$name}Controller');");
}
Obviously we need to get the input that the user passed using the command, which in our case it will always be Car, we call the functions we explained above and at the end we create a route resource and we append it to the api.php file.

Step 6 — running the command
Let’s give it a try now that we have everything setup.

Open a terminal and run:

php artisan crud:generator Car
