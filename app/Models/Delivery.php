<?php

namespace App\Models;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;

/**
 * @property int $id
 * @property int $company_id
 * @property float $weight
 * @property float $price
 * @property string $description
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @property-read Company $company
 */
class Delivery extends Model
{
	use HasFactory;

	protected $perPage = 10;

	protected $guarded = ["id"];

	public function company(): BelongsTo
	{
		return $this->belongsTo(Company::class);
	}

	public function scopeFilter(Builder $builder, ?Collection $data): LengthAwarePaginator
	{
		return $builder
			->when($data->get('company_id'), function (Builder $q, $company_id){
				$q->where('company_id', '=', $company_id);
			})
			->when($data->get('weight'), function (Builder $q, $weight){
				$q->where('weight', '=', $weight);
			})
			->when($data->get('price'), function (Builder $q, $price){
				$q->where('price', '=', $price);
			})
			->when(true, function (Builder $q) use ($data) {
				switch ($data->get('column', 'id')) {
					case 'id':
					case 'weight':
					case 'price':
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
