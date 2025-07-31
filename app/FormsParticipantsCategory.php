<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Models\FormsParticipants;

class FormsParticipantsCategory extends Model
{
    public function participants()
    {
        return $this->belongsToMany(FormsParticipants::class, 'forms_participant_forms_participant_category');
    }
}
