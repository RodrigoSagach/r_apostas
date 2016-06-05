<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Silber\Bouncer\Database\HasRolesAndAbilities;

class User extends Authenticatable
{
    use HasRolesAndAbilities;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'name', 'email', 'password', 'confirmation_code', 'referred_by',
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
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['investments_amount', 'balance', 'references', 'total_earnings'];

    public static function admin()
    {
        return self::whereHas('roles', function ($query) {
            $query->where('role_id', 1);
        })->first();
    }

    public function investments()
    {
        return $this->hasMany('\App\Investment');
    }

    public function investment_requests()
    {
        return $this->hasMany('\App\InvestmentRequest');
    }

    public function earnings()
    {
        return $this->hasMany('\App\Earning');
    }

    public function withdrawals()
    {
        return $this->hasMany('\App\Withdrawal');
    }

    public function withdrawal_requests()
    {
        return $this->hasMany('\App\WithdrawalRequest');
    }

    public function last_earnings()
    {
        return $this->hasMany('\App\LastEarning');
    }

    public function getBalance()
    {
        return $this->earnings()->sum('amount') - $this->withdrawals()->sum('amount');
    }

    public function getInvestmentsAmountAttribute()
    {
        return $this->investments()->sum('amount');
    }

    public function getBalanceAttribute()
    {
        return $this->earnings()->sum('amount') - $this->withdrawals()->sum('amount');
    }

    public function getReferencesAttribute()
    {
        return self::where('referred_by', $this->username)->count();
    }

    public function getTotalEarningsAttribute()
    {
        return ($this->getInvestmentsAmountAttribute() * 0.18) * 26;
    }
}
