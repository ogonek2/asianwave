<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormsParticipantFormsParticipantCategory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('forms_participant_forms_participant_category', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('forms_participants_id');
            $table->unsignedBigInteger('forms_participants_category_id');
            $table->timestamps();

            // Указываем кастомные имена внешних ключей
            $table->foreign('forms_participants_id', 'fp_fpc_participant_fk')
                ->references('id')->on('forms_participants')->onDelete('cascade');

            $table->foreign('forms_participants_category_id', 'fp_fpc_category_fk')
                ->references('id')->on('forms_participants_categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('forms_participant_forms_participant_category');
    }
}
