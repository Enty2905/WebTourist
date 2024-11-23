<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Booking;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * Các thuộc tính có thể gán giá trị
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'dob',
        'gender',
        'avt',
        'phone',
        'email',
        'password',
        'role',
    ];

    /**
     * Các thuộc tính ẩn khi xuất ra JSON
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Định dạng lại các cột đặc biệt
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'dob' => 'date',
    ];

    /**
     * Kiểm tra nếu người dùng là admin
     *
     * @return bool
     */
    public function isAdmin()
    {
        return $this->role === 'admin';
    }

    /**
     * Kiểm tra nếu người dùng là user
     *
     * @return bool
     */
    public function isUser()
    {
        return $this->role === 'user';
    }

    /**
     * Lấy văn bản giới tính
     *
     * @return string
     */
    public function getGenderTextAttribute()
    {
        return match ($this->gender) {
            'Nam' => 'Nam',
            'Nữ' => 'Nữ',
            'Khác' => 'Khác',
            default => 'Chưa xác định',
        };
    }

    /**
     * Quan hệ 1-n với Booking
     */
    public function bookings(): HasMany
    {
        return $this->hasMany(Booking::class);
    }
    public function likes()
    {
        return $this->hasMany(Like::class);
    }
}
