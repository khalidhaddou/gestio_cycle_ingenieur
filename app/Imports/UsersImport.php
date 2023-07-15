<?php
namespace App\Imports;
use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
  
class UsersImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        
        return new User([
            'cne'     => $row['cne'],
            'cin'    => $row['cin'], 
            'nom'     => $row['nom'],
            'prenom'    => $row['prenom'], 
            'adresse'     => $row['adresse'],
            'sexe'    => $row['sexe'], 
            'semestre'     => $row['semestre'],
            'date_naissance'    => $row['date_naissance'], 
            'N_telephone'     => $row['N_telephone'],
            'image'    => $row['image'], 
            'email'    => $row['email'], 
            'password' => \Hash::make($row['password']),
        ]);
    }
}