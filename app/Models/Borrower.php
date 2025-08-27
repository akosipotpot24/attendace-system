<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;






class Borrower extends Model
{
    use HasFactory;
    protected $table = 'borrowers';

    protected $primaryKey = 'borrowernumber';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'borrowernumber',
        'cardnumber',
        'surname',
        'firstname',
        'title',
        'branchcode',
        'categorycode',
        'dateenrolled',
        'dateexpiry',
        'sort1',
        'status',
        'avatar'

    ];

}
