<?php

namespace App\Models;

use Alsofronie\Uuid\UuidModelTrait;
use App\Traits\ActAsApplicant;
use App\Traits\ActAsOrganization;
use App\Traits\Countable;
use App\Traits\Sugarize;
use App\Traits\Withable;
use Carbon\Carbon;
use Collective\Html\Eloquent\FormAccessible;
use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Nicolaslopezj\Searchable\SearchableTrait;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\Interfaces\HasMedia;
use Zizaco\Entrust\Traits\EntrustUserTrait;

class User extends Authenticatable implements AuditableContract, HasMedia {
	/**
	 * Use notifiable
	 */
	use Notifiable;

	/**
	 * Use Uuid as primary key
	 */
	use UuidModelTrait;

	/**
	 * Enable user to be searchable
	 */
	use SearchableTrait;

	/**
	 * give user roles and permissions
	 */
	use EntrustUserTrait {
		restore as _restore;
	}

	/**
	 * Make user auditable
	 */
	use Auditable;

	/**
	 * Allow user to have attached files(media) i.e avatar etc
	 */
	use HasMediaTrait;

	/**
	 * Provide access to form accessor
	 */
	use FormAccessible;

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
	 * Do not actually remove the model from the database.
	 */
	use SoftDeletes {
		restore as __restore;
	}

	/**
	 * Extend user with applicant capabilities
	 */
	use ActAsApplicant;

	/**
	 * Extend user with organization capabilities
	 */
	use ActAsOrganization;

	/**
	 * Scope a query with field to count
	 */
	use Countable;

	/**
	 * Type of users
	 */
	const TYPE_ORGANIZATION = 'Organization';
	const TYPE_APPLICANT = 'Applicant';
	const TYPE_APPLICANT_NOT_APPLIED = 'Applicant Not Applied';
	const TYPE_APPLICANT_APPLIED = 'Applicant Applied';
	const TYPE_HR_AGENCY = 'Human Resource Agency';
	const TYPE_NORMAL = 'Normal';
	const TYPES = [
		self::TYPE_APPLICANT => self::TYPE_APPLICANT,
		self::TYPE_APPLICANT_APPLIED => self::TYPE_APPLICANT_APPLIED,
		self::TYPE_APPLICANT_NOT_APPLIED => self::TYPE_APPLICANT_NOT_APPLIED,
		self::TYPE_HR_AGENCY => self::TYPE_HR_AGENCY,
		self::TYPE_ORGANIZATION => self::TYPE_ORGANIZATION,
		self::TYPE_NORMAL => self::TYPE_NORMAL,
	];

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The database primary key value.
	 *
	 * @var string
	 */
	protected $primaryKey = 'id';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'type',
		'name',
		'first_name',
		'middle_name',
		'surname',
		'email',
		'secondary_email',
		'website',
		'mobile',
		'alternative_mobile',
		'landline',
		'fax',
		'physical_address',
		'postal_address',
		'summary',
		'password',
		'avatar',
		'verified',

		//applicant specific
		'gender',
		'dob',
		'marital_status',
		'skills',
		'interests',
		'hobbies',
		'extracurricular_activities',

		//organization specific
		'sector',
		'contact_person',
		'slug',

		//location specific
		'country',
		'state',
	];

	/**
	 * The attributes that should be hidden for arrays.
	 *
	 * @var array
	 */
	protected $hidden = [
		'password', 'remember_token',
	];

	/**
	 * The attributes that should be casted to native types.
	 *
	 * @var array
	 */
	protected $casts = [
		'created_at' => 'datetime',
		'updated_at' => 'datetime',
		'deleted_at' => 'datetime',
		'dob' => 'date',
		'verified' => 'boolean',
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
			'users.name' => 10,
			'users.first_name' => 10,
			'users.middle_name' => 10,
			'users.surname' => 10,
			'users.gender' => 10,
			'users.marital_status' => 10,
			'users.email' => 10,
			'users.secondary_email' => 10,
			'users.mobile' => 10,
			'users.alternative_mobile' => 10,
			'users.landline' => 8,
			'users.fax' => 5,
			'users.postal_address' => 5,
			'users.physical_address' => 5,
			'users.skills' => 5,
			'users.interests' => 5,
			'users.hobbies' => 5,
			'users.extracurricular_activities' => 5,
			'users.country' => 10,
			'users.state' => 10,
			'users.contact_person' => 5,
		],
	];

	/**
	 * Convert a DateTime to a storable string.
	 *
	 * @param  \DateTime|int|string  $value
	 * @return string
	 * @override
	 */
	public function fromDateTime($value) {
		try {
			if (is_string($value)) {
				$value = Carbon::createFromFormat(config('app.datepicker_parse_format'), $value);
			}
			return $value;
		} catch (\Exception $e) {
			return parent::fromDateTime($value);
		}
	}

	/**
	 * Override parent(s) restores
	 */
	public function restore() {
		$this->_restore();
		$this->__restore();
	}

	/**
	 * Build user avatar url
	 */


	public function avatar() {
		//generate user avatar
		$avatar = url('/images/avatar.png');

		//try obtain custom uploaded avatar
		$media = $this->getMedia('avatars')->first();
		if ($media) {
			$avatar = asset('storage/' . $media->id . '/' . $media->file_name);
		}
		// $avatar = url('/images/avatar.png');

		//use social media or default avatar
		// if (!is_set($avatar)) {
		// 	if (property_exists($this, 'avatar')) {
		// 		$avatar = is_set($this->avatar) ? $this->avatar : url('/images/avatar.png');
		// 	} else {
		// 		$avatar = url('/images/avatar.png');
		// 	}
		// }

		return $avatar;
	}

	public function getAvatarAttribute() {
		return $this->avatar();
	}


	 // TODO detach organization logo from the user model
	public function organizationLogo(){
		//generate organization logo
		$logo = '';

		//try obtain custom uploaded logo
		$media = $this->getMedia('avatars')->first();
		if ($media) {
			$logo = asset('storage/' . $media->id . '/' . $media->file_name);
		}

		//use social media or default avatar
		if (!is_set($logo)) {
			if (property_exists($this, 'avatar')) {
				$logo = is_set($this->logo) ? $this->logo : url('/images/companylogo.png');
			} else {
				$logo = url('/images/companylogo.png');;
			}
		}

		return $logo;
	}

	/**
	 * Get and format the user's dob for forms.
	 *
	 * @param  string  $value
	 * @return string
	 * @see https://laravelcollective.com/docs/5.4/html#form-model-binding
	 */
	public function formDobAttribute($value) {
		if (is_set($value)) {
			$value = Carbon::parse($value);
			$value = $value->format(config('app.datepicker_parse_format'));
		}
		return $value;
	}

	/**
	 * Derive full user name
	 * @return sting
	 */
	public function fullName() {
		//to honour cv edits
		if (is_set($this->first_name)) {
			return $this->first_name . ' ' . $this->middle_name . ' ' . $this->surname;
		}

		return $this->name;
	}

	/**
	 * Compute user(member) age
	 * @return [type] [description]
	 */
	public function age() {
		$age = 0;
		if (is_set($this->dob)) {
			$age = Carbon::now()->diffInYears($this->dob);
		}
		return $age;
	}

	//-------------------------------------------------------------
	//relations
	//-------------------------------------------------------------

	/**
	 * Auditable Model audits.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\MorphMany
	 */
	public function audits() {
		return $this->morphMany('App\Audit', 'auditable');
	}

	//-------------------------------------------------------------
	//class methods
	//-------------------------------------------------------------

	/**
	 * Strip unwanted avatar url extra & return url to obtain
	 * original user profile avatar
	 * @param  [string] $avatar   [description]
	 * @param  [string] $provider [description]
	 * @return [string]           [description]
	 */
	public static function getProviderOriginalAvatar($avatar, $provider) {

		if ($avatar && $provider) {
			if ($provider == 'google') {
				$avatar = str_replace('?sz=50', '', $avatar);
			} elseif ($provider == 'twitter') {
				$avatar = str_replace('_normal', '', $avatar);
			} elseif ($provider == 'facebook') {
				$avatar = str_replace('type=normal', 'type=large', $avatar);
			}
		}

		return $avatar;
	}

	/**
	 * create user from social provider
	 * @param  [Object] $user social user
	 * @return [User]
	 */
	public static function findOrCreateByProvider($provider = 'google', $user = null) {
		//TODO assign default user role to newly social registered user
		//TODO obtain more details from social profile gender, bio,passion etc
		//TODO save user social profile url if need

		//wrap in transaction
		return \DB::transaction(function () use ($provider, $user) {
			//obtain user details
			$name = null;
			$email = null;
			$avatar = null;

			//TODO obtain additional details
			if ($user) {
				$name = $user->getName();
				$email = $user->getEmail();
				$avatar = User::getProviderOriginalAvatar(
					$user->getAvatar(), $provider
				);
			}

			//find & return existing
			$user = User::where('email', $email)->first();

			if ($user) {
				//TODO update existing user details from social profile(s)
				$user->avatar = $avatar;
				$user->update();
				return $user;
			}

			//create new user
			else {

				$user = User::create([
					'name' => $name,
					'email' => $email,
					'avatar' => $avatar,
				]);

				return $user;
			}
		});
	}

}
