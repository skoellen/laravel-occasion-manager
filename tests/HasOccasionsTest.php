<?php

namespace Skoellen\LaravelOccasionManager\Tests;

use Illuminate\Support\Collection;
use Skoellen\LaravelOccasionManager\Models\Occasion;
use Illuminate\Foundation\Testing\RefreshDatabase;

class HasOccasionsTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
        $this->testUser->occasions()->save($this->testOccasion);
    }

    /** @test */
    public function it_can_return_a_collection_of_associated_occasions()
    {
        $this->assertTrue($this->testUser->occasions instanceOf Collection);
    }

    /** @test */
    public function it_can_save_many_occasions_on_the_model()
    {
        $this->testUser->occasions()->saveMany([
            new Occasion(['start_date' => \Carbon\Carbon::parse('+15 days'), 'title' => 'First Occasion']),
            new Occasion(['start_date' => \Carbon\Carbon::parse('+2 months'), 'title' => 'Second Occasion'])
        ]);

        $this->assertDatabaseHas('occasions', ['start_date' => \Carbon\Carbon::parse('+15 days'), 'title' => 'First Occasion']);
        $this->assertDatabaseHas('occasions', ['start_date' => \Carbon\Carbon::parse('+2 months'), 'title' => 'Second Occasion']);
    }
}
