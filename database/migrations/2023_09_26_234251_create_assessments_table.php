<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assessments', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->string('image');
            $table->string('url');
            $table->timestamps();
        });

        \App\Models\Assessments::create([
            'title' => 'Burnout Scale Assessment',
            'description' => 'Take our Burnout Self-Assessment Quiz to gain insights into your current well-being.',
            'image' => 'https://picsum.photos/150?random=1',
            'url' => 'https://ik5dz7zx2sr.typeform.com/to/S1insKbw'
        ]);

        \App\Models\Assessments::create([
            'title' => 'Kessler Psychological Distress Scale (K10)',
            'description' => 'Measure your psychological distress.',
            'image' => 'https://picsum.photos/150?random=2',
            'url' => 'https://ik5dz7zx2sr.typeform.com/to/Kf7tHTpY'
        ]);

        \App\Models\Assessments::create([
            'title' => 'Patient Health Questionnaire-9 (PHQ-9)',
            'description' => 'Take our Patient Health Questionnaire to gain insights into your current well-being.',
            'image' => 'https://picsum.photos/150?random=3',
            'url' => 'https://ik5dz7zx2sr.typeform.com/to/M3Re1bCo'
        ]);

        \App\Models\Assessments::create([
            'title' => 'Generalised Anxiety Disorder-7 Scale (GAD-7)',
            'description' => 'Take our Anxiety Self-Assessment Quiz to gain insights into your current well-being.',
            'image' => 'https://picsum.photos/150?random=4',
            'url' => 'https://ik5dz7zx2sr.typeform.com/to/uNt4U4Sp'
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('assessments');
    }
};
