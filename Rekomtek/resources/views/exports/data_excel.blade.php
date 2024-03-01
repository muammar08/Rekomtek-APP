<table>
    <thead>
    <tr>
        <th>No</th>
        <th>Nomor Surat</th>
        <th>Tanggal Surat</th>
        <th>Type Surat</th>
        <th>Surat Permohonan</th>
        <th>Tanggal Permohonan</th>
        <th>Perihal Permohonan</th>
        <th>Surat Permohonan 2</th>
        <th>Tanggal Permohonan 2</th>
        <th>Perihal Permohonan 2</th>
        <th>Tanggal Terima</th>
        <th>Nama Pemohon</th>
        <th>Pekerjaan</th>
        <th>Alamat</th>
        <th>Nama PT</th>
        <th>Sumber</th>
        <th>Wilayah Sungai</th>
        <th>Desa</th>
        <th>Kecamatan</th>
        <th>Kabupaten</th>
        <th>Provinsi</th>
        <th>Koordinat</th>
        <th>Tujuan</th>
        <th>Pengambilan</th>
        <th>Pembuangan</th>
        <th>Volume Ambil</th>
        <th>Jangka Waktu</th>
        <th>Nomor Izin</th>
        <th>Masa Izin</th>
        <th>Tanggal Izin</th>
        <th>Volume Izin</th>
        <th>No Berita Peninjauan</th>
        <th>Tanggal Berita Peninjauan</th>
        <th>No Berita Acara</th>
        <th>Tanggal Berita Acara</th>
    </tr>
    </thead>
    <tbody>
    @foreach($dataAir as $da)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$da->nomor_surat}}</td>
            <td>{{$da->tgl_masehi}}</td>
            <td>{{$da->type}}</td>
            <td>{{$da->surat_permohonan}}</td>
            <td>{{$da->tgl_permohonan}}</td>
            <td>{{$da->perihal_permohonan}}</td>
            <td>{{$da->surat_permohonan2}}</td>
            <td>{{$da->tgl_permohonan2}}</td>
            <td>{{$da->perihal_permohonan2}}</td>
            <td>-</td>
            <td>{{$da->nama}}</td>
            <td>{{$da->pekerjaan}}</td>
            <td>{{$da->alamat}}</td>
            <td>{{$da->nama_pt}}</td>
            <td>{{$da->sumber_air}}</td>
            <td>{{$da->wilayah_sungai}}</td>
            <td>{{$da->desa}}</td>
            <td>{{$da->kecamatan}}</td>
            <td>{{$da->kabupaten}}</td>
            <td>{{$da->provinsi}}</td>
            <td>{{$da->koordinat}}</td>
            <td>{{$da->tujuan}}</td>
            <td>{{$da->pengambilan}}</td>
            <td>{{$da->pembuangan}}</td>
            <td>{{$da->volume_ambil}}</td>
            <td>{{$da->jangka_waktu}}</td>
            <td>{{$da->nomor_izin_lama}}</td>
            <td>{{$da->masa_izin_lama}}</td>
            <td>-</td>
            <td>{{$da->volume_izin}}</td>
            <td>{{$da->no_berita_peninjauan}}</td>
            <td>{{$da->tgl_berita_peninjauan}}</td>
            <td>{{$da->no_berita_acara}}</td>
            <td>{{$da->tgl_berita_acara}}</td>
        </tr>
    @endforeach
    @foreach($dataSirtu as $ds)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$ds->nomor_surat}}</td>
            <td>{{$ds->tgl_masehi}}</td>
            <td>{{$ds->type}}</td>
            <td>{{$ds->surat_permohonan}}</td>
            <td>{{$ds->tgl_permohonan}}</td>
            <td>{{$ds->perihal_permohonan}}</td>
            <td>-</td>
            <td>-</td>
            <td>-</td>
            <td>{{$ds->tgl_terima}}</td>
            <td>{{$ds->nama}}</td>
            <td>{{$ds->pekerjaan}}</td>
            <td>{{$ds->alamat}}</td>
            <td>{{$ds->nama_pt}}</td>
            <td>{{$ds->sumber_sirtu}}</td>
            <td>{{$ds->wilayah_sungai}}</td>
            <td>{{$ds->desa}}</td>
            <td>{{$ds->kecamatan}}</td>
            <td>{{$ds->kabupaten}}</td>
            <td>{{$ds->provinsi}}</td>
            <td>{{$ds->koordinat}}</td>
            <td>{{$ds->tujuan}}</td>
            <td>{{$ds->pengambilan}}</td>
            <td>{{$ds->pembuangan}}</td>
            <td>{{$ds->volume_ambil}}</td>
            <td>{{$ds->jangka_waktu}}</td>
            <td>{{$ds->nomor_izin_lama}}</td>
            <td>{{$ds->masa_izin_lama}}</td>
            <td>{{$ds->tgl_izin_lama}}</td>
            <td>-</td>
            <td>{{$ds->no_berita_peninjauan}}</td>
            <td>{{$ds->tgl_berita_peninjauan}}</td>
            <td>{{$ds->no_berita_acara}}</td>
            <td>{{$ds->tgl_berita_acara}}</td>
        </tr>
    @endforeach
    </tbody>
</table>