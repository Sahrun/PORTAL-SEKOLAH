<template>
     <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
        <li class="nav-item">
            <nuxt-link :to="`/sekolah/guru`" class="nav-link" active-class="active">GURU</nuxt-link>
        </li>
        <li class="nav-item">
           <nuxt-link :to="`/sekolah/kelas`" class="nav-link" active-class="active">KELAS</nuxt-link>
        </li>
        <li class="nav-item">
            <nuxt-link :to="`/sekolah/jurusan`" class="nav-link" active-class="active">JURUSAN</nuxt-link>
        </li>
         <li class="nav-item">
            <nuxt-link :to="`/sekolah/pelajaran`" class="nav-link" active-class="active">MATA PELAJARAN</nuxt-link>
        </li>
        <li class="nav-item">
            <nuxt-link :to="`/sekolah/profile`" class="nav-link" active-class="active">PROFILE</nuxt-link>
        </li>
     </ul>
</template>
<script>
export default {
}
</script>