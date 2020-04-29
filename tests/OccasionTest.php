<?php

namespace Skoellen\LaravelOccasionManager\Tests;

use Illuminate\Support\Carbon;
use Skoellen\LaravelOccasionManager\Tests\TestCase;
use Skoellen\LaravelOccasionManager\Models\Occasion;
use Illuminate\Foundation\Testing\RefreshDatabase;

class OccasionTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_start_date_will_be_returned_as_a_datetime()
    {
        $this->assertTrue($this->testOccasion->start_date instanceOf Carbon);
    }

    /** @test */
    public function an_end_date_will_be_returned_as_a_datetime()
    {
        $this->assertTrue($this->testOccasion->end_date instanceof Carbon);
    }

    /** @test */
    public function it_can_utilize_active_scope_for_querying_models()
    {
        // The occasion is true by default in if not overwritten
        $occasion = Occasion::active()->first();

        $this->assertTrue($occasion->id === $this->testOccasion->id);

        $this->testOccasion->active = false;
        $this->testOccasion->save();

        $occasion = Occasion::active()->first();
        $this->assertTrue($occasion === null);
    }

    /** @test */
    public function it_can_return_an_owning_model()
    {
        $this->testUser->occasions()->save($this->testOccasion);

        $occasion = $this->testOccasion->occasionable;

        $this->assertTrue($occasion->id === $this->testUser->occasions()->first()->id);
    }
}
