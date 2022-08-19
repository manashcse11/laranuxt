<?php

namespace Tests\Feature;

use App\Models\Experience;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExperienceTest extends TestCase
{
    use RefreshDatabase;

    public function testStoreResource()
    {
        $response = $this->postJson('experiences', [
            'job_title' => 'Job title',
            'company_name' => 'Company name',
            'city' => 'City',
            'country' => 'Country',
            'start_date' => '2018-06-01',
            'end_date' => '',
        ]);
        $response->assertStatus(200)
            ->assertJson(['status' => 'success']);
    }

    public function testResponseAllResource()
    {
        $experiences = Experience::factory()->count(3)->create();
        $response = $this->getJson('experiences');
        $response->assertStatus(200)
            ->assertJson(['status' => 'success', 'data' => $experiences->toArray()])
            ->assertJsonCount(3, 'data');
    }

    public function testResponseSingleResource()
    {
        $experiences = Experience::factory()->count(3)->create();
        $response = $this->getJson('experiences/' . $experiences->toArray()[0]['id']);
        $response->assertStatus(200)
            ->assertJson(['status' => 'success', 'data' => $experiences->toArray()[0]]);
    }

    public function testUpdateResource()
    {
        $experience = ['job_title' => 'Job title new',
            'company_name' => 'Company name',
            'city' => 'City',
            'country' => 'Country',
            'start_date' => '2018-06-01',
            'end_date' => ''];
        $experiences = Experience::factory()->count(3)->create();
        $response = $this->putJson('experiences/' . $experiences->toArray()[0]['id'], $experience);
        $response->assertStatus(200)
            ->assertJson(['status' => 'success']);
    }

    public function testDeleteResource()
    {
        $experiences = Experience::factory()->count(3)->create();
        $response = $this->deleteJson('experiences/' . $experiences->toArray()[0]['id']);
        $response->assertStatus(200);
    }
}
