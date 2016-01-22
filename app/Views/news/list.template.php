
<? echo view('layouts.header', ['page' => 'news']);?>

<news-list API_BASE_URL="<?=env('API_BASE_URL')?>"> </news-list>

<? echo view('layouts.footer'); ?>