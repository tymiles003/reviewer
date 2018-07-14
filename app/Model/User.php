<?php

namespace App\Model;

use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Spark\CanJoinTeams;
use Laravel\Spark\User as SparkUser;

/**
 * App\Model\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string|null $remember_token
 * @property string|null $photo_url
 * @property bool $uses_two_factor_auth
 * @property string|null $authy_id
 * @property string|null $country_code
 * @property string|null $phone
 * @property string|null $two_factor_reset_code
 * @property int|null $current_team_id
 * @property string|null $stripe_id
 * @property string|null $current_billing_plan
 * @property string|null $card_brand
 * @property string|null $card_last_four
 * @property string|null $card_country
 * @property string|null $billing_address
 * @property string|null $billing_address_line_2
 * @property string|null $billing_city
 * @property string|null $billing_state
 * @property string|null $billing_zip
 * @property string|null $billing_country
 * @property string|null $vat_id
 * @property string|null $extra_billing_information
 * @property \Carbon\Carbon $trial_ends_at
 * @property string|null $last_read_announcements_at
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Model|null $current_team
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Spark\Invitation[] $invitations
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Model\Kudos[] $kudos
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Spark\LocalInvoice[] $localInvoices
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Model\Team[] $ownedTeams
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Spark\Subscription[] $subscriptions
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Model\Team[] $teams
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Spark\Token[] $tokens
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\App\Model\User onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\User whereAuthyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\User whereBillingAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\User whereBillingAddressLine2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\User whereBillingCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\User whereBillingCountry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\User whereBillingState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\User whereBillingZip($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\User whereCardBrand($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\User whereCardCountry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\User whereCardLastFour($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\User whereCountryCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\User whereCurrentBillingPlan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\User whereCurrentTeamId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\User whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\User whereExtraBillingInformation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\User whereLastReadAnnouncementsAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\User wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\User wherePhotoUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\User whereStripeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\User whereTrialEndsAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\User whereTwoFactorResetCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\User whereUsesTwoFactorAuth($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\User whereVatId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\User withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Model\User withoutTrashed()
 * @mixin \Eloquent
 */
class User extends SparkUser
{
    use SoftDeletes;
    use CanJoinTeams;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'authy_id',
        'country_code',
        'phone',
        'card_brand',
        'card_last_four',
        'card_country',
        'billing_address',
        'billing_address_line_2',
        'billing_city',
        'billing_zip',
        'billing_country',
        'extra_billing_information',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'trial_ends_at' => 'datetime',
        'uses_two_factor_auth' => 'boolean',
    ];

    public function kudos()
    {
        return $this->hasMany(Kudos::class);
    }
}
