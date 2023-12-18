<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();

            $table->foreignId('department_id')->nullable()->constrained('departments')->onDelete('cascade');
            $table->foreignId('attendance_shift_id')->nullable()->constrained('attendance_shifts')->onDelete('cascade');

            //Personal Info
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('position')->nullable();
            $table->string('email')->index()->unique();
            $table->string('phone')->nullable();
            $table->text('address')->nullable();

            //Education
            $table->boolean('has_education')->default(false)->nullable();
            $table->string('education_type')->nullable();
            $table->string('university')->nullable();
            $table->string('college')->nullable();
            $table->string('department')->nullable();

            //Nationality
            $table->string('nationality')->nullable();
            $table->string('national_id_type')->default('id');
            $table->string('national_id')->nullable();

            //CV & Links & Docs
            $table->boolean('has_links')->default(false)->nullable();
            $table->json('links')->nullable();

            //Accounting
            $table->double('salary')->default(0)->nullable();
            $table->double('salary_subscription')->default(0)->nullable();
            $table->double('salary_tax')->default(0)->nullable();
            $table->string('salary_period')->default('hour')->nullable();

            //Banking
            $table->boolean('has_bank_account')->default(0)->nullable();
            $table->string('bank_name')->nullable();
            $table->string('bank_branch')->nullable();
            $table->string('bank_iban')->nullable();
            $table->string('bank_swift')->nullable();
            $table->string('bank_account')->nullable();

            //Insurance
            $table->boolean('has_insurance')->default(0)->nullable();
            $table->string('insurance_number')->nullable();
            $table->boolean('has_medical_insurance')->default(0)->nullable();
            $table->string('medical_insurance_company')->nullable();
            $table->string('medical_insurance_number')->nullable();
            $table->date('medical_insurance_start_at')->nullable();
            $table->date('medical_insurance_end_at')->nullable();

            //Login
            $table->boolean('can_login')->default(false)->nullable();
            $table->string('password')->nullable();
            $table->string('otp_code')->nullable();

            //Last Payment
            $table->dateTime('last_payment')->nullable();

            //More Info About Employee
            $table->double('vacations')->default(15)->nullable();
            $table->date('contract_start')->nullable();
            $table->date('contract_end')->nullable();

            //Options
            $table->boolean('is_activated')->default(false)->nullable();
            $table->boolean('has_user')->default(false)->nullable();
            $table->foreignId('user_id')->nullable()->constrained('users');

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
