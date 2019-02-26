<?php
namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Log;
use App\Doctor;
use App\Patient;

class RegisterationTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_a_doctor_can_register()
    {
        $response = $this->json('POST', '/register', [
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'password' => 'super-secret',
            'password_confirmation' => 'super-secret',
            'type' => 'doctor',
            'specialty' => 'General Surgery'
        ]);
        
        Log::info("hhhjjj");
        $response->assertStatus(302);
        
        $response->assertRedirect('/home');
        
        $user = User::first();
        $doctor = Doctor::first();
        
        $this->assertNotNull($user);
        $this->assertNotNull($doctor);
        $this->assertEquals('General Surgery', $doctor->specialty);
        $this->assertEquals('General Surgery', $user->specialty);
    }
    
    
    /**
     * A basic test example.
     *
     * @return void
     */
    public function a_patient_can_register()
    {
        $response = $this->json('POST', '/register', [
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'password' => 'super-secret',
            'password_confirmation' => 'super-secret',
            'type' => 'patient',
            'preferred_pharmacy' => 'Walgreens'
        ]);
        
        $response->assertStatus(302);
        
        $response->assertRedirect('/home');
        
        $user = User::first();
        $patient = Patient::first();
        
        $this->assertNotNull($user);
        $this->assertNotNull($patient);
        $this->assertEquals('Walgreens', $patient->specialty);
        $this->assertEquals('Walgreens', $user->specialty);
    }
}
