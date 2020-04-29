<?php

namespace Skoellen\LaravelOccasionManager\Tests;

use Illuminate\Database\Schema\Blueprint;
use Skoellen\LaravelOccasionManager\Models\Occasion;
use Orchestra\Testbench\TestCase as Orchestra;
use Carbon\Carbon;

abstract class TestCase extends Orchestra
{
    protected $testUser;

    protected $testOccasion;

    public function setUp(): void
    {
        parent::setUp();

        $this->setUpDatabase($this->app);

        $this->testUser = User::first();

        $this->testOccasion = Occasion::first();
    }

    protected function getPackageProviders($app)
    {
        return ['Skoellen\LaravelOccasionManager\LaravelOccasionManagerServiceProvider'];
    }

    protected function getPackageAliases($app)
    {
        return [
            'OccasionManager' => 'Skoellen\LaravelOccasionManager\Facades\OccasionManager'
        ];
    }

    /**
     * Set up the environment.
     *
     * @param \Illuminate\Foundation\Application $app
     */
    protected function getEnvironmentSetUp($app)
    {
        $app['config']->set('database.default', 'sqlite');
        $app['config']->set('database.connections.sqlite', [
            'driver'   => 'sqlite',
            'database' => ':memory:',
            'prefix'   => '',
        ]);
    }

    /**
     * Set up the database
     *
     * @param Illuminate\Foundation\Application $app
     */
    protected function setUpDatabase($app)
    {
        $app['db']->connection()->getSchemaBuilder()->create('users', function(Blueprint $table) {
            $table->increments('id');
            $table->string('email');
            $table->softDeletes();
        });

        include_once __DIR__ . '/../database/migrations/create_occasion_manager_tables.php.stub';

        (new \CreateOccasionManagerTables())->up();

        User::create(['email' => 'test@example.com']);
        Occasion::create([
            'start_date' => Carbon::parse('+10 days'),
            'end_date' => Carbon::parse('+15 days')
        ]);
    }
}
