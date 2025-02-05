<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('projects', function (Blueprint $table) {
            // Adding new fields
            $table->date('start_date')->nullable()->after('name');
            $table->date('end_date')->nullable()->after('start_date');
            $table->string('project_code')->unique()->after('end_date');
            $table->decimal('budget', 15, 2)->nullable()->after('project_code');
            $table->string('budget_currency')->nullable()->after('budget');
            $table->boolean('is_hrp_project')->default(false)->after('budget_currency');
            $table->string('hrp_code')->nullable()->after('is_hrp_project');
            $table->string('activity_type')->nullable()->after('hrp_code');
            $table->json('activities')->nullable()->after('activity_type');
            $table->string('project_donor')->nullable()->after('activities');
            $table->json('other_donors')->nullable()->after('project_donor');
            $table->boolean('has_partners')->default(false)->after('other_donors');
            $table->unsignedBigInteger('partner_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('projects', function (Blueprint $table) {
            
            // Then drop the columns
            $table->dropColumn([
                'start_date',
                'end_date',
                'project_code',
                'budget',
                'budget_currency',
                'is_hrp_project',
                'hrp_code',
                'activity_type',
                'activities',
                'project_donor',
                'other_donors',
                'has_partners',
                'partner_id',
            ]);
        });
    }
};
