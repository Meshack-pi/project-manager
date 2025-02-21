<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        // Drop foreign key constraint before dropping the table
        Schema::table('ticket_hours', function (Blueprint $table) {
            $table->dropForeign(['activity_id']); // Drop the foreign key
            $table->dropColumn('activity_id'); // Remove the column if necessary
        });

        // Now drop the 'activities' table
        Schema::dropIfExists('activities');
    }

    public function down(): void
    {
        // Optional: Restore the table if needed
    }
};
