<?php

use App\Models\Company;
use App\Services\Company\CompanyService;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

return new class extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		DB::statement("ALTER TABLE companies AUTO_INCREMENT=1");

		foreach (CompanyService::COMPANIES as $code => $instance) {
			if (!Company::where('code', '=', $code)->first()) {
				Company::create([
					'name' => Str::ucfirst($code),
					'code' => Str::lower($code),
				]);
			}
		}
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{}
};
