
<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // User's name
            $table->string('email')->unique(); // Email (unique)
            $table->timestamp('email_verified_at')->nullable(); // Email verification timestamp
            $table->string('password'); // Password for authentication
            $table->string('address')->nullable(); // User's address (optional, can be null)
            $table->string('contact_number')->nullable(); // Contact number (optional)
            $table->text('other_details')->nullable(); // Additional details (optional, could be a note or other info)
            $table->rememberToken(); // Remember token for "Remember Me" functionality
            $table->timestamps(); // Timestamps for created_at and updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
