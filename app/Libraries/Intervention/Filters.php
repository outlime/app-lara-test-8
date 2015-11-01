<?php

namespace Pastiche\Libraries\Intervention;

use Intervention\Image\Image;
use Intervention\Image\Filters\FilterInterface;

class PostMedium implements FilterInterface
{
    public function applyFilter(Image $image)
    {
        return $image->fit(800, 600);
    }
}

class PostSmall implements FilterInterface
{
    public function applyFilter(Image $image)
    {
        return $image->fit(640, 480);
    }
}

class UserMedium implements FilterInterface
{
    public function applyFilter(Image $image)
    {
        return $image->fit(200, 200);
    }
}

class UserSmall implements FilterInterface
{
    public function applyFilter(Image $image)
    {
        return $image->fit(50, 50);
    }
}