<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as BasicAuthenticatable;

class Collecte extends Model implements Authenticatable
{
    use BasicAuthenticatable;

    protected $fillable = ['nom','poidspal','poidsgrille'];

    /**
     * Get the password for the user.
     *
     * @return string
     */


    /**
     * Get the column name for the "remember me" token.
     *
     * @return string
     */
    public function getRememberTokenName()
    {
        return '';
    }
}
 ?>
