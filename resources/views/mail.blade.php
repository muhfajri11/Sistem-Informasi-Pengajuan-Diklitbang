@component('mail::message')

@isset($details['from'])

@if ($details['from'] == 'comparative')
<h1 class="text-center">Pengajuan Studi Banding</h1>
@component('mail::panel')
<p>Tema Kunjungan</p>
<h4>{{ $details['data']->title }}</h4>

<p>Tanggal Kunjungan</p>
<h4>{{ $details['data']->visit }}</h4>
@endcomponent
@endif

@if ($details['from'] == 'internship')
<h1 style="text-align: center">Pengajuan Magang</h1>
@component('mail::panel')
<p>Nama Lengkap</p>
<h4>{{ $details['data']->name }}</h4>
<p>Tanggal Magang</p>
<h4>{{ $details['data']->start_date }}</h4>
@endcomponent
@endif

@if ($details['from'] == 'research')
<h1 style="text-align: center">Pengajuan Penelitian</h1>
@component('mail::panel')
<p>Judul Penelitian</p>
<h4>{{ $details['data']->judul }}</h4>
<p>Peneliti Utama</p>
<h4>{{ $details['data']->ketua }}</h4>
@endcomponent
@endif

@endisset

{!! $details['body'] !!}

@component('mail::button', ['url' => url('/')])
Login SIM Diklit
@endcomponent

@endcomponent