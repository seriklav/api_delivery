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
	public function up(): void
	{
		Schema::create('deliveries', function (Blueprint $table) {
			$table->id();

			$table->foreignId('company_id')
				->comment("Transfer company")
				->unsigned()
				->constrained('companies')
				->cascadeOnUpdate()
				->cascadeOnDelete();

			$table->float('weight')->comment('Package weight');
			$table->float('price')->comment('Delivery price');
			$table->string('description')->nullable()->comment('Description');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down(): void
	{
		Schema::dropIfExists('deliveries');
	}
};
