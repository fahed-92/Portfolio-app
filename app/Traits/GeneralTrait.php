<?php
/**
 * GeneralTrait
 *
 * @category  Class
 * @package   Trait
 * @author    Fahed <fahed8592@gmail.com>
 * @copyright Copyright 2021 Al-Bada el Software, Inc. All rights reserved.
 * @license   Al-Bada el Software General Public License version 2 or later; see LICENSE
 * @link      http://Al-Badael.com
 * @php-
 */

/**
 * GeneralTrait
 *
 * GeneralTrait to retrieve application wide
 * URLs based on active webinstance.
 *
 * @category    Class
 * @package     EndpointHelper
 * @author      Brian Smith <brian.smith@company.com>
 * @copyright   Copyright 2015 Company, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE
 * @link        http://company.com
 *
 * @since   1.0.1
 */

namespace App\Traits;

use Illuminate\Support\Facades\File;

trait GeneralTrait
{
    /**
     * Upload Image
     * @return string
     */
    public function uploadImage($image, $folder)
    {
         $path = public_path('assets/img/' . $folder);
        $filename = time() . '.' . $image->getClientOriginalName();
        if (!File::exists($path)) {
            File::makeDirectory($path, 0775, true, true);
        }
        $image->move($path, $filename);
        return $filename;
    }
}
