<?php

use App\Models\User;


it('creates a new user', function () {

    \Illuminate\Support\Facades\Artisan::call('db:seed');

    // Donnees du nouvel utilisateur
    $userData = [
        'name' => 'John Doe',
        'email' => 'john@example.com',
        'password' => 'password',
        'password_confirmation' => 'password'
    ];

    // Envoyer une requête pour créer un nouvel utilisateur
    $response = $this->post('/register', $userData);

    // Vérifier que l'utilisateur a été créé dans la base de données
    $this->assertDatabaseHas('users', [
        'email' => 'john@example.com',
    ]);

    // Vérifier que l'utilisateur est redirigé vers une page de confirmation ou de succès
    $response->assertRedirect('/dashboard');

    // Vérifier que l'utilisateur est authentifié
    $this->assertAuthenticated();

    $response->assertStatus(302);
});

it('SuperAdmin can log to admistration dashboard', function () {
//    $this->seed(\Database\Seeders\LaratrustSeeder::class);
    $user = User::find(1);
    $name = 'superadministrator';
    $superAdmin = \App\Models\Role::where('name', $name)->first();

    $user->addRole($superAdmin);

    $this->actingAs($user)->get('login')->assertRedirect('admin/dashboard');

});

it('Admin can log to admistration dashboard', function () {
    //    $this->seed(\Database\Seeders\LaratrustSeeder::class);
    $user = User::find(1);
    $name = 'administrator';
    $superAdmin = \App\Models\Role::where('name', $name)->first();

    $user->addRole($superAdmin);

    $this->actingAs($user)->get('login')->assertRedirect('admin/dashboard');

});

it('User can log to user dashboard', function () {
    //    $this->seed(\Database\Seeders\LaratrustSeeder::class);
    $user = User::find(1);
    $name = 'user';
    $superAdmin = \App\Models\Role::where('name', $name)->first();

    $user->addRole($superAdmin);

    $this->actingAs($user)->get('login')->assertRedirect('dashboard');

});

it('user cannot login with incorrect ', function () {
    // Effectuer une requête POST pour se connecter avec des identifiants incorrects
    $response = $this->post('/login', [
        'email' => 'test@example.com',
        'password' => 'wrongpassword',
    ]);

    // Vérifier que l'utilisateur n'est pas redirigé après une tentative de connexion infructueuse
    $response->assertSessionHasErrors(['email' => 'These credentials do not match our records.']);

    // Vérifier que l'utilisateur n'est pas authentifié
//    $this->assertGuest();
});

