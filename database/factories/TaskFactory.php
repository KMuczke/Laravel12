<?php

namespace Database\Factories;

use App\Models\Activity;
use App\Models\Project;
use App\Models\Task;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    protected $model = Task::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Begin datum is een willekeurige datum in het verleden
        $begindate = Carbon::now()->subDays(random_int(1, 365));

        // End datum is 10 dagen na de begin datum (of null - 20% kans)
        $enddate = random_int(1, 5) > 1
            ? $begindate->copy()->addDays(10)
            : null;

        return [
            // Task moet tussen 10 en 200 karakters zijn
            'task' => $this->faker->realTextBetween(10, 200),

            // Begin en end date
            'begindate' => $begindate,
            'enddate' => $enddate,

            // User is standaard gekoppeld (maar kan null zijn via withoutUser())
            'user_id' => User::inRandomOrder()->first()->id,

            // Project is verplicht
            'project_id' => Project::inRandomOrder()->first()->id,

            // Activity is verplicht
            'activity_id' => Activity::inRandomOrder()->first()->id,
        ];
    }

    /**
     * Indicate that the task should not have a user.
     */
    public function withoutUser(): static
    {
        return $this->state(fn (array $attributes) => [
            'user_id' => null,
        ]);
    }

    public function withoutEndDate(): static
    {
        return $this->state(fn (array $attributes) => [
            'enddate' => null,
        ]);
    }
}
