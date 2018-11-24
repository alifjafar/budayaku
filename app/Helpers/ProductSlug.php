<?php
/* * * * * * * * * * * * * * * * * * * * * * * * * * *
    * Create Unique Slug in Post                         *
    * * * * * * * * * * * * * * * * * * * * * * * * * * */

function createSlug($title, $id = 0)
{
    // Normalize the title
    $slug = str_slug($title);
    // Get any that could possibly be related.
    // This cuts the queries down by doing it once.
    $allSlugs = getRelatedSlugs($slug, $id);
    // If we haven't used it before then we are all good.
    if (!$allSlugs->contains('slug', $slug)) {
        return $slug;
    }
    // Just append numbers like a savage until we find not used.
    for ($i = 1; $i <= 10; $i++) {
        $newSlug = $slug . '-' . $i;
        if (!$allSlugs->contains('slug', $newSlug)) {
            return $newSlug;
        }
    }
    throw new \Exception('Can not create a unique slug');
}

function getRelatedSlugs($slug, $id = 0)
{
    return \App\Model\Product::select('slug')->where('slug', 'like', $slug . '%')
        ->where('id', '<>', $id)
        ->get();
}


function convertdate()
{
    date_default_timezone_set('Asia/Jakarta');
    $date = date('dmy');
    return $date;
}

function autonumber($barang, $primary, $prefix)
{
    $q = DB::table($barang)->select(DB::raw('MAX(RIGHT(' . $primary . ',5)) as kd_max'));
    $prx = $prefix . convertdate();
    if ($q->count() > 0) {
        foreach ($q->get() as $k) {
            $tmp = ((int)$k->kd_max) + 1;
            $kd = $prx . sprintf("%06s", $tmp);
        }
    } else {
        $kd = $prx . "000001";
    }

    return $kd;
}
