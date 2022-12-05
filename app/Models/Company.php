<?php

namespace App\Models;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;

/**
 * @property int $id
 * @property string $name
 * @property string $code
 * @property-read Carbon $created_at
 * @property-read Carbon $updated_at
 *
 * @property-read Delivery[] $deliveries
 *
 * @mixin Builder
 */
class Company extends Model
{
	use HasFactory;

	protected $perPage = 10;

	protected $guarded = ["id"];

	public function deliveries(): HasMany
	{
		return $this->hasMany(Delivery::class);
	}

	public function scopeFilter(Builder $builder, ?Collection $data): LengthAwarePaginator
	{
		return $builder
			->when(true, function (Builder $q) use ($data) {
				switch ($data->get('column', 'id')) {
					case 'id':
					case 'name':
					case 'created_at':
					case 'updated_at':
					default:
						$q->orderBy($data->get('column', 'id'), $data->get('order_by', 'desc'));
						break;
				}
			})
			->paginate($data->get('pagination'));
	}
}
