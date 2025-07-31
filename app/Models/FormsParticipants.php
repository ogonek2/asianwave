<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\FormsParticipantsCategory;

class FormsParticipants extends Model
{
    use HasFactory;

    public function categories()
    {
        return $this->belongsToMany(FormsParticipantsCategory::class, 'forms_participant_forms_participant_category');
    }
}
