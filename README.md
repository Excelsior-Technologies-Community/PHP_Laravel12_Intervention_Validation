# PHP_Laravel12_Intervention_Validation
Complete step-by-step implementation of form validation in Laravel, including basic validation, Form Request validation, manual validation, and custom validation rules.

This project demonstrates:

* Server-side validation using Request
* Custom validation messages
* Form repopulation after validation errors
* Form Request classes
* Manual Validator usage
* Custom validation rules
* Bootstrap UI integration

---

## Step 1: Create a New Laravel Project

```bash
composer create-project laravel/laravel validation-demo
cd validation-demo
```

---

## Step 2: Configure Database (Optional)

Edit `.env` file:

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=validation_demo
DB_USERNAME=root
DB_PASSWORD=
```

Run migration later if saving data.

---

## Step 3: Create Model and Migration

```bash
php artisan make:model User -m
```

Edit migration file:

`database/migrations/xxxx_xx_xx_xxxxxx_create_users_table.php`

```php
public function up()
{
    Schema::create('users', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->string('email')->unique();
        $table->string('phone')->nullable();
        $table->integer('age');
        $table->text('bio')->nullable();
        $table->timestamps();
    });
}
```

Run migration:

```bash
php artisan migrate
```

---

## Step 4: Create Controller

```bash
php artisan make:controller UserController
```

Validation using Request inside controller:

```php
public function store(Request $request)
{
    $validatedData = $request->validate([
        'name' => 'required|string|max:255|min:2',
        'email' => 'required|email|unique:users,email|max:255',
        'phone' => 'nullable|numeric|digits_between:10,15',
        'age' => 'required|integer|min:18|max:100',
        'bio' => 'nullable|string|max:500',
    ]);

    User::create($validatedData);

    return redirect()->route('users.create')
        ->with('success', 'User created successfully!');
}
```

---

## Step 5: Create Routes

Edit `routes/web.php`:

```php
Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
Route::post('/users', [UserController::class, 'store'])->name('users.store');
```

---

## Step 6: Create Views

Layout file:

`resources/views/layouts/app.blade.php`

Includes:

* Bootstrap 5 CDN
* Navbar
* Success message display
* Yield content section

User form:

`resources/views/users/create.blade.php`

Features:

* Old input repopulation using old()
* Error highlighting using @error
* Validation error messages display
* Validation rules summary card

---

## Step 7: Advanced Validation Using Form Request

Create form request:

```bash
php artisan make:request StoreUserRequest
```

Edit `app/Http/Requests/StoreUserRequest.php`:

```php
public function rules()
{
    return [
        'name' => 'required|string|max:255|min:2',
        'email' => 'required|email|unique:users,email|max:255',
        'phone' => 'nullable|numeric|digits_between:10,15',
        'age' => 'required|integer|min:18|max:100',
        'bio' => 'nullable|string|max:500',
    ];
}

public function messages()
{
    return [
        'name.required' => 'Please enter your full name.',
        'name.min' => 'Name must be at least 2 characters.',
        'email.required' => 'Email address is required.',
        'email.email' => 'Please enter a valid email address.',
        'email.unique' => 'This email is already registered.',
        'age.min' => 'You must be at least 18 years old.',
        'age.max' => 'Age cannot exceed 100 years.',
    ];
}
```

Update controller:

```php
public function store(StoreUserRequest $request)
{
    User::create($request->validated());

    return redirect()->route('users.create')
        ->with('success', 'User created successfully!');
}
```

---

## Step 8: Manual Validation Using Validator

Alternative method inside controller:

```php
$validator = Validator::make($request->all(), [
    'name' => 'required|string|max:255|min:2',
    'email' => 'required|email|unique:users,email|max:255',
    'phone' => 'nullable|numeric|digits_between:10,15',
    'age' => 'required|integer|min:18|max:100',
    'bio' => 'nullable|string|max:500',
]);

if ($validator->fails()) {
    return redirect()->route('users.create')
        ->withErrors($validator)
        ->withInput();
}

User::create($validator->validated());
```

---

## Step 9: Custom Validation Rule

Create custom rule:

```bash
php artisan make:rule Uppercase
```

Edit `app/Rules/Uppercase.php`:

```php
public function passes($attribute, $value)
{
    return strtoupper($value) === $value;
}

public function message()
{
    return 'The :attribute must be uppercase.';
}
```

Use inside validation:

```php
'name' => ['required', new Uppercase, 'max:255'],
```

---

## Step 10: Run the Application

```bash
php artisan serve
```

Visit:

[http://localhost:8000/users/create](http://localhost:8000/users/create)
<img width="1719" height="485" alt="image" src="https://github.com/user-attachments/assets/97464a89-cfb5-445e-b480-49e95be50f36" />

---

## Validation Rules Used

* required
* string
* max:255
* min:2
* email
* unique:users,email
* nullable
* numeric
* digits_between:10,15
* integer
* min:18
* max:100

---

## Conclusion

This project demonstrates complete Laravel validation workflow including:

* Basic validation
* Advanced Form Request validation
* Manual validation handling
* Custom validation rules
* Error messaging
* Form repopulation
* Bootstrap UI integration

It is ideal for learning Laravel validation concepts and implementing secure server-side form validation in real-world applications.

