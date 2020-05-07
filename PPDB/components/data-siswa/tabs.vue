<template>
     <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
        <li class="nav-item">
            <nuxt-link :to="`/data-siswa/absensi`" class="nav-link" active-class="active">BUAT ABSENSI</nuxt-link>
        </li>
        <li class="nav-item">
           <nuxt-link :to="`/data-siswa/daftar-nilai`" class="nav-link" active-class="active">BUAT DAFTAR NILAI</nuxt-link>
        </li>
        <li class="nav-item">
            <nuxt-link :to="`/data-siswa/moodle-format`" class="nav-link" active-class="active">MOODLE FORMAT</nuxt-link>
        </li>
     </ul>
</template>
<script>
export default {
}
</script>