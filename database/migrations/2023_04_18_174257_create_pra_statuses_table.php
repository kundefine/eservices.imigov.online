<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePraStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pra_statuses', function (Blueprint $table) {
            $table->id();
            $table->string('application_no')->nullable();
            $table->string('employer_identification_card_no')->nullable();
            $table->string('company_registration_no')->nullable();
            $table->string('employee_name')->nullable();
            $table->string('document_no')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pra_statuses');
    }
}
