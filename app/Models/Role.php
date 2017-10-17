<?php

namespace App\Models;

use Alsofronie\Uuid\UuidModelTrait;
use App\Traits\Sugarize;
use App\Traits\Withable;
use EloquentFilter\Filterable;
use Nicolaslopezj\Searchable\SearchableTrait;
use Zizaco\Entrust\EntrustRole;

class Role extends EntrustRole {
	/**
	 * Use Uuid as primary key
	 */
	use UuidModelTrait;

	/**
	 * Enable role to be searchable
	 */
	use SearchableTrait;

	/**
	 * Make model to eager load defined relations
	 * @see App\Traits\Withable
	 */
	use Withable;

	/**
	 * Extend model query builder with english words
	 * @see App\Traits\Sugarize
	 */
	use Sugarize;

	/**
	 * Make a model filterable
	 * @see EloquentFilter\Filterable;
	 */
	use Filterable;

	/**
	 * default system roles
	 */
	const ADMINISTRATOR = 'Administrator';
	const APPLICANT = 'Applicant';
	const ORGANIZATION = 'Organization';

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'roles';

	/**
	 * The database primary key value.
	 *
	 * @var string
	 */
	protected $primaryKey = 'id';

	/**
	 * Relations to eager load
	 */
	protected $withables = ['perms'];

	/**
	 * Attributes that should be mass-assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'name',
		'display_name',
		'description',
	];

	/**
	 * Default values
	 */
	protected $attributes = [
		'restrict' => false,
	];

	/**
	 * The attributes that should be casted to native types.
	 *
	 * @var array
	 */
	protected $casts = [
		'created_at' => 'datetime',
		'updated_at' => 'datetime',
		'restrict' => 'boolean',
	];

	/**
	 * Searchable rules.
	 *
	 * @var array
	 */
	protected $searchable = [
		/**
		 * Columns and their priority in search results.
		 * Columns with higher values are more important.
		 * Columns with equal values have equal importance.
		 *
		 * @var array
		 */
		'columns' => [
			'roles.name' => 10,
			'roles.display_name' => 10,
			'roles.description' => 8,
		],
	];

}
