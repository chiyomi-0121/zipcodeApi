<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Zipcode extends Model
{
    use HasFactory;

    protected $table = 'zipcode';

    /**
     * 都道府県コードを表示する(全国地方公共団体コードの先頭2文字)
     * 
     * @return false|string
     */
    public function getPrefCodeAttribute()
    {
        return substr($this->local_gov_id, 0, 2);
    }

    /**
     * 配列で内容を全て表示する場合
     * 
     * @return array
     */
    public function toArray()
    {
        return [
            'zipcode' => $this->zip_code,
            'prefcode' => $this->pref_code,
            'address1' => $this->state_name,
            'address2' => $this->city,
            'address3' => $this->domain_name,
            'kana1' => $this->kana_state_name,
            'kana2' => $this->kana_city,
            'kana3' => $this->kana_domain_name,
        ];
    }
}
