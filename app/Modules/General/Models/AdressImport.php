<?php
/**
 * Created by PhpStorm.
 * User: ghdj9
 * Date: 27/9/2019
 * Time: 12:25 PM
 */

namespace App\Modules\General\Models;

use App\Modules\General\Models\Address;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithHeadingRow;


class AdressImport implements ToModel, WithHeadingRow
{
   // use Importable;

    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {

        if (!isset($row[0])) {
            return null;
        }

        return new Address([
            'postal_code' => $row['code_postal'],
            'country' => 'france',
            'city' => $row['commune'],
            'locality' => $row['commune'],
            'address' => $row['numero_de_la_voie'].' '.$row['nom_de_la_rue'].' '.$row['nom_lieu_dit'].' '.$row['commune'].' '.$row['departement']
        ]);
    }
}
