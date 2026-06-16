<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SaeAuthenticationTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test login page is accessible to guests.
     */
    public function test_login_page_is_accessible_to_guests(): void
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
        $response->assertSee('Acesse sua Conta');
    }

    /**
     * Test dashboard redirects unauthenticated users.
     */
    public function test_dashboard_redirects_guests_to_login(): void
    {
        $response = $this->get('/dashboard');

        $response->assertRedirect('/login');
    }

    /**
     * Test common user role access permissions.
     */
    public function test_common_user_can_access_dashboard_and_read_routes_but_not_user_management(): void
    {
        $user = User::create([
            'name' => 'Comum User',
            'email' => 'comum@sae.com',
            'password' => bcrypt('senha123'),
            'role' => 'user',
        ]);

        // Access Dashboard
        $response = $this->actingAs($user)->get('/dashboard');
        $response->assertStatus(200);
        $response->assertSee('Comum User');

        // Access Staff List (Read)
        $response = $this->actingAs($user)->get('/staff');
        $response->assertStatus(200);

        // Try to access User Management (Should be Forbidden 403)
        $response = $this->actingAs($user)->get('/users');
        $response->assertStatus(403);
    }

    /**
     * Test admin role access permissions.
     */
    public function test_admin_can_access_dashboard_but_not_user_management(): void
    {
        $admin = User::create([
            'name' => 'Admin User',
            'email' => 'admin@sae.com',
            'password' => bcrypt('senha123'),
            'role' => 'admin',
        ]);

        // Access Dashboard
        $response = $this->actingAs($admin)->get('/dashboard');
        $response->assertStatus(200);

        // Access Staff List
        $response = $this->actingAs($admin)->get('/staff');
        $response->assertStatus(200);

        // Try to access User Management (Should be Forbidden 403)
        $response = $this->actingAs($admin)->get('/users');
        $response->assertStatus(403);
    }

    /**
     * Test owner role access permissions.
     */
    public function test_owner_has_full_access_including_user_management(): void
    {
        $owner = User::create([
            'name' => 'Owner User',
            'email' => 'owner@sae.com',
            'password' => bcrypt('senha123'),
            'role' => 'owner',
        ]);

        // Access Dashboard
        $response = $this->actingAs($owner)->get('/dashboard');
        $response->assertStatus(200);

        // Access User Management (Should be Allowed 200)
        $response = $this->actingAs($owner)->get('/users');
        $response->assertStatus(200);
    }
}
