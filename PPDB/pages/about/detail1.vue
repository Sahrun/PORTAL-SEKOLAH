<template>
   
    <div>
      <h1>ok</h1>
    <nuxt-link :to="`/about/detail/`">
      <button>Edit</button>
    </nuxt-link>
    </div>
</template>

<script>
export default {
      async asyncData({$axios}) {
      let response = await $axios.get('http://dummy.restapiexample.com/api/v1/employees')
      let video = response.data.data;
      return {
        video
      }
    },
}
</script>